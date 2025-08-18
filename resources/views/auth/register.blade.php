<x-guest-layout>

    <div class="text-center mb-5">
        <h1 class="text-4xl font-bold">Welcome back</h1>
        <p class="">Sign up to your peaceful space</p>

    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required
                    autocomplete="current-password" />

                <!-- Icon mata -->
                <button type="button" onclick="togglePassword('password', 'eyeOpenPassword', 'eyeClosedPassword')"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                    <!-- Mata tertutup -->
                    <svg id="eyeClosedPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.418 0-8.167-2.91-9.542-7
                       a9.973 9.973 0 012.82-4.442m3.604-2.24A9.956 9.956 0 0112 5c4.418 0
                       8.167 2.91 9.542 7a9.97 9.97 0 01-4.043 5.411M15 12a3 3 0 11-6 0
                       3 3 0 016 0z" />
                    </svg>

                    <!-- Mata terbuka -->
                    <svg id="eyeOpenPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
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

        <!-- Confirm Password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <!-- Icon mata -->
                <button type="button"
                    onclick="togglePassword('password_confirmation', 'eyeOpenConfirm', 'eyeClosedConfirm')"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                    <!-- Mata tertutup -->
                    <svg id="eyeClosedConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.418 0-8.167-2.91-9.542-7
                       a9.973 9.973 0 012.82-4.442m3.604-2.24A9.956 9.956 0 0112 5c4.418 0
                       8.167 2.91 9.542 7a9.97 9.97 0 01-4.043 5.411M15 12a3 3 0 11-6 0
                       3 3 0 016 0z" />
                    </svg>

                    <!-- Mata terbuka -->
                    <svg id="eyeOpenConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.833 7.91 7.582 5 12 5c4.418 0
                       8.167 2.91 9.542 7-1.375 4.09-5.124
                       7-9.542 7-4.418 0-8.167-2.91-9.542-7z" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function togglePassword(inputId, eyeOpenId, eyeClosedId) {
            const input = document.getElementById(inputId);
            const eyeOpen = document.getElementById(eyeOpenId);
            const eyeClosed = document.getElementById(eyeClosedId);

            if (input.type === "password") {
                input.type = "text";
                eyeOpen.classList.remove("hidden");
                eyeClosed.classList.add("hidden");
            } else {
                input.type = "password";
                eyeOpen.classList.add("hidden");
                eyeClosed.classList.remove("hidden");
            }
        }
    </script>
</x-guest-layout>
