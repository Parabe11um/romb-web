<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;

    public function test_articles_index_renders_without_published_articles(): void
    {
        $this->get('/articles')
            ->assertOk()
            ->assertViewIs('articles.index')
            ->assertSee('Публикации скоро появятся');
    }

    public function test_published_articles_are_paginated_and_hidden_articles_are_excluded(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            Article::create([
                'title' => "Публикация номер {$i}",
                'slug' => "article-{$i}",
                'is_active' => true,
            ])->forceFill(['created_at' => now()->subDays(8 - $i)])->save();
        }

        Article::create(['title' => 'Скрытая публикация', 'slug' => 'hidden', 'is_active' => false]);

        $this->get('/articles')
            ->assertOk()
            ->assertSee('Публикация номер 7')
            ->assertSee('Публикация номер 2')
            ->assertDontSee('Публикация номер 1')
            ->assertDontSee('Скрытая публикация')
            ->assertSee('/articles?page=2', false);

        $this->get('/articles?page=2')
            ->assertOk()
            ->assertSee('Публикация номер 1')
            ->assertDontSee('Публикация номер 7');
    }

    public function test_article_without_a_preview_image_has_a_readable_card_and_detail_page(): void
    {
        $article = Article::create([
            'title' => 'Статья без обложки',
            'slug' => 'without-cover',
            'content' => '<p>Содержание статьи.</p>',
            'is_active' => true,
        ]);

        $this->get('/articles')
            ->assertOk()
            ->assertSee($article->title)
            ->assertSee('rw-article-card__placeholder')
            ->assertSee(route('articles.show', $article->slug), false)
            ->assertDontSee('<img src="http://localhost/storage/"', false);

        $this->get('/articles/without-cover')
            ->assertOk()
            ->assertSee('Содержание статьи.');
    }

    public function test_hidden_and_unknown_articles_return_404(): void
    {
        Article::create(['title' => 'Черновик', 'slug' => 'draft', 'is_active' => false]);

        $this->get('/articles/draft')->assertNotFound();
        $this->get('/articles/unknown')->assertNotFound();
    }
}
