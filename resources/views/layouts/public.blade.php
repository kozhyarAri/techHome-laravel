<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-mono bg-[#f8fcff] text-gray-700">
    <nav class=" fixed w-full md:pt-5 z-50">
        <div
            class="bg-white max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 md:rounded-full shadow-xl">
            <a href="{{ route('index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/img/logo.svg') }}" class="h-8" alt="Logo" />
                <div class="self-center text-2xl font-semibold whitespace-nowrap text-black">{{ config('app.name') }}</div>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                    <li>
                        <a href="{{ route('index') }}"
                            class="{{ in_array(Route::currentRouteName(), ['index']) ? 'text-blue-700' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 "
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="{{ in_array(Route::currentRouteName(), ['deviceDetail', 'devices']) ? 'text-blue-700' : 'text-gray-900' }} flex items-center justify-between w-full py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Devices
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('devices', ['id' => 0]) }}"
                                        class="block px-4 py-2 hover:bg-gray-100">All Devices</a>
                                </li>
                                @foreach ($categorys as $category)
                                    <li>
                                        <a href="{{ route('devices', ['id' => $category->id]) }}"
                                            class="block px-4 py-2 hover:bg-gray-100">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="block py-2 px-3 {{ in_array(Route::currentRouteName(), ['about']) ? 'text-blue-700' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">About</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="block py-2 px-3 {{ in_array(Route::currentRouteName(), ['contact']) ? 'text-blue-700' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="h-24 md:h-28"></div>
    <div class="max-w-screen-xl m-auto">
        @yield('content')
    </div>
    <footer class="h-20 bg-gray-900 mt-10 justify-center items-center flex flex-col">
        <div></div>
        <div class="text-white text-xs md:text-xl">© 2024 <a target="_blank" href="https://linktr.ee/kozhyar"
                class="text-st">kozhyar</a>. All Rights Reserved.</div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>
