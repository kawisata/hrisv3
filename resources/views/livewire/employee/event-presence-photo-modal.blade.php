<div class="relative rounded-lg bg-gray-50 shadow dark:bg-gray-700">
	<div
		class="flex items-center justify-between rounded-t border-b bg-white p-2 dark:border-indigo-600 dark:bg-indigo-200">
		<h3 class="text-lg font-bold text-gray-800 dark:text-white">
			{{ $events->event->name }}
		</h3>
		<button wire:click="close()"
			class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-indigo-400 hover:bg-indigo-200 hover:text-indigo-900 dark:hover:bg-gray-600 dark:hover:text-white"
			data-modal-toggle="large-modal">
			<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd"
					d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
					clip-rule="evenodd"></path>
			</svg>
		</button>
	</div>
	<div class="grid grid-cols-2 md:grid-cols-3 overflow-y-auto p-2 gap-2">
		@if($events)
			@forelse($events->event_photos as $photo)
			<div class="bg-white shadow-lg rounded-lg space-y-2 p-2 flex flex-col justify-between">
				<img src="{{ route('photo.show', ['photo' => $photo->id]) }}" alt="{{ $photo->photo_file }}" class="w-auto">
				<button type="button" wire:click.prevent="delete({{ $photo->id }})"
					class=" w-fit py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
					delete</button>
			</div>
			@empty
			@endforelse
		@endif
	</div>

</div>