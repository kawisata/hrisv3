<div {{ $attributes->merge(['class' => 'py-1 text-sm leading-5 text-cool-gray-900']) }}">
    <div class="md:grid md:grid-cols-12 md:gap-2">
        <div class=" col-span-2 text-sm">{{ $title }}</div>
        <div class=" md:col-span-7 col-span-6 items-baseline">
            <div class=" w-full flex gap-2">
                <div class="flex flex-col w-full ">
                        <input class="min-h-[34px] max-h-44 shadow overflow-hidden overflow-y-auto text-xs font-medium shadow-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
												type="text" placeholder="{{ $title }}" wire:model="{{ $modal }}"
												>
                </div>
            </div>
        </div>
    </div>
    <x-jet-input-error for="{{ $error }}" class="text-sm flex items-center"/>
    <div class="md:grid md:grid-cols-12 md:gap-2 mt-1 mb-3"><div class="md:box col-span-12"><hr></div></div>
</div>

