<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <?php if($services->count() > 0): ?>
                    <div class="col-md-12">
                        <h2 class="text-primary page-title">Services</h2>
                    </div>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-12 mt-3">
                            <div class="box-3">
                                <div class="box-3-image" style="background-image: url(<?php echo e(url($row->image)); ?>)"></div>
                                <div class="box-3-text text-center">
                                    <a href="<?php echo e(route('services.show', ['slug' => $row->slug_shop, 'id' => $row->slug])); ?>">
                                        <h2>
                                            <span><?php echo e($row->name_shop); ?></span><br>
                                            <?php echo e($row->name); ?>

                                        </h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="box">
                        <div class="box-text">
                            <h2>Service Not Found</h2>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mamat/Projects/websites/web-f03146/resources/views/service/list.blade.php ENDPATH**/ ?>