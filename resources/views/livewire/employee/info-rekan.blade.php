    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class=" pl-8 my-4 max-w-xl ">
            <x-input placeholder="search" hint="cari Nama, NIPP, Jabatan"  wire:model="search" />
        </div>
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-x-auto ">
                <div id='recipients' class="px-8 lg:mt-0 rounded shadow bg-white dark:bg-gray-700  text-sm">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                        <th scope="col" class="py-3 px-6 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
                        No
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
                        Nama
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
                        Jabatan
                        </th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
                        NIPP/NIP
                        </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @forelse ($employees as $item )
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-700">{{ $loop->iteration }}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-700">{{ $item->nama}}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-700">{{ $item->position_name }}</td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white dark:bg-gray-700">{{ $item->user_id }}</td>
                                </tr>
                            @empty

                            @endforelse

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
            <div class=" mt-8 flex justify-center">
                {{ $employees->links('pagination::flowbitepagination') }}
            </div>
    </div>
