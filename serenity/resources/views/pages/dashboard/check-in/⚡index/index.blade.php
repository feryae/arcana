{{-- resources/views/livewire/check-in.blade.php --}}

<div x-data="{
        step: 1,
        total: 5,
        mood: null,
        energy: null,
        emotions: [],
        note: '',
        intention: null,

        next() {
            if (this.step < this.total) {
                this.step++;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },

        back() {
            if (this.step > 1) {
                this.step--;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },

        toggleEmotion(emotion) {
            if (this.emotions.includes(emotion)) {
                this.emotions = this.emotions.filter(item => item !== emotion);
            } else {
                if (this.emotions.length < 5) {
                    this.emotions.push(emotion);
                }
            }
        }
    }" class="min-h-screen bg-[#F4FAFC]">

    {{-- =========================================================
    TOP BAR
    ========================================================== --}}

    <header class="sticky top-0 z-30 border-b border-[#DCECEF]/80 bg-[#F4FAFC]/90 backdrop-blur-xl">

        <div class="mx-auto flex h-[72px] max-w-6xl items-center justify-between px-5 sm:px-8">

            <a href="/dashboard" class="flex items-center gap-3">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#DDF2F7] text-[#5A9FB6]">
                    <x-tabler-moon-stars class="h-5 w-5" />
                </div>

                <div class="hidden sm:block">
                    <div class="text-sm font-semibold text-[#294A5B]">
                        Serenity
                    </div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#91A6AE]">
                        Daily check-in
                    </div>
                </div>

            </a>


            {{-- Progress --}}
            <div class="flex items-center gap-3">

                <span class="text-xs font-medium text-[#8299A3]" x-text="`${step} of ${total}`"></span>

                <div class="h-1.5 w-24 overflow-hidden rounded-full bg-[#DDECEF] sm:w-32">

                    <div class="h-full rounded-full bg-[#69B1C7] transition-all duration-500"
                        :style="`width: ${(step / total) * 100}%`"></div>

                </div>

            </div>


            <a href="/dashboard"
                class="flex h-9 w-9 items-center justify-center rounded-xl text-[#91A6AE] transition hover:bg-white hover:text-[#5A8E9E]">
                <x-tabler-x class="h-5 w-5" />
            </a>

        </div>

    </header>



    {{-- =========================================================
    MAIN
    ========================================================== --}}

    <main
        class="mx-auto flex min-h-[calc(100vh-72px)] max-w-6xl items-start justify-center px-5 py-12 sm:px-8 sm:py-16 lg:py-20">


        {{-- =====================================================
        CHECK-IN CONTAINER
        ====================================================== --}}

        <div class="w-full max-w-3xl">


            {{-- =================================================
            STEP 1 — WELCOME
            ================================================== --}}

            <div x-show="step === 1" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

                <div class="text-center">

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-[22px] bg-[#DDF2F7] text-[#5AA3B9] shadow-sm">
                        <x-tabler-sun class="h-7 w-7" />
                    </div>


                    <div class="mt-8">

                        <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#82A2AD]">
                            Thursday · October 1
                        </span>

                        <h1 class="mt-4 text-4xl font-semibold tracking-[-0.04em] text-[#294A5B] sm:text-5xl">
                            Take a moment for yourself.
                        </h1>

                        <p class="mx-auto mt-5 max-w-lg text-base leading-7 text-[#7C929C]">
                            There are no right answers here. This is simply
                            a small pause to notice what's happening within you.
                        </p>

                    </div>


                    {{-- Quote --}}
                    <div class="mx-auto mt-10 max-w-xl rounded-[25px] border border-[#DCECEF] bg-white/70 p-6">

                        <x-tabler-quote class="mx-auto h-5 w-5 text-[#8FC4D3]" />

                        <p class="mt-3 text-sm italic leading-6 text-[#66828E]">
                            “You don't have to change anything right now.
                            You only have to notice.”
                        </p>

                    </div>


                    <button @click="next()"
                        class="group mt-9 inline-flex items-center gap-3 rounded-2xl bg-[#5AA7C2] px-7 py-4 text-sm font-semibold text-white shadow-[0_14px_35px_rgba(90,167,194,0.2)] transition hover:-translate-y-0.5 hover:bg-[#4B98B4]">

                        Begin today's check-in

                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-white/15">
                            <x-tabler-arrow-right class="h-4 w-4 transition group-hover:translate-x-0.5" />
                        </span>

                    </button>

                </div>

            </div>



            {{-- =================================================
            STEP 2 — MOOD
            ================================================== --}}

            <div x-show="step === 2" x-transition style="display: none;">

                <div class="mx-auto max-w-2xl">

                    <div class="text-center">

                        <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#82A2AD]">
                            First, check in with yourself
                        </span>

                        <h1 class="mt-4 text-4xl font-semibold tracking-[-0.035em] text-[#294A5B]">
                            How are you feeling today?
                        </h1>

                        <p class="mt-4 text-sm text-[#8298A1]">
                            Choose whatever feels closest. You can always change it.
                        </p>

                    </div>


                    {{-- Mood choices --}}
                    <div class="mt-12 grid grid-cols-2 gap-3 sm:grid-cols-5">

                        @foreach ([
                                ['value' => 'very-low', 'emoji' => '🌧️', 'label' => 'Heavy'],
                                ['value' => 'low', 'emoji' => '🌫️', 'label' => 'Low'],
                                ['value' => 'okay', 'emoji' => '☁️', 'label' => 'Okay'],
                                ['value' => 'good', 'emoji' => '🌤️', 'label' => 'Good'],
                                ['value' => 'great', 'emoji' => '☀️', 'label' => 'Bright'],
                            ] as $mood)

                            <button @click="mood = '{{ $mood['value'] }}'"
                                class="group rounded-[25px] border p-5 text-center transition" :class="mood === '{{ $mood['value'] }}'
                                        ? 'border-[#75B8CB] bg-[#E7F5F8] shadow-[0_10px_30px_rgba(90,167,194,0.10)]'
                                        : 'border-[#DCECEF] bg-white hover:border-[#C5E1E8] hover:-translate-y-0.5'">

                                <div class="text-4xl transition duration-300 group-hover:-translate-y-1">
                                    {{ $mood['emoji'] }}
                                </div>

                                <div class="mt-4 text-xs font-semibold" :class="mood === '{{ $mood['value'] }}'
                                            ? 'text-[#4D91A6]'
                                            : 'text-[#718B96]'">
                                    {{ $mood['label'] }}
                                </div>

                            </button>

                        @endforeach

                    </div>


                    {{-- Scale --}}
                    <div class="mt-10">

                        <div class="flex justify-between text-[10px] text-[#9AABB2]">
                            <span>Not great</span>
                            <span>Feeling wonderful</span>
                        </div>

                        <div class="mt-3 flex gap-1.5">

                            @for ($i = 1; $i <= 10; $i++)

                                <button @click="mood = {{ $i }}" class="h-2.5 flex-1 rounded-full transition" :class="mood === {{ $i }}
                                            ? 'bg-[#5AA7C2] scale-y-125'
                                            : 'bg-[#DCECEF] hover:bg-[#BFDDE5]'"></button>

                            @endfor

                        </div>

                    </div>


                    <div class="mt-12 flex justify-between">

                        <button @click="back()"
                            class="inline-flex items-center gap-2 rounded-xl px-4 py-3 text-xs font-semibold text-[#8098A2] hover:bg-white">
                            <x-tabler-arrow-left class="h-4 w-4" />
                            Back
                        </button>

                        <button @click="next()" :disabled="!mood"
                            class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-6 py-3 text-xs font-semibold text-white transition hover:bg-[#4B98B4] disabled:cursor-not-allowed disabled:opacity-40">
                            Continue
                            <x-tabler-arrow-right class="h-4 w-4" />
                        </button>

                    </div>

                </div>

            </div>



            {{-- =================================================
            STEP 3 — EMOTIONS
            ================================================== --}}

            <div x-show="step === 3" x-transition style="display: none;">

                <div class="mx-auto max-w-2xl">

                    <div class="text-center">

                        <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#82A2AD]">
                            Name what you're carrying
                        </span>

                        <h1 class="mt-4 text-4xl font-semibold tracking-[-0.035em] text-[#294A5B]">
                            What's been present today?
                        </h1>

                        <p class="mt-4 text-sm text-[#8298A1]">
                            Pick up to five feelings that resonate with you.
                        </p>

                    </div>


                    {{-- Emotion cloud --}}
                    <div class="mt-10 flex flex-wrap justify-center gap-2.5">

                        @foreach ([
                                'Calm',
                                'Hopeful',
                                'Grateful',
                                'Content',
                                'Curious',
                                'Motivated',
                                'Loved',
                                'Peaceful',
                                'Anxious',
                                'Tired',
                                'Overwhelmed',
                                'Lonely',
                                'Frustrated',
                                'Sad',
                                'Restless',
                                'Numb',
                                'Worried',
                                'Confused',
                            ] as $emotion)

                            <button @click="toggleEmotion('{{ $emotion }}')"
                                class="rounded-full border px-4 py-2.5 text-xs font-medium transition"
                                :class="emotions.includes('{{ $emotion }}')
                                        ? 'border-[#76B8CA] bg-[#E3F3F7] text-[#4C8FA5]'
                                        : 'border-[#DCECEF] bg-white text-[#78909A] hover:border-[#BDDDE5] hover:bg-[#F8FCFD]'">
                                {{ $emotion }}
                            </button>

                        @endforeach

                    </div>


                    <div class="mt-7 text-center text-[10px] text-[#A1B0B5]">
                        <span x-text="emotions.length"></span>
                        / 5 selected
                    </div>


                    {{-- Reflection prompt --}}
                    <div class="mt-10 rounded-[25px] border border-[#DCECEF] bg-white p-5">

                        <div class="flex gap-3">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#EAF5F7] text-[#67A5B7]">
                                <x-tabler-sparkles class="h-4 w-4" />
                            </div>

                            <div>

                                <p class="text-xs font-semibold text-[#587985]">
                                    There's no need to label everything.
                                </p>

                                <p class="mt-1 text-xs leading-5 text-[#91A2A9]">
                                    Choose only the words that feel useful to you today.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="mt-10 flex justify-between">

                        <button @click="back()"
                            class="inline-flex items-center gap-2 rounded-xl px-4 py-3 text-xs font-semibold text-[#8098A2] hover:bg-white">
                            <x-tabler-arrow-left class="h-4 w-4" />
                            Back
                        </button>

                        <button @click="next()"
                            class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-6 py-3 text-xs font-semibold text-white transition hover:bg-[#4B98B4]">
                            Continue
                            <x-tabler-arrow-right class="h-4 w-4" />
                        </button>

                    </div>

                </div>

            </div>



            {{-- =================================================
            STEP 4 — ENERGY + JOURNAL
            ================================================== --}}

            <div x-show="step === 4" x-transition style="display: none;">

                <div class="mx-auto max-w-2xl">

                    <div class="text-center">

                        <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#82A2AD]">
                            A little deeper
                        </span>

                        <h1 class="mt-4 text-4xl font-semibold tracking-[-0.035em] text-[#294A5B]">
                            What does your energy feel like?
                        </h1>

                        <p class="mt-4 text-sm text-[#8298A1]">
                            There are days when the mind and body move at different speeds.
                        </p>

                    </div>


                    {{-- Energy slider --}}
                    <div class="mt-12 rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-8">

                        <div class="flex items-center justify-between">

                            <span class="text-xs font-semibold text-[#66828E]">
                                My energy
                            </span>

                            <span class="text-sm font-semibold text-[#5AA0B5]"
                                x-text="energy ? `${energy}/10` : 'Choose'"></span>

                        </div>


                        <input type="range" min="1" max="10" x-model="energy" class="mt-8 w-full accent-[#5AA7C2]">


                        <div class="mt-3 flex justify-between text-[10px] text-[#9AABB2]">

                            <span>
                                Completely drained
                            </span>

                            <span>
                                Full of energy
                            </span>

                        </div>

                    </div>


                    {{-- Journal --}}
                    <div class="mt-5 rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-8">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#EAF5F7] text-[#68A4B5]">
                                <x-tabler-feather class="h-4 w-4" />
                            </div>

                            <div>

                                <h2 class="text-sm font-semibold text-[#506F7B]">
                                    Is there anything you'd like to share?
                                </h2>

                                <p class="mt-1 text-[10px] text-[#9AAAB1]">
                                    Completely optional. This is just for you.
                                </p>

                            </div>

                        </div>


                        <textarea x-model="note" rows="5" placeholder="Let your thoughts wander..."
                            class="mt-5 w-full resize-none rounded-2xl border border-[#E1ECEF] bg-[#F9FCFD] p-4 text-sm leading-6 text-[#58727D] outline-none placeholder:text-[#B2C0C5] focus:border-[#A9D3DE] focus:ring-4 focus:ring-[#DDF1F5]"></textarea>


                        <div class="mt-2 text-right text-[10px] text-[#A5B2B7]">
                            <span x-text="note.length"></span> characters
                        </div>

                    </div>


                    <div class="mt-10 flex justify-between">

                        <button @click="back()"
                            class="inline-flex items-center gap-2 rounded-xl px-4 py-3 text-xs font-semibold text-[#8098A2] hover:bg-white">
                            <x-tabler-arrow-left class="h-4 w-4" />
                            Back
                        </button>

                        <button @click="next()"
                            class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-6 py-3 text-xs font-semibold text-white transition hover:bg-[#4B98B4]">
                            Continue
                            <x-tabler-arrow-right class="h-4 w-4" />
                        </button>

                    </div>

                </div>

            </div>



            {{-- =================================================
            STEP 5 — INTENTION
            ================================================== --}}

            <div x-show="step === 5" x-transition style="display: none;">

                <div class="mx-auto max-w-2xl">

                    <div class="text-center">

                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-[22px] bg-[#DDF2F7] text-[#5AA3B9]">
                            <x-tabler-sparkles class="h-7 w-7" />
                        </div>

                        <span class="mt-7 block text-[10px] font-bold uppercase tracking-[0.25em] text-[#82A2AD]">
                            One last thing
                        </span>

                        <h1 class="mt-4 text-4xl font-semibold tracking-[-0.035em] text-[#294A5B]">
                            What do you need today?
                        </h1>

                        <p class="mt-4 text-sm text-[#8298A1]">
                            Not what you should do. Just what might help.
                        </p>

                    </div>


                    <div class="mt-10 grid gap-3 sm:grid-cols-2">

                        @foreach ([
                                ['value' => 'slow-down', 'icon' => 'wind', 'title' => 'A slower day', 'text' => 'Permission to pause and breathe.'],
                                ['value' => 'connection', 'icon' => 'heart-handshake', 'title' => 'Connection', 'text' => 'Someone or something that feels grounding.'],
                                ['value' => 'clarity', 'icon' => 'compass', 'title' => 'A little clarity', 'text' => `Space to understand what I'm feeling.`],
                                ['value' => 'encouragement', 'icon' => 'sun', 'title' => 'Encouragement', 'text' => 'A reminder that I can keep going.'],
                            ] as $item)

                            <button @click="intention = '{{ $item['value'] }}'"
                                class="flex items-start gap-4 rounded-[24px] border bg-white p-5 text-left transition"
                                :class="intention === '{{ $item['value'] }}'
                                        ? 'border-[#76B8CA] bg-[#E8F5F7] shadow-sm'
                                        : 'border-[#DCECEF] hover:border-[#C5E1E8]'">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl" :class="intention === '{{ $item['value'] }}'
                                            ? 'bg-white text-[#5AA0B5]'
                                            : 'bg-[#F1F7F8] text-[#7899A4]'">

                                    @if ($item['icon'] === 'wind')
                                        <x-tabler-wind class="h-5 w-5" />
                                    @elseif ($item['icon'] === 'heart-handshake')
                                        <x-tabler-heart-handshake class="h-5 w-5" />
                                    @elseif ($item['icon'] === 'compass')
                                        <x-tabler-compass class="h-5 w-5" />
                                    @else
                                        <x-tabler-sun class="h-5 w-5" />
                                    @endif

                                </div>


                                <div>

                                    <h3 class="text-sm font-semibold text-[#506F7B]">
                                        {{ $item['title'] }}
                                    </h3>

                                    <p class="mt-1 text-xs leading-5 text-[#92A3AA]">
                                        {{ $item['text'] }}
                                    </p>

                                </div>

                            </button>

                        @endforeach

                    </div>


                    {{-- Submit --}}
                    <button @click="/* Livewire submit here */"
                        class="mt-8 flex w-full items-center justify-center gap-3 rounded-2xl bg-[#5AA7C2] py-4 text-sm font-semibold text-white shadow-[0_14px_35px_rgba(90,167,194,0.2)] transition hover:-translate-y-0.5 hover:bg-[#4B98B4]">

                        Complete today's check-in

                        <x-tabler-sparkles class="h-4 w-4" />

                    </button>


                    <p class="mt-4 text-center text-[10px] leading-5 text-[#A0AFB5]">
                        Your reflections are private and belong to you.
                    </p>


                    <div class="mt-8 flex justify-center">

                        <button @click="back()"
                            class="inline-flex items-center gap-2 text-xs font-semibold text-[#8098A2]">
                            <x-tabler-arrow-left class="h-4 w-4" />
                            Go back
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </main>



    {{-- =========================================================
    MOBILE SAFE AREA
    ========================================================== --}}

    <div class="h-8 sm:hidden"></div>

</div>