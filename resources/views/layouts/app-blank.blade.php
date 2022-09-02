<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>HRIS | KAI Wisata</title>

        <link rel="icon" sizes="180x180" href="{{ asset('images/favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
        <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}">
        @stack('style')
        @livewireStyles
        @powerGridStyles

    </head>

    <body>
        <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}" >
            @include('layouts.sidebar')

            <div class="flex flex-col flex-1">
                @include('layouts.header')

                <main class="h-full pb-16 overflow-y-auto px-2 md:px-4">
                            <!-- Page Heading -->
                @if (isset($header))
					<header class="bg-white shadow dark:bg-gray-700">
						<div class="mx-auto max-w-7xl py-6 px-4 md:px-6 lg:px-8">
							{{ $header }}
						</div>
					</header>
				@endif
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        {{-- wireui --}}
        @wireUiScripts
        {{-- @powerGridScripts --}}

        {{-- jetstream --}}
        <script src="{{ asset(mix('js/app.js')) }}" defer></script>

        {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

        {{-- milik windmill --}}
        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
        <script src="{{ asset('js/init-alpine.js') }}" ></script>

        {{-- <script src="{{ asset('js/index.min.js') }}" ></script> --}}
        @stack('script')
    </body>
</html>
