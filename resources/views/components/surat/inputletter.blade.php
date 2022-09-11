<div {{ $attributes->merge(['class' => 'py-1 text-sm leading-5 text-cool-gray-900']) }}">
    <div class="md:grid md:grid-cols-12 md:gap-2">
        <div class=" col-span-2 text-sm">{{ $title }}</div>
        <div class=" md:col-span-7 col-span-6 items-baseline">
            <div class=" w-full flex gap-2">
                <div class="flex flex-col w-full ">
                    <button wire:click.prevent='$emit("openModal", "{{ $modal }}", {{ json_encode(["letter" => $letter])}})'>
                        <div class="min-h-[34px] max-h-44 shadow overflow-hidden overflow-y-auto text-xs font-medium shadow-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
                            <div class="py-2 justify-between px-4 w-full text-left cursor-pointer hover:bg-gray-100 hover:text-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-700 focus:text-sky-700 dark:border-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                {{ $slot }}
                            </div>
                        </div>
                    </button>
                </div>
                <div>
                    <button wire:click.prevent='$emit("openModal", "{{ $modal }}", {{ json_encode(["letter" => $letter])}})'
                        class="bg-sky-900 text-white rounded p-1 md:p-4 text-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <x-jet-input-error for="{{ $error }}" class="text-sm flex items-center"/>
    <div class="md:grid md:grid-cols-12 md:gap-2 mt-1 mb-3"><div class="md:box col-span-12"><hr></div></div>
</div>

