<?php
include 'src/includes/header.php'
?>

<style>
@media (max-width: 700px) {
    .quantity {
        width: 40% !important;
    }

    .quantity input {
        text-decoration: underline;
    }

    .rsubtotal {
        width: 60% !important;
    }



    .bloque-contacto {
        width: 100% !important;
    }
}
</style>


<main class="main-detail-products">
    <!--Inicio de cuerpo-->

    <section class="sct-detail-products">
        <div class="container cont-detail-products">
            <div class="row">

            </div>

        </div>
    </section>

    <div id="checkout_crumb">

        <div class="crumb" style="max-width: 1100px;
          margin: auto;
          display: flex;
          flex-wrap: nowrap;
          justify-content: space-between;">
            <span class="step_on1">
                <img src="assets/images/steps/paso1.png"></span>


            <span class="step_off1"><img src="assets/images/steps/paso2.png"></span>


            <span class="step_off1"><img src="assets/images/steps/paso3.png"></span>


            <span class="step_off1"><img src="assets/images/steps/paso4.png"></span>
        </div>
    </div>
    <br>


    <div id="checkout_crumb">
        <hr style="margin-bottom:-26px;">
        <div class="crumb" style="max-width: 1100px;
          margin: auto;
          display: flex;
          flex-wrap: nowrap;
          justify-content: space-between;">
            <span class="step_on noactive">
                Carrito de compras</span>

            <span class="step_arrow"></span>
            <span class="step_off noactive">Datos y Facturación</span>

            <span class="step_arrow"></span>
            <span class="step_off noactive">Envío y Pago</span>

            <span class="step_arrow"></span>
            <span class="step_off active">Resumen de Pedido</span>
        </div>
    </div>


    <br>
    <div class="container2 gracias-compra" style="width:80%;">
        <div
            style="height:100%;background-image:url('assets/images/fondo1.png');background-color:white;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;margin-bottom:2%;">
            <span class="font-nexaheavy" style="font-size:2rem;color:#c51152;"> ¡Gracias por tu compra! </span>
            <p style="font-size:1.2rem;color:#c51152;"> El equipo de beurer.pe </p>
            <hr style="border-color:#c51152;">
            <p class="font-nexaheavy" style="font-size:1.2rem;color:black;"> Recibirás una confirmación a través de tu
                correo electrónico con el resumen del pedido. </p>
        </div>
        <div style="text-align:center;">
            <div class="row paso3"
                style="text-align:left; margin:auto; width:85%;background-color:white;border-radius:20px;">
                <div class="col-md-12" style="background-color:white; border-radius:25px;padding:2.5% 3.5%;">
                    <div class="titulo"
                        style="height:100%;margin-left:0%;font-weight:normal !important;font-size:1.7rem;border-left:5px solid #c51152; padding-left:1%;font-family: 'nexaheavyuploaded_file';">
                        INFORMACIÓN DE PEDIDO </div>

                    </br>
                    <ul
                        style="list-style-image: url(<?= base_url('beurer_plantilla/assets/images/check-solid.svg')?>); font-size:1.3em;margin-left:3%;">
                        <li style="font-weight:bold;">Comprador</li>
                        <div class="numero_documento" style="text-align:left;"></div>
                        <div class="titular" style="text-align:left;"> </div>
                        <div class="correo" style="text-align:left;"></div>
                        <div class="destinatario">Lo puede recibir:</div>
                        <br>

                        <li class="title-envio" style="font-weight:bold;"></li>
                        <div class="dir_envio" style="text-align:left;"></div>
                        <div class="distrito" style="text-align:left;"></div>
                        <div class="provincia" style="text-align:left;"></div>
                        <br>
                        <li style="font-weight:bold;">Referencia</li>
                        <div class="referencia" style="text-align:left;"> </div>
                        <br>

                        <li style="font-weight:bold;">Fecha de entrega</li>
                        <div class="fecha_entrega"style="text-align:left;"></div>
                        <br> 

                        <li style="font-weight:bold;">Código de Pedido</li>
                        <div class="codigo-venta" style="text-align:left;"></div>
                    </ul>

                    <br>

                    <div class="basket" style="padding:0px;width:100%;">

                        <div
                            style="background-color:white;border-radius:25px;float:left;padding:.5rem 0rem;margin-bottom:3%;">
                            <div class="titulo font-nexaheavy"
                                style="font-size:1rem;margin-top:2%;float:left;margin-left:2%;padding-left:1% !important;border-left:2px solid #c51152;">
                                Productos seleccionados en carrito de compras</div>
                            <div class="basket-labels" style="text-align:center;">
                                <ul>
                                    <li class="item item-heading">productos</li>
                                    <li class="price">Precio unitario</li>
                                    <li class="quantity">Cantidad</li>
                                    <li class="subtotal">Subtotal</li>
                                </ul>
                            </div>

                            <div class="pedido-products">
                              
                            </div>
                            



                        </div>
                    </div>

                </div>
            </div>

            <div class="row bloque-contacto" style="width:85%;margin:auto;">
                <div class="col-md-12">
                    <div class="col-md-4 section-contacto"
                        style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
                        <div class="font-bold" style="font-size:1.92em;text-align:center;">Chatea con nosotros</div>
                        <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:table-cell;"> Facebook
                            Messenger de Beurer Perú </span>
                    </div>
                    <div class="col-md-4 section-contacto"
                        style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
                        <div class="font-bold" style="font-size:1.92em;text-align:center;">Llámanos</div>
                        <img src="assets/images/icons/telefono.svg" style="width:28%;margin:1.5% 0%;">
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> (+51) 920 198
                            522 </span>

                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> (+51) 978 440
                            034 </span>

                    </div>
                    <div class="col-md-4 section-contacto"
                        style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
                        <div class="font-bold" style="font-size:1.92em;text-align:center;">Escríbenos</div>
                        <img src="assets/images/icons/email.png" style="width:23%;margin:1.5% 0%;">
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> ventas@beurer.pe
                        </span>
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;">
                            ventas1@beurer.pe </span>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--Fin de cuerpo-->
</main>

<?php

include 'src/includes/footer.php'

?>