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
        <div class="max-w-7xl mx-auto flex items-center gap-4">
            <div class="h-16 w-16 bg-white rounded-full flex items-center justify-center text-2xl font-bold text-red-900 shadow-lg">
                <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

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
                <?php echo $__env->make('profile.partials.update-profile-information-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>

        <div class="p-8 bg-white shadow-xl rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Ganti Password</h2>
                <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>

        <div class="p-8 bg-white shadow-xl rounded-2xl border border-gray-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-red-700 mb-4">Zona Bahaya</h2>
                <?php echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
<?php endif; ?><?php /**PATH C:\Users\faris\Downloads\TUBES PAW\SistemRuangan\resources\views/profile/edit.blade.php ENDPATH**/ ?>