
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
        <div class="row" id="banner">
            
            <div class="col-md-4" style="text-align:center;border-right:2px solid #E5E5E5;height:19vh; display: table; height:200px;" >
                <div class="beneficios-txt" style="display: table-cell; vertical-align: middle;">
                    <a href="https://www.rosen.com.pe/informativo-clientes-covid19" target="_blank">
                        <h3 class="divisor__title --small" style="color:#C51152;font-weight:bold;">Atencion al Cliente</h3>
                        <br>
                            <p class="divisor__subtitle --small" style="font-weight:600;color:#353535;font-size:136%;">Conoce qué tiendas están<br>abiertas y nuestras políticas<br>de despacho.<br></p>
                    </a>
                </div>
            </div>
            <div class="col-md-4" style="text-align:center;border-right:2px solid #E5E5E5;height:19vh;"> 
                <div class="beneficios-txt">
                    <h3 class="divisor__title --small" style="color:#C51152;font-weight:bold;">Medios de Pago</h3>
                    <br>
                        <img style="width:94%;height:auto;margin:0px 0px" class="divisor__image mobile" src="./assets/images/banner2/mpd-pe2.png" />
                </div>
            </div>
            <div class="col-md-4" style="text-align:center; height:19vh;">
                <div class="beneficios-txt">
                    <a href="tel: 5112029520">
                        <h3 class="divisor__title --small phone" style="color:#c51152;font-weight:bold;">Pedido</h3>
                            <p class="divisor__subtitle --small"><span style="line-height: 15px; letter-spacing: .1em; color: #000; font-size: 11px;font-weight:bold;">Te asesoramos en tu compra</span><br> 511 2029520 - Opción 1</p>
                            <img src="./assets/images/banner2/huincha-Despacho-MAY223.png" alt="" style="width: 55%; margin: auto; ">
                    </a>
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
                                <span class="d-block subtitle-card">Cuidado intensivo de la piel  para una belleza saludable</span>
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
          <div class="col-md-12" style="text-align:center;height:19vh; display: table; height:200px;" >
                <div class="beneficios-txt" style="display: table-cell; vertical-align: middle;">
                    <a href="https://www.rosen.com.pe/informativo-clientes-covid19" target="_blank">
                        <h3 class="divisor__title --small" style="color:#C51152;font-weight:bold;">Informativo BEURER</h3>
                        <br>
                            <p class="divisor__subtitle --small" style="font-weight:600;color:#353535;font-size:2vh;">Conoce qué tiendas están<br>abiertas y nuestras políticas<br>de despacho.<br></p>
                    </a>
                </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="col-md-12" style="text-align:center;height:19vh;"> 
                <div class="beneficios-txt">
                    <h3 class="divisor__title --small" style="color:#C51152;font-weight:bold;">Medios de Pago</h3>
                    <br>
                        <img style="width:90%;height:auto;margin:0px 0px" class="divisor__image mobile" src="mpd-pe2.png" />
                </div>
            </div>
      </div>
      <div class="swiper-slide">
            <div class="col-md-12" style="text-align:center; height:19vh;">
                <div class="beneficios-txt">
                    <a href="tel: 5112029520">
                        <h3 class="divisor__title --small phone" style="color:#c51152;font-weight:bold;">Venta Telefónica</h3>
                            <p class="divisor__subtitle --small"><span style="line-height: 15px; letter-spacing: .1em; color: #000; font-size: 11px;font-weight:bold;">Te asesoramos en tu compra</span><br> 511 2029520 - Opción 1</p>
                                <img src="huincha-Despacho-MAY223.png" alt="" style="width: 55%; margin: auto; ">
                    </a>
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
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>


<?php

include 'src\includes\footer.php'

?>
