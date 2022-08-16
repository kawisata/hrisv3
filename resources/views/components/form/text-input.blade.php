<div class="px-4 pt-2">
		<label class="text-sm col-span-3" for="">{{ $placeholder }}</label>
		<input type="{{ $model }}" id="{{ $model }}"
			{{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}
			placeholder="{{ $placeholder }}" wire:model.defer="{{ $model }}" required>
</div>