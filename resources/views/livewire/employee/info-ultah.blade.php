<div class="flex flex-col">
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <div class="inline-block min-w-full align-middle">
        <div class="overflow-x-auto ">
            <table class="min-w-full divide-y divide-gray-200 table-fix dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
            <th scope="col" class="py-3 px-3 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
            No
            </th>
            <th scope="col" class="py-3 px-3 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
            Nama
            </th>
            <th scope="col" class="py-3 px-3 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
            NIPP/NIP
            </th>
            <th scope="col" class="py-3 px-3 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
            Jabatan
            </th>
            <th>
            Tanggal Ultah
            </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @forelse ($employees as $item )
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="py-4 px-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</td>
                    <td class="py-4 px-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->nama }}</td>
                    <td class="py-4 px-3 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $item->user_id }}</td>
                    <td class="py-4 px-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->position_name }}</td>
                    <td class="py-4 px-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ \Carbon\Carbon::parse($item->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                    </tr>
                @empty

                @endforelse

            </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
