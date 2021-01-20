<?php include 'src/includes/header.php' ?>

<?= $session = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente']: false ;?>
<input
    type="hidden" 
    class="dataUser"
    data-id = "<?php echo isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente']: false ;?>"
    data-tipo_doc =<?=$session?  $userData['tipo_documento']:''?>
    data-number_doc =<?= $userData ? $userData['documento'] : '' ?>
    data-nombres =<?= $userData ? $userData['nombre'] : '' ?>
    data-apellido_paterno ="<?= $userData ? $userData['apellido_paterno'] : '' ?>"
    data-apellido_materno ="<?= $userData ? $userData['apellido_materno'] : '' ?>"
    data-correo ="<?= $userData ? $userData['correo'] : '' ?>"
    data-d_envio    ="<?= $session? $userData['direccion'] :'' ?>"
    data-departamento    ="<?= $session? $userData['departamento'] :'' ?>"
    data-provincia    ="<?= $session? $userData['provincia'] :'' ?>"
    data-distrito    ="<?= $session? $userData['distrito'] :'' ?>"
    data-referencia    ="<?= $session? $userData['referencia'] :'' ?>"
    data-telefono    ="<?= $session? $userData['telefono'] :'' ?>"
    >







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
            <span class="step_off active">Datos y Facturación</span>

            <span class="step_arrow"></span>
            <span class="step_off noactive">Envío y Pago</span>

            <span class="step_arrow"></span>
            <span class="step_off noactive">Resumen de Pedido</span>
        </div>
    </div>

    <br>


    <div class="font-nexaheavy"
        style="height:100%;font-size:2.5rem;background-size:cover;background-image:url(<?=base_url('assets/images/fondo2.jpg')?>);background-color:white;color:#fff;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;">
        Registrarse para completar la compra </div>

    <br>

    <div class="formulario"
        style="text-align:center;padding-top:10px;max-width: 920px; border-radius: 8%; margin: auto;">

        <br>

        <br>

        <div class="row cont_datos" id="d_formularios1" align="center" style="display:inline-block;width:46em;">
            <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
                <div class="tab-button-outer">
                    <ul id="tab-button2">
                        <li id="icon-description2" class="is-active"><a>DATOS DEL COMPRADOR</a></li>
                    </ul>
                </div>
                <div class="content">
                    <div id="description" style="display:block;">
                        <div id="emisor">
                            <br>
                            <div class="divTable" style=" width:100%;display:inline-block;">
                                <div class="divTableBody" style="display:block;">
                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Tipo Documento Identidad:<div
                                                    class="d_ob">*</div>
                                            </div>

                                            <select id="s_tipodoc">
                                                <option id="di_pn1" value="DNI" selected>DNI</option>
                                                <option id="di_pn2" value="PASAPORTE">Pasaporte</option>
                                                <option id="di_pn3" value="CE"> CE</option>
                                            </select>

                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Número Documento Identidad: <div
                                                    class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20"  onkeypress="return soloNumeros(event)" name="campo1" id="campo1" 
                                                value="<?= $userData ? $userData['documento'] : '' ?> "
                                                required
                                            >

                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos1">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Nombres: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="30" name="campo1" id="c_nombres1"
                                                onkeypress="return soloLetras(event)" value="<?= $userData ? $userData['nombre'] : '' ?>">

                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellidos <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" name="campo1" id="c_apellidos"
                                                onkeypress="return soloLetras(event)" value="<?= $userData ? $userData['apellido_paterno'].' '.$userData['apellido_materno']: '' ?>">

                                        </div>
                                    </div>


                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Correo electrónico: <div class="d_ob">*
                                                </div>
                                            </div>
                                            <input type="email" id="c_correo1" size="20" maxlength="30" name="campo1"
                                                id="correo" value="<?= $userData ? $userData['correo'] : '' ?>" required>
                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Departamento: <div class="d_ob">*</div>
                                            </div>
                                            <select disabled id="s_depa">
                                                <option disabled data-name="Lima" selected>Lima</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Provincia: <div class="d_ob">*</div>
                                            </div>
                                            <select disabled id="sprov">
                                                <option data-name="Lima"disabled selected>Lima</option>
                                            </select>
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Distrito: <div class="d_ob">*</div>
                                            </div>
                                            <select id="sdist">
                                                <option selected="selected">SELECCIONE DISTRITO</option>   
                                                <option id="dist-01" value="01" data-name="Lima">Lima</option>   
                                                <option id="dist-02" value="02" data-name="Ancón">Ancón</option>
                                                <option id="dist-03" value="03" data-name="Ate">Ate</option>
                                                <option id="dist-04" value="04" data-name="Barranco">Barranco</option>
                                                <option id="dist-05" value="05" data-name="Breña">Breña</option>
                                                <option id="dist-06" value="06" data-name="Carabayllo">Carabayllo</option>
                                                <option id="dist-07" value="07" data-name="Chaclacayo">Chaclacayo</option>
                                                <option id="dist-08" value="08" data-name="Chorrillos">Chorrillos</option>
                                                <option id="dist-09" value="09" data-name="Cieneguilla">Cieneguilla</option>
                                                <option id="dist-10" value="10" data-name="Comas">Comas</option>
                                                <option id="dist-11" value="11" data-name="El Agustino">El Agustino</option>
                                                <option id="dist-12" value="12" data-name="Independencia">Independencia</option>
                                                <option id="dist-13" value="13" data-name="Jesús María">Jesús María</option>
                                                <option id="dist-14" value="14" data-name="La Molina">La Molina</option>
                                                <option id="dist-15" value="15" data-name="La Victoria">La Victoria</option>
                                                <option id="dist-16" value="16" data-name="Lince">Lince</option>
                                                <option id="dist-17" value="17" data-name="Los Olivos">Los Olivos</option>
                                                <option id="dist-18" value="18" data-name="Lurigancho">Lurigancho</option>
                                                <option id="dist-19" value="19" data-name="Lurin">Lurin</option>
                                                <option id="dist-20" value="20" data-name="Magdalena del Mar">Magdalena del Mar</option>
                                                <option id="dist-21" value="21" data-name="Pueblo Libre">Pueblo Libre</option>
                                                <option id="dist-22" value="22" data-name="Miraflores">Miraflores</option>
                                                <option id="dist-23" value="23" data-name="Pachacamac">Pachacamac</option>
                                                <option id="dist-24" value="24" data-name="Pucusana">Pucusana</option>
                                                <option id="dist-25" value="25" data-name="Puente Piedra">Puente Piedra</option>
                                                <option id="dist-26" value="26" data-name="Punta Hermosa">Punta Hermosa</option>
                                                <option id="dist-27" value="27" data-name="Punta Negra">Punta Negra</option>
                                                <option id="dist-28" value="28" data-name="Rímac">Rímac</option>
                                                <option id="dist-29" value="29" data-name="San Bartolo">San Bartolo</option>
                                                <option id="dist-30" value="30" data-name="San Borja">San Borja</option>
                                                <option id="dist-31" value="31" data-name="San Isidro">San Isidro</option>
                                                <option id="dist-32" value="32" data-name="San Juan de Lurigancho">San Juan de Lurigancho</option>
                                                <option id="dist-33" value="33" data-name="San Juan de Miraflores">San Juan de Miraflores</option>
                                                <option id="dist-34" value="34" data-name="San Luis">San Luis</option>
                                                <option id="dist-35" value="35" data-name="San Martín de Porres">San Martín de Porres</option>
                                                <option id="dist-36" value="36" data-name="San Miguel">San Miguel</option>
                                                <option id="dist-37" value="37" data-name="Santa Anita">Santa Anita</option>
                                                <option id="dist-38" value="38" data-name="Santa María del Mar">Santa María del Mar</option>
                                                <option id="dist-39" value="39" data-name="Santa Rosa">Santa Rosa</option>
                                                <option id="dist-40" value="40" data-name="Santiago de Surco">Santiago de Surco</option>
                                                <option id="dist-41" value="41" data-name="Surquillo">Surquillo</option>
                                                <option id="dist-42" value="42" data-name="Villa El Salvador">Villa El Salvador</option>
                                                <option id="dist-43" value="43" data-name="Villa María del Triunfo">Villa María del Triunfo</option>
                                           </select>
                                        </div>
                                    </div>

                                    <div class="divTableRow cell-send" >
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Dirección de entrega: <div class="d_ob">*
                                                </div>
                                            </div>
                                            <input type="text" size="20" maxlength="45" name="campo1" id="c_dir"
                                                value="<?= $session? $userData['direccion'] :'' ?>">
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Referencia</div>
                                            <input type="text" size="20" maxlength="45" name="campo1" id="c_ref"
                                                value="<?= $session? $userData['referencia'] :'' ?>">
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                       
                                        <div class="divTableCell" style="margin: auto;">
                                            <div class="etiquetaFormulario">Teléfono celular: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="9" maxlength="9" onkeypress="return soloNumeros(event)" name="campo1" id="c_telcel"
                                            value="<?= $session? $userData['telefono'] :'' ?>">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="divTableRow" style="width:100%;">
                                        <div class="divTableCell"
                                            style="text-align:left; color:black;font-size:1.3em;font-weight:bold;">
                                            <div class="d_ob">*</div> <span>Datos obligatorios.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div>
            <div class="checkbox" style="display:inline-block;">
                <label class="font-light label-pol" style="display:inline;">
                    <input type="checkbox" id="otra-persona" /><i class="helper"></i>
                </label>
                <div
                    style="display:inline-block; font-size:1.3em; font-weight:bold;font-family:'nexa-lightuploaded_file';">
                    Marque esta casilla, si el destinatario del pedido será una tercera persona</div>
            </div>

        </div>




        <div class="row cont_datos" id="d_formularios2" align="center" style="display:none;width:46em;">
            <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
                <div class="tab-button-outer">
                    <ul id="tab-button2">
                        <li id="icon-description2" class="is-active"><a>DATOS DEL DESTINATARIO</a></li>
                    </ul>
                </div>
                <div class="content">
                    <div id="description2" style="display:block;">
                        <div id="receptor">
                            <br>
                            <div class="divTable" style=" width:100%;display:inline-block;">
                                <div class="divTableBody" style="display:block;">
                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Tipo Documento Identidad: <div class="d_ob">
                                                    *</div>
                                            </div>

                                            <select id="tipo_doc_destinatario">
                                                <option id="di_pn1" value="DNI" selected>DNI</option>
                                                <option id="di_pn2" value="PASAPORTE">Pasaporte</option>
                                                <option id="di_pn3" value="CE"> CE</option>
                                            </select>

                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Número Documento Identidad: <div
                                                    class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" name="campo1"  onkeypress="return soloNumeros(event)"  id="number_doc_dest"
                                                value="" required>

                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos1">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Nombres y Apellidos: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="100" maxlength="100" name="campo1" id="c_nombres_dest"
                                                onkeypress="return soloLetras(event)" value="">

                                        </div>
                                        <!-- <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellidos: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" name="campo1" id="c_ape_dest"
                                                onkeypress="return soloLetras(event)" value="">

                                        </div> -->
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Teléfono: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel_dest"
                                                onkeypress="return soloNumeros(event)" value="">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="divTableRow" style="width:100%;">
                                        <div class="divTableCell"
                                            style="text-align:left; color:black;font-size:1.3em;font-weight:bold;">
                                            <div class="d_ob">*</div> <span>Datos obligatorios.</span>
                                        </div>
                                    </div>

                                    <br>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


        <div style="text-align:center !important;">
            <div class="checkbox" style="display:inline-block; " id="d_fact">
                <label class="factCheck font-light label-pol" style="display:inline;">
                    <input type="checkbox" id="dfactura" /><i class="helper"></i>
                </label>
                <div
                    style="display:inline-block; font-size:1.3em; font-weight:bold; font-family:'nexa-lightuploaded_file';">
                    Deseo una factura</div>
            </div>
        </div>
        


        <div class="row cont_datos" id="factura" align="center" style="display:none;width:46em;">
            <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
                <div class="tab-button-outer">
                    <ul id="tab-button2">
                        <li id="icon-description2" class="is-active"><a>DATOS DE LA FACTURA</a></li>
                    </ul>
                </div>
                <div class="content">
                    <div id="description2" style="display:block;">
                        <div id="receptor">
                            <br>
                            <div class="divTable" style=" width:100%;display:inline-block;">
                                <div class="divTableBody" style="display:block;">
                                    <div class="divTableRow" style="width:100%;">
                                        <div class="divTableCell" style="width:100%;">
                                            <div class="etiquetaFormulario">RUC: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" name="campo1" id="ruc"
                                                onkeypress="return soloNumeros(event)" value="" required>

                                        </div>
                                    </div>


                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div class="etiquetaFormulario">Razón Social: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text"  name="campo1" id="r_social"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div class="etiquetaFormulario">Domicilio Fiscal: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text"  name="campo1" id="d_fiscal"
                                                value="" required>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="divTableRow">
                                        <div class="divTableCell"
                                            style="text-align:left; color:black;font-size:1.3em;font-weight:bold;">
                                            <div class="d_ob">*</div> <span>Datos obligatorios.</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div style="text-align:center !important;">
            <div class="checkbox"
                style="display:inline-block; border-radius:25px; border:3px solid #c51152; background-color:whitesmoke; display:none;"
                id="dp_error">
                <div style="display:inline-block; font-size:1.3em; font-weight:bold; margin: 12px 32px;" id="d_error"> -
                </div>
            </div>
        </div>
    </div>

    </div>




    <br>
    <br>
    <div style="text-align:center">
        <div style="text-align:center !important;">
            <div class="checkbox" style="display:inline-block; " id="d_politicas">
                <label class="font-light label-pol" style="display:inline;">
                    <input type="checkbox" id="politicas" /><i class="helper"></i>
                </label>
                <div style="display:inline-block; font-size:1.3em; color:black; "> <span>He leído y acepto las <a
                            href="politicas-de-privacidad" class="span-pol color-primary btn-modals">Políticas de
                            Privacidad</a>.</span></div>
            </div>
        </div>
        <div style="text-align:center !important;" >
        <div class="checkbox" style="display:inline-block; " id="d_publicidad">
            <label class="font-light label-pol" style="display:inline;">
                <input type="checkbox" id="publicidad"   /><i class="helper"></i>
            </label>
            <div style="display:inline-block; font-size:1.3em; color:black;"> <span>Deseo recibir ofertas y novedades de Beurer en mi e-mail.</span></div>
        </div>
        </div>

        <br>


        <span><a href="<?= base_url('send-payment')?>" class="btn btn-cmn " id="btn_sgt" >SIGUIENTE</a></span> <br>
        <span style="text-align:left;"><a class="btn " style="text-decoration:underline; color:black;"
                href = "<?= base_url('carrito')?>">VOLVER</a></span>
    </div>

    <div class="linea"></div>

    <br>


    <div class="row" style="width:80%;margin:auto;display:block;  ">
        <div class="col-md-12" style="display:inline-block;">
            <div class="col-md-4 section-contacto"
                style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
                <div class="font-bold" style="font-size:1.92em;text-align:center;">Chatea con nosotros</div>
                <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
                <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> Facebook Messenger de
                    Beurer Perú </span>
            </div>
            <div class="col-md-4 section-contacto"
                style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
                <div class="font-bold" style="font-size:1.92em;text-align:center;">Llámanos</div>
                <img src="assets/images/icons/telefono.svg" style="width:28%;margin:1.5% 0%;">
                <span class="font-light" style="font-size:1.2rem;padding:0%;display:block;"> (+51) 920 198 522
                </span>

                <span class="font-light" style="font-size:1.2rem;padding:0%;display:block;"> (+51) 978 440 034
                </span>

            </div>
            <div class="col-md-4 section-contacto"
                style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
                <div class="font-bold" style="font-size:1.92em;text-align:center;">Escríbenos</div>
                <img src="assets/images/icons/email.png" style="width:23%;margin:1.5% 0%;">
                <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> ventas@beurer.pe
                </span>
                <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> ventas1@beurer.pe
                </span>
            </div>
        </div>
    </div>
    </div>
    
</main>
<style>
    input ,select{
    height: 30px !important;
	border: 1px solid #999;
	font-size: 16px !important;
	color: #161616;
	font-family:'nexa-lightuploaded_file'!important;
    }
</style>
<script src=<?= base_url('beurer_plantilla/assets/js/registro.js')?>></script>    

<script>

    // window.addEventListener('load', () => {

        const $destinatarioForm  = document.querySelector('#d_formularios1');
        let factura = localStorage.getItem('factura');

        let domicilio = localStorage.getItem('domicilio');
        let session = document.querySelector('.dataUser').dataset.id;

        
        // if(session && domicilio && !factura ) {
        //     $destinatarioForm.style.display = 'none'

        // }
        // if(session && domicilio && factura) {
        //     $destinatarioForm.style.display = 'none'
        //     document.querySelector('#d_fact').style.display = 'none'
        //     document.querySelector('#factura').style.display = 'inline-block'
        // }
        
        let {...userData } = document.querySelector('.dataUser').dataset;
          let index   = userData.tipo_doc == 'DNI' ? '1' 
                                    :userData.tipo_doc == 'PASAPORTE' ? '2'
                                    : userData.tipo_doc == 'CE' ? '3'
                                    :''
            const nodeSelect = document.querySelectorAll('#s_tipodoc > option')[parseInt(index)-1];
            if(nodeSelect){
               nodeSelect.setAttribute('selected','selected')
            }
         

    
           class Facturacion {
               constructor() {
                   this.$destinatario = document.querySelector('#otra-persona');
                   this.$factura      = document.querySelector('#dfactura');
                   this.$politicas      = document.querySelector('#politicas');
                   this.$btn_sgt      = document.querySelector('#btn_sgt');
                   this.session       = document.querySelector('.dataUser').dataset.id;
                   this.estadoDomicilio = localStorage.getItem('domicilio')
                   this.estadoFactura = localStorage.getItem('factura')
                   this.estadoRecojo = localStorage.getItem('recojo')
                   this.estado = false ;
                   
                   this.$btn_sgt.disabled = true;
                   this.TRIGGUER()
               }
                getComprador() {
                    let valueDist = document.getElementById('sdist').value ; 
                    let distrito = '';
                    document.querySelectorAll('#sdist > option').forEach( dist =>  dist.value == valueDist ? distrito = dist.textContent : '' );
                    
                    this.dataComprador = {
                        tipo_doc :  document.getElementById('s_tipodoc').value ,
                        number_doc :  document.getElementById('campo1').value ,
                        nombres :  document.getElementById('c_nombres1').value ,
                        // apellido_paterno :  document.getElementById('c_apellido_paterno').value ,
                        // apellido_materno :  document.getElementById('c_apellido_materno').value ,
                        apellidos :  document.getElementById('c_apellidos').value ,

                        correo :  document.getElementById('c_correo1').value ,
                        departamento :  document.getElementById('s_depa').value ,
                        provincia :  document.getElementById('sprov').value ,
                        distrito :  distrito ,
                        d_envio :   this.estadoRecojo? 'recoger en tienda' :document.getElementById('c_dir').value,
                        referencia : this.estadoRecojo? '....compra de recojo' :document.getElementById('c_ref').value ,
                        // fijo :  document.getElementById('c_telfij').value ,
                        telefono :  document.getElementById('c_telcel').value ,
                    }
                }
                addComprador () {
                    localStorage.setItem('Comprador' , JSON.stringify(this.dataComprador) )
                }
                getDestinatario () {

                    this.dataDestinatario = {
                        tipo_doc :  document.getElementById('tipo_doc_destinatario').value ,
                        number_doc :  document.getElementById('number_doc_dest').value ,
                        nombres :  document.getElementById('c_nombres_dest').value ,
                        telefono :  document.getElementById('c_telcel_dest').value ,
                    }
                    // apellidos :  document.getElementById('c_ape_dest').value ,
                }             
                getFactura () {
                    
                    this.dataFactura = {
                        ruc :  document.getElementById('ruc').value ,
                        r_social :  document.getElementById('r_social').value ,
                        r_fiscal :  document.getElementById('d_fiscal').value ,
                    }
                }
                addDestinatario() {
                    localStorage.setItem('Destinatario' , JSON.stringify(this.dataDestinatario) )
                }
                addFactura() {
                    localStorage.setItem('facturacion' , JSON.stringify(this.dataFactura) )
                }
                
                filter (obj){
                    for (const property in obj) {
                        // if((property== "fijo") ||(property =="referencia") ){
                        if((property =="referencia") ){
                        }else {
                            if(obj[property] == ''||obj[property] == 'SELECCIONE DISTRITO'){
                            this.estado = false;
                            break;
                            }else{
                                this.estado = true;
                            }
                        }
                    }
                    return this.estado
                }
                alert_form (status, message) {
                    let perror = document.getElementById('dp_error');
                    let error = document.getElementById('d_error');
                    perror.style.display = "none";
                    error.innerHTML = "";

                    if(!status){
                        perror.style.display = "inline-block";
                        error.innerHTML = message;
                    }

                }

               TRIGGUER () {
                   if(this.estadoRecojo) {
                       document.querySelector('.cell-send').style.display = 'none'
                   }
                   this.$btn_sgt.addEventListener('click' , event => {
                    event.preventDefault();
                    const uri = event.target.href ;
                    // solo comprador 
                    if(!this.$factura.checked && !this.$destinatario.checked){
                        this.$btn_sgt.disabled = true ;
                        this.getComprador()
                        if(this.filter(this.dataComprador)) {
                            if(this.$politicas.checked) {
                                this.$btn_sgt.disabled = false ;
                                this.addComprador()
                            }else{
                                this.alert_form(false,'Debe aceptar las políticas poder continuar.');
                                return
                            }
                           
                        }else {
                            this.alert_form(false,'los datos obligatorios (*) del Comprador  deben estar completos para poder continuar');
                            return
                        }
                    }
                    // comprador y factura
                    if(this.$factura.checked && !this.$destinatario.checked){
                        this.$btn_sgt.disabled = true ;
                        this.getComprador();
                        this.getFactura();
                        if(this.filter(this.dataComprador) && this.filter(this.dataFactura)) {
                            if(this.$politicas.checked) {
                                this.$btn_sgt.disabled = false ;
                                this.addComprador();
                                this.addFactura();
                            }else{
                                this.alert_form(false,'Debe aceptar las políticas poder continuar.');
                                return
                            }
                           
                        }else {
                            this.alert_form(false,'Todos los datos obligatorios (*) deben estar completos para poder continuar');
                            return
                        }
                    }
                    // comprador y 
                    if(!this.$factura.checked && this.$destinatario.checked){
                        this.$btn_sgt.disabled = true ;
                        this.getComprador();
                        this.getDestinatario();
                        if(this.filter(this.dataComprador) && this.filter(this.dataDestinatario)) {
                            if(this.$politicas.checked) {
                                this.$btn_sgt.disabled = false ;
                                this.addComprador();
                                this.addDestinatario();
                            }else{
                                this.alert_form(false,'Debe aceptar las políticas poder continuar.');
                                return
                            }
                           
                        }else {
                            this.alert_form(false,'Todos los datos obligatorios (*) deben estar completos para poder continuar');
                            return
                        }
                    }
                    // comprador , destinatario y factura
                    if(this.$factura.checked && this.$destinatario.checked){
                        this.$btn_sgt.disabled = true ;
                        this.getComprador();
                        this.getFactura();
                        this.getDestinatario();
                        if(this.filter(this.dataComprador) && this.filter(this.dataFactura)&& this.dataDestinatario) {
                            if(this.$politicas.checked) {
                                this.$btn_sgt.disabled = false ;
                                this.addComprador();
                                this.addFactura();
                                this.addDestinatario();
                            }else{
                                this.alert_form(false,'Debe aceptar las políticas poder continuar.');
                                return
                            }
                           
                        }else {
                            this.alert_form(false,'Todos los datos obligatorios (*) deben estar completos para poder continuar');
                            return
                        }
                    }
                    window.location = uri
                  
                })}
            }
           new Facturacion();
// } );

         

</script>

<?php include 'src/includes/footer.php'?>