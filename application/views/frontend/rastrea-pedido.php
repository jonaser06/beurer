<?php
include 'src\includes\header.php'
?>

<style>
#checkout_crumb:after, #checkout_crumb_four:after{
    background-color:transparent !important;
}

#progress-bar-container #line{
    top:99px !important;
    z-index:0 !important;
}

.step{
    font-size:.8rem !important;
    font-weight:bold;
}
</style><main class="main-detail-products">
        <div class="container2 dv-segui" style="width:80%;" >
        <div  id="div_buscarp1" style="height:100%;background-image:url('assets/images/fondo1.png');background-color:white;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;margin-bottom:2%;" >
    <span class="font-nexaheavy" style="font-size:2rem;color:#c51152;"> Seguimiento de Compra </span>
    <hr style="border-color:#c51152;">
    <ul style="list-style-image: url('assets/images/check-solid.svg'); font-size:1.3em;margin-left:5%;">
    <li class="font-nexaheavy" style="font-size:1rem;color:black;"> Conoce el estado de tu pedido en tiempo real </li>
    <li class="font-nexaheavy" style="font-size:1rem;color:black;"> Ingresa tu número de DNI o Número de pedido </li>
    </ul>    
    <br>
    <div style="text-align:center;">
                    <input type="text" id="cod_seg" maxlength="12"  placeholder="Ingresa el Número del Pedido" style="text-align:center;width:50%;"> 
                </div>
    </div>
    <div class="row">
            <div class="col-md-12 " id="div_buscarp" style="align-self:center;">
                <div style="text-align:center;">
                     <button class="btn btn-cmn" id="btn_seg">Buscar</button>
                </div>
                <hr>
            </div>

            <div class="col-md-12 " style="align-self:center;display:none;" id="div_seg">
                
            
            <div  id="result_seg1" style="height:100%;background-image:url('assets/images/fondo1.png');background-color:white;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;margin-bottom:2%;" >
                <span class="font-nexaheavy" style="font-weight:bold;font-size:2rem;color:#c51152;"> Información de Pedido </span>
                <hr style="border-color:#c51152;">
                <div style="font-weight:bold;text-align:center;" ><p style="font-size:1.5em;font-family:'nexa-bolduploaded_file';"> Numero de Pedido:</p><p style="font-family:'nexa-lightuploaded_file';font-weight:normal;font-size:1.4em;">101429929</p> </div>
                <div style="font-weight:bold;text-align:center;" ><p style="font-size:1.5em;font-family:'nexa-bolduploaded_file';"> Numero de Pedido:</p><p style="font-family:'nexa-lightuploaded_file';font-weight:normal;font-size:1.4em;"> 01 de Setiembre de 2020</p></div>
            </div>
            
            
            
<div id="result_seg2" class="process-wrapper" style="background-color:white;border-radius:8%;">
<div id="progress-bar-container">
    
<div id="checkout_crumb">
          
          <div class="crumb" style="margin: auto;
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
                
          <div class="crumb" style="max-width: 1100px;
          margin: auto;
          display: flex;
          flex-wrap: nowrap;
          justify-content: space-between;">
              <span class="step step01 step_on active">
               Orden Generada</span>
              
              <span class="step_arrow"></span>
              <span class="step step02 step_off ">Preparando Pedido</span>
      
              <span class="step_arrow"></span>
          <span class="step step03 step_off ">Listo para recojo</span>
          
          <span class="step_arrow"></span>
              <span class="step step04 step_off ">Pedido entregado</span>
          </div>
      </div>	

	
	<div id="line">
		<div id="line-progress"></div>
	</div>
</div>

<div id="progress-content-section" style="margin-top:8.5em;color:black; background-color:white;width:85%;padding:1.5%;">
	<div class="section-content discovery active">
		
		<div align="center">
                <h1 style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">Orden Generada</h1>
                
                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;" >Estado:<p style="font-weight:normal;">Completado</p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Descripción:<p style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido culminando con el pago. </p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Fecha: <p style="font-weight:normal;"> 01 de Setiembre de 2020</p></div>

                </div>
	</div>
	
	<div class="section-content strategy">
    <div align="center">
                <h1 style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">Preparando Pedido</h1>
                
                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;" >Estado:<p style="font-weight:normal;">Completado</p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Descripción:<p style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido culminando con el pago. </p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Fecha: <p style="font-weight:normal;"> 01 de Setiembre de 2020</p></div>

                </div>
	</div>
	
	<div class="section-content creative">
    <div align="center">
                <h1 style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">Listo para recojo</h1>
                
                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;" >Estado:<p style="font-weight:normal;">Completado</p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Descripción:<p style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido culminando con el pago. </p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Fecha: <p style="font-weight:normal;"> 01 de Setiembre de 2020</p></div>

                </div>
	</div>
	
	<div class="section-content production">
    <div align="center">
                <h1 style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">Pedido entregado</h1>
                
                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;" >Estado:<p style="font-weight:normal;">Completado</p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Descripción:<p style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido culminando con el pago. </p> </div>
                <div style="font-size:1.3em;font-weight:bold;" >Fecha: <p style="font-weight:normal;"> 01 de Setiembre de 2020</p></div>

                </div>
	</div>
	
	</div>
</div>

<br>
<div style="text-align:center;">
                <span ><a class="btn btn-cmn" style="font-size:1.2em;padding:1% 8%;" href="#" id="btn_nb" >REALIZAR NUEVA BÚSQUEDA</a></span>		
            </div>




                <hr>
            
            </div>
            

            <div class="row" style="width:85%;margin:auto;">
    <div class="col-md-12">
        <div class="col-md-4 section-contacto" style="text-align:center;background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
        <div class="font-bold" style="font-size:1.92em;">Chatea con nosotros</div>
        <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:table-cell;"> Facebook Messenger de Beurer Perú </span>
    </div>
        <div class="col-md-4 section-contacto" style="text-align:center; background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
        <div class="font-bold" style="font-size:1.92em;">Llámanos</div>
        <img src="assets/images/icons/telefono.svg" style="width:28%;margin:1.5% 0%;">
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> (+51) 920 198 522 </span>
        
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> (+51) 978 440 034 </span>

    </div>
        <div class="col-md-4 section-contacto" style="text-align:center; background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
        <div class="font-bold" style="font-size:1.92em;">Escríbenos</div>
        <img src="assets/images/icons/email.png" style="width:23%;margin:1.5% 0%;">
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> ventas@beurer.pe </span>
        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> ventas1@beurer.pe </span>
    </div>
    </div>
    </div>		


        </div>
    </div>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 <script>
    
    $(".step").click( function() {
	$(this).addClass("active").prevAll().addClass("active");
	$(this).nextAll().removeClass("active");
});

$(".step01").click( function() {
	$("#line-progress").css("width", "1%");
	$(".discovery").addClass("active").siblings().removeClass("active");
});

$(".step02").click( function() {
	$("#line-progress").css("width", "33.33%");
	$(".strategy").addClass("active").siblings().removeClass("active");
});

$(".step03").click( function() {
	$("#line-progress").css("width", "66.66%");
	$(".creative").addClass("active").siblings().removeClass("active");
});

$(".step04").click( function() {
	$("#line-progress").css("width", "100%");
	$(".production").addClass("active").siblings().removeClass("active");
});


</script>
<?php

include 'src\includes\footer.php'

?>


