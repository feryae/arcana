<div class="min-h-screen bg-[#F4FAFC] text-[#294A57]">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="border-b border-[#D8E9EE] bg-[#FBFDFE]">
        <div class="mx-auto max-w-7xl px-6 py-8 lg:px-8">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

                <div>
                    <div class="mb-3 flex items-center gap-2 text-sm font-medium text-[#80969E]">
                        <span>Wellness</span>
                        <x-tabler-chevron-right class="h-4 w-4" />
                        <span class="text-[#4F7F8E]">Stress Reduction</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-tight text-[#294A57] lg:text-4xl">
                        Find your calm
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-[#718A93] lg:text-base">
                        Explore techniques designed to help regulate stress, restore focus,
                        and bring you back to a steadier state.
                    </p>
                </div>

                <div class="flex items-center gap-3">

                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#D8E9EE] bg-white px-4 py-2.5 text-sm font-medium text-[#55727C] shadow-sm transition hover:border-[#BCD8E0] hover:bg-[#F5FAFC]"
                    >
                        <x-tabler-adjustments-horizontal class="h-4 w-4" />
                        Preferences
                    </button>

                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-xl bg-[#4F9DB8] px-4 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-[#438EA9]"
                    >
                        <x-tabler-plus class="h-4 w-4" />
                        Add technique
                    </button>

                </div>

            </div>
        </div>
    </div>


    {{-- =========================================================
        MAIN
    ========================================================== --}}
    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-8 lg:py-10">

        {{-- =====================================================
            QUICK OVERVIEW
        ====================================================== --}}
        <div class="mb-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Categories --}}
            <div class="rounded-2xl border border-[#D8E9EE] bg-white p-5 shadow-[0_2px_10px_rgba(49,95,112,0.04)]">

                <div class="mb-4 flex items-center justify-between">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E7F4F8] text-[#4F8EA3]">
                        <x-tabler-sparkles class="h-5 w-5" />
                    </div>

                    <span class="rounded-full bg-[#EDF7F9] px-2.5 py-1 text-xs font-medium text-[#5B8997]">
                        Library
                    </span>

                </div>

                <p class="text-2xl font-semibold text-[#315F70]">
                    {{ count(\App\Enums\StressReductionTypes::cases()) }}
                </p>

                <p class="mt-1 text-sm text-[#7D9299]">
                    Technique categories
                </p>

            </div>


            {{-- Daily --}}
            <div class="rounded-2xl border border-[#D8E9EE] bg-white p-5 shadow-[0_2px_10px_rgba(49,95,112,0.04)]">

                <div class="mb-4 flex items-center justify-between">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EAF5F6] text-[#4D8995]">
                        <x-tabler-heart-handshake class="h-5 w-5" />
                    </div>

                    <span class="rounded-full bg-[#EFF8F9] px-2.5 py-1 text-xs font-medium text-[#5F8B94]">
                        Daily
                    </span>

                </div>

                <p class="text-2xl font-semibold text-[#365F6B]">
                    6
                </p>

                <p class="mt-1 text-sm text-[#7D9299]">
                    Everyday practices
                </p>

            </div>


            {{-- Fast --}}
            <div class="rounded-2xl border border-[#D8E9EE] bg-white p-5 shadow-[0_2px_10px_rgba(49,95,112,0.04)]">

                <div class="mb-4 flex items-center justify-between">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E7F1F7] text-[#547F99]">
                        <x-tabler-bolt class="h-5 w-5" />
                    </div>

                    <span class="rounded-full bg-[#EDF5F8] px-2.5 py-1 text-xs font-medium text-[#5D7F90]">
                        Fast
                    </span>

                </div>

                <p class="text-2xl font-semibold text-[#3D6374]">
                    3
                </p>

                <p class="mt-1 text-sm text-[#7D9299]">
                    Quick relief techniques
                </p>

            </div>


            {{-- Emergency --}}
            <div class="rounded-2xl border border-[#E9DADB] bg-white p-5 shadow-[0_2px_10px_rgba(49,95,112,0.04)]">

                <div class="mb-4 flex items-center justify-between">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F8EBEC] text-[#9A686D]">
                        <x-tabler-shield-heart class="h-5 w-5" />
                    </div>

                    <span class="rounded-full bg-[#FAEFF0] px-2.5 py-1 text-xs font-medium text-[#936B70]">
                        Support
                    </span>

                </div>

                <p class="text-2xl font-semibold text-[#744F54]">
                    1
                </p>

                <p class="mt-1 text-sm text-[#7D9299]">
                    Emergency category
                </p>

            </div>

        </div>


        {{-- =====================================================
            INTRO / FEATURED
        ====================================================== --}}
        <div class="mb-8 overflow-hidden rounded-3xl border border-[#CFE4EA] bg-[#315F70] shadow-[0_10px_40px_rgba(49,95,112,0.12)]">

            <div class="relative p-7 lg:p-9">

                <div class="absolute -right-16 -top-20 h-64 w-64 rounded-full bg-white/5"></div>
                <div class="absolute -bottom-32 right-24 h-72 w-72 rounded-full bg-white/[0.04]"></div>

                <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">

                    <div class="max-w-2xl">

                        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-3 py-1.5 text-xs font-medium text-[#DCEEF2]">

                            <span class="h-1.5 w-1.5 rounded-full bg-[#9FD2E0]"></span>

                            Your personal calm toolkit

                        </div>

                        <h2 class="text-2xl font-semibold tracking-tight text-white lg:text-3xl">
                            Different moments need different tools.
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-[#C8DEE4] lg:text-base">
                            From a few intentional breaths to grounding exercises and
                            mindful movement, choose a technique that matches how you feel
                            right now.
                        </p>

                    </div>

                    <div class="hidden lg:flex">

                        <div class="flex h-28 w-28 items-center justify-center rounded-full border border-white/10 bg-white/10">

                            <div class="flex h-20 w-20 items-center justify-center rounded-full border border-white/10 bg-white/10">
                                <x-tabler-cloud class="h-9 w-9 text-[#C5E2E9]" />
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            SECTION HEADER
        ====================================================== --}}
        <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

            <div>

                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#8AA1A9]">
                    Explore
                </p>

                <h2 class="mt-1 text-xl font-semibold text-[#315F70]">
                    Stress reduction techniques
                </h2>

            </div>


            <div class="relative">

                <x-tabler-search class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#8AA1A9]" />

                <input
                    type="search"
                    placeholder="Search techniques..."
                    class="w-full rounded-xl border border-[#D8E9EE] bg-white py-2.5 pl-9 pr-4 text-sm text-[#405E68] outline-none transition placeholder:text-[#9AAEB5] focus:border-[#8DBBC8] focus:ring-4 focus:ring-[#4F9DB8]/10 sm:w-64"
                />

            </div>

        </div>


        {{-- =====================================================
            CATEGORY GRID
        ====================================================== --}}
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">

            @foreach (\App\Enums\StressReductionTypes::cases() as $type)

                @php
                    $config = match ($type) {

                        \App\Enums\StressReductionTypes::BREATHING => [
                            'icon' => 'wind',
                            'description' => 'Use intentional breathing patterns to slow down and settle your nervous system.',
                            'count' => 8,
                            'duration' => '2–10 min',
                            'tone' => 'blue',
                            'tag' => 'Quick reset',
                        ],

                        \App\Enums\StressReductionTypes::MINDFULNESS => [
                            'icon' => 'brain',
                            'description' => 'Bring your attention back to the present moment through awareness and observation.',
                            'count' => 12,
                            'duration' => '5–20 min',
                            'tone' => 'sky',
                            'tag' => 'Focus',
                        ],

                        \App\Enums\StressReductionTypes::GROUNDING => [
                            'icon' => 'anchor',
                            'description' => 'Reconnect with your surroundings and the present moment when everything feels overwhelming.',
                            'count' => 7,
                            'duration' => '2–8 min',
                            'tone' => 'cyan',
                            'tag' => 'Reconnect',
                        ],

                        \App\Enums\StressReductionTypes::MOVEMENT => [
                            'icon' => 'walk',
                            'description' => 'Release built-up tension through gentle movement, stretching, and physical activity.',
                            'count' => 9,
                            'duration' => '5–30 min',
                            'tone' => 'teal',
                            'tag' => 'Release',
                        ],

                        \App\Enums\StressReductionTypes::COGNITIVE => [
                            'icon' => 'thought-bubble',
                            'description' => 'Work with stressful thoughts through reframing, reflection, and intentional thinking.',
                            'count' => 6,
                            'duration' => '5–15 min',
                            'tone' => 'indigo',
                            'tag' => 'Reflect',
                        ],

                        \App\Enums\StressReductionTypes::SENSORY => [
                            'icon' => 'eye',
                            'description' => 'Use your senses intentionally to shift attention and create a calmer environment.',
                            'count' => 5,
                            'duration' => '2–10 min',
                            'tone' => 'aqua',
                            'tag' => 'Soothe',
                        ],

                        \App\Enums\StressReductionTypes::EMERGENCY => [
                            'icon' => 'lifebuoy',
                            'description' => 'Immediate coping resources for moments when stress feels intense or difficult to manage.',
                            'count' => 4,
                            'duration' => '1–5 min',
                            'tone' => 'rose',
                            'tag' => 'Immediate',
                        ],

                        \App\Enums\StressReductionTypes::ETC => [
                            'icon' => 'sparkles',
                            'description' => 'Additional practices and techniques that do not fit into a single category.',
                            'count' => 3,
                            'duration' => 'Varies',
                            'tone' => 'slate',
                            'tag' => 'Explore',
                        ],
                    };

                    $tone = match ($config['tone']) {

                        'blue' => [
                            'icon' => 'bg-[#E6F3F7] text-[#4C8EA3]',
                            'tag' => 'bg-[#EDF7F9] text-[#5B8997]',
                            'hover' => 'group-hover:border-[#B8D7E0]',
                        ],

                        'sky' => [
                            'icon' => 'bg-[#E8F2F8] text-[#527F9A]',
                            'tag' => 'bg-[#EEF6FA] text-[#60869A]',
                            'hover' => 'group-hover:border-[#BED5E2]',
                        ],

                        'cyan' => [
                            'icon' => 'bg-[#E5F4F5] text-[#4D8994]',
                            'tag' => 'bg-[#ECF8F8] text-[#5D8E96]',
                            'hover' => 'group-hover:border-[#B8D9DD]',
                        ],

                        'teal' => [
                            'icon' => 'bg-[#E6F3F2] text-[#4F8985]',
                            'tag' => 'bg-[#EDF8F7] text-[#5C8C88]',
                            'hover' => 'group-hover:border-[#B9D8D5]',
                        ],

                        'indigo' => [
                            'icon' => 'bg-[#EAEAF5] text-[#62678D]',
                            'tag' => 'bg-[#F0F0F8] text-[#6D7194]',
                            'hover' => 'group-hover:border-[#C9C9DE]',
                        ],

                        'aqua' => [
                            'icon' => 'bg-[#E7F4F6] text-[#528A96]',
                            'tag' => 'bg-[#EFF8F9] text-[#628F98]',
                            'hover' => 'group-hover:border-[#BEDADD]',
                        ],

                        'rose' => [
                            'icon' => 'bg-[#F5E7E9] text-[#98666D]',
                            'tag' => 'bg-[#FAEFF0] text-[#966A70]',
                            'hover' => 'group-hover:border-[#DEC2C6]',
                        ],

                        default => [
                            'icon' => 'bg-[#EDF2F4] text-[#637A83]',
                            'tag' => 'bg-[#F2F6F7] text-[#6E858D]',
                            'hover' => 'group-hover:border-[#CAD9DE]',
                        ],
                    };
                @endphp


                <a
                    href="#"
                    class="group relative overflow-hidden rounded-2xl border border-[#D8E9EE] bg-white p-5 transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(49,95,112,0.08)] {{ $tone['hover'] }}"
                >

                    {{-- Top --}}
                    <div class="mb-5 flex items-start justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl {{ $tone['icon'] }} transition group-hover:scale-105">

                            @switch($config['icon'])

                                @case('wind')
                                    <x-tabler-wind class="h-6 w-6" />
                                    @break

                                @case('brain')
                                    <x-tabler-brain class="h-6 w-6" />
                                    @break

                                @case('anchor')
                                    <x-tabler-anchor class="h-6 w-6" />
                                    @break

                                @case('walk')
                                    <x-tabler-walk class="h-6 w-6" />
                                    @break

                                @case('thought-bubble')
                                    <x-tabler-message-circle class="h-6 w-6" />
                                    @break

                                @case('eye')
                                    <x-tabler-eye class="h-6 w-6" />
                                    @break

                                @case('lifebuoy')
                                    <x-tabler-lifebuoy class="h-6 w-6" />
                                    @break

                                @default
                                    <x-tabler-sparkles class="h-6 w-6" />

                            @endswitch

                        </div>

                        <span class="rounded-full px-2.5 py-1 text-[11px] font-semibold {{ $tone['tag'] }}">
                            {{ $config['tag'] }}
                        </span>

                    </div>


                    {{-- Content --}}
                    <div>

                        <h3 class="text-lg font-semibold text-[#365E6B]">
                            {{ $type->label() }}
                        </h3>

                        <p class="mt-2 min-h-[72px] text-sm leading-6 text-[#788F97]">
                            {{ $config['description'] }}
                        </p>

                    </div>


                    {{-- Footer --}}
                    <div class="mt-5 flex items-center justify-between border-t border-[#EAF1F3] pt-4">

                        <div class="flex items-center gap-3 text-xs text-[#879BA2]">

                            <span class="inline-flex items-center gap-1.5">
                                <x-tabler-list-details class="h-3.5 w-3.5" />
                                {{ $config['count'] }} techniques
                            </span>

                            <span class="h-1 w-1 rounded-full bg-[#C8D6DB]"></span>

                            <span class="inline-flex items-center gap-1.5">
                                <x-tabler-clock class="h-3.5 w-3.5" />
                                {{ $config['duration'] }}
                            </span>

                        </div>

                        <span class="flex h-8 w-8 items-center justify-center rounded-lg text-[#8BA2AA] transition group-hover:bg-[#EDF6F8] group-hover:text-[#4F8FA4]">
                            <x-tabler-arrow-up-right class="h-4 w-4" />
                        </span>

                    </div>

                </a>

            @endforeach

        </div>


        {{-- =====================================================
            PERSONALIZED SECTION
        ====================================================== --}}
        <div class="mt-10 grid gap-5 lg:grid-cols-[1.4fr_1fr]">

            {{-- Recommended --}}
            <div class="rounded-2xl border border-[#D8E9EE] bg-white p-6">

                <div class="mb-6 flex items-start justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#8AA1A9]">
                            Suggested
                        </p>

                        <h2 class="mt-1 text-lg font-semibold text-[#315F70]">
                            Start with something gentle
                        </h2>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#E7F4F8] text-[#4F8EA3]">
                        <x-tabler-cloud class="h-4.5 w-4.5" />
                    </div>

                </div>


                <div class="space-y-3">

                    {{-- Breathing --}}
                    <a
                        href="#"
                        class="group flex items-center gap-4 rounded-xl border border-[#E5EEF1] p-4 transition hover:border-[#C5DDE4] hover:bg-[#FAFCFD]"
                    >

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#E6F3F7] text-[#4C8EA3]">
                            <x-tabler-wind class="h-5 w-5" />
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="text-sm font-semibold text-[#405F69]">
                                Box breathing
                            </p>

                            <p class="mt-0.5 text-xs text-[#899CA3]">
                                A short breathing reset · 4 minutes
                            </p>

                        </div>

                        <x-tabler-chevron-right class="h-4 w-4 text-[#A1B0B5] transition group-hover:translate-x-0.5 group-hover:text-[#527B88]" />

                    </a>


                    {{-- Grounding --}}
                    <a
                        href="#"
                        class="group flex items-center gap-4 rounded-xl border border-[#E5EEF1] p-4 transition hover:border-[#C5DDE4] hover:bg-[#FAFCFD]"
                    >

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#E5F4F5] text-[#4D8994]">
                            <x-tabler-anchor class="h-5 w-5" />
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="text-sm font-semibold text-[#405F69]">
                                5–4–3–2–1 grounding
                            </p>

                            <p class="mt-0.5 text-xs text-[#899CA3]">
                                Reconnect with your surroundings · 5 minutes
                            </p>

                        </div>

                        <x-tabler-chevron-right class="h-4 w-4 text-[#A1B0B5] transition group-hover:translate-x-0.5 group-hover:text-[#527B88]" />

                    </a>


                    {{-- Mindfulness --}}
                    <a
                        href="#"
                        class="group flex items-center gap-4 rounded-xl border border-[#E5EEF1] p-4 transition hover:border-[#C5DDE4] hover:bg-[#FAFCFD]"
                    >

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#E8F2F8] text-[#527F9A]">
                            <x-tabler-brain class="h-5 w-5" />
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="text-sm font-semibold text-[#405F69]">
                                One-minute mindfulness
                            </p>

                            <p class="mt-0.5 text-xs text-[#899CA3]">
                                Bring attention into the present · 1 minute
                            </p>

                        </div>

                        <x-tabler-chevron-right class="h-4 w-4 text-[#A1B0B5] transition group-hover:translate-x-0.5 group-hover:text-[#527B88]" />

                    </a>

                </div>

            </div>


            {{-- Emergency --}}
            <div class="rounded-2xl border border-[#E8D7D9] bg-[#FDF8F8] p-6">

                <div class="mb-5 flex items-start justify-between">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#F5E7E9] text-[#98666D]">
                        <x-tabler-shield-heart class="h-5 w-5" />
                    </div>

                    <span class="rounded-full bg-[#FAEFF0] px-2.5 py-1 text-[11px] font-semibold text-[#936B70]">
                        Immediate support
                    </span>

                </div>

                <h2 class="text-lg font-semibold text-[#61474C]">
                    Feeling overwhelmed?
                </h2>

                <p class="mt-2 text-sm leading-6 text-[#806F73]">
                    Access grounding and immediate coping techniques designed for
                    moments when stress feels particularly intense.
                </p>

                <a
                    href="#"
                    class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-[#DEC7CA] bg-white px-4 py-2.5 text-sm font-semibold text-[#805B61] transition hover:bg-[#FCF3F4]"
                >
                    Open emergency techniques
                    <x-tabler-arrow-right class="h-4 w-4" />
                </a>

            </div>

        </div>

    </div>

</div>
