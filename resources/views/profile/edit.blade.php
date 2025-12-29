<x-app-layout>
    <div class="bg-red-900 pt-8 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex items-center gap-4">
            <div class="h-16 w-16 bg-white rounded-full flex items-center justify-center text-2xl font-bold text-red-900 shadow-lg">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <h1 class="text-3xl font-bold text-white tracking-tight">Pengaturan Akun</h1>
                <p class="text-red-100 mt-1 text-lg">
                    Kelola informasi profil, password, dan keamanan akun Anda.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12 space-y-6">
        
        <div class="p-8 bg-white shadow-xl rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Informasi Profil</h2>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-8 bg-white shadow-xl rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Ganti Password</h2>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-8 bg-white shadow-xl rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-red-700 mb-4">Zona Bahaya</h2>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>