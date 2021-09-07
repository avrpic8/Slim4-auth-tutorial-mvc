<?php $__env->startSection('content'); ?>

    <div class="p-5">
        <p class="text-danger">
            <?php echo e($name); ?> home page, its Working!
        </p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/slim_tutorial/resources/views/auth/index.blade.php ENDPATH**/ ?>