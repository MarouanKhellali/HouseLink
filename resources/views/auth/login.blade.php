@section('title' , 'Login')
<x-guest-layout>
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold text-gray-900">
                Welcome Back!
            </h2>
            <p class="mt-2 text-sm text-gray-500">Please sign in to your account</p>
        </div>

        <form class=" space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="content-center">
                <label for="email" :value="__('Email')"
                    class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Email</label>
                <input
                    class=" w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-500"
                    id="email" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-8 content-center">
                <label for="password" :value="__('Password')"
                    class="ml-3 text-sm font-bold text-gray-700 tracking-wide">
                    Password
                </label>
                <input
                    class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-green-500"
                    type="password" name="password" id="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Remember Me & Forgot your password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="h-4 w-4 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        {{ __('Remember me') }}
                    </label>
                </div>
                <div class="text-sm">
                    @if (Route::has('password.request'))
                        <a class="text-green-400 hover:text-blue-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center bg-green-700  hover:bg-green-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer ">
                    Sign in
                </button>
            </div>
            <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                <span>Don't have an account?</span>
                <a href="{{ route('register') }}"
                    class="text-green-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Sign
                    up
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>
