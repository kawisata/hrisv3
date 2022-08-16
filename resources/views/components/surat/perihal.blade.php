<div class="mb-2">
    <div class="md:grid md:grid-cols-12 md:gap-2 mb-2">
        <div class="col-span-2 items-start md:mt-5 md:pt-4 p-1 flex text-sm">{{ $title }}</div>
            <div class="md:box col-span-7">
                <textarea id="message" rows="3" class="block p-2.5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                    placeholder="{{ $title }}" wire:model="{{ $vtitle }}" spellcheck="false"></textarea>
                <x-jet-input-error for="{{ $title }}" class="text-sm flex items-center" />
            </div>
            <div class="md:box col-span-3">
        </div>
    </div>
    <x-jet-input-error for="{{ $error }}" class="text-sm flex items-center"/>
    <div class="md:grid md:grid-cols-12 md:gap-2 mt-1 mb-3"><div class="md:box col-span-12"><hr></div></div>
</div>


