<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if($shops->count() > 0): ?>
                        <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="box justify-content-between">
                                <div class="d-flex">
                                    <div class="box-image">
                                        <a href="<?php echo e(route('shop.show', $row->slug)); ?>">
                                            <?php if($row->logo == NULL || $row->logo == ''): ?>
                                                <img src="<?php echo e(url('/images/no-image.jpg')); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(url($row->logo)); ?>">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="box-text">
                                        <h2 class="text-left">
                                            <a href="<?php echo e(route('shop.show', $row->slug)); ?>">
                                                <?php echo e($row->name); ?>

                                            </a>
                                        </h2>
                                        
                                        <div>
                                            <?php if($row->status=='1'): ?>
                                                <p class="mb-0"><?php echo e($row->day.' '.$row->open.' - '.$row->close); ?></p>
                                                <?php if(date('H:i') < $row->open): ?>
                                                    <span class="badge badge-danger">CLOSED</span>
                                                <?php elseif(date('H:i') > $row->close): ?>
                                                    <span class="badge badge-danger">CLOSED</span>
                                                <?php else: ?>
                                                    <span class="badge badge-success">OPEN</span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="badge badge-danger">CLOSED</span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(Session::get('users')=='user'): ?>
                                            <div>
                                                <?php
                                                    $lat1 = Auth::user()->latitude;
                                                    $lon1 = Auth::user()->longitude;
                                                    $lat2 = $row->latitude;
                                                    $lon2 = $row->longitude;
                                                    $theta = $lon1 - $lon2;
                                                    $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
                                                    $miles = acos($miles);
                                                    $miles = rad2deg($miles);
                                                    $miles = $miles * 60 * 1.1515;
                                                    $kilometers = $miles * 1.609344;
                                                ?>
                                                <p class="text-primary">
                                                    <strong>
                                                        <?php echo e(round($kilometers,2).' KM'); ?>

                                                    </strong>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="box-flex align-items-center">
                                    <div class="box-text">
                                        <h2 class="text-right">
                                            <a href="#" class="text-right">
                                                <span class="icon icon-phone"></span>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="box">
                            <div class="box-text">
                                <h2>No Shops Open</h2>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florentynasenjoyo/Desktop/web-f03146/resources/views/shop/index.blade.php ENDPATH**/ ?>