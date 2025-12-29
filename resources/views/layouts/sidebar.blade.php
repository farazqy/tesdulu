<div class="flex flex-col w-64 h-screen bg-white border-r border-gray-200">
    <div class="flex items-center justify-center h-20 border-b border-gray-100">
        <h1 class="text-2xl font-bold text-gray-800">SI-RUANGAN</h1>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2">
        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
        
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-50 hover:text-orange-600 transition-colors {{ request()->routeIs('dashboard') ? 'bg-orange-50 text-orange-600 font-medium' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>

        @if(Auth::user()->role === 'admin')
        <a href="{{ route('rooms.index') }}" class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-50 hover:text-orange-600 transition-colors {{ request()->routeIs('rooms.*') ? 'bg-orange-50 text-orange-600 font-medium' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            Data Ruangan
        </a>

        <a href="{{ route('bookings.index') }}" class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-50 hover:text-orange-600 transition-colors {{ request()->routeIs('bookings.*') ? 'bg-orange-50 text-orange-600 font-medium' : '' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Peminjaman
        </a>
        @endif
    </nav>
 

    <div class="p-4 border-t border-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs text-white-500 hover:text-red-500">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</div>