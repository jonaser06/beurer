<?php

    include 'src\includes\header.php'
?>

<main class="main-detail-products"  >
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
              <img src="assets/images/steps/paso1.png" ></span>
              
              
              <span class="step_off1"><img src="assets/images/steps/paso2.png" ></span>
      
              
          <span class="step_off1"><img src="assets/images/steps/paso3.png" ></span>
          
          
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
        <div class="font-nexaheavy" style="height:100%;font-size:2.5rem;background-image:url('assets/images/fondo1.png');background-color:white;color:#c51152;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;" >Información de Pedido </div>
        <br></br>
        <div style="text-align:center;">
        <div class="row paso3" style="text-align:left; margin:auto; width:85%">
        <div class="col-md-6 col-sm-12">
            <ul style="list-style-image: url('assets/images/check-solid.svg');background-color:white;border-radius:8%; font-size:1.2em;padding:6% 7%;">     
                <li class="font-nexaheavy"   style="list-style:none;font-size:1.4em;">INFORMACIÓN DE ENVÍO</li>    
                <div>LIMA LIMA </div>
                <div>SANTIAGO DE SURCO </div>
                <div> Av. Caminos del Inca Nº 257 Tienda Nº 149 Santiago de Surco - Lima </div>
                <div>Volumen total de la carga: 126 m3 </div>
                <div>Peso total de la carga: 50 kg </div>
                <!-- <div style="font-weight:bold;">Importe por envío: S/ 26. 00 </div> -->
                <br><br>

                <li class="font-nexaheavy" style="list-style:none;font-size:1.2em;">COMPRA A NOMBRE DE </li>
                <div>DNI: 72812417 </div>
                <div>Leandro André Ramos Valdéz </div>   
                <br> <br>

                <li class="font-nexaheavy" style="list-style:none;font-size:1.2em;">RESUMEN DEL PEDIDO</li>
                <div>Cantidad de productos: 8 </div>
                <div>Importe Sub Total: S/ 234. 00 </div>   
                <br>
                
            </ul>

    <br>
     </div>
        <div class="col-md-6 col-sm-12" style="background-color:white;border-radius:8%">
        <div  class="resumen-pedido3" style="padding:5% 12%;">
    <div class="titulo font-nexaheavy" style="text-align:center;color:#c51152" >RESUMEN DE TU PEDIDO</div>
    <br>
    <div class="d_montos">
    <table class="table tbl-resumen" style="font-size:1.15em;">
  <thead class="font-nexaheavy" style="font-size:.9em;">
    <tr >
      <th style="padding-right:8%;" scope="col">#</th>
      <th scope="col">PRODUCTO</th>
      
      <th scope="col " style="text-align:right;">SUBTOTAL</th>
    </tr>
  </thead>
  <tbody style="font-size:0.9em;">
    <tr>
      <td scope="row">1</td>
      <td style="text-align:left;">Masajeador Anticelulítico CM 50</td>
      
      <td class="subtotalr" style="text-align:right;" id="subtotal" >26.00</td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td style="text-align:left;">Cepillo Facial FS 50</td>
      
      <td class="subtotalr" style="text-align:right;">104.00</td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td style="text-align:left;">Oxímetro XNS 20</td>
      <td class="subtotalr" style="text-align:right;">104.00</td>
    </tr>
    
    <tr>
    <td ></td>  
    <td scope="row"  style=" text-align:left;vertical-align:middle;">SUBTOTAL</td>
      
      <td class="subtotalr" id="total" style="text-align:right;">600.00</td>
    </tr>

    <tr>
    <td ></td>  
    <td scope="row"  style=" text-align:left;vertical-align:middle;">COSTO DEL ENVÍO</td>
      
      <td class="subtotalr" id="total" style="text-align:right;">15.00</td>
    </tr>

    

    <tr style="background-color:white;font-weight:bold;color:black;font-size:1.3em;">
    <td ></td>  
    <td scope="row"  style="padding:3%;vertical-align:middle;">TOTAL A PAGAR</td>
      
      <td class="subtotalr" style="text-align:right;" >615.00</td>
    </tr>
  
  </tbody>
</table>

<div class="row" align="CENTER" >
            <div class="col-md-12">
                <div style="font-size:1.2em;text-align:right;" >Para culminar con su compra, haga click en el siguiente botón para ingresar los datos de su tarjeta. Todo el proceso está 100% seguro.</div>
                <br>
                <div >
                <button class="btn btn-cmn buy" style="font-size:1.5em">PAGAR</button>
                </div>            
            </div>
        </div>

    </div>
</div>
        </div>
    
    </div>
    <div class="row" style="width:85%;margin:auto;">
    <div class="col-md-12">
        <div class="col-md-4 section-contacto" style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
        <div class="font-bold" style="font-size:1.92em;text-align:center;">Chatea con nosotros</div>
        <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> Facebook Messenger de Beurer Perú </span>
    </div>
        <div class="col-md-4 section-contacto" style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
        <div class="font-bold" style="font-size:1.92em;text-align:center;">Llámanos</div>
        <img src="assets/images/icons/telefono.svg" style="width:28%;margin:1.5% 0%;">
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> (+51) 920 198 522 </span>
        
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> (+51) 978 440 034 </span>

    </div>
        <div class="col-md-4 section-contacto" style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
        <div class="font-bold" style="font-size:1.92em;text-align:center;">Escríbenos</div>
        <img src="assets/images/icons/email.png" style="width:23%;margin:1.5% 0%;">
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> ventas@beurer.pe </span>
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> ventas1@beurer.pe </span>
    </div>
    </div>
    </div>		
        </div>
  	<!--Fin de cuerpo-->      
    </main>




    
    <div class="wrapper-footer">
        <footer class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-1-5 visible-lg">
                        <h2 class="titles-footer">Productos</h2>
                        <ul>
                            <li><a href="#" class="link-footer">Salud</a></li>
                            <li><a href="#" class="link-footer">Bienestar</a></li>
                            <li><a href="#" class="link-footer">Belleza</a></li>
                            <li><a href="#" class="link-footer">Actividad</a></li>
                            <li><a href="#" class="link-footer">Línea de bebé</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-1-5 visible-lg">
                        <h2 class="titles-footer">ayuda al cliente</h2>
                        <ul>
                            <li><a href="#" class="link-footer">FAQ</a></li>
                            <!-- <li><a href="instrucciones-de-uso" class="link-footer">Instrucciones de uso</a></li> -->
                            <li><a href="#" class="link-footer">Centro de descargas</a></li>
                            <li><a href="#" class="link-footer">Términos y condiciones</a></li>
                            <li><a href="#" class="link-footer">Políticas y privacidad</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-1-5 visible-lg">
                        <h2 class="titles-footer"><a href="nosotros">quiénes somos</a></h2>
                        <h2 class="titles-footer"><a href="contactanos">contacto</a></h2>
                        
                    </div>
                    <div class="col-sm-5 col-md-6 col-1-5 phons-f">
                        <!-- <h2 class="phones-footer"><a href="#"><i class="icon-f icon-phone"></i> (01) 978 440 034</a></h2 class="phones-footer"> -->

                    <h2 class="phones-footer"><a href="tel:(01) 978 440 034"><i class="icon-f icon-phone"></i>  (01) 978 440 034</a></h2>
                    <h2 class="phones-footer"><a href="tel:(01) 255 3738"><i class="icon-f icon-phone"></i>  (01) 255 3738</a></h2>
                                
                        
                        <!-- EMAIL -->
                        <a href="mailto:ventas@beurer.pe" class="link-footer d-block"><i class="icon-f icon-sobre"></i>  ventas@beurer.pe</a>
                                                
                        <!-- DIRECCIÓN -->
                        <a href="#" class="link-footer d-block"><i class="icon-f icon-ubc"></i>  Av. Caminos del Inca Nº 257 Tienda Nº 149 Santiago de Surco - Lima</a>
                                                
                        <div class="rs-f hidden-md hidden-lg">
                            <a href="https://www.facebook.com/beurerperu/" target="_blank" class="icon-rs-f icon-facebook"></a>
                            <a href="https://instagram.com/beurerperu?igshid=vnrvppz3nm6f" target="_blank" class="icon-rs-f icon-instagram"></a>
                            <a href="https://www.youtube.com/channel/UCORqBGCGe3NOrllUAal4COg" target="_blank" class="icon-rs-f icon-youtube"></a>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-6 col-1-6 wrapper-susc">
                        <h2 class="titles-footer hidden-xs hidden-sm">suscríbete</h2>
                        <p class="link-footer hidden-xs">Recibe actualizaciones por correo eléctronico sobre nuestra tienda y ofertas especiales.</p>
                        <p class="link-footer link-f-mob visible-xs">Recibe nuestras ofertas especiales.</p>
                        <form id="subscribe" method="POST" action="subscribe/send" title="Suscrito con exito" data-placement="top">
                            <div class="content-btn-susc">
                                <input type="email" name="subscribe" class="input-susc">
                                <button type="submit" class="btn-susc">SUSCRÍBETE</button>
                            </div>
                            <div class="col-xs-12 px-0">
                                <div class="checkbox">
                                    <label class="font-light label-pol">
                                        <input type="checkbox"  required /><i class="helper"></i><span>He leído y acepto
                                            las <a href="politicas-de-privacidad" class="span-pol color-primary btn-modals">Políticas de Privacidad</a></span>
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
                            <a href="#" target="_blank">EXE</a>
                        </p>
                        <p class="oculMob hidden-xs">
                            <a href="#" class="text-f text-credits" target="_blank">HTML </a> • 
                            <a href="#" class="text-f text-credits" target="_blank">CSS</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>



	
<script src="assets/js/app.js"></script>
<script src="assets/js/app2.js"></script>
<script src="assets/js/culqi.json"></script>
<script src="assets/js/libraries/animate-it.js"></script>
<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script-->
<script src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<!-- <style>

@media only screen and (max-width: 425px){
.checkout {
    top:25em !important;
    height: auto !important;
}
}

</style> -->
<script>
    // Configura tu llave pública
    Culqi.publicKey = 'Aquí inserta tu llave pública';
    // Configura tu Culqi Checkout
    Culqi.settings({
        title: 'BEURER',
        currency: 'PEN',
        description: 'Completamos tu pago con toda la seguridad que tú necesitas',
        amount: 216070
    });
    // Usa la funcion Culqi.open() en el evento que desees
    $('.buy').on('click', function(e) {
        $('html, body').animate({scrollTop:0}, 'slow');
        // Abre el formulario con las opciones de Culqi.settings
        Culqi.open();
        e.preventDefault();
    });
</script>	
</body>

</html>
