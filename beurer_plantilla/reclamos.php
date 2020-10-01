<?php
include 'src\includes\header.php'
?>  

<main class="main-detail-products">
	<!--Inicio de cuerpo-->
	
        
		
        		
			
		<br>
		
	<div class="formulario" style="text-align:center;" >
	
<div class="titulo" style="text-align:center;font-size:4vh;" >LIBRO DE RECLAMACIONES</div>

	<div class="linea"></div>	<br><br>
    
<br>
    
<div class="row cont_datos" align="center" style="display:inline-block;width:83vh;">


    <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
        <div class="tab-button-outer">
            <ul id="tab-button2">
                <li id="icon-description2" class="is-active"><a >DATOS DEL RECLAMANTE</a></li>   </ul>
        </div>
        <div class="content">
            <div   style="display:block;">
                <div  id="emisor" >
                    
            
                    
            
                    <br>
            <div class="divTable" style=" width:100%;display:inline-block;" >
            <div class="divTableBody" style="display:block;">

            <div class="divTableRow" >
                                <div class="divTableCell"><div class="etiquetaFormulario">Tipo Documento Identidad<div class="d_ob">(*)</div></div>
                    
                                    <select id="s_tipodoc" onchange="selectTipoDoc();">
                                    <option id="di_pn1" value="1" selected >DNI</option>
                                    <option id="di_pn2" value="2">Pasaporte</option>
                                    <option id="di_pn3" value="3"> CE</option>
                                    </select>		
                    
                                </div>
                                
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Número Documento Identidad<div class="d_ob">(*)</div></div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" required >
                    
                                </div>
            </div>	
           
            <!-- <div class="divTableRow" >
                    
                    <div class="divTableCell" style="width:99%;">
                    
                        <div class="etiquetaFormulario">Número de Orden<div class="d_ob">(*)</div></div>
                        <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" >
                    
                    </div>
            </div>	 -->


            <div class="divTableRow" id="pn_datos1">
            
                <div class="divTableCell">
                    <div class="tituloTabla1">Nombres <div class="d_ob">(*)</div></div>
                    
                    <input type="text" size="20" maxlength="20" name="campo1" id="c_apep" onkeypress="return soloLetras(event)" value="" >		
                    
                    
                </div>
                
            
            </div>

            <div class="divTableRow" id="pn_datos2">
            
                <div class="divTableCell">
                    <div class="tituloTabla1">Apellido Paterno<div class="d_ob">(*)</div></div>
                    
                    <input type="text" size="20" maxlength="20" name="campo1" id="c_apep" onkeypress="return soloLetras(event)" value="" >		
                    
                </div>
                <div class="divTableCell"><div class="tituloTabla1">Apellido Materno<div class="d_ob">(*)</div></div>
                
                <input type="text" size="20" maxlength="20" name="campo1" id="c_apem" onkeypress="return soloLetras(event)" value="" >	
                
                </div>
            
            </div>

            <div class="divTableRow">
                    <div class="divTableCell">
                       <div class="etiquetaFormulario">Teléfono/Celular</div>
                       <input type="text" size="9" maxlength="9" name="campo1" id="c_telfij" onkeypress="return soloNumeros(event)" value="" >		
                    </div>
                    <div class="divTableCell"> <div class="tituloTabla1">Correo electrónico<div class="d_ob">(*)</div></div> 
                    <input type="text" size="20" maxlength="30" name="campo1" id="campo1" value="" >
                    </div>                                
            </div>

            
                <div class="divTableRow">
                    <div class="divTableCell" style="width:99%;"> <div class="tituloTabla1" style="font-size:12px;font-weight: normal;">En caso no coloque una dirección de correo electrónico no podremos enviarle por dicha vía una copia de la presente hoja de reclamación virtual, de conformidad con el artículo 4-B del Reglamento del Libro de Reclamaciones. No obstante, ello no impedirá que pueda concluir satisfactoriamente el proceso de ingreso de su reclamo o queja</div> 
                    
                    </div>                    
                </div>

                <div class="divTableRow">
                <div class="divTableCell" style="width:32%;"><div class="tituloTabla1">Departamento<div class="d_ob">(*)</div></div>
                                    <select  id="s_depa" onchange="selectDep();">
                                        <option value="1"> Amazonas</option>
                                        <option value="2">Ancash</option>
                                        <option value="3">Apurímac</option>
                                        <option value="4">Arequipa</option>
                                        <option value="5">Ayacucho</option>
                                        <option value="6">Cajamarca</option>
                                        <option value="7">Cusco</option>
                                        <option value="8">Huancavelica</option>
                                        <option value="9">Huánuco</option>
                                        <option value="10">Ica</option>
                                        <option value="11">Junín</option>
                                        <option value="12">La Libertad</option>
                                        <option value="13">Lambayeque</option>
                                        <option value="14" selected >Lima</option>
                                        <option value="15">Loreto</option>
                                        <option value="16">Madre de Dios</option>
                                        <option value="17">Moquegua</option>
                                        <option value="18">Pasco</option>
                                        <option value="19">Piura</option>
                                        <option value="20">Puno</option>
                                        <option value="21">San Martín</option>
                                        <option value="22">Tacna</option>
                                        <option value="23">Tumbes</option>
                                        <option value="24">Ucayali</option>
                                    </select>    
                    </div>

                    <div class="divTableCell" style="width:32%;"><div class="tituloTabla1">Provincia<div class="d_ob">(*)</div></div>
                                    <select id="s_prov" onchange="selectProv();">
                                        <option>-</option>  
                
                                        <option class="d_amaz" >Chachapoyas</option>
                                        <option class="d_amaz">Bagua</option>
                                        <option class="d_amaz">Bongara</option>
                                        <option class="d_amaz">Condorcanqui</option>
                                        <option class="d_amaz">Luya</option>
                                        <option class="d_amaz">Rodríguez de Mendoza</option>
                                        <option class="d_amaz">Utcubamba</option>
                                        
                                        <option class="d_anca">Huaraz</option>
                                        <option class="d_anca">Aija</option>
                                        <option class="d_anca">Antonio Raimondi</option>
                                        <option class="d_anca">Asunción</option>
                                        <option class="d_anca">Bolognesi</option>
                                        <option class="d_anca">Carhuaz</option>
                                        <option class="d_anca">Carlos Fermín Fitzcarrald</option>
                                        <option class="d_anca">Casma</option>
                                        <option class="d_anca">Corongo</option>
                                        <option class="d_anca">Huari</option>
                                        <option class="d_anca">Huarmey</option>
                                        <option class="d_anca">Huaylas</option>
                                        <option class="d_anca">Mariscal Luzuriaga</option>
                                        <option class="d_anca">Ocros</option>
                                        <option class="d_anca">Pallasca</option>
                                        <option class="d_anca">Pomabamba</option>
                                        <option class="d_anca">Recuay</option>
                                        <option class="d_anca">Santa</option>
                                        <option class="d_anca">Sihuas</option>
                                        <option class="d_anca">Yungay</option>

                                        <option class="d_apur">Abancay</option>
                                        <option class="d_apur">Andahuaylas</option>
                                        <option class="d_apur">Antabamba</option>
                                        <option class="d_apur">Aymaraes</option>
                                        <option class="d_apur">Cotabambas</option>
                                        <option class="d_apur">Chincheros</option>
                                        <option class="d_apur">Grau</option>

                                        <option class="d_areq">Arequipa</option>
                                        <option class="d_areq">Camaná</option>
                                        <option class="d_areq">Caravelí</option>
                                        <option class="d_areq">Castilla</option>
                                        <option class="d_areq">Caylloma</option>
                                        <option class="d_areq">Condesuyos</option>
                                        <option class="d_areq">Islay</option>
                                        <option class="d_areq">La Unión</option>

                                        <option class="d_ayac">Huamanga</option>
                                        <option class="d_ayac">Cangallo</option>
                                        <option class="d_ayac">Huanca Sancos</option>
                                        <option class="d_ayac">Huanta</option>
                                        <option class="d_ayac">La Mar</option>
                                        <option class="d_ayac">Lucanas</option>
                                        <option class="d_ayac">Parinacochas</option>
                                        <option class="d_ayac">Páucar del Sara Sara</option>
                                        <option class="d_ayac">Sucre</option>
                                        <option class="d_ayac">Víctor Fajardo</option>
                                        <option class="d_ayac">Vilcahuamán</option>
                                        
                                        <option class="d_caja">Cajamarca</option>
                                        <option class="d_caja">Cajabamba</option>
                                        <option class="d_caja">Celendín</option>
                                        <option class="d_caja">Chota</option>
                                        <option class="d_caja">Contumaza</option>
                                        <option class="d_caja">Cutervo</option>
                                        <option class="d_caja">Hualgayoc</option>
                                        <option class="d_caja">Jaén</option>
                                        <option class="d_caja">San Ignacio</option>
                                        <option class="d_caja">San Marcos</option>
                                        <option class="d_caja">San Miguel</option>
                                        <option class="d_caja">San Pablo</option>
                                        <option class="d_caja">Santa Cruz</option>

                                        <option class="d_cusc">Cuzco</option>
                                        <option class="d_cusc">Acomayo</option>
                                        <option class="d_cusc">Anta</option>
                                        <option class="d_cusc">Calca</option>
                                        <option class="d_cusc">Canas</option>
                                        <option class="d_cusc">Canchis</option>
                                        <option class="d_cusc">Chumbivilcas</option>
                                        <option class="d_cusc">Espinar</option>
                                        <option class="d_cusc">La Convención</option>
                                        <option class="d_cusc">Paruro</option>
                                        <option class="d_cusc">Paucartambo</option>
                                        <option class="d_cusc">Quispicanchi</option>
                                        <option class="d_cusc">Urubamba</option>
                                        
                                        <option class="d_huanc">Huancavelica</option>
                                        <option class="d_huanc">Acobamba</option>
                                        <option class="d_huanc">Angaraes</option>
                                        <option class="d_huanc">Castrovirreyna</option>
                                        <option class="d_huanc">Churcampa</option>
                                        <option class="d_huanc">Huaytará</option>
                                        <option class="d_huanc">Tayacaja</option>

                                        <option class="d_huanu">Huánuco</option>
                                        <option class="d_huanu">Ambo</option>
                                        <option class="d_huanu">Dos de Mayo</option>
                                        <option class="d_huanu">Huacaybamba</option>
                                        <option class="d_huanu">Huamalíes</option>
                                        <option class="d_huanu">Leoncio Prado</option>
                                        <option class="d_huanu">Marañón</option>
                                        <option class="d_huanu">Pachitea</option>
                                        <option class="d_huanu">Puerto Inca</option>
                                        <option class="d_huanu">Lauricocha</option>
                                        <option class="d_huanu">Yarowilca</option>

                                        <option class="d_ica">Ica</option>
                                        <option class="d_ica">Chincha</option>
                                        <option class="d_ica">Nazca</option>
                                        <option class="d_ica">Palpa</option>
                                        <option class="d_ica">Pisco</option>                

                                        <option class="d_juni">Huancayo</option>
                                        <option class="d_juni">Chanchamayo</option>
                                        <option class="d_juni">Chupaca</option>
                                        <option class="d_juni">Concepción</option>
                                        <option class="d_juni">Jauja</option>
                                        <option class="d_juni">Junín</option>
                                        <option class="d_juni">Satipo</option>
                                        <option class="d_juni">Tarma</option>
                                        <option class="d_juni">Yauli</option>

                                        <option class="d_lali">Trujillo</option>
                                        <option class="d_lali">Ascope</option>
                                        <option class="d_lali">Bolívar</option>
                                        <option class="d_lali">Chepén</option>
                                        <option class="d_lali">Gran Chimú</option>
                                        <option class="d_lali">Julcán</option>
                                        <option class="d_lali">Otuzco</option>
                                        <option class="d_lali">Pacasmayo</option>
                                        <option class="d_lali">Pataz</option>
                                        <option class="d_lali">Sánchez Carrión</option>
                                        <option class="d_lali">Santiago de Chuco</option>
                                        <option class="d_lali">Virú</option>
                                        
                                        <option class="d_lamb">Chiclayo</option>
                                        <option class="d_lamb">Ferreñafe</option>
                                        <option class="d_lamb">Lambayeque</option>

                                        <option class="d_lima" selected>Lima</option>
                                        <option class="d_lima">Barranca</option>
                                        <option class="d_lima">Cajatambo</option>
                                        <option class="d_lima">Canta</option>
                                        <option class="d_lima">Cañete</option>
                                        <option class="d_lima">Huaral</option>
                                        <option class="d_lima">Huarochirí</option>
                                        <option class="d_lima">Huaura</option>
                                        <option class="d_lima">Oyón</option>
                                        <option class="d_lima">Yauyos</option>

                                        <option class="d_lore">Maynas</option>
                                        <option class="d_lore">Alto Amazonas</option>
                                        <option class="d_lore">Datem del Marañón</option>
                                        <option class="d_lore">Loreto</option>
                                        <option class="d_lore">Mariscal Ramón Castilla</option>
                                        <option class="d_lore">Putumayo</option>
                                        <option class="d_lore">Requena</option>
                                        <option class="d_lore">Ucayali</option>
                                        
                                        <option class="d_madr">Tambopata</option>
                                        <option class="d_madr">Manu</option>
                                        <option class="d_madr">Tahuamanu</option>

                                        <option class="d_moqu">Mariscal Nieto</option>
                                        <option class="d_moqu">General Sánchez Cerro</option>
                                        <option class="d_moqu">Ilo</option>

                                        <option class="d_pasc">Pasco</option>
                                        <option class="d_pasc">Daniel Alcides Carrión</option>
                                        <option class="d_pasc">Oxapampa</option>

                                        <option class="d_piur">Piura</option>
                                        <option class="d_piur">Ayabaca</option>
                                        <option class="d_piur">Huancabamba</option>
                                        <option class="d_piur">Morropón</option>
                                        <option class="d_piur">Paita</option>
                                        <option class="d_piur">Sechura</option>
                                        <option class="d_piur">Sullana</option>
                                        <option class="d_piur">Talara</option>
                                        

                                        <option class="d_puno">Puno</option>
                                        <option class="d_puno">Azángaro</option>
                                        <option class="d_puno">Carabaya</option>
                                        <option class="d_puno">Chucuito</option>
                                        <option class="d_puno">El Collao</option>
                                        <option class="d_puno">Huancané</option>
                                        <option class="d_puno">Lampa</option>
                                        <option class="d_puno">Melgar</option>
                                        <option class="d_puno">Moho</option>
                                        <option class="d_puno">San Antonio de Putina</option>
                                        <option class="d_puno">San Román</option>
                                        <option class="d_puno">Sandia</option>
                                        <option class="d_puno">Yunguyo</option>

                                        <option class="d_sanm">Moyobamba</option>
                                        <option class="d_sanm">Bellavista</option>
                                        <option class="d_sanm">El Dorado</option>
                                        <option class="d_sanm">Huallaga</option>
                                        <option class="d_sanm">Lamas</option>
                                        <option class="d_sanm">Mariscal Cáceres</option>
                                        <option class="d_sanm">Picota</option>
                                        <option class="d_sanm">Rioja</option>
                                        <option class="d_sanm">San Martín</option>
                                        <option class="d_sanm">Tocache</option>
                                        
                                        <option class="d_tacn">Tacna</option>
                                        <option class="d_tacn">Tarata</option>
                                        <option class="d_tacn">Candarave</option>
                                        <option class="d_tacn">Jorge Basadre</option>

                                        <option class="d_tumb">Tumbes</option>
                                        <option class="d_tumb">Contralmirante Villar</option>
                                        <option class="d_tumb">Zarumilla</option>
                                        
                                        <option class="d_ucay">Coronel Portillo</option>
                                        <option class="d_ucay">Atalaya</option>
                                        <option class="d_ucay">Padre Abad</option>
                                        <option class="d_ucay">Purús</option>
                                        
                                    </select>   
                                </div>
                    <div class="divTableCell" style="width:32%;"><div class="tituloTabla1">Distrito<div class="d_ob">(*)</div></div>
                        <select id="s_dist" >
                            <option  selected >-</option> 
                        </select>
                    </div>
                </div>

                <div class="divTableRow">
                    <div class="divTableCell" style="width:99%;"> <div class="tituloTabla1">Dirección<div class="d_ob">(*)</div></div> 
                    <input type="text" size="20" maxlength="30" name="campo1" id="campo1" value="" >
                    </div>                    
                </div>
<br>
                <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_politicas">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="menor_edad"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; font-weight:bold;"> <span>Soy menor de edad</span></div>
        </div>
        </div>


        <div id="d_menore" class="hidden">
        <div class="divTableRow" id="pn_datos1">
            
                <div class="divTableCell" style="width:99%;">
                    <div class="tituloTabla1">Coloca el nombre de tu padre, madre o apoderado <div class="d_ob">(*)</div></div>
                    
                    <input type="text" size="20" maxlength="20" name="campo1" id="c_apep" onkeypress="return soloLetras(event)" value="" >		
                    
                    
                </div>
                
            
        </div>


        <div class="divTableRow" >
                                <div class="divTableCell"><div class="etiquetaFormulario">Tipo Documento Identidad<div class="d_ob">(*)</div></div>
                    
                                    <select id="s_tipodoc" onchange="selectTipoDoc();">
                                    <option id="di_pn1" value="1" selected >DNI</option>
                                    <option id="di_pn2" value="2">Pasaporte</option>
                                    <option id="di_pn3" value="3"> CE</option>
                                    </select>		
                    
                                </div>
                                
                                <div class="divTableCell">
                                    <div class="etiquetaFormulario">Número Documento Identidad<div class="d_ob">(*)</div></div>
                                    <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" required >
                    
                                </div>
            </div>	
           

            <div class="divTableRow">
                    <div class="divTableCell">
                      <div class="etiquetaFormulario">Teléfono/Celular</div>
                        <input type="text" size="9" maxlength="9" name="campo1" id="c_telfij" onkeypress="return soloNumeros(event)" value="" >		
                      </div>
                    <div class="divTableCell"> <div class="tituloTabla1">Correo electrónico<div class="d_ob">(*)</div></div> 
                    <input type="text" size="20" maxlength="30" name="campo1" id="campo1" value="" >
                    </div>    
                                
            </div>
        </div>

            <!-- <div class="divTableRow" >
                    
                    <div class="divTableCell" style="width:99%;">
                    
                        <div class="etiquetaFormulario">Número de Orden<div class="d_ob">(*)</div></div>
                        <input type="text" size="20" maxlength="20" name="campo1" id="campo1" value="" >
                    
                    </div>
            </div>	 -->

            
                


                
                
                
                
            </div>
            
            </div>
                 </div>

            </div>
            
            
        </div>

            
    </div>
 

</div>

<br>


<div class="row cont_datos" id="d_formularios2" align="center" style="display:inline-block;width:83vh;">
    <div class="tabs2 col-xs-12" style="display:block !important;" id="tab-registro">
        <div class="tab-button-outer">
            <ul id="tab-button2">
                <li id="icon-description2" class="is-active"><a >INFORMACIÓN DEL BIEN CONTRATADO</a></li>     
            </ul>
        </div>
        <div class="content">
            <div id="description2"  style="display:block;">
                <div id="receptor">
                    <br>
                    <div class="divTable" style=" width:100%;display:inline-block;" >
                    <div class="tituloTabla1" style="text-align:center; font-size:medium;">SELECCIONE UN TIPO DE SERVICIO: </div> 
                        <div class="divTableBody" style="display:block;">
                        <div class="divTableRow" id="radios_1">
                        <label>
                        <input type="radio" name="radio">
                        <span>PRODUCTO</span>
                        </label>

                        <label>
                        <input type="radio" name="radio">
                        <span>SERVICIO</span>
                        </label>
                        </div>
                        
                        <div class="divTableRow">
                    <div class="divTableCell" style="width:99%;" colspan="2"> <div class="tituloTabla1">Monto reclamado ( S/. )<div class="d_ob">(*)</div></div> 
                
                    <input type="text" size="4" maxlength="4" name="campo1" id="campo1" onkeypress="return soloNumeros(event)" value="" >
                </div>
                        </div>

                
                
                <div class="divTableRow">
                    <div class="divTableCell" style="width:100%;"><div class="tituloTabla1">Descripción del producto o servicio adquirido<div class="d_ob">(*)</div></div>
                    
                    <textarea class="form-control" style="width:100%;height:8vh;background-color:whitesmoke;"; aria-label="With textarea"></textarea>		
                    
                    </div>
                    
                    
                </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

    <br><br>

    <div class="row cont_datos" id="d_formularios2" align="center" style="display:inline-block;width:83vh;">
    <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
        <div class="tab-button-outer">
            <ul id="tab-button2">
                <li id="icon-description2" class="is-active"><a >DETALLE DE LA QUEJA O RECLAMO</a></li>     
            </ul>
        </div>
        <div class="content">
            <div  style="display:block;">
                <div id="receptor">
                    <br>
                    <div class="divTable" style=" width:100%;display:inline-block;" >
                    <div class="tituloTabla1" style="text-align:center; font-size:medium;">SELECCIONE UN TIPO: </div> 
                        <div class="divTableBody" style="display:block;">
                        <div class="divTableRow" id="radios_1">
                        <label>
                        <input type="radio" name="radio2">
                        <span>QUEJA</span>
                        </label>

                        <label>
                        <input type="radio" name="radio2">
                        <span>RECLAMO</span>
                        </label>
                        </div>
                        
                        <div class="divTableRow">
                    <div class="divTableCell" style="width:99%;" colspan="2"> <div class="tituloTabla1">DESCRIPCIÓN<div class="d_ob">(*)</div></div> 
                
                    <input type="text" size="20" maxlength="30" name="campo1" id="campo1" value="" >
                </div>

                
                
                <div class="divTableRow">
                    <div class="divTableCell" style="width:100%;"><div class="tituloTabla1">PEDIDO<div class="d_ob">(*)</div></div>
                    
                    <textarea class="form-control" style="width:100%;height:21vh;background-color:whitesmoke;"; aria-label="With textarea"></textarea>		
                    
                    </div>
                    
                    
                </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

    
    
    </div>
    
    </div>
        
       <div class="linea"></div>	
    
        <br>
        <br>
    
        <div style="text-align:center">
        <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_politicas">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="terycon"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; font-weight:bold;"> <span>He leído y acepto
                                        los <a href="terminos-y-condiciones" class="span-pol color-primary btn-modals">términos y condiciones</a></span></div>
        </div>
        </div>
        <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_politicas">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="politicas2"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; font-weight:bold;"> <span>Declaro haber leído las
                                         <a href="politicas-de-privacidad" class="span-pol color-primary btn-modals">Políticas de Privacidad</a></span></div>
        </div>
        </div>
        
                        

<span ><a class="btn btn-primary1 disabled" id="env_reclamo" href="" >ENVIAR</a></span>	

<br>

<div class="row cont_datos" id="d_formularios2" align="center" style="display:inline-block;width:83vh;">
    <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
        <div class="content">
            <div   style="display:block;">
                <div id="receptor">
                    <br>
                    <div class="divTable" style=" width:100%;display:inline-block;" >
                    
                        <div class="divTableBody infoReclamo" style="display:block;">
                            <div class="divTableRow" >
                                <div class="divTableCell" style="width:100%;"> <div ><strong>(1) RECLAMO:</strong> Disconformidad relacionada a los productos o servicios.</div> </div>
                            </div>

                            <div class="divTableRow">
                                <div class="divTableCell" style="width:100%;"><div> <strong> (2) QUEJA:</strong> Disconformidad no relacionada a los productos o servicios; o, malestar o descontento respecto a la atención al público</div>  </div>
                            </div> 

                            <div class="divTableRow">
                                <div class="divTableCell" style="width:100%;"><div >La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.</div>  </div>
                            </div> 

                            <div class="divTableRow">
                                <div class="divTableCell" style="width:100%;"><div >En caso no consigne como mínimo su nombre, DNI, domicilio o correo electrónico, reclamo o queja y el detalle del mismo, de conformidad con el artículo 5 del Reglamento del Libro de Reclamaciones, su reclamo o queja se considera como no presentado.</div>  </div>
                            </div> 

                            <div class="divTableRow">
                                <div class="divTableCell" style="width:100%;"><div >El proveedor deberá dar respuesta al reclamo en un plazo no mayor de treinta (30) días calendario, pudiendo ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.</div>  </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>



<!-- <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_politicas">
            
            <div style="display:inline-block; font-size:1.3em; font-weight:bold;"> 
            <span>(1) RECLAMO: Disconformidad relacionada a los productos o servicios.</span>
            <span>(2) QUEJA: Disconformidad no relacionada a los productos o servicios; o, malestar o descontento respecto a la atención al público</span>
            <span>La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.</span>
            <span>En caso no consigne como mínimo su nombre, DNI, domicilio o correo electrónico, reclamo o queja y el detalle del mismo, de conformidad con el artículo 5 del Reglamento del Libro de Reclamaciones, su reclamo o queja se considera como no presentado.</span>
            <span>El proveedor deberá dar respuesta al reclamo en un plazo no mayor de treinta (30) días calendario, pudiendo ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.</span>
            

        </div>
        </div>
        </div> -->
</div>



    <div class="linea"></div>	

    <br>
	   
	</div>		
  	<!--Fin de cuerpo-->      
    </main>

<script src="assets/js/registro.js"></script>    


<?php

include 'src\includes\footer.php'

?>    
