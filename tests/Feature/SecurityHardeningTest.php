<?php

namespace Tests\Feature;

use App\Http\Middleware\EnsureAdminFileUpload;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class SecurityHardeningTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('local');
        Storage::fake('tmp-for-tests');
    }

    private function uploadUrl(): string
    {
        return URL::temporarySignedRoute(
            'livewire.upload-file',
            now()->addMinutes(5),
            [],
            absolute: false,
        );
    }

    private function signInAdmin(): void
    {
        $this->actingAs(User::factory()->create([
            'email' => 'r.a.bazhenoff@gmail.com',
        ]));
    }

    private function assertNoStoredFiles(): void
    {
        $this->assertSame(
            [],
            Storage::disk('local')->allFiles()
        );

        $this->assertSame(
            [],
            Storage::disk('tmp-for-tests')->allFiles()
        );
    }

    public function test_safe_html_is_preserved(): void
    {
        $result = (string) str(
            '<p><strong>Safe content</strong></p>'
        )->sanitizeHtml();

        $this->assertStringContainsString(
            '<strong>Safe content</strong>',
            $result
        );
    }

    public function test_script_elements_are_removed(): void
    {
        $result = (string) str(
            '<p>Safe content</p><script>test()</script>'
        )->sanitizeHtml();

        $this->assertStringNotContainsString(
            '<script',
            strtolower($result)
        );

        $this->assertStringContainsString(
            'Safe content',
            $result
        );
    }

    public function test_unsafe_html_attributes_are_removed(): void
    {
        $result = (string) str(
            '<p onclick="test()">Safe content</p>'
        )->sanitizeHtml();

        $this->assertStringNotContainsString(
            'onclick=',
            strtolower($result)
        );
    }

    public function test_livewire_uses_private_disk(): void
    {
        $this->assertSame(
            'local',
            config('livewire.temporary_file_upload.disk')
        );

        $this->assertSame(
            storage_path('app/private'),
            config('filesystems.disks.local.root')
        );
    }

    public function test_upload_middleware_is_registered(): void
    {
        $this->assertContains(
            EnsureAdminFileUpload::class,
            config('livewire.temporary_file_upload.middleware')
        );
    }

    public function test_png_passes_upload_validation(): void
    {
        $validator = Validator::make(
            ['file' => UploadedFile::fake()->image('test.png')],
            ['file' => config('livewire.temporary_file_upload.rules')]
        );

        $this->assertFalse($validator->fails());
    }

    public function test_text_file_fails_upload_validation(): void
    {
        $validator = Validator::make(
            [
                'file' => UploadedFile::fake()->create(
                    'test.txt', 10, 'text/plain'
                ),
            ],
            ['file' => config('livewire.temporary_file_upload.rules')]
        );

        $this->assertTrue($validator->fails());
    }

    public function test_oversized_image_fails_validation(): void
    {
        $validator = Validator::make(
            [
                'file' => UploadedFile::fake()
                    ->image('large.png')->size(5000),
            ],
            ['file' => config('livewire.temporary_file_upload.rules')]
        );

        $this->assertTrue($validator->fails());
    }

    public function test_guest_cannot_upload_files(): void
    {
        $this->post(
            $this->uploadUrl(),
            ['files' => [UploadedFile::fake()->image('guest.png')]],
            ['Accept' => 'application/json']
        )->assertForbidden();

        $this->assertNoStoredFiles();
    }

    public function test_non_admin_cannot_upload_files(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(
            $this->uploadUrl(),
            ['files' => [UploadedFile::fake()->image('user.png')]],
            ['Accept' => 'application/json']
        )->assertForbidden();

        $this->assertNoStoredFiles();
    }

    public function test_admin_can_upload_valid_image(): void
    {
        $this->signInAdmin();

        $this->post(
            $this->uploadUrl(),
            ['files' => [UploadedFile::fake()->image('admin.png')]],
            ['Accept' => 'application/json']
        )->assertOk()->assertJsonStructure(['paths']);

        $disk = Storage::disk('tmp-for-tests');

        $files = $disk->allFiles('livewire-tmp');

        $images = array_values(array_filter(
            $files,
            fn ($file) => !str_ends_with($file, '.json')
        ));

        $this->assertCount(1, $images);
        $this->assertCount(2, $files);

        $image = $images[0];

        $disk->assertExists($image);
        $disk->assertExists($image . '.json');

        $metadata = json_decode(
            $disk->get($image . '.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $this->assertSame('admin.png', $metadata['name']);
        $this->assertSame('image/png', $metadata['type']);
        $this->assertSame($disk->size($image), $metadata['size']);

        $this->assertNotEmpty($metadata['hash']);

        $this->assertSame(
            'image/png',
            (new \finfo(FILEINFO_MIME_TYPE))->buffer(
                $disk->get($image)
            )
        );

        $this->assertSame(
            [],
            Storage::disk('local')->allFiles()
        );
    }

    public function test_admin_cannot_upload_text_file(): void
    {
        $this->signInAdmin();

        $this->post(
            $this->uploadUrl(),
            [
                'files' => [
                    UploadedFile::fake()->create(
                        'invalid.txt', 10, 'text/plain'
                    ),
                ],
            ],
            ['Accept' => 'application/json']
        )->assertUnprocessable();

        $this->assertNoStoredFiles();
    }

    public function test_admin_cannot_upload_oversized_image(): void
    {
        $this->signInAdmin();

        $this->post(
            $this->uploadUrl(),
            [
                'files' => [
                    UploadedFile::fake()
                        ->image('large.png')->size(5000),
                ],
            ],
            ['Accept' => 'application/json']
        )->assertUnprocessable();

        $this->assertNoStoredFiles();
    }

    public function test_unsigned_upload_is_rejected(): void
    {
        $this->signInAdmin();

        $this->post(
            route('livewire.upload-file', [], false),
            ['files' => [UploadedFile::fake()->image('unsigned.png')]],
            ['Accept' => 'application/json']
        )->assertUnauthorized();

        $this->assertNoStoredFiles();
    }

    public function test_upload_on_personal_domain_is_rejected(): void
    {
        $this->signInAdmin();

        config(['personal.domain' => 'me.romb-web.ru']);

        $this->post(
            'https://me.romb-web.ru'.$this->uploadUrl(),
            ['files' => [UploadedFile::fake()->image('personal.png')]],
            ['Accept' => 'application/json']
        )->assertNotFound();

        $this->assertNoStoredFiles();
    }
}
