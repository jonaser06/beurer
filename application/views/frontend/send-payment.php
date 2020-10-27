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
                        style="list-style-image: url(<?= base_url('beurer_plantilla/assets/images/check-solid.svg')?>);background-color:white;border-radius:8%; font-size:1.2em;padding:6% 7%;">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

<script>
        Culqi.publicKey ='pk_test_9rNJzJYDhq1KxhH4';

</script>

<script>


        const session       = parseInt(document.querySelector('.dataUser').dataset.id);
        const productos     = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) :[]
        const subtotal      = localStorage.getItem('subtotal') ? localStorage.getItem('subtotal') : 0 
        const envio         = localStorage.getItem('costo_envio') ? localStorage.getItem('costo_envio') : 0 
        const cantidad      = localStorage.getItem('cantidad') ? localStorage.getItem('cantidad') : 0 
        
        const user          = localStorage.getItem('domicilio')  ? JSON.parse(localStorage.getItem('Comprador')): JSON.parse(localStorage.getItem('Destinatario'))
        const total         = (parseFloat(subtotal) + parseFloat(envio)).toFixed(2)*100
        

        // FORMULARIO SETTINGS CULQI DEFAULT 
        Culqi.settings({
            title: 'BEURER',
            currency: 'PEN',
            description: 'Completamos tu pago con toda la seguridad que tú necesitas',
            amount: total
        });
        document.getElementById('buy').addEventListener('click', event => {
            Culqi.open();
            $('html, body').animate({scrollTop:0}, 'slow');
            event.preventDefault();
            

        })
        $('html, body').animate({scrollTop:0}, 'slow');

        function converter () {
            let id_products = [] , cant_products = [] , subtotal_products=[]
            productos.forEach(prod => {
                id_products.push(prod.id);
                cant_products.push(prod.cantidad);
                subtotal_products.push(prod.subtotal);
            })
            return {
                id_products   : id_products.join('-'),
                cant_products : cant_products.join('-'),
                subtotal_products : subtotal_products.join('-')
            }
        }
        function dataFormPurchase ( charge ) {
            const formData = new FormData();
            formData.append('nombres' ,charge.nombres );
            formData.append('apellidos' , charge.apellidos );
            formData.append('correo' , charge.correo );
            formData.append('tipo_documento' , charge.tipo_documento);
            formData.append('numero_documento' , charge.number_documento);
            formData.append('provincia' , 'Lima');
            formData.append('distrito' , charge.distrito);
            formData.append('telefono' , charge.telefono);
            formData.append('dir_envio' , charge.d_envio);
            formData.append('referencia' , charge.referencia);
            formData.append('entrega_precio' ,charge.envio );
            formData.append('productos_precio' ,charge.subtotal );
            formData.append('id_cliente' ,charge.session);

            formData.append('id_productos' , charge.id_productos);
            formData.append('cantidades' , charge.cantidades);
            formData.append('subtotales' , charge.subtotales);
            
            
            return formData;
        }
        function dataFormSend (token,email) {
           
            
            const formData = new FormData();
            formData.append('token' , token );
            formData.append('correo' , email );
            formData.append('id_session' , session );
            formData.append('nombres' , `${user.nombres}`);
            formData.append('apellidos' , `${user.apellido_paterno} ${user.apellido_materno}`);
            formData.append('telefono' , user.telefono );
            formData.append('distrito' , `${user.distrito} ${user.provincia}`);
            formData.append('d_envio' , user.d_envio);
            formData.append('referencia' , user.referencia);
            formData.append('tipo_documento' , user.tipo_doc);
            formData.append('numero_documento' ,user.number_doc );

            formData.append('id_productos' , JSON.stringify( converter().id_products ));
            formData.append('cantidades' , JSON.stringify( converter().cant_products));
            formData.append('subtotales' , JSON.stringify( converter().subtotal_products));

            formData.append('cantidad_total' , cantidad );
            formData.append('subtotal_coste' , subtotal );
            formData.append('envio_coste' , envio );
            formData.append('total_coste' , total );
            
            return formData;
        }
        function modalCheckout (title , icon ,message , color) {
            Swal.fire({
            icon: icon ,
            title: title,
            text: message ,
           
})
            
        }
        function culqi() {

        
        if (Culqi.token) { 
             const token  = Culqi.token.id;
             const email = Culqi.token.email;
             const formSend   = dataFormSend(token,email)

            ObjMain.ajax_post( 'POST', `${DOMAIN}ajax/createCharge`, formSend)
                    .then( resp => {
                        resp = JSON.parse(resp);
                        resp = JSON.parse(resp)
                        if(resp.object == 'charge') {
                            
                            const {...charge } = resp;  
                            if(charge.outcome.type == "venta_exitosa" ) { 
                                // tomamos los metadatos de el cargo y se hace un Request a controller Finalizar Sales
                                const { metadata } = charge ;
                                
                                const formCharge = dataFormPurchase(metadata);
                                ObjMain.ajax_post( 'POST', `${DOMAIN}ajax/purchase`, formCharge)
                                .then( resp => {})
                                .catch();

                                modalCheckout('Gracias por su compra' ,'success',`${charge.outcome.user_message}`,'#C5115')
                            }
                        }else{
                            modalCheckout( 'Error' ,'error',`${resp.user_message}`,'#C5115')
                        }
                    })
                    .catch( err =>{
                       console.log(err)
                        
                    });
        } else { 
            console.log(Culqi.error);
            alert(Culqi.error.user_message);
        }
        };

        
        
         
  

    

</script>