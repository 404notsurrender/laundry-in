<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/aos.js')); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
<script>
    <?php if(Session::has('success')): ?>
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
      
        <?php if(Session::has('errors')): ?>
        toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($errors); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      
        <?php if(Session::has('warning')): ?>
            toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.warning("<?php echo e(session('warning')); ?>");
        <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/mamat/Projects/websites/web-f03146/resources/views/layouts/partials/js.blade.php ENDPATH**/ ?>