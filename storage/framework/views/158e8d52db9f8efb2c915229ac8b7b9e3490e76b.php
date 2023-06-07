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
                        <?php echo Form::open(['route' => ['openinghour.store'], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                        <?php echo csrf_field(); ?>
                        <div class="box-2-text">
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Day</label>
                                <select name="day" class="col-md-7 form-control">
                                    <option value="">- Select -</option>
                                    <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($day); ?>"><?php echo e($day); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <i class="text-danger"><?php echo e($errors->first('day')); ?></i>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Open/Close</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onclick="opencloseCheck()" name="status" id="open" value="1" checked>
                                    <label class="form-check-label">
                                        Open
                                    </label>
                                </div>
                                <div class="form-check ml-3">
                                    <input class="form-check-input" type="radio" onclick="opencloseCheck()" name="status" id="close" value="0">
                                    <label class="form-check-label">
                                        Close
                                    </label>
                                </div>
                                <i class="text-danger"><?php echo e($errors->first('status')); ?></i>
                            </div>
                            <div class="row form-group" id="opentime">
                                <label class="col-md-5 text-left">Open Time</label>
                                <input type="time" name="open_time" class="col-md-7 form-control">
                                <i class="text-danger"><?php echo e($errors->first('open_time')); ?></i>
                            </div>
                            <div class="row form-group" id="closetime">
                                <label class="col-md-5 text-left">Close Time</label>
                                <input type="time" name="close_time" class="col-md-7 form-control">
                                <i class="text-danger"><?php echo e($errors->first('close_time')); ?></i>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">DONE</button>
                                    <a href="<?php echo e(route('shopprofile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Day</th>
                                        <th>Open/Close</th>
                                        <th>Open Time</th>
                                        <th>Close Time</th>
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
    <script type="text/javascript">
        function opencloseCheck() {
            if (document.getElementById('open').checked) {
                document.getElementById('opentime').style.display = 'flex';
                document.getElementById('closetime').style.display = 'flex';
            } else if (document.getElementById('close').checked) {
                document.getElementById('opentime').style.display = 'none';
                document.getElementById('closetime').style.display = 'none';
            }
        }
    </script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#example1').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "ordering": 'true',
                ajax: {
                    url: "<?php echo e(route('openinghour.list')); ?>",
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
                        data: 'day',
                        name: 'day'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'open',
                        name: 'open'
                    },
                    {
                        data: 'close',
                        name: 'close'
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florentynasenjoyo/Desktop/web-f03146/resources/views/openinghour/index.blade.php ENDPATH**/ ?>