<?php include 'src/includes/header.php' ?>

<main class="main-detail-products" id="cuerpo" style="display:none;" >

    <section class="sct-detail-products">
        <div class="container cont-detail-products">
            <div class="row">

            </div>

        </div>
    </section>
    <!-- breadcrumb -->
    <div id="checkout_crumb">
        <div class="crumb" style="max-width: 1100px;margin: auto;display: flex;flex-wrap: nowrap;justify-content: space-between;">
            <span class="step_on1"><img src="assets/images/steps/paso1.png"></span>
            <span class="step_off1"><img src="assets/images/steps/paso2.png"></span>
            <span class="step_off1"><img src="assets/images/steps/paso3.png"></span>
            <span class="step_off1"><img src="assets/images/steps/paso4.png"></span>
        </div>
    </div>
    <br>



    <div id="checkout_crumb">
        <hr style="margin-bottom:-26px;">
        <div class="crumb" style="max-width: 1100px;margin: auto;display: flex;flex-wrap: nowrap;justify-content: space-between;">
            <span class="step_on">Carrito de comras</span>

            <span class="step_arrow"></span>
            <span class="step_off">Datos y Facturación</span>

            <span class="step_arrow"></span>
            <span class="step_off">Envío y Pago</span>

            <span class="step_arrow"></span>
            <span class="step_off">Resumen de Pedido</span>
        </div>
    </div>

    <div class="formulario" style="text-align:center;width:100%;transform: scale(0.9);background:transparent;" align="center">
        <br>
        <main2>
            <div class="basket" style="padding:0px;">
                <div style="background-color:white;border-radius:25px;float:left;width:100%;padding:.5rem 2rem;margin-bottom:3%;">
                    <div class="titulo font-nexaheavy" style="margin-top:2%;float:left;margin-left:2%;padding-left:1% !important;border-left:2px solid #c51152;">Productos seleccionados en carrito de compras</div>
                    <div class="basket-labels">
                        <ul>
                            <li class="item item-heading">productos</li>
                            <li class="price">Precio unitario</li>
                            <li class="quantity">Cantidad</li>
                            <li class="subtotal">Subtotal</li>
                        </ul>
                    </div>
                    <div class="carrito-container"></div>

                </div>  
                
                <?php if ( !$sesion ): ?>
                <div style="float:left;width:100%; text-align:left;color:black;background-color:white; padding:.5rem 2rem;border-radius:25px;">
                    <div class="row">
                        <div class="titulo font-nexaheavy" style="margin-top:2%;margin-left:2%;padding-left:1% !important;border-left:2px solid #c51152;">
                            INGRESA TUS DATOS
                        </div>
                        <br>
                        <div class="col-md-4" style="padding-left:2% !important; margin-bottom:10%;">
                            <div class=" font-nexaregular" style="font-weight:bold;margin-bottom:2%;">Nuevos clientes</div>
                            <span class="font-light">¿Eres nuevo? Regístrate aquí y compra ahora. </span>
                            <br><br>
                            <span>
                                <a class="btn btn-cmn" href="#" style="width:80%;padding:7px 0px;font-size:1em;">REGÍSTRATE AQUÍ</a>
                            </span>

                        </div>
                        <div class="col-md-4 compra-sin-clave" style="border-left:1px solid rgba(169,169,169,0.5);border-right:1px solid rgba(169,169,169,0.5);padding-left:2% !important; margin-bottom:10%;">
                            <div class=" font-nexaregular" style="font-weight:bold;margin-bottom:2%;">
                                Compra sin clave
                            </div>
                            <span class="font-light">
                                Solo te pediremos algunos datos para el despacho. No serán guardados para tu próxima compra.
                            </span>
                            <br><br><br>
                            <span>
                                <a class="btn btn-cmn" href="#" style="width:80%;padding:7px 0px;font-size:1em;">
                                    CONTINUAR SIN REGISTRARSE
                                </a>
                            </span>
                        </div>
                        <div class="col-md-4" style="padding-left:2% !important;">
                            <div class=" font-nexaregular" style="font-weight:bold;margin-bottom:2%;">Inicia sesión
                            </div>
                            <span class="font-light">Inicia sesión para caja rápida. </span>
                            <form class="login-container lcc" style="padding:12px 0px;font-size: 1.2em !important;">
                                <p class="font-light" style="line-height:0px;">Correo Electrónico</p>
                                <p><input type="email" id="username__" style="width:85% !important"></p>
                                <p class="font-light" style="line-height:0px;">Contraseña</p>
                                <p><input type="password" id="pasword__" style="width:85% !important"></p>
                                <p class="font-light"><a href="#">¿Has olvidado la contraseña?</a></p>
                                <br>
                                <input class="btn btn-cmn" type="submit" value="INICIAR SESIÓN Y COMPRAR" style="width:80% !important;;padding:7px 0px;font-size:1em !important; height: 35px; line-height: 23px;">                                
                            </form>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
            </div>
        </main2>

        <div class="aside" style="display: inline-block;text-align: left;padding-left: 4%;">
            <div style="text-align:center;">
                <div class="checkbox" style="display:inline-block;text-align:left;padding-left:4%;">
                    <label class="font-light label-pol" style="display:inline;">
                        <input type="checkbox" id="check_envio" onclick="ObjMain.delivery()" /><i class="helper"></i>
                    </label>
                    <div style="display:inline-block; font-size:1.55em;font-family:'nexaheavyuploaded_file';"> Quiero entrega a domicilio </div>
                </div>
            </div>

            <div id="d_envio" style="display:none;text-align:center; ">
                <div class="tituloTabla1" style="text-align:center;">Departamento</div>
                <select id="s_depa" style="width:55%;font-size:16px !important;" onchange="ObjMain.showProvincesList(this);"></select>
                <div class="tituloTabla1" style="text-align:center;">Provincia</div>
                <select id="sprov" style="width:55%;font-size:16px !important;" onchange="ObjMain.showDistrictsList(this);"></select>
                <div class="tituloTabla1" style="text-align:center;">Distrito</div>
                <select id="sdist" style="width:55%;font-size:16px !important;"></select>
            </div>
            <hr>

            <div>
                <div style="font-size:1.9em;font-weight:bold;text-align:center;color:#c51152;font-family:'nexaregularuploaded_file';">RESUMEN DE TU PEDIDO</div>
                <div class="d_montos">
                    <div class="head-resumen">
                        <div class="n-resumen">#</div>
                        <div class="product-resumen">PRODUCTO</div>
                        <div class="sub-resumen">SUBTOTAL</div>
                    </div>
                    <div class="body-resumen">
                    
                    </div>
                    <div class="head-cupon">Ingrese aquí su cupón de descuento</div>
                    <div class="input-cupon" style="display:flex;">
                        <input type="text" placeholder="Ej. 6W79H6" style="width: 58%; border: 1px solid black;" maxlength="12">
                        <a href="#" class="cup-btn">CANJEAR</a>
                    </div>
                    <div class="footer-resumen">
                        <div class="item-resumen">
                            <div class="n-ind"></div>
                            <div class="n-subtotal_name">SUBTOTAL</div>
                            <div class="sub_cost">-</div>
                        </div>
                        <div class="item-resumen">
                            <div class="n-ind"></div>
                            <div class="shipped_name">COSTO DEL ENVÍO</div>
                            <div class="cost_shipped">-</div>
                        </div>
                        <div class="item-resumen" style="color:#c51152;">
                            <div class="n-ind"></div>
                            <div class="descont_name">DESCUENTO</div>
                            <div class="descont_cost">-</div>
                        </div>
                        <div class="item-resumen" style="color:#c51152;font-weight: bold;">
                            <div class="n-ind"></div>
                            <div class="total_name">TOTAL A PAGAR</div>
                            <div class="total_cost">-</div>
                        </div>
                    </div>
                </div>
            </div>
            <span><a class="btn btn-cmn" href="producto.php" tabindex="2" style="width:100%;margin: 10px 0px;">Seguir comprando</a></span>
            <?php if ( $sesion ): ?>
            <span><a class="btn btn-cmn" href="producto.php" tabindex="2" style="width:100%;margin: 0px 0px;">Comprar</a></span>
            <?php endif; ?>
            <br>

        </div>

    </div>
    <!--Fin de cuerpo-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="modal_foto" role="document">
            <div class="modal-content" style="width:100%">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalCenterTitle" style="text-align:center;font-size:1.8em;font-weight:bold;">MASAJEADOR ANTICELULÍTICO CM 50</h1>

                </div>
                <div class="modal-body">
                    <img src="https://beurer.pe/assets/sources/CM50_01.jpg" style="width: 100%;box-shadow:-3px 3px 25px -3px rgba(0,0,0,0.3); " alt="Placholder Image 2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary1" style="font-size:1.4em;"
                        data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


</main>


<div id="container10" style="margin-top:17em;">
    <div class="loader default default-01">
        <div class='loader-container'>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <div class='ball'></div>
            <img src='assets/images/logotipo-beurer.png' style="width:70%;height:auto;padding:3%;margin-top:15%;">
        </div>
    </div>
</div>





<div class="row" id="parte-contacto" style="width:80%;margin:auto;display:none;">
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
            <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> (+51) 920 198 522 </span>

            <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> (+51) 978 440 034 </span>

        </div>
        <div class="col-md-4 section-contacto"
            style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
            <div class="font-bold" style="font-size:1.92em;text-align:center;">Escríbenos</div>
            <img src="assets/images/icons/email.png" style="width:23%;margin:1.5% 0%;">
            <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> ventas@beurer.pe </span>
            <span class="font-light" style="font-size:1.2rem;padding:0% 16%;display:block;"> ventas1@beurer.pe </span>
        </div>
    </div>
</div>
<br>
<?php include 'src/includes/footer.php' ?>

</body>

</html>