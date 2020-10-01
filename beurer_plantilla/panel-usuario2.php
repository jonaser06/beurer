<?php
include 'src\includes\header.php'
?>  

<style>
    
    .p_user h3{
        font-size:1.2em;
    }

    .divTableCell{
        width:33.333%;
    }

    .divTableRow{
        display:flex;
    }

    input{
        font-size:.75em;
        text-align:left;
    }

    @media (min-width: 700px) { 
	#panel-user1{
		display:block !important;
	}
 }

</style>

<main class="main-detail-products">
	<!--Inicio de cuerpo-->
	
	<div class="formulario" style="background-color:transparent;text-align:center;" >
    
        <div class="row cont_datos" id="d_formularios1" align="center" style="background-color:white;display:inline-block;width:90%;text-align:left;margin-bottom:1%;">
            <div class="col-md-12" style="color:#161616;display:flex;">
            
            <img src="assets/images/user-solid.svg" style="width:80px;height:80x;margin:auto 0;padding:0.5%;border-radius:50%;border:5px solid #c51152;"> 
            

            <div style="margin:20px 10px;">
                <span style="font-size:1.3em;font-family:'nexaregularuploaded_file';" >HOLA</span>
                <p style="margin-top:5px;font-size:1.4em;margin-bottom:10px;font-weight:bold;font-family:'nexaregularuploaded_file';">Leandro André Ramos Valdéz</p>
            </div>
            
            </div>            
        </div>

        <div class="row cont_datos" id="d_formularios1"  style="display:inline-block;width:90%;">
            <div  id="panel-user1" style="width:27%;float:left;background-color:white;color:#161616;margin-right:1.5%;">
                <ul  id="p_users" style="text-align:left;background-color:white;">
                    <li><button id="p_inicio" class="btn btnprimary1 p_user active" ><div class="col-md-10 col-sm-10 col-xs-10"><h3>Inicio</h3></div><div class="col-md-2 col-sm-2 col-xs-2"><h3>></h3</div></button></li>    
                    <li><button id="p_datosp" class="btn btnprimary1 p_user" ><div class="col-md-10 col-sm-10 col-xs-10"><h3>Datos Personales</h3></div><div class="col-md-2 col-sm-2 col-xs-2"><h3>></h3></div></button></li>
                    <li><button id="p_misord" class="btn btnprimary1 p_user" ><div class="col-md-10 col-sm-10 col-xs-10"><h3>Mis Pedidos</h3></div><div class="col-md-2 col-sm-2 col-xs-2"><h3>></h3></div></button></li>
                    <li><button id="p_miscomp" class="btn btnprimary1 p_user" ><div class="col-md-10 col-sm-10 col-xs-10"><h3>Mis Comprobantes</h3></div><div class="col-md-2 col-sm-2 col-xs-2"><h3>></h3></div></button></li>
                    <li><button id="p_misdir" class="btn btnprimary1 p_user" ><div class="col-md-10 col-sm-10 col-xs-10"><h3>Mis Direcciones</h3></div><div class="col-md-2 col-sm-2 col-xs-2"><h3>></h3></div></button></li>
                    <li><button class="btn btnprimary1 p_user" ><a href="producto.php" ><div class="col-md-10 col-sm-10 col-xs-10"><h3>Cerrar Sesión</h3></div><div class="col-md-2 col-sm-2 col-xs-2"><h3>></h3></div></a></button></li>
                    
                </ul>                
            </div>            

            <!-- <div id="info_puser" style="text-align:left;width:71%;min-height:25em;float:left;background-color:white;padding:3% 5%;;color:#161616;transition: all 0.3s ease-out;">
                <div class="row" style="margin:0;display:flex;font-size:1.3em;font-weight:bold;"> 
                <div id="back-section-user" style="font-size:1.6em;margin-right:4%;display:none;width:10%;float:left;border-right:2px solid whitesmoke;">
                <p> < </p>
                </div>
                
                <div id="title-info-user" style="width:90%;float:left;margin:auto 0px;" ><p>Bienvenido al Panel de Administración del Cliente BEURER</p> </div> 
                </div>
                <div id="cont-info-user">
                <h4>En este Panel te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p></div>
                            
            </div>             -->

            <div id="info_puser" style="text-align:left;width:71%;min-height:25em;float:left;background-color:white;padding:3% 5%;;color:#161616;transition: all 0.3s ease-out;">
                <div class="row" style="margin:0;display:flex;font-size:1.3em;font-weight:bold;"> 
                <div id="back-section-user" style="font-size:1.6em;margin-right:4%;display:none;width:10%;float:left;border-right:2px solid whitesmoke;">
                <p> < </p>
                </div>
                
                <div id="title-info-user" style="width:90%;float:left;margin:auto 0px;" ><p>Datos Personales</p> </div> 
                </div>
                <div id="cont-info-user">
                
                <div class="divTable" style=" width:100%;display:inline-block;" >
                        <div class="divTableBody" style="display:block;">
                        <div class="divTableRow" id="pn_datos1">
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Nombres </div>
                                    <input type="text" size="20" maxlength="30" name="campo1" id="c_nombres1" onkeypress="return soloLetras(event)" value="" >		
                    
                                </div>

                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Apellidos</div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="c_apep1" onkeypress="return soloLetras(event)" value="" >		
                    
                                </div>

                                <div class="divTableCell"> <div class="etiquetaFormulario">Correo electrónico</div> 
                                    <input type="email" id="c_correo1" size="20" maxlength="30" name="campo1"  id="correo"  disabled="true" value="leandroandre1538@gmail.com" readonly  style="border:0 none;">
                                </div>

                            </div>    
                        <div class="divTableRow" >
                                <div class="divTableCell"><div class="etiquetaFormulario">Tipo Documento Identidad</div>
                    
                                    <select id="s_tipodoc" onchange="selectTipoDoc();">
                                    <option id="di_pn1" value="1" selected >DNI</option>
                                    <option id="di_pn2" value="2">Pasaporte</option>
                                    <option id="di_pn3" value="3"> CE</option>
                                    </select>		
                    
                                </div>
                                
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Número Documento Identidad</div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" required >
                    
                                </div>

                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Teléfono celular</div>
                                    <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel" onkeypress="return soloNumeros(event)" value="" >
                                </div>
                                
                            </div>	
                        </div>
                </div>  
                <br> <br>
                <div  style="width:90%;float:left;margin:auto 0px;font-weight:bold;font-size:1.3em" ><p>Conoce lo último de Beurer.pe</p> </div>
                <br> <br>
                <div style="text-align:left !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_politicas">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="politicas"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.18em; color:black; "> <span>He leído y acepto las <a href="politicas-de-privacidad" class="span-pol color-primary btn-modals">Políticas de Privacidad</a>.</span></div>
        </div>
        </div>

        <div style="text-align:left !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_publicidad">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="publicidad"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.18em; color:black;"> <span>Deseo recibir ofertas y novedades de Beurer en mi e-mail.</span></div>
        </div>
        </div>

                </div>
                            
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
