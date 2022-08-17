<div>
	<div>
		<div class="max-w-7xl mx-auto">
			<div class="text-xs">
				<div
					class=" space-x-2 text-xs flex items-center px-4 h-16 font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-800">
					<div
						class="md:py-2 py-4 flex w-full items-center justify-between pl-6 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-indigo-500 dark:focus:ring-indigo-500">
						<x-button.indigo modal="employee.event-presence-modal" title="Presensi Kegiatan" />
						<x-form.search class="md:visible w-full invisible hidden md:block" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
		<div
			class="relative w-full overflow-hidden border border-gray-300 bg-gray-200 pb-5 text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500">

			<div class="visible w-full md:invisible md:hidden">
				<div
					class="shadow-xs left-0 right-0 flex w-full justify-between overflow-hidden bg-white py-2 pl-2 md:pl-[265px]">
					<div class="flex flex-1 justify-start md:mr-32">
						<div class="relative mr-6 w-full max-w-xl focus-within:text-gray-500">
							<div class="absolute inset-y-0 flex items-center pl-2">
								<svg class="h-4 w-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
									<path fill-rule="evenodd"
										d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
										clip-rule="evenodd"></path>
								</svg>
							</div>
							<input
								class="dark:focus:shadow-outline-gray focus:shadow-outline-purple form-input w-full rounded-full border-0 bg-gray-100 pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 focus:border-purple-300 focus:bg-white focus:placeholder-gray-500 focus:outline-none dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 dark:focus:placeholder-gray-600"
								type="text" placeholder="cari perihal Surat" aria-label="Search" wire:model="search" />
						</div>
					</div>
				</div>
			</div>
			<div class="shadow-xs mt-3 w-full overflow-hidden rounded-lg px-2 md:px-4" wire:init="loadNota">
				@isset($title)
				<x-surat.header :title="$title">
					{{ $events->firstItem() }} - {{ $events->lastItem() }} of {{ $events->total() }}
				</x-surat.header>

				<div wire:loading.class="invisible"
					class=" bg-gray-50 min-h-[calc(100vh-300px)] w-full overflow-x-auto md:min-h-[calc(100vh-250px)]">
					<div class="w-full flex-col space-y-4">
						<table class="w-full">
							<tbody>
								@forelse ($events as $event)
								<tr @class([ 'hover:shadow-lg' , 'hover:bg-gray-200' , 'bg-gray-100' , 'text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500
									dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500
									dark:focus:border-sky-500' , ])>
									<td class="p-2">
										<p @class([ 'text-gray-800' , 'dark:text-gray-100' , 'w-full' , 'text-sm' , 'line-clamp-2' ])>
											{{ $event->event->name }}
										</p>
										<div class="flex justify-between">
											<div>
												@php
												$date1 = \Carbon\Carbon::now();
												$date2 = $event->presence_at;
												@endphp
												@if ($date1->diffInDays($date2) > 3)
												<span class="text-xs text-gray-500 dark:text-white md:text-sm">{{
													\Carbon\Carbon::parse($event->presence_at)->translatedFormat('d F Y H:i:s') }}
												</span>
												@else
												<span class="text-xs text-gray-500 dark:text-white md:text-sm">{{
													\Carbon\Carbon::parse($event->presence_at)->diffForHumans() }}
												</span>
												@endif
											</div>
										</div>
									</td>
									<td class=" text-right p-2">
										<button type="button"
											wire:click.prevent='$emit("openModal", "employee.event-presence-photo-modal", {{ json_encode(["event" => $event])}})'
											class="inline-flex items-center px-2 md:px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
											Foto
											<span
												class="inline-flex justify-center items-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
												{{ $event->event_photos->count() }}
											</span>
										</button>
									</td>
								</tr>
								@empty
								<div class="flex items-center justify-center space-x-2">
									<x-icon.inbox class="h-4 w-4 text-gray-400" />
									<span class="py-8 text-sm font-medium text-gray-400">belum ada Kegiatan...</span>
								</div>
								@endforelse
							</tbody>
						</table>


					</div>
				</div>
				<div
					class="focus:border-sky-500 focus:ring-sky-500 dark:border-gray-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500">
					{{ $events->links('livewire.datatables.tailwind-pagination') }}
				</div>
				@else
				<div wire:loading class="w-full">
					<div class="flex justify-between bg-white p-2">
						<div class="bg-white text-2xl font-extrabold">
							<div class="h-8 w-72 rounded-md bg-gray-300">
							</div>
						</div>
					</div>
					@forelse ($events as $event)
					<div class="w-full overflow-x-auto">
						<div class="w-full flex-col space-y-4">
							<div class="mx-auto h-20 w-full border-b-2 border-gray-400 bg-gray-100 p-4">
								<div class="items-star flex h-full animate-pulse flex-row justify-center space-x-5">
									<div class="flex h-6 w-6 items-start bg-gray-300">
										<span class="invisible">{{ $event->id }}</span>
									</div>
									<div class="flex w-full flex-col items-stretch space-y-2">
										<div class="h-4 w-full rounded-md bg-gray-300"></div>
										<div class="flex justify-between">
											<div class="h-4 w-24 rounded-md bg-gray-300 md:w-72"></div>
											<div class="h-4 w-12 rounded-md bg-gray-300 md:w-24"></div>
										</div>
										<div class="h-6 w-60 rounded-md bg-gray-300"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@empty
					@endforelse
				</div>
				@endisset

			</div>
		</div>
	</div>
</div>