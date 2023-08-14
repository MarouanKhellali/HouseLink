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

    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit&display=swap');

        html {
            font-family: 'Outfit', system-ui, sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <!-- Main content -->
    <div class="w-11/12 flex ml-auto relative">
        <nav class="absolute top-0 left-0 w-full ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center">
                    <img src="{{ asset('logo.png') }}" class="h-9 mr-3" alt="houseLink Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">HouseLink</span>
                </a>

                <button data-collapse-toggle="navbar-multi-level" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-multi-level" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>

                <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                    <ul
                        class="flex flex-col items-center font-medium p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                style="letter-spacing: 1px ">
                                About us
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                style="letter-spacing: 1px ">
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                style="letter-spacing: 1px ">
                                Residences
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                style="letter-spacing: 1px ">
                                Reviews
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white rounded md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                style="letter-spacing: 1px ">
                                FAQ'S
                            </a>
                        </li>
                        <li>
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                style="letter-spacing: 1px ">
                                Get started
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bg-cover bg-center flex" style=" background-image: url('img.png');   height: 600px; width: 100%;">
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
        <div class="absolute w-full flex items-center justify-center px-4" style=" bottom: -8%">
            <div class=" py-6 px-8 border flex rounded-lg shadow-xl max-w-screen-xl  mx-auto "
                style=" fill: linear-gradient(154deg, rgba(255, 255, 255, 0.836) 0%, rgba(255, 255, 255, 0.87) 100%);filter: drop-shadow(0px 0px 50px rgba(30, 30, 30, 0.10)); backdrop-filter: blur(10px);">

                <div class="mr-3">
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">Action Type<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Bonnie
                                        Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Jese
                                        Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mr-3">
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">City<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Bonnie
                                        Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Jese
                                        Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mr-3">
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">Area<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Bonnie
                                        Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Jese
                                        Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mr-3">
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                        data-dropdown-placement="bottom"
                        class="text-gray-800 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center "
                        type="button">Property type<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search user">
                            </div>
                        </div>
                        <ul class="h-full px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownSearchButton">
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="checkbox-item-11" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-11"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Bonnie
                                        Green</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input checked id="checkbox-item-12" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-12"
                                        class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Jese
                                        Leos</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <p>MAD</p>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Max Price" required>
                </div>


                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-5 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    style="letter-spacing: 1px ">
                    Get started
                </button>
            </div>
        </div>
        
    </div>
    </div>
    <div class="partners flex items-center justify-center  ">
        <div class="relative overflow-hidden">
        
          <div class="flex items-center justify-center h-full">
            <div class="grid grid-cols-5 gap-1">
              <div class="aspect-w-1 aspect-h-1 overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ asset('partners/par3.png') }}" alt="Image 1">
              </div>
              <div class="aspect-w-1 aspect-h-1 overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ asset('partners/par2.png') }}" alt="Image 2">
              </div>
              <div class="aspect-w-1 aspect-h-1 overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ asset('partners/par1.png') }}" alt="Image 3">
              </div>
              <div class="aspect-w-1 aspect-h-1 overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ asset('partners/par4.png') }}" alt="Image 4">
              </div>
              <div class="aspect-w-1 aspect-h-1 overflow-hidden">
                <img class="object-cover w-full h-full" src="{{ asset('partners/par5.png') }}" alt="Image 5">
              </div>
            </div>
          </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

</body>

</html>