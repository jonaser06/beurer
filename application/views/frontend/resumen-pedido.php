<?php
include 'src\includes\header.php'
?>  

<style>

@media (max-width: 700px)  {
.quantity{
  width:40% !important;
}

.quantity input{
  text-decoration:underline;
}

.rsubtotal{
  width:60% !important;
}



.bloque-contacto{
  width:100% !important;
}
}

</style>


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
          <span class="step_off noactive">Envío y Pago</span>
          
          <span class="step_arrow"></span>
              <span class="step_off active">Resumen de Pedido</span>
          </div>
      </div>	
		
        
    <br>
	<div class="container2 gracias-compra"  style="width:80%;">
    <div  style="height:100%;background-image:url('assets/images/fondo1.png');background-color:white;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;margin-bottom:2%;" >
    <span class="font-nexaheavy" style="font-size:2rem;color:#c51152;"> ¡Gracias por tu compra! </span>
    <p style="font-size:1.2rem;color:#c51152;"> El equipo de beurer.pe </p>
    <hr style="border-color:#c51152;">
    <p class="font-nexaheavy" style="font-size:1.2rem;color:black;"> Recibirás una confirmación a través de tu correo electrónico con el resumen del pedido. </p>
    </div>
    <div style="text-align:center;">
        <div class="row paso3" style="text-align:left; margin:auto; width:85%;background-color:white;border-radius:20px;">
        <div class="col-md-12" style="background-color:white; border-radius:25px;padding:2.5% 3.5%;">
        <div class="titulo" style="height:100%;margin-left:0%;font-weight:normal !important;font-size:1.7rem;border-left:5px solid #c51152; padding-left:1%;font-family: 'nexaheavyuploaded_file';" >INFORMACIÓN DE PEDIDO </div>
                
                </br>
                <ul style="list-style-image: url('assets/images/check-solid.svg'); font-size:1.3em;margin-left:3%;">
                    <li style="font-weight:bold;">Dirección de envio</li>
                    <div style="text-align:left;" >Martin Echevarria </div>
                    <div style="text-align:left;" >Avenida Javier Prado 4525 </div>
                    <div style="text-align:left;" >LIMA LIMA </div>
                    <div style="text-align:left;" >SANTIAGO DE SURCO </div>
                    <div style="text-align:left;" >4360750 </div>
                    <div style="text-align:left;" >leandroandre1538@gmail.com </div>
                    <br>
                    <li style="font-weight:bold;">Referencia</li>
                    <div style="text-align:left;" >Frente a Burger King, auxiliar de Javier Prado. Lo puede recibir Martin Echevarria o Rossana Zevallos. </div>
                    <br>

                    <li style="font-weight:bold;">Fecha de entrega</li>
                    <div style="text-align:left;" >01 de Setiembre de 2020</div>
                </ul>
    
    <br>

    <div class="basket" style="padding:0px;width:100%;" >
      
      <div  style="background-color:white;border-radius:25px;float:left;padding:.5rem 0rem;margin-bottom:3%;">
      <div class="titulo font-nexaheavy" style="font-size:1rem;margin-top:2%;float:left;margin-left:2%;padding-left:1% !important;border-left:2px solid #c51152;" >Productos seleccionados en carrito de compras</div>
      <div class="basket-labels" style="text-align:center;">
        <ul>  
          <li class="item item-heading" >productos</li>
          <li class="price">Precio unitario</li>
          <li class="quantity">Cantidad</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>
      <div class="basket-product" style="text-align:center;">
        <div class="item">          
          <a class="product-image" data-toggle="modal" onclick="modal()" data-target="#exampleModal" >
            <img src="https://beurer.pe/assets/sources/CM50_01.jpg" alt="Placholder Image 2" class="product-frame">
          </a>
          <div class="product-details">
          <span>MASAJEADOR ANTICELULÍTICO CM 50</span>
            <p>SKU: 232321939</p>  
            <p>Envío a domicilio</p>
          </div>
        </div>
        
        <div class="price" id="preuni">
        <div class="info-prod" style="display:block;"> 
            <img src="assets/images/precio-online.png">
            <div class="font-nexaheav text-left price rprice"> 100.00</div>	
        </div>
        <div class="font-nexaheav  " style="font-size:1.1em;text-align:center;font-weight:bold;font-family:'nexa-lightuploaded_file';" >Normal: S/ 25.69</div>
        </div>

        <div class="quantity">
            
            <input class="form-control-field cantidad"  name="pwd" value="1" type="text" id="cantidad_prod"  min="1"  readonly>
            
        </div>
        <div class="subtotal rsubtotal" id="subtotal">26.00</div>
        
        
      </div>

      <div class="basket-product" style="text-align:center;">
        <div class="item">
        <a class="product-image" data-toggle="modal" onclick="modal()" data-target="#exampleModal" >
            <img src="https://beurer.pe/assets/sources/CM50_01.jpg" alt="Placholder Image 2" class="product-frame">
          </a>
          <div class="product-details">
          <span>MASAJEADOR ANTICELULÍTICO CM 50</span>
          <p>SKU: 232321939</p>
            
            <p>Envío a domicilio</p>
            
          </div>
        </div>
        <div class="price" id="preuni">
        <div class="info-prod" style="display:block;"> 
            <img src="assets/images/precio-online.png">
            <div class="font-nexaheav text-left price rprice"> 100.00</div>	
        </div>
                            
                            
         <div class="font-nexaheav  " style="font-size:1.1em;text-align:center;font-weight:bold;font-family:'nexa-lightuploaded_file';" >Normal: S/ 25.69</div>
        </div>
        <div class="quantity">
            
            <input class="form-control-field cantidad"  name="pwd" value="1" type="text" id="cantidad_prod"  min="1"  readonly>
            
        </div>
        <div class="subtotal rsubtotal" id="subtotal">29.00</div>
        
      </div>


      <div class="basket-product" style="text-align:center;">
        <div class="item">
        <a class="product-image" data-toggle="modal" onclick="modal()" data-target="#exampleModal" >
            <img src="https://beurer.pe/assets/sources/CM50_01.jpg" alt="Placholder Image 2" class="product-frame">
          </a>
          <div class="product-details">
          <span>MASAJEADOR ANTICELULÍTICO CM 50</span>
            
            <p>SKU: 232321939</p>
            
            <p>Envío a domicilio</p>
            
          </div>
        </div>
        <div class="price" id="preuni">
        <div class="info-prod" style="display:block;"> 
            <img src="assets/images/precio-online.png">
            <div class="font-nexaheav text-left price rprice"> 100.00</div>	
        </div>
                            
                            
        <div class="font-nexaheav  " style="font-size:1.1em;text-align:center;font-weight:bold;font-family:'nexa-lightuploaded_file';" >Normal: S/ 25.69</div>
        </div>
        <div class="quantity">
        
            <input class="form-control-field cantidad"  name="pwd" value="1" type="text" id="cantidad_prod"  min="1" readonly>
            
        </div>
        <div class="subtotal rsubtotal" id="subtotal">22.00</div>
        
      </div>
      
      </div>
    </div>
	
    </div>
        </div>

        <div class="row bloque-contacto" style="width:85%;margin:auto;">
    <div class="col-md-12">
        <div class="col-md-4 section-contacto" style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
        <div class="font-bold" style="font-size:1.92em;text-align:center;">Chatea con nosotros</div>
        <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:table-cell;"> Facebook Messenger de Beurer Perú </span>
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
	</div>
  	<!--Fin de cuerpo-->      
    </main>
    
    <?php

include 'src\includes\footer.php'

?>  

