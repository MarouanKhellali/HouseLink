<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>


    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', system-ui, sans-serif;
        }
    </style>
</head>

<body class=" ">
    <!-- drawer component Nav -->
    <div id="drawer-example"
        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 "
        tabindex="-1" aria-labelledby="drawer-label">

        <ul class="mt-8">
            <li>
                <a href="#" class="w-full block p-2  text-gray-500 rounded hover:bg-gray-100" aria-current="page">
                    About us
                </a>
            </li>
            <li>
                <a href="#" class="w-full block p-2  text-gray-500 rounded hover:bg-gray-100" aria-current="page">
                    Services
                </a>
            </li>
            <li>
                <a href="#" class="w-full block p-2  text-gray-500 rounded hover:bg-gray-100" aria-current="page">
                    Residences
                </a>
            </li>
            <li>
                <a href="#" class="w-full block p-2  text-gray-500 rounded hover:bg-gray-100" aria-current="page">
                    Reviews
                </a>
            </li>
            <li>
                <a href="#" class="w-full block p-2  text-gray-500 rounded hover:bg-gray-100" aria-current="page">
                    FAQ'S
                </a>
            </li>

        </ul>
    </div>
    <!-- Navbar Section -->
    <div style="background-color: rgba(0, 0, 0, 0.274)"
        class="bg-transparent z-20 fixed w-full top-0 left-0 transform transition-all duration-300 ease-in-out"
        x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = (window.scrollY > 0) })" :class="{ 'h-20': scrolled, 'h-30': !scrolled }">
        <nav class=" fixed w-full top-0 left-0 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center">
                    <img src="{{ asset('logo.png') }}" class="h-9 mr-3" alt="houseLink Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">HouseLink</span>
                </a>
                <div class="flex lg:order-2">
                    @guest
                        @if (Route::has('login'))
                            <a class="mr-1 " href="{{ route('login') }}">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 text-center"
                                    style="letter-spacing: 1px ">
                                    Get started
                                </button>
                            </a>
                        @endif
                    @else
                        <!-- Profil -->
                        <div class="flex sm:items-center">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div class="relative">
                                            <img class="object-cover w-10 h-10 rounded-full ring ring-gray-300"
                                                src="{{ asset('usersImg/' . Auth::user()->image) }}" alt="User Image">
                                            <span
                                                class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-emerald-500 ring-1 ring-white"></span>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div
                                        class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform">
                                        <div class="mx-1">
                                            <h1 class="text-sm font-semibold text-gray-700 ">
                                                {{ Auth::user()->name }}
                                            </h1>
                                            <p class="text-sm text-gray-500 ">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <x-dropdown-link :href="route('#')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('#')">
                                        {{ __('Home') }}
                                    </x-dropdown-link>

                                    @auth
                                        @if (Auth::user()->role === 'user')
                                            <x-dropdown-link :href="route('#')">
                                                {{ __('Orders') }}
                                                </x-nav-link>
                                            @else
                                                <x-dropdown-link :href="route('#')">

                                                    {{ __('Dashboard') }}
                                                </x-dropdown-link>
                                        @endif
                                    @endauth

                                    <hr>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endguest

                    <!-- drawer init and toggle -->
                    <button
                        class="inline-flex items-center p-2 ml-1 text-sm text-white rounded-lg lg:hidden hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                        type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                        aria-controls="drawer-example">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>


                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 lg:p-0 mt-4 font-medium rounded-lg lg:flex-row lg:space-x-8 lg:mt-0 lg:border-0 lg:bg-transparent ">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white  rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0"
                                aria-current="page">
                                About us
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white  rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0"
                                aria-current="page">
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white  rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0"
                                aria-current="page">
                                Residences
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white  rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0"
                                aria-current="page">
                                Reviews
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white  rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0"
                                aria-current="page">
                                FAQ'S
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Hero Section -->
    <div class="w-full flex ml-auto relative">
        <!-- hero image and titel .. -->
        <div class="w-11/12 bg-cover bg-center flex"
            style=" background-image: url('img.png');   height: 600px; width: 100%;">
            <div class="w-full max-w-screen-xl flex items-center  mx-auto p-4">
                <div class=" flex flex-wrap p-4 ">
                    <div class=" w-full my-4">
                        <h1 class="text-6xl font-black text-white mb-2"
                            style="letter-spacing: 1.2rem ; font-size:70px ; font-weight:900; ">
                            Find Your <br />Perfect <br /> Match
                        </h1>
                        <p class="text-lg text-gray-300 " style="letter-spacing: 2px ">
                            Ignite Your Imagination
                        </p>
                        <p class="text-lg text-gray-300 mb-8" style="letter-spacing: 2px ">
                            HouseLink - Where Vision Meets Reality.
                        </p>
                        <button type="button"
                            class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none rounded-lg border border-white hover:bg-blue-700 hover:text-white focus:z-10 focus:ring-2 "
                            style="letter-spacing: 2px ">
                            Get Started
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Filter section -->
        <section class="absolute w-full  flex items-center justify-center px-4" style=" bottom: -8%">
            <div class=" py-6 px-8 border lg:flex rounded-lg shadow-lg hidden :max-w-screen-xl  mx-auto  backdrop-blur-md bg-white/30"
                style=" fill: linear-gradient(154deg, rgba(255, 255, 255, 0.836) 0%, rgba(255, 255, 255, 0.87) 100%);filter: drop-shadow(0px 0px 50px rgba(255, 255, 255, 0.1)); backdrop-filter: blur(30px);">
                <!-- Action Type -->
                <div class="mr-3">
                    <!-- Dropdown Button -->
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 border border-gray-300 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">
                        Action Type
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500
                                        placeholder="Search
                                    user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700"
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 ">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2  ">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded  ">Bonnie
                                        Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  ">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded ">Jese
                                        Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- City -->
                <div class="mr-3">
                    <!-- Dropdown Button -->
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 border border-gray-300 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">
                        City
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60  ">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500  " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  "
                                    placeholder="Search user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700  "
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100  ">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2  ">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded  ">Bonnie
                                        Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 ">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 ">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded ">Jese
                                        Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Area -->
                <div class="mr-3">
                    <!-- Dropdown Button -->
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 border border-gray-300 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">
                        Area
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60  ">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500  " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  "
                                    placeholder="Search user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700"
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 ">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded ">Bonnie
                                        Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 ">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 ">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded">Jese
                                        Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Property Type -->
                <div class="mr-3">
                    <!-- Dropdown Button -->
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 border border-gray-300 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">
                        Property type
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 ">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full px-5 py-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                                    placeholder="Search user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700 "
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded">
                                        Bonnie Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded">
                                        Jese Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Max Price Input -->
                <div class="mr-3">
                    <input type="search"
                        class="block py-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Max Price MAD" required>
                </div>
                <!-- Filter Button -->
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 text-center "
                    style="letter-spacing: 1px ">
                    Get started
                </button>
            </div>
        </section>
    </div>
    <!-- page Content -->
    <div class=" w-full flex items-center justify-center">
        <div class="max-w-screen-xl grid gap-8 items-center justify-center my-8 ">
            <!-- Partners Section -->
            <section class="flex items-center justify-center ">
                <div class="grid grid-cols-5 gap-2">
                    <div class="overflow-hidden filter-grayscale">
                        <img src="{{ asset('partners/par3.png') }}" alt="Image 1">
                    </div>
                    <div class="overflow-hidden filter-grayscale">
                        <img src="{{ asset('partners/par2.png') }}" alt="Image 2">
                    </div>
                    <div class="overflow-hidden filter-grayscale">
                        <img src="{{ asset('partners/par1.png') }}" alt="Image 3">
                    </div>
                    <div class="overflow-hidden filter-grayscale">
                        <img src="{{ asset('partners/par4.png') }}" alt="Image 4">
                    </div>
                    <div class="overflow-hidden filter-grayscale">
                        <img src="{{ asset('partners/par5.png') }}" alt="Image 5">
                    </div>
                </div>
            </section>
            <!-- About Us Section -->
            <section class="w-full flex items-center">
                <div class=" justify-center flex-1 py-4 lg:py-6 md:px-2">
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-2">
                        <!-- Image Content -->
                        <div class="relative px-4 mb-10">
                            <img src="https://i.postimg.cc/HsSPvTq8/pexels-fauxels-3184357.jpg" alt=""
                                class="relative object-cover w-full rounded-md md:h-96 h-44">
                        </div>
                        <!-- Text Content -->
                        <div
                            class="px-6 sm:px-4 mb-6 sm:mb-10 grid items-center justify-center md:text-start text-center">
                            <h2 class="mb-2 text-4xl lg:leading-loose font-black sm:mb-4 ">
                                We are the Leader in the real estate business
                            </h2>
                            <p class="mb-4 text-sm leading-normal md:text-base lg:text-md sm:mb-6">
                                HouseLink is a leading Moroccan company that provides an easy and efficient
                                platform
                                for
                                buying,
                                selling, and renting properties. With a strong focus on customer satisfaction,
                                we
                                strive
                                to make
                                the process of property transactions seamless and convenient for our clients.
                            </p>
                            <div class="flex items-center justify-between sm:flex-row gap-2 px-6 md:p-0">
                                <div class="text-center sm:text-left md:w-1/4 lg:w-1/4">
                                    <h3 class="text-xl md:text-2xl font-black">
                                        +120
                                    </h3>
                                    <p class="text-sm md:text-md">
                                        Business Done
                                    </p>
                                </div>
                                <div class="text-center sm:text-left md:w-1/4 md:w-1/4">
                                    <h3 class="text-xl md:text-2xl font-black">
                                        +220
                                    </h3>
                                    <p class="text-sm md:text-md">
                                        happy clients
                                    </p>
                                </div>
                                <div class="text-center sm:text-left md:w-1/4 md:w-1/4">
                                    <h3 class="text-xl md:text-2xl font-black">
                                        +5
                                    </h3>
                                    <p class="text-sm md:text-md">
                                        Partnerships
                                    </p>
                                </div>
                                <div class="text-center sm:text-left md:w-1/4 md:w-1/4">
                                    <h3 class="text-xl md:text-2xl font-black">
                                        +100
                                    </h3>
                                    <p class="text-sm md:text-md">
                                        available property
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services Section -->
            <section class="w-full flex items-center justify-center flex-col sm:flex-row gap-8 mb-4 px-8">
                <!-- Cards -->
                <div class="grid gap-8 grid-cols-3 p-4">
                    <style>
                        .hovered {
                            transform: scale(1.1);
                            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.25);
                        }
                    </style>
                    <!-- Card 1 -->
                    <div
                        class="card text-center items-center justify-center max-w-xs p-6 border border-gray-200 rounded-lg transition-transform transform cursor-default">

                        <div class="grid justify-center items-center">
                            <div class="flex items-center bg-blue-400 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-16 h-16 text-white grid justify-center">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900">
                            Explore Listings
                        </h5>
                        <p class="mb-3 font-normal text-xs text-gray-500">
                            Browse through our wide range of available properties to find your dream home.
                        </p>
                    </div>
                    <!-- Card 2 (Hover by Default) -->
                    <div
                        class="card hovered text-center items-center justify-center max-w-xs p-6 border border-gray-200 rounded-lg transition-transform transform  cursor-default">

                        <div class="grid justify-center items-center">
                            <div class="flex items-center bg-blue-400 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-16 h-16 text-white grid justify-center">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900">
                            Sell house
                        </h5>
                        <p class="mb-3 font-normal text-xs text-gray-500">
                            Another paragraph with some information about selling houses. This card has a hover effect
                            by default.
                        </p>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="card text-center items-center justify-center max-w-xs p-6 border border-gray-200 rounded-lg transition-transform transform cursor-default">

                        <div class="grid justify-center items-center">
                            <div class="flex items-center bg-blue-400 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-16 h-16 text-white grid justify-center">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900">
                            Rent house
                        </h5>
                        <p class="mb-3 font-normal text-xs text-gray-500">
                            Renting a house can be a great option for those who prefer flexibility. Find more details
                            about our available rental properties.
                        </p>
                    </div>
                </div>
                <script>
                    const cards = document.querySelectorAll('.card');
                    const card2 = document.querySelector('.card.hovered');

                    // Add event listeners for each card
                    cards.forEach(card => {
                        card.addEventListener('mouseover', () => {
                            // Remove hovered class from all cards
                            cards.forEach(otherCard => {
                                otherCard.classList.remove('hovered');
                            });

                            // Add hovered class to the current card
                            card.classList.add('hovered');
                        });

                        card.addEventListener('mouseout', () => {
                            // Remove hovered class from the current card
                            card.classList.remove('hovered');
                            // add hovered class from the current card2
                            card2.classList.add('hovered');
                        });
                    });
                </script>
            </section>
            <!-- Popular Residences Section -->
            <section></section>
            <!-- Best Reviews Section -->
            <section>
                <div x-data="cardSlider()" x-init="init()" class="p-4 grid gap-6 w-full">
                    <div class="w-full flex justify-between">
                        <h1 class="text-4xl font-bold" style="letter-spacing: 2px">Best Reviews.</h1>
                        <div class="icons grid grid-cols-2 gap-4 items-center">
                            <button @click="prevCard" class="h-7 w-7">
                                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM12 11H16V13H12V16L8 12L12 8V11Z">
                                    </path>
                                </svg>
                            </button>
                            <button @click="nextCard" class="h-7 w-7">
                                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 11V8L16 12L12 16V13H8V11H12ZM12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-center">
                        <div class="max-w-screen-xl relative">
                            <div class="card-slider flex">
                                <div class="cards-container flex gap-8 transition-transform duration-500 ease-in-out"
                                    x-ref="cardsContainer">
                                    <!-- Your card elements here -->
                                    <div class="reviews flex items-center">
                                        <div class="flex-shrink-0 bg-white border border-gray-50 rounded-lg shadow-lg"
                                            style="width: 506px;">
                                            <div class="p-8 grid gap-5 items-center justify-between items-start"
                                                style="padding: 30px 28px;">
                                                <div class="w-full flex  items-center justify-between">
                                                    <div class=" flex flex-wrap items-center">
                                                        <img class="object-cover mr-2 rounded-full shadow w-14 h-14 "
                                                            src="{{ asset('person.png') }}">
                                                        <div>
                                                            <h2 class="mr-2 text-lg font-medium text-gray-700 ">
                                                                Hannah Nelson
                                                            </h2>
                                                            <p class="text-sm font-medium text-gray-400 ">
                                                                Anaheim, CA, USA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="flex w-20 h-20 rotate-180 opacity-10"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                                    </svg>

                                                </div>
                                                <p class="flex text-sm text-gray-600">
                                                    “ This product is exactly what I was needed. Awesome construction
                                                    and
                                                    incredible
                                                    comfort
                                                    while using. ”
                                                </p>
                                                <div class="flex items-center">
                                                    <div>
                                                        <ul class="flex mb-1">
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-half"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>

                                                            <li class="text-xs font-thin text-gray-400">
                                                                <p>4.5</p>
                                                            </li>
                                                        </ul>
                                                        <p class="text-xs font-thin text-gray-400 dark:text-gray-400">
                                                            2h ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reviews flex items-center">
                                        <div class="flex-shrink-0 bg-white border border-gray-50 rounded-lg shadow-lg"
                                            style="width: 506px;">
                                            <div class="p-8 grid gap-5 items-center justify-between items-start"
                                                style="padding: 30px 28px;">
                                                <div class="w-full flex  items-center justify-between">
                                                    <div class=" flex flex-wrap items-center">
                                                        <img class="object-cover mr-2 rounded-full shadow w-14 h-14 "
                                                            src="{{ asset('person.png') }}">
                                                        <div>
                                                            <h2 class="mr-2 text-lg font-medium text-gray-700 ">
                                                                Hannah Nelson
                                                            </h2>
                                                            <p class="text-sm font-medium text-gray-400 ">
                                                                Anaheim, CA, USA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="flex w-20 h-20 rotate-180 opacity-10"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                                    </svg>

                                                </div>
                                                <p class="flex text-sm text-gray-600">
                                                    “ This product is exactly what I was needed. Awesome construction
                                                    and
                                                    incredible
                                                    comfort
                                                    while using. ”
                                                </p>
                                                <div class="flex items-center">
                                                    <div>
                                                        <ul class="flex mb-1">
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-half"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>

                                                            <li class="text-xs font-thin text-gray-400">
                                                                <p>4.5</p>
                                                            </li>
                                                        </ul>
                                                        <p class="text-xs font-thin text-gray-400 dark:text-gray-400">
                                                            2h ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reviews flex items-center">
                                        <div class="flex-shrink-0 bg-white border border-gray-50 rounded-lg shadow-lg"
                                            style="width: 506px;">
                                            <div class="p-8 grid gap-5 items-center justify-between items-start"
                                                style="padding: 30px 28px;">
                                                <div class="w-full flex  items-center justify-between">
                                                    <div class=" flex flex-wrap items-center">
                                                        <img class="object-cover mr-2 rounded-full shadow w-14 h-14 "
                                                            src="{{ asset('person.png') }}">
                                                        <div>
                                                            <h2 class="mr-2 text-lg font-medium text-gray-700 ">
                                                                Hannah Nelson
                                                            </h2>
                                                            <p class="text-sm font-medium text-gray-400 ">
                                                                Anaheim, CA, USA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="flex w-20 h-20 rotate-180 opacity-10"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                                    </svg>

                                                </div>
                                                <p class="flex text-sm text-gray-600">
                                                    “ This product is exactly what I was needed. Awesome construction
                                                    and
                                                    incredible
                                                    comfort
                                                    while using. ”
                                                </p>
                                                <div class="flex items-center">
                                                    <div>
                                                        <ul class="flex mb-1">
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-half"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>

                                                            <li class="text-xs font-thin text-gray-400">
                                                                <p>4.5</p>
                                                            </li>
                                                        </ul>
                                                        <p class="text-xs font-thin text-gray-400 dark:text-gray-400">
                                                            2h ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reviews flex items-center">
                                        <div class="flex-shrink-0 bg-white border border-gray-50 rounded-lg shadow-lg"
                                            style="width: 506px;">
                                            <div class="p-8 grid gap-5 items-center justify-between items-start"
                                                style="padding: 30px 28px;">
                                                <div class="w-full flex  items-center justify-between">
                                                    <div class=" flex flex-wrap items-center">
                                                        <img class="object-cover mr-2 rounded-full shadow w-14 h-14 "
                                                            src="{{ asset('person.png') }}">
                                                        <div>
                                                            <h2 class="mr-2 text-lg font-medium text-gray-700 ">
                                                                Hannah Nelson
                                                            </h2>
                                                            <p class="text-sm font-medium text-gray-400 ">
                                                                Anaheim, CA, USA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="flex w-20 h-20 rotate-180 opacity-10"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                                    </svg>

                                                </div>
                                                <p class="flex text-sm text-gray-600">
                                                    “ This product is exactly what I was needed. Awesome construction
                                                    and
                                                    incredible
                                                    comfort
                                                    while using. ”
                                                </p>
                                                <div class="flex items-center">
                                                    <div>
                                                        <ul class="flex mb-1">
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-half"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>

                                                            <li class="text-xs font-thin text-gray-400">
                                                                <p>4.5</p>
                                                            </li>
                                                        </ul>
                                                        <p class="text-xs font-thin text-gray-400 dark:text-gray-400">
                                                            2h ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reviews flex items-center">
                                        <div class="flex-shrink-0 bg-white border border-gray-50 rounded-lg shadow-lg"
                                            style="width: 506px;">
                                            <div class="p-8 grid gap-5 items-center justify-between items-start"
                                                style="padding: 30px 28px;">
                                                <div class="w-full flex  items-center justify-between">
                                                    <div class=" flex flex-wrap items-center">
                                                        <img class="object-cover mr-2 rounded-full shadow w-14 h-14 "
                                                            src="{{ asset('person.png') }}">
                                                        <div>
                                                            <h2 class="mr-2 text-lg font-medium text-gray-700 ">
                                                                Hannah Nelson
                                                            </h2>
                                                            <p class="text-sm font-medium text-gray-400 ">
                                                                Anaheim, CA, USA
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="flex w-20 h-20 rotate-180 opacity-10"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                                    </svg>

                                                </div>
                                                <p class="flex text-sm text-gray-600">
                                                    “ This product is exactly what I was needed. Awesome construction
                                                    and
                                                    incredible
                                                    comfort
                                                    while using. ”
                                                </p>
                                                <div class="flex items-center">
                                                    <div>
                                                        <ul class="flex mb-1">
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        fill="currentColor"
                                                                        class="w-4 mr-1 text-yellow-400 bi bi-star-half"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </li>

                                                            <li class="text-xs font-thin text-gray-400">
                                                                <p>4.5</p>
                                                            </li>
                                                        </ul>
                                                        <p class="text-xs font-thin text-gray-400 dark:text-gray-400">
                                                            2h ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function cardSlider() {
                        return {
                            cardIndex: 0,
                            numCards: 0,
                            cardWidth: 0,

                            init() {
                                this.numCards = this.$refs.cardsContainer.children.length;
                                this.cardWidth = this.$refs.cardsContainer.children[0].offsetWidth;
                            },

                            updateCardPosition() {
                                const newPosition = -this.cardIndex * this.cardWidth;
                                this.$refs.cardsContainer.style.transform = `translateX(${newPosition}px)`;
                            },

                            prevCard() {
                                this.cardIndex = (this.cardIndex - 1 + this.numCards) % this.numCards;
                                this.updateCardPosition();
                            },

                            nextCard() {
                                this.cardIndex = (this.cardIndex + 1) % this.numCards;
                                this.updateCardPosition();
                            }
                        };
                    }
                </script>
            </section>
            <!-- FAQ'S Section -->
            <section class="p-4 grid grid-cols-1 gap-6  lg:grid-cols-2">
                <!-- Image Section -->
                <div class="md:col-span-1 lg:col-span-1 flex justify-center lg:px-4">
                    <!-- image -->
                    <img src="faqs.png" alt="Image" class=" object-cover w-full rounded-lg "
                        style="height: 550px ; border-radius: 16px;">
                </div>
                <!-- FAQ Section -->
                <div class="md:col-span-1 lg:col-span-1">
                    <h1 class="text-4xl font-bold my-4 lg:text-start text-center" style="letter-spacing: 2px">
                        Frequently Asked Questions
                    </h1>
                    <div class="md:p-2 p-6" id="accordion-flush" data-accordion="collapse"
                        data-active-classes="text-gray-900" data-inactive-classes="text-gray-500">
                        <!-- FAQ Items... -->
                        <div class="py-4 mx-auto">
                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-gray-900"
                                data-inactive-classes="text-gray-500">
                                <!-- FAQ Item 1 -->
                                <h2 id="accordion-flush-heading-1">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200"
                                        data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                        aria-controls="accordion-flush-body-1">
                                        <span class="text-gray-800 font-bold">What types of houses do you
                                            offer?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-1" class="hidden"
                                    aria-labelledby="accordion-flush-heading-1">
                                    <div class="py-5 border-b border-gray-200">
                                        <p class="mb-2 text-gray-500">We offer a wide variety of houses, including
                                            single-family homes, townhouses, condos, and apartments. Each type of house
                                            is
                                            designed to meet different needs and preferences.</p>
                                        <p class="text-gray-500">Explore our <a href="/house-types"
                                                class="text-blue-600 hover:underline">house types</a> page to learn
                                            more
                                            about the features and benefits of each option.</p>
                                    </div>
                                </div>
                                <!-- FAQ Item 2 -->
                                <h2 id="accordion-flush-heading-2">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200"
                                        data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                        aria-controls="accordion-flush-body-2">
                                        <span class="text-gray-800 font-bold">How do I schedule a house
                                            viewing?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-2" class="hidden"
                                    aria-labelledby="accordion-flush-heading-2">
                                    <div class="py-5 border-b border-gray-200">
                                        <p class="mb-2 text-gray-500">To schedule a house viewing, please visit our <a
                                                href="/schedule-viewing"
                                                class="text-blue-600 hover:underline">schedule
                                                viewing</a> page. You can choose a convenient date and time, and our
                                            team
                                            will get in touch with you to confirm the appointment.</p>
                                        <p class="text-gray-500">If you have specific preferences or questions, you
                                            can
                                            also reach out to our customer support at <a href="tel:123-456-7890"
                                                class="text-blue-600 hover:underline">(123) 456-7890</a>.</p>
                                    </div>
                                </div>
                                <!-- FAQ Item 3 -->
                                <h2 id="accordion-flush-heading-3">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200"
                                        data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                                        aria-controls="accordion-flush-body-3">
                                        <span class="text-gray-800 font-bold">What amenities are included with the
                                            houses?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-3" class="hidden"
                                    aria-labelledby="accordion-flush-heading-3">
                                    <div class="py-5 border-b border-gray-200">
                                        <p class="mb-2 text-gray-500">Our houses come with a range of amenities
                                            depending
                                            on the type and location. Common amenities include spacious living areas,
                                            modern
                                            kitchens, private outdoor spaces, and access to community facilities such as
                                            pools and gyms.</p>
                                        <p class="text-gray-500">For a detailed list of amenities for each house,
                                            please
                                            refer to the <a href="/house-details"
                                                class="text-blue-600 hover:underline">house details</a> page for the
                                            specific property you're interested in.</p>
                                    </div>
                                </div>
                                <!-- FAQ Item 4 -->
                                <h2 id="accordion-flush-heading-4">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200"
                                        data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                                        aria-controls="accordion-flush-body-4">
                                        <span class="text-gray-800 font-bold">Can I customize the interior of the
                                            house?</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-4" class="hidden"
                                    aria-labelledby="accordion-flush-heading-4">
                                    <div class="py-5 border-b border-gray-200">
                                        <p class="mb-2 text-gray-500">Yes, we offer customization options for the
                                            interior
                                            of our houses. Our design team can work with you to personalize certain
                                            aspects
                                            of the house, such as paint colors, flooring, and fixtures, to match your
                                            preferences and style.</p>
                                        <p class="text-gray-500">For more information about customization options and
                                            the
                                            process, please reach out to our <a href="/customization"
                                                class="text-blue-600 hover:underline">customization department</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Card Get Started -->
            <section class="p-4">
                <div class="card my-8 flex w-full py-10 flex-col justify-center items-center flex-shrink-0 gap-8 text-white hover:shadow-2xl"
                    style="border-radius: 16px; background: linear-gradient(135deg, #003F89 0.02%, #052851 48.19%, #006632 100%);">
                    <div class="grid gap-3 text-center ">
                        <h1 class="text-4xl font-bold " style="letter-spacing: 4px">
                            Get started with HouseLink
                        </h1>
                        <p class="text-gray-200 text-md" style="letter-spacing: 2px">
                            This beautiful collection of UI components is part of the recently <br>
                            released Purpose Design System.
                        </p>
                    </div>
                    <button type="button"
                        class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none rounded-lg border border-white hover:bg-blue-700 hover:text-white focus:z-10 focus:ring-2 "
                        style="letter-spacing: 2px;">
                        Get Started
                    </button>
                </div>
            </section>
        </div>
    </div>
    <!-- Footer Section -->
    <section class="flex flex-col  lg:justify-end font-poppins">
        <div class="w-full bg-blue-50 pt-11 dark:bg-gray-900 ">
            <div class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto lg:py-0">
                <div
                    class="flex items-center justify-center pb-3 border-b border-gray-300 dark:border-gray-700 lg:justify-between">
                    <div class="hidden mr-12 lg:block">
                        <span class="text-gray-700 dark:text-gray-400">Get connected with us</span>
                    </div>
                    <div class="flex justify-center ">
                        <a href="#" class="mr-6 text-gray-600 dark:text-gray-400 hover:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="w-5 h-5 bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="mr-6 text-gray-600 dark:text-gray-400 hover:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="w-5 h-5 bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="mr-6 text-gray-600 dark:text-gray-400 hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="w-5 h-5 bi bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="mr-6 text-gray-600 dark:text-gray-400 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class=" w-5 h-5 bi bi-linkedin" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex flex-wrap py-10 -mx-3">
                    <div class="w-full px-4 mb-11 md:w-1/2 lg:w-4/12 lg:mb-0">
                        <a href="#" class="inline-block mb-4 text-2xl font-bold dark:text-gray-400">

                            <img src="{{ asset('logo.png') }}" class="h-20 mr-8" alt="houseLink Logo" />
                            <span
                                class="self-center text-2xl font-semibold whitespace-nowrap text-white">HouseLink</span>

                        </a>
                        <p class="text-base font-normal leading-6 lg:w-64 dark:text-gray-400">
                            Lorem ipsum dor amet Lorem ipsum dor amet Lorem ipsum dor Lorem ipsum dor amet Lorem ipsum
                            dor amet Lorem ipsum dor
                        </p>
                    </div>
                    <div class="w-full px-4 md:w-1/4 lg:w-2/12 mb-11 lg:mb-0">
                        <h2 class="mb-4 text-lg font-bold text-gray-800 dark:text-gray-400">Recent Posts</h2>
                        <ul>
                            <li class="mb-4">
                                <a href="#"
                                    class="inline-block text-base font-normal dark:text-gray-400">Home</a>
                            </li>
                            <li class="mb-4">
                                <a href="#"
                                    class="inline-block text-base font-normal dark:text-gray-400">About
                                    Us</a>
                            </li>
                            <li class="mb-4">
                                <a href="#"
                                    class="inline-block text-base font-normal dark:text-gray-400">Features</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full px-4 mb-11 lg:mb-0 md:w-1/4 lg:w-2/12">
                        <h2 class="mb-4 text-base font-bold text-gray-800 dark:text-gray-400">Recent Posts</h2>
                        <ul>
                            <li class="mb-4">
                                <a href="#"
                                    class="inline-block text-base font-normal dark:text-gray-400">Home</a>
                            </li>
                            <li class="mb-4">
                                <a href="#"
                                    class="inline-block text-base font-normal dark:text-gray-400">About
                                    Us</a>
                            </li>
                            <li class="mb-4">
                                <a href="#"
                                    class="inline-block text-base font-normal dark:text-gray-400">Features</a>
                            </li>
                        </ul>
                    </div>

                    <div class="w-full px-4 mb-2 lg:mb-0 md:w-1/3 lg:w-4/12">
                        <h2 class="mb-4 text-lg font-bold text-gray-800 dark:text-gray-400">Newsletter</h2>
                        <div class="flex flex-wrap">
                            <div class="w-full py-1 mb-2 lg:flex-1 lg:py-0 lg:mr-3 lg:mb-0">
                                <input type="email "
                                    class="inline-block w-full h-12 px-3 text-gray-700 placeholder-gray-500 border rounded-md dark:placeholder-gray-400 dark:text-gray-400 dark:border-gray-700 dark:bg-gray-700"
                                    placeholder="Your email">
                            </div>
                            <div class="w-full py-1 lg:w-auto lg:py-0">
                                <a href="#"
                                    class="inline-block w-full px-5 py-4 font-medium leading-4 text-center bg-blue-200 rounded-md dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 hover:bg-blue-300">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-6 text-center  dark:text-gray-400">
                    <span>© Copyright {{ date('Y') }}. All Rights Reserved</span>
                </div>
            </div>
            {{-- <div class="py-6 text-center bg-blue-200 dark:bg-gray-800 dark:text-gray-400">
                <span>© Copyright 2022 . All Rights Reserved</span>
            </div> --}}
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>

</body>

</html>