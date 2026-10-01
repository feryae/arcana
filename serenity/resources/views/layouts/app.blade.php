{{-- resources/views/layouts/serenity.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Serenity' }} · Serenity</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-[#F4FAFC] text-[#294A5B] antialiased">

    <div x-data="{ sidebarOpen: false, sidebarCollapsed: false }" class="min-h-screen">

        {{-- =========================================================
        MOBILE OVERLAY
        ========================================================== --}}

        <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-[#173346]/30 backdrop-blur-sm lg:hidden" style="display: none;"></div>


        {{-- =========================================================
        SIDEBAR
        ========================================================== --}}

        <aside
            class="fixed inset-y-0 left-0 z-50 flex flex-col border-r border-[#DCECEF] bg-[#F9FCFD] transition-all duration-300 ease-out lg:translate-x-0"
            :class="[
                sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0',
                sidebarCollapsed ? 'w-[82px]' : 'w-[260px]'
            ]">

            {{-- =====================================================
            LOGO
            ====================================================== --}}

            <div class="flex h-[76px] shrink-0 items-center border-b border-[#E4EFF2]"
                :class="sidebarCollapsed ? 'justify-center px-3' : 'justify-between px-5'">

                <a href="/dashboard" class="group flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#DDF2F7] text-[#5A9FB6] transition group-hover:scale-105">
                        <x-tabler-moon-stars class="h-5 w-5" />
                    </div>

                    <div x-show="!sidebarCollapsed" x-transition class="min-w-0">
                        <div class="text-sm font-semibold tracking-tight text-[#294A5B]">
                            Serenity
                        </div>

                        <div class="mt-0.5 text-[9px] font-bold uppercase tracking-[0.2em] text-[#8AA5AF]">
                            Your sanctuary
                        </div>
                    </div>

                </a>


                {{-- Desktop collapse --}}
                <button @click="sidebarCollapsed = !sidebarCollapsed"
                    class="hidden h-8 w-8 items-center justify-center rounded-lg text-[#9BAEB5] transition hover:bg-white hover:text-[#5B8D9E] lg:flex"
                    x-show="!sidebarCollapsed">
                    <x-tabler-layout-sidebar-left-collapse class="h-4 w-4" />
                </button>

            </div>


            {{-- Collapsed expand button --}}
            <div x-show="sidebarCollapsed" class="hidden justify-center px-3 pt-4 lg:flex">
                <button @click="sidebarCollapsed = false"
                    class="flex h-9 w-9 items-center justify-center rounded-xl text-[#819CA7] transition hover:bg-white hover:text-[#5B8D9E]">
                    <x-tabler-layout-sidebar-right-expand class="h-4 w-4" />
                </button>
            </div>


            {{-- =====================================================
            NAVIGATION
            ====================================================== --}}

            <nav class="flex-1 overflow-y-auto px-3 py-5" :class="sidebarCollapsed ? 'px-3' : 'px-3'">

                {{-- Sanctuary --}}
                <div>

                    <div x-show="!sidebarCollapsed"
                        class="mb-2 px-3 text-[9px] font-bold uppercase tracking-[0.2em] text-[#9BAEB5]">
                        Sanctuary
                    </div>


                    <a href="/dashboard"
                        class="group relative flex items-center gap-3 rounded-xl bg-[#E4F3F7] px-3 py-2.5 text-sm font-semibold text-[#4D91A7]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Sanctuary">

                        <x-tabler-home-2 class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Sanctuary
                        </span>

                        <span x-show="!sidebarCollapsed" class="ml-auto h-1.5 w-1.5 rounded-full bg-[#67AEC3]"></span>

                    </a>


                    <a href="/dashboard/check-in"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Daily check-in">

                        <x-tabler-mood-smile class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Daily check-in
                        </span>

                    </a>


                    <a href="/dashboard/journey"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="My journey">

                        <x-tabler-route class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            My journey
                        </span>

                    </a>

                </div>


                {{-- Care --}}
                <div class="mt-7">

                    <div x-show="!sidebarCollapsed"
                        class="mb-2 px-3 text-[9px] font-bold uppercase tracking-[0.2em] text-[#9BAEB5]">
                        Care
                    </div>


                    <a href="/dashboard/therapist"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="My therapist">

                        <x-tabler-heart-handshake class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            My therapist
                        </span>

                    </a>


                    <a href="/dashboard/sessions"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Sessions">

                        <x-tabler-calendar-heart class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Sessions
                        </span>

                        <span x-show="!sidebarCollapsed"
                            class="ml-auto rounded-md bg-[#E8F4F7] px-1.5 py-0.5 text-[9px] font-bold text-[#5C9DB2]">
                            1
                        </span>

                    </a>


                    <a href="/dashboard/messages"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Messages">

                        <x-tabler-message-heart class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Messages
                        </span>

                        <span x-show="!sidebarCollapsed" class="ml-auto h-1.5 w-1.5 rounded-full bg-[#69B4C8]"></span>

                    </a>

                </div>


                {{-- Wellness --}}
                <div class="mt-7">

                    <div x-show="!sidebarCollapsed"
                        class="mb-2 px-3 text-[9px] font-bold uppercase tracking-[0.2em] text-[#9BAEB5]">
                        Wellness
                    </div>


                    <a href="/dashboard/rituals"
                        class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Rituals">

                        <x-tabler-sparkles class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Rituals
                        </span>

                    </a>


                    <a href="/dashboard/journal"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Journal">

                        <x-tabler-book-2 class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Journal
                        </span>

                    </a>


                    <a href="/dashboard/mood-insights"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Mood insights">

                        <x-tabler-chart-dots-3 class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Mood insights
                        </span>

                    </a>


                    <a href="/dashboard/library"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Wellness library">

                        <x-tabler-books class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Wellness library
                        </span>

                    </a>



                    <a href="/dashboard/stress-reduction"
                        class="group mt-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                        :class="sidebarCollapsed ? 'justify-center' : ''" title="Wellness library">

                        <x-tabler-books class="h-[18px] w-[18px] shrink-0" />

                        <span x-show="!sidebarCollapsed">
                            Stress Reduction
                        </span>

                    </a>

                </div>


                {{-- Spacer card --}}
                <div x-show="!sidebarCollapsed" class="mt-8 rounded-2xl border border-[#DCECEF] bg-white p-4">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#E8F5F7] text-[#65A6B9]">
                        <x-tabler-cloud class="h-4 w-4" />
                    </div>

                    <p class="mt-3 text-xs font-semibold text-[#577884]">
                        Take it gently.
                    </p>

                    <p class="mt-1 text-[10px] leading-4 text-[#99AAB0]">
                        There's no perfect way to heal.
                    </p>

                </div>

            </nav>


            {{-- =====================================================
            BOTTOM NAV
            ====================================================== --}}

            <div class="shrink-0 border-t border-[#E4EFF2] p-3">

                <a href="/settings"
                    class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                    :class="sidebarCollapsed ? 'justify-center' : ''" title="Settings">

                    <x-tabler-settings class="h-[18px] w-[18px] shrink-0" />

                    <span x-show="!sidebarCollapsed">
                        Settings
                    </span>

                </a>


                <button
                    class="mt-1 flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718A96] transition hover:bg-white hover:text-[#4F899E]"
                    :class="sidebarCollapsed ? 'justify-center' : ''">

                    <x-tabler-help-circle class="h-[18px] w-[18px] shrink-0" />

                    <span x-show="!sidebarCollapsed">
                        Help & support
                    </span>

                </button>


                {{-- Profile --}}
                <div class="mt-3 border-t border-[#E8F0F2] pt-3" :class="sidebarCollapsed ? 'flex justify-center' : ''">

                    <button class="flex w-full items-center gap-3 rounded-xl p-2 transition hover:bg-white"
                        :class="sidebarCollapsed ? 'justify-center' : ''">

                        <div
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#DDEFF4] text-[10px] font-bold text-[#5A94A7]">
                            AR
                        </div>

                        <div x-show="!sidebarCollapsed" class="min-w-0 flex-1 text-left">

                            <div class="truncate text-xs font-semibold text-[#496A77]">
                                Ari Rivers
                            </div>

                            <div class="truncate text-[10px] text-[#9AAAB0]">
                                Personal sanctuary
                            </div>

                        </div>

                        <x-tabler-dots x-show="!sidebarCollapsed" class="h-4 w-4 shrink-0 text-[#A4B4BA]" />

                    </button>

                </div>

            </div>

        </aside>



        {{-- =========================================================
        MOBILE TOP BAR
        ========================================================== --}}

        <header
            class="sticky top-0 z-30 flex h-[68px] items-center justify-between border-b border-[#DCECEF] bg-[#F4FAFC]/90 px-4 backdrop-blur-xl lg:hidden">

            <button @click="sidebarOpen = true"
                class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-[#628795] shadow-sm">
                <x-tabler-menu-2 class="h-5 w-5" />
            </button>


            <a href="/dashboard" class="flex items-center gap-2">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#DDF2F7] text-[#5A9FB6]">
                    <x-tabler-moon-stars class="h-5 w-5" />
                </div>

                <span class="text-sm font-semibold text-[#294A5B]">
                    Serenity
                </span>

            </a>


            <button class="relative flex h-10 w-10 items-center justify-center rounded-xl text-[#718C97]">

                <x-tabler-bell class="h-5 w-5" />

                <span class="absolute right-2.5 top-2.5 h-1.5 w-1.5 rounded-full bg-[#67AEC3]"></span>

            </button>

        </header>



        {{-- =========================================================
        PAGE CONTENT
        ========================================================== --}}

        <div class="min-h-screen transition-all duration-300"
            :class="sidebarCollapsed ? 'lg:pl-[82px]' : 'lg:pl-[260px]'">

            {{-- Desktop top header --}}
            <header
                class="sticky top-0 z-30 hidden h-[76px] border-b border-[#DCECEF] bg-[#F4FAFC]/90 backdrop-blur-xl lg:block">

                <div class="flex h-full items-center justify-between px-8">

                    {{-- Search --}}
                    <div class="flex max-w-xl flex-1">

                        <button
                            class="flex w-full max-w-[430px] items-center gap-3 rounded-xl border border-[#DCECEF] bg-white/60 px-4 py-2.5 text-left text-sm text-[#91A6AE] transition hover:border-[#C5E0E7] hover:bg-white">

                            <x-tabler-search class="h-4 w-4" />

                            <span>
                                Search your sanctuary...
                            </span>

                            <span
                                class="ml-auto rounded-md bg-[#F0F6F8] px-2 py-1 text-[9px] font-semibold text-[#9BAEB5]">
                                ⌘ K
                            </span>

                        </button>

                    </div>


                    {{-- Header actions --}}
                    <div class="flex items-center gap-3">

                        {{-- New --}}
                        <button
                            class="flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-4 py-2.5 text-xs font-semibold text-white shadow-sm transition hover:bg-[#4C99B4]">

                            <x-tabler-plus class="h-4 w-4" />

                            New reflection

                        </button>


                        <button
                            class="relative flex h-10 w-10 items-center justify-center rounded-xl text-[#718C97] transition hover:bg-white">

                            <x-tabler-bell class="h-5 w-5" />

                            <span class="absolute right-2.5 top-2.5 h-1.5 w-1.5 rounded-full bg-[#68B2C6]"></span>

                        </button>


                    </div>

                </div>

            </header>


            {{-- Actual page --}}
            <main>
                {{ $slot ?? '' }}
            </main>

        </div>



        {{-- =========================================================
        MOBILE BOTTOM NAV
        ========================================================== --}}

        <nav
            class="fixed inset-x-0 bottom-0 z-40 border-t border-[#DCECEF] bg-white/95 px-3 pb-[env(safe-area-inset-bottom)] pt-2 shadow-[0_-10px_35px_rgba(55,110,130,0.08)] backdrop-blur-xl lg:hidden">

            <div class="mx-auto flex max-w-lg items-center justify-around">

                <a href="/dashboard"
                    class="flex min-w-[60px] flex-col items-center gap-1 rounded-xl px-2 py-1.5 text-[#4F98AE]">
                    <x-tabler-home-2 class="h-5 w-5" />
                    <span class="text-[9px] font-semibold">
                        Home
                    </span>
                </a>


                <a href="/dashboard/check-in"
                    class="flex min-w-[60px] flex-col items-center gap-1 rounded-xl px-2 py-1.5 text-[#8BA0A8]">
                    <x-tabler-mood-smile class="h-5 w-5" />
                    <span class="text-[9px] font-medium">
                        Check-in
                    </span>
                </a>


                {{-- Center action --}}
                <button
                    class="-mt-7 flex h-14 w-14 items-center justify-center rounded-full border-4 border-[#F4FAFC] bg-[#5AA7C2] text-white shadow-[0_8px_25px_rgba(90,167,194,0.3)]">
                    <x-tabler-plus class="h-6 w-6" />
                </button>


                <a href="/dashboard/journal"
                    class="flex min-w-[60px] flex-col items-center gap-1 rounded-xl px-2 py-1.5 text-[#8BA0A8]">
                    <x-tabler-book-2 class="h-5 w-5" />
                    <span class="text-[9px] font-medium">
                        Journal
                    </span>
                </a>


                <a href="/dashboard/sessions"
                    class="flex min-w-[60px] flex-col items-center gap-1 rounded-xl px-2 py-1.5 text-[#8BA0A8]">
                    <x-tabler-calendar-heart class="h-5 w-5" />
                    <span class="text-[9px] font-medium">
                        Care
                    </span>
                </a>

            </div>

        </nav>

    </div>


    @livewireScripts

</body>

</html>