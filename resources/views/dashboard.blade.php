<x-app-blank>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jakarta,' . Carbon\Carbon::now()) }}
        </h2>
    </x-slot> --}}



    <div>
        <div class="max-w-7xl mx-auto">
            <div id="carouselExampleControls" class="carousel slide relative" data-bs-ride="carousel">
                <div class="carousel-inner relative w-full overflow-hidden">
                    <div class="carousel-item active relative float-left w-full">
                    <img
                        src="{{ asset('images/carousel/akhlak.jpg') }}"
                        class="block w-full"
                        alt="Wild Landscape"
                    />
                    </div>
                    <div class="carousel-item relative float-left w-full">
                    <img
                        src="{{ asset('images/carousel/Amanah.jpg') }}"
                        class="block w-full"
                        alt="Wild Landscape"
                    />
                    </div>
                    <div class="carousel-item relative float-left w-full">
                    <img
                        src="{{ asset('images/carousel/Kompeten.jpg') }}"
                        class="block w-full"
                        alt="Wild Landscape"
                    />
                    </div>
                    <div class="carousel-item relative float-left w-full">
                    <img
                        src="{{ asset('images/carousel/Harmonis.jpg') }}"
                        class="block w-full"
                        alt="Wild Landscape"
                    />
                    </div>
                    <div class="carousel-item relative float-left w-full">
                    <img
                        src="{{ asset('images/carousel/loyal.jpg') }}"
                        class="block w-full"
                        alt="Wild Landscape"
                    />
                    </div>
                    <div class="carousel-item relative float-left w-full">
                    <img
                        src="{{ asset('images/carousel/adaptif.jpg') }}"
                        class="block w-full"
                        alt="Wild Landscape"
                    />
                    </div>
                    <div class="carousel-item relative float-left w-full">
                    <img
                        src="{{ asset('images/carousel/kolaboratif.jpg') }}"
                        class="block w-full"
                        alt="Wild Landscape"
                    />
                    </div>
                </div>
                <button
                    class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev"
                >
                    <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="next"
                >
                    <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="ml-4 mt-2 flex justify-center">
                @livewire('download')
    </div>

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Dashboard
            </h2>
                  <livewire:frontliner-active/>

            <!-- Cards -->
            {{-- <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                  >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total clients
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    6389
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Account balance
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    $ 46,760.89
                  </p>
                </div>
              </div>
            </div> --}}

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                  <div class="flex justify-center py-2 bg-gray-800 text-white border-t-xl">
                      Ulang Tahun Bulan ini
                  </div>
                  <livewire:employee.info-ultah/>
              </div>
            </div>

          </div>
        </main>

</x-app-blank>


