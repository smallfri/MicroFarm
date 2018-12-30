<?php $__env->startSection('content'); ?>
    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Create Location
    </h4>

    <hr class="border-light container-m--x mt-0 mb-5">
    <!-- Main content -->
    <?php echo Form::open(['url' => '/location/create', 'class' => 'form-horizontal','id'=>'location-create','enctype'=>'multipart/form-data']); ?>


    <?php echo $__env->make('layouts.inventory.locations.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>



    <?php echo $__env->make('layouts.inventory.locations.table', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>