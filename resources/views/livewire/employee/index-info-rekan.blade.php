<x-app-blank>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Info Rekan') }}
        </h2>
    </x-slot>

        <main class="h-full overflow-y-auto ">
          <div class="container  mx-auto grid">
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                    <livewire:employee.info-rekan/>
              </div>
            </div>
          </div>
        </main>

</x-app-blank>
