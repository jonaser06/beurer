<?php
include 'src\includes\header.php'
?>  



<main class="main-detail-products">
	<!--Inicio de cuerpo-->
	
	<div class="formulario" style="text-align:center;" >
	<div style="width:90%;display:inline-block;" align="center"> 
    <h1 style="background-color:#c51152; color:white;font-size:2.3em;font-weight:bold; padding-top:1%;padding-bottom:1%;padding-left:2%;">PANEL DE ADMINISTRACIÓN - CLIENTE BEURER</h1>
	</div>

	
   
<br>
    
        <div class="row cont_datos" id="d_formularios1" align="center" style="display:inline-block;width:90%;text-align:left;">
            <div class="col-md-12" style="color:#161616;border-left:6px solid #c51152;">
            <div class="col-md-1" style="margin-top:1%;text-align:center;">
            <img src="assets/images/user-solid.svg" style="height:3.5vw;margin:1%;padding:0.5%;border-radius:50%;border:5px solid #c51152;"> 
            </div>

            <div class="col-md-11">
                <br>
                <span style="font-size:1.4em;" >HOLA</span>
                <h3 style="margin-top:5px;margin-bottom:10px;font-weight:bold;">Leandro André Ramos Valdéz</h3>
            </div>
            
            </div>            
        </div>

        <div class="row cont_datos" id="d_formularios1"  style="display:inline-block;width:90%;margin-top:1.5%;">
            <div  style="width:27%;float:left;background-color:whitesmoke;color:#161616;margin-right:1.5%;">
                <ul  id="p_users" style="text-align:left;">
                    <li><button id="p_inicio" class="btn btnprimary1 p_user active" ><div class="col-md-10"><h3>Inicio</h3></div><div class="col-md-2"><h3>></h3</div></button></li>    
                    <li><button id="p_datosp" class="btn btnprimary1 p_user" ><div class="col-md-10"><h3>Datos Personales</h3></div><div class="col-md-2"><h3>></h3></div></button></li>
                    <li><button id="p_misord" class="btn btnprimary1 p_user" ><div class="col-md-10"><h3>Mis Pedidos</h3></div><div class="col-md-2"><h3>></h3></div></button></li>
                    <li><button id="p_miscomp" class="btn btnprimary1 p_user" ><div class="col-md-10"><h3>Mis Comprobantes</h3></div><div class="col-md-2"><h3>></h3></div></button></li>
                    <li><button id="p_misdir" class="btn btnprimary1 p_user" ><div class="col-md-10"><h3>Mis Direcciones</h3></div><div class="col-md-2"><h3>></h3></div></button></li>
                    <li><button class="btn btnprimary1 p_user" ><a href="producto.php" ><div class="col-md-10"><h3>Cerrar Sesión</h3></div><div class="col-md-2"><h3>></h3></div></a></button></li>
                    
                </ul>                
            </div>            

            <div id="info_puser" style="text-align:left;width:71%;min-height:25em;float:left;background-color:whitesmoke;padding-left:2%;color:#161616;border:1px solid black;transition: all 0.3s ease-out;">
                <!-- <h2>Bienvenido al Panel de Administración del Cliente BEURER</h2>
                <br>
                
                <div style="width:28%;"class="tituloTabla1">Nombres <div class="d_ob">(*)</div></div>
                                    <input style="width:28%;" type="text" size="20" maxlength="30" name="campo1" id="c_nombres1" onkeypress="return soloLetras(event)" value="" >		
            
                                    <div style="width:28%;" class="tituloTabla1">Apellido Paterno<div class="d_ob">(*)</div></div>
                                    <input style="width:28%;" type="text" size="20" maxlength="20" name="campo1" id="c_apep1" onkeypress="return soloLetras(event)" value="" >		
                
                                
                                <div class="tituloTabla1">Apellido Materno<div class="d_ob">(*)</div></div>
                                <input type="text" size="20" maxlength="20" name="campo1" id="c_apem1" onkeypress="return soloLetras(event)" value="" >	
                            
                                <div class="etiquetaFormulario">Tipo Documento Identidad<div class="d_ob">(*)</div></div>
                    
                                    <select id="s_tipodoc" onchange="selectTipoDoc();">
                                    <option id="di_pn1" value="1" selected >DNI</option>
                                    <option id="di_pn2" value="2">Pasaporte</option>
                                    <option id="di_pn3" value="3"> CE</option>
                                    </select>		
                    
                            
                                    <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" required >
                                
                                
                                 <div class="tituloTabla1">Correo electrónico<div class="d_ob">(*)</div></div> 
                                    <input type="email" id="c_correo1" size="20" maxlength="30" name="campo1"  id="correo"  value="" required >
                            
                                    <div class="etiquetaFormulario">Teléfono<div class="d_ob">(*)</div></div>
                                    <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel" onkeypress="return soloNumeros(event)" value="" > -->

                                    <h2>Bienvenido al Panel de Administración del Cliente BEURER</h2> <br> <h4>En este Panel te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p>
                            
            </div>            
        </div>
    </div>


    <div style="text-align:center !important;"  >
        <div class="checkbox" style="display:inline-block;  border:3px solid #c51152; background-color:whitesmoke; display:none;" id="dp_error">
            <div style="display:inline-block; font-size:1.3em; font-weight:bold; margin: 12px 32px;" id="d_error"> - </div>
        </div>
    </div>


    </div>
    
    </div>
        

    <div class="linea"></div>	

    <br>
	   
	</div>		
  	<!--Fin de cuerpo-->      
    </main>

    <script>


</script>

    <script src="assets/js/registro.js"></script>    


<?php

include 'src\includes\footer.php'

?>    
