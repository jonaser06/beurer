<?php include 'src/includes/header.php' ?>



<input type="hidden" class="dataUser"
    data-id="<?= $session = isset($userData['id_cliente'] ) ? $userData['id_cliente'] : 0;?>">

<main class="main-detail-products">

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
            <span class="step_off active">Envío y Pago</span>

            <span class="step_arrow"></span>
            <span class="step_off noactive">Resumen de Pedido</span>
        </div>
    </div>

    <div class="formulario" style="background-color:transparent;">
        <br>
        <div class="font-nexaheavy"
            style="height:100%;font-size:2.5rem;background-image:url('assets/images/fondo1.png');background-color:white;color:#c51152;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;">
            Información de Pedido </div>
        <br></br>
        <div style="text-align:center;">
            <div class="row paso3" style="text-align:left; margin:auto; width:85%">
                <div class="col-md-6 col-sm-12">
                    <ul
                        style="list-style-image: url('assets/images/check-solid.svg');background-color:white;border-radius:8%; font-size:1.2em;padding:6% 7%;">
                        <li class="font-nexaheavy" style="list-style:none;font-size:1.4em;">INFORMACIÓN DE ENVÍO</li>

                        <div class="dataComprador">

                        </div>
                        
                        <br>

                    </ul>


                    <br>
                </div>
                <div class="col-md-6 col-sm-12" style="background-color:white;border-radius:8%">
                    <div class="resumen-pedido3" style="padding:5% 12%;">
                        <div class="titulo font-nexaheavy" style="text-align:center;color:#c51152">RESUMEN DE TU PEDIDO
                        </div>
                        <br>
                        <div class="d_montos">
                            <table class="table tbl-resumen" style="font-size:1.15em;">
                                <thead class="font-nexaheavy" style="font-size:.9em;">
                                    <tr>
                                        <th style="padding-right:8%;" scope="col">#</th>
                                        <th scope="col">PRODUCTO</th>

                                        <th scope="col " style="text-align:right;">SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody 
                                class = "table-products"
                                style="font-size:0.9em;">
                                
                                    

                                </tbody>
                            </table>
                            <table class="table tbl-resumen" style="font-size:1.15em;">
                           
                            <tbody 
                                style="font-size:0.9em;">
                                <tr>
        
                                    <td ></td>  
                                    <td scope="row"  style=" text-align:left;vertical-align:middle;">SUBTOTAL</td>
                                    
                                    <td class="subtotalr" id="subtotal_pago" style="text-align:right;"></td>
                                    </tr>
                                
                                    <tr>
                                    <td ></td>  
                                    <td scope="row"  style=" text-align:left;vertical-align:middle;">COSTO DEL ENVÍO</td>
                                    
                                    <td class="subtotalr" id="envio_pago" style="text-align:right;"></td>
                                    </tr>
                                
                                    
                                
                                    <tr style="background-color:white;font-weight:bold;color:black;font-size:1.3em;">
                                    <td ></td>  
                                    <td scope="row"  style="padding:3%;vertical-align:middle;">TOTAL A PAGAR</td>
                                    
                                    <td  id="total_pago"class="subtotalr" style="text-align:right;" ></td>
                                    </tr>
                                    

                                </tbody>
                           
      
                                
                            </table>

                            <div class="row" align="CENTER">
                                <div class="col-md-12">
                                    <div style="font-size:1.2em;text-align:right;">Para culminar con su compra, haga
                                        click en el siguiente botón para ingresar los datos de su tarjeta. Todo el
                                        proceso está 100% seguro.</div>
                                    <br>
                                    <div>
                                        <button id="buy" class="btn btn-cmn buy" style="font-size:1.5em">PAGAR</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row" style="width:85%;margin:auto;">
                <div class="col-md-12">
                    <div class="col-md-4 section-contacto"
                        style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
                        <div class="font-bold" style="font-size:1.92em;text-align:center;">Chatea con nosotros</div>
                        <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> Facebook
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
        <!--Fin de cuerpo-->

</main>




<?php include 'src/includes/footer.php'?>



<script src="https://checkout.culqi.com/js/v3"></script>

<script>

    document.addEventListener('DOMContentLoaded', event => {
        Culqi.publicKey ='pk_test_YPmVwqqQhPqlLWqJ';

        const subtotal      = localStorage.getItem('subtotal') ? localStorage.getItem('subtotal') : 0 
        const envio         = localStorage.getItem('costo_envio') ? localStorage.getItem('costo_envio') : 0 
        const cantidad      = localStorage.getItem('cantidad') ? localStorage.getItem('cantidad') : 0 
        
    Culqi.publicKey = 'Aquí inserta tu llave pública';
    Culqi.settings({
        title: 'BEURER',
        currency: 'PEN',
        description: 'Completamos tu pago con toda la seguridad que tú necesitas',
        amount: (parseFloat(subtotal) + parseFloat(envio)).toFixed(2)*100
    });
    $('#buy').on('click', function(e) {
        $('html, body').animate({scrollTop:0}, 'slow');
      
        Culqi.open();
        e.preventDefault();
    });
    })

</script>