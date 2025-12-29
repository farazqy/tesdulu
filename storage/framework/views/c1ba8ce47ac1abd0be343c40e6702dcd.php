<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="bg-red-900 pt-8 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-white">
                <h1 class="text-3xl font-bold tracking-tight">Daftar Ruangan</h1>
                <p class="text-red-100 mt-2 text-lg">
                    Kelola data ruangan, fasilitas, dan status ketersediaan.
                </p>
            </div>
            
            <?php if(Auth::user()->role === 'admin'): ?>
            <div>
                <a href="<?php echo e(route('rooms.create')); ?>" class="inline-flex items-center px-6 py-3 bg-white text-red-900 font-bold rounded-xl hover:bg-red-50 transition shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Ruangan
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12">
        
        <div class="bg-white rounded-2xl shadow-lg p-4 mb-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <form method="GET" action="<?php echo e(route('rooms.index')); ?>" class="relative w-full md:w-96">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" 
                       name="search" 
                       value="<?php echo e(request('search')); ?>"
                       placeholder="Cari nama ruangan..." 
                       class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-red-500 focus:ring-red-500 transition">
            </form>

            <div class="text-sm text-gray-500">
                Menampilkan <strong><?php echo e($rooms->count()); ?></strong> Ruangan
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 group flex flex-col">
                
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="<?php echo e(asset('images/kelas.png')); ?>" 
                         alt="Room Image" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-gray-800 shadow-sm flex items-center">
                        <svg class="w-3 h-3 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <?php echo e($room->capacity); ?> Orang
                    </div>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <p class="text-xs font-bold text-red-600 uppercase tracking-wider mb-1">
                                <?php echo e($room->building->name ?? 'Gedung Umum'); ?>

                            </p>
                            <h3 class="text-xl font-bold text-gray-900 leading-tight"><?php echo e($room->name); ?></h3>
                        </div>
                    </div>

                    <p class="text-gray-500 text-sm mb-4 flex-1">
                        Ruangan kelas dengan fasilitas lengkap untuk kegiatan belajar mengajar.
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                        
                        <?php if($room->current_status == 'used'): ?>
                            <span class="flex items-center text-xs font-bold text-red-600 bg-red-50 px-2 py-1 rounded">
                                <span class="w-2 h-2 rounded-full bg-red-600 mr-2 animate-pulse"></span>
                                Sedang Dipakai
                            </span>

                        <?php elseif($room->current_status == 'maintenance'): ?>
                            <span class="flex items-center text-xs font-bold text-gray-600 bg-gray-200 px-2 py-1 rounded">
                                <span class="w-2 h-2 rounded-full bg-gray-500 mr-2"></span>
                                Maintenance
                            </span>

                        <?php else: ?>
                            <span class="flex items-center text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded">
                                <span class="w-2 h-2 rounded-full bg-green-600 mr-2"></span>
                                Available
                            </span>
                        <?php endif; ?>

                        <?php if(Auth::user()->role === 'admin'): ?>
                            <div class="flex space-x-2">
                                <a href="<?php echo e(route('rooms.edit', $room->id)); ?>" class="text-gray-400 hover:text-blue-600 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="<?php echo e(route('rooms.destroy', $room->id)); ?>" method="POST" onsubmit="return confirm('Hapus ruangan ini?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        <?php else: ?>
                           <a href="<?php echo e(route('bookings.create')); ?>" class="text-sm font-bold text-red-700 hover:underline">
                               Pinjam &rarr;
                           </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="col-span-1 md:col-span-3 text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada ruangan</h3>
                <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan ruangan baru.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\faris\Downloads\TUBES PAW\SistemRuangan\resources\views/rooms/index.blade.php ENDPATH**/ ?>