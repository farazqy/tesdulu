<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket Booking - {{ $booking->room->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none; }
            body { background: white; }
            .ticket-container { box-shadow: none; border: 2px solid #000; }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden ticket-container relative">
        
        <div class="bg-red-900 px-6 py-8 text-center text-white relative overflow-hidden">
            <div class="absolute top-0 left-0 -ml-10 -mt-10 w-32 h-32 rounded-full bg-white opacity-10"></div>
            <div class="absolute bottom-0 right-0 -mr-10 -mb-10 w-32 h-32 rounded-full bg-white opacity-10"></div>
            
            <h2 class="text-sm font-bold tracking-widest uppercase mb-1 opacity-80">E-TICKET PEMINJAMAN</h2>
            <h1 class="text-3xl font-bold">ROMENA</h1>
            <p class="text-xs mt-2 opacity-75">Telkom University Integrated System</p>
        </div>

        <div class="px-8 py-8 space-y-6">
            
            <div class="text-center">
                <p class="text-gray-500 text-xs font-bold uppercase">Ruangan</p>
                <p class="text-4xl font-extrabold text-gray-900 mt-1">{{ $booking->room->name }}</p>
                <span class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">APPROVED</span>
            </div>

            <div class="border-t-2 border-dashed border-gray-200"></div>

            <div class="grid grid-cols-2 gap-6 text-sm">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase">Tanggal</p>
                    <p class="font-bold text-gray-800">{{ \Carbon\Carbon::parse($booking->start_time)->isoFormat('D MMMM Y') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-gray-400 text-xs font-bold uppercase">Jam</p>
                    <p class="font-bold text-gray-800">
                        {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - 
                        {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
                    </p>
                </div>
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase">Peminjam</p>
                    <p class="font-bold text-gray-800">{{ $booking->user->name }}</p>
                </div>
                <div class="text-right">
                    <p class="text-gray-400 text-xs font-bold uppercase">ID Booking</p>
                    <p class="font-mono font-bold text-gray-800">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-center">
                <p class="text-gray-400 text-xs font-bold uppercase mb-1">Keperluan</p>
                <p class="text-gray-800 font-medium text-sm italic">"{{ $booking->purpose }}"</p>
            </div>

            <div class="text-center">
                <div class="h-12 bg-gray-800 w-full rounded-md flex items-center justify-center overflow-hidden">
                    <div class="flex space-x-1 h-full w-full justify-center opacity-50 px-4 py-2">
                        @for($i=0; $i<40; $i++)
                            <div class="w-1 bg-white h-full" style="opacity: {{ rand(3,10)/10 }}"></div>
                        @endfor
                    </div>
                </div>
                <p class="text-[10px] text-gray-400 mt-2">Tunjukkan tiket ini kepada petugas.</p>
            </div>
        </div>

        <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-between items-center no-print">
            <a href="{{ route('bookings.index') }}" class="text-gray-500 hover:text-gray-900 text-sm font-bold">
                &larr; Kembali
            </a>
            <button onclick="window.print()" class="bg-red-900 text-white px-6 py-2 rounded-lg font-bold shadow hover:bg-red-800 transition">
                Cetak Tiket
            </button>
        </div>
    </div>
</body>
</html>