<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

<div class="site-section site-blocks-2" style="background-image: url(<?php echo e(url('/images/background-image.png')); ?>); background-size:cover; background-repeat:no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <div class="login-box">
                        <div class="login-title">
                            <h2 class="text-center">Login Driver</h2>
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
                        </div>
                    <?php echo Form::open(['method' => 'post', 'route' => ['driver.postlogin']]); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                    <i class="text-danger"><?php echo e($errors->first('email')); ?></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="********">
                                    <i class="text-danger"><?php echo e($errors->first('password')); ?></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block btn-lg">Sign In</button>
                                <a href="<?php echo e(route('driver.register')); ?>" class="btn btn-outline-primary btn-block btn-lg">Register</a>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florentynasenjoyo/Desktop/web-f03146/resources/views/driver/auth/login.blade.php ENDPATH**/ ?>