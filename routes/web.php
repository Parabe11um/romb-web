<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Service;
use App\Models\Project;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', function () {

    $sitemap = Sitemap::create();

    // Статика
    $sitemap->add(Url::create(route('home')));
    $sitemap->add(Url::create(route('about')));
    $sitemap->add(Url::create(route('contacts')));

    $sitemap->add(Url::create(route('services.index')));
    $sitemap->add(Url::create(route('projects.index')));
    $sitemap->add(Url::create(route('articles.index')));

    // Услуги
    Service::where('is_active', 1)->get()->each(function ($service) use ($sitemap) {
        $sitemap->add(
            Url::create(route('services.show', $service))
                ->setLastModificationDate($service->updated_at)
        );
    });

    // Проекты
    Project::where('is_active', 1)->get()->each(function ($project) use ($sitemap) {
        $sitemap->add(
            Url::create(route('projects.show', $project->slug))
                ->setLastModificationDate($project->updated_at)
        );
    });

    // Статьи
    Article::where('is_active', 1)->get()->each(function ($article) use ($sitemap) {
        $sitemap->add(
            Url::create(route('articles.show', $article->slug))
                ->setLastModificationDate($article->updated_at)
        );
    });

    return $sitemap->toResponse(request());
});

/*
|--------------------------------------------------------------------------
| Основные страницы
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::view('/about', 'about')->name('about');
Route::view('/contacts', 'contacts')->name('contacts');
Route::post('/contacts', [ContactController::class, 'send'])->name('contact.send');

Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');
