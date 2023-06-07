<?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="site-section" style="background: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Google Maps</h2>
                </div>
                <div class="col-md-7">
                    <div id="map"></div>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="p-4 border mb-3">
                        <span class="d-block text-primary h6 text-uppercase"><?php echo e($contact->website_name); ?></span>
                        <div class="mb-0 text-black">
                            <?php echo $contact->address; ?>

                        </div>
                        <ul class="text-black">
                            <li>Email : <?php echo e($contact->email); ?></li>
                            <li>Telephone : <?php echo e($contact->no_telp); ?></li>
                            <li>Whatsapp : <?php echo e($contact->whatsapp); ?></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAP_KEY')); ?>&libraries=places&callback=initialize" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        function initialize() {
            var coordinates = {
                lat: 37.77,
                lng: -1.447
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: { lat: <?php echo e($contact->latitude); ?>, lng: <?php echo e($contact->longitude); ?> },
            });

            const tourStops = [
                [
                    {
                        lat: <?php echo e($contact->latitude); ?>,
                        lng: <?php echo e($contact->longitude); ?>,
                    },
                    "<?php echo e($contact->website_name); ?>",
                    '<h2 class="map-title"><?php echo e($contact->website_name); ?></h2>' +
                    '<div class="map-desc"><?php echo $contact->address; ?></div>' +
                    '<ul class="map-desc">' +
                        '<li>Email : <?php echo e($contact->email); ?></li>' +
                        '<li>Whatsapp : <?php echo e($contact->whatsapp); ?></li>' +
                        '<li>Telephone : <?php echo e($contact->no_telp); ?></li>' +
                    '</ul>'
                ],
            ];


            tourStops.forEach(([position, title, desc], i) => {

                var measle = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: {
                        url: "https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle.png",
                        size: new google.maps.Size(7, 7),
                        anchor: new google.maps.Point(4, 4)
                    }
                });
                var marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
                        labelOrigin: new google.maps.Point(75, 32),
                        size: new google.maps.Size(32,32),
                        anchor: new google.maps.Point(16,32)
                    },
                    label: {
                        text: title,
                        color: "#C70E20",
                        fontWeight: "bold",
                    }
                });

                var infowindow = new google.maps.InfoWindow({
                    content: desc,
                });

                marker.addListener("click", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                    });
                });
            });

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mamat/Projects/websites/web-f03146/resources/views/contact/index.blade.php ENDPATH**/ ?>