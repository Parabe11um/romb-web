@props(['article', 'heading' => 'h2'])

<article class="rw-article-card">
    <a class="rw-article-card__image" href="{{ route('articles.show', $article->slug) }}" tabindex="-1" aria-hidden="true">
        @if($article->preview_image)
            <img src="{{ asset('storage/' . $article->preview_image) }}" alt="" loading="lazy" width="640" height="400">
        @else
            <span class="rw-article-card__placeholder"><x-service-icon name="website" /></span>
        @endif
    </a>
    <div class="rw-article-card__body">
        <span class="rw-article-card__label">Статья</span>
        @if($heading === 'h3')
            <h3><a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a></h3>
        @else
            <h2><a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a></h2>
        @endif
        @if($article->excerpt)
            <p>{{ \Illuminate\Support\Str::limit(strip_tags($article->excerpt), 140) }}</p>
        @endif
        <div class="rw-article-card__footer">
            @if($article->created_at)
                <time datetime="{{ $article->created_at->toDateString() }}">{{ $article->created_at->format('d.m.Y') }}</time>
            @endif
            <a class="rw-text-link" href="{{ route('articles.show', $article->slug) }}">Читать<span class="sr-only">: {{ $article->title }}</span> <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</article>
