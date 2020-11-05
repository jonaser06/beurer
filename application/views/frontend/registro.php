<?php include 'src/includes/header.php' ?>

<main class="main-detail-products">
    <!--Inicio de cuerpo-->
    <section class="sct-detail-products">
        <div class="container cont-detail-products">
            <div class="row">

            </div>

        </div>
    </section>
    
    <br>
    <div class="font-nexaheavy" style="height:100%;font-size:2.5rem;background-size:cover;background-image:url(<?=base_url('assets/images/fondo2.jpg')?>);background-color:white;color:#fff;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;" >Registro de Cliente Beurer </div>   
    <br>
    <div class="formulario" style="text-align:center;padding-top: 0px; max-width: 920px; border-radius: 8%; margin: auto; padding-bottom: 2%;">
        

        <br>
        <br>
        <div class="row cont_datos" id="d_formularios1" align="center" style="display:inline-block;width:46em;">
            <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
                <div class="tab-button-outer">
                    <ul id="tab-button2">
                        <li id="icon-description2" class="is-active"><a>INFORMACIÓN PERSONAL</a></li>
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
                                            <div class="etiquetaFormulario">Tipo Documento Identidad: <div class="d_ob">*</div>
                                            </div>

                                            <select id="s_tipodoc">
                                                <option id="di_pn1" value="DNI" selected>DNI</option>
                                                <option id="di_pn2" value="Pasaporte">Pasaporte</option>
                                                <option id="di_pn3" value="CE">CE</option>
                                            </select>

                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Número Documento Identidad: <div class="d_ob">*</div>
                                            </div>
                                            <input id="n_documento" type="text" size="20" maxlength="20" value="" required onkeyup="ObjMain.solonumero(this);" onchange="ObjMain.solonumero(this);">
                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos1">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Nombres: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="30" id="c_nombres1" value="">

                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellido Paterno: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" size="20" maxlength="20" id="c_apep1" value="">

                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos2">

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellido Materno: <div class="d_ob">*</div></div>
                                            <input type="text" size="20" maxlength="20" id="c_apem1" value="">
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Correo electrónico: <div class="d_ob">*</div></div>
                                            <input type="email" id="c_correo1" size="20" maxlength="30" id="correo" value="" required >
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Contraseña: <div class="d_ob">*</div></div>
                                            <input type="password" size="20" maxlength="45" value="" id="passw" >
                                            <div class="passalert" style="display:none;color: #c51152;font-size: 0.8rem;text-align: left;">Las contraseñas no coinciden</div>
                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Repita la contraseña: <div class="d_ob">*</div></div>
                                            <input type="password" size="20" maxlength="45" value="" id="confpassw" >
                                            <div class="passalert2" style="display:none;color: #c51152;font-size: 0.8rem;text-align: left;">Las contraseñas no coinciden</div>
                                        </div>
                                    </div>

                                    <div class="divTableRow">

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Departamento: <div class="d_ob">*</div></div>
                                            <select id="s_depa" onchange="ObjMain.showProvincesList(this);">
                                                <option disabled selected>Seleccione departamento</option>
                                            </select>
                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Provincia: <div class="d_ob">*</div>
                                            </div>
                                            <select id="sprov" onchange="ObjMain.showDistrictsList(this);">
                                                <option disabled selected>Seleccione provincia</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="divTableRow">

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Distrito: <div class="d_ob">*</div></div>
                                            <select id="sdist">
                                                <option disabled selected>Seleccione distrito</option>
                                            </select>
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Dirección: <div class="d_ob">*</div></div>
                                            <input type="text" id="direction" size="20" maxlength="45" value="">
                                        </div>

                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Referencia</div>
                                            <input type="text" id="referencia" size="20" maxlength="45" value="">
                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Teléfono: <div class="d_ob">*</div>
                                            </div>
                                            <input type="text" id="telephone" size="9" maxlength="9" id="c_telcel" value="">
                                        </div>
                                    </div>


                                    <div class="divTableRow">
                                        <br>
                                        <div class="etiquetaFormulario" style="margin-left:1%;">FECHA DE NACIMIENTO
                                        </div>
                                        <div class="divTableCell" style="width:18%;">
                                            <div class="etiquetaFormulario">Día: <div class="d_ob">*</div></div>
                                            <select name="dia" id="dia">
                                                <?php for($i = 1 ; $i<=31 ; $i++): ?>
                                                    <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="divTableCell" style="width:48%;">
                                            <div class="etiquetaFormulario">Mes: <div class="d_ob">*</div>
                                            </div>

                                            <select name="mes" id="mes">
                                                <?php
                                                    $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                                                    
                                                    foreach ($meses as $key => $value) {
                                                        echo "<option value=".($key+1).">".$value."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="divTableCell" style="width:28%;">
                                            <div class="etiquetaFormulario">Año: <div class="d_ob">*</div>
                                            </div>
                                            <select name="anyo" id="anyo">
                                                <option value=""></option>
                                                <?php 
                                                    $tope = date( 'Y' );
                                                    $e_max = 100;
                                                    $e_min = 14;
                                                    $anyo = $tope - $e_min;
                                                    while ( $anyo >= ( $tope - $e_max )) {
                                                        echo "<option value='$anyo'>$anyo</option>";
                                                        --$anyo;
                                                    }
                                                ?>
                                            </select>
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
    </div>

    <div style="text-align:center !important;">
        <div class="checkbox"
            style="display:inline-block;  border:3px solid #c51152; background-color:whitesmoke; display:none;"
            id="dp_error">
            <div style="display:inline-block; font-size:1.3em; font-weight:bold; margin: 12px 32px;" id="d_error"> -
            </div>
        </div>
    </div>

    <div class="linea"></div>

    <br><br><br>

    <div style="text-align:center">
        <div style="text-align:center !important;">
            <div class="checkbox" style="display:inline-block; " id="d_politicas">
                <label class="font-light label-pol" style="display:inline;"><input type="checkbox" id="politicas" /><i class="helper"></i></label>
                <div style="display:inline-block; font-size:1.3em; color:black; "> <span>He leído y acepto las <a href="politicas-de-privacidad" class="span-pol color-primary btn-modals">Políticas de Privacidad</a>.</span></div>
            </div>
        </div>

        <div style="text-align:center !important;">
            <div class="checkbox" style="display:inline-block; " id="d_publicidad">
                <label class="font-light label-pol" style="display:inline;"> <input type="checkbox" id="publicidad" /><i class="helper"></i> </label>
                <div style="display:inline-block; font-size:1.3em; color:black;"> <span>Deseo recibir ofertas y novedades de Beurer en mi e-mail.</span></div>
            </div>
        </div>

        <br>

        <span style="text-align:left;"><a class="btn " style="background-color:darkgray; color:white;" href="#">VOLVER</a></span>
        <span><a class="btn btn-primary1" id="btn_sgt" href="#" onclick="ObjMain.submit_form(event);">COMPLETAR REGISTRO</a></span>
    </div>

    <div class="linea"></div>

    <br>

    </div>
    <!--Fin de cuerpo-->
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

<!-- <script src="assets/js/registro.js"></script>    -->


<?php include 'src/includes/footer.php' ?>

</body>

</html>