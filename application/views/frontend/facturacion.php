<?php include 'src/includes/header.php' ?>

<?= $session = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente']: false ;?>
<input
    type="hidden" 
    class="dataUser"
    data-tipo_documento =<?=$session?  $userData['tipo_documento']:''?>
    data-direccion    ="<?= $session? $userData['direccion'] :'' ?>"
    data-departamento    ="<?= $session? $userData['departamento'] :'' ?>"
    data-provincia    ="<?= $session? $userData['provincia'] :'' ?>"
    data-distrito    ="<?= $session? $userData['distrito'] :'' ?>"
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
        style="height:100%;font-size:2.5rem;background-image:url('assets/images/fondo1.png');background-color:white;color:#c51152;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;">
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
                                            <div class="etiquetaFormulario">Tipo Documento Identidad: : <div
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
                                            <input type="text" size="20" maxlength="20" name="campo1" id="campo1" 
                                                value=" <?= $userData ? $userData['documento'] : '' ?>"
                                                required
                                            >

                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos1">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Nombres: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="30" name="campo1" id="c_nombres1"
                                                onkeypress="return soloLetras(event)" value="<?= $userData ? $userData['nombre'] : ''?>">

                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellidos: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" name="campo1" id="c_apep1"
                                                onkeypress="return soloLetras(event)" value="<?= $userData ? $userData['apellido_paterno'].$userData['apellido_materno'] : ''?>">

                                        </div>
                                    </div>


                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Correo electrónico: <div class="d_ob">*
                                                </div>
                                            </div>
                                            <input type="email" id="c_correo1" size="20" maxlength="30" name="campo1"
                                                id="correo" value="<?= $userData ? $userData['nombre'] : ''?>" required>
                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Departamento: <div class="d_ob">*</div>
                                            </div>
                                            <select id="s_depa" onchange="ObjMain.showProvincesList(this);">
                                                <option disabled selected> <?php echo $userData ? $userData['departamento'] : 'Seleccione departamento'?>  </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Provincia: <div class="d_ob">*</div>
                                            </div>
                                            <select id="sprov" onchange="ObjMain.showDistrictsList(this);">
                                                <option disabled selected><?php echo $userData ? $userData['provincia'] : 'Seleccione Provincia'?> </option>
                                            </select>
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Distrito: <div class="d_ob">*</div>
                                            </div>
                                            <select id="sdist">
                                                <option disabled selected><?php echo $userData ? $userData['distrito'] : 'Seleccione distrito'?> </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Dirección de entrega: <div class="d_ob">*
                                                </div>
                                            </div>
                                            <input type="text" size="20" maxlength="45" name="campo1" id="c_dir"
                                                value="">
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Referencia</div>
                                            <input type="text" size="20" maxlength="45" name="campo1" id="c_ref"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Teléfono fijo</div>
                                            <input type="text" size="9" maxlength="9" name="campo1" id="c_telfij"
                                                 value="<?= $userData ? $userData['telefono'] : ''?>">
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Teléfono celular: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="9" maxlength="9" name="campo1" id="c_telcel"
                                                value="">
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
                                                <option id="di_pn1" value="1" selected>DNI</option>
                                                <option id="di_pn2" value="2">Pasaporte</option>
                                                <option id="di_pn3" value="3"> CE</option>
                                            </select>

                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Número Documento Identidad: <div
                                                    class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" name="campo1" id="number_doc_dest"
                                                value="" required>

                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos1">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Nombres : <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="30" name="campo1" id="c_nombres_des"
                                                onkeypress="return soloLetras(event)" value="">

                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellidos: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" name="campo1" id="c_ape_dest"
                                                onkeypress="return soloLetras(event)" value="">

                                        </div>
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
            <div class="checkbox"
                style="display:inline-block;  border:3px solid #c51152; background-color:whitesmoke; display:none;"
                id="dp_error">
                <div style="display:inline-block; font-size:1.3em; font-weight:bold; margin: 12px 32px;" id="d_error"> -
                </div>
            </div>
        </div>

        <div style="text-align:center !important;">
            <div class="checkbox" style="display:inline-block; " id="d_fact">
                <label class="font-light label-pol" style="display:inline;">
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
                                            <input type="text" size="9" maxlength="9" name="campo1" id="r_social"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div class="etiquetaFormulario">Dirección Fiscal: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="9" maxlength="9" name="campo1" id="d_fiscal"
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


        <br>


        <span><a class="btn btn-cmn " id="btn_sgt" >SIGUIENTE</a></span> <br>
        <span style="text-align:left;"><a class="btn " style="text-decoration:underline; color:black;"
                href="">VOLVER</a></span>
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
                <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> (+51) 920 198 522
                </span>

                <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> (+51) 978 440 034
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
    <!--Fin de cuerpo-->
    
</main>

<script>


    document.addEventListener('DOMContentLoaded', () => {
        const {...userData} = document.querySelector('.dataUser').dataset;
          let index   = userData.tipo_documento == 'DNI' ? '1' 
                                    :userData.tipo_documento == 'PASAPORTE' ? '2'
                                    : userData.tipo_documento == 'CE' ? '3'
                                    :''
            const nodeSelect = document.querySelectorAll('#s_tipodoc > option')[parseInt(index)-1];
            if(nodeSelect){
               nodeSelect.setAttribute('selected','selected')
            }
      
          setTimeout(function () {
            
            document.querySelectorAll('#s_depa > option').forEach(depa => {
              if( depa.textContent == userData.departamento ){
                depa.setAttribute('selected','selected');
            } 
             });
             $('#s_depa').trigger('change')

            document.querySelectorAll('#sprov > option').forEach(prov => {
                if( prov.textContent == userData.provincia ){
                    prov.setAttribute('selected','selected');
                }
            });

            $('#sprov').trigger('change')
            document.querySelectorAll('#sdist > option').forEach(dist => {
                if( dist.textContent == userData.distrito ) {
                    dist.setAttribute('selected','selected');
                }
            });

           } ,500)
         

    
           class Facturacion {
               constructor() {
                   this.$destinatario = document.querySelector('#otra-persona');
                   this.$factura      = document.querySelector('#dfactura');
                   this.$btn_sgt      = document.querySelector('#btn_sgt');
                   this.estado = false ;

                   this.$btn_sgt.disabled = true;
                   this.TRIGGUER()
               }
                getComprador () {
                    this.dataComprador = {
                        tipo_doc :  document.getElementById('s_tipodoc').value ,
                        number_doc :  document.getElementById('campo1').value ,
                        nombres :  document.getElementById('c_nombres1').value ,
                        apellidos :  document.getElementById('c_apep1').value ,
                        correo :  document.getElementById('c_correo1').value ,
                        departamento :  document.getElementById('s_depa').value ,
                        provincia :  document.getElementById('sprov').value ,
                        distrito :  document.getElementById('sdist').value ,
                        d_envio :  document.getElementById('c_dir').value ,
                        referencia :  document.getElementById('c_ref').value ,
                        fijo :  document.getElementById('c_telfij').value ,
                        cell :  document.getElementById('c_telcel').value ,
                    }
                }
                getDestinatario () {
                    this.dataDestinatario = {
                        tipo_doc_dest :  document.getElementById('tipo_doc_destinatario').value ,
                        number_doc_dest :  document.getElementById('number_doc_dest').value ,
                        nombres_dest :  document.getElementById('c_nombres_des').value ,
                        apellidos_dest :  document.getElementById('c_ape_dest').value ,
                        telefono_dest :  document.getElementById('c_telcel_dest').value ,
                    }
                }
                getFactura () {
                    this.dataFactura = {
                        ruc :  document.getElementById('ruc').value ,
                        r_social :  document.getElementById('r_social').value ,
                        r_fiscal :  document.getElementById('d_fiscal').value ,
                    }
                }
                addComprador() {
                    localStorage.setItem('comprador' , JSON.stringify(this.dataComprador) )

                }
                addDestinatario(){
                    localStorage.setItem('destinatario' , JSON.stringify(this.dataDestinatario) )

                }
                addFactura() {
                    localStorage.setItem('factura' , JSON.stringify(this.dataFactura) )
                }
                filter (obj){
                    for (const property in obj) {
                        this.estado = obj[property] !== '' ? true : false ; 
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
                   this.$btn_sgt.addEventListener('click' , event => {
                    
                    if( !this.$destinatario.checked && !this.$factura.checked ) {
                        this.getComprador();
                        this.$btn_sgt.disabled = true ;

                        if(this.filter(this.dataComprador)) {
                            this.$btn_sgt.disabled = false ;
                            this.addComprador();
                        }else {
                            this.alert_form(false,'complete los datos del comprador');
                        }
                    }
                    if(this.$destinatario.checked && !this.$factura.checked){
                        this.$btn_sgt.disabled = true ;
                        this.getComprador();
                        this.getDestinatario();
                        if(this.filter(this.dataDestinatario)) {
                            this.$btn_sgt.disabled = false ;
                            this.addComprador();
                            this.addDestinatario();
                        }else {
                            this.alert_form(false,'complete los datos del destinatario');
                        }
                    }
                    if(!this.$destinatario.checked && this.$factura.checked ){
                        this.$btn_sgt.disabled = true ;
                        this.getComprador();
                        this.getFactura();
                        if(this.filter(this.dataFactura)) {
                            this.$btn_sgt.disabled = false ;
                            this.addComprador();
                            this.addFactura();
                        }else {
                            this.alert_form(false,'complete los datos la factura');
                        }
                    }
                    if(this.$destinatario.checked && this.$factura.checked ){
                        this.$btn_sgt.disabled = true ;
                        this.getComprador();
                        this.getDestinatario();
                        this.getFactura();

                        if(this.filter(this.dataDestinatario) && this.filter(this.dataFactura)) {
                            this.$btn_sgt.disabled = false ;
                            this.addComprador();
                            this.addDestinatario();
                            this.addFactura();
                        }else {
                            this.alert_form(false,'complete los datos requeridos en facturacion o destinatario');
                        }
                    }
                })}
            }
           new Facturacion();
} );

         

</script>

<?php include 'src/includes/footer.php'?>