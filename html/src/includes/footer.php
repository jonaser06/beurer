<div class="wrapper-footer">
    <footer class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-1-5 visible-lg">
                    <h2 class="titles-footer">Productos</h2>
                    <ul>
                        <li><a href="salud.php" class="link-footer">Salud</a></li>
                        <li><a href="bienestar.php" class="link-footer">Bienestar</a></li>
                        <li><a href="belleza.php" class="link-footer">Belleza</a></li>
                        <li><a href="actividad.php" class="link-footer">Actividad</a></li>
                        <li><a href="linea-bb.php" class="link-footer">Línea de bebé</a></li>
                    </ul>
                </div>
                <div class="col-xs-4 col-1-5 visible-lg">
                    <h2 class="titles-footer">ayuda al cliente</h2>
                    <ul>
                        <li><a href="preguntas-frecuentes.php" class="link-footer">FAQ</a></li>
                        <li><a href="instrucciones-de-uso.php" class="link-footer">Instrucciones de uso</a></li>
                        <li><a href="centro-de-descargas.php" class="link-footer">Centro de descargas</a></li>
                        <li><a href="terminos-y-condiciones.php" class="link-footer">Términos y condiciones</a></li>
                        <li><a href="politicas-de-privacidad.php" class="link-footer">Políticas y privacidad</a></li>
                    </ul>
                </div>
                <div class="col-xs-4 col-1-5 visible-lg">
                    <h2 class="titles-footer"><a href="nosotros.php">quiénes somos</a></h2>
                    <h2 class="titles-footer"><a href="contactanos.php">contacto</a></h2>
                    
                </div>
                <div class="col-sm-5 col-md-6 col-1-5 phons-f">
                    <h2 class="phones-footer"><a href="#"><i class="icon-f icon-phone"></i> +49(731) 3989-0</a></h2 class="phones-footer">
                    <h2 class="phones-footer"><a href="#"><i class="icon-f icon-phone"></i> +49(731) 3989-139</a></h2>
                    <a href="términos-y-condiciones.php" class="link-footer d-block"><i class="icon-f icon-sobre"></i> vertrieb@beurer.de</a>
                    <a href="#" class="link-footer d-block"><i class="icon-f icon-ubc"></i> Av.Caminos del Inca N.257 TiendaN.149 Santiago de Surco - Lima</a>
                    <div class="rs-f hidden-md hidden-lg">
                        <a href="#" class="icon-rs-f icon-facebook"></a>
                        <a href="#" class="icon-rs-f icon-instagram"></a>
                        <a href="#" class="icon-rs-f icon-youtube"></a>
                    </div>
                </div>
                <div class="col-sm-7 col-md-6 col-1-6 wrapper-susc">
                    <h2 class="titles-footer hidden-xs hidden-sm">suscríbete</h2>
                    <p class="link-footer hidden-xs">Recibe actualizaciones por correo eléctronico sobre nuestra tienda y ofertas especiales.</p>
                    <p class="link-footer link-f-mob visible-xs">Recibe nuestras ofertas especiales.</p>
                    <form action="#">
                        <div class="content-btn-susc">
                            <input type="text" class="input-susc">
                            <button class="btn-susc">SUSCRÍBETE</button>
                        </div>
                        <div class="col-xs-12 px-0">
                            <div class="checkbox">
                                <label class="font-light label-pol">
                                    <input type="checkbox" /><i class="helper"></i><span>He leído y acepto
                                        las <a href="politicas-de-privacidad.php" class="span-pol color-primary btn-modals">Políticas de Privacidad</a></span>
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
                    <p class="text-credits"><a href="index.php">BEURER</a></p>
                    <p class="text-credits">TODOS LOS DERECHOS RESERVADOS 2020</p>
                </div>
                <div class="crd2">
                    <p class="text-credits">POWERED BY 
                        <a href="http://exe.pe/">EXE.DIGITAL</a>
                    </p>
                    <p class="oculMob hidden-xs">
                        <a href="https://validator.w3.org/check?uri=referer"
                            class="text-f text-credits">HTML </a>
                        <a href="https://jigsaw.w3.org/css-validator/check/referer"
                            class="text-f text-credits">CSS</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="assets/js/app.js"></script>
<script src="assets/js/libraries/animate-it.js"></script>
<script>
    if (screen && screen.width > 992) {
        $(".div-search").mouseover(function(event){
            $(".input-search").css({
                'width':'15em',
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
            $(".d-menu").click(function(event){
                
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

</script>