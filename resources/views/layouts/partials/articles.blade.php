@if($articles->isNotEmpty())
    <section class="rw-articles-section rw-home-articles">
        <div class="container">
            <div class="rw-section-heading">
                <div>
                    <h2 class="rw-eyebrow">Статьи</h2>
                    <p class="rw-section-title">Недавние публикации</p>
                </div>
                <a class="rw-text-link" href="{{ route('articles.index') }}">Все статьи <span aria-hidden="true">↗</span></a>
            </div>
            <div class="rw-article-grid">
                @foreach($articles as $article)
                    <x-article-card :article="$article" heading="h3" />
                @endforeach
            </div>
        </div>
    </section>
@endif
