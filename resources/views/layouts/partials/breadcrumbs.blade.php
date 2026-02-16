@if(isset($breadcrumbs) && count($breadcrumbs))
    <nav class="text-sm text-[#aab0bc] mb-6" aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-2">

            @foreach($breadcrumbs as $breadcrumb)

                @if(!$loop->last)
                    <li class="flex items-center gap-2">
                        <a href="{{ $breadcrumb['url'] }}"
                           class="hover:text-[#343f52] transition-colors">
                            {{ $breadcrumb['title'] }}
                        </a>
                        <span>/</span>
                    </li>
                @else
                    <li class="text-[#343f52] font-medium">
                        {{ $breadcrumb['title'] }}
                    </li>
                @endif

            @endforeach

        </ol>
    </nav>
@endif
