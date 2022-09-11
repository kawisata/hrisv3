<div class="relative rounded-lg bg-gray-50 shadow dark:bg-gray-700">
	<x-modal.create title="Create Frontliner" function="create" button="presensi">
		<div class="">
			<div>
				<x-form.select-input model="event_id" placeholder="Kegiatan">
					<option value=""></option>
					@foreach ($events as $item)
					<option value="{{ $item->id }}">{{ $item->name }}</option>
					@endforeach
				</x-form.select-input>
			</div>
			<div class="p-4">
				<div class="mt-2 inline-flex">
					<div class="col-span-11 flex justify-between">
						<label class="block">
							<input
								class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:bg-indigo-900 focus:border-transparent focus:outline-none dark:border-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
								type="file" wire:model="photo_files" id="upload{{ $iteration }}" multiple required />
						</label>
					</div>
				</div>
				<x-jet-input-error for="photo_files" class="text-sm" />
			</div>

			<div class="m-2 flex items-center rounded-xl border bg-gray-100" x-show="isUploading">
				<progress max="100" x-bind:value="progress"></progress>
			</div>
		</div>
	</x-modal.create>
</div>