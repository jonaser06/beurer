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
        <main2 style="font-size: 0.75rem !important;">
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
             
                
            </div>
        </main2>

        <div class="aside" style="display: inline-block;text-align: left;padding-left: 4%;">
            <div style="text-align:center;">
                <div class="checkbox" style="display:inline-block;text-align:left;padding-left:4%;">
                    <label class="font-light label-pol" style="display:inline;">
                        <input type="checkbox" id="check_recojo" onclick="ObjMain.recojo()" /><i class="helper"></i>
                    </label>
                    <div style="display:inline-block; font-size:1.55em;font-family:'nexaheavyuploaded_file';">Recoger en Tienda</div>
                </div>
            </div>
            <?php if ( $sesion ): ?>
            <div style="text-align:center;">
                <div class="checkbox" style="display:inline-block;text-align:left;padding-left:4%;">
                    <label class="font-light label-pol" style="display:inline;">
                        <input type="checkbox" id="check_envio" onclick="ObjMain.delivery()" /><i class="helper"></i>
                    </label>
                    <div style="display:inline-block; font-size:1.55em;font-family:'nexaheavyuploaded_file';"> Quiero entrega a domicilio </div>
                </div>
            </div>

            <div id="d_envio" style="display:none;text-align:center; ">
                <div class="checkbox" style="display:inline-block;text-align:left;padding-left:4%;">
                    <label class="font-light label-pol" style="display:inline;">
                        <input type="checkbox" id="check_factura" onclick="ObjMain.factura()" /><i class="helper"></i>
                    </label>
                    <div style="display:inline-block; font-size:1.55em;font-family:'nexaheavyuploaded_file';">Deseo una factura</div>
                </div>
                <!-- <div class="tituloTabla1" style="text-align:center;">Departamento</div>
                <select id="s_depa" style="width:55%;font-size:16px !important;" onchange="ObjMain.showProvincesList(this);"></select>
                <div class="tituloTabla1" style="text-align:center;">Provincia</div>
                <select id="sprov" style="width:55%;font-size:16px !important;" onchange="ObjMain.showDistrictsList(this);"></select>
                <div class="tituloTabla1" style="text-align:center;">Distrito</div>
                <select id="sdist" style="width:55%;font-size:16px !important;"></select> -->
            </div>
            <?php endif; ?>

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
                        <input class="cod-cupon" utype="text" placeholder="Ej. 6W79H6" style="width: 58%; border: 1px solid black;" maxlength="12">
                        <a href="#" onclick="ObjMain.cupon(event);" class="cup-btn">CANJEAR</a>
                    </div>
                    <div class="res-cup"></div>
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
            <span data-toggle="modal"  data-target="#select-stepOne"><a class="btn btn-cmn" data-toggle="modal"  tabindex="2" style="width:100%;margin: 10px 0px;">Ir a Comprar</a></span>
            <?php if ( $sesion ): ?>
                
            <span class="btn-nextCarrito"><a class="btn btn-cmn" href="<?php echo base_url('facturacion'); ?>" tabindex="2" style="width:100%;margin: 0px 0px;outline: none;">Comprar</a></span>
            <?php endif; ?>
            <br>

        </div>
        

    </div>
    <!--Fin de cuerpo-->

   

</main>


<div id="container10" style="margin-top:17em;font-size:90%!important">
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
            <span class="font-light" style="font-size:1.2rem;padding:0;display:block;"> Facebook Messenger de
                Beurer Perú </span>
        </div>
        <div class="col-md-4 section-contacto"
            style="background-color:white;border-radius:8%;width:29.33333333%;margin:2%;padding:2em;text-align:center;">
            <div class="font-bold" style="font-size:1.92em;text-align:center;">Llámanos</div>
            <img src="assets/images/icons/telefono.svg" style="width:28%;margin:1.5% 0%;">
            <span class="font-light" style="font-size:1.2rem;padding:0% 0%;display:block;"> (+51) 920 198 522 </span>

            <span class="font-light" style="font-size:1.2rem;padding:0% 0%;display:block;"> (+51) 978 440 034 </span>

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
<?php if ( !$sesion ): ?>
    <div class="modal fade" id="select-stepOne" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="modal_foto" role="document">
            <div class="modal-content" style="width:100%">
                
                <div class="modal-body" >
                <div style="width:100%; color: #333333;text-align:left;color:black;background-color:white; padding:.5rem 2rem;border-radius:25px;">
                    <div class="row" style="display:flex;flex-direction:column">

                       
                        <div class="col-md-12" style="font-size: 1rem; margin:10px 0">
                            <div class=" font-nexaregular" style="font-weight:bold;margin-bottom:2%;font-size:.9rem">Nuevos clientes</div>
                            <span class="font-light" >¿Eres nuevo? Regístrate aquí y compra ahora. </span>
                            <br>
                            <span>
                                <a class="btn btn-cmn popupBtn" onclick="ObjMain.register_cart(event);">REGÍSTRATE AQUÍ</a>
                            </span>

                        </div>
                        <hr>
                        <div class="col-md-12 compra-sin-clave" style="font-size: 1rem; margin:10px 0">
                            <div class=" font-nexaregular" style="font-weight:bold;margin-bottom:2%;font-size:.9rem">
                                Compra sin clave
                            </div>
                            <span class="font-light">
                                Solo te pediremos algunos datos para el despacho. No serán guardados para tu próxima compra.
                            </span>
                            <br>
                            <input class="btn btn-cmn popupBtn " id="btn-aviso"type="submit" value="CONTINUAR SIN REGISTRARSE" >
                        </div>
                        <hr>
                        <div class="col-md-12" style="font-size: 1rem;">
                            <div class=" font-nexaregular" style="font-weight:bold;margin-bottom:2%;">Inicia sesión
                            </div>
                            <span class="font-light">Inicia sesión para caja rápida. </span>
                            <form class="login-container lcc" style="padding:12px 0px;">
                                <p class="font-light" style="line-height:0px; font-size:.9rem">Correo Electrónico</p>
                                <p><input type="email" id="username__" style="width:85% !important"></p>
                                <p class="font-light" style="line-height:0px;font-size:.9rem">Contraseña</p>
                                <p><input type="password" id="pasword__" style="width:85% !important"></p>
                                <p  style="font-size:.9rem;color:#c51152 !important"><a href="<?= base_url('recovery')?>"
                                style="color:#c51152;font-weight:400">¿Has olvidado la contraseña?</a></p>

                                <input class="btn btn-cmn popupBtn" type="submit" value="INICIAR SESIÓN Y COMPRAR" >                                
                            </form>

                        </div>
                        <hr>
                    </div>
                </div>
                <script>
                    document.querySelector('#btn-aviso').addEventListener('click' ,e => {
                        console.log()
                        e.preventDefault();
                        $('#select-stepOne').modal('hide'); 
                        $('#modal-nextStep').modal('show');
                    })
                    
                </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary1" style="font-size:1.4em;"
                        data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modal-nextStep" tabindex="1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" id="modal_foto" role="document">
                <div class="modal-content" style="width:100%">
                    <div class="modal-header" style="display:flex;justify-content:space-aro">

                        <figure class="header-icon-modal">
                            <img style="width:70px;margin-left:2em"src="<?= base_url('beurer_plantilla/assets/images/steps/paso1.png')?>" alt="icon-modal">
                        </figure>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"class="modal-close" >&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div style="width:100%; text-align:left;color:black;background-color:white; padding:.5rem 2rem;border-radius:25px;">
                        <div class="row" >

                            <div class="col-md-12" style="font-size:1rem;width:100%">
                                <p class="font-nexaregular " style="color:#333333">
                                    Si continuas sin iniciar sesión al hacer el seguimiento de tu pedido mediante tu DNI , sólo
                                    podras acceder ver el estado del último de estos.
                                </p>
                                <br>

                            
                                <span style="opacity:0"class="btn-nextCarrito" >
                                    <a href="<?php echo base_url('facturacion'); ?>">
                                    </a>
                                </span>
                                <span class="btn-nextCarrito" >
                                    <a href="<?php echo base_url('facturacion'); ?>" style="display: flex;justify-content:center">
                                        <span class="btn btn-modal-sgt" >Continuar sin Iniciar sesión</span>                                
                                    </a>
                                </span>
                                
                            </div>
                        
                        </div>
                    </div>
                    
                    </div>
                    
                </div>
            </div>
    </div>

    <div class="modal fade" id="modal-verification" tabindex="-1" 
    role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" id="modal_foto" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display:flex">

                        <figure class="header-icon-modal">
                            <img style="width:40px;margin-left:2em"src="<?= base_url('beurer_plantilla/assets/images/steps/paso1.png')?>" alt="icon-modal">
                        </figure>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"class="modal-close" >&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <div class="content-modal-body" >

                        <form  class="verify-form" action="#" method="POST" >

                             <p>Te hemos enviado un código de verificación a tu correo : 
                             </p>
                            <b class="email-verify">renzoedward23@gmail.com</b>
                            <small>Ingresa los 6 dígitos</small>
                            <div class="code-group">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                                <input type="text">
                            </div>
                            <a href="#"
                                class="reenviar-btn">
                                Reenviar Código
                            </a>
                            
                            <input type="submit"
                            disabled 
                            class="send-verify btn btn-cmn popupBtn"
                            value="Confirmar">
                        </form>
                            
                        </div>
                    
                </div>
                    
                </div>
            </div>
    </div>
<?php endif ?>


<?php include 'src/includes/footer.php' ?>

</body>

<style>

   body {
       font-size: 62.5%!important;
   }
.header-icon-modal {
    flex:1
}
.modal-close {
 color:#c51152 !important;
 font-weight:bold !important;
 font-size:2em!important;
}
.modal-header button {
 display: flex;
 }
.btn-modal-sgt {
    font-family: 'nexa-bolduploaded_file';
    margin:0  auto;
    color: #c51152;
    font-weight:bold;
    /* color:#fff;
    background:#c51152; */
    padding: .5rem 1rem;
    font-size: 1.1rem;
    border-radius: 25px;
    border:1.5px solid #c51152;
    transition: .3s all ease-in;
    outline:none
}
.btn-modal-sgt:hover{
     color: #c51152;
    border:2px solid #c51152;
    font-size: 1.1rem;
    font-weight: bold;
    padding:.5rem 1rem;
    color:#fff;
    background:#c51152
}
#modal-nextStep>.modal-dialog {
    display: flex;
    justify-content: center;
    align-items: center;
}
.popupBtn:focus, .btn-cmn:focus {
    outline:none!important;
    border:none!important
}
    
</style>
</html>