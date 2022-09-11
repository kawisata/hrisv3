        <div class="inline-flex w-full justify-between bg-white p-2 dark:bg-gray-800 dark:text-white">
          <div class="bg-white text-2xl font-extrabold dark:bg-gray-800 dark:text-white">
            {{ $title }}
          </div>
          <div
            class="ml-auto flex justify-center bg-white py-2 text-xs focus:border-sky-500 focus:ring-sky-500 dark:border-gray-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500">
            {{ $slot }}
          </div>
        </div>