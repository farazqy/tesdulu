<x-guest-layout>
    <div class="flex h-screen w-full overflow-hidden">
        
        <div class="hidden md:flex w-1/2 bg-red-900 relative items-center justify-center">
            <div class="absolute inset-0 bg-red-900/40 z-10"></div>
            <img src="{{ asset('images/home.jpg') }}" 
                 class="absolute inset-0 w-full h-full object-cover" 
                 alt="Background Kampus">
            <div class="relative z-20 text-center px-10">
                <h2 class="text-4xl font-bold text-white mb-4">Bergabung Bersama Kami</h2>
                <p class="text-gray-100 text-lg">
                    Buat akun untuk mulai meminjam fasilitas<br>kampus dengan mudah.
                </p>
            </div>
        </div>

        <div class="w-full md:w-1/2 bg-white flex flex-col justify-center items-center px-8 md:px-16 overflow-y-auto">
            <div class="w-full max-w-md py-10">
                
                <div class="flex justify-center mb-6">
                    <a href="/">
                        <img src="{{ asset('images/LOGO-M.png') }}" class="h-14 w-auto" alt="Logo">
                    </a>
                </div>

                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-900">Registrasi Akun</h3>
                    <p class="text-gray-500 text-sm mt-2">Silakan isi data diri Anda dengan benar.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-red-500 focus:ring-red-500" 
                               placeholder="Nama Mahasiswa/Dosen">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email Telkom Univ</label>
                        <input id="email" type="email" name="email" :value="old('email')" required 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-red-500 focus:ring-red-500" 
                               placeholder="nama@student.telkomuniversity.ac.id">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input id="password" type="password" name="password" required 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-red-500 focus:ring-red-500" 
                               placeholder="Minimal 8 karakter">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-red-500 focus:ring-red-500" 
                               placeholder="Ulangi password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit" class="w-full bg-red-900 text-white font-bold py-3 px-4 rounded-lg hover:bg-red-800 transition duration-300 shadow-md">
                        Daftar Akun
                    </button>

                    <div class="mt-6 text-center text-sm text-gray-500">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-red-700 font-bold hover:underline">Login disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>