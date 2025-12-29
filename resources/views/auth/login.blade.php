<x-guest-layout>
    <div class="flex h-screen w-full overflow-hidden">
        
        <div class="hidden md:flex w-1/2 bg-red-900 relative items-center justify-center">
            <div class="absolute inset-0 bg-red-900/40 z-10"></div>
            
            <img src="{{ asset('images/home.jpg') }}" 
                 class="absolute inset-0 w-full h-full object-cover" 
                 alt="Background Kampus">
            
            <div class="relative z-20 text-center px-10">
                <h2 class="text-4xl font-bold text-white mb-4">Selamat Datang Kembali!</h2>
                <p class="text-gray-100 text-lg">
                    Sistem Manajemen Ruangan Terintegrasi<br>Telkom University.
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/2 bg-white flex flex-col justify-center items-center px-8 md:px-16">
            <div class="w-full max-w-md">
                
                <div class="flex justify-center mb-8">
                    <a href="/">
                        <img src="{{ asset('images/LOGO-M.png') }}" class="h-16 w-auto" alt="Logo">
                    </a>
                </div>

                <div class="text-center mb-10">
                    <h3 class="text-2xl font-bold text-gray-900">Login Akun</h3>
                    <p class="text-gray-500 text-sm mt-2">Masuk untuk mengelola peminjaman ruangan.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email Telkom Univ</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-red-500 focus:ring-red-500 outline-none transition" 
                               placeholder="nama@telkomuniversity.ac.id">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-5">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input id="password" type="password" name="password" required 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-red-500 focus:ring-red-500 outline-none transition" 
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">Ingat Saya</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a class="text-sm text-red-700 hover:text-red-900 font-semibold hover:underline" href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-red-900 text-white font-bold py-3 px-4 rounded-lg hover:bg-red-800 transition duration-300 shadow-md transform hover:-translate-y-0.5">
                        Masuk Sekarang
                    </button>

                    <div class="mt-8 text-center text-sm text-gray-500">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-red-700 font-bold hover:underline">Daftar disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>