<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 justify-content-center">
                <div class="box-2 text-center">
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

                    <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                        <?php echo Form::open(['route' => ['profile.updatepassword'], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                    <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                        <?php echo Form::open(['route' => ['shopprofile.updatepassword'], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                    <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                        <?php echo Form::open(['route' => ['driverprofile.updatepassword'], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                    <?php endif; ?>
                    <?php echo csrf_field(); ?>
                    <div class="box-2-text">
                        <div class="row form-group">
                            <label class="col-md-5 text-left">Current Password</label>
                            <input type="password" name="current_password" class="col-md-7 form-control">
                            <i class="text-danger"><?php echo e($errors->first('current_password')); ?></i>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 text-left">New Password</label>
                            <input type="password" name="new_password" class="col-md-7 form-control">
                            <i class="text-danger"><?php echo e($errors->first('new_password')); ?></i>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 text-left">Confirm Password</label>
                            <input type="password" name="new_password_confirmation" class="col-md-7 form-control">
                            <i class="text-danger"><?php echo e($errors->first('new_password')); ?></i>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">DONE</button>
                                <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                                    <a href="<?php echo e(route('profile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                                    <a href="<?php echo e(route('shopprofile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                                    <a href="<?php echo e(route('driverprofile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mamat/Projects/websites/web-f03146/resources/views/profile/change-password.blade.php ENDPATH**/ ?>