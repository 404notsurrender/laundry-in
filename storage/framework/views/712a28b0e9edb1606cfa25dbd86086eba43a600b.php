<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 justify-content-center">
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

                        <?php if($status == 'Show'): ?>
                            <?php echo Form::open(['route' => ['rekening.store'], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                            <?php echo csrf_field(); ?>
                            <div class="box-2-text">
                                <div class="row form-group">
                                    <label class="col-md-5 text-left">Name Rekening</label>
                                    <input type="text" name="name_rekening" class="col-md-7 form-control">
                                    <i class="text-danger"><?php echo e($errors->first('name_rekening')); ?></i>
                                </div>
                                <div class="row form-group">
                                    <label class="col-md-5 text-left">No Rekening</label>
                                    <input type="text" name="no_rekening" class="col-md-7 form-control">
                                    <i class="text-danger"><?php echo e($errors->first('no_rekening')); ?></i>
                                </div>
                                <div class="row form-group">
                                    <label class="col-md-5 text-left">Bank</label>
                                    <select name="bank_id" class="col-md-7 form-control">
                                        <option value="0">- Select -</option>
                                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <i class="text-danger"><?php echo e($errors->first('bank_id')); ?></i>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">DONE</button>
                                        <a href="<?php echo e(route('shopprofile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                    </div>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        <?php elseif($status == 'Edit'): ?>
                            <?php echo Form::model($rekening, ['route' => ['rekening.update', $rekening->id], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="box-2-text">
                                <div class="row form-group">
                                    <label class="col-md-5 text-left">Name Rekening</label>
                                    <input type="text" name="name_rekening" class="col-md-7 form-control" value="<?php echo e($rekening->name_rekening); ?>">
                                    <i class="text-danger"><?php echo e($errors->first('name_rekening')); ?></i>
                                </div>
                                <div class="row form-group">
                                    <label class="col-md-5 text-left">No Rekening</label>
                                    <input type="text" name="no_rekening" class="col-md-7 form-control" value="<?php echo e($rekening->no_rekening); ?>">
                                    <i class="text-danger"><?php echo e($errors->first('no_rekening')); ?></i>
                                </div>
                                <div class="row form-group">
                                    <label class="col-md-5 text-left">Bank</label>
                                    <select name="bank_id" class="col-md-7 form-control">
                                        <option value="0">- Select -</option>
                                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->id); ?>" <?php if($rekening->bank_id==$row->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <i class="text-danger"><?php echo e($errors->first('bank_id')); ?></i>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">DONE</button>
                                        <a href="<?php echo e(route('shopprofile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                    </div>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        <?php endif; ?>


                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="box">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Rekening</th>
                                        <th>No Rekening</th>
                                        <th>Bank</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "ordering": 'true',
                ajax: {
                    url: "<?php echo e(route('rekening.list')); ?>",
                    data: function(d) {}
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name_rekening',
                        name: 'name_rekening'
                    },
                    {
                        data: 'no_rekening',
                        name: 'no_rekening'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florentynasenjoyo/Desktop/web-f03146/resources/views/rekening/index.blade.php ENDPATH**/ ?>