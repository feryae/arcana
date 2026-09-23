<div>

    <x-flash-message />

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">
        <div>
            <p class="text-[9px] uppercase tracking-[0.3em] text-[#806337]">The Wilds</p>
            <h1 class="mt-1 font-serif text-3xl text-[#e8dfca]">Monsters</h1>
        </div>

        <button wire:click="openCreate"
            class="bg-[#806337] px-5 py-3 text-[9px] font-semibold uppercase tracking-[0.2em] text-[#eee5d1] transition hover:bg-[#967744]">
            Log Sighting
        </button>
    </div>


    <div class="mb-8 grid grid-cols-2 border border-[#2c2922] bg-[#151310] sm:grid-cols-3">
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Monsters Shown</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['total'] }}</p>
        </div>
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Average Sightings</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['avgSightings'] }}</p>
        </div>
        <div class="p-5">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Most Threatening</p>
            <p class="mt-2 font-serif text-lg text-[#b98967]">
                {{ $summary['mostThreatening']?->name ?? '—' }}
                @if ($summary['mostThreatening'])
                    <span class="text-sm text-[#756d5e]">({{ $summary['mostThreatening']->threat }})</span>
                @endif
            </p>
        </div>
    </div>


    {{-- Filters --}}
    <div class="mb-6 border border-[#2c2922] bg-[#151310] p-5">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div class="col-span-full">
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Search</label>
                <input wire:model.live.debounce.400ms="search" placeholder="Name, description..."
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Classification</label>
                <select wire:model.live="classificationFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    @foreach ($classifications as $c)
                        <option value="{{ $c }}">{{ $c }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Habitat</label>
                <select wire:model.live="habitatFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    @foreach ($habitats as $h)
                        <option value="{{ $h }}">{{ $h }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Threat</label>
                <select wire:model.live="threatFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    @foreach ($threats as $t)
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>
            </div>

            <div x-data="{ open: false }">
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Kingdom</label>

                <div class="relative" @click.outside="open = false">
                    <input type="text" wire:model.live.debounce.300ms="kingdomFilterSearch" @focus="open = true"
                        placeholder="Search kingdoms..."
                        class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                    <div x-show="open" x-cloak
                        class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                        <button type="button" wire:click="clearKingdomFilter" @click="open = false"
                            class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                            Any
                        </button>
                        @forelse ($this->kingdomFilterResults as $k)
                            <button type="button" wire:click="selectKingdomFilter('{{ $k->id }}')" @click="open = false"
                                class="block w-full px-3 py-2 text-left text-xs {{ (string) $kingdomFilter === (string) $k->id ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                {{ $k->name }}
                            </button>
                        @empty
                            <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                        @endforelse
                    </div>
                </div>

                @if ($kingdomFilterName)
                    <div class="mt-1.5 flex items-center gap-1.5">
                        <span class="text-[10px] text-[#a17e43]">{{ $kingdomFilterName }}</span>
                        <button type="button" wire:click="clearKingdomFilter"
                            class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                    </div>
                @endif
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">
                    Sightings: {{ $minSightings }}–{{ $maxSightings }}
                </label>
                <div class="flex items-center gap-2 pt-2">
                    <input type="range" min="0" max="150" wire:model.live.debounce.300ms="minSightings"
                        class="w-full accent-[#806337]">
                    <input type="range" min="0" max="150" wire:model.live.debounce.300ms="maxSightings"
                        class="w-full accent-[#806337]">
                </div>
            </div>
        </div>

        @if ($search || $classificationFilter || $habitatFilter || $threatFilter || $kingdomFilter || $minSightings > 0 || $maxSightings < 150)
            <button wire:click="clearFilters"
                class="mt-4 text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:text-[#c59b4a]">
                Clear filters
            </button>
        @endif
    </div>


    {{-- Table --}}
    <div class="border border-[#2c2922] bg-[#151310]">
        {{-- Desktop / Tablet --}}
        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[900px] text-left">
                <thead>
                    <tr class="border-b border-[#2c2922] text-[8px] uppercase tracking-[0.2em] text-[#625744]">
                        @foreach (['name' => 'Name', 'classification' => 'Classification', 'habitat' => 'Habitat', 'threat' => 'Threat', 'sightings' => 'Sightings', 'status' => 'Status'] as $col => $label)
                            <th class="whitespace-nowrap px-5 py-4">
                                <button wire:click="sortByColumn('{{ $col }}')"
                                    class="flex items-center gap-1.5 transition hover:text-[#a17e43]">
                                    {{ $label }}

                                    @if ($sortBy === $col)
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </button>
                            </th>
                        @endforeach

                        <th class="whitespace-nowrap px-5 py-4">Kingdom</th>
                        <th class="whitespace-nowrap px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#2c2922]/60">
                    @forelse ($monsters as $monster)
                                        <tr class="transition hover:bg-[#191611]">
                                            <td class="px-5 py-4">
                                                <button wire:click="openView('{{ $monster->slug }}')" class="text-left">
                                                    <div class="font-serif text-sm text-[#ddd2bb]">{{ $monster->name }}</div>
                                                </button>
                                            </td>

                                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $monster->classification }}</td>
                                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $monster->habitat }}</td>

                                            <td class="px-5 py-4 text-[9px] uppercase tracking-[0.15em]
                                                                                                                                                                                                                                                                                                                                            {{ match ($monster->threat) {
                            'Extreme' => 'text-[#c14545]',
                            'High' => 'text-[#b98967]',
                            'Moderate' => 'text-[#c59b4a]',
                            default => 'text-[#8f826b]',
                        } }}">
                                                {{ $monster->threat }}
                                            </td>

                                            <td class="px-5 py-4 text-sm font-semibold text-[#d8c8a8]">{{ $monster->sightings }}</td>
                                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $monster->status }}</td>
                                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $monster->kingdom->name ?? 'Unconfirmed' }}</td>

                                            <td class="px-5 py-4">
                                                <div class="flex items-center justify-end gap-4 text-[9px] uppercase tracking-[0.15em]">
                                                    <button wire:click="openEdit('{{ $monster->slug }}')"
                                                        class="text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                                                    <button wire:click="openDelete('{{ $monster->slug }}')"
                                                        class="text-[#857861] transition hover:text-[#c14545]">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-16 text-center">
                                @if ($search || $classificationFilter || $habitatFilter || $threatFilter || $kingdomFilter || $minSightings > 0 || $maxSightings < 150)
                                    <p class="font-serif text-sm text-[#8f826b]">No monsters match these filters.</p>
                                    <p class="mt-1 text-xs text-[#625744]">
                                        <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear
                                            filters</button>
                                        to see the full bestiary.
                                    </p>
                                @else
                                    <p class="font-serif text-sm text-[#8f826b]">No sightings recorded.</p>
                                    <p class="mt-1 text-xs text-[#625744]">Begin by logging the first encounter.</p>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile --}}
        <div class="divide-y divide-[#2c2922]/60 md:hidden">
            @forelse ($monsters as $monster)
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <button wire:click="openView('{{ $monster->slug }}')" class="min-w-0 text-left">
                                    <div class="font-serif text-base text-[#ddd2bb]">{{ $monster->name }}</div>
                                    <div class="mt-1 text-[9px] uppercase tracking-[0.15em] text-[#625744]">
                                        {{ $monster->classification }}
                                    </div>
                                </button>
                                <div class="shrink-0 text-right">
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Threat</div>
                                    <div class="mt-1 text-sm font-semibold {{ match ($monster->threat) {
                    'Extreme' => 'text-[#c14545]',
                    'High' => 'text-[#b98967]',
                    'Moderate' => 'text-[#c59b4a]',
                    default => 'text-[#8f826b]',
                } }}">
                                        {{ $monster->threat }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 grid grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Habitat</div>
                                    <div class="mt-1 text-xs text-[#8f826b]">{{ $monster->habitat }}</div>
                                </div>
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Sightings</div>
                                    <div class="mt-1 text-xs text-[#8f826b]">{{ $monster->sightings }}</div>
                                </div>
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Kingdom</div>
                                    <div class="mt-1 text-xs text-[#8f826b]">{{ $monster->kingdom->name ?? 'Unconfirmed' }}</div>
                                </div>
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Status</div>
                                    <div class="mt-1 text-xs text-[#8f826b]">{{ $monster->status }}</div>
                                </div>
                            </div>

                            <div class="mt-5 flex items-center justify-end gap-5 border-t border-[#2c2922]/60 pt-4">
                                <button wire:click="openEdit('{{ $monster->slug }}')"
                                    class="text-[9px] uppercase tracking-[0.15em] text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                                <button wire:click="openDelete('{{ $monster->slug }}')"
                                    class="text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:text-[#c14545]">Delete</button>
                            </div>
                        </div>
            @empty
                <div class="px-5 py-16 text-center">
                    @if ($search || $classificationFilter || $habitatFilter || $threatFilter || $kingdomFilter || $minSightings > 0 || $maxSightings < 150)
                        <p class="font-serif text-sm text-[#8f826b]">No monsters match these filters.</p>
                        <p class="mt-1 text-xs text-[#625744]">
                            <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear filters</button>
                            to see the full bestiary.
                        </p>
                    @else
                        <p class="font-serif text-sm text-[#8f826b]">No sightings recorded.</p>
                        <p class="mt-1 text-xs text-[#625744]">Begin by logging the first encounter.</p>
                    @endif
                </div>
            @endforelse
        </div>
    </div>


    {{-- Pagination --}}
    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-[9px] uppercase tracking-[0.15em] text-[#625744]">
            Showing {{ $monsters->count() }} of {{ $summary['total'] }}
        </p>

        <div class="flex w-full gap-2 sm:w-auto">
            <button wire:click="goToCursor('{{ $monsters->previousCursor()?->encode() }}')" @if (!$monsters->previousCursor()) disabled @endif
                class="flex-1 border border-[#3b3225] px-4 py-2 text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895] disabled:opacity-30 sm:flex-none">
                ← Previous
            </button>

            <button wire:click="goToCursor('{{ $monsters->nextCursor()?->encode() }}')" @if (!$monsters->hasMorePages())
            disabled @endif
                class="flex-1 border border-[#3b3225] px-4 py-2 text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895] disabled:opacity-30 sm:flex-none">
                Next →
            </button>
        </div>
    </div>

    {{-- Modal --}}
    <div x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center px-6 py-10" style="display: none;">

        <div x-show="show" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" wire:click="closeModal"
            class="absolute inset-0 bg-[#0d0c0a]/85"></div>

        <div x-show="show" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" @keydown.escape.window="show = false"
            class="relative max-h-[90vh] w-full max-w-lg overflow-y-auto border border-[#806337]/40 bg-[#151310] p-8">
            @if ($showModal)
                @if ($modalMode === 'view' && $selected)
                        <div class="mb-6 flex items-center gap-3">
                            <span class="h-px w-8 bg-[#806337]"></span>
                            <span
                                class="text-[9px] uppercase tracking-[0.28em] text-[#a17e43]">{{ $selected->classification }}</span>
                        </div>

                        <h2 class="font-serif text-3xl text-[#e8dfca]">{{ $selected->name }}</h2>

                        <p class="mt-5 text-sm leading-7 text-[#8f826b]">{{ $selected->description ?? 'No records on file.' }}</p>

                        <div class="mt-7 grid grid-cols-2 gap-5 border-t border-[#2c2922] pt-6 text-xs">
                            <div>
                                <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Habitat</p>
                                <p class="mt-1 text-[#cdbd9e]">{{ $selected->habitat }}</p>
                            </div>
                            <div>
                                <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Kingdom</p>
                                <p class="mt-1 text-[#cdbd9e]">{{ $selected->kingdom->name ?? 'Unconfirmed' }}</p>
                            </div>
                            <div>
                                <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Threat</p>
                                <p class="mt-1 font-semibold
                                                                                                                                                                                                                    {{ match ($selected->threat) {
                        'Extreme' => 'text-[#c14545]',
                        'High' => 'text-[#b98967]',
                        'Moderate' => 'text-[#c59b4a]',
                        default => 'text-[#cdbd9e]',
                    } }}">
                                    {{ $selected->threat }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Sightings</p>
                                <p class="mt-1 text-[#cdbd9e]">{{ $selected->sightings }}</p>
                            </div>
                            <div>
                                <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Status</p>
                                <p class="mt-1 text-[#cdbd9e]">{{ $selected->status }}</p>
                            </div>
                        </div>

                        <div class="mt-8 flex gap-3">
                            <button wire:click="closeModal"
                                class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] hover:text-[#c8b895]">Close</button>
                            <button wire:click="switchToEdit"
                                class="flex-1 bg-[#806337] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] hover:bg-[#967744]">Edit</button>
                        </div>

                @elseif ($modalMode === 'delete' && $selected)
                    <div class="mb-6 flex items-center gap-3">
                        <span class="h-px w-8 bg-[#c14545]/60"></span>
                        <span class="text-[9px] uppercase tracking-[0.28em] text-[#c14545]">Strike from the Record</span>
                    </div>

                    <h2 class="font-serif text-2xl text-[#e8dfca]">Remove {{ $selected->name }}?</h2>
                    <p class="mt-3 text-sm leading-6 text-[#8f826b]">
                        This permanently erases the record of <span class="text-[#cdbd9e]">{{ $selected->name }}</span> from the
                        bestiary. This cannot be undone.
                    </p>

                    <div class="mt-8 flex gap-3">
                        <button wire:click="closeModal"
                            class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895]">Cancel</button>
                        <button wire:click="confirmDelete" wire:loading.attr="disabled" wire:target="confirmDelete"
                            class="flex-1 bg-[#c14545] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] transition hover:bg-[#d65656] disabled:opacity-50">
                            <span wire:loading.remove wire:target="confirmDelete">Confirm Removal</span>
                            <span wire:loading wire:target="confirmDelete">Removing...</span>
                        </button>
                    </div>

                @else
                    <h2 class="mb-6 font-serif text-2xl text-[#e8dfca]">
                        {{ $modalMode === 'edit' ? 'Amend Record' : 'Log a New Sighting' }}
                    </h2>

                    <form wire:submit="save" class="space-y-4">
                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Name</label>
                            <input wire:model="name"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                            @error('name')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Description</label>
                            <textarea wire:model="description" rows="3"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]"></textarea>
                            @error('description')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Classification</label>
                                <select wire:model="classification"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($classifications as $c)
                                        <option value="{{ $c }}">{{ $c }}</option>
                                    @endforeach
                                </select>
                                @error('classification')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Habitat</label>
                                <select wire:model="habitat"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($habitats as $h)
                                        <option value="{{ $h }}">{{ $h }}</option>
                                    @endforeach
                                </select>
                                @error('habitat')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div x-data="{ open: false }">
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Kingdom</label>

                            <div class="relative" @click.outside="open = false">
                                <input type="text" wire:model.live.debounce.300ms="kingdomFormSearch" @focus="open = true"
                                    placeholder="Search kingdoms..."
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                                <div x-show="open" x-cloak
                                    class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                                    <button type="button" wire:click="clearKingdomForm" @click="open = false"
                                        class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                                        Unconfirmed
                                    </button>

                                    @forelse ($this->kingdomFormResults as $option)
                                        <button type="button" wire:click="selectKingdomForm('{{ $option['id'] }}')"
                                            @click="open = false"
                                            class="block w-full px-3 py-2 text-left text-xs {{ (string) $kingdomId === (string) $option['id'] ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                            {{ $option['label'] }}
                                        </button>
                                    @empty
                                        <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                                    @endforelse
                                </div>
                            </div>

                            @if ($kingdomName)
                                <div class="mt-1.5 flex items-center gap-1.5">
                                    <span class="text-[10px] text-[#a17e43]">{{ $kingdomName }}</span>
                                    <button type="button" wire:click="clearKingdomForm"
                                        class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                                </div>
                            @endif

                            @error('kingdomId')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Threat</label>
                                <select wire:model="threat"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($threats as $t)
                                        <option value="{{ $t }}">{{ $t }}</option>
                                    @endforeach
                                </select>
                                @error('threat')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label
                                    class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Sightings</label>
                                <input type="number" min="0" wire:model="sightings"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                @error('sightings')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Status</label>
                            <select wire:model="status"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                @foreach ($statuses as $s)
                                    <option value="{{ $s }}">{{ $s }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex gap-3 pt-2">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] hover:text-[#c8b895]">Cancel</button>
                            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                                class="flex-1 bg-[#806337] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] hover:bg-[#967744] disabled:opacity-50">
                                <span wire:loading.remove
                                    wire:target="save">{{ $modalMode === 'edit' ? 'Save Changes' : 'Log Sighting' }}</span>
                                <span wire:loading wire:target="save">Saving...</span>
                            </button>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>