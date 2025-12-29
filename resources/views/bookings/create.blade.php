<x-app-layout>
    <div class="bg-red-900 pt-8 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-white tracking-tight">Ajukan Peminjaman</h1>
            <p class="text-red-100 mt-2 text-lg max-w-2xl">
                Silakan lengkapi formulir di bawah ini untuk mengajukan penggunaan fasilitas ruangan. Pastikan jadwal tidak bentrok.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                        <h3 class="font-bold text-lg text-gray-800">Formulir Booking</h3>
                        <span class="text-xs font-semibold text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-100">
                            Wajib Diisi Semua
                        </span>
                    </div>

                    <div class="p-8">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Ruangan</label>
                                <div class="relative">
                                    <select name="room_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-3 pr-8 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-700 leading-tight transition">
                                        <option value="" disabled selected>-- Pilih Ruangan --</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}">
                                                {{ $room->name }} (Kap: {{ $room->capacity }} Orang) - {{ $room->facilities }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                                @error('room_id') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Waktu Mulai</label>
                                    <input type="datetime-local" name="start_time" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                    @error('start_time') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Waktu Selesai</label>
                                    <input type="datetime-local" name="end_time" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                    @error('end_time') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="mb-8">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Keperluan Peminjaman</label>
                                <textarea name="purpose" rows="4" 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition" 
                                          placeholder="Contoh: Rapat Koordinasi Himpunan Mahasiswa Informatika..."></textarea>
                                @error('purpose') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="flex items-center justify-end space-x-4">
                                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition">
                                    Batal
                                </a>
                                <button type="submit" class="px-8 py-3 bg-red-800 text-white font-bold rounded-xl hover:bg-red-900 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                                    Ajukan Sekarang &rarr;
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-800">Aturan Peminjaman</h3>
                    </div>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Booking minimal <b>1 hari</b> sebelum kegiatan.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Wajib menjaga kebersihan ruangan setelah digunakan.</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-blue-50 rounded-2xl border border-blue-100 p-6">
                    <h4 class="font-bold text-blue-800 mb-2">Butuh Bantuan?</h4>
                    <p class="text-sm text-blue-600 mb-4">
                        Jika mengalami kendala saat melakukan pengajuan, hubungi admin.
                    </p>
                    <a href="https://wa.me/6282311159668" class="block w-full text-center py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                        Hubungi Admin WA
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>