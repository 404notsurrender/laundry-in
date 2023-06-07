<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="box">
                    <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><?php echo e($message); ?></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php elseif($message = Session::get('danger')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p><?php echo e($message); ?></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>
                    <div class="box-image">
                        <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                            <?php if(Auth::guard('web')->user()->foto == NULL || Auth::guard('web')->user()->foto == ''): ?>
                                <img src="<?php echo e(url('/images/no-image.jpg')); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url(Auth::guard('web')->user()->foto)); ?>">
                            <?php endif; ?>
                        <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                            <?php if(Auth::guard('webdriver')->user()->foto == NULL || Auth::guard('webdriver')->user()->foto == ''): ?>
                                <img src="<?php echo e(url('/images/no-image.jpg')); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url(Auth::guard('webdriver')->user()->foto)); ?>">
                            <?php endif; ?>
                        <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                            <?php if(Auth::guard('webshop')->user()->logo == NULL || Auth::guard('webshop')->user()->logo == ''): ?>
                                <img src="<?php echo e(url('/images/no-image.jpg')); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url(Auth::guard('webshop')->user()->logo)); ?>">
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="box-text">
                        <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                        <h2 class="text-left"><?php echo e(Auth::guard('web')->user()->name); ?></h2>
                        <span class="btn btn-gradient"><?php echo e(strtoupper(Auth::guard('web')->user()->level_member)); ?></span>
                        <a href="<?php echo e(route('profile.edit', Auth::guard('web')->user()->id)); ?>" class="btn btn-gradient">Edit Profile</a>
                        <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                        <h2 class="text-left"><?php echo e(Auth::guard('webshop')->user()->name); ?></h2>
                        <a href="<?php echo e(route('shopprofile.edit', Auth::guard('webshop')->user()->id)); ?>" class="btn btn-gradient">Edit Profile</a>
                        <a href="<?php echo e(route('rekening.show', Auth::guard('webshop')->user()->id)); ?>" class="btn btn-gradient">Rekening</a>
                        <a href="<?php echo e(route('openinghour.show', Auth::guard('webshop')->user()->id)); ?>" class="btn btn-gradient">Opening Hours</a>
                        <a href="<?php echo e(route('shopservice.show', Auth::guard('webshop')->user()->id)); ?>" class="btn btn-gradient">Services</a>
                        <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                        <h2 class="text-left"><?php echo e(Auth::guard('webdriver')->user()->name); ?></h2>
                            <a href="<?php echo e(route('driverprofile.edit', Auth::guard('webdriver')->user()->id)); ?>" class="btn btn-gradient">Edit Profile</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                    <div class="box justify-content-between">
                        <div class="box-text">
                            <h2 class="text-left">
                                <a href="<?php echo e(route('profile.membercard', Auth::guard('web')->user()->id)); ?>">
                                    Member
                                </a>
                            </h2>
                        </div>
                        <div class="box-text">
                            <h2 class="text-right">
                                <a href="<?php echo e(route('profile.membercard', Auth::guard('web')->user()->id)); ?>" class="text-right">-></a>
                            </h2>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="box justify-content-between">
                    <div class="box-text">
                        <h2 class="text-left">
                            <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                                <a href="<?php echo e(route('profile.editpassword')); ?>">
                            <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                                <a href="<?php echo e(route('shopprofile.editpassword')); ?>">
                            <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                                <a href="<?php echo e(route('driverprofile.editpassword')); ?>">
                            <?php endif; ?>
                                Change Password
                            </a>
                        </h2>
                    </div>
                    <div class="box-text">
                        <h2 class="text-right">
                            <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                                <a href="<?php echo e(route('profile.editpassword')); ?>" class="text-right">-></a>
                            <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                                <a href="<?php echo e(route('shopprofile.editpassword')); ?>" class="text-right">-></a>
                            <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                                <a href="<?php echo e(route('driverprofile.editpassword')); ?>" class="text-right">-></a>
                            <?php endif; ?>
                        </h2>
                    </div>
                </div>

                <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                    <?php echo Form::open(['method' => 'post', 'route' => ['profile.destroy', Auth::guard('web')->user()->id]]); ?>

                <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                    <?php echo Form::open(['method' => 'post', 'route' => ['shopprofile.destroy', Auth::guard('webshop')->user()->id]]); ?>

                <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                    <?php echo Form::open(['method' => 'post', 'route' => ['driverprofile.destroy', Auth::guard('webdriver')->user()->id]]); ?>

                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Delete Account</button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mamat/Projects/websites/web-f03146/resources/views/profile/index.blade.php ENDPATH**/ ?>