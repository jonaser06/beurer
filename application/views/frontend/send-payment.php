<?php include 'src/includes/header.php' ?>



<input type="hidden" class="dataUser"
    data-id="<?= $session = isset($userData['id_cliente'] ) ? $userData['id_cliente'] : 0;?>">

<main class="main-detail-products">

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
            <span class="step_off noactive">Datos y Facturación</span>

            <span class="step_arrow"></span>
            <span class="step_off active">Envío y Pago</span>

            <span class="step_arrow"></span>
            <span class="step_off noactive">Resumen de Pedido</span>
        </div>
    </div>

    <div class="formulario" style="background-color:transparent;">
        <br>
        <div class="font-nexaheavy"
            style="height:100%;font-size:2.5rem;background-image:url('assets/images/fondo1.png');background-color:white;color:#c51152;border-radius:25px; width:85%;text-align:left;margin:auto;padding:2.5%;">
            Información de Pedido </div>
        <br></br>
        <div style="text-align:center;">
            <div class="row paso3" style="text-align:left; margin:auto; width:85%">
                <div class="col-md-6 col-sm-12">
                    <ul
                        style="list-style-image: url(<?= base_url('beurer_plantilla/assets/images/check-solid.svg')?>);background-color:white;border-radius:8%; font-size:1.2em;padding:6% 7%;">
                        <li class="font-nexaheavy title-envio" style="list-style:none;font-size:1.4em;"></li>

                        <div class="dataComprador">

                        </div>

                        <br>

                    </ul>


                    <br>
                </div>
                <div class="col-md-6 col-sm-12" style="background-color:white;border-radius:8%">
                    <div class="resumen-pedido3" style="padding:5% 12%;">
                        <div class="titulo font-nexaheavy" style="text-align:center;color:#c51152">RESUMEN DE TU PEDIDO
                        </div>
                        <br>
                        <div class="d_montos">
                            <table class="table tbl-resumen" style="font-size:1.15em;">
                                <thead class="font-nexaheavy" style="font-size:.9em;">
                                    <tr>
                                        <th style="padding-right:8%;" scope="col">#</th>
                                        <th scope="col">PRODUCTO</th>

                                        <th scope="col " style="text-align:right;">SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody class="table-products" style="font-size:0.9em;">



                                </tbody>
                            </table>
                            <table class="table tbl-resumen" style="font-size:1.15em;">

                                <tbody style="font-size:0.9em;">
                                    <tr>

                                        <td></td>
                                        <td scope="row" style=" text-align:left;vertical-align:middle;">SUBTOTAL</td>

                                        <td class="subtotalr" id="subtotal_pago" style="text-align:right;"></td>
                                    </tr>

                                    <tr class="tr_cupon" style="display:none">
                                        <td></td>
                                        <td scope="row" style=" text-align:left;vertical-align:middle;">CUPÓN</td>

                                        <td id="cupon_descuento" style="color:#c51152;text-align:right;"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td scope="row" style=" text-align:left;vertical-align:middle;">COSTO DEL ENVÍO
                                        </td>

                                        <td class="subtotalr" id="envio_pago" style="text-align:right;"></td>
                                    </tr>



                                    <tr style="background-color:white;font-weight:bold;color:black;font-size:1.3em;">
                                        <td></td>
                                        <td scope="row" style="padding:3%;vertical-align:middle;">TOTAL A PAGAR</td>

                                        <td id="total_pago" class="subtotalr" style="text-align:right;"></td>
                                    </tr>


                                </tbody>



                            </table>

                            <div class="row" align="CENTER">
                                <div class="col-md-12">
                                    <div style="font-size:1.2em;text-align:right;">Para culminar con su compra, haga
                                        click en el siguiente botón para ingresar los datos de su tarjeta. Todo el
                                        proceso está 100% seguro.</div>
                                    <br>
                                    <div class="content-slide cards-container">
                                        <div class="cards">
                                            <img src="assets/svg/visa@3x.png" alt="visa">
                                            <img src="assets/svg/master@3x.png" alt="master">
                                            <img src="assets/svg/expres@3x.png" alt="expres">
                                            <img src="assets/svg/club@3x.png" alt="club">
                                            <img src="assets/svg/efectivo@3x.png" alt="efectivo">
                                            <img src="assets/svg/shop.svg" alt="">
                                        </div>
                                        <p>Aceptamos todos los <br> medios de pago y/o Transferencias</p>
                                    </div>


                                    <div>
                                        <button id="buy" class="btn btn-cmn buy" style="font-size:1.5em">PAGAR</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row" style="width:85%;margin:auto;">
                <div class="col-md-12">
                    <div class="col-md-4 section-contacto"
                        style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
                        <div class="font-bold" style="font-size:1.92em;text-align:center;">Chatea con nosotros</div>
                        <img src="assets/images/icons/mensajero.svg" style="width:20%;margin:5% 0%;"><br>
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> Facebook
                            Messenger de Beurer Perú </span>
                    </div>
                    <div class="col-md-4 section-contacto"
                        style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
                        <div class="font-bold" style="font-size:1.92em;text-align:center;">Llámanos</div>
                        <img src="assets/images/icons/telefono.svg" style="width:28%;margin:1.5% 0%;">
                        <span class="font-light" style="font-size:1.2em;padding:0%;display:block;"> (+51) 920 198
                            522 </span>

                        <span class="font-light" style="font-size:1.2em;padding:0%;display:block;"> (+51) 978 440
                            034 </span>

                    </div>
                    <div class="col-md-4 section-contacto"
                        style="background-color:white;border-radius:8%;min-height:14rem;width:29.33333333%;margin:2%;padding:2em;">
                        <div class="font-bold" style="font-size:1.92em;text-align:center;">Escríbenos</div>
                        <img src="assets/images/icons/email.png" style="width:23%;margin:1.5% 0%;">
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;"> ventas@beurer.pe
                        </span>
                        <span class="font-light" style="font-size:1.2em;padding:0% 16%;display:block;">
                            ventas1@beurer.pe </span>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin de cuerpo-->

</main>




<?php include 'src/includes/footer.php'?>
<script src="https://checkout.culqi.com/js/v3"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">


<script>
Culqi.publicKey = "<?php echo PUBLIC_KEY ?>"
const session = parseInt(document.querySelector('.dataUser').dataset.id);
const productos = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) : []
const subtotal = localStorage.getItem('subtotal') ? localStorage.getItem('subtotal') : 0
const envio = localStorage.getItem('costo_envio') ? localStorage.getItem('costo_envio') : 0
const cantidad = localStorage.getItem('cantidad') ? localStorage.getItem('cantidad') : 0
let tipo_cupon = localStorage.getItem('tipo') ? parseInt(localStorage.getItem('tipo')) : null
let descuento = localStorage.getItem('descuento') ? parseFloat(localStorage.getItem('descuento')) : 0
let cupon = localStorage.getItem('descuento') ? true : false
const user = localStorage.getItem('domicilio') ? JSON.parse(localStorage.getItem('Comprador')) : JSON.parse(localStorage
    .getItem('Comprador'))
const dest = localStorage.getItem('Destinatario') ? JSON.parse(localStorage.getItem('Destinatario')) : false
const facturacion = localStorage.getItem('facturacion') ? JSON.parse(localStorage.getItem('facturacion')) : false
const cupon_codigo = localStorage.getItem('cupon_codigo') ? localStorage.getItem('cupon_codigo') : 0;
let total = 0
let cupon_descuento = 0;
if (cupon) {
    if (tipo_cupon == 1) {
        document.querySelector('#cupon_descuento').textContent = `${parseFloat(descuento).toFixed(2)} %`
        cupon_descuento = parseFloat(subtotal) * (descuento / 100)
        total = `${(((parseFloat(subtotal)* descuento/100) + parseFloat(envio))).toFixed(2)*100}`
    }
    if (tipo_cupon == 2) {
        document.querySelector('#cupon_descuento').textContent = `- ${parseFloat(descuento).toFixed(2)}`
        cupon_descuento = parseFloat(descuento).toFixed(2);
        total = `${(parseFloat(envio) + parseFloat(subtotal) - descuento ).toFixed(2) *100 }`
    }
} else {
    total = `${((parseFloat(envio) + parseFloat(subtotal))).toFixed(2) *100}`;
}

// document.getElementById('buy').addEventListener('click', event => {

//     Culqi.open();
//     // $('html, body').animate({scrollTop:0}, 'slow');
//     event.preventDefault();

// })
function converter() {
    let id_products = [],
        cant_products = [],
        subtotal_products = [];
        colores_productos = [];
    productos.forEach(prod => {
        id_products.push(prod.id);
        cant_products.push(prod.cantidad);
        subtotal_products.push(prod.cantidad * prod.precio_online);
        // filtro para producto color 
        let color = prod.color ? prod.color : 'none';
        colores_productos.push(color);
    })
    return {
        id_products: id_products.join('-'),
        cant_products: cant_products.join('-'),
        subtotal_products: subtotal_products.join('-'),
        colores_prods: colores_productos.join('-')

    }
}

function dataFormPurchase(charge) {
    const formData = new FormData();
    formData.append('nombres', charge.nombres);
    formData.append('apellidos', charge.apellidos);
    formData.append('correo', charge.correo);
    formData.append('tipo_documento', charge.tipo_documento);
    formData.append('numero_documento', charge.numero_documento);
    formData.append('provincia', 'Lima');
    formData.append('distrito', charge.distrito);
    formData.append('telefono', charge.telefono);
    formData.append('d_envio', charge.d_envio);
    formData.append('referencia', charge.referencia);
    formData.append('entrega_precio', charge.envio);
    formData.append('id_cliente', charge.id_session);
    formData.append('subtotal', charge.subtotal);
    formData.append('tipo_cupon', charge.tipo_cupon);
    formData.append('cupon_codigo', charge.cupon_codigo);
    formData.append('cupon_descuento', charge.cupon_descuento);

    formData.append('id_productos', charge.id_productos);
    formData.append('cantidades', charge.cantidades);
    formData.append('subtotales', charge.subtotales);
    if (charge['destinatario']) {
        charge.destinatario = JSON.parse(charge.destinatario)
        formData.append('dest_nombres', charge.destinatario.dest_nombres)
        formData.append('dest_telefono', charge.destinatario.dest_telefono)
        formData.append('dest_tipo_doc', charge.destinatario.dest_tipo_doc)
        formData.append('dest_number_doc', charge.destinatario.dest_number_doc)
    }
    if (charge['facturacion']) {
        charge.facturacion = JSON.parse(charge.facturacion)
        formData.append('ruc', charge.facturacion.ruc)
        formData.append('r_social', charge.facturacion.r_social)
        formData.append('r_fiscal', charge.facturacion.r_fiscal)
    }
    return formData;
}

function dataFormSend(token, email) {

    const formData = new FormData();
    formData.append('token', token);
    formData.append('correo', email);
    formData.append('id_session', session);
    formData.append('nombres', `${user.nombres}`);
    formData.append('apellidos', `${user.apellido_paterno} ${user.apellido_materno}`);
    formData.append('telefono', user.telefono);
    formData.append('distrito', `${user.distrito}`);
    formData.append('d_envio', user.d_envio);
    formData.append('referencia', user.referencia);
    formData.append('tipo_documento', user.tipo_doc);
    formData.append('numero_documento', user.number_doc);

    formData.append('id_productos', converter().id_products);
    formData.append('cantidades', converter().cant_products);
    formData.append('subtotales', converter().subtotal_products);

    formData.append('cantidad_total', cantidad);
    formData.append('subtotal_coste', subtotal);
    formData.append('envio_coste', envio);
    formData.append('tipo_cupon', `${tipo_cupon == null ? 0 : tipo_cupon }`);
    formData.append('cupon_descuento', cupon_descuento);
    formData.append('cupon_codigo', cupon_codigo);
    formData.append('total_coste', total);
    if (dest) {
        formData.append('flag_dest', true)
        formData.append('dest_nombres', dest.nombres)
        formData.append('dest_apellidos', dest.apellidos)
        formData.append('dest_telefono', dest.telefono)
        formData.append('dest_tipo_doc', dest.tipo_doc)
        formData.append('dest_number_doc', dest.number_doc)
    }
    if (facturacion) {
        formData.append('flag_facturacion', true)
        formData.append('ruc', facturacion.ruc)
        formData.append('r_social', facturacion.r_social)
        formData.append('r_fiscal', facturacion.r_fiscal)
    }
    return formData;
}

function dataFormSendOrder() {


    const formData = new FormData();
    formData.append('correo', user.correo);
    formData.append('id_session', session);
    formData.append('nombres', `${user.nombres}`);
    formData.append('apellidos', `${user.apellido_paterno} ${user.apellido_materno}`);
    formData.append('telefono', user.telefono);
    formData.append('distrito', `${user.distrito}`);
    formData.append('d_envio', user.d_envio);
    formData.append('referencia', user.referencia);
    formData.append('tipo_documento', user.tipo_doc);
    formData.append('numero_documento', user.number_doc);

    formData.append('id_productos', converter().id_products);
    formData.append('cantidades', converter().cant_products);
    formData.append('subtotales', converter().subtotal_products);

    formData.append('cantidad_total', cantidad);
    formData.append('subtotal_coste', subtotal);
    formData.append('envio_coste', envio);
    formData.append('tipo_cupon', `${tipo_cupon == null ? 0 : tipo_cupon }`);
    formData.append('cupon_descuento', cupon_descuento);
    formData.append('cupon_codigo', cupon_codigo);
    formData.append('total_coste', total);
    if (dest) {
        formData.append('flag_dest', true)
        formData.append('dest_nombres', dest.nombres)
        formData.append('dest_telefono', dest.telefono)
        formData.append('dest_tipo_doc', dest.tipo_doc)
        formData.append('dest_number_doc', dest.number_doc)
    }
    if (facturacion) {
        formData.append('flag_facturacion', true)
        formData.append('ruc', facturacion.ruc)
        formData.append('r_social', facturacion.r_social)
        formData.append('r_fiscal', facturacion.r_fiscal)
    }
    return formData;
}

function dataFormOrder(order) {
    const formData = new FormData();
    const monto = order.amount / 100;
    const user_type = parseInt(order.metadata.id_session) == 0 ? 'invitado' : 'autenticado';
    formData.append('id_orden', order.id);
    formData.append('estado', order.state);
    formData.append('cip', order.payment_code);
    formData.append('monto', monto);
    formData.append('usuario', `${order.metadata.nombres} ${order.metadata.apellidos}`);
    formData.append('telefono', order.metadata.telefono);
    formData.append('correo', order.metadata.correo);
    formData.append('tipo_user', user_type);
    formData.append('detalles', JSON.stringify(order.metadata));
    return formData;
}

function modalCheckout(title, icon, message, color) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
        showCancelButton: false,
        confirmButtonColor: '#C51152',
        confirmButtonText: "continuar",
        // closeOnConfirm: false    
    })
}


function culqi() {

    if (Culqi.token) {
        console.log('token')
        const token = Culqi.token.id;
        const email = Culqi.token.email;
        const formSend = dataFormSend(token, email)
        Culqi.close()
        ObjMain.ajax_post('POST', `${DOMAIN}ajax/createCharge`, formSend)
            .then(resp => {

                resp = JSON.parse(resp);
                resp = JSON.parse(resp)
                if (resp.object == 'charge') {
                    const {
                        ...charge
                    } = resp;
                    if (charge.outcome.type == "venta_exitosa") {
                        const {
                            metadata
                        } = charge;
                        const {
                            antifraud_details
                        } = charge;
                        const formCharge = dataFormPurchase(metadata);
                        formCharge.append('codigo_venta', charge.reference_code);
                        formCharge.append('telefono', antifraud_details.phone);
                        formCharge.append('xratioColors',converter().colores_productos); // enviamos colores
                        ObjMain.ajax_post('POST', `${DOMAIN}ajax/purchase`, formCharge)
                            .then(resp => {
                                resp = JSON.parse(resp);
                                if (resp.status) {

                                    localStorage.setItem('id_pedido', resp.data.codigo_pedido);
                                    modalCheckout('Gracias por su compra', 'success',
                                        `${charge.outcome.user_message}`, '#C5115')
                                    setTimeout(() => window.location = `${DOMAIN}order-summary`, 1000);
                                }
                            })
                            .catch(err => {
                                console.log(err)
                            });
                    }
                } else {
                    modalCheckout('Error', 'error', `${resp.user_message}`, '#C5115')
                }
            })
            .catch(err => {
                console.log(err)

            });
    } else if (Culqi.order) {
        console.log(Culqi.order)
        const {
            ...order
        } = Culqi.order;
        localStorage.setItem('order', JSON.stringify(order));
        const formOrder = dataFormOrder(Culqi.order);
        const phone = JSON.parse(localStorage.getItem('Comprador')).telefono;
        formOrder.append('telefono', phone)

        ObjMain.ajax_post('POST', `${DOMAIN}ajax/purchaseOrder`, formOrder)
            .then(resp => {
                resp = JSON.parse(resp);
                if (resp.status) {
                    localStorage.setItem('id_order', resp.data.orden_id);
                    setTimeout(() => window.location = `${DOMAIN}order-summary`, 1000);
                }
            })
            .catch(err => {
                console.log(err)
            });
    } else {
        console.log(Culqi.error);
        alert(Culqi.error.user_message);
    }
}
</script>