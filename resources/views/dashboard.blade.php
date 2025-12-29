<x-app-layout>
    <div class="bg-red-900 pt-8 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-white">
                <h1 class="text-4xl font-bold tracking-tight">Dashboard {{ ucfirst(Auth::user()->role) }}</h1>
                <p class="text-red-100 mt-2 text-lg">
                    Selamat datang kembali, <span class="font-bold border-b border-red-400">{{ Auth::user()->name }}</span>.
                </p>
            </div>
            <div class="bg-red-800 bg-opacity-50 px-6 py-3 rounded-xl border border-red-700 text-white text-center backdrop-blur-sm">
                <span class="block text-xs font-bold uppercase tracking-wider text-red-200">Hari Ini</span>
                <span class="block text-xl font-bold">{{ now()->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            @if(Auth::user()->role === 'admin')
                <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center transition hover:-translate-y-1 hover:shadow-xl">
                    <span class="text-6xl font-bold text-red-900 mb-2">{{ \App\Models\Room::count() }}</span>
                    <span class="text-gray-500 text-sm font-bold uppercase tracking-widest">Total Ruangan</span>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center transition hover:-translate-y-1 hover:shadow-xl border-t-4 border-yellow-400">
                    <span class="text-6xl font-bold text-gray-800 mb-2">{{ \App\Models\Booking::where('status', 'pending')->count() }}</span>
                    <span class="text-gray-500 text-sm font-bold uppercase tracking-widest">Butuh Approval</span>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-col items-center text-center transition hover:-translate-y-1 hover:shadow-xl">
                    <span class="text-6xl font-bold text-gray-800 mb-2">{{ \App\Models\User::count() }}</span>
                    <span class="text-gray-500 text-sm font-bold uppercase tracking-widest">Total User</span>
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-lg p-10 flex flex-col md:flex-row items-center justify-between col-span-1 md:col-span-3">
                    <div class="text-center md:text-left">
                        <p class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">Total Peminjaman Saya</p>
                        <p class="text-7xl font-bold text-red-900">{{ \App\Models\Booking::where('user_id', Auth::id())->count() }}</p>
                    </div>
                    
                    <div class="mt-6 md:mt-0">
                        <a href="{{ route('bookings.create') }}" class="inline-flex items-center px-8 py-4 bg-red-800 hover:bg-red-900 text-white font-bold rounded-xl shadow-lg transition transform hover:scale-105 text-lg">
                            + Ajukan Peminjaman Baru
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white rounded-2xl shadow-md p-8 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Akses Cepat</h3>
                    <div class="space-y-4">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('rooms.index') }}" class="block w-full text-center py-3 border-2 border-red-100 text-red-800 font-bold rounded-lg hover:bg-red-50 transition">
                                Manage Ruangan &rarr;
                            </a>
                            <a href="{{ route('bookings.index') }}" class="block w-full text-center py-3 bg-red-800 text-white font-bold rounded-lg hover:bg-red-900 transition shadow-md">
                                Tinjau Booking Masuk &rarr;
                            </a>
                        @else
                            <a href="{{ route('rooms.index') }}" class="block w-full text-center py-3 border-2 border-gray-100 text-gray-600 font-bold rounded-lg hover:border-red-200 hover:text-red-700 transition">
                                Lihat Daftar Ruangan &rarr;
                            </a>
                            <a href="{{ route('bookings.index') }}" class="block w-full text-center py-3 border-2 border-gray-100 text-gray-600 font-bold rounded-lg hover:border-red-200 hover:text-red-700 transition">
                                Riwayat Peminjaman &rarr;
                            </a>
                        @endif
                    </div>
                </div>
                @if(Auth::user()->role === 'mahasiswa')
                <div class="bg-blue-50 rounded-2xl border border-blue-100 p-6">
                    <h4 class="font-bold text-blue-800 mb-2">Butuh Bantuan?</h4>
                    <p class="text-sm text-blue-600 mb-4">
                        Jika mengalami kendala saat melakukan pengajuan, hubungi admin.
                    </p>
                    <a href="https://wa.me/6282311159668" class="block w-full text-center py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                        Hubungi Admin WA
                    </a>
                </div>
                @endif
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                        <h3 class="font-bold text-lg text-gray-800">Aktivitas Terbaru</h3>
                        <a href="{{ route('bookings.index') }}" class="text-sm font-bold text-red-700 hover:underline">Lihat Semua</a>
                    </div>

                    @php
                        if(Auth::user()->role == 'admin') {
                            $activities = \App\Models\Booking::latest()->take(5)->get();
                        } else {
                            $activities = \App\Models\Booking::where('user_id', Auth::id())->latest()->take(5)->get();
                        }
                    @endphp

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-white text-gray-400 text-xs uppercase tracking-wider font-bold">
                                <tr>
                                    <th class="px-8 py-4">Ruangan</th>
                                    <th class="px-8 py-4">Tanggal</th>
                                    <th class="px-8 py-4 text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($activities as $act)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-8 py-4">
                                        <div class="font-bold text-gray-800">{{ $act->room->name }}</div>
                                        <div class="text-xs text-gray-500">{{ Str::limit($act->purpose, 30) }}</div>
                                    </td>
                                    <td class="px-8 py-4 text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($act->start_time)->isoFormat('D MMM Y') }}
                                        <div class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($act->start_time)->format('H:i') }} WIB</div>
                                    </td>
                                    <td class="px-8 py-4 text-right">
                                        @if($act->status == 'pending')
                                            <span class="inline-block px-3 py-1 text-xs font-bold text-white bg-yellow-500 rounded-full shadow-sm">Pending</span>
                                        @elseif($act->status == 'approved')
                                            <span class="inline-block px-3 py-1 text-xs font-bold text-white bg-green-600 rounded-full shadow-sm">Approved</span>
                                        @else
                                            <span class="inline-block px-3 py-1 text-xs font-bold text-white bg-red-600 rounded-full shadow-sm">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-10 text-center text-gray-400 italic">
                                        Belum ada data peminjaman.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>