@section('title', 'Register')

<x-guest-layout>
    <div class="max-w-xl w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold text-gray-900">
                Welcome
            </h2>
            <p class="mt-2 text-sm text-gray-500">sell your properties or buy new properties</p>
        </div>

        <ul class="grid w-full h-full gap-4 grid-cols-1 justify-center">
            <li class="flex justify-center w-full bg-white border-2 border-gray-200 rounded-lg hover:border-green-600">
                <div class="inline-flex items-center justify-start w-full p-2 text-gray-500 ">
                    <div class="w-full grid gap-3 ">
                        <div class="grid w-full text-lg font-semibold">Seller</div>
                        <div class="w-full grid ">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-circle-check text-sm text-green-600 py-1 pl-4 "></i>
                                <p class="text-sm font-simple"> +1000 engeged buyers </p>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-circle-check text-sm text-green-600 py-1 pl-4 "></i>
                                <p class="text-sm font-simple"> Simple dashboard </p>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-circle-check text-sm text-green-600 py-1 pl-4 "></i>
                                <p class="text-sm font-simple"> Impeccable customer care </p>
                            </div>
                        </div>
                        <div class="w-full flex justify-center">

                            <div class="flex  w-full items-center justify-center ">
                                <a href="{{ route('register.seller') }}"
                                    class="w-full  px-4 py-2 text-center text-white bg-green-600 rounded-md  hover:bg-green-500">
                                   Sell proprties</a>
                            </div>
                        </div>
                    </div>


                </div>
                


            </li>
            <li class="flex justify-center w-full bg-white border-2 border-gray-200 rounded-lg hover:border-green-600 hover:shadow-xl">
                <div class="inline-flex items-center justify-start w-full p-2 text-gray-500 ">
                    <div class="w-full grid gap-3 ">
                        <div class="grid w-full text-lg font-semibold">Buyer</div>
                        <div class="w-full grid gap-2">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-circle-check text-sm text-green-600 py-1 pl-4 "></i>
                                <p class="text-sm font-simple"> +500 available properties </p>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-circle-check text-sm text-green-600 py-1 pl-4 "></i>
                                <p class="text-sm font-simple"> Manually verified sellers and companies </p>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-circle-check text-sm text-green-600 py-1 pl-4 "></i>

                                <p class="text-sm font-simple"> Custom properties recommendations </p>
                            </div>
                        </div>
                        <div class="flex">

                            <div class="flex  w-full items-center justify-center ">
                                <a href="{{ route('register.seller') }}"
                                    class="w-full px-4 py-2 text-center text-white bg-green-600 rounded-md  hover:bg-green-500 ">
                                    Buy proprties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</x-guest-layout>
