<?php
    include 'src/includes/header.php';
?>
<style>
    .wrapper-footer{float:none;}
/* swiper */

.swiper-container {
    width: 100%;
    height: 100%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}
.cards-container {
    padding: 1rem;
    display: flex;
    align-items: center;
}

.cards-container>* {
    flex: 50%;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.cards>* {
    padding: 3px;
    width: 30px;
    flex: 33%
}

.wrapper-slide {
    /* border:1px solid red; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 1rem;
}

.content-slide>img {
    margin-right: 3rem
}

.content-slide,
.slider,
.phones {
    display: flex;
    justify-content: space-evenly;
}

.content-slide figure {
    font-size: .9rem!important;
    align-items: center;
    display: flex;
    justify-content: space-evenly;
    flex: 50%
}

.content-slide figure img {
    height: 85px;
}

.slider {
    flex-direction: column;
}

.phones {
    justify-content: space-evenly;
}

.container-banner {
    width: 90%!important;
    margin: 3rem auto;
    font-size: .9rem;
    
}

.container-banner .wrapper-slide {
    /* border:1px solid red; */
    padding: 0px;
}

.container-banner .content-slide>img {
    /* width:75px!important; */
    margin-right: 0rem
}

.container-banner .cards>* {
    padding: 3px;
    /* width: 45px; */
    flex: 33%
}

.container-banner .content-slide figure img {
    height: 66px !important;
}

.container-banner .content-slide figure {
    margin-top: 1rem;
    font-size: .95rem;
}

.container-banner>div>div:nth-child(2)::before {
    content: '';
    position: absolute;
    left: 0;
    top: 30%;
    width: 2px;
    background-color: #c51152;
    height: 60%;
    /* border: 1px solid red; */
}

.container-banner>div>div:nth-child(2)::after {
    content: '';
    position: absolute;
    right: 0;
    top: 30%;
    width: 2px;
    background-color: #c51152;
    height: 60%;
    /* border: 1px solid red; */
}

@media only screen and(max-width:480px) {
    .wrapper-slide {
        padding: 4rem !important;
    }
}

</style>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <main class="main-home" id="fullpage">
        <div class="popup-ini" id="login">
          <div class="popup-inner">
           <img id="img-popup" src="<?php echo base_url($confif['popup']); ?>" class="img-responsive" alt="">
            <!--button type="reset" class="aspa acordion_cerrar close" style="width: 34px!important;top: 5px;right: 5px;"> <i></i> </button-->
            <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div> 
        <section class="section sct-video-home pos-rel">
        
                <video data-autoplay loop muted src="<?= base_url($contenido['video']); ?>" class="video hidden-xs hidden-sm"></video>
            
            <div class="text-center title-banner-home hidden-xs hidden-sm">
                <h2 class="title-b-products font-nexaheavy">#SaludYBienestar</h2>
            </div>
            <?php
                $slide_show = array(
                    $contenido['box_img_salud'],
                    $contenido['box_img_bienestar'],
                    $contenido['box_img_belleza'],
                    $contenido['box_img_actividad'],
                    $contenido['box_img_linea-bebe']
                );

                $slide_link = array(
                    base_url('salud'),
                    base_url('bienestar'),
                    base_url('belleza'),
                    base_url('actividad'),
                    base_url('linea-bebe'),
                );

                $slide_txt = array(
                    'Salud',
                    'Bienestar',
                    'Belleza',
                    'Actividad',
                    'Linea Bebe',
                );
                $slide_bg = array(
                    'bg-salud',
                    'bg-bienestar',
                    'bg-belleza',
                    'bg-actividad',
                    'bg-linea-bb',
                );
            ?>
            <div class="slider-home visible-xs visible-sm">
                <?php for ($i=0; $i<count($slide_show); $i++){ ?>
                <div class="item-slider-home">
                    <figure>
                        <img src="<?= $slide_show[$i] ?>" alt="">
                    </figure>
                    <div class="name-prod-slider">
                        <h2 class="title-slider-h"><?= $slide_txt[$i]  ?></h2>
                        <a href="<?= $slide_link[$i]  ?>" class="btn-slider-h <?= $slide_bg[$i]  ?>">ver más</a>
                    </div>
                    <div class="degradado"></div>
                </div>
                <?php } ?>
           
            </div>
            
        </section>

        <section class="section sct-four-home">
            <div class="container-fluid h100">
                <div class="row h100">                    
                    <div class="col-exe">
                        <figure class="effect-selena bgc-celeste">
                            <a href="<?= base_url('salud'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_salud']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cceleste">SALUD</h2>
                                <p><?= $getbox[0]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-naranja">
                            <a href="<?= base_url('bienestar'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_bienestar']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cnaranja">BIENESTAR</h2>
                                <p><?= $getbox[1]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-morado">
                            <a href="<?= base_url('belleza'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_belleza']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cmorado">BELLEZA</h2>
                                <p><?= $getbox[2]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-verde">
                            <a href="<?= base_url('actividad'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_actividad']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cverde">ACTIVIDAD</h2>
                                <p><?= $getbox[3]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-amarillo">
                            <a href="<?= base_url('linea-bebe'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_linea-bebe']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="camarillo">LÍNEA BEBÉ</h2>
                                <p><?= $getbox[4]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- CARROSUEL PRODUCTOS DESTACADOS -->
        <section class="section sct-two-home">
            <h2 class="ttl-prd-dst text-center font-nexaheavy">PRODUCTOS DESTACADOS</h2>
            <div class="container">
                <div class="row">
                    
                        
                    <div class="carousel-home-general">
                        <?php foreach ($dstcd as $row): ?>
                        <?php if ($row['active'] == 1): ?>
                            <div class="item-carosuel">
                                <div class="container">
                                    <div class="info-slider-home">
                                        <!--button class="trans-info name-product bg-belleza font-nexaregular  bg-pink"><?php $row['pagina'] ?></button-->
                                        <h2 class="trans-info title-big-slider font-nexaheavy"><?= $row['titulo'] ?></h2>
                                        <span class="trans-info subtile-slider text-uppercase font-nexaregular"><?= $row['subtitulo'] ?></span>
                                        <p class="trans-info description-slider font-nexaregular"><?= $row['contenido'] ?></p>
                                        <a href="<?= base_url($row['cat_url'].'/'.$row['subcat_url'].'/'.$row['prod_url']); ?>" class="trans-info btn-slider bg-pink">VER PRODUCTO</a>
                                    </div>
                                    <div class="img-slider-h">
                                            <img src="<?= base_url($row['imagen']); ?>" alt="">
                                        
                                    </div>
                                </div>
                            </div>    
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>

       
       
        <section class="section sct-three-home">
            <div class="container-fluid">
                <div class="row">
                    <div class="carrosuel-two-home">
                        <?php foreach ($slideme as  $low): ?>
                        <?php if ($low['active'] == 1): ?>
                            <div class="wrapper-cards-products">
                                <a class="linkabsolute" href="<?= base_url($low['cat_url'].'/'.$low['subcat_url'].'/'.$low['prod_url']); ?>"></a>
                                <div class="content-img-card">
                                    <img src="<?= base_url($low['imagen']); ?>" alt="" class="img-cnt">
                                </div>
                                <div class="content-title-card">
                                    <h2 class="h2-title font-nexaheavy"><?= $low['titulo'] ?></h2>
                                    <span class="d-block subtitle-card"><?= $low['subtitulo'] ?></span>
                                    <div class="btn-vp">
                                        <a href="<?= base_url($low['cat_url'].'/'.$low['subcat_url'].'/'.$low['prod_url']); ?>" class="a-btn font-nexaheavy">ver producto</a>
                                    </div>
                                </div>
                            </div>    
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="swiper-container"  id="slider" style="display:none;">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="col-md-12" style="text-align:center;height:25vh; display: table; height:200px;">
                        <div class="wrapper-slide beneficios-txt">

                            <h3 class="divisor__title --small" style="font-size:22pt;">Atención al Cliente</h3>

                            <div class="content-slide">
                                <img style="width:110px" src="assets/svg/user.svg" alt="">
                                <div class="slider">
                                    <p>Te acesoramos en tu compra</p>
                                    <article class="phones">
                                        <img style="width:45px" src="assets/svg/recurso.svg" alt="">
                                        <div class="phones-numbers">
                                            920 198 522 <br>
                                            978 440 034
                                        </div>
                                    </article>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="col-md-12" style="text-align:center;height:25vh; display: table; height:200px;">
                        <div class="wrapper-slide beneficios-txt">

                            <h3 class="divisor__title --small" style="font-size:22pt;">Medios de pago</h3>

                            <div class="content-slide cards-container">
                                <div class="cards">
                                    <img src="assets/svg/visa@3x.png" alt="visa">
                                    <img src="assets/svg/master@3x.png" alt="master">
                                    <img src="assets/svg/expres@3x.png" alt="expres">
                                    <img src="assets/svg/club@3x.png" alt="club">
                                    <img src="assets/svg/efectivo@3x.png" alt="efectivo">
                                    <img src="assets/svg/shop.svg" alt="">
                                </div>
                                <p>Aceptamos todos los <br> medios de pago y/o Transferencias</p>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="col-md-12" style="text-align:center;height:25vh; display: table; height:200px;">
                        <div width="100%" class="wrapper-slide beneficios-txt">

                            <h3 class="divisor__title --small" style="font-size:22pt;">Pedido</h3>

                            <div class="content-slide">
                                <figure>
                                    <img src="assets/svg/send.svg" alt="">
                                    <p>!Envios a todo el Perú</p>
                                </figure>

                                <figure>
                                    <img width="80" src="assets/svg/car.svg" alt="">
                                    <p>Retiro gratis en<br> nuestra tienda</p>
                                </figure>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </section>
        <section class="container-banner section fp-auto-height">
            <div class="row" id="banner">

                <div class="col-md-4" style="text-align:center;height:19vh; display: table; height:200px;">
                    <div class="wrapper-slide beneficios-txt">

                        <h3 class="divisor__title --small" style="font-size:20pt;">Atención al Cliente</h3>

                        <div class="content-slide">
                            <img style="width:90px" src="assets/svg/user.svg" alt="">
                            <div class="slider">
                                <p>Te acesoramos en tu compra</p>
                                <article class="phones">
                                    <img style="width:45px" src="assets/svg/recurso.svg" alt="">
                                    <div class="phones-numbers">
                                        920 198 522 <br>
                                        978 440 034
                                    </div>
                                </article>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4" style="text-align:center;height:19vh;height:200px">
                    <div class="wrapper-slide beneficios-txt">

                        <h3 class="divisor__title --small" style="font-size:20pt;">Medios de pago</h3>

                        <div class="content-slide cards-container">
                            <div class="cards">
                                <img src="assets/svg/visa@3x.png" alt="visa">
                                <img src="assets/svg/master@3x.png" alt="master">
                                <img src="assets/svg/expres@3x.png" alt="expres">
                                <img src="assets/svg/club@3x.png" alt="club">
                                <img src="assets/svg/efectivo@3x.png" alt="efectivo">
                                <img src="assets/svg/shop.svg" alt="">
                            </div>
                            <p>Aceptamos todos los <br> medios de pago y/o Transferencias</p>
                        </div>


                    </div>
                </div>
                <div class="col-md-4" style="text-align:center;height:19vh;">
                    <div width="100%" class="wrapper-slide beneficios-txt">

                        <h3 class="divisor__title --small" style="font-size:20pt;">Pedido</h3>

                        <div class="content-slide">
                            <figure>
                                <img src="assets/svg/send.svg" alt="">
                                <span>!Envios a todo el Perú</span>
                            </figure>

                            <figure>
                                <img width="60" src="assets/svg/car.svg" alt="">
                                <p>Retiro gratis en<br> nuestra tienda</p>
                            </figure>

                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section class="section fp-auto-height">
        
            <?php
                include 'src/includes/footer.php'
            ?>
        </section>
    </main>
    
    
    <script src="assets/js/libraries/fullpage.js"></script>

    <!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>

        let swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        
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

        <?php if ($confif['popup_check'] == 1): ?>
            $('#login').fadeIn();
        <?php else: ?>
            $('.popup-ini').css('display', 'none');
        <?php endif ?>

    </script>
    <script>

  
        $(".popup-btn").click(function () {
                    var target = $(this).attr("href");
                    $(target).fadeIn();
         });
         
        $(".popup-ini .close").click(function () {
                    $(".popup-ini").fadeOut();
         });
        

         
if (screen && screen.width > 992) {
    $(".div-search").mouseover(function (event) {
        $(".input-search").css({
            'width': '18.5vw',
            'border-color': '#c51152',
            'border-radius': '15px',
            'box-shadow': '4px 4px #ccc',

        })
        $(".input-search::placeholder").css({
            'opacity': '1',
            'color': '#fff',

        })
    });
    $(".div-search").mouseout(function (event) {
        $(".input-search").css({
            'width': '0',
            'border-color': 'transparent',
            'border-radius': '0',
            'box-shadow': '0px 0px #ccc',
            //'padding': '0'
        })
    });
} else {
    $(".div-search").mouseover(function (event) {
        $(".input-search").css({
            'width': '18.5vw',
            'border-color': '#c51152',
            'border-radius': '15px',
            'box-shadow': '4px 4px #ccc',
        })

        $(".input-search::placeholder").css({
            'opacity': '1',
            'color': '#fff',
        })
    });

    $(".div-search").click(function () {
        $(".input-search").css({
            "top": "0", //modificamos el bottom a 0
            "box-shadow": '0px 0px #ccc',
        });
        $(".bsc-btn").css({
            // "opacity": "1",
            // "z-index": "10000"
        })
    });
    $(".div-search").mouseout(function () {
        $(".input-search").css({
            // "top" : "-100%" //modificamos el bottom a 0
            'width': '0',
            'border-color': 'transparent',
            'border-radius': '0',
            'box-shadow': '0px 0px #ccc',
        });

    });
}

    </script>
    
</body>
<style>
@media (max-width: 480px){
body {
       font-size: 72.5%!important;
   }
}
     
</style>

</html>