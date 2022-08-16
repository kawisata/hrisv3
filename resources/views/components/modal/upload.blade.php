<div>
	<div
		class="flex items-center justify-between rounded-t border-b bg-white p-2 dark:border-indigo-600 dark:bg-indigo-200">
		<h3 class="text-lg font-bold text-gray-800 dark:text-white px-4">
			{{ $title }}
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
	<div class="">
		<x-errors />
	</div>
	{{ $slot }}
	<form wire:submit.prevent="{{ $function }}">
		<div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
			x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
			x-on:livewire-upload-progress="progress = $event.detail.progress">

			<div class="p-4">
				<div class="mt-2 inline-flex">
					<div class="col-span-11 flex justify-between">
						<label class="block">
							<input
								class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:bg-indigo-900 focus:border-transparent focus:outline-none dark:border-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
								type="file" wire:model="{{ $model }}" id="upload{{ $iteration }}" required />
						</label>
					</div>
				</div>
				<x-jet-input-error for="{{ $model }}" class="text-sm" />
			</div>

			<div class="m-2 flex items-center rounded-xl border bg-gray-100" x-show="isUploading">
				<progress max="100" x-bind:value="progress"></progress>
			</div>
		</div>
		<!-- Modal footer -->
		<div class="flex items-center space-x-2 rounded-b p-4 border-b border-gray-200 bg-white dark:border-gray-600">

			<button type="submit"
				class="inline-flex items-center rounded-xl border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out hover:bg-indigo-500 focus:border-indigo-700 active:bg-indigo-700 disabled:opacity-25"
				wire:loading.attr="disabled" wire:target="{{ $function }}">
				<svg wire:loading class="mr-3 -ml-1 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg"
					fill="none" viewBox="0 0 24 24">
					<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
					<path class="opacity-75" fill="currentColor"
						d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
					</path>
				</svg>
				{{ $button }}
			</button>
			<button wire:click.prevent="close()"
				class="rounded-xl border border-indigo-700 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-300 dark:border-gray-500 dark:bg-indigo-700 dark:text-gray-300 dark:hover:bg-indigo-600 dark:hover:text-white">
				Batal
			</button>
		</div>
	</form>
</div>