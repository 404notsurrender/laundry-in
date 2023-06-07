<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 justify-content-center">
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
                        <?php echo Form::model($profile, ['route' => ['profile.update', $profile->id], 'enctype' => 'multipart/form-data']); ?>

                    <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                        <?php echo Form::model($profile, ['route' => ['shopprofile.update', $profile->id], 'enctype' => 'multipart/form-data']); ?>

                    <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                        <?php echo Form::model($profile, ['route' => ['driverprofile.update', $profile->id], 'enctype' => 'multipart/form-data']); ?>

                    <?php endif; ?>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="box-2-image">
                        <?php if(Str::length(Auth::guard('web')->user()) > 0 || Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                            <?php if($profile->foto == NULL || $profile->foto == ''): ?>
                                <img src="<?php echo e(url('/images/no-image.jpg')); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url($profile->foto)); ?>">
                            <?php endif; ?>
                        <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                            <?php if($profile->logo == NULL || $profile->logo == ''): ?>
                                <img src="<?php echo e(url('/images/no-image.jpg')); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url($profile->logo)); ?>">
                            <?php endif; ?>
                        <?php endif; ?>
                        <input type="file" name="foto" class="form-control mt-3">
                    </div>
                    <div class="box-2-text">
                        <div class="row form-group">
                            <label class="col-md-5 text-left">Name</label>
                            <input type="text" name="name" class="col-md-7 form-control" value="<?php echo e($profile->name); ?>">
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 text-left">No Handphone</label>
                            <input type="text" name="no_hp" class="col-md-7 form-control" value="<?php echo e($profile->no_hp); ?>">
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 text-left">Email</label>
                            <input type="text" name="email" class="col-md-7 form-control" value="<?php echo e($profile->email); ?>">
                        </div>

                        <?php if(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Whatsapp</label>
                                <input type="text" name="whatsapp" class="col-md-7 form-control" value="<?php echo e($profile->whatsapp); ?>">
                            </div>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Name Rekening</label>
                                <input type="text" name="name_rekening" class="col-md-7 form-control" value="<?php echo e($profile->name_rekening); ?>">
                            </div>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">No Rekening</label>
                                <input type="text" name="no_rekening" class="col-md-7 form-control" value="<?php echo e($profile->no_rekening); ?>">
                            </div>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Bank</label>
                                <select name="bank" class="col-md-7 form-control">
                                    <option value="" <?php if($profile->bank_id==NULL): ?> <?php echo e('selected'); ?> <?php endif; ?>>- Pilih -</option>
                                    <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" <?php if($profile->bank_id==$row->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php endif; ?>

                        <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Birthday</label>
                                <input type="date" name="tgl_lahir" class="col-md-7 form-control" value="<?php echo e($profile->tgl_lahir); ?>">
                            </div>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Jenis Kelamin</label>
                                <select name="jns_kelamin" class="col-md-7 form-control">
                                    <option value="" <?php if($profile->jns_kelamin==NULL): ?> <?php echo e('selected'); ?> <?php endif; ?>>- Pilih -</option>
                                    <option value="0" <?php if($profile->jns_kelamin=='0'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Perempuan</option>
                                    <option value="1" <?php if($profile->jns_kelamin=='1'): ?> <?php echo e('selected'); ?> <?php endif; ?>>Pria</option>
                                </select>
                            </div>
                        <?php endif; ?>

                        <?php if($profile->address <> NULL): ?>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Address</label>
                                <input type="text" name="address" class="col-md-7 form-control" value="<?php echo e($profile->address); ?>" readonly>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-5 text-left">Google Map</label>
                                <input type="text" name="google_map" class="col-md-7 form-control" value="<?php echo e($profile->google_map); ?>" readonly>
                            </div>
                        <?php endif; ?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">DONE</button>
                                <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                                    <a href="<?php echo e(route('profile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger btn-block">SIGN OUT</a>
                                <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                                    <a href="<?php echo e(route('shopprofile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                    <a href="<?php echo e(route('shop.logout')); ?>" class="btn btn-danger btn-block">SIGN OUT</a>
                                <?php elseif(Str::length(Auth::guard('webdriver')->user()) > 0): ?>
                                    <a href="<?php echo e(route('driverprofile.index')); ?>" class="btn btn-info btn-block">BACK</a>
                                    <a href="<?php echo e(route('driver.logout')); ?>" class="btn btn-danger btn-block">SIGN OUT</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>

            <?php if(Str::length(Auth::guard('webdriver')->user()) <= 0): ?>

                <div class="col-md-7">
                    <div class="box-2">
                        <div class="box-2-text">
                            <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                                <?php echo Form::open(['route' => ['profile.updateaddress'], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                            <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                                <?php echo Form::open(['route' => ['shopprofile.updateaddress'], 'enctype' => 'multipart/form-data', 'method' => 'post']); ?>

                            <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                                            <textarea name="address" class="form-control" rows="3"><?php echo e(Auth::guard('web')->user()->address); ?></textarea>
                                        <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                                            <textarea name="address" class="form-control" rows="3"><?php echo e(Auth::guard('webshop')->user()->address); ?></textarea>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Google Map</label>
                                        <?php if(Str::length(Auth::guard('web')->user()) > 0): ?>
                                            <input type="text" id="address-input" name="google_map" class="form-control map-input" value="<?php echo e(Auth::guard('web')->user()->google_map); ?>">
                                        <?php elseif(Str::length(Auth::guard('webshop')->user()) > 0): ?>
                                            <input type="text" id="address-input" name="google_map" class="form-control map-input" value="<?php echo e(Auth::guard('webshop')->user()->google_map); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="address-map-container" style="width:100%;height:400px; ">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="address_latitude" id="address-latitude" class="form-control" <?php if(Auth::user()->latitude <> NULL): ?> value="<?php echo e(Auth::user()->latitude); ?>" <?php else: ?> value="0" <?php endif; ?> readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" name="address_longitude" id="address-longitude" class="form-control" <?php if(Auth::user()->longitude <> NULL): ?> value="<?php echo e(Auth::user()->longitude); ?>" <?php else: ?> value="0" <?php endif; ?> readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">DONE</button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAP_KEY')); ?>&libraries=places&callback=initialize" async defer></script>
    <script type="text/javascript">
        function initialize() {

            $('form').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            const locationInputs = document.getElementsByClassName("map-input");

            const autocompletes = [];
            const geocoder = new google.maps.Geocoder;
            for (let i = 0; i < locationInputs.length; i++) {

                const input = locationInputs[i];
                const fieldKey = input.id.replace("-input", "");
                const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

                const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -6.200000;
                const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 106.816666;

                const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 13
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: {lat: latitude, lng: longitude},
                });

                marker.setVisible(isEdit);

                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.key = fieldKey;
                autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
            }

            for (let i = 0; i < autocompletes.length; i++) {
                const input = autocompletes[i].input;
                const autocomplete = autocompletes[i].autocomplete;
                const map = autocompletes[i].map;
                const marker = autocompletes[i].marker;

                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();

                    geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            const lat = results[0].geometry.location.lat();
                            const lng = results[0].geometry.location.lng();
                            setLocationCoordinates(autocomplete.key, lat, lng);
                        }
                    });

                    if (!place.geometry) {
                        window.alert("No details available for input: '" + place.name + "'");
                        input.value = "";
                        return;
                    }

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                });
            }
        }

        function setLocationCoordinates(key, lat, lng) {
            const latitudeField = document.getElementById(key + "-" + "latitude");
            const longitudeField = document.getElementById(key + "-" + "longitude");
            latitudeField.value = lat;
            longitudeField.value = lng;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florentynasenjoyo/Desktop/web-f03146/resources/views/profile/edit.blade.php ENDPATH**/ ?>