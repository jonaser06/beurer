<?php
include 'src\includes\header.php'
?>

<style>
    body {
        background-color: #fff !important;
    }
</style>
<main class="main-detail-products">
    <section class="sct-detail-products">
        <div class="container cont-detail-products">
            <div class="row">
                <!-- BREADCRUMB -->
                <div class="col-xs-12">
                    <ol class="breadcrumb row">
                        <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas">Productos</a></li>
                        <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas">Belleza </a></li>
                        <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas">Cuidado del rostro</a>
                        </li>
                        <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas active">CEPILLO DE
                                LIMPIEZA FACIAL FC 65</a>
                        </li class="item-bradcrumb">
                    </ol>
                </div>

                <div class="col-xs-12 col-md-7 foto-sticky">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tabss row">
                                <a href="assets/sources/manuales/605.06_FC65_2018-12-03_01_IM1_BEU.pdf"
                                    class="icon-descarga-detalle2" title="Descargar" target="_blank"></a>
                                <div class="tabs_gotoWrap col-xs-12 col-md-2 animatedParent animateOnce"
                                    data-sequence='500'>

                                    <div class="animated fadeInLeftShort tabs_goto -active" data-id="1"
                                        id="secondary-img">
                                        <img class="img-cover" src="assets/sources/61sJPfVV7BL._AC_SL1500__1.jpg"
                                            alt="">
                                    </div>

                                    <div class="animated fadeInLeftShort tabs_goto" data-id="2">
                                        <img class="img-cover" src="assets/sources/fc65_3.jpg" alt="">
                                    </div>

                                    <div class="animated fadeInLeftShort tabs_goto" data-id="3">
                                        <img class="img-cover" src="assets/sources/FC65_solo.jpg" alt="">
                                    </div>

                                    <div class="animated fadeInLeftShort tabs_goto" data-id="4">
                                        <img class="img-cover" src="assets/sources/81b4gbHLkJL._AC_SL1500_.jpg" alt="">
                                    </div>


                                    <div class="animated fadeInLeftShort video-circle" data-id="4">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=aYyRj2wvI78">
                                            <!--  <a data-fancybox href="assets/video/video_1.mp4"> -->
                                            <img class="img-cover" src="assets/images/icons/play.svg" />
                                        </a>
                                    </div>
                                </div>

                                <div class="tabs_sectionsWrap col-xs-12 col-md-10 animatedParent animateOnce">

                                    <section class="tabs_section animated growIn -open" id="principal-img">


                                        <img src="assets/sources/61sJPfVV7BL._AC_SL1500__1.jpg" alt=""></section>

                                    <section class="tabs_section animated growIn"><img src="assets/sources/fc65_3.jpg"
                                            alt=""></section>

                                    <section class="tabs_section animated growIn"><img
                                            src="assets/sources/FC65_solo.jpg" alt=""></section>

                                    <section class="tabs_section animated growIn"><img
                                            src="assets/sources/81b4gbHLkJL._AC_SL1500_.jpg" alt=""></section>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-5 info-prod animatedParent animateOnce">
                    <div class="animated fadeInRightShort">

                        <button class="trans-info name-product bg-primary font-nexaregular">BELLEZA </button>
                        <h2 class="px-0 col-xs-12 title-detail-product font-nexaheavy">CEPILLO DE LIMPIEZA FACIAL FC 65
                        </h2>
                        <span class="px-0 col-xs-12 subtitle-detail-product font-nexaregular"
                            style="border-bottom:2px solid lightgray;margin-bottom:15px;padding-bottom:15px;">Luz LED
                            azul para combatir las impurezas</span>

                        <div style="display:block;"> <img
                                style="display:inline-block;width:10vh;height:8vh;margin-right:3%;padding-bottom:4%;"
                                src="assets/images/precio-online.png">
                            <div class="font-nexaheav text-left"
                                style="display:inline-block;color:#c51152;font-weight:bold; font-size: 2.3em;font-family:'nexaregularuploaded_file';">
                                S/ 109.90</div>
                        </div>


                        <div class="font-nexaheav text-left "
                            style="font-size:1.1em;font-weight:bold;font-family:'nexa-lightuploaded_file';margin-top:-0.5rem;">
                            Normal: S/ 25.69</div>
                        <br>

                        <span class="px-0 col-xs-12  font-nexaregular"
                            style="font-size:1.2em; font-family:'nexaheavyuploaded_file';padding-bottom:11px; "> COLORES
                            DISPONIBLES:</span>

                        <ul class="colors" id="div-colors" style="display:block;">
                            <li class="btn btnprimary1 color active" style="background-color:#c51152;"></li>
                            <li class="btn btnprimary1 color" style="background-color:black"></li>
                            <li class="btn btnprimary1 color" style="background-color:gray"></li>

                        </ul>



                        <div style="margin-top:4px;">
                            <label
                                style="display:inline-block;font-size:16px;font-family:'nexaregularuploaded_file';font-weight:bold;">CANTIDAD:
                            </label>

                            <div class="cantidad_btn" style="display:inline-block;">
                                <button id="dism" style="margin:0 2%;" onclick="disminuir()">-</button>
                                <input class="form-control-field" name="pwd" value="1" type="text" id="cantidad_prod"
                                    min="1" style="padding:0px;width:10%; text-align:center;" readonly>
                                <button id="aum" style="margin:0 2%;" onclick="aumentar()">+</button>
                            </div>
                            <br> <br>
                            <button type="button" class="btn btn-cmn" data-toggle="modal"
                                data-target="#DetalleProducto"><a href="#"
                                    style="color:white;border: 2px solid #c51152;" tabindex="-1">AÑADIR AL
                                    CARRO</a></button>

                        </div>

                        <br>

                        <!-- Fin de Agregado -->

                        <div class="tabs col-xs-12">
                            <div class="tab-button-outer">
                                <ul id="tab-button">
                                    <li id="icon-descripcion"><a href="#description">DESCRIPCIÓN</a></li>
                                    <li id="icon-ficha"><a href="#ficha-tecnica">FICHA TÉCNICA</a></li>
                                </ul>
                            </div>
                            <div class="content">
                                <div id="description" class="tab-contents" style="display:block;">
                                    <ul class="list-descr-detall">

                                        <p><span style="font-size: 10pt;">Un cutis impecable gracias a la luz LED azul.
                                                El cepillo facial limpia con suavidad y en profundidad para que el cutis
                                                luzca suave y radiante. La luz LED azul reduce las impurezas
                                                r&aacute;pidamente.</span><br /><br /></p>
                                    </ul>
                                </div>
                                <div id="ficha-tecnica" class="tab-contents">
                                    <p><span style="font-size: 10pt;">&bull; Limpieza delicada y profunda para un cutis
                                            visiblemente suave y radiante.</span><br /><span
                                            style="font-size: 10pt;">&bull; Con luz LED azul contra impurezas para un
                                            cutis limpio.</span><br /><span style="font-size: 10pt;">&bull; La luz LED
                                            azul reduce las impurezas r&aacute;pidamente.</span><br /><span
                                            style="font-size: 10pt;">&bull; 2 funciones: vibratoria (limpieza suave) y
                                            pulsaci&oacute;n (limpieza profunda).</span><br /><span
                                            style="font-size: 10pt;">&bull; 3 niveles de velocidad.</span><br /><span
                                            style="font-size: 10pt;">&bull; A prueba de agua.</span><br /><span
                                            style="font-size: 10pt;">&bull; Incluye accesorio de cepillado
                                            suave.</span><br /><span style="font-size: 10pt;">&bull; Funcionamiento con
                                            bater&iacute;a - 30 min.</span><br /><span style="font-size: 10pt;">&bull;
                                            Estaci&oacute;n de carga - 6 horas de tiempo de carga.</span><br /><span
                                            style="font-size: 10pt;">&bull; 3 a&ntilde;os de garant&iacute;a.</span></p>
                                </div>
                                <div id="accesorios" class="tab-contents">
                                    <div class="container-fluid px-0">
                                        <div class="row">


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
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
            </div>
        </div>
    </section>

</main>

<div class="modal fade" id="DetalleProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width:100%; padding:1%;padding-top:0px;border-radius:5%;padding:4%;">
            <div class="modal-header" style=" color:#c51152; border-bottom:0 none;padding-bottom:1%;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-25px;">
                    <span aria-hidden="true" style="color:#c51152;font-weight:bold;font-size:1.5em;">&times;</span>
                </button>

                <div style="display:block;text-align:center;">
                    <div style="display:inline-block"> <img src="assets/images/icono-comprobar.svg" id="img-check"
                            style="width:1.5rem;height:auto;"></div>
                    <div style="display:inline-block;vertical-align:middle;margin-left:1.5%;">
                        <h2 class="modal-title" id="txt-exito"
                            style="font-size:1.7rem;vertical-align:middle;font-family:'nexaheavyuploaded_file';text-align:center;">
                            Producto añadido con éxito</h2>
                    </div>
                </div>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-xs-5"><img src="assets/sources/61sJPfVV7BL._AC_SL1500__1.jpg" alt=""
                            style="width:100%; height:auto;align:left;"></div>
                    <div class="col-md-7 col-xs-7" style=" display: flex;
                    justify-content: center;
                    align-content: center;
                    flex-direction: column;">
                        <h2 class="modal-title" id="title-principal" style="font-size:1.3rem;font-weight:bold;">CEPILLO
                            DE LIMPIEZA FACIAL FC 65</h2>


                        <div class="font-nexaheav text-left "
                            style="font-size:1.3em;font-family:'nexaregularuploaded_file';">Cantidad: 1</div>


                        <div style="display:block;"> <img
                                style="display:inline-block;width:7vh;height:5vh;margin-right:3%;padding-bottom:4%;"
                                src="assets/images/precio-online.png">
                            <div class="font-nexaheav text-left"
                                style="display:inline-block;color:#c51152;font-weight:bold; font-size: 1.2rem;font-family:'nexaregularuploaded_file';">
                                S/ 109.90</div>
                        </div>
                        <div class="font-nexaheav text-left "
                            style="font-size:1.1em;font-family:'nexaregularuploaded_file';">Normal: S/ 25.69</div>
                    </div>

                </div>
            </div>
            <div class="modal-footer"
                style="text-align:center;border-top:0 none;padding-top:7px;border-bottom:1px solid #c3c3c3;padding-bottom:35px;">

                <a href="carrito.php"><button type="button" class="btn  btn-cmn"
                        style="width:75%;text-align:center;font-size:1.2rem;padding-top:7px;padding-bottom:7px; padding-left:0px;padding-right:0px; ">IR
                        AL CARRO</button></a>
                <br>
                <br>
                <a href="producto.php"
                    style="font-size: 0.95rem;font-weight:bold;text-decoration-line:underline;">Seguir comprando</a>
            </div>

            <div class="modal-header" style="text-align:center;border-bottom:0 none;">
                <h4 class="modal-title font-nexaheavy" id="exampleModalLongTitle"
                    style="font-size:2.4vh;color:#c51152;">PRODUCTOS SUGERIDOS</h4>

            </div>
            <div class="modal-body" style="padding:0px;">
                <div class="row" style="margin:0px;">
                    <div class="col-md-12 ">

                        <div class="row" style="margin:0px;">

                            <div class="col-md-4  col-xs-4" style="padding:0;">
                                <div class="carrosuel-two-home slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1;width: 100%;transform: translate3d(0px, 0px, 0px);">
                                            <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                                aria-hidden="false" style="width: 100%;">
                                                <div>
                                                    <div class="wrapper-cards-products pro-suger"
                                                        style="background-color:transparent !important;width: 100%; height:100%; display: inline-block;">
                                                        <a class="linkabsolute" href="#" tabindex="0"></a>
                                                        <div class="content-img-card"
                                                            style="width:100% !important; margin-top:8%; height:auto;">
                                                            <img src="assets/sources/BS49_01.jpg" alt=""
                                                                class="img-cnt">
                                                        </div>
                                                        <div class="content-title-card">
                                                            <h2 class="h2-title font-bold title-sugerido"
                                                                style="font-size:1.2em;color:black;">ESPEJO COSMÉTICO
                                                                CON LUZ BS 49</h2>
                                                            <br>
                                                            <div class="btn-vp" style="width:75%;">
                                                                <a href="#" class="a-btn font-nexaheavy ver-prod"
                                                                    style="font-size:1.2vh;padding-top:0.6em;padding-bottom:0.6em;"
                                                                    tabindex="0">ver producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4  col-xs-4" style="padding:0;">
                                <div class="carrosuel-two-home slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1;width: 100%;transform: translate3d(0px, 0px, 0px);">
                                            <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                                aria-hidden="false" style="width: 100%;">
                                                <div>
                                                    <div class="wrapper-cards-products pro-suger"
                                                        style="width: 100%; height:100%; display: inline-block;">
                                                        <a class="linkabsolute" href="#" tabindex="0"></a>
                                                        <div class="content-img-card"
                                                            style="width:100% !important; margin-top:8%; height:auto; border-left:1px solid gray;border-right:1px solid gray;">
                                                            <img src="assets/sources/BS49_01.jpg" alt=""
                                                                class="img-cnt">
                                                        </div>
                                                        <div class="content-title-card">
                                                            <h2 class="h2-title font-bold title-sugerido"
                                                                style="font-size:1.2em;color:black;">ESPEJO COSMÉTICO
                                                                CON LUZ BS 49</h2>
                                                            <br>
                                                            <div class="btn-vp" style="width:75%;">
                                                                <a href="#" class="a-btn font-nexaheavy ver-prod"
                                                                    style="font-size:1.2vh;padding-top:0.6em;padding-bottom:0.6em;"
                                                                    tabindex="0">ver producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4  col-xs-4" style="padding:0;">
                                <div class="carrosuel-two-home slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1;width: 100%;transform: translate3d(0px, 0px, 0px);">
                                            <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                                aria-hidden="false" style="width: 100%;">
                                                <div>
                                                    <div class="wrapper-cards-products pro-suger"
                                                        style="width: 100%; height:100%; display: inline-block;">
                                                        <a class="linkabsolute" href="#" tabindex="0"></a>
                                                        <div class="content-img-card"
                                                            style="width:100% !important; margin-top:8%; height:auto;">
                                                            <img src="assets/sources/BS49_01.jpg" alt=""
                                                                class="img-cnt">
                                                        </div>
                                                        <div class="content-title-card">
                                                            <h2 class="h2-title font-bold title-sugerido"
                                                                style="font-size:1.2em;color:black;">ESPEJO COSMÉTICO
                                                                CON LUZ BS 49</h2>
                                                            <br>
                                                            <div class="btn-vp" style="width:75%;">
                                                                <a href="#" class="a-btn font-nexaheavy ver-prod"
                                                                    style="font-size:1.2vh;padding-top:0.6em;padding-bottom:0.6em;"
                                                                    tabindex="0">ver producto</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-4 col-xs-4" style="box-shadow:         1px 0px 0px 0px rgba(50, 50, 50, 0.3);">
                            <div class="modal-body" style="padding: 8px; " >
                            <a href="carrito.php">
                            <button type="button" class="btn btn-primary2">
                            <div class="row">
                                    <div class="col-md-12 img_rec"><img src="https://pim.beurer.com/images/produkt/uebersicht/fs50-2017-with-facial.jpg" alt="" style="width:100%; height:auto;align:left;" ></div>
                                    
                                  </div>
                                <div class="row">
                                    <div class="col-md-12 "><h4 class="title1" style="padding-top:15%;">FS 50</h4> <div class="font-nexaheav " style="text-align:center;" > </div>  <div class="font-nexaheav " style="color:#c51152; font-size: 1.2em; text-align:center;" ><strong>S/. 15.69</strong></div> </div>
                                    
                                  </div>
                                </div>
                          
                                </button>
                            </a>
                        </div> -->
                            <!-- <div class="col-md-3 col-xs-3">
                            <div class="modal-body" style="padding: 8px;">
                            <button type="button" class="btn btn-primary2">
                            <div class="row">
                                    <div class="col-md-12 "><img src="https://pim.beurer.com/images/produkt/uebersicht/fs50-2017-with-facial.jpg" alt="" style="width:100%; height:auto;align:left;" ></div>
                                    
                                  </div>
                                <div class="row">
                                    <div class="col-md-12 "><h4 class="title1" style="padding-top:15%;">FS 50</h4> <div class="font-nexaheav " style="text-align:center;" > </div>  <div class="font-nexaheav " style="color:#c51152; font-size: 1.2em; text-align:center;" ><strong>S/. 15.69</strong></div> </div>
                                    
                                  </div>
                                </div>
                          
                                </button>

                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php

include 'src\includes\footer.php'

?>