<x-app-layout>
    <div class="bg-red-900 pt-8 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-white tracking-tight">Tambah Ruangan Baru</h1>
            <p class="text-red-100 mt-2 text-lg">
                Masukkan data ruangan baru ke dalam sistem agar bisa dipinjam.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                        <h3 class="font-bold text-lg text-gray-800">Formulir Data Ruangan</h3>
                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full border border-green-100">
                            Create Mode
                        </span>
                    </div>

                    <div class="p-8">
                        <form action="{{ route('rooms.store') }}" method="POST">
                            @csrf

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Ruangan</label>
                                <input type="text" name="name" id="name" oninput="updatePreview()" value="{{ old('name') }}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition"
                                       placeholder="Contoh: 03-001">
                                @error('name') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Lokasi Gedung</label>
                                <div class="relative">
                                    <select name="building_id" id="building_id" onchange="updatePreview()" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-3 pr-8 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-700 leading-tight transition">
                                        <option value="" disabled selected>-- Pilih Gedung --</option>
                                        @foreach($buildings as $building)
                                            <option value="{{ $building->id }}" {{ old('building_id') == $building->id ? 'selected' : '' }}>
                                                {{ $building->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                                @error('building_id') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Kapasitas (Orang)</label>
                                    <input type="number" name="capacity" id="capacity" oninput="updatePreview()" value="{{ old('capacity') }}"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition"
                                           placeholder="Contoh: 40">
                                    @error('capacity') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Status Awal</label>
                                    <select name="is_available" id="is_available" onchange="updatePreview()" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                        <option value="1" selected>Available (Bisa Dipinjam)</option>
                                        <option value="0">Maintenance (Tidak Bisa Dipinjam)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                                <a href="{{ route('rooms.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition">
                                    Batal
                                </a>
                                <button type="submit" class="px-8 py-3 bg-red-800 text-white font-bold rounded-xl hover:bg-red-900 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                                    Simpan Ruangan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                
                <div class="bg-blue-50 rounded-2xl border border-blue-100 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="font-bold text-blue-800">Petunjuk</h3>
                    </div>
                    <ul class="space-y-3 text-sm text-blue-700">
                        <li class="flex items-start">
                            <span class="mr-2">&bull;</span>
                            Nama ruangan dan kapasitas akan langsung muncul di kartu preview.
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">&bull;</span>
                            Pilih status "Maintenance" jika ruangan sedang dalam perbaikan.
                        </li>
                    </ul>
                </div>

                 <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm sticky top-24">
                    <h4 class="font-bold text-gray-400 text-xs uppercase mb-4">Live Preview Kartu</h4>
                    
                    <div class="border rounded-xl overflow-hidden shadow-sm transition hover:shadow-md">
                        <div class="h-32 bg-gray-200 relative overflow-hidden">
                             <img src="{{ asset('images/kelas.png') }}" class="w-full h-full object-cover">
                             
                             <div class="absolute top-2 right-2 bg-white/90 backdrop-blur-sm px-2 py-1 rounded-full text-[10px] font-bold text-gray-800 shadow-sm">
                                <span id="preview-capacity">0</span> Orang
                            </div>
                        </div>
                        <div class="p-4">
                            <p id="preview-building" class="text-[10px] font-bold text-red-600 uppercase">
                                PILIH GEDUNG
                            </p>
                            <h3 id="preview-name" class="font-bold text-gray-900 text-sm mt-1">Nama Ruangan</h3>
                            
                            <p id="preview-status-container" class="text-xs text-green-600 mt-2 font-bold flex items-center">
                                <span id="preview-status-dot" class="w-2 h-2 rounded-full bg-green-600 mr-1"></span> 
                                <span id="preview-status-text">Available</span>
                            </p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-4 italic text-center">
                        *Kartu ini mensimulasikan tampilan ruangan di halaman daftar.
                    </p>
                 </div>
            </div>

        </div>
    </div>

    <script>
        function updatePreview() {
            // 1. Ambil value dari input
            const nameInput = document.getElementById('name').value;
            const capacityInput = document.getElementById('capacity').value;
            const buildingSelect = document.getElementById('building_id');
            const statusSelect = document.getElementById('is_available');
            
            let buildingName = "PILIH GEDUNG";
            if (buildingSelect.selectedIndex > 0) {
                buildingName = buildingSelect.options[buildingSelect.selectedIndex].text;
            }

            document.getElementById('preview-name').innerText = nameInput || 'Nama Ruangan';
            document.getElementById('preview-capacity').innerText = capacityInput || '0';
            document.getElementById('preview-building').innerText = buildingName;

            const statusContainer = document.getElementById('preview-status-container');
            const statusDot = document.getElementById('preview-status-dot');
            const statusText = document.getElementById('preview-status-text');

            if (statusSelect.value == '1') {
                statusContainer.className = "text-xs text-green-600 mt-2 font-bold flex items-center";
                statusDot.className = "w-2 h-2 rounded-full bg-green-600 mr-1";
                statusText.innerText = "Available";
            } else {
                statusContainer.className = "text-xs text-red-600 mt-2 font-bold flex items-center";
                statusDot.className = "w-2 h-2 rounded-full bg-red-600 mr-1";
                statusText.innerText = "Maintenance";
            }
        }
    </script>
</x-app-layout>