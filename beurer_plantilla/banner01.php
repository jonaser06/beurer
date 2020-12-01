<?php
include 'src\includes\header.php'
?>
<style>
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
</style>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


<main class="main-detail-products">


    <!-- BANNER -->
    <div class="container-banner">
        <div class="row" id="banner">

            <div class="col-md-4" style="text-align:center;height:19vh; display: table; height:200px;">
                <div class="wrapper-slide beneficios-txt">

                    <h3 class="divisor__title --small" style="font-size:22pt;">Atención al Cliente</h3>

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
            <div class="col-md-4" style="text-align:center;height:19vh;">
                <div width="100%" class="wrapper-slide beneficios-txt">

                    <h3 class="divisor__title --small" style="font-size:22pt;">Pedido</h3>

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

    </div>
    

    <!-- BANNER -->


    <!-- PRODUCTOS RELACIONADOS -->
    <section class="sct-product-rel container-fluid">
        <div class="row">
            <h1 class="ttl-prl font-bold text-center">PRODUCTOS QUE TE PUEDEN INTERESAR</h1>
            <div class="carrosuel-two-home">
                <div class="wrapper-cards-products">
                    <a class="linkabsolute" href="#"></a>
                    <div class="content-img-card">
                        <img src="assets/sources/BS49_01.jpg" alt="" class="img-cnt">
                    </div>
                    <div class="content-title-card">
                        <h2 class="h2-title font-nexaheavy">ESPEJO COSMÉTICO CON LUZ BS 49</h2>
                        <span class="d-block subtitle-card">Espejo de tocador con luz LED extraintensa</span>
                        <div class="btn-vp">
                            <a href="#" class="a-btn font-nexaheavy">ver producto</a>
                        </div>
                    </div>
                </div>
                <div class="wrapper-cards-products">
                    <a class="linkabsolute" href="#"></a>
                    <div class="content-img-card">
                        <img src="assets/sources/FC90_02.jpg" alt="" class="img-cnt">
                    </div>
                    <div class="content-title-card">
                        <h2 class="h2-title font-nexaheavy">CUIDADO FACIAL IÓNICO ANTIEDAD FC 90</h2>
                        <span class="d-block subtitle-card">Cuidado antiedad visible</span>
                        <div class="btn-vp">
                            <a href="#" class="a-btn font-nexaheavy">ver producto</a>
                        </div>
                    </div>
                </div>
                <div class="wrapper-cards-products">
                    <a class="linkabsolute" href="#"></a>
                    <div class="content-img-card">
                        <img src="assets/sources/FS50_01.jpg" alt="" class="img-cnt">
                    </div>
                    <div class="content-title-card">
                        <h2 class="h2-title font-nexaheavy">SAUNA FACIAL FS 50</h2>
                        <span class="d-block subtitle-card">Cuidado intensivo de la piel para una belleza
                            saludable</span>
                        <div class="btn-vp">
                            <a href="#" class="a-btn font-nexaheavy">ver producto</a>
                        </div>
                    </div>
                </div>

                <div class="wrapper-cards-products">
                    <a class="linkabsolute" href="#"></a>
                    <div class="content-img-card">
                        <img src="assets/sources/FC90_02.jpg" alt="" class="img-cnt">
                    </div>
                    <div class="content-title-card">
                        <h2 class="h2-title font-nexaheavy">CUIDADO FACIAL IÓNICO ANTIEDAD FC 90</h2>
                        <span class="d-block subtitle-card">Cuidado antiedad visible</span>
                        <div class="btn-vp">
                            <a href="#" class="a-btn font-nexaheavy">ver producto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="swiper-container" id="slider" style="display:none;">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="col-md-12" style="text-align:center;height:19vh; display: table; height:200px;">
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
                <div class="col-md-12" style="text-align:center;height:19vh; display: table; height:200px;">
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
                <div class="col-md-12" style="text-align:center;height:19vh; display: table; height:200px;">
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
    </div>



</main>



<!-- MODALES -->

</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
let swiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
</script>

<style>
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
    font-size: 1rem;
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
    width: 95%;
    margin: auto;
    font-size: 1rem;
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

.container-banner> div >div:nth-child(2)::before{
    content: '';
    position: absolute;
    left: 0;
    top: 30%;
    width: 2px;
    background-color: #c51152;
    height: 60%;
    /* border: 1px solid red; */
}
.container-banner> div >div:nth-child(2)::after{
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
<?php

include 'src\includes\footer.php'

?>