<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laundry-In</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(url('/images/logo.png')); ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(url('/images/logo.png')); ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('/images/logo.png')); ?>" />

    
    <?php echo $__env->yieldContent('css'); ?>
    

  </head>
  <body>

  <div class="site-wrap">

    
    <?php echo $__env->make('layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    
    <?php echo $__env->yieldContent('content'); ?>
    

    
    <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

  </div>

  
  <?php echo $__env->yieldContent('js'); ?>
  

  
  <?php echo $__env->yieldContent('script'); ?>
  

  </body>
</html>
<?php /**PATH /home/mamat/Projects/websites/web-f03146/resources/views/layouts/app.blade.php ENDPATH**/ ?>