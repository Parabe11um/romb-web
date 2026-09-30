@props(['service' => null, 'name' => null])

@php
    // Titles also cover services created with a different slug in the admin panel.
    $label = mb_strtolower(($service?->slug ?? '') . ' ' . ($service?->title ?? ''));
    $icon = $name ?? match (true) {
        str_contains($label, 'seo'), str_contains($label, 'продвиж') => 'seo',
        str_contains($label, 'поддерж'), str_contains($label, 'сопровож'), str_contains($label, 'support') => 'support',
        str_contains($label, 'дизайн'), str_contains($label, 'design') => 'design',
        str_contains($label, 'интеграц'), str_contains($label, 'автоматиза') => 'integration',
        str_contains($label, 'разработ'), str_contains($label, 'программ'), str_contains($label, 'development') => 'development',
        default => 'website',
    };
@endphp

<svg {{ $attributes->class(['rw-icon']) }} viewBox="0 0 32 32" fill="none" stroke="currentColor"
     stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
    @switch($icon)
        @case('development')
            <rect x="3" y="5" width="26" height="22" rx="4" />
            <path d="M3 11h26M8 8h.01M12 8h.01M11 16l-3 3 3 3M21 16l3 3-3 3M18 15l-4 8" />
            @break
        @case('seo')
            <circle cx="13" cy="13" r="9" />
            <path d="m20 20 8 8M8 16l4-5 4 3 3-5" />
            @break
        @case('support')
            <path d="M5 17v-2a11 11 0 0 1 22 0v2M27 22v2a4 4 0 0 1-4 4h-4" />
            <rect x="3" y="15" width="5" height="9" rx="2" />
            <rect x="24" y="15" width="5" height="9" rx="2" />
            <path d="m12 16 3 3 6-6" />
            @break
        @case('design')
            <rect x="4" y="4" width="24" height="24" rx="4" />
            <path d="M4 11h24M12 11v17m5-7 7-7 3 3-7 7-4 1z" />
            @break
        @case('integration')
            <rect x="3" y="11" width="8" height="10" rx="2" />
            <rect x="21" y="3" width="8" height="10" rx="2" />
            <rect x="21" y="21" width="8" height="8" rx="2" />
            <path d="M11 16h5V8h5M16 16v9h5" />
            @break
        @default
            <rect x="3" y="5" width="26" height="22" rx="4" />
            <path d="M3 11h26M8 8h.01M12 8h.01M8 16h7M8 21h11" />
    @endswitch
</svg>
