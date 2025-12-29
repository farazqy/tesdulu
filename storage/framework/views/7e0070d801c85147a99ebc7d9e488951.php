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
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-white tracking-tight">Edit Ruangan</h1>
            <p class="text-red-100 mt-2 text-lg">
                Perbarui informasi untuk ruangan <span class="font-bold underline"><?php echo e($room->name); ?></span>.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                        <h3 class="font-bold text-lg text-gray-800">Formulir Perubahan Data</h3>
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full border border-blue-100">
                            Edit Mode
                        </span>
                    </div>

                    <div class="p-8">
                        <form action="<?php echo e(route('rooms.update', $room->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Ruangan</label>
                                <input type="text" name="name" id="name" oninput="updatePreview()" value="<?php echo e(old('name', $room->name)); ?>"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition"
                                       placeholder="Contoh: 03-001">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs italic mt-2"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Lokasi Gedung</label>
                                <div class="relative">
                                    <select name="building_id" id="building_id" onchange="updatePreview()" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-3 pr-8 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-700 leading-tight transition">
                                        <option value="" disabled>-- Pilih Gedung --</option>
                                        <?php $__currentLoopData = $buildings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $building): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($building->id); ?>" <?php echo e($room->building_id == $building->id ? 'selected' : ''); ?>>
                                                <?php echo e($building->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['building_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs italic mt-2"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Kapasitas (Orang)</label>
                                    <input type="number" name="capacity" id="capacity" oninput="updatePreview()" value="<?php echo e(old('capacity', $room->capacity)); ?>"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                    <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs italic mt-2"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Status Ruangan</label>
                                    <select name="is_available" id="is_available" onchange="updatePreview()" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                        <option value="1" <?php echo e($room->is_available ? 'selected' : ''); ?>>Available (Bisa Dipinjam)</option>
                                        <option value="0" <?php echo e(!$room->is_available ? 'selected' : ''); ?>>Maintenance (Rusak/Perbaikan)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                                <a href="<?php echo e(route('rooms.index')); ?>" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition">
                                    Batal
                                </a>
                                <button type="submit" class="px-8 py-3 bg-red-800 text-white font-bold rounded-xl hover:bg-red-900 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                                    Simpan Perubahan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-yellow-50 rounded-2xl border border-yellow-100 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="font-bold text-yellow-800">Perhatian</h3>
                    </div>
                    <p class="text-sm text-yellow-700 leading-relaxed">
                        Mengubah kapasitas ruangan tidak akan membatalkan peminjaman yang sudah disetujui sebelumnya.
                    </p>
                </div>

                 <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm sticky top-24">
                    <h4 class="font-bold text-gray-400 text-xs uppercase mb-4">Live Preview Perubahan</h4>
                    
                    <div class="border rounded-xl overflow-hidden shadow-sm transition hover:shadow-md">
                        <div class="h-32 bg-gray-200 relative overflow-hidden">
                             <img src="<?php echo e(asset('images/kelas.png')); ?>" class="w-full h-full object-cover">
                             
                             <div class="absolute top-2 right-2 bg-white/90 backdrop-blur-sm px-2 py-1 rounded-full text-[10px] font-bold text-gray-800 shadow-sm">
                                <span id="preview-capacity"><?php echo e($room->capacity); ?></span> Orang
                            </div>
                        </div>
                        <div class="p-4">
                            <p id="preview-building" class="text-[10px] font-bold text-red-600 uppercase">
                                <?php echo e($room->building->name ?? 'PILIH GEDUNG'); ?>

                            </p>
                            <h3 id="preview-name" class="font-bold text-gray-900 text-sm mt-1"><?php echo e($room->name); ?></h3>
                            
                            <p id="preview-status-container" class="text-xs mt-2 font-bold flex items-center text-green-600">
                                <span id="preview-status-dot" class="w-2 h-2 rounded-full bg-green-600 mr-1"></span> 
                                <span id="preview-status-text">Available</span>
                            </p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-4 italic text-center">
                        *Kartu akan berubah otomatis saat Anda mengedit form.
                    </p>
                 </div>
            </div>

        </div>
    </div>

    <script>
        function updatePreview() {
            const nameInput = document.getElementById('name').value;
            const capacityInput = document.getElementById('capacity').value;
            const buildingSelect = document.getElementById('building_id');
            const statusSelect = document.getElementById('is_available');
            
            let buildingName = "PILIH GEDUNG";
            if (buildingSelect.selectedIndex >= 0) {
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
                statusContainer.className = "text-xs text-gray-600 mt-2 font-bold flex items-center";
                statusDot.className = "w-2 h-2 rounded-full bg-gray-200 mr-1";
                statusText.innerText = "Maintenance";
            }
        }
        window.onload = updatePreview;
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\faris\Downloads\TUBES PAW\SistemRuangan\resources\views/rooms/edit.blade.php ENDPATH**/ ?>