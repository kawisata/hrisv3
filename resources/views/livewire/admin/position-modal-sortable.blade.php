<div class="w-1/2">
    <div class=" h-80 overflow-hidden overflow-y-auto text-xs font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <ul wire:sortable="updateTaskOrder">
                @forelse ($groupmembers as $item )
                        <li wire:sortable.item="{{ $item->id }}" wire:key="item-{{ $item->id }}"  class="bg-white shadow-md focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <div class="py-2 inline-flex justify-between px-4 w-full text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-700 focus:text-teal-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                <div wire:sortable.handle class="w-full">
                                    <div>
                                        {{ $item->position->name }}
                                    </div>
                                    @if ($item->user)
                                    <div class="text-gray-500">
                                        {{ $item->user->name }} | <span class="text-gray-600">{{  $item->user_id }}</span>
                                    </div>
                                    @endif
                                </div>
                                <button wire:click.prevent="delete({{ $item->id }})">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </div>
                        </li>
                @empty
                @endforelse
            </ul>
    </div>
</div>
