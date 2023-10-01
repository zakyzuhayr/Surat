<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md">
            <?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => 'Selamat Datang','text' => 'Di Website Aplikasi Surat Masuk dan Keluar','icon' => 'fas fa-users text-light','theme' => 'dark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => ''.e($suratm).'','text' => 'Surat Masuk','icon' => 'fas fa-envelope text-light','theme' => 'navy','url' => '#','urlText' => 'Lihat Selengkapnya'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?>
        </div>
        <div class="col-md-6">
            <?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => ''.e($suratk).'','text' => 'Surat Keluar','icon' => 'fas fa-envelope text-light','theme' => 'olive','url' => '#','urlText' => 'Lihat Selengkapnya'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Luthfi\Tugas sekolah\Program\Laravel\laravel 9\surat-in-n-out\resources\views/dashboard.blade.php ENDPATH**/ ?>