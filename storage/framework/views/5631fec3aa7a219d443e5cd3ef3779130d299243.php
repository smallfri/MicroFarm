<script type="application/javascript">
    $(document).ready(function() {
        $('#summary-table').DataTable();
    } );
</script>
<?php $__env->startSection('content'); ?>
    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Seeds
    </h4>

    <hr class="border-light container-m--x mt-0 mb-5">
    <!-- Main content -->
    <?php echo Form::open(['url' => '/seed/create', 'class' => 'form-horizontal','id'=>'formSeed','enctype'=>'multipart/form-data']); ?>


    <?php echo $__env->make('layouts.seed.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>