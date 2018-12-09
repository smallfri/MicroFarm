<?php $__env->startSection('content'); ?>
    <h4 class="font-weight-bold py-3 mb-4">Home</h4>
    <p>This page is an example of basic layout. For more options use <strong>Laravel starter template generator</strong> in the docs.</p>
    <p><button class="btn btn-primary btn-lg">Button</button></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>