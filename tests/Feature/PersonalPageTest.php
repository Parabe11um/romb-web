<?php

namespace Tests\Feature;

use App\Filament\Pages\ManagePersonalPage;
use App\Models\PersonalPage;
use App\Models\User;
use Database\Seeders\PersonalPageSeeder;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class PersonalPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['personal.domain' => 'me.romb-web.ru']);
        $this->seed(PersonalPageSeeder::class);
    }

    public function test_personal_home_is_separate_from_the_studio(): void
    {
        $this->get('https://me.romb-web.ru/')
            ->assertOk()->assertSee('Роман Баженов')->assertSee('Sellerexpert')
            ->assertSee('https://me.romb-web.ru/', false)
            ->assertSee('https://t.me/rombweb', false)->assertSee('tel:+79169729719', false)
            ->assertSee('mailto:capri@inbox.ru', false)
            ->assertSee('personal-', false)->assertDontSee('rw-home-hero', false);
        $this->get('https://romb-web.ru/')->assertOk()->assertSee('rw-home-hero', false)->assertDontSee('personal-hero', false);
        $this->get('https://romb-web.ru/about')->assertOk();
        $this->get('https://romb-web.ru/articles')->assertOk();
    }

    public function test_studio_and_admin_paths_do_not_leak_onto_the_personal_host(): void
    {
        foreach (['/about', '/articles', '/projects', '/services', '/sitemap.xml', '/admin', '/admin/login', '/admin/personal-page'] as $path) {
            $this->get('https://me.romb-web.ru'.$path)->assertNotFound();
        }
        $this->post('https://me.romb-web.ru/contacts', [])->assertNotFound();
    }

    public function test_cyrillic_words_stay_intact_in_paragraphs_and_experience_results(): void
    {
        $page = PersonalPage::find(1);
        $paragraphs = [
            'Развиваю сервисы в разных отраслях',
            'Работаю над архитектурой страховых проектов.',
        ];
        $results = [
            'Проектирование IT-архитектуры продукта.',
            'Редизайн личных кабинетов физических и юридических лиц.',
            'Развитие онлайн-калькуляторов страхования.',
        ];
        $experience = $page->experience;
        $experience[0]['results'] = $results[0]."\r\n".$results[1]."\n".$results[2];
        $page->update([
            'about_text' => implode("\r\n \r\n", $paragraphs),
            'experience' => $experience,
        ]);

        $response = $this->get('https://me.romb-web.ru/')->assertOk();

        foreach ($paragraphs as $paragraph) {
            $response->assertSee('<p>'.$paragraph.'</p>', false);
        }
        foreach ($results as $result) {
            $response->assertSee('<li>'.$result.'</li>', false);
        }
        $response->assertDontSee("\u{FFFD}", false);
    }

    public function test_unpublished_or_missing_page_is_not_public(): void
    {
        PersonalPage::find(1)->update(['is_published' => false]);
        $this->get('https://me.romb-web.ru/')->assertNotFound();
        PersonalPage::find(1)->delete();
        $this->get('https://me.romb-web.ru/')->assertNotFound();
    }

    public function test_visibility_sort_order_and_untrusted_content(): void
    {
        PersonalPage::find(1)->update([
            'name' => '<script>alert("test")</script>',
            'projects' => [
                ['title' => 'Первый', 'description' => 'Текст', 'url' => 'javascript:alert(1)', 'is_visible' => true],
                ['title' => 'Скрытый проект', 'is_visible' => false],
                ['title' => 'Второй', 'url' => 'https://example.com', 'is_visible' => true],
            ],
            'experience' => [['company' => 'Скрытая компания', 'is_visible' => false]],
            'skills' => [['title' => 'Скрытый навык', 'is_visible' => false]],
        ]);
        $this->get('https://me.romb-web.ru/')->assertOk()
            ->assertSeeInOrder(['Первый', 'Второй'])->assertDontSee('Скрытый проект')
            ->assertDontSee('Скрытая компания')->assertDontSee('Скрытый навык')
            ->assertDontSee('<script>alert', false)->assertSee('&lt;script&gt;', false)
            ->assertDontSee('javascript:', false)->assertSee('href="https://example.com"', false);
    }

    public function test_repeated_seed_preserves_admin_changes(): void
    {
        PersonalPage::find(1)->update(['name' => 'Изменено вручную', 'is_published' => false, 'projects' => []]);
        $this->seed(PersonalPageSeeder::class);
        $this->assertDatabaseCount('personal_pages', 1);
        $this->assertSame('Изменено вручную', PersonalPage::find(1)->name);
        $this->assertFalse(PersonalPage::find(1)->is_published);
        $this->assertSame([], PersonalPage::find(1)->projects);
    }

    public function test_admin_can_save_changes_and_the_public_page_updates(): void
    {
        $this->signInAdmin();
        $this->get('/admin/personal-page')->assertOk()->assertSee('Личный сайт');
        Livewire::test(ManagePersonalPage::class)
            ->set('data.headline', 'Новая специализация')
            ->set('data.telegram', '@roman_dev')
            ->call('save')->assertHasNoErrors();
        $this->assertSame('Новая специализация', PersonalPage::find(1)->headline);
        $this->get('https://me.romb-web.ru/')->assertOk()->assertSee('Новая специализация')->assertSee('https://t.me/roman_dev', false);
    }

    public function test_invalid_contact_and_project_links_are_rejected(): void
    {
        $this->signInAdmin();
        Livewire::test(ManagePersonalPage::class)
            ->set('data.email', 'invalid')
            ->set('data.telegram', 'https://t.me/roman')
            ->set('data.projects', [[
                'title' => 'Тест', 'category' => 'Сервис', 'description' => 'Описание',
                'url' => 'javascript:alert(1)', 'image' => null, 'status' => 'published', 'is_visible' => true,
            ]])
            ->call('save')->assertHasErrors(['data.email', 'data.telegram', 'data.projects.0.url']);
        $this->assertSame('capri@inbox.ru', PersonalPage::find(1)->email);
    }

    public function test_admin_photo_upload_is_stored_and_used_by_the_landing(): void
    {
        Storage::fake('public');
        $this->signInAdmin();
        $photo = UploadedFile::fake()->createWithContent('portrait.png', file_get_contents(public_path('images/roman-bazhenov.png')));
        Livewire::test(ManagePersonalPage::class)
            ->set('data.photo_path', [$photo])->call('save')->assertHasNoErrors();
        $page = PersonalPage::find(1);
        $this->assertStringStartsWith('personal/profile/', $page->photo_path);
        Storage::disk('public')->assertExists($page->photo_path);
        $this->get('https://me.romb-web.ru/')->assertOk()->assertSee($page->photoUrl(), false);
    }

    public function test_anonymous_and_non_admin_users_cannot_edit(): void
    {
        $this->get('/admin/personal-page')->assertRedirect('/admin/login');
        $this->actingAs(User::factory()->create());
        Filament::setCurrentPanel(Filament::getPanel('admin'));
        $this->get('/admin/personal-page')->assertForbidden();
        Livewire::test(ManagePersonalPage::class)->assertForbidden();
    }

    public function test_admin_permission_is_rechecked_when_saving(): void
    {
        $this->signInAdmin();
        $component = Livewire::test(ManagePersonalPage::class);
        auth()->user()->update(['email' => 'no-access@example.com']);
        $component->set('data.name', 'Не должно сохраниться')->call('save')->assertForbidden();
        $this->assertSame('Роман Баженов', PersonalPage::find(1)->name);
    }

    private function signInAdmin(): void
    {
        $this->actingAs(User::factory()->create(['email' => 'r.a.bazhenoff@gmail.com']));
        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }
}
