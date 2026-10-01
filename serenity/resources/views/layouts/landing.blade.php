<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="min-h-screen overflow-x-hidden bg-[#F4FAFC] text-[#19334A] antialiased">

    <header class="absolute inset-x-0 top-0 z-50">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8"> {{-- Logo --}}
            <a href="/" class="group flex items-center gap-3">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#DDF3FA] text-[#4F9DB8] shadow-sm transition group-hover:scale-105">
                    <x-tabler-moon-stars class="h-6 w-6" />
                </div>
                <div>
                    <div class="text-lg font-semibold tracking-tight text-[#19334A]"> Serenity </div>
                    <div class="text-[10px] font-medium uppercase tracking-[0.25em] text-[#7B9AAA]"> Mind · Body · Soul
                    </div>
                </div>
            </a>
            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-8 lg:flex">
                <a href="#how-it-works" class="text-sm font-medium text-[#668294] transition hover:text-[#397E99]"> How
                    it works </a>
                <a href="#wellness" class="text-sm font-medium text-[#668294] transition hover:text-[#397E99]">
                    Wellness </a>
                <a href="#therapists" class="text-sm font-medium text-[#668294] transition hover:text-[#397E99]"> For
                    therapists </a>
                <a href="#stories" class="text-sm font-medium text-[#668294] transition hover:text-[#397E99]"> Stories
                </a>
            </nav>
            {{-- Actions --}}
            <div class="hidden items-center gap-3 lg:flex">
                <a href="/login"
                    class="rounded-xl px-4 py-2.5 text-sm font-semibold text-[#52758A] transition hover:bg-white"> Sign
                    in </a>
                <a href="/register"
                    class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-5 py-3 text-sm font-semibold text-white shadow-[0_10px_30px_rgba(90,167,194,0.22)] transition hover:-translate-y-0.5 hover:bg-[#4B98B4]">
                    Begin your journey <x-tabler-arrow-up-right class="h-4 w-4" />
                </a>
            </div>
            {{-- Mobile --}}
            <button
                class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-[#52758A] shadow-sm lg:hidden">
                <x-tabler-menu-2 class="h-5 w-5" />
            </button>
        </div>
    </header>

    {{ $slot }}

    @livewireScripts
</body>

</html>