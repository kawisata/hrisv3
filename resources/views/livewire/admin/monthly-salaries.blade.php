<div>
    <x-card>
        <div class="inline-flex gap-2 px-4 ">
            <div class="flex-grow p-2 border shadow-md">
                <h5>Upah Pokok Tunjangan Tetap</h5>
                <form wire:submit.prevent="saveOncycle">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">

                        <div class="flex items-end">
                                <x-input type="file" class="w-full text-sm text-gray-500 shadow-none file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-black file:text-white hover:file:bg-violet-100 "
                                wire:model="salary"
                                />
                        </div>
                    </div>

                    <div class="mt-5 sm:mt-6">
                        <span class="flex rounded-md shadow-sm">
                        <button class="inline-flex justify-center px-2 py-2 ml-3 text-xs text-white bg-black rounded hover:bg-blue-700" type="submit">import file</button>
                        </span>
                        <div wire:loading wire:target="salary">Uploading...</div>
                    </div>
                </form>
            </div>
            <div class="flex-grow p-2 border shadow-md">
                <h5>Tunjangan Tidak Tetap</h5>
                <form wire:submit.prevent="saveOffcycle">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">

                        <div class="flex items-end">
                                <x-input type="file" class="w-full text-sm text-gray-500 shadow-none file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-black file:text-white hover:file:bg-violet-100 "
                                wire:model="salaryoffcycle"
                                />
                        </div>
                    </div>

                    <div class="mt-5 sm:mt-6">
                        <span class="flex rounded-md shadow-sm">
                        <button class="inline-flex justify-center px-2 py-2 ml-3 text-xs text-white bg-black rounded hover:bg-blue-700" type="submit">import file</button>
                        </span>
                        <div wire:loading wire:target="salary">Uploading...</div>
                    </div>
                </form>
            </div>
            {{-- <div class="flex-grow p-2 border shadow-md">
                <p>Update Data Pekerja</p>
                <form wire:submit.prevent="saveEmployee">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">

                        <div class="flex items-end">
                                <x-input type="file" class="w-full text-sm text-gray-500 shadow-none file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-black file:text-white hover:file:bg-violet-100 "
                                wire:model="employee"
                                />
                        </div>
                    </div>

                    <div class="mt-5 sm:mt-6">
                        <span class="flex rounded-md shadow-sm">
                        <button class="inline-flex justify-center px-2 py-2 ml-3 text-xs text-white bg-black rounded hover:bg-blue-700" type="submit">import file</button>
                        </span>
                        <div wire:loading wire:target="salary">Uploading...</div>
                    </div>
                </form>
            </div> --}}


        </div>
    </x-card>

    <!-- Pilih Bulan -->
    <div class="col-span-6 pt-8 sm:col-span-4">
        <div class="flex gap-2 flex-inline">
            <x-select
                placeholder="bulan"
                wire:model="month"
            >
                <x-select.option label="Januari" value="1" />
                <x-select.option label="Februari" value="2" />
                <x-select.option label="Maret" value="3" />
                <x-select.option label="April" value="4" />
                <x-select.option label="Mei" value="5" />
                <x-select.option label="Juni" value="6" />
                <x-select.option label="Juli" value="7" />
                <x-select.option label="Agustus" value="8" />
                <x-select.option label="September" value="9" />
                <x-select.option label="Oktober" value="10" />
                <x-select.option label="November" value="11" />
                <x-select.option label="Desember" value="12" />
            </x-select>
            <x-select
                placeholder="Tahun"
                :options="[2021,2022,2023,2024,2025,2026]"
                wire:model="year"
            />
        </div>
    </div>

    <div class="mt-4">
        <p class="text-base">Total Upload Oncycle : {{number_format($oncycle, 0, ',', '.')}}</p>
        <p class="text-base">Total Take Home Pay OnCycle : {{number_format($oncycle_thp, 0, ',', '.')}}</p>
    </div>

    <div class="mt-4">
        <p class="text-base">Total Upload Oncycle : {{number_format($offcycle, 0, ',', '.')}}</p>
        <p class="text-base">Total Take Home Pay OnCycle : {{number_format($offcycle_thp, 0, ',', '.')}}</p>
    </div>

</div>
