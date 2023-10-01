

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content_header'); ?>
    <h1><?php echo e($title); ?></h1>
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

    <div class="row mb-3">
        <div class="col-md">
            <?php echo $buttons; ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card card-lime card-outline">
                <?php if(str_contains(url()->current(), 'surat-masuk')): ?>

                    <?php
                        $notif = \App\Models\SuratMasuk::all();
                        $wait = count($notif->where('check_status', 'Menunggu Verifikasi'));
                        $korek = count($notif->where('check_status', 'Koreksi'));
                    ?>

                    <div class="card-header p-0">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(route('surat-masuk.index') == url()->current() ? 'active' : ''); ?>" href="<?php echo e(route('surat-masuk.index')); ?>">Disetujui</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(route('surat-masuk.waitVerif') == url()->current() ? 'active' : ''); ?>" href="<?php echo e(route('surat-masuk.waitVerif')); ?>">Menunggu Verifikasi <span class="badge badge-danger"><?php echo e($wait == 0 ? '' : $wait); ?></span></a>
                            </li>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['is_admin', 'is_p3mp', 'is_sekretaris'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(route('surat-masuk.waitCorrection') == url()->current() ? 'active' : ''); ?>" href="<?php echo e(route('surat-masuk.waitCorrection')); ?>">Koreksi <span class="badge badge-danger"><?php echo e($korek == 0 ? '' : $korek); ?></span></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <div class="card-body">
                    <?php echo e($dataTable->table()); ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php echo $__env->make('templates.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <?php echo e($dataTable->scripts()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Luthfi\Tugas sekolah\Program\Laravel\laravel 9\surat-in-n-out\resources\views/templates/datatable.blade.php ENDPATH**/ ?>