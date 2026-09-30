<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Обсудить проект');
        $response->assertSee(route('projects.index'), false);
        $response->assertDontSee('main_hero_2.png');
    }

    public function test_services_are_linked_on_the_homepage_and_services_page(): void
    {
        $service = Service::create([
            'title' => 'Разработка / программирование',
            'slug' => 'razrabotka-programmirovanie',
            'excerpt' => 'Разрабатываем сайты для бизнеса.',
            'image' => 'legacy-service-image.png',
            'is_active' => true,
        ]);

        foreach (['/', '/services'] as $url) {
            $this->get($url)
                ->assertOk()
                ->assertSee($service->title)
                ->assertSee(route('services.show', $service), false)
                ->assertDontSee('legacy-service-image.png');
        }
    }
}
