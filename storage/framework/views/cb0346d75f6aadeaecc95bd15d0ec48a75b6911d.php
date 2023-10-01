

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content_header'); ?>
    <h3><?php echo e($title); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
        <div class="row mt-3">
            <div class="col-md">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md mb-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModalDisposisi">
                <i class="fas fa-plus mr-2"></i> Tambah Disposisi
            </button>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md mb-3">
            <?php if (isset($component)) { $__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::resolve(['theme' => 'teal','title' => 'Informasi Surat Masuk','collapsible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="row">
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Status Surat'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h5><?php echo e($surat->status_surat); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Sifat Surat'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h5><?php echo e($surat->sifat_surat); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Sumber Surat'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h5><?php echo e($surat->sumber_surat); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'No Surat'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h5><?php echo e($surat->no_surat); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Kode Surat'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h5><?php echo e($surat->kode_surat); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Tanggal Surat'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h5><?php echo e($surat->tanggal_surat != null ? date("d-m-Y", strtotime($surat->tanggal_surat)) : ''); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Perihal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            
                            <h5><?php echo e($surat->perihal); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Tanggal Surat Masuk'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <h5><?php echo e($surat->tanggal_surat_masuk != null ? date("d-m-Y", strtotime($surat->tanggal_surat_masuk)) : ''); ?></h5>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md">
                        <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'File'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <a href="<?php echo e(asset("surat/masuk/$surat->file")); ?>" class="btn btn-success btn-sm d-block text-white" style="text-decoration:none;">Unduh</a>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127)): ?>
<?php $component = $__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127; ?>
<?php unset($__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127); ?>
<?php endif; ?>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md mb-3">
            <?php if (isset($component)) { $__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::resolve(['theme' => 'primary','title' => 'Disposisi Surat Masuk'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php $__currentLoopData = $surat->disposisi->sortByDesc('sifat_status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::resolve(['theme' => 'secondary','title' => 'Disposisi '.e($loop->iteration).'','collapsible' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-light']); ?>
                        <div class="row">
                            <div class="col-md">
                                <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Penerima'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <h5 id="disposisiPenerima_<?php echo e($loop->iteration); ?>"><?php echo e($item->penerima); ?></h5>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                            </div>
                            <div class="col-md">
                                <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Tenggat waktu'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <h5 id="disposisiTenggat_<?php echo e($loop->iteration); ?>" data-asli="<?php echo e($item->tenggat_waktu); ?>"><?php echo e($item->tenggat_waktu != null ? date("d-m-Y", strtotime($item->tenggat_waktu)) : ''); ?></h5>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                            </div>
                            <div class="col-md">
                                <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Isi Disposisi'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <h5 id="disposisiIsi_<?php echo e($loop->iteration); ?>"><?php echo e($item->isi_disposisi); ?></h5>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Sifat Status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <h5 id="disposisiSifat_<?php echo e($loop->iteration); ?>"><?php echo e($item->sifat_status); ?></h5>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                            </div>
                            <div class="col-md">
                                <?php if (isset($component)) { $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::resolve(['title' => 'Catatan'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\Callout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <h5 id="disposisiCatatan_<?php echo e($loop->iteration); ?>"><?php echo e($item->catatan); ?></h5>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62)): ?>
<?php $component = $__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62; ?>
<?php unset($__componentOriginald4eaa7d50c9a38ea504d56c2c2f22775c77b7f62); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a onclick="handleEditDisposisi(this, <?php echo e($item->id); ?>, <?php echo e($loop->iteration); ?>)" class="btn btn-warning d-block" data-toggle="modal" data-target="#editDisposisi"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col-md-6">
                                <a onclick="handleDelete(`<?php echo e(route('surat-masuk.disposisi.destroy', $item->id)); ?>`)" class="btn btn-danger d-block" data-toggle="modal" data-target="#deleteDisposisi"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127)): ?>
<?php $component = $__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127; ?>
<?php unset($__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127)): ?>
<?php $component = $__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127; ?>
<?php unset($__componentOriginal0016fe8f62f0dc60d54a606049e169e1ae7c8127); ?>
<?php endif; ?>
        </div>
    </div>

    <div class="all-modal-here">
        <!-- tambah -->
        <div class="modal fade" id="tambahModalDisposisi" tabindex="-1" aria-labelledby="tambahModalDisposisiLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo e(route('surat-masuk.disposisi.store', $surat->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahModalDisposisiLabel">Tambah Disposisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Penerima</label>
                                    <select name="penerima" id="" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="">Tenggat Waktu</label>
                                    <input type="date" class="form-control shadow-sm mb-3" name="tenggat_waktu">
                                    <label for="">Isi Disposisi</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="isi_disposisi">
                                    <label for="">Sifat Status</label>
                                    <select name="sifat_status" id="" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        <option value="Penting">Penting</option>
                                        <option value="Sangat Penting">Sangat Penting</option>
                                    </select>
                                    <label for="">Catatan</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="catatan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="editModalDisposisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo e(route('surat-masuk.disposisi.update', $surat->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("PUT"); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Disposisi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Penerima</label>
                                    <select name="penerima" id="editPenerima" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->name); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="hidden" name="disposisi_id" id="editDisposisiId">
                                    <label for="">Tenggat Waktu</label>
                                    <input type="date" class="form-control shadow-sm mb-3" name="tenggat_waktu" id="editTenggat">
                                    <label for="">Isi Disposisi</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="isi_disposisi" id="editIsiDispo">
                                    <label for="">Sifat Status</label>
                                    <select name="sifat_status" id="editSifat" class="custom-select shadow-sm mb-3">
                                        <option selected disabled>Pilih Opsi</option>
                                        <option value="Penting">Penting</option>
                                        <option value="Sangat Penting">Sangat Penting</option>
                                    </select>
                                    <label for="">Catatan</label>
                                    <input type="text" class="form-control shadow-sm mb-3" name="catatan" id="editCatatan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="hapusFormModal">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md" id="modalBodyDelete">
                                    <h4>Yakin untuk menghapus?</h4>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function handleEditDisposisi(data, id, nomor) {
            // sumber data
            const disposisiPenerima = document.querySelector(`#disposisiPenerima_${nomor}`)
            const disposisiTenggat = document.querySelector(`#disposisiTenggat_${nomor}`)
            const disposisiIsi = document.querySelector(`#disposisiIsi_${nomor}`)
            const disposisiSifat = document.querySelector(`#disposisiSifat_${nomor}`)
            const disposisiCatatan = document.querySelector(`#disposisiCatatan_${nomor}`)

            // console.log(disposisiPenerima, disposisiTenggat.dataset.asli, disposisiIsi, disposisiSifat, disposisiCatatan)
            
            // inputan data
            const editDisposisiId = document.querySelector("#editDisposisiId")
            const editPenerima = document.querySelector("#editPenerima")
            const editTenggat = document.querySelector("#editTenggat")
            const editIsiDispo = document.querySelector("#editIsiDispo")
            const editSifat = document.querySelector("#editSifat")
            const editCatatan = document.querySelector("#editCatatan")

            editDisposisiId.value = id
            editPenerima.value = disposisiPenerima.textContent
            editTenggat.value = disposisiTenggat.dataset.asli
            editIsiDispo.value = disposisiIsi.textContent
            editSifat.value = disposisiSifat.textContent
            editCatatan.value = disposisiCatatan.textContent

            $("#editModalDisposisi").modal('toggle');
        }

        function handleDelete(data) {
            $("#deleteModal").modal('toggle');

            const hapusFormModal = document.querySelector('#hapusFormModal');

            hapusFormModal.setAttribute('action', data)
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Luthfi\Tugas sekolah\Program\Laravel\laravel 9\surat-in-n-out\resources\views/disposisi/create.blade.php ENDPATH**/ ?>