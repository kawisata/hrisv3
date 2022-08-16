<div {{ $attributes->merge(['class' =>"relative mr-6 w-full max-w-xl focus-within:text-purple-500"])}}>
	<div class="absolute inset-y-0 flex items-center pl-2">
		<svg class="h-4 w-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
			<path fill-rule="evenodd"
				d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
				clip-rule="evenodd"></path>
		</svg>
	</div>
	<input
		class="dark:focus:shadow-outline-gray focus:shadow-outline-purple w-full form-input rounded-md border-0 bg-gray-100 pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 focus:border-purple-300 focus:bg-white focus:placeholder-gray-500 focus:outline-none dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 dark:focus:placeholder-gray-600"
		type="text" placeholder="Search" aria-label="Search" wire:model="search" />
</div>