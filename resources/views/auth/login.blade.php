<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST"  action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" class="text-white" value="{{ __('Seu Email') }}" />
                <x-input id="email" class="block mt-1 bg-[#374151] text-[black] w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" class="text-white" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 bg-[#374151] text-[black] w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" class="bg-[yellow]" name="remember" />
                    <span class="ml-2 text-sm text-white">{{ __('Lembra-me') }}</span>
                </label>
            </div>

            <div class="flex items-center grid grid-cols-1 justify-end mt-4">
                @if (Route::has('password.request'))
                    <!-- <a class="underline  text-sm text-white hover:text-[yellow] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a> -->
                @endif

                <button class="rounded p-2 w-full mt-5 justify-center font-bold text-[black] bg-[yellow] hover:bg-[#C3FF09]">
                    {{ __('ENTRAR') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
