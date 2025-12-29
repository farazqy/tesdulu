<x-app-layout>
    <div class="bg-red-900 pt-8 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-white tracking-tight">Jadwal Kampus Hari Ini</h1>
            <p class="text-red-100 mt-2 text-lg">
                {{ now()->isoFormat('dddd, D MMMM Y') }} — Pantau penggunaan ruangan secara real-time.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            
            @if($bookings->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Tidak Ada Jadwal</h3>
                    <p class="text-gray-500 mt-1">Hari ini kampus sepi, semua ruangan kosong.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-100 text-xs uppercase text-gray-500 font-bold tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Waktu</th>
                                <th class="px-6 py-4">Ruangan</th>
                                <th class="px-6 py-4">Kegiatan</th>
                                <th class="px-6 py-4">Peminjam</th>
                                <th class="px-6 py-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($bookings as $schedule)
                            @php
                                $now = \Carbon\Carbon::now();
                                $start = \Carbon\Carbon::parse($schedule->start_time);
                                $end = \Carbon\Carbon::parse($schedule->end_time);
                                $isOngoing = $now->between($start, $end);
                            @endphp
                            <tr class="hover:bg-red-50/30 transition {{ $isOngoing ? 'bg-red-50/20' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">{{ $start->format('H:i') }}</div>
                                    <div class="text-xs text-gray-500">s/d {{ $end->format('H:i') }}</div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-sm font-bold bg-red-100 text-red-800 border border-red-200">
                                        {{ $schedule->room->name }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $schedule->purpose }}</div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if($schedule->user->role === 'admin')
                                            <div class="h-6 w-6 rounded-full bg-red-100 flex items-center justify-center text-xs font-bold text-red-600 mr-2">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
                                            </div>
                                            <span class="text-sm text-gray-500 italic">Internal Kampus</span>
                                        @else
                                            <div class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 mr-2">
                                                {{ substr($schedule->user->name, 0, 1) }}
                                            </div>
                                            <span class="text-sm text-gray-600">{{ $schedule->user->name }}</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if($isOngoing)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800 animate-pulse">
                                            Sedang Berjalan
                                        </span>
                                    @elseif($now->lt($start))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                            Akan Datang
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-500">
                                            Selesai
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>