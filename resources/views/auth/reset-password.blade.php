<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        
        <div class="mb-6">
            <a href="/">
                <img src="{{ asset('images/LOGO-M.png') }}" class="w-28 h-auto" alt="Logo">
            </a>
        </div>

        <div class="w-full sm:max-w-md px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-100 relative">
            
            <div class="absolute top-0 right-0 -mr-10 -mt-10 w-24 h-24 rounded-full bg-red-50 opacity-50"></div>

            <div class="mb-8 text-center relative z-10">
                <h2 class="text-2xl font-extrabold text-gray-900">Buat Password Baru</h2>
                <p class="mt-2 text-sm text-gray-500">
                    Silakan masukkan password baru untuk akun Anda.
                </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" readonly />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <p class="text-xs text-gray-400 mt-1 italic">*Email otomatis terisi dari link reset.</p>
                </div>

                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password Baru')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password baru" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="w-full justify-center py-3 text-base">
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        
        <p class="mt-8 text-center text-xs text-gray-400 font-medium">
            &copy; {{ date('Y') }} ROMENA - Telkom University
        </p>
    </div>
</x-guest-layout>