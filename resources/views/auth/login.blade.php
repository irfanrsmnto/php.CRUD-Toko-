<x-guest-layout>

    <div class="text-center mb-5">
        <h1 class="text-4xl font-bold">Welcome back</h1>
        <p class="">Sign in to your peaceful space</p>

    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required
                    autocomplete="current-password" />

                <!-- Icon mata -->
                <button type="button" onclick="togglePassword()"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                    <!-- Default: Mata tertutup -->
                    <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.418 0-8.167-2.91-9.542-7
                       a9.973 9.973 0 012.82-4.442m3.604-2.24A9.956 9.956 0 0112 5c4.418 0
                       8.167 2.91 9.542 7a9.97 9.97 0 01-4.043 5.411M15 12a3 3 0 11-6 0
                       3 3 0 016 0z" />
                    </svg>

                    <!-- Mata terbuka (hidden dulu) -->
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.833 7.91 7.582 5 12 5c4.418 0
                       8.167 2.91 9.542 7-1.375 4.09-5.124
                       7-9.542 7-4.418 0-8.167-2.91-9.542-7z" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex mt-4 justify-between">
            <div>
                <label for="remember_me" class=" items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

        </div>

        <div class="block items-center mt-4">

            <x-primary-button
                class="w-full bg-blue-600 justify-center text-white py-3 rounded-lg shadow hover:bg-blue-700 transition">
                {{ __('Sign in') }}
            </x-primary-button>

        </div>
    </form>

    <div class="flex items-center my-6">
        <div class="flex-grow h-px bg-gray-300"></div>
        <span class="px-3 text-gray-500 text-sm">or continue with</span>
        <div class="flex-grow h-px bg-gray-300"></div>
    </div>

    <div class="flex justify-center gap-4 mb-5">
        <!-- Google Button -->
        <button type="button" class="flex gap-2 items-center text-center border p-1 rounded-lg">
            <div class=""></div>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M9 7.4v3.2h4.6c-.2 1-.8 1.8-1.6 2.4v2h2.6c1.5-1.4 2.4-3.4 2.4-5.8 0-.6 0-1.1-.1-1.6H9z"
                    fill="#4285F4" />
                <path
                    d="M9 17c2.2 0 4-0.7 5.4-1.9l-2.6-2c-.7.5-1.6.8-2.8.8-2.1 0-3.9-1.4-4.6-3.4H1.7v2.1C3.1 15.2 5.8 17 9 17z"
                    fill="#34A853" />
                <path d="M4.4 10.5c-.2-.5-.2-1.1 0-1.6V6.8H1.7c-.6 1.2-.6 2.6 0 3.8l2.7-2.1z" fill="#FBBC04" />
                <path
                    d="M9 4.2c1.2 0 2.3.4 3.1 1.2l2.3-2.3C12.9 1.8 11.1 1 9 1 5.8 1 3.1 2.8 1.7 5.4l2.7 2.1C5.1 5.6 6.9 4.2 9 4.2z"
                    fill="#EA4335" />
            </svg>
            <span>Google</span>
            <div class="social-glow"></div>
        </button>

        <!-- Facebook Button -->
        <button type="button" class="flex gap-2 items-center text-center border p-1 rounded-lg">
            <div class=""></div>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="#1877F2">
                <path d="M18 9C18 4.03 13.97 0 9 0S0 4.03 0 9c0 4.49 3.29 8.21 7.59 9v-6.37H5.31V9h2.28V7.02c0-2.25 1.34-3.49
                     3.39-3.49.98 0 2.01.18 2.01.18v2.21h-1.13c-1.11 0-1.46.69-1.46 1.4V9h2.49l-.4 2.63H10.4V18C14.71 17.21
                     18 13.49 18 9z" />
            </svg>
            <span>Facebook</span>
            <div class="social-glow"></div>
        </button>
    </div>

    <div class="text-center">
        <span class="">Don't have an account?</span>
        <a href="{{ route('register') }}" class="underline">Sign up</a>
    </div>




    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const eyeOpen = document.getElementById("eyeOpen");
            const eyeClosed = document.getElementById("eyeClosed");

            if (password.type === "password") {
                password.type = "text";
                eyeOpen.classList.remove("hidden");
                eyeClosed.classList.add("hidden");
            } else {
                password.type = "password";
                eyeOpen.classList.add("hidden");
                eyeClosed.classList.remove("hidden");
            }
        }
    </script>

</x-guest-layout>
