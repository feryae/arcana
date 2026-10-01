{{-- guests/⚡index/index.blade.php --}}
@php
    use App\Models\Guest;
    use Carbon\Carbon;

    $stats = $this->stats;

    $tierBadge = [
        'Gold' => 'bg-[#FFF4DD] text-[#9A762B]',
        'Silver' => 'bg-[#E8F0E5] text-[#5E8067]',
        'Member' => 'bg-[#F3F4F2] text-[#718076]',
    ];
    $tierBar = ['Gold' => 'bg-[#D8B95F]', 'Silver' => 'bg-[#5E8067]', 'Member' => 'bg-[#8FA58B]'];
    $avatars = [
        'bg-[#294936] text-white',
        'bg-[#F1ECE5] text-[#806A49]',
        'bg-[#E8F0E5] text-[#294936]',
        'bg-[#FDEFE7] text-[#A06B48]',
        'bg-[#EEF2F0] text-[#5E8067]',
    ];
    $seatIcon = ['fireplace' => 'flame', 'window' => 'sun', 'quiet_corner' => 'moon', 'bar' => 'beer'];
    $lastVisit = fn ($v) => $v ? Carbon::parse($v)->format('M j') : 'None yet';
    $tabIcons = [
        'All Guests' => 'users', 'Profiles' => 'user-circle', 'Visit History' => 'history',
        'Preferences' => 'heart', 'Loyalty' => 'crown',
    ];
@endphp

<div class="space-y-8">

    {{-- ========================= HERO ========================= --}}
    <section class="relative overflow-hidden rounded-[2rem] border border-[#DCE5DC] bg-[#F8FAF6]">
        <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-[#E8F0E5] blur-3xl"></div>
        <div class="absolute -bottom-32 left-1/3 h-64 w-64 rounded-full bg-[#F2EBDD] blur-3xl"></div>

        <div class="relative p-6 sm:p-8 lg:p-10">
            <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">

                <div class="max-w-2xl">
                    <div class="mb-4 flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.18em] text-[#8FA58B]">
                        <span>Manage</span>
                        <x-tabler-chevron-right class="h-3.5 w-3.5" />
                        <span>Guest relations</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#294936] text-white shadow-sm">
                            <x-tabler-users class="h-5 w-5" />
                        </div>
                        <h1 class="text-3xl font-semibold tracking-tight text-[#183524] sm:text-4xl">Your guests</h1>
                    </div>

                    <p class="mt-4 max-w-xl text-sm leading-6 text-[#718076] sm:text-base">
                        Know who walks through your doors, remember what they love,
                        and turn every return visit into a familiar experience.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <button type="button" wire:click="export" wire:loading.attr="disabled" wire:target="export"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#DCE5DC] bg-white px-4 py-2.5 text-sm font-medium text-[#294936] shadow-sm transition hover:border-[#C8D8C9] hover:bg-[#FCFDFB] disabled:opacity-60">
                        <x-tabler-download class="h-4 w-4" />
                        Export
                    </button>
                    <button type="button" wire:click="openCreate"
                        class="inline-flex items-center gap-2 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#183524]">
                        <x-tabler-user-plus class="h-4 w-4" />
                        Add guest
                    </button>
                </div>
            </div>

            {{-- Guest pulse --}}
            <div class="mt-8 grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ([
                    ['Total guests', number_format($stats['total']), 'Across your dining history', 'users', 'bg-[#E8F0E5]', 'text-[#5E8067]'],
                    ['Returning', $stats['returning_pct'] . '%', 'Guests who came back', 'repeat', 'bg-[#E8F0E5]', 'text-[#5E8067]'],
                    ['New this month', number_format($stats['new_month']), 'First-time guests', 'sparkles', 'bg-[#F2EBDD]', 'text-[#9A762B]'],
                    ['Gold members', number_format($stats['gold']), 'Your most loyal circle', 'crown', 'bg-[#FFF4DD]', 'text-[#9A762B]'],
                ] as [$label, $value, $hint, $icon, $iconBg, $iconColor])
                    <div class="rounded-2xl border border-[#DCE5DC] bg-white/80 p-4 backdrop-blur">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-medium text-[#718076]">{{ $label }}</span>
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg {{ $iconBg }}">
                                <x-dynamic-component :component="'tabler-' . $icon" class="h-4 w-4 {{ $iconColor }}" />
                            </div>
                        </div>
                        <p class="mt-3 text-2xl font-semibold tracking-tight text-[#183524]">{{ $value }}</p>
                        <p class="mt-1 text-xs text-[#8FA58B]">{{ $hint }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========================= VIEW NAVIGATION ========================= --}}
    <div class="flex items-center gap-2 overflow-x-auto pb-1">
        @foreach (['All Guests', 'Profiles', 'Visit History', 'Preferences', 'Loyalty'] as $item)
            <button wire:click="setView('{{ $item }}')" wire:key="tab-{{ $item }}"
                class="inline-flex shrink-0 items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-medium transition
                    {{ $view === $item
                        ? 'bg-[#294936] text-white shadow-sm'
                        : 'border border-[#DCE5DC] bg-white text-[#718076] hover:border-[#C8D8C9] hover:bg-[#F8FAF6] hover:text-[#294936]' }}">
                <x-dynamic-component :component="'tabler-' . $tabIcons[$item]" class="h-4 w-4" />
                {{ $item }}
            </button>
        @endforeach
    </div>

    {{-- ========================= WORKSPACE ========================= --}}

    @if ($view === 'All Guests' || $view === 'Profiles')

        @php $list = $view === 'Profiles' ? $this->profiles : $this->guests; @endphp

        <div class="space-y-5">

            @if ($view === 'Profiles')
                <div class="flex flex-col gap-1">
                    <h2 class="text-lg font-semibold text-[#183524]">Guest profiles</h2>
                    <p class="text-sm text-[#718076]">Your most frequent guests and how they dine.</p>
                </div>
            @else
                {{-- Toolbar --}}
                <div class="rounded-[1.5rem] border border-[#DCE5DC] bg-white p-4 shadow-sm">
                    <div class="flex flex-col gap-3 lg:flex-row lg:items-center">

                        <div class="relative flex-1">
                            <x-tabler-search class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-[#8A968D]" />
                            <input type="search" wire:model.live.debounce.300ms="search"
                                placeholder="Search name, email, phone or favorite dish…"
                                class="w-full rounded-xl border border-[#DCE5DC] bg-[#F8FAF6] py-2.5 pl-10 pr-4 text-sm text-[#183524] placeholder:text-[#9AA79D] focus:border-[#5E8067] focus:outline-none focus:ring-2 focus:ring-[#E8F0E5]">
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <select wire:model.live="tier"
                                class="rounded-xl border border-[#DCE5DC] bg-white px-3 py-2.5 text-sm text-[#294936] focus:border-[#5E8067] focus:outline-none">
                                <option value="">All tiers</option>
                                <option>Gold</option>
                                <option>Silver</option>
                                <option>Member</option>
                            </select>

                            <select wire:model.live="diet"
                                class="rounded-xl border border-[#DCE5DC] bg-white px-3 py-2.5 text-sm text-[#294936] focus:border-[#5E8067] focus:outline-none">
                                <option value="">Any diet</option>
                                @foreach (Guest::DIETARY as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>

                            <select wire:model.live="sort"
                                class="rounded-xl border border-[#DCE5DC] bg-white px-3 py-2.5 text-sm text-[#294936] focus:border-[#5E8067] focus:outline-none">
                                <option value="recent">Recent visit</option>
                                <option value="visits">Most visits</option>
                                <option value="points">Most points</option>
                                <option value="name">Name A–Z</option>
                            </select>

                            @if ($search !== '' || $tier !== '' || $diet !== '')
                                <button wire:click="clearFilters"
                                    class="inline-flex items-center gap-1.5 rounded-xl px-3 py-2.5 text-sm font-medium text-[#718076] hover:bg-[#F8FAF6] hover:text-[#294936]">
                                    <x-tabler-x class="h-4 w-4" /> Clear
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if ($list->isEmpty())
                <div class="rounded-[1.5rem] border border-dashed border-[#DCE5DC] bg-white p-10 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#E8F0E5]">
                        <x-tabler-users class="h-5 w-5 text-[#5E8067]" />
                    </div>
                    <p class="mt-4 text-sm font-semibold text-[#183524]">No guests found</p>
                    <p class="mt-1 text-xs text-[#8A968D]">Try a different search, or add a new guest.</p>
                </div>
            @else
                <div wire:loading.class="opacity-60" wire:target="search,tier,diet,sort,gotoPage,nextPage,previousPage"
                    class="grid gap-4 transition-opacity sm:grid-cols-2 xl:grid-cols-3">

                    @foreach ($list as $g)
                        <button wire:click="selectGuest({{ $g->id }})" wire:key="guest-{{ $view }}-{{ $g->id }}"
                            class="group rounded-[1.5rem] border border-[#DCE5DC] bg-white p-5 text-left shadow-sm transition hover:-translate-y-0.5 hover:border-[#BFD0C1] hover:shadow-md">

                            <div class="flex items-start justify-between">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl text-sm font-semibold {{ $avatars[$g->id % count($avatars)] }}">
                                    {{ $g->initials }}
                                </div>
                                <span class="rounded-full px-2.5 py-1 text-[10px] font-semibold {{ $tierBadge[$g->tier] }}">
                                    {{ $g->tier }}
                                </span>
                            </div>

                            <div class="mt-5">
                                <div class="flex items-center gap-2">
                                    <h3 class="truncate font-semibold text-[#183524] group-hover:text-[#294936]">{{ $g->name }}</h3>
                                    @if ($g->tier === 'Gold')
                                        <x-tabler-rosette-discount-check class="h-4 w-4 shrink-0 text-[#9A762B]" />
                                    @endif
                                </div>
                                <p class="mt-1 truncate text-xs text-[#8A968D]">{{ $g->email ?: ($g->phone ?: 'No contact on file') }}</p>
                            </div>

                            <div class="mt-5 grid grid-cols-3 gap-2">
                                <div class="rounded-xl bg-[#F8FAF6] p-3">
                                    <p class="text-sm font-semibold text-[#294936]">{{ $g->visits_count }}</p>
                                    <p class="mt-1 text-[9px] uppercase tracking-wider text-[#9AA79D]">Visits</p>
                                </div>
                                <div class="rounded-xl bg-[#F8FAF6] p-3">
                                    <p class="text-sm font-semibold text-[#294936]">{{ $g->avg_party ? round($g->avg_party) : '–' }}</p>
                                    <p class="mt-1 text-[9px] uppercase tracking-wider text-[#9AA79D]">Avg party</p>
                                </div>
                                <div class="rounded-xl bg-[#F8FAF6] p-3">
                                    <p class="text-sm font-semibold text-[#294936]">{{ $lastVisit($g->last_visit_at) }}</p>
                                    <p class="mt-1 text-[9px] uppercase tracking-wider text-[#9AA79D]">Last visit</p>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center gap-2 text-xs text-[#718076]">
                                <x-dynamic-component :component="'tabler-' . ($seatIcon[$g->seating_preference] ?? 'sparkles')" class="h-4 w-4 shrink-0 text-[#5E8067]" />
                                <span class="truncate">
                                    {{ $g->favorite_item ?: (Guest::SEATING[$g->seating_preference] ?? 'No preferences noted') }}
                                </span>
                            </div>
                        </button>
                    @endforeach
                </div>

                @if ($view === 'All Guests')
                    <div>{{ $this->guests->links() }}</div>
                @endif
            @endif
        </div>

    @elseif ($view === 'Visit History')

        @php $summary = $this->visitSummary; @endphp

        <div class="grid gap-5 xl:grid-cols-[minmax(0,1fr)_300px]">

            <section class="rounded-[1.5rem] border border-[#DCE5DC] bg-white shadow-sm">
                <div class="border-b border-[#DCE5DC] p-5">
                    <h2 class="text-sm font-semibold text-[#183524]">Recent visits</h2>
                    <p class="mt-1 text-xs text-[#8A968D]">A timeline of recent guest activity.</p>
                </div>

                <div class="divide-y divide-[#EEF2EE]">
                    @forelse ($this->visits as $visit)
                        <button wire:click="selectGuest({{ $visit->guest_id }})" wire:key="visit-{{ $visit->id }}"
                            class="flex w-full gap-4 p-5 text-left transition hover:bg-[#FCFDFB]">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-xs font-semibold {{ $avatars[$visit->guest_id % count($avatars)] }}">
                                {{ $visit->guest?->initials }}
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-col justify-between gap-2 sm:flex-row">
                                    <div>
                                        <p class="text-sm font-semibold text-[#183524]">{{ $visit->guest?->name ?? 'Removed guest' }}</p>
                                        <p class="mt-0.5 text-xs text-[#8A968D]">
                                            {{ $visit->table?->name ?? 'No table' }} · Party of {{ $visit->party_size }}
                                            · {{ $visit->duration_minutes }} min
                                        </p>
                                    </div>
                                    <p class="text-xs text-[#9AA79D]">{{ $visit->seated_at->format('M j · g:i A') }}</p>
                                </div>

                                @if ($visit->notes || $visit->guest?->favorite_item)
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        @if ($visit->guest?->favorite_item)
                                            <span class="rounded-full bg-[#F8FAF6] px-2.5 py-1 text-[10px] text-[#718076]">{{ $visit->guest->favorite_item }}</span>
                                        @endif
                                        @if ($visit->notes)
                                            <span class="rounded-full bg-[#F2EBDD] px-2.5 py-1 text-[10px] text-[#9A762B]">{{ $visit->notes }}</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </button>
                    @empty
                        <p class="p-8 text-center text-sm text-[#8A968D]">No seated visits recorded yet.</p>
                    @endforelse
                </div>
            </section>

            <aside class="space-y-4">
                <div class="rounded-[1.5rem] border border-[#DCE5DC] bg-[#294936] p-5 text-white">
                    <p class="text-[10px] font-semibold uppercase tracking-[0.16em] text-white/50">This month</p>
                    <p class="mt-3 text-3xl font-semibold">{{ number_format($summary['count']) }}</p>
                    <p class="mt-1 text-xs text-white/60">recorded guest visits</p>
                    <div class="mt-5 h-1.5 overflow-hidden rounded-full bg-white/10">
                        <div class="h-full rounded-full bg-[#D8C78A]" style="width: {{ $summary['returning_pct'] }}%"></div>
                    </div>
                    <p class="mt-2 text-[10px] text-white/50">{{ $summary['returning_pct'] }}% from returning guests</p>
                </div>

                <div class="rounded-[1.5rem] border border-[#DCE5DC] bg-white p-5">
                    <h3 class="text-xs font-semibold text-[#294936]">Popular visit times</h3>
                    <p class="mt-0.5 text-[10px] text-[#9AA79D]">Last 90 days</p>
                    <div class="mt-4 space-y-4">
                        @foreach ($summary['times'] as $i => $t)
                            <div>
                                <div class="flex justify-between text-[10px]">
                                    <span class="text-[#718076]">{{ $t['label'] }}</span>
                                    <span class="font-semibold text-[#294936]">{{ $t['pct'] }}%</span>
                                </div>
                                <div class="mt-2 h-1.5 rounded-full bg-[#EEF2EE]">
                                    <div class="h-full rounded-full {{ ['bg-[#294936]', 'bg-[#8FA58B]', 'bg-[#D8C78A]'][$i] }}" style="width: {{ $t['pct'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>

    @elseif ($view === 'Preferences')

        @php $prefs = $this->preferences; @endphp

        <div class="space-y-5">
            <div>
                <h2 class="text-lg font-semibold text-[#183524]">Guest preferences</h2>
                <p class="mt-1 text-sm text-[#718076]">Small details that help your staff make every visit feel personal.</p>
            </div>

            <div class="grid gap-5 lg:grid-cols-2">

                {{-- Seating --}}
                <section class="rounded-[1.5rem] border border-[#DCE5DC] bg-white p-5 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F0E5]">
                            <x-tabler-armchair class="h-5 w-5 text-[#5E8067]" />
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-[#294936]">Seating preferences</h3>
                            <p class="mt-0.5 text-xs text-[#8A968D]">Where your guests like to sit</p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-4">
                        @foreach ($prefs['seating'] as $i => $row)
                            <div>
                                <div class="flex justify-between text-xs">
                                    <span class="text-[#718076]">{{ $row['label'] }}</span>
                                    <span class="font-semibold text-[#294936]">{{ $row['pct'] }}%</span>
                                </div>
                                <div class="mt-2 h-2 rounded-full bg-[#EEF2EE]">
                                    <div class="h-full rounded-full {{ ['bg-[#294936]', 'bg-[#5E8067]', 'bg-[#8FA58B]', 'bg-[#D8C78A]'][$i % 4] }}" style="width: {{ $row['pct'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Dietary --}}
                <section class="rounded-[1.5rem] border border-[#DCE5DC] bg-white p-5 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F0E5]">
                            <x-tabler-leaf class="h-5 w-5 text-[#5E8067]" />
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-[#294936]">Dietary preferences</h3>
                            <p class="mt-0.5 text-xs text-[#8A968D]">Food requirements and preferences</p>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-3">
                        @foreach ($prefs['diet'] as $row)
                            <button wire:click="$set('diet', '{{ array_search($row['label'], Guest::DIETARY) }}'); setView('All Guests')"
                                class="rounded-xl bg-[#F8FAF6] p-4 text-left transition hover:bg-[#E8F0E5]">
                                <p class="text-lg font-semibold text-[#294936]">{{ $row['count'] }}</p>
                                <p class="mt-1 text-xs text-[#718076]">{{ $row['label'] }}</p>
                            </button>
                        @endforeach
                    </div>
                </section>

                {{-- Dining style --}}
                <section class="rounded-[1.5rem] border border-[#DCE5DC] bg-white p-5 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F2EBDD]">
                            <x-tabler-mood-smile class="h-5 w-5 text-[#9A762B]" />
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-[#294936]">Dining style</h3>
                            <p class="mt-0.5 text-xs text-[#8A968D]">How guests prefer their experience</p>
                        </div>
                    </div>

                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach ($prefs['styles'] as $row)
                            <div class="flex items-center gap-2 rounded-full border border-[#DCE5DC] bg-[#FCFDFB] px-3 py-2">
                                <span class="text-xs text-[#718076]">{{ $row['label'] }}</span>
                                <span class="text-[10px] font-semibold text-[#294936]">{{ $row['count'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Favorites --}}
                <section class="rounded-[1.5rem] border border-[#DCE5DC] bg-white p-5 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F0E5]">
                            <x-tabler-heart class="h-5 w-5 text-[#5E8067]" />
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-[#294936]">Guest favorites</h3>
                            <p class="mt-0.5 text-xs text-[#8A968D]">Most remembered dishes and drinks</p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-3">
                        @forelse ($prefs['favorites'] as $dish => $count)
                            <div class="flex items-center gap-3 rounded-xl bg-[#F8FAF6] p-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-white">
                                    <x-tabler-flame class="h-4 w-4 text-[#5E8067]" />
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-[#294936]">{{ $dish }}</p>
                                    <p class="mt-0.5 text-[10px] text-[#9AA79D]">{{ $count }} {{ Str::plural('guest', $count) }} marked as favorite</p>
                                </div>
                                <span class="text-xs font-semibold text-[#294936]">{{ $count }}</span>
                            </div>
                        @empty
                            <p class="text-xs text-[#8A968D]">No favorites recorded yet.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>

    @elseif ($view === 'Loyalty')

        @php $total = max(1, $stats['total']); @endphp

        <div class="space-y-5">

            <section class="relative overflow-hidden rounded-[1.5rem] bg-[#294936] p-6 text-white">
                <div class="absolute -right-20 -top-20 h-56 w-56 rounded-full border border-white/10"></div>
                <div class="absolute -right-5 -top-5 h-32 w-32 rounded-full border border-white/10"></div>

                <div class="relative grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <div class="flex items-center gap-2">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/10">
                                <x-tabler-crown class="h-4 w-4 text-[#D8C78A]" />
                            </div>
                            <span class="text-xs font-semibold uppercase tracking-[0.16em] text-white/50">Loyalty program</span>
                        </div>
                        <h2 class="mt-4 text-2xl font-semibold">{{ number_format($stats['gold']) }} {{ Str::plural('guest', $stats['gold']) }} {{ $stats['gold'] === 1 ? 'has' : 'have' }} reached Gold</h2>
                        <p class="mt-2 max-w-xl text-sm leading-6 text-white/60">
                            Your most frequent guests are building a long-term relationship with the house.
                        </p>
                    </div>

                    <div class="relative text-left lg:text-right">
                        <p class="text-4xl font-semibold">{{ number_format($stats['total']) }}</p>
                        <p class="mt-1 text-xs text-white/50">enrolled guests · {{ number_format($stats['points']) }} pts issued</p>
                    </div>
                </div>
            </section>

            <div class="grid gap-4 md:grid-cols-3">
                @foreach ([
                    ['Member', $stats['member'], 'Guests who have joined the loyalty circle.', 'user', 'bg-[#F3F4F2]', 'text-[#718076]', 'bg-[#8FA58B]', 'bg-[#EEF2EE]', 'border-[#DCE5DC] bg-white'],
                    ['Silver', $stats['silver'], 'Guests with regular dining activity.', 'star', 'bg-[#E8F0E5]', 'text-[#5E8067]', 'bg-[#5E8067]', 'bg-[#EEF2EE]', 'border-[#DCE5DC] bg-white'],
                    ['Gold', $stats['gold'], 'Your most frequent returning guests.', 'crown', 'bg-[#FFF4DD]', 'text-[#9A762B]', 'bg-[#D8B95F]', 'bg-[#F1E8D2]', 'border-[#E7D9B8] bg-[#FFFCF4]'],
                ] as [$label, $count, $desc, $icon, $iconBg, $iconColor, $bar, $track, $card])
                    <button wire:click="$set('tier', '{{ $label }}'); setView('All Guests')"
                        class="rounded-[1.5rem] border p-5 text-left transition hover:-translate-y-0.5 hover:shadow-md {{ $card }}">
                        <div class="flex items-center justify-between">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl {{ $iconBg }}">
                                <x-dynamic-component :component="'tabler-' . $icon" class="h-5 w-5 {{ $iconColor }}" />
                            </div>
                            <span class="text-xs font-semibold {{ $iconColor === 'text-[#718076]' ? 'text-[#294936]' : $iconColor }}">{{ $count }}</span>
                        </div>
                        <p class="mt-5 text-sm font-semibold text-[#183524]">{{ $label }}</p>
                        <p class="mt-1 text-xs leading-5 text-[#8A968D]">{{ $desc }}</p>
                        <div class="mt-4 h-1.5 rounded-full {{ $track }}">
                            <div class="h-full rounded-full {{ $bar }}" style="width: {{ round($count / $total * 100) }}%"></div>
                        </div>
                    </button>
                @endforeach
            </div>

            <section class="overflow-hidden rounded-[1.5rem] border border-[#DCE5DC] bg-white shadow-sm">
                <div class="border-b border-[#DCE5DC] p-5">
                    <h2 class="text-sm font-semibold text-[#183524]">Loyalty members</h2>
                    <p class="mt-1 text-xs text-[#8A968D]">Guests closest to their next reward tier.</p>
                </div>

                <div class="divide-y divide-[#EEF2EE]">
                    @forelse ($this->loyaltyMembers as $g)
                        <div wire:key="loyal-{{ $g->id }}" class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center">
                            <button wire:click="selectGuest({{ $g->id }})"
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl text-sm font-semibold {{ $avatars[$g->id % count($avatars)] }}">
                                {{ $g->initials }}
                            </button>

                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2">
                                    <p class="truncate text-sm font-semibold text-[#183524]">{{ $g->name }}</p>
                                    <span class="rounded-full px-2 py-0.5 text-[9px] font-semibold {{ $tierBadge[$g->tier] }}">{{ $g->tier }}</span>
                                </div>
                                <p class="mt-1 text-xs text-[#8A968D]">{{ $g->visits_count }} visits · {{ number_format($g->loyalty_points) }} points</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-full sm:w-44">
                                    <div class="flex justify-between text-[10px]">
                                        <span class="text-[#9AA79D]">{{ $g->tier === 'Gold' ? 'Next reward' : 'Next tier' }}</span>
                                        <span class="font-semibold text-[#294936]">{{ $g->tier_progress }}%</span>
                                    </div>
                                    <div class="mt-2 h-1.5 rounded-full bg-[#EEF2EE]">
                                        <div class="h-full rounded-full {{ $tierBar[$g->tier] }}" style="width: {{ $g->tier_progress }}%"></div>
                                    </div>
                                </div>

                                <button wire:click="adjustPoints({{ $g->id }}, 50)" title="Award 50 points"
                                    class="shrink-0 rounded-xl border border-[#DCE5DC] px-2.5 py-2 text-[11px] font-semibold text-[#294936] hover:bg-[#F8FAF6]">
                                    +50
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="p-8 text-center text-sm text-[#8A968D]">No guests have earned points yet.</p>
                    @endforelse
                </div>
            </section>
        </div>

    @endif


    {{-- ========================= GUEST DETAIL DRAWER ========================= --}}
    @if ($g = $this->selectedGuest)
        <div class="fixed inset-0 z-40 flex justify-end bg-[#183524]/30 backdrop-blur-[2px]" wire:key="drawer-{{ $g->id }}">
            <div class="absolute inset-0" wire:click="closeGuest"></div>

            <aside class="relative flex h-full w-full max-w-md flex-col overflow-y-auto border-l border-[#DCE5DC] bg-white shadow-xl">

                <div class="flex items-start justify-between border-b border-[#DCE5DC] p-6">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl text-base font-semibold {{ $avatars[$g->id % count($avatars)] }}">
                            {{ $g->initials }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-[#183524]">{{ $g->name }}</h3>
                            <span class="mt-1 inline-block rounded-full px-2.5 py-1 text-[10px] font-semibold {{ $tierBadge[$g->tier] }}">{{ $g->tier }}</span>
                        </div>
                    </div>
                    <button wire:click="closeGuest" class="rounded-lg p-1.5 text-[#8A968D] hover:bg-[#F8FAF6]">
                        <x-tabler-x class="h-5 w-5" />
                    </button>
                </div>

                <div class="space-y-6 p-6">

                    <div class="grid grid-cols-3 gap-2">
                        <div class="rounded-xl bg-[#F8FAF6] p-3">
                            <p class="text-sm font-semibold text-[#294936]">{{ $g->visits_count }}</p>
                            <p class="mt-1 text-[9px] uppercase tracking-wider text-[#9AA79D]">Visits</p>
                        </div>
                        <div class="rounded-xl bg-[#F8FAF6] p-3">
                            <p class="text-sm font-semibold text-[#294936]">{{ number_format($g->loyalty_points) }}</p>
                            <p class="mt-1 text-[9px] uppercase tracking-wider text-[#9AA79D]">Points</p>
                        </div>
                        <div class="rounded-xl bg-[#F8FAF6] p-3">
                            <p class="text-sm font-semibold text-[#294936]">{{ $lastVisit($g->last_visit_at) }}</p>
                            <p class="mt-1 text-[9px] uppercase tracking-wider text-[#9AA79D]">Last visit</p>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-[10px]">
                            <span class="text-[#9AA79D]">{{ $g->tier === 'Gold' ? 'Next reward' : 'Progress to next tier' }}</span>
                            <span class="font-semibold text-[#294936]">{{ $g->tier_progress }}%</span>
                        </div>
                        <div class="mt-2 h-1.5 rounded-full bg-[#EEF2EE]">
                            <div class="h-full rounded-full {{ $tierBar[$g->tier] }}" style="width: {{ $g->tier_progress }}%"></div>
                        </div>
                        <div class="mt-3 flex gap-2">
                            @foreach ([50, 100] as $pts)
                                <button wire:click="adjustPoints({{ $g->id }}, {{ $pts }})"
                                    class="rounded-lg border border-[#DCE5DC] px-3 py-1.5 text-xs font-medium text-[#294936] hover:bg-[#F8FAF6]">+{{ $pts }} pts</button>
                            @endforeach
                        </div>
                    </div>

                    <dl class="space-y-3 text-sm">
                        @foreach ([
                            ['mail', $g->email], ['phone', $g->phone],
                            ['cake', $g->birthday?->format('F j')],
                            ['armchair', Guest::SEATING[$g->seating_preference] ?? null],
                            ['mood-smile', Guest::STYLES[$g->dining_style] ?? null],
                            ['heart', $g->favorite_item],
                        ] as [$icon, $value])
                            @if ($value)
                                <div class="flex items-center gap-3 text-[#294936]">
                                    <x-dynamic-component :component="'tabler-' . $icon" class="h-4 w-4 shrink-0 text-[#5E8067]" />
                                    <span class="truncate">{{ $value }}</span>
                                </div>
                            @endif
                        @endforeach
                    </dl>

                    @if ($g->dietary)
                        <div class="flex flex-wrap gap-2">
                            @foreach ($g->dietary as $d)
                                <span class="rounded-full px-2.5 py-1 text-[11px] font-medium {{ $d === 'nut_allergy' ? 'bg-[#FDEFE7] text-[#A06B48]' : 'bg-[#E8F0E5] text-[#5E8067]' }}">
                                    {{ Guest::DIETARY[$d] ?? $d }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    @if ($g->notes)
                        <div class="rounded-xl bg-[#F2EBDD]/60 p-4 text-sm leading-6 text-[#806A49]">{{ $g->notes }}</div>
                    @endif

                    <div>
                        <h4 class="text-xs font-semibold text-[#294936]">Recent visits</h4>
                        <div class="mt-3 space-y-2">
                            @forelse ($g->reservations as $r)
                                <div class="flex items-center justify-between rounded-xl bg-[#F8FAF6] px-4 py-3 text-xs">
                                    <span class="text-[#294936]">{{ $r->table?->name ?? 'No table' }} · Party of {{ $r->party_size }}</span>
                                    <span class="text-[#9AA79D]">{{ $r->seated_at->format('M j, Y') }}</span>
                                </div>
                            @empty
                                <p class="text-xs text-[#8A968D]">No visits yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="mt-auto border-t border-[#DCE5DC] p-5">
                    @if ($confirmingDelete)
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs text-[#A06B48]">Delete this guest for good?</p>
                            <div class="flex gap-2">
                                <button wire:click="$set('confirmingDelete', false)" class="rounded-xl border border-[#DCE5DC] px-3 py-2 text-xs font-medium text-[#718076]">Cancel</button>
                                <button wire:click="delete" class="rounded-xl bg-[#A06B48] px-3 py-2 text-xs font-semibold text-white">Delete</button>
                            </div>
                        </div>
                    @else
                        <div class="flex gap-3">
                            <button wire:click="edit({{ $g->id }})"
                                class="flex-1 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#183524]">Edit guest</button>
                            @if ($g->reservations_count === 0 && $g->waitlist_entries_count === 0)
                                <button wire:click="$set('confirmingDelete', true)" title="Delete"
                                    class="rounded-xl border border-[#DCE5DC] px-3 text-[#A06B48] hover:bg-[#FDEFE7]">
                                    <x-tabler-trash class="h-4 w-4" />
                                </button>
                            @else
                                <span title="Guests with booking history can't be deleted"
                                    class="flex items-center rounded-xl border border-[#EEF2EE] px-3 text-[#C8D8C9]">
                                    <x-tabler-lock class="h-4 w-4" />
                                </span>
                            @endif
                        </div>
                    @endif
                </div>
            </aside>
        </div>
    @endif


    {{-- ========================= ADD / EDIT MODAL ========================= --}}
    @if ($showForm)
        <div class="fixed inset-0 z-50 flex items-end justify-center bg-[#183524]/40 p-4 backdrop-blur-[2px] sm:items-center">
            <div class="absolute inset-0" wire:click="closeForm"></div>

            <form wire:submit="save" class="relative flex max-h-[92vh] w-full max-w-xl flex-col overflow-hidden rounded-[1.5rem] bg-white shadow-xl">

                <div class="flex items-center justify-between border-b border-[#DCE5DC] p-5">
                    <h3 class="text-base font-semibold text-[#183524]">{{ $editingId ? 'Edit guest' : 'Add guest' }}</h3>
                    <button type="button" wire:click="closeForm" class="rounded-lg p-1.5 text-[#8A968D] hover:bg-[#F8FAF6]">
                        <x-tabler-x class="h-5 w-5" />
                    </button>
                </div>

                @php
                    $input = 'mt-1.5 w-full rounded-xl border border-[#DCE5DC] bg-[#F8FAF6] px-3.5 py-2.5 text-sm text-[#183524] focus:border-[#5E8067] focus:outline-none focus:ring-2 focus:ring-[#E8F0E5]';
                    $labelCls = 'text-xs font-medium text-[#718076]';
                @endphp

                <div class="space-y-4 overflow-y-auto p-5">

                    <div>
                        <label class="{{ $labelCls }}">Name</label>
                        <input type="text" wire:model="name" class="{{ $input }}" autofocus>
                        @error('name') <p class="mt-1 text-xs text-[#A06B48]">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="{{ $labelCls }}">Email</label>
                            <input type="email" wire:model="email" class="{{ $input }}">
                            @error('email') <p class="mt-1 text-xs text-[#A06B48]">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="{{ $labelCls }}">Phone</label>
                            <input type="text" wire:model="phone" class="{{ $input }}">
                            @error('phone') <p class="mt-1 text-xs text-[#A06B48]">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="{{ $labelCls }}">Birthday</label>
                            <input type="date" wire:model="birthday" class="{{ $input }}">
                            @error('birthday') <p class="mt-1 text-xs text-[#A06B48]">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="{{ $labelCls }}">Loyalty points</label>
                            <input type="number" min="0" wire:model="loyalty_points" class="{{ $input }}">
                            @error('loyalty_points') <p class="mt-1 text-xs text-[#A06B48]">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="{{ $labelCls }}">Seating preference</label>
                            <select wire:model="seating_preference" class="{{ $input }}">
                                <option value="">No preference</option>
                                @foreach (Guest::SEATING as $k => $l) <option value="{{ $k }}">{{ $l }}</option> @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="{{ $labelCls }}">Dining style</label>
                            <select wire:model="dining_style" class="{{ $input }}">
                                <option value="">Not set</option>
                                @foreach (Guest::STYLES as $k => $l) <option value="{{ $k }}">{{ $l }}</option> @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="{{ $labelCls }}">Favorite dish or drink</label>
                        <input type="text" wire:model="favorite_item" class="{{ $input }}">
                    </div>

                    <div>
                        <p class="{{ $labelCls }}">Dietary</p>
                        <div class="mt-2 flex flex-wrap gap-2">
                            @foreach (Guest::DIETARY as $k => $l)
                                <label class="cursor-pointer">
                                    <input type="checkbox" value="{{ $k }}" wire:model="dietary" class="peer sr-only">
                                    <span class="inline-block rounded-full border border-[#DCE5DC] px-3 py-1.5 text-xs text-[#718076] transition peer-checked:border-[#294936] peer-checked:bg-[#294936] peer-checked:text-white">{{ $l }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="{{ $labelCls }}">Notes</label>
                        <textarea wire:model="notes" rows="3" class="{{ $input }}"></textarea>
                        @error('notes') <p class="mt-1 text-xs text-[#A06B48]">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 border-t border-[#DCE5DC] p-5">
                    <button type="button" wire:click="closeForm"
                        class="rounded-xl border border-[#DCE5DC] px-4 py-2.5 text-sm font-medium text-[#718076] hover:bg-[#F8FAF6]">Cancel</button>
                    <button type="submit" wire:loading.attr="disabled" wire:target="save"
                        class="rounded-xl bg-[#294936] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#183524] disabled:opacity-60">
                        {{ $editingId ? 'Save changes' : 'Add guest' }}
                    </button>
                </div>
            </form>
        </div>
    @endif

</div>