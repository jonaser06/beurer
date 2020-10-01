<?php
    $pagetitle = $pagina['pagetitle'];
    $pagetitle_en = $pagina['pagetitle_en'];
    $meta_description = $pagina['meta_description'];
    $meta_description_en = $pagina['meta_description_en'];
    $meta_keyword = $pagina['meta_keyword'];
    $meta_keyword_en = $pagina['meta_keyword_en'];
    $og_title = $pagina['og_title'];
    $og_title_en = $pagina['og_title'];
    $og_description = $pagina['og_description'];
    $og_description_en = $pagina['og_description'];
    $og_imagen = $pagina['og_imagen']; 

    include 'src/includes/header.php'
?>
    <main class="main-home" id="fullpage">
        <section class="section sct-carousel-home">
            <img class="bg-shadow" src="<?php echo base_url(); ?>assets/images/sombra.png" alt="">
            <div class="slideshow wrapper-ancla">
                <div class="slider">

                    <?php 
                    $num = count($contenido['data_banner']);
                        for ($i=0; $i < $num; $i++) { 
                    ?>
                        <div class="item">
                            <img src="<?php echo base_url().$contenido['data_banner'][$i]['imagen_banner'] ?>" alt="" />
                            <?php if($lang == 'es/'){ ?>
                                <div class="text-slider-home container">
                                <h1 class="textUppercase color-white titles-big"><?php echo $contenido['data_banner'][$i]['titulo_banner'] ?></h1>
                                <span class="title-sec-hm textUppercase color-white font-titles-md"><?php echo $contenido['data_banner'][$i]['subtitulo'] ?></span>
                            </div>
                            <?php }else{ ?>
                            <div class="text-slider-home container">
                                <h1 class="textUppercase color-white titles-big"><?php echo $contenido['data_banner'][$i]['titulo_banner_en'] ?></h1>
                                <span class="title-sec-hm textUppercase color-white font-titles-md"><?php echo $contenido['data_banner'][$i]['subtitulo_en'] ?></span>
                            </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    
      
                </div>
                <a href="#sct-category-products" data-ancla="sct-category-products" class="content-ancla d-none d-lg-block">
                    <h1 class="h1-text-Rotate font-internas color-white"><?= ($lang == 'es/')? 'Nuestros servicios':'Our services'; ?></h1>
                    <i class="color-white icon-flecha"></i>
                </a>
            </div>
            
        </section>
        <!--BG-HOME-->
        <section class="section sct-category-products sct-arrow section" id="sct-category-products">
            <div id="inicio_servicios" class="wrapper-ancla contenedor total10 d-flex justify-content-center align-items-center">
                <div class="fondo perspectiva10 vista00001 anim presto opacidad matriz escala12 demora5">
                    <!--Backgrounds-->
                    <div class="fondo ancla_contenedor grupo0 indice0 pata_activo">
                        <div class="fondo_imagen blur-bg" style="background-image:url(<?= base_url().$contenido['despacho_bg']; ?>)"></div>
                    </div>
                    <div class="fondo ancla_contenedor grupo0 indice1">
                        <div class="fondo_imagen blur-bg" style="background-image:url(<?= base_url().$contenido['asesoria_bg']; ?>)">
                        </div>
                    </div>
                    <div class="fondo ancla_contenedor grupo0 indice2">
                        <div class="fondo_imagen blur-bg"
                            style="background-image:url(<?= base_url().$contenido['producto_bg']; ?>)">
                        </div>
                    </div>
                    <div class="fondo ancla_contenedor grupo0 indice3">
                        <div class="fondo_imagen blur-bg"
                            style="background-image:url(<?= base_url().$contenido['pago_bg'];; ?>)">
                        </div>
                    </div>
                    <div class="fondo ancla_contenedor grupo0 indice4">
                        <div class="fondo_imagen blur-bg"
                            style="background-image:url(<?= base_url().$contenido['mercado_bg'];; ?>)">
                        </div>
                    </div>
                    <div class="fondo ancla_contenedor grupo0 indice5">
                        <div class="fondo_imagen blur-bg" style="background-image:url(<?= base_url().$contenido['tendencia_bg'];; ?>)">
                        </div>
                    </div>
                </div>
                <div class="bg-white"></div>
                <div class="container z-ind anim presto matriz escala20 demora5 margin0 ">
                    <div class="row curva anim presto" data-pausa="200">
                        <div class="col-12 title-sct-prd">
                            <h1 class="titles-big"><?php echo ($lang == 'es/')? $contenido['titulo_servicio'] : $contenido['titulo_servicio_en']; ?></h1>
                        </div>

                        <div class="col-12 col-xl-9 m0Auto cntent-scale">
                            <div class="bg-circle ">
                                <div class="wow zoomIn d-flex justify-content-center wrapper-services anim serie "
                                    id="wrapper-product-one">
                                    <a href="<?= ($lang == 'es/')? base_url('es/') : base_url() ;  ?>garantizamos-el-despacho" class="circles-content bloque alinea izquierda_centro ancla_pata pata_activo"
                                        data-grupo="0" data-indice="0" data-flota>
                                        <div
                                            class="circle-info d-flex justify-content-center flex-column align-items-center">
                                            <div class="content-svg wow zoomIn">
                                                <svg class="" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="-803.7 494.6 62.9 67.2" enable-background="new 0 0 800 800" xml:space="preserve">   

                                                <path class="path" style="stroke-miterlimit:5" d="M-772.1,561.2l-31.1-15v-36.3l31.3-14.8l30.7,14.9v36.2L-772.1,561.2z M-791.4,504.3l31,15c0,0,0,10.1,0,11.1
                                                            s0.7,1.4,1.7,0.9c1-0.4,3.8-1.9,5.1-2.5c1.3-0.6,1.1-1.1,1.1-1.8s0-11.5,0-11.5l-30.8-15 M-741.3,510l-30.8,14.9v36.3 M-803.2,509.9
                                                            l31.1,15"/>
                                                </svg>
                                            </div>
                                            <div class="title-products d-flex flex-column align-items-center">
                                                <h4 class="title-circle font-titles-md"><?php echo ($lang == 'es/')? $contenido['despacho']: $contenido['despacho_en']; ?></h4>
                                            </div>
                                            <div class="btn-vrCircle font-titles-md textUppercase"><?php echo ($lang == 'es/')? 'ver más':'see more' ?></div>
                                        </div>
                                        <img class="img-spinner" src="<?php echo base_url(); ?>assets/images/spiner.png" alt="">
                                    </a>
                                </div>
                                <div class="wow zoomIn d-flex justify-content-center wrapper-services anim serie "
                                    id="wrapper-product-two">
                                    <a href="<?= ($lang == 'es/')? base_url('es/') : base_url() ;  ?>asesoria-tecnica" class="circles-content bloque alinea izquierda_centro ancla_pata pata_activo"
                                        data-grupo="0" data-indice="1" data-flota>
                                        <div
                                            class="circle-info d-flex justify-content-center flex-column align-items-center">
                                            <div class="content-svg wow zoomIn">
                                                <svg class="" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 68.924 61.74" style="enable-background:new 0 0 68.924 61.74;" xml:space="preserve">
                                                <path class="path" style="stroke-linecap:round;stroke-miterlimit:10;" d="M37.896,42.439v6.475
                                                    c0,1.381-1.119,2.5-2.5,2.5h-1.868c-1.381,0-2.5-1.119-2.5-2.5v-6.475c0-1.381,1.119-2.5,2.5-2.5h1.868
                                                    C36.777,39.939,37.896,41.059,37.896,42.439z M49.654,11.233V4.4c0-1.933-1.567-3.5-3.5-3.5H22.77c-1.933,0-3.5,1.567-3.5,3.5v6.833
                                                    M44.764,11.233V6.546c0-0.552-0.448-1-1-1H25.159c-0.552,0-1,0.448-1,1v4.687 M31.028,45.192L3.196,41.417
                                                    c-1.371-0.489-2.289-1.785-2.296-3.241V13.233c0-1.105,0.895-2,2-2h16.37h30.384h16.37c1.105,0,2,0.895,2,2v24.942
                                                    c-0.007,1.456-0.925,2.753-2.296,3.243l-27.831,3.774 M3.196,41.417V59.34c0,0.828,0.672,1.5,1.5,1.5h59.531
                                                    c0.828,0,1.5-0.672,1.5-1.5V41.418"/>
                                                </svg>
                                            </div>
                                            <div class="title-products d-flex flex-column align-items-center">
                                                <h4 class="title-circle font-titles-md"><?php echo ($lang == 'es/')? $contenido['asesoria']: $contenido['asesoria_en']; ?></h4>
                                            </div>
                                            <div class="btn-vrCircle font-titles-md textUppercase"><?php echo ($lang == 'es/')? 'ver más':'see more' ?></div>
                                        </div>
                                        <img class="img-spinner" src="<?php echo base_url(); ?>assets/images/spiner.png" alt="">
                                    </a>
                                </div>
                                <div class="wow zoomIn d-flex justify-content-center wrapper-services anim serie "
                                    id="wrapper-product-three">
                                    <a href="<?= ($lang == 'es/')? base_url('es/') : base_url() ;  ?>calidad-de-productos" class="circles-content bloque alinea izquierda_centro ancla_pata pata_activo"
                                        data-grupo="0" data-indice="2" data-flota>
                                        <div
                                            class="circle-info d-flex justify-content-center flex-column align-items-center">
                                            <div class="content-svg wow zoomIn">
                                                <svg class="" version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 63.613 67.576" style="enable-background:new 0 0 63.613 67.576;" xml:space="preserve">
                                                <path class="path" style="stroke-linecap:round;stroke-miterlimit:10;" d="M38.554,52.766
                                                    l8.203,13.668c0.204,0.34,0.704,0.318,0.878-0.038l4.44-9.102l10.12,0.365c0.397,0.014,0.651-0.417,0.447-0.757l-8.958-14.906
                                                    M58.175,27.268c0,14.563-11.806,26.368-26.368,26.368S5.438,41.831,5.438,27.268S17.243,0.9,31.806,0.9
                                                    S58.175,12.706,58.175,27.268z M9.931,41.996L0.972,56.902c-0.204,0.34,0.05,0.772,0.447,0.757l10.12-0.365l4.44,9.102
                                                    c0.174,0.357,0.674,0.378,0.878,0.038l8.203-13.668 M50.974,27.268c0,10.586-8.582,19.168-19.168,19.168
                                                    s-19.168-8.582-19.168-19.168S21.22,8.101,31.806,8.101S50.974,16.683,50.974,27.268z M32.255,19.498l2.432,4.927l5.438,0.79
                                                    c0.41,0.06,0.574,0.564,0.277,0.853l-3.935,3.835l0.929,5.416c0.07,0.408-0.359,0.72-0.725,0.527l-4.864-2.557l-4.864,2.557
                                                    c-0.367,0.193-0.796-0.119-0.725-0.527l0.929-5.416l-3.935-3.835c-0.297-0.289-0.133-0.793,0.277-0.853l5.438-0.79l2.432-4.927
                                                    C31.541,19.126,32.071,19.126,32.255,19.498z"/>
                                                </svg>
                                            </div>
                                            <div class="title-products d-flex flex-column align-items-center" style="width: 130px;">
                                                <h4 class="title-circle font-titles-md"><?php echo ($lang == 'es/')? $contenido['producto']: $contenido['producto_en']; ?></h4>
                                            </div>
                                            <div class="btn-vrCircle font-titles-md textUppercase"><?php echo ($lang == 'es/')? 'ver más':'see more' ?></div>
                                        </div>
                                        <img class="img-spinner" src="<?= base_url(); ?>assets/images/spiner.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="bg-circle">
                                <div class="wow zoomIn d-flex justify-content-center wrapper-services anim serie "
                                    id="wrapper-product-four">
                                    <a href="<?= ($lang == 'es/')? base_url('es/') : base_url() ;  ?>condiciones-de-pago" class="circles-content bloque alinea izquierda_centro ancla_pata pata_activo"
                                        data-grupo="0" data-indice="3" data-flota>
                                        <div class="circle-info d-flex justify-content-center flex-column align-items-center">
                                            <div class="content-svg wow zoomIn">
                                                <svg class="" version="1.1" id="Capa_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 56.969 68.69" style="enable-background:new 0 0 56.969 68.69;" xml:space="preserve">
                                                <path class="path" style="stroke-linecap:round;stroke-miterlimit:10;" d="M22.457,16.027
                                                    c-3.545-2.086-6.274-6.504-7.573-11.101c-0.689-2.438,1.911-4.528,4.164-3.367c0.743,0.383,1.493,0.732,2.248,1.043
                                                    c2.765,1.139,5.833,1.378,8.751,0.724c2.256-0.506,4.162-1.214,6.784-2.28c1.564-0.636,3.127,0.921,2.486,2.483
                                                    c-1.795,4.377-3.767,9.014-7.437,12.183c5.657,2.816,12.837,8.263,17.174,15.51c5.335,8.915,7.968,15.811,6.699,22.435
                                                    c-1.276,6.667-6.152,13.475-25.173,14.12c-1.994,0.068-5.489-0.136-7.776-0.303C6.015,66.247,2.417,58.67,1.215,52.482
                                                    c-1.238-6.372,1.248-13.585,6.248-21.655C11.494,24.32,17.404,18.996,22.457,16.027 M29.844,29.353c0-0.903-0.732-1.636-1.636-1.636
                                                    h0c-0.903,0-1.636,0.732-1.636,1.636v1.834c-3.611,0.619-6.309,3.072-6.309,6.004c0,2.931,2.695,5.383,6.304,6.003l0,6.501
                                                    c-2.373-0.701-2.484-2.308-3.733-3.739c-0.268-0.281-0.647-0.455-1.066-0.455c-0.814,0-1.505,0.618-1.505,1.432
                                                    c0,3.044,2.69,5.597,6.309,6.275l0,1.722c0,0.903,0.732,1.636,1.636,1.636h0c0.903,0,1.636-0.732,1.636-1.636V53.3
                                                    c3.905-0.504,6.884-3.163,6.884-6.366c0-4.16-3.887-5.534-7-6.381l0-6.31c1.441,0.102,2.705,1.111,3.544,2.954
                                                    c0.234,0.627,0.838,1.073,1.547,1.073c0.912,0,1.65-0.739,1.65-1.65c-0.167-2.932-2.895-5.051-6.626-5.496V29.353z M32.868,45.37
                                                    c-0.19-0.236-0.428-0.434-0.749-0.624c-0.541-0.32-1.129-0.508-1.637-0.66l-0.667-0.199v6.032l0.591-0.076
                                                    c1.306-0.167,2.196-0.709,2.64-1.604l0.026-0.051c0.261-0.525,0.343-1.198,0.225-1.845C33.228,45.965,33.084,45.638,32.868,45.37z
                                                    M23.958,35.896c-0.192,0.31-0.31,0.666-0.343,1.03c-0.026,0.289-0.026,0.716,0.119,1.113c0.152,0.416,0.451,0.677,0.664,0.837
                                                    c0.226,0.17,0.489,0.32,0.804,0.46c0.21,0.094,0.449,0.185,0.729,0.28l0.668,0.226v-5.407l-0.624,0.147
                                                    C25.332,34.735,24.46,35.086,23.958,35.896z"/>
                                                </svg>
                                            </div>
                                            <div class="title-products d-flex flex-column align-items-center" style="width: 140px;">
                                                <h4 class="title-circle font-titles-md"><?php echo ($lang == 'en/')? $contenido['pagos']: $contenido['pagos_en']; ?></h4>
                                            </div>
                                            <div class="btn-vrCircle font-titles-md textUppercase"><?php echo ($lang == 'es/')? 'ver más':'see more' ?></div>
                                        </div>
                                        <img class="img-spinner" src="<?php echo base_url(); ?>assets/images/spiner.png" alt="">
                                    </a>
                                </div>
                                <div class="wow zoomIn d-flex justify-content-center wrapper-services anim serie "
                                    id="wrapper-product-five">
                                    <a href="<?= ($lang == 'es/')? base_url('es/') : base_url() ;  ?>informacion-del-mercado" class="circles-content bloque alinea izquierda_centro ancla_pata pata_activo"
                                        data-grupo="0" data-indice="4" data-flota>
                                        <div
                                            class="circle-info d-flex justify-content-center flex-column align-items-center">
                                            <div class="content-svg wow zoomIn">
                                                <svg class="" version="1.1" id="Capa_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 69.285 69.285" style="enable-background:new 0 0 69.285 69.285;" xml:space="preserve">
                                                <path class="path" style="stroke-linecap:round;stroke-miterlimit:10;" d="M68.385,34.643
                                                    c0,18.636-15.107,33.743-33.743,33.743S0.9,53.278,0.9,34.643S16.007,0.9,34.643,0.9S68.385,16.007,68.385,34.643z M3.571,47.818
                                                    c20.73,4.864,41.351,4.85,62.145,0 M65.791,21.646c-20.757-4.776-41.497-4.783-62.22,0 M34.643,0.9v67.485 M34.643,0.9
                                                    c-26.309,8.06-26.896,59.306,0,67.485 M34.643,68.385c26.309-8.06,26.896-59.306,0-67.485 M0.9,34.643h67.485"/>
                                                </svg>
                                            </div>
                                            <div class="title-products d-flex flex-column align-items-center">
                                                <h4 class="title-circle font-titles-md"><?php echo ($lang == 'es/')? $contenido['mercado']: $contenido['mercado_en']; ?></h4>
                                            </div>
                                            <div class="btn-vrCircle font-titles-md textUppercase"><?php echo ($lang == 'es/')? 'ver más':'see more' ?></div>
                                        </div>
                                        <img class="img-spinner" src="<?php echo base_url(); ?>assets/images/spiner.png" alt="">
                                    </a>
                                </div>
                                <div class="wow zoomIn d-flex justify-content-center wrapper-services anim serie "
                                id="wrapper-product-six">
                                    <a href="<?= ($lang == 'es/')? base_url('es/') : base_url() ;  ?>informacion-de-tendencias"
                                        class="circles-content bloque alinea izquierda_centro ancla_pata pata_activo"
                                        data-grupo="0" data-indice="5" data-flota>
                                        <div
                                            class="circle-info d-flex justify-content-center flex-column align-items-center">
                                            <div class="content-svg wow zoomIn">
                                                <svg class="" version="1.1" id="Capa_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
                                                    viewBox="0 0 57.39 64.71" style="enable-background:new 0 0 57.39 64.71;" xml:space="preserve">
                                                <path class="path" style="stroke-linecap:round;stroke-miterlimit:10;" d="M33.796,52.614V63.31
                                                    c0,0.276-0.224,0.5-0.5,0.5H0.9V4.993h44.514v46.62c0,0.276-0.224,0.5-0.5,0.5H34.296C34.02,52.114,33.796,52.338,33.796,52.614z
                                                    M37.351,21.623H8.974 M37.351,27.849H8.974 M37.351,34.075H8.974 M37.351,40.301H8.974 M37.351,46.526H8.974 M9.091,8.941v4.246
                                                    c0,1.536,1.245,2.781,2.781,2.781h0c1.536,0,2.781-1.245,2.781-2.781V5.4c0-2.485-2.015-4.5-4.5-4.5H9.624
                                                    c-2.348,0-4.276,1.799-4.482,4.093 M33.661,63.65l11.622-11.701 M38.794,63.81h12.274V4.993h-1.593 M54.971,63.81h1.519V4.993
                                                    h-1.593"/>
                                                </svg>
                                            </div>
                                            <div class="title-products d-flex flex-column align-items-center" style="width: 150px">
                                                <h4 class="title-circle font-titles-md"><?php echo ($lang == 'es/')? $contenido['tendencia']: $contenido['tendencia_en']; ?>
                                                </h4>
                                            </div>
                                            <div class="btn-vrCircle font-titles-md textUppercase"><?php echo ($lang == 'es/')? 'ver más':'see more' ?></div>
                                        </div>
                                        <img class="img-spinner" src="<?php echo base_url(); ?>assets/images/spiner.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="f-black"></div>
                <a href="#sct-form-hm" data-ancla="sct-form-hm" class="content-ancla d-none d-lg-block">
                    <h1 class="h1-text-Rotate font-internas color-black"><?php echo ($lang == 'es/')? 'Contáctanos':'Contact Us'; ?></h1>
                <i class="color-black icon-flecha"></i>
            </a>
            </div>
            
        </section>
        <!--CONTACTANOS-->
        <div class="section sct-form-hm" id="sct-form-hm">
            <?php
                include 'src/includes/contacto.php'
            ?>
            <?php
                include 'src/includes/footer.php'
            ?>
        </div>
    </main>
    <script src="<?= base_url(); ?>assets/js/modal-pol-dat-confi.js"></script>
    <script src="<?= base_url(); ?>assets/js/libraries/fullpage.js"></script>
    <script src="<?= base_url(); ?>assets/js/input-file.js"></script>
    <script src="<?= base_url(); ?>assets/js/slider-home.js"></script>
    <script src="<?= base_url(); ?>assets/js/background.js"></script>
    <script src="<?= base_url(); ?>assets/js/modal-pol-dat.js"></script>
    <script src="<?= base_url(); ?>assets/js/libraries/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/form.js"></script>
    <script>
        $(document).ready(function () {
            var iniciar = new acglobalConstructor();
            iniciar.pataAncla();
        });
    </script>
    <script>
        if (screen && screen.width > 1300) {
            let fullpageDiv = $('#fullpage');
            if (fullpageDiv.length) {
                fullpageDiv.fullpage({
                    scrollBar: true,
                    scrollOverflow: true,
                    verticalCentered: true,
                    afterRender: function () {

                    }
                });
            }
        }
    </script>
    <script>
       $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
            if (scrollTop > 50) {
                $('svg').addClass('svg-icon');
            } else {
                //$('.header').removeClass('header-fixed');
            }
        
    });
    </script>
</body>

</html>