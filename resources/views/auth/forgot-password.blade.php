<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        
        <div class="mb-6">
            <a href="/">
                <img src="{{ asset('images/LOGO-M.png') }}" class="w-28 h-auto" alt="Logo">
            </a>
        </div>

        <div class="w-full sm:max-w-md px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-100 relative">
            
            <div class="absolute top-0 right-0 -mr-10 -mt-10 w-24 h-24 rounded-full bg-red-50 opacity-50"></div>
            <div class="absolute bottom-0 left-0 -ml-10 -mb-10 w-24 h-24 rounded-full bg-red-50 opacity-50"></div>

            <div class="mb-8 text-center relative z-10">
                <h2 class="text-2xl font-extrabold text-gray-900">Lupa Password?</h2>
                <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                    Masukkan email yang terdaftar, kami akan mengirimkan link reset password ke email Anda.
                </p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="relative z-10">
                @csrf

                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-2 w-full py-3" type="email" name="email" :value="old('email')" required autofocus placeholder="nama@student.telkomuniversity.ac.id" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-8 gap-4">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-400 hover:text-red-700 transition flex items-center group">
                        <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali
                    </a>

                    <x-primary-button class="justify-center w-auto px-6">
                        {{ __('Kirim Link Reset') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        
        <p class="mt-8 text-center text-xs text-gray-400 font-medium">
            &copy; {{ date('Y') }} ROMENA - Telkom University
        </p>
    </div>
</x-guest-layout>