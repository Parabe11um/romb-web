@if ($paginator->hasPages())
    <nav class="rw-pagination__controls" aria-label="Страницы статей">
        @if ($paginator->onFirstPage())
            <span class="rw-button rw-button--compact rw-button--secondary" aria-disabled="true">Назад</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="rw-button rw-button--compact rw-button--secondary">Назад</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="rw-pagination__ellipsis">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="rw-button rw-button--compact rw-button--secondary" aria-current="page" aria-label="Страница {{ $page }}">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="rw-button rw-button--compact rw-button--secondary" aria-label="Страница {{ $page }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="rw-button rw-button--compact rw-button--secondary">Вперёд</a>
        @else
            <span class="rw-button rw-button--compact rw-button--secondary" aria-disabled="true">Вперёд</span>
        @endif
    </nav>
@endif
