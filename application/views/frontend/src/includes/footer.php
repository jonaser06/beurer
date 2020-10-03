<div class="wrapper-footer">
    <footer class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-1-5 visible-lg">
                    <h2 class="titles-footer">Productos</h2>
                    <ul>
                        <li><a href="<?= base_url('salud'); ?>" class="link-footer">Salud</a></li>
                        <li><a href="<?= base_url('bienestar'); ?>" class="link-footer">Bienestar</a></li>
                        <li><a href="<?= base_url('belleza'); ?>" class="link-footer">Belleza</a></li>
                        <li><a href="<?= base_url('actividad'); ?>" class="link-footer">Actividad</a></li>
                        <li><a href="<?= base_url('linea-bebe'); ?>" class="link-footer">Línea de bebé</a></li>
                    </ul>
                </div>
                <div class="col-xs-4 col-1-5 visible-lg">
                    <h2 class="titles-footer">ayuda al cliente</h2>
                    <ul>
                        <li><a href="<?= base_url('preguntas-frecuentes'); ?>" class="link-footer">FAQ</a></li>
                        <!-- <li><a href="<?= base_url('instrucciones-de-uso'); ?>" class="link-footer">Instrucciones de uso</a></li> -->
                        <li><a href="<?= base_url('centro-de-descargas'); ?>" class="link-footer">Centro de descargas</a></li>
                        <li><a href="<?= base_url('terminos-y-condiciones'); ?>" class="link-footer">Términos y condiciones</a></li>
                        <li><a href="<?= base_url('politicas-de-privacidad'); ?>" class="link-footer">Políticas y privacidad</a></li>
                    </ul>
                </div>
                <div class="col-xs-4 col-1-5 visible-lg">
                    <h2 class="titles-footer"><a href="<?= base_url('nosotros'); ?>">quiénes somos</a></h2>
                    <h2 class="titles-footer"><a href="<?= base_url('contactanos'); ?>">contacto</a></h2>
                    
                </div>
                <div class="col-sm-5 col-md-6 col-1-5 phons-f">
                    <!-- <h2 class="phones-footer"><a href="#"><i class="icon-f icon-phone"></i> <?php echo $confif['numero_t']; ?></a></h2 class="phones-footer"> -->

                    <?php if (!empty($confif['numero_t2'])): ?>
                        <?php foreach ($confif['numero_t2'] as  $row): ?>
                            <h2 class="phones-footer"><a href="tel:<?= $row['telefono'];  ?>"><i class="icon-f icon-phone"></i>  <?= $row['telefono'];  ?></a></h2>
                        <?php endforeach ?>    
                    <?php endif ?>

                    <!-- EMAIL -->
                    <?php if (!empty($confif['email'])): ?>
                        <?php foreach ($confif['email'] as $row): ?>
                            <a href="mailto:<?= $row['email']; ?>" class="link-footer d-block"><i class="icon-f icon-sobre"></i>  <?= $row['email']; ?></a>
                        <?php endforeach ?>
                    <?php endif ?>

                    <!-- DIRECCIÓN -->
                    <?php if (!empty($confif['direccion'])): ?>
                        <?php foreach ($confif['direccion'] as $row): ?>
                            <a href="#" class="link-footer d-block"><i class="icon-f icon-ubc"></i>  <?= $row['ubicacion']; ?></a>
                        <?php endforeach ?>
                    <?php endif ?>

                    <div class="rs-f hidden-md hidden-lg">
                        <a href="<?php echo $confif['facebook']; ?>" target="_blank" class="icon-rs-f icon-facebook"></a>
                        <a href="<?php echo $confif['instagram'] ?>" target="_blank" class="icon-rs-f icon-instagram"></a>
                        <a href="<?php echo $confif['youtube'] ?>" target="_blank" class="icon-rs-f icon-youtube"></a>
                    </div>
                </div>
                <div class="col-sm-7 col-md-6 col-1-6 wrapper-susc">
                    <h2 class="titles-footer hidden-xs hidden-sm">suscríbete</h2>
                    <p class="link-footer hidden-xs">Recibe actualizaciones por correo eléctronico sobre nuestra tienda y ofertas especiales.</p>
                    <p class="link-footer link-f-mob visible-xs">Recibe nuestras ofertas especiales.</p>
                    <form id="subscribe" method="POST" action="<?php echo base_url('subscribe/send') ?>" title="Suscrito con exito" data-placement="top">
                        <div class="content-btn-susc">
                            <input type="email" name="subscribe" class="input-susc">
                            <button type="submit" class="btn-susc">SUSCRÍBETE</button>
                        </div>
                        <div class="col-xs-12 px-0">
                            <div class="checkbox">
                                <label class="font-light label-pol">
                                    <input type="checkbox"  required /><i class="helper"></i><span>He leído y acepto
                                        las <a href="<?= base_url('politicas-de-privacidad'); ?>" class="span-pol color-primary btn-modals">Políticas de Privacidad</a></span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--CREDITOS -->
        <div class="crd">
            <div class="container">
                <div class="crd1">
                    <p class="text-credits"><a href="index.php" target="_blank">BEURER</a></p>
                    <p class="text-credits">TODOS LOS DERECHOS RESERVADOS 2020</p>
                </div>
                <div class="crd2">
                    <p class="text-credits">POWERED BY 
                        <a href="http://exe.digital/" target="_blank">EXE</a>
                    </p>
                    <p class="oculMob hidden-xs">
                        <a href="https://validator.w3.org/check?uri=referer"
                            class="text-f text-credits" target="_blank">HTML </a> • 
                        <a href="https://jigsaw.w3.org/css-validator/check/referer"
                            class="text-f text-credits" target="_blank">CSS</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="<?= base_url(); ?>assets/js/app.js"></script>
<script src="<?= base_url(); ?>assets/js/app2.js"></script>
<script src="<?= base_url(); ?>assets/js/libraries/animate-it.js"></script>
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script-->
<script src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script>
    $('.search_get').keyup(function(event) {
        $('show_result').html('<img src="https://media2.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" width="30">')
        $.ajax({
            url: '<?php echo base_url('productos/search/') ?>'+$(this).val(),
        })
        .done(function(data) {
            $('#show_result').html(data)
        })
            .always(function() {
            console.log("complete");
        });
        
        
    });
 
    
    $('.box-search').hover(function(event) {
        $('#show_result').html('')
    });
    
    if (screen && screen.width > 992) {
        $(".div-search").mouseover(function(event){
            $(".input-search").css({
                'width':'18em',
                'border-color': '#c51152',
                'border-radius': '15px',

            })
        });
        $(".div-search").mouseout(function(event){
            $(".input-search").css({
                'width':'0',
                'border-color': 'transparent',
                'border-radius': '0',
                //'padding': '0'
            })
        });
    }else{
        $(".div-search").click(function(){
            $(".input-search").css({
                "top" : "0" //modificamos el bottom a 0
            });
            $(".bsc-btn").css({
                "opacity": "1",
                "z-index": "10000"
            })
        });
        $(".div-search").mouseout(function(){
            $(".input-search").css({
                "top" : "-100%" //modificamos el bottom a 0
            });
            $(".bsc-btn").css({
                "opacity": "0",
                "z-index": "-2"
            })
        });
    }

    $(document).ready(function(){
        if (screen && screen.width > 992) {
            console.log('hola');
            $(".d-menu").hover(function(event){
                
                $(".content-nav").toggleClass("caida");
                
            });
            $('.link-nav').click(function(e){
                e.preventDefault();
            })

            var menuClasess = [1, 2, 3, 4, 5]

            menuClasess.forEach(item => {
                $('.d-menu' + item).mouseover(function(event){
                    menuClasess.forEach(el => {
                        $(".content-nav").removeClass("caida" + el);
                    })
                    $(".content-nav").addClass("caida" + item);
                });
            });

            console.log($('.menu-one'));
            $('.menu-one').on('mouseover', function() {
                $(".content-nav").removeClass("caida");
            });  
        }
    });

    $('#subscribe').submit(function(event){
        event.preventDefault();

        $.ajax({
            url: ''+ $(this).attr('action') +'',
            type: 'POST',
            data: $(this).serialize(),
        })
        .done(function(data) {
            if(data.resp == true){
                $('#subscribe').attr('title', ''+data.msj+'');
                $('#subscribe').attr('data-original-title', ''+data.msj+'');

                $('#subscribe').tooltip('show');
                $('#subscribe')[0].reset();
            }else{
                $('#subscribe').attr('title', ''+data.msj+'');
                $('#subscribe').attr('data-original-title', ''+data.msj+'');
                $('#subscribe').tooltip('show');
            }
        });
        
    });

</script>
