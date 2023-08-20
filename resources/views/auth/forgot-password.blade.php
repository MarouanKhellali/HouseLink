<x-guest-layout>

    <div class="max-w-md w-full space-y-8">
        <div class="text-center">

            <p class="mt-2 text-sm text-gray-700">
                {{ __('Forgot your password?') }}
            </p>
            <p class="mt-2 text-sm text-gray-500">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>


    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="content-center">
            <label for="email" :value="__('Email')" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Email</label>
            <input
                class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500"
                id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="w-full flex justify-center bg-green-700 hover:bg-green-600 text-gray-100 p-4 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>

</x-guest-layout>
