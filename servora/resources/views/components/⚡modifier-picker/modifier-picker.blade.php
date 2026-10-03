{{-- pos/⚡modifier-picker/modifier-picker.blade.php --}}

<div>

    @php
        $fmt = fn($v) => rtrim(rtrim(number_format((float) $v, 2), '0'), '.');
        $chip = 'inline-flex rounded-lg border border-[#DCE5DC] bg-[#F8FAF6] px-3 py-2 text-sm text-[#718076] transition peer-checked:border-[#294936] peer-checked:bg-[#294936] peer-checked:text-white';
    @endphp

    {{-- Notice --}}
    @if ($notice)
        <div
            class="fixed right-4 top-4 z-50 flex max-w-sm items-start gap-3 rounded-2xl border border-[#E9DCC4] bg-[#FFFDF8] px-4 py-3 text-sm text-[#9A762B] shadow-lg">
            <span>{{ $notice }}</span>
            <button type="button" wire:click="dismissNotice" class="shrink-0" aria-label="Dismiss">
                <x-tabler-x class="h-4 w-4" />
            </button>
        </div>
    @endif


    @if ($this->item)

        @php
            $item = $this->item;
            $servingsLeft = $item->servings_left;
            $maxQuantity = $servingsLeft ?? 99;
        @endphp

        <div class="fixed inset-0 z-50 flex items-end justify-center bg-black/30 p-4 sm:items-center"
            wire:click.self="close">

            <div
                class="max-h-[90vh] w-full max-w-md overflow-y-auto rounded-3xl border border-[#DCE5DC] bg-white p-6 shadow-xl">

                {{-- Header --}}
                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#F1E9DF] text-[#7D6048]">
                        <x-dynamic-component :component="'tabler-' . ($item->icon ?: 'tools-kitchen-2')" class="h-6 w-6" />
                    </div>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-lg font-semibold text-[#26342A]">{{ $item->name }}</h3>
                        <p class="mt-0.5 text-sm text-[#718076]">{{ $fmt($item->price) }} silver</p>
                    </div>

                    <button type="button" wire:click="close"
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-[#8A958D] transition hover:bg-[#F1F4F0]"
                        aria-label="Close">
                        <x-tabler-x class="h-4 w-4" />
                    </button>

                </div>


                @if ($errors->any())
                    <div class="mt-4 rounded-xl border border-[#F3C9C7] bg-[#FDE8E7] px-4 py-3 text-xs text-[#B94A48]">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif


                {{-- Modifier groups --}}
                <div class="mt-5 space-y-5">

                    @foreach ($item->modifierGroups as $group)

                        <div wire:key="group-{{ $group->id }}">

                            <div class="mb-2 flex items-center justify-between">
                                <p class="text-sm font-medium text-[#26342A]">{{ $group->name }}</p>
                                <span
                                    class="text-[11px] {{ $group->is_required ? 'font-semibold text-[#9A762B]' : 'text-[#9AA69D]' }}">
                                    {{ $group->is_required ? 'Required' : 'Optional' }}
                                    · {{ $group->type === 'multiple' ? 'choose any' : 'choose one' }}
                                </span>
                            </div>

                            <div class="flex flex-wrap gap-2">

                                @foreach ($group->options as $option)

                                    <label class="cursor-pointer" wire:key="option-{{ $option->id }}">

                                        @if ($group->type === 'multiple')
                                            <input type="checkbox" class="peer sr-only" value="{{ $option->id }}"
                                                wire:model.live="selected.{{ $group->id }}">
                                        @else
                                            <input type="radio" class="peer sr-only" name="group-{{ $group->id }}"
                                                value="{{ $option->id }}" wire:model.live="selected.{{ $group->id }}">
                                        @endif

                                        <span class="{{ $chip }}">
                                            {{ $option->name }}
                                            @if ((float) $option->price_delta !== 0.0)
                                                <span
                                                    class="ml-1 opacity-70">{{ $option->price_delta > 0 ? '+' : '' }}{{ $fmt($option->price_delta) }}</span>
                                            @endif
                                        </span>

                                    </label>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                    <div>
                        <label class="mb-1 block text-xs font-medium text-[#718076]">Note for the kitchen (optional)</label>
                        <input type="text" wire:model="notes" maxlength="200" placeholder="No onions, allergy, etc."
                            class="w-full rounded-xl border border-[#DCE5DC] bg-[#F8FAF6] px-3 py-2.5 text-sm text-[#26342A] outline-none placeholder:text-[#9AA69D] focus:border-[#8FA58B] focus:ring-2 focus:ring-[#E8F0E5]">
                    </div>

                </div>


                {{-- Footer --}}
                <div class="mt-6 flex items-center gap-3 border-t border-[#EDF0EC] pt-5">

                    <div class="flex items-center rounded-xl border border-[#DCE5DC]">
                        <button type="button" wire:click="$set('quantity', {{ max(1, $quantity - 1) }})"
                            class="flex h-10 w-10 items-center justify-center text-[#294936] transition hover:bg-[#F8FAF6]"
                            aria-label="Decrease quantity">
                            <x-tabler-minus class="h-4 w-4" />
                        </button>

                        <span class="w-8 text-center text-sm font-semibold text-[#26342A]">{{ $quantity }}</span>

                        <button type="button" wire:click="$set('quantity', {{ min($maxQuantity, $quantity + 1) }})"
                            class="flex h-10 w-10 items-center justify-center text-[#294936] transition hover:bg-[#F8FAF6]"
                            aria-label="Increase quantity">
                            <x-tabler-plus class="h-4 w-4" />
                        </button>
                    </div>

                    <button type="button" wire:click="add"
                        class="flex flex-1 items-center justify-between rounded-xl bg-[#294936] px-4 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#183524]">
                        <span>Add to order</span>
                        <span>{{ $fmt($this->unitPrice * $quantity) }} silver</span>
                    </button>

                </div>

                @if ($servingsLeft !== null && $servingsLeft <= \App\Models\MenuItem::LOW_SERVINGS)
                    <p class="mt-3 text-center text-[11px] text-[#9A762B]">Low stock · about {{ $servingsLeft }} servings left
                    </p>
                @endif

            </div>

        </div>

    @endif

</div>