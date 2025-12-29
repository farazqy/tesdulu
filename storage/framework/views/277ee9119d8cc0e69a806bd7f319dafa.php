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
                <h1 class="text-3xl font-bold tracking-tight">
                    <?php if(Auth::user()->role === 'admin'): ?>
                        Kelola Peminjaman Masuk
                    <?php else: ?>
                        Riwayat Peminjaman Saya
                    <?php endif; ?>
                </h1>
                <p class="text-red-100 mt-2 text-lg">
                    <?php if(Auth::user()->role === 'admin'): ?>
                        Tinjau dan setujui pengajuan penggunaan ruangan.
                    <?php else: ?>
                        Pantau status pengajuan peminjaman ruangan Anda di sini.
                    <?php endif; ?>
                </p>
            </div>
            
            <div>
                <a href="<?php echo e(route('bookings.create')); ?>" class="inline-flex items-center px-6 py-3 bg-white text-red-900 font-bold rounded-xl hover:bg-red-50 transition shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Ajukan Baru
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            
            <?php if(session('success')): ?>
                <div class="bg-green-50 border-l-4 border-green-500 p-4 m-6 mb-0 rounded-r">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="ml-3"><p class="text-sm text-green-700 font-bold"><?php echo e(session('success')); ?></p></div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-bold border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-5">Ruangan & Keperluan</th>
                            <th class="px-6 py-5">Jadwal</th>
                            
                            <?php if(Auth::user()->role === 'admin'): ?>
                                <th class="px-6 py-5">Peminjam</th>
                            <?php endif; ?>

                            <th class="px-6 py-5 text-center">Status</th>
                            <th class="px-6 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-red-50/30 transition duration-150 <?php echo e($booking->status == 'pending' && Auth::user()->role == 'admin' ? 'bg-yellow-50' : ''); ?>">
                            
                            <td class="px-6 py-5">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-lg bg-red-100 text-red-600 flex items-center justify-center font-bold text-xs">
                                        <?php echo e(substr($booking->room->name, 0, 3)); ?>

                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-900"><?php echo e($booking->room->name); ?></div>
                                        <div class="text-xs text-gray-500 mt-1 max-w-[200px] truncate" title="<?php echo e($booking->purpose); ?>">
                                            <?php echo e($booking->purpose); ?>

                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="text-sm text-gray-900 font-medium">
                                    <?php echo e(\Carbon\Carbon::parse($booking->start_time)->isoFormat('dddd, D MMMM Y')); ?>

                                </div>
                                <div class="text-xs text-gray-500 mt-1">
                                    <span class="inline-flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <?php echo e(\Carbon\Carbon::parse($booking->start_time)->format('H:i')); ?> - 
                                        <?php echo e(\Carbon\Carbon::parse($booking->end_time)->format('H:i')); ?> WIB
                                    </span>
                                </div>
                            </td>

                            <?php if(Auth::user()->role === 'admin'): ?>
                            <td class="px-6 py-5">
                                <div class="text-sm font-bold text-gray-900"><?php echo e($booking->user->name); ?></div>
                                <div class="text-xs text-gray-500"><?php echo e($booking->user->email); ?></div>
                            </td>
                            <?php endif; ?>

                            <td class="px-6 py-5 text-center">
                                <?php if($booking->status == 'pending'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                        <span class="w-2 h-2 rounded-full bg-yellow-500 mr-2 animate-pulse"></span>
                                        Menunggu
                                    </span>
                                <?php elseif($booking->status == 'approved'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-200 shadow-sm">
                                        <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                                        Disetujui
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-200">
                                        <span class="w-2 h-2 rounded-full bg-red-500 mr-2"></span>
                                        Ditolak
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="px-6 py-5 text-right">
                                
                                <?php if(Auth::user()->role === 'admin' && $booking->status == 'pending'): ?>
                                    <div class="flex items-center justify-end space-x-2">
                                        <form action="<?php echo e(route('bookings.approve', $booking->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                            <button type="submit" class="p-2 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition" title="Setujui">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                        </form>
                                        <form action="<?php echo e(route('bookings.reject', $booking->id)); ?>" method="POST" onsubmit="return confirm('Tolak pengajuan ini?');">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                            <button type="submit" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition" title="Tolak">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                        </form>
                                    </div>

                                <?php else: ?>
                                    <?php if($booking->status == 'approved'): ?>
                                        <a href="<?php echo e(route('bookings.ticket', $booking->id)); ?>" target="_blank" 
                                           class="inline-flex items-center px-4 py-2 border border-green-500 rounded-lg text-xs font-bold text-green-700 bg-green-50 hover:bg-green-100 transition shadow-sm">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                            Cetak Tiket
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs text-gray-400 font-medium italic">Tidak ada aksi</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="<?php echo e(Auth::user()->role === 'admin' ? '6' : '5'); ?>" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <p>Belum ada data pengajuan.</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
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
<?php endif; ?><?php /**PATH C:\Users\faris\Downloads\TUBES PAW\SistemRuangan\resources\views/bookings/index.blade.php ENDPATH**/ ?>