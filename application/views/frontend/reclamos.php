<?php include 'src/includes/header.php' ?>

<main class="main-detail-products">
    <!--Inicio de cuerpo-->
    <br>
    <div class="font-nexaheavy" style="height:100%;font-size:2.5rem;background-image:url(<?=base_url('assets/images/fondo2.jpg')?>);background-color:white;color:#fff;background-size:contain;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;background-size:cover;">
        Libro de Reclamaciones
    </div>
    <br>

    <div class="formulario" style="text-align:center;padding-top: 0px;max-width: 920px;border-radius: 4%;margin: auto;padding-bottom: 2%;">
        <br><br>
        <div class="row cont_datos" align="center" style="display:inline-block;width:83vh;">
            <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
                <div class="tab-button-outer">
                    <ul id="tab-button2">
                        <li id="icon-description2" class="is-active"><a>DATOS DEL RECLAMANTE</a></li>
                    </ul>
                </div>
                <div class="content">
                    <div style="display:block;">
                        <div id="emisor">
                            <br>
                            <div class="divTable" style=" width:100%;display:inline-block;">
                                <div class="divTableBody" style="display:block;">
                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Tipo Documento Identidad: <div class="d_ob">*</div></div>

                                            <select id="s_tipodoc">
                                                <option id="di_pn1" value="1" selected>DNI</option>
                                                <option id="di_pn2" value="2">Pasaporte</option>
                                                <option id="di_pn3" value="3"> CE</option>
                                            </select>

                                        </div>

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Número Documento Identidad: <div class="d_ob">*</div></div>
                                            <input id="r_n_doc" type="text" size="20" maxlength="20" name="campo1" value="" required>
                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos1">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Nombres : <div class="d_ob">*</div>
                                            </div>
                                            <input id="r_nombr" type="text" size="20" maxlength="20" name="campo1" value="">
                                        </div>
                                    </div>

                                    <div class="divTableRow" id="pn_datos2">

                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellido Paterno: <div class="d_ob">*</div></div>

                                            <input id="r_apat" type="text" size="20" maxlength="20" name="campo1" value="">

                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Apellido Materno: <div class="d_ob">*</div>
                                            </div>

                                            <input id="r_amat" type="text" size="20" maxlength="20" name="campo1" id="c_apem" value="">

                                        </div>

                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Teléfono/Celular</div>
                                            <input id="r_telef" type="text" size="9" maxlength="9" name="campo1" value="">
                                        </div>
                                        <div class="divTableCell">
                                            <div class="etiquetaFormulario">Correo electrónico: <div class="d_ob">*</div></div>
                                            <input id="r_correo" type="text" size="20" maxlength="30" name="campo1" value="">
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:99%;">
                                            <div style="text-align:left;justify-content:center;font-size:11px;font-style:italic;font-weight: normal;"> En caso no coloque una dirección de correo electrónico no podremos enviarle por dicha vía una copia de la presente hoja de reclamación virtual, de conformidad con el artículo 4-B del Reglamento del Libro de Reclamaciones. No obstante, ello no impedirá que pueda concluir satisfactoriamente el proceso de ingreso de su reclamo o queja.</div>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:32%;">
                                            <div class="etiquetaFormulario">Departamento: <div class="d_ob">*</div>
                                            </div>
                                            <select disabled id="s_depa">
                                                <option data-name="Lima" disabled selected>Lima</option>
                                            </select>
                                        </div>

                                        <div class="divTableCell" style="width:32%;">
                                            <div class="etiquetaFormulario">Provincia: <div class="d_ob">*</div>
                                            </div>
                                            <select selected id="sprov">
                                                <option data-name="Lima" disabled selected>Lima</option>
                                            </select>
                                        </div>
                                        <div class="divTableCell" style="width:32%;">
                                            <div class="etiquetaFormulario">Distrito: <div class="d_ob">*</div>
                                            </div>
                                            <select id="sdist">
                                                <option disabled selected="selected">SELECCIONE DISTRITO</option>   
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

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:99%;">
                                            <div class="etiquetaFormulario">Dirección: <div class="d_ob">*</div></div>
                                            <input id="r_direc" type="text" size="20" maxlength="30" name="campo1" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <div style="text-align:center !important;">
                                        <div class="checkbox" style="display:inline-block; " id="d_politicas">
                                            <label class="font-light label-pol" style="display:inline;">
                                                <input type="checkbox" id="menor_edad" /><i class="helper"></i>
                                            </label>
                                            <div style="display:inline-block; font-size:1.3em; font-weight:bold;"><span>Soy menor de edad</span></div>
                                        </div>
                                    </div>

                                    <div id="d_menore" class="hidden">
                                        <div class="divTableRow" id="pn_datos1">
                                            <div class="divTableCell" style="width:99%;">
                                                <div class="etiquetaFormulario">Coloca el nombre de tu padre, madre o apoderado : <div class="d_ob">*</div></div>
                                                <input id="r_apd_nombr" type="text" size="20" maxlength="20" name="campo1" value="">
                                            </div>
                                        </div>

                                        <div class="divTableRow">
                                            <div class="divTableCell">
                                                <div class="etiquetaFormulario">Tipo Documento Identidad: <div class="d_ob">*</div></div>

                                                <select id="r_apd_tip">
                                                    <option id="di_pn1" value="1" selected>DNI</option>
                                                    <option id="di_pn2" value="2">Pasaporte</option>
                                                    <option id="di_pn3" value="3"> CE</option>
                                                </select>

                                            </div>

                                            <div class="divTableCell">
                                                <div class="etiquetaFormulario">Número Documento Identidad: <div
                                                        class="d_ob">*</div>
                                                </div>
                                                <input id="r_apd_doc" type="text" size="20" maxlength="20" name="campo1" value="" required>
                                            </div>
                                        </div>


                                        <div class="divTableRow">
                                            <div class="divTableCell">
                                                <div class="etiquetaFormulario">Teléfono/Celular</div>
                                                <input id="r_apd_telf" type="text" size="9" maxlength="9" name="campo1" value="">
                                            </div>
                                            <div class="divTableCell">
                                                <div class="etiquetaFormulario">Correo electrónico: <div class="d_ob">*</div></div>
                                                <input id="r_apd_corr" type="text" size="20" maxlength="30" name="campo1" value="">
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
        <div class="row cont_datos" id="d_formularios2" align="center" style="display:inline-block;width:83vh;">
            <div class="tabs2 col-xs-12" style="display:block !important;" id="tab-registro">
                <div class="tab-button-outer">
                    <ul id="tab-button2">
                        <li id="icon-description2" class="is-active"><a style="background-image:none !important;padding:.5em;">INFORMACIÓN DEL BIEN CONTRATADO</a></li>
                    </ul>
                </div>
                <div class="content">
                    <div id="description2" style="display:block;">
                        <div id="receptor">
                            <br>
                            <div class="divTable" style=" width:100%;display:inline-block;">
                                <div class="etiquetaFormulario" style="text-align:center;">SELECCIONE UN TIPO DE SERVICIO: </div>
                                <div class="divTableBody" style="display:block;">
                                    <div class="divTableRow" id="radios_1">
                                        <label>
                                            <input type="radio" name="r_tipo_bn" value="producto" checked>
                                            <span>PRODUCTO</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="r_tipo_bn" value="servicio">
                                            <span>SERVICIO</span>
                                        </label>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:99%;" colspan="2">
                                            <div class="etiquetaFormulario">Monto reclamado ( S/. ): <div class="d_ob">*</div></div>
                                            <input id="r_mont" type="text" size="4" maxlength="4" name="campo1" value="">
                                        </div>
                                    </div>



                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div class="etiquetaFormulario">Descripción del producto o servicio adquirido: <div class="d_ob">*</div></div>
                                            <textarea id="r_descr" class="form-control" style="width:100%;height:8vh;background-color:white;" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div class="etiquetaFormulario">Código de Pedido <div class="d_ob">*</div></div>
                                            <input id="r_codigo" type="text" size="4" maxlength="10" name="campo1" value="">
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
                        <li id="icon-description2" class="is-active"><a style="background-image:none !important;padding:.5em;">DETALLE DE LA QUEJA O RECLAMO</a></li>
                    </ul>
                </div>
                <div class="content">
                    <div style="display:block;">
                        <div id="receptor">
                            <br>
                            <div class="divTable" style=" width:100%;display:inline-block;">
                                <div class="etiquetaFormulario" style="text-align:center;">SELECCIONE UN TIPO: </div>
                                <div class="divTableBody" style="display:block;">
                                    <div class="divTableRow" id="radios_1">
                                        <label>
                                            <input type="radio" name="r_tip_rec" value="queja" checked>
                                            <span>QUEJA</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="r_tip_rec" value="reclamo">
                                            <span>RECLAMO</span>
                                        </label>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:99%;" colspan="2">
                                            <div class="etiquetaFormulario">DESCRIPCIÓN: <div class="d_ob">*</div></div>
                                            <input id="r_rec_desc" type="text" size="20" maxlength="30" name="campo1" value="">
                                        </div>
                                        <div class="divTableRow">
                                            <div class="divTableCell" style="width:100%;">
                                                <div class="etiquetaFormulario">PEDIDO: <div class="d_ob">*</div></div>
                                                <textarea id="r_rec_pedi" class="form-control" style="width:100%;height:21vh;background-color:white;" aria-label="With textarea"></textarea>
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

    </div>
    

    <br><br>

    <div style="text-align:center">
        <div style="text-align:center !important;">
            <div class="checkbox" style="display:inline-block; " id="d_politicas">
                <label class="font-light label-pol" style="display:inline;">
                    <input type="checkbox" id="terycon" /><i class="helper"></i>
                </label>
                <div style="display:inline-block; font-size:1.3em; font-weight:bold;"> <span>He leído y acepto los <a href="terminos-y-condiciones" class="span-pol color-primary btn-modals">términos y condiciones</a></span></div>
            </div>
        </div>

        <div style="text-align:center !important;">
            <div class="checkbox" style="display:inline-block; " id="d_politicas">
                <label class="font-light label-pol" style="display:inline;">
                    <input type="checkbox" id="politicas2" /><i class="helper"></i>
                </label>
                <div style="display:inline-block; font-size:1.3em; font-weight:bold;">
                    <span>Declaro haber leído las <a href="politicas-de-privacidad" class="span-pol color-primary btn-modals">Políticas de Privacidad</a></span>
                </div>
            </div>
        </div>

        <span><a class="btn btn-primary1" id="env_reclamo"  href="#"   onclick="ObjMain.reclamos(event);">ENVIAR</a></span>

        <br>

        <div class="row cont_datos" id="d_formularios2" align="center" style="display:inline-block;width:83vh;">
            <div class="tabs col-xs-12" style="display:block !important;" id="tab-registro">
                <div class="content">
                    <div style="display:block;">
                        <div id="receptor">
                            <br>
                            <div class="divTable" style=" width:100%;display:inline-block;">

                                <div class="divTableBody infoReclamo" style="display:block;">

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div><strong>(1) RECLAMO:</strong> Disconformidad relacionada a los productos o servicios.</div>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div> <strong> (2) QUEJA:</strong> Disconformidad no relacionada a los productos o servicios; o, malestar o descontento respecto a la atención al público</div>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div>La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo para interponer una denuncia ante el INDECOPI.</div>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div>En caso no consigne como mínimo su nombre, DNI, domicilio o correo electrónico, reclamo o queja y el detalle del mismo, de conformidad con el artículo 5 del Reglamento del Libro de Reclamaciones, su reclamo o queja se considera como no presentado.</div>
                                        </div>
                                    </div>

                                    <div class="divTableRow">
                                        <div class="divTableCell" style="width:100%;">
                                            <div>El proveedor deberá dar respuesta al reclamo en un plazo no mayor de treinta (30) días calendario, pudiendo ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.</div>
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

</main>

<!-- <script src="assets/js/registro.js"></script> -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
<?php include 'src/includes/footer.php' ?>

</body>

</html>