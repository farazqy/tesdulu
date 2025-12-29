<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ROMENA | TELKOM UNIVERSITY</title>
        
        <link rel="icon" href="<?php echo e(asset('images/ICON.png')); ?>" type="image/png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            body { font-family: 'Figtree', sans-serif; }
            html { scroll-behavior: smooth; }
        </style>
    </head>
    <body class="antialiased bg-white text-gray-800">

        <nav class="flex items-center justify-between px-8 py-4 bg-red-900 shadow-md sticky top-0 z-50">
            <a href="/" class="flex items-center gap-3">
                <img src="<?php echo e(asset('images/LOGO.png')); ?>" alt="Logo" class="h-10 w-auto">
            </a>

            <div class="hidden md:flex space-x-8">
                <a href="#" class="text-sm font-medium text-gray-200 hover:text-white transition">Home</a>
                <a href="#rooms" class="text-sm font-medium text-gray-200 hover:text-white transition">Daftar Ruangan</a>
                <a href="#schedule" class="text-sm font-medium text-gray-200 hover:text-white transition">Jadwal</a>
                <a href="#contact" class="text-sm font-medium text-gray-200 hover:text-white transition">Kontak</a>
            </div>

            <div class="flex items-center space-x-4">
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="px-5 py-2 text-sm font-bold text-red-900 bg-white rounded-full hover:bg-gray-100 transition shadow-sm">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-sm font-medium text-gray-200 hover:text-white">Log in</a>
                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 text-sm text-white bg-black/30 border border-white/20 rounded-full hover:bg-black transition">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </nav>

        <div class="relative w-full h-[600px] bg-gray-900 flex items-center justify-center overflow-hidden">
            <img src="<?php echo e(asset('images/home.jpg')); ?>"
                 class="absolute inset-0 w-full h-full object-cover opacity-60"
                 alt="Background Kampus Telkom">
            
            <div class="relative z-10 text-center text-white px-4">
                <span class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-white uppercase bg-red-600 rounded">
                    CAMPUS FACILITY
                </span>
                
                <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-4 drop-shadow-lg">
                    Sistem Manajemen Ruangan
                </h1>

                <div class="flex items-center justify-center space-x-4 text-sm font-medium text-gray-300 mb-8">
                    <span>BY TELKOM UNIVERSITY</span>
                    <span>•</span>
                    <span><?php echo e(date('d M, Y')); ?></span>
                </div>

                <a href="#rooms" class="inline-flex items-center px-6 py-3 bg-red-700 hover:bg-red-800 text-white font-bold rounded-lg transition group">
                    <span>Cek Ketersediaan Sekarang</span>
                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="bg-white py-10 border-b border-gray-100 shadow-sm relative z-20 -mt-8 mx-6 rounded-lg md:mx-auto md:max-w-6xl">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-3xl font-bold text-red-900"><?php echo e(\App\Models\Room::count()); ?></p>
                    <p class="text-gray-500 text-xs uppercase tracking-wide mt-1">Total Ruangan</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-red-900">24/7</p>
                    <p class="text-gray-500 text-xs uppercase tracking-wide mt-1">Akses Online</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-red-900"><?php echo e(\App\Models\User::count()); ?></p>
                    <p class="text-gray-500 text-xs uppercase tracking-wide mt-1">Pengguna Aktif</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-red-900">100%</p>
                    <p class="text-gray-500 text-xs uppercase tracking-wide mt-1">Transparan</p>
                </div>
            </div>
        </div>

        <div id="rooms" class="bg-white py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Daftar Ruangan</h2>
                        <p class="text-gray-500 mt-2">Pilihan ruangan yang ingin digunakan.</p>
                    </div>
                    <a href="<?php echo e(route('rooms.index')); ?>" class="hidden md:flex items-center text-red-700 font-bold hover:text-red-900 transition">
                        Lihat Semua Ruangan 
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="group bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="h-48 bg-gray-200 relative overflow-hidden">
                            <img src="<?php echo e(asset('images/kelas.png')); ?>" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Room Image">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-gray-700 shadow-sm">
                                Kapasitas: <?php echo e($room->capacity); ?>

                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo e($room->name); ?></h3>
                            <p class="text-gray-500 text-sm line-clamp-2 mb-4"><?php echo e($room->facilities); ?></p>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                                <?php if($room->current_status == 'used'): ?>
                                    <span class="text-xs font-bold px-2 py-1 rounded bg-red-100 text-red-700 animate-pulse">
                                        Sedang Digunakan
                                    </span>
                                <?php elseif($room->current_status == 'maintenance'): ?>
                                    <span class="text-xs font-bold px-2 py-1 rounded bg-gray-200 text-gray-600">
                                        Maintenance
                                    </span>
                                <?php else: ?>
                                    <span class="text-xs font-bold px-2 py-1 rounded bg-green-100 text-green-700">
                                        Available
                                    </span>
                                <?php endif; ?>
                                <a href="<?php echo e(route('bookings.create')); ?>" class="text-sm font-bold text-red-700 hover:text-red-900">Pinjam Sekarang &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-3 text-center py-10 bg-gray-50 rounded-xl">
                        <p class="text-gray-500">Belum ada data ruangan yang diinput.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div id="schedule" class="bg-gray-50 py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">Jadwal Kegiatan Hari Ini</h2>
                    <p class="text-gray-500 mt-2"><?php echo e(\Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y')); ?></p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-900 text-white">
                                <th class="p-4 text-sm font-semibold tracking-wide uppercase">Waktu</th>
                                <th class="p-4 text-sm font-semibold tracking-wide uppercase">Ruangan</th>
                                <th class="p-4 text-sm font-semibold tracking-wide uppercase">Kegiatan</th>
                                <th class="p-4 text-sm font-semibold tracking-wide uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        <?php $__empty_1 = true; $__currentLoopData = $todaySchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        
                        <?php
                            $now = \Carbon\Carbon::now();
                            $start = \Carbon\Carbon::parse($schedule->start_time);
                            $end = \Carbon\Carbon::parse($schedule->end_time);
                        ?>

                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-700 font-bold whitespace-nowrap">
                                <?php echo e($start->format('H:i')); ?> - <?php echo e($end->format('H:i')); ?>

                            </td>
                            <td class="p-4 text-blue-600 font-bold"><?php echo e($schedule->room->name); ?></td>
                            <td class="p-4 text-gray-600"><?php echo e($schedule->purpose); ?></td>
                            <td class="p-4">
                                <?php if($now->between($start, $end)): ?>
                                    <span class="px-3 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-full animate-pulse">
                                        Sedang Berjalan
                                    </span>
                                <?php elseif($now->lt($start)): ?>
                                    <span class="px-3 py-1 text-xs font-bold text-blue-700 bg-blue-100 rounded-full">
                                        Akan Datang
                                    </span>
                                <?php else: ?>
                                    <span class="px-3 py-1 text-xs font-bold text-gray-500 bg-gray-200 rounded-full">
                                        Selesai
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">
                                <p>Tidak ada kegiatan terjadwal hari ini.</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                    </table>
                </div>
                
                <div class="mt-6 text-center">
                    <a href="<?php echo e(route('bookings.daily')); ?>" class="text-red-700 font-bold hover:underline text-sm">
                        Lihat Jadwal Lengkap Hari Ini &rarr;
                    </a>
                </div>
            </div>
        </div>

    <div id="contact" class="bg-white py-20 border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                
                <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-center">
                    <span class="text-red-700 font-bold tracking-wider uppercase text-sm">Hubungi Kami</span>
                    <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-6">Butuh Bantuan?</h2>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        Jika Anda mengalami kendala saat menjalankan sistem, atau ingin mengajukan peminjaman untuk event besar, silakan hubungi kami.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-100 text-red-700">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg font-bold text-gray-900">Lokasi Kantor</h5>
                                <p class="text-gray-500">
                                    Kampus Minangkabau Lt. 2, Telkom University.<br>
                                    Jl. Minangkabau Barat No.50, Setiabudi, Jakarta Selatan.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-100 text-red-700">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg font-bold text-gray-900">Email & Telepon</h5>
                                <p class="text-gray-500">
                                    admin@telkomuniversity.ac.id<br>
                                    +62 823-1234-5679
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative w-full h-full min-h-[400px] bg-gray-200 rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3999908323675!2d106.8416663749903!3d-6.210862993777038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f471485665b3%3A0x6b77202758172928!2sTelkom%20University%20Jakarta%20Campus%20A!5e0!3m2!1sen!2sid!4v1703230000000!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="absolute inset-0 w-full h-full">
                    </iframe>
                </div>

            </div>
        </div>

        <footer class="bg-gray-900 text-white pt-12 pb-8">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">ROMENA</h3>
                    <p class="text-gray-400 max-w-sm">Sistem Manajemen Ruangan Terintegrasi untuk Civitas Akademika Telkom University.</p>
                </div>
                <div class="md:text-right">
                    <h3 class="text-lg font-bold mb-4">Tautan</h3>
                    <div class="space-x-4 text-gray-400">
                        <a href="#" class="hover:text-white">Home</a>
                        <a href="#rooms" class="hover:text-white">Ruangan</a>
                        <a href="#schedule" class="hover:text-white">Jadwal</a>
                        <a href="<?php echo e(route('login')); ?>" class="hover:text-white">Login</a>
                    </div>
                </div>
            </div>
            <div class="text-center text-gray-600 text-sm pt-8 border-t border-gray-800">
                <p>© <?php echo e(date('Y')); ?> ROMENA | Telkom University. All rights reserved.</p>
            </div>
        </footer>

    </body>
</html><?php /**PATH C:\Users\faris\Downloads\TUBES PAW\SistemRuangan\resources\views/welcome.blade.php ENDPATH**/ ?>