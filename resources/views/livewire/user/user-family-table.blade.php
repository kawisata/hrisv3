<div>
<x-card title="Data Keluarga">
    @if (session()->has('deleted'))
        <div class="w-full bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3"
            role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('deleted') }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="overflow-x-auto">
        @if ($userfamilies)
            <table class="border-collapse border border-gray-400 table-auto ">
                <thead>
                    <tr>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">No.</th>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">Nama</th>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">NIK</th>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">tempat Lahir</th>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">Tgl Lahir</th>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">Hubungan</th>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">NPWP</th>
                    <th class=" py-2 border bg-gray-200 border-gray-50 text-xs md:text-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($userfamilies as $item )
                        <tr>
                            <td class="border border-gray-300 text-xs md:text-sm px-2 py-1 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 text-xs md:text-sm px-2 py-1">{{ $item->name }}</td>
                            <td class="border border-gray-300 text-xs md:text-sm px-2 py-1">{{ $item->nik }}</td>
                            <td class="border border-gray-300 text-xs md:text-sm px-2 py-1">{{ $item->birthday_place }}</td>
                            <td class="border border-gray-300 text-xs md:text-sm px-2 py-1">{{ \Carbon\Carbon::parse($item->birthday)->isoFormat('DD/MM/YYYY') }}</td>
                            <td class="border border-gray-300 text-xs md:text-sm px-2 py-1">{{ $item->hubungan }}</td>
                            <td class="border border-gray-300 text-xs md:text-sm px-2 py-1">{{ $item->npwp }}</td>
                            <td class=" text-xs md:text-sm px-2 py-1 text-center inline-flex justify-center">
                                <button wire:click="edit({{$item->id}})" class="items-center justify-center px-2 py-1 text-xs md:text-sm font-bold leading-none text-indigo-100 bg-indigo-700 rounded">Edit</button> |
                                <button wire:click="confirmUserDeletion"class="items-center justify-center px-2 py-1 text-xs md:text-sm font-bold leading-none text-white bg-red-700 rounded">Delete</button>
                                    @if($isOpen)
                                        @include('livewire.user.delete-user-family')
                                    @endif
                            </td>
                        </tr>
                    @empty
                    <td colspan="6" class="border border-gray-300 text-xs md:text-sm">belum ada data keluarga</td>
                    @endforelse
                </tbody>
            </table>
        @endif
    </div>
</x-card>
</div>
