<footer class="footer bg-black">
    <div class="container">
        <div class="row justify-content-between">
            <div class="mb-w100">
                <p class="color-white text-credits text-company">INNOVATIVE FOOD SOLUTIONS</p>
                <p class="color-white text-credits oculMob">TODOS LOS DERECHOS RESERVADOS 2019</p>
            </div>
            <div class="d-flex marB-1">
                <i class="icon-footer icon-ubicacion"></i>
                <div>
                    <p class="text-f font-titles-md"><?= $informacion['ubicacion'] ?></p>
                </div>
            </div>
            <div class="d-flex marB-1">
                <i class="icon-footer icon-phone-f"></i>
                <div class="d-flex flex-column font-titles-md">
                    <a href="tel:<?= $informacion['telefono_2'] ?>" class="text-f mb"><?= $informacion['telefono_2'] ?></a>
                    <a href="tel:<?= $informacion['telefono_3'] ?>" class="text-f mb"><?= $informacion['telefono_3'] ?></a>
                </div>
            </div>
            <div class="d-flex marB-1">
                <i class="icon-footer icon-email"></i>
                <div class="d-flex flex-column font-titles-md">
                    <a href="mailto:exports@innovativefoodsolutions.es" class="text-f mb"><?= $informacion['correo_1'] ?></a>
                    <a href="mailto:logistics@innovativefoodsolutions.es" class="text-f mb"><?= $informacion['correo_2'] ?></a>
                </div>
            </div>
            <div class="crd">
                <p class="color-white text-credits dres-mob">TODOS LOS DERECHOS RESERVADOS 2019</p>
                <p><span class="color-white text-credits">POWERED BY </span><a href="http://exe.pe/" class="color-white text-credits">EXE.DIGITAL</a></p>
                <p class="oculMob"><a href="https://validator.w3.org/check?uri=referer" class="text-f text-credits">HTML </a><a href="https://jigsaw.w3.org/css-validator/check/referer" class="text-f text-credits">CSS</a></p>

            </div>
        </div>
    </div>
</footer>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/js/libraries/wow.min.js"></script>
<script>
    var wow = new WOW({
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       false,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
        // the callback is fired every time an animation is started
        // the argument that is passed in is the DOM node being animated
        },
            scrollContainer: null,    // optional scroll container selector, otherwise use window,
            resetAnimation: true,     // reset animation on end (default is true)
        }
    );
    wow.init();


    // Initialize and add the map
    function initMap() {
      // The location of Uluru
      var uluru = {lat: <?= $informacion['lat'] ?>, lng: <?= $informacion['long'] ?>};
      //-12.190500, -76.948556
      // The map, centered at Uluru
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 16, center: uluru});
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: uluru, map: map});
    }

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl6gtuWDq6aGaspb6MoPTfuUExHCB1vdg&callback=initMap">
    </script>

