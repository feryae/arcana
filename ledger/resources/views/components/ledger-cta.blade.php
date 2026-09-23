@props(['route', 'label', 'variant' => 'primary'])

@php
    $classes = $variant === 'primary'
        ? 'bg-[#806337] text-[#eee5d1] hover:bg-[#967744] px-6 py-3.5'
        : 'group border border-[#806337] bg-[#201b13] px-7 py-4 text-[#d2b26e] hover:bg-[#282116]';
@endphp

<a href="{{ $route === '#' ? '#' : ($route === 'landing' ? '#' . $route : route($route)) }}" @class(['group flex w-fit items-center gap-3 text-[9px] font-semibold uppercase tracking-[0.2em] transition-all', $classes])>
    {{ $label }}
    {{ $slot }}
</a>