/* Control de eventos 
*  ObjMain.init : objeto que que inicializa los eventos
*  ObjMain.ajax_post : objeto para peticiones ajax
*
*  ObjMain.getDataCarrito()    : retorna un obj con  los datos del carrito

*      ObjMain.caclEnvio( float :vol ,float : peso ) 
****    vol : volumen total del carrito 
****    peso : peso total del carrito
****    return : RETORNA UN OBJETO con el coste_envio como attr
* ObjMain.stateProgress( param )   @param : int (1 || 2 || 3 ||4)  dependiendo del estado / pinta la barra de porcentaje
*
*/

var ubigeoPeru = {
    ubigeos: new Array()
};
let DOMAIN;
let filterResult = false;
let intento = 1;

ObjMain = {
    init: () => {
        DOMAIN = (window.location.hostname == 'localhost') ? 'http://localhost/beurer/' : 'https://www.blogingenieria.site/';
        ObjMain.changueColor('#principal-img', '.selectColor', '.btnAddCarrito');
        ObjMain.changueQuanty('#aum', '#dism', '#cantidad_prod', '.btnAddCarrito');
        ObjMain.modalCarrito('.btnAddCarrito', '.cantidadModal');
        if (window.location.href == (DOMAIN + 'registro')) {
            console.log('Pagina de registro');
            ObjMain.load_ubigeo()
                // ObjMain.defaultUbigeo();
        }
        if (window.location.href == (`${DOMAIN}facturacion`)) {
            localStorage.removeItem('Destinatario')
            localStorage.removeItem('facturacion')
            ObjMain.load_ubigeo();
            ObjMain.recibir_ofertas();
            // ObjMain.defaultUbigeo();
        }
        if (window.location.href == (`${DOMAIN}reclamos`)) {
            ObjMain.load_ubigeo();
            // ObjMain.defaultUbigeo();
        }
        if (window.location.href == (`${DOMAIN}send-payment`)) {
            if (localStorage.getItem('id_order')) {
                localStorage.removeItem('id_order')
            }
            ObjMain.showDataSales();
            // ObjMain.createOrder();
            ObjMain.culqiInit();
        }
        if (document.querySelector('.login') != null) {
            ObjMain.sign_in();
        }
        if (document.querySelector('.lcc') != null) {
            ObjMain.sign_in_cart();
        }
        if (document.querySelector('.email-recovery') != null) {
            ObjMain.recovery();
        }
        if (document.querySelector('.change_password') != null) {
            ObjMain.changePassword();
        }
        if (document.querySelector('.change_password') != null) {
            ObjMain.changePassword();
        }
        ObjMain.comparePass()
        ObjMain.updatePass()
        ObjMain.limitPass('#currentPass', 5)
        ObjMain.showPass('.eyes')
        if (document.querySelector('#container10') != null) {
            ObjMain.overload();
        }
        if (window.location.href == (`${DOMAIN}carrito`)) {
            ObjMain.listar_items();
            ObjMain.nextStepCarrito();
        }
        if (window.location.href == (`${DOMAIN}order-summary`)) {
            if (localStorage.getItem('id_order')) {
                ObjMain.resumeOrder();
                console.log('****** resumen orden ******');
                // setTimeout(localStorage.clear(), 2000)
                return
            } else {
                ObjMain.resumePedido(parseInt(localStorage.getItem('id_pedido')));
                setTimeout(localStorage.clear(), 2000)
                console.log('****resumen pedido *******')
            }
        }
    },
    recibir_ofertas: () => {
        document.querySelector('#publicidad').addEventListener('change', (event) => {
            if (event.target.checked) {
                let nombres = document.getElementById('c_nombres1').value;
                let apellidos = document.getElementById('c_apellido_paterno').value + ' ' + document.getElementById('c_apellido_materno').value;
                let correo = document.getElementById('c_correo1').value;

                if (nombres != "", apellidos != "", correo != "") {
                    let formData = new FormData();
                    formData.append('nombres', nombres);
                    formData.append('apellidos', apellidos);
                    formData.append('correo', correo);
                    formData.append('session', session)
                    ObjMain.ajax_post('POST', DOMAIN + 'ajax/setoferta', formData)
                        .then((resp) => {
                            resp = JSON.parse(resp);
                            if (resp.status) {

                            }
                        })
                        .catch((err) => {
                            err = JSON.parse(err);
                        });
                }
            }
        });
    },
    reclamos: (e) => {
        e.preventDefault();
        let r_tipo_doc = document.querySelector('#s_tipodoc').value;
        let r_n_doc = document.querySelector('#r_n_doc').value;
        let r_nombr = document.querySelector('#r_nombr').value;
        let r_apat = document.querySelector('#r_apat').value;
        let r_amat = document.querySelector('#r_amat').value;
        let r_telef = document.querySelector('#r_telef').value;
        let r_correo = document.querySelector('#r_correo').value;
        let r_depa = document.querySelector('#s_depa').value;
        let r_prov = document.querySelector('#sprov').value;
        let r_dist = document.querySelector('#sdist').value;
        let r_direc = document.querySelector('#r_direc').value;
        let r_menor = (document.querySelector('#menor_edad').checked) ? 1 : 0;
        let r_apd_nombr = document.querySelector('#r_apd_nombr').value;
        let r_apd_tip = document.querySelector('#r_apd_tip').value;
        let r_apd_doc = document.querySelector('#r_apd_doc').value;
        let r_apd_telf = document.querySelector('#r_apd_telf').value;
        let r_apd_corr = document.querySelector('#r_apd_corr').value;

        let r_tipo_bn
        let radios = document.getElementsByName('r_tipo_bn');
        for (var i = 0, length = radios.length; i < length; i++) {
            r_tipo_bn = (radios[i].checked) ? radios[i].value : 'servicio';
            break;
        }

        let r_mont = document.querySelector('#r_mont').value;
        let r_descr = document.querySelector('#r_descr').value;
        let r_codigo = document.querySelector('#r_codigo').value;

        let r_tip_rec
        let radios2 = document.getElementsByName('r_tip_rec');
        for (var i = 0, length = radios2.length; i < length; i++) {
            r_tip_rec = (radios2[i].checked) ? radios2[i].value : 'reclamo';
            break;
        }

        let r_rec_desc = document.querySelector('#r_rec_desc').value;
        let r_rec_pedi = document.querySelector('#r_rec_pedi').value;

        if (r_tipo_doc != '' && r_n_doc != '' && r_nombr != '' && r_apat != '' && r_amat != '' && r_telef != '' && r_correo != '' && r_depa != '' && r_prov != '' && r_dist != '' && r_direc != '' && r_tipo_bn != '' && r_mont != '' && r_descr != '' && r_codigo != '' && r_tip_rec != '' && r_rec_desc != '' && r_rec_pedi != '') {

            let formData = new FormData();
            formData.append('r_tipo_doc', r_tipo_doc);
            formData.append('r_n_doc', r_n_doc);
            formData.append('r_nombr', r_nombr);
            formData.append('r_apat', r_apat);
            formData.append('r_amat', r_amat);
            formData.append('r_telef', r_telef);
            formData.append('r_correo', r_correo);
            formData.append('r_depa', r_depa);
            formData.append('r_prov', r_prov);
            formData.append('r_dist', r_dist);
            formData.append('r_direc', r_direc);
            formData.append('r_menor', r_menor);
            formData.append('r_apd_nombr', r_apd_nombr);
            formData.append('r_apd_tip', r_apd_tip);
            formData.append('r_apd_doc', r_apd_doc);
            formData.append('r_apd_telf', r_apd_telf);
            formData.append('r_apd_corr', r_apd_corr);
            formData.append('r_tipo_bn', r_tipo_bn);
            formData.append('r_mont', r_mont);
            formData.append('r_descr', r_descr);
            formData.append('r_codigo', r_codigo);
            formData.append('r_tip_rec', r_tip_rec);
            formData.append('r_rec_desc', r_rec_desc);
            formData.append('r_rec_pedi', r_rec_pedi);

            ObjMain.ajax_post('POST', DOMAIN + 'ajax/setreclamo', formData)
                .then((resp) => {
                    resp = JSON.parse(resp);
                    if (resp.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Enviado correctamente',
                            text: 'Su reclamo se envio correctamente',
                        })
                        setTimeout(() => {
                            window.location = DOMAIN;
                        }, 1000);
                    }
                })
                .catch((err) => {
                    err = JSON.parse(err);
                    ObjMain.alert_form(false, err.message);
                });

        } else {
            return ObjMain.alert_form(false, 'Rellene todo los campos!');
        }


    },
    register_cart: (e) => {
        e.preventDefault();
        let url = window.location.href;
        localStorage.setItem('reg-redir', url);
        window.location = DOMAIN + 'registro';
    },
    recalculo: (item = []) => {
        let sub = 0;
        let vol = 0;
        let weight = 0;
        /* table vol */
        let vol_big = parseFloat(120.20);
        let vol_small = parseFloat(90.50);
        /* table weight */
        let weight_big = parseFloat(50.00);
        let weight_small = parseFloat(30.00);

        item.forEach((p, index) => {
            /* precioproducto x cantidad */
            let ppxc = parseFloat(p.precio_online) * parseInt(p.cantidad);
            sub = sub + ppxc;
            /* volumen x cantidad */
            let vxc = parseFloat(p.volumen) * parseInt(p.cantidad);
            vol = vol + vxc;
            /* peso x cantidad */
            let pxc = parseFloat(p.peso) * parseInt(p.cantidad);
            weight = weight + pxc;
        });
        document.querySelector('.sub_cost').innerHTML = (sub).toFixed(2);
        const {...resp } = ObjMain.calcEnvio(vol, weight)

        localStorage.setItem('subtotal', sub);
        localStorage.setItem('volumen_total', vol);
        localStorage.setItem('peso_total', weight);
        if (localStorage.getItem('recojo')) {
            document.querySelector('#check_recojo').checked = true
                // document.getElementById("check_envio").disabled = true

            resp.total_coste = 0;
        }
        localStorage.setItem('costo_envio', resp.total_coste);
        document.querySelector('.cost_shipped').textContent = parseFloat(resp.total_coste).toFixed(2)
        localStorage.removeItem('descuento')
        localStorage.removeItem('tipo')
        localStorage.removeItem('cupon_codigo')
        ObjMain.costo_total();

    },
    costo_total: () => {
        let total = 0;
        const sub = localStorage.getItem('subtotal') ? parseFloat(localStorage.getItem('subtotal')) : 0;
        const envio = localStorage.getItem('costo_envio') ? parseFloat(localStorage.getItem('costo_envio')) : 0;
        let desc = localStorage.getItem('descuento') ? parseFloat(localStorage.getItem('descuento')) : 0;
        const tipo = localStorage.getItem('tipo') ? parseInt(localStorage.getItem('tipo')) : null;

        // const cupon = localStorage.getItem('cupon') ? localStorage.getItem('cupon') : 0 ;
        if (tipo == 1) {
            total = sub * (desc / 100)

        }
        if (tipo == 2) {
            total = sub;
            total = total - desc;
        }
        if (tipo == null) {
            total = sub
        }
        console.log(total, envio)
        let costo_total = total + envio
        document.querySelector('.total_cost').textContent = costo_total.toFixed(2);

    },
    listar_items: () => {
        let item = localStorage.getItem('productos');
        if (item) {
            item = JSON.parse(item);
            ObjMain.recalculo(item);
            item.forEach((p, index) => {
                document.querySelector('.carrito-container').innerHTML += ObjMain.item_carrito(index, p.id, p.cantidad, p.img, p.precio, p.precio_online, p.producto_sku, p.subtotal, p.title);
                document.querySelector('.body-resumen').innerHTML += ObjMain.pedido(index, p.id, p.cantidad, p.img, p.precio, p.precio_online, p.producto_sku, p.subtotal, p.title);
            });
        } else {
            console.log('Sin productos en el carrito');
        }
    },
    pedido: (index, id, cantidad, img, precio, precio_online, producto_sku, subtotal, title) => {
        index = index + 1;
        precio_online = precio_online * cantidad;
        let pedido = '';
        pedido += '<div class="item-body-resumen ibr-' + id + '">';
        pedido += '<div class="ind-resumen">' + index + '</div>';
        pedido += '<div class="name-resumen">' + title + '</div>';
        pedido += '<div class="cost-partial" id="res-' + id + '">' + (precio_online).toFixed(2) + '</div>';
        pedido += '</div>';
        return pedido;
    },
    item_carrito: (index, id, cant, img, precio, precio_online, producto_sku, subtotal, title) => {
        subtotal = (precio_online * cant).toFixed(2);
        let item = '';
        item += '<div class="basket-product" data-id="' + id + '">';
        item += '<div class="item">';
        item += '<a class="product-image" data-toggle="modal" onclick=ObjMain.modal("' + img + '") data-target="#exampleModal">';
        item += '<img src="' + DOMAIN + img + '" alt="Placholder Image 2" class="product-frame"></a>';
        item += '<div class="product-details">';
        item += '<span>' + title + '</span>';
        item += '<p>SKU: ' + producto_sku + '</p>';
        item += '<p>Envío a domicilio</p>';
        item += '</div>';
        item += '</div>';
        item += '<div class="price" id="preuni">';
        item += '<div class="info-prod" style="display:block;">';
        item += '<img src="assets/images/precio-online.png">';
        item += '<div class="font-nexaheav text-left price rprice"> ' + precio_online + '</div>';
        item += '<input type="hidden" class="precio-' + id + '" value="' + precio_online + '">';
        item += '</div>';
        item += '<div class="font-nexaheav">Normal: S/ ' + precio + '</div>';
        item += '</div>';
        item += '<div class="quantity">';
        item += '<button class="count-cant" onclick="ObjMain.menos(' + id + ');">-</button>';
        item += '<input class="form-control-field cantidad cant-' + id + ' cantidad_prod" name="pwd" value="' + parseInt(cant) + '" type="text" min="1" readonly>';
        item += '<button class="count-cant" onclick="ObjMain.mas(' + id + ');">+</button>';
        item += '</div>';
        item += '<div class="subtotal rsubtotal sub-' + id + '" id="subtotal">' + subtotal + '</div>';
        item += '<div class="remove">';
        item += '<a id="trash" href="#"><img src="assets/images/nuevo/delete.png" alt="" onclick=ObjMain.delete(event)></a>';
        item += '</div>';
        item += '</div>';
        return item;
    },
    delivery: () => {
        d_envio = document.getElementById("d_envio");
        var checkBo = document.getElementById("check_envio");
        if (checkBo.checked == true) {
            // document.getElementById("check_recojo").disabled = true
            document.getElementById("check_recojo").checked = false
            ObjMain.recojo()

            // d_envio.style.display = "block";
            // ObjMain.load_ubigeo();
            localStorage.setItem('domicilio', true);
        } else {
            d_envio.style.display = "none";
            localStorage.removeItem('domicilio');
            document.getElementById("check_recojo").disabled = false

        }
    },
    recojo: () => {
        const $checkRecojo = document.getElementById("check_recojo");

        let item = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) : [];
        if ($checkRecojo.checked == true) {
            if (document.getElementById("check_envio")) {
                document.getElementById("check_envio").checked = false
                ObjMain.delivery()
            }
            localStorage.setItem('recojo', true);
            ObjMain.recalculo(item)
        } else {
            if (document.getElementById("check_envio")) {
                document.getElementById("check_envio").disabled = false
            }
            localStorage.removeItem('recojo');
            ObjMain.recalculo(item)
        }


    },
    factura: () => {
        var fact = document.getElementById("check_factura");
        if (fact.checked == true) {
            localStorage.setItem('factura', true);
        } else {
            localStorage.removeItem('factura');
        }
    },
    delete: (event) => {
        event.preventDefault();
        let id = event.path[3].getAttribute('data-id');
        event.path[3].remove();
        document.querySelector('.ibr-' + id).remove();
        /* eliminar de localstorage */
        let productos = localStorage.getItem('productos');
        if (productos) {
            productos = JSON.parse(productos);
            for (let i = 0; i < productos.length; i++) {
                if (productos[i].id == id) {
                    console.log('--------Eliminando--------');
                    delete productos[i];
                }
            }
        }
        productos = productos.filter(function(e) { return e != null; });

        localStorage.setItem('productos', JSON.stringify(productos));

        /* recalcular */
        let item = localStorage.getItem('productos');
        item = JSON.parse(item);
        ObjMain.recalculo(item);

    },
    mas: (id) => {

        if (parseInt(document.querySelector('.cant-' + id).value) < 6) {
            let cantidad = parseInt(document.querySelector('.cant-' + id).value);
            let ncantidad = cantidad + 1;
            let precio = parseFloat(document.querySelector('.precio-' + id).value).toFixed(2);
            let subtotal = (ncantidad * precio).toFixed(2);
            document.querySelector('.cant-' + id).value = ncantidad;
            document.querySelector('.sub-' + id).innerHTML = subtotal;
            document.querySelector('#res-' + id).innerHTML = subtotal;
            /* update productos */
            let productos = localStorage.getItem('productos');
            if (productos) {
                productos = JSON.parse(productos);
                for (let i = 0; i < productos.length; i++) {
                    if (productos[i].cantidad == cantidad) {
                        productos[i].cantidad = ncantidad;
                        break;
                    }
                }
            }
            localStorage.setItem('productos', JSON.stringify(productos));
            /* recalcular */
            let item = localStorage.getItem('productos');
            item = JSON.parse(item);
            ObjMain.recalculo(item);
        };

        return;
    },
    menos: (id) => {
        if (parseInt(document.querySelector('.cant-' + id).value) > 1) {
            let cantidad = parseInt(document.querySelector('.cant-' + id).value);
            let ncantidad = cantidad - 1;
            let precio = parseFloat(document.querySelector('.precio-' + id).value).toFixed(2);
            let subtotal = (ncantidad * precio).toFixed(2);
            document.querySelector('.cant-' + id).value = ncantidad;
            document.querySelector('.sub-' + id).innerHTML = subtotal;
            document.querySelector('#res-' + id).innerHTML = subtotal;
            /* update productos */
            let productos = localStorage.getItem('productos');
            if (productos) {
                productos = JSON.parse(productos);
                for (let i = 0; i < productos.length; i++) {
                    if (productos[i].cantidad == cantidad) {
                        productos[i].cantidad = ncantidad;
                        break;
                    }
                }
            }
            localStorage.setItem('productos', JSON.stringify(productos));
            /* recalcular */
            let item = localStorage.getItem('productos');
            item = JSON.parse(item);
            ObjMain.recalculo(item);
        };

        return;
    },
    modal: (img) => {
        console.log(img);
        let imgmodal = '<img src="' + DOMAIN + img + '" style="width: 100%;box-shadow:-3px 3px 25px -3px rgba(0,0,0,0.3); " alt="Placholder Image 2"></img>';
        document.querySelector('.modal-body').innerHTML = imgmodal;

        var prueba = document.getElementById("modal_foto");
        prueba.style.paddingTop = $(window).scrollTop() - 150 + "px";
        console.log($(window).scrollTop());
    },
    overload() {
        setTimeout(ObjMain.myFunction(), 0);
    },
    myFunction: () => {
        document.getElementById("container10").style.display = 'none';
        document.getElementById("cabecera").style.display = 'block';
        document.getElementById("piedepag").style.display = 'block';
        document.getElementById("cuerpo").style.display = 'block';
        document.getElementById("parte-contacto").style.display = 'block';
        document.getElementById("principal").style.backgroundColor = 'white';
    },
    changePassword: () => {
        document.querySelector('.change_password').addEventListener('click', () => {
            let contrasena = document.querySelector('.new_password').value;
            let id = document.querySelector('.idrecovery').value;
            let formData = new FormData();
            formData.append('contrasena', contrasena);
            formData.append('id_cliente', id);
            ObjMain.ajax_post('POST', DOMAIN + 'ajax/new_password', formData)
                .then((resp) => {
                    resp = JSON.parse(resp);
                    console.log(resp);
                    let aviso = '<p class="res_mail">' + resp.message + '</p>';
                    document.querySelector('.ajax-resp').innerHTML = aviso;
                    window.location = DOMAIN;
                })
                .catch((err) => {
                    err = JSON.parse(err);
                    document.querySelector('.err_recovery').style.display = 'block';
                });
        });
    },
    recovery: () => {
        document.querySelector('.button_recovery').addEventListener('click', () => {
            document.querySelector('.err_mail').style.display = 'none';
            document.querySelector('.err_recovery').style.display = 'none';

            let correo = document.querySelector('.email-recovery').value;
            if (!ObjMain.valida_correo(correo)) {
                document.querySelector('.err_mail').style.display = 'block';
            } else {
                let formData = new FormData();
                formData.append('correo', correo);
                ObjMain.ajax_post('POST', DOMAIN + 'ajax/recovery', formData)
                    .then((resp) => {
                        resp = JSON.parse(resp);
                        console.log(resp.data.correo);
                        let aviso = '<p class="res_mail">Se envio un correo ah: ' + resp.data.correo + '</p>';
                        document.querySelector('.ajax-resp').innerHTML = aviso;
                    })
                    .catch((err) => {
                        err = JSON.parse(err);
                        document.querySelector('.err_recovery').style.display = 'block';
                    });
            }
        });
    },
    showSpinner: (spinner) => {
        spinner.className = "show";
        setTimeout(() => {
            spinner.className = spinner.className.replace("show", "");
        }, 1000);
    },
    getDataCarrito: () => {
        return localStorage.getItem('productos') ? {
            total: parseFloat(localStorage.getItem('total')),
            cantidad: parseInt(localStorage.getItem('cantidad')),
            productos: JSON.parse(localStorage.getItem('productos'))
        } : {
            response: 'No se agregaron al carrito'
        }

    },
    updateAccount: (id) => {
        const $btnSave = document.querySelector('.saveUser')
        const $respSave = document.querySelector('.response-update')
        let formData = new FormData();
        const apellido_paterno = document.querySelector('#c_apep1').value.trim();
        const apellido_materno = document.querySelector('#c_apem1').value.trim();
        const politicas = (document.querySelector('#politicas').checked) ? 1 : 0;
        const correo = document.querySelector('#c_correo1').value;
        let tipo = document.querySelector('#s_tipodoc').value;
        let direccion = document.querySelector('#locationUser').value;
        let dist = document.getElementById('sdist');
        dist = dist.options[dist.selectedIndex].getAttribute('data-name');
        ref = document.getElementById('referencia').value;

        if (!politicas) {
            $respSave.textContent = 'x Debe aceptar las políticas de privacidad para continuar';
            setTimeout(() => $respSave.textContent = '', 3000);
            // $btnSave.dataset.content = 'x Acepte las Politicas';
            // document.documentElement.style.setProperty('--colorSave','#fff');            
            return;
        }
        formData.append("nombre", document.querySelector('#c_nombres1').value);
        formData.append("apellido_paterno", apellido_paterno);
        formData.append("apellido_materno", apellido_materno);
        formData.append("correo", correo);
        formData.append("telefono", document.querySelector('#c_telcel').value);
        formData.append("tipo_documento", tipo);
        formData.append("documento", document.querySelector('#campo1').value);
        formData.append("politicas", politicas);
        formData.append("distrito", dist);
        formData.append("direccion", direccion);
        formData.append("referencia", ref);
        formData.append("ofertas", (document.querySelector('#publicidad').checked) ? 1 : 0);

        ObjMain.ajax_post('POST', `${DOMAIN}myaccount/update/${id}`, formData)
            .then((resp) => {
                resp = JSON.parse(resp);
                document.documentElement.style.setProperty('--colorSave', 'green');

                const spinner = document.getElementById("spinner");
                ObjMain.showSpinner(spinner);
                userData = resp.data;
                const $nodeSaludo = document.querySelector('.user-name-db')
                ObjMain.render(
                    $nodeSaludo,
                    `${userData.nombre} ${userData.apellido_paterno} ${userData.apellido_materno}`);
                $respSave.textContent = ' √ Se actualizaron sus datos de Usuario.';
                $respSave.style.color = 'green';
                setTimeout(function() {
                    $respSave.textContent = ''
                    document.getElementById("p_datosp").click();
                }, 3000);


            })
            .catch((err) => {
                err = JSON.parse(err);
                ObjMain.alert_form(false, err.message);
            });
    },
    sign_in: () => {
        if (localStorage.getItem('remember') != null) {
            let sesion = localStorage.getItem('remember');
            sesion = JSON.parse(sesion);
            document.querySelector("#username_").value = sesion.user;
            document.querySelector("#pasword_").value = sesion.pass;
            console.log("desde la memoria " + sesion);
        }
        if (document.querySelector('.login-container') != null) {
            document.querySelector('.login-container').addEventListener('submit', (e) => {
                e.preventDefault();
                let remember = {};
                polt = (document.querySelector('#remember_').checked) ? 1 : 0;
                let user = document.querySelector("#username_").value;
                let pass = document.querySelector("#pasword_").value;
                if (polt == 1) {
                    remember.user = user;
                    remember.pass = pass;
                    localStorage.setItem('remember', JSON.stringify(remember));
                }
                let formData = new FormData();
                formData.append("username", user);
                formData.append("contrasena", pass);
                ObjMain.ajax_post('POST', DOMAIN + 'ajax/login', formData)
                    .then((resp) => {
                        resp = JSON.parse(resp);
                        if (resp.status) {
                            window.location = DOMAIN;
                        }
                    })
                    .catch((err) => {
                        err = JSON.parse(err);
                        let message = document.querySelector(".response_sesion");
                        message.innerHTML = err.message;

                    });
            });
        }
    },
    sign_in_cart: () => {
        document.querySelector('.lcc').addEventListener('submit', (e) => {
            e.preventDefault();
            let user = document.querySelector("#username__").value;
            let pass = document.querySelector("#pasword__").value;

            let formData = new FormData();
            formData.append("username", user);
            formData.append("contrasena", pass);
            ObjMain.ajax_post('POST', DOMAIN + 'ajax/login', formData)
                .then((resp) => {
                    resp = JSON.parse(resp);
                    if (resp.status) {
                        window.location = DOMAIN + 'carrito';
                    }
                })
                .catch((err) => {
                    err = JSON.parse(err);
                    let message = document.querySelector(".response_sesion");
                    message.innerHTML = err.message;

                });
        });
    },
    login: () => {
        let ventanalogin = document.getElementsByClassName("login")[0];
        if (ventanalogin.style.display == "none" && screen.width > 767) {
            ventanalogin.style.display = "block";
        } else {
            ventanalogin.style.display = "none";
        }
    },
    load_ubigeo: () => {
        ObjMain.ajax_post('GET', DOMAIN + 'ajax/getprovincia', '')
            .then((resp) => {
                ubigeoPeru.ubigeos = JSON.parse(resp);
                return ObjMain.showRegionsList()
            })
            .then(() => ObjMain.defaultUbigeo())
            .catch((err) => {
                console.log(err);
            });
    },
    showRegionsList: async() => {
        ubigeoPeru.ubigeos.forEach((ubigeo) => {
            if (ubigeo.provincia === '00' && ubigeo.distrito === '00') {
                let option = document.createElement('option');
                option.id = 'dpto-' + ubigeo.departamento;
                option.name = 'departamento';
                option.value = ubigeo.departamento;
                option.setAttribute('data-name', ubigeo.nombre);
                option.textContent = ubigeo.nombre;
                document.querySelector('#s_depa').appendChild(option);
            }
        });
    },
    showProvincesList: (departamento) => {
        departamento = departamento.value;

        document.querySelector('#sprov').innerHTML = '';
        document.querySelector('#sdist').innerHTML = '';

        ubigeoPeru.ubigeos.forEach((ubigeo) => {
            if (ubigeo.departamento === departamento && ubigeo.provincia !== '00' && ubigeo.distrito === '00') {

                let option = document.createElement('option');
                option.id = 'prov-' + ubigeo.provincia;
                option.name = 'provincia';
                option.value = ubigeo.provincia;
                option.setAttribute('data-name', ubigeo.nombre);
                option.textContent = ubigeo.nombre;

                document.querySelector('#sprov').appendChild(option);
            }
        });
        ObjMain.showDistrictsList(document.querySelector('#sprov'));
    },
    showDistrictsList: (provincia) => {
        departamento = document.getElementById('s_depa').value;
        provincia = provincia.value;
        document.querySelector('#sdist').innerHTML = '';

        ubigeoPeru.ubigeos.forEach((ubigeo) => {
            if (ubigeo.departamento === departamento && ubigeo.provincia === provincia && ubigeo.distrito !== '00') {

                let option = document.createElement('option');

                option.id = 'dist-' + ubigeo.distrito;
                option.name = 'distrito';
                option.value = ubigeo.distrito;
                option.setAttribute('data-name', ubigeo.nombre);
                if (ubigeo.small_price) {
                    option.dataset.small_price = ubigeo.small_price;
                    option.dataset.big_price = ubigeo.big_price;
                    option.dataset.days = ubigeo.days;
                }
                option.textContent = ubigeo.nombre;
                document.querySelector('#sdist').appendChild(option);
            }
        });

    },
    submit_form: (e) => {
        e.preventDefault();
        let tipodoc = document.querySelector('#s_tipodoc').value;
        n_documento = document.querySelector('#n_documento').value;
        nombre = document.querySelector('#c_nombres1').value;
        apellidoP = document.querySelector('#c_apep1').value;
        apellidoM = document.querySelector('#c_apem1').value;
        correo = document.querySelector('#c_correo1').value;
        pass1 = document.getElementById('passw').value;
        pass2 = document.getElementById('confpassw').value;
        dep = document.getElementById('s_depa');
        dep = dep.options[dep.selectedIndex].getAttribute('data-name');
        prov = document.getElementById('sprov');
        prov = prov.options[prov.selectedIndex].getAttribute('data-name');
        dist = document.getElementById('sdist');
        dist = dist.options[dist.selectedIndex].getAttribute('data-name');
        dire = document.getElementById('direction').value;
        ref = document.getElementById('referencia').value;
        telf = document.getElementById('telephone').value;
        day = document.getElementById('dia').value;
        month = document.getElementById('mes').value;
        year = document.getElementById('anyo').value;
        polt = (document.querySelector('#politicas').checked) ? 1 : 0;
        ofert = (document.querySelector('#publicidad').checked) ? 1 : 0;

        /* validar campos nulos */
        if (tipodoc != null && n_documento != null && nombre != null && apellidoP != null && apellidoM != null && correo != null && pass1 != null && pass2 != null &&
            dep != null && prov != null && dist != null && dire != null && ref != null && telf != null && day != null && month != null && year != null) {
            /* valida correo, politicas, y contraseñas */
            if (!ObjMain.valida_correo(correo)) {
                return ObjMain.alert_form(false, 'El correo ingresado es inválido!');
            }

            if (polt == 0) {
                return ObjMain.alert_form(false, 'Debe aceptar las politicas!');
            }

            if (pass1 != pass2) {
                return ObjMain.alert_form(false, 'Las contraseñas no coinciden');
            } else {
                let perror = document.getElementById('dp_error');
                let error = document.getElementById('d_error');

                perror.style.display = "none";
                error.innerHTML = "";

                let formData = new FormData();
                formData.append("nombre", nombre);
                formData.append("apellido_paterno", apellidoP);
                formData.append("apellido_materno", apellidoM);
                formData.append("correo", correo);
                formData.append("contrasena", pass1);
                formData.append("departamento", dep);
                formData.append("provincia", prov);
                formData.append("distrito", dist);
                formData.append("direccion", dire);
                formData.append("referencia", ref);
                formData.append("telefono", telf);
                formData.append("fecha_nacimiento", (year + '-' + month + '-' + day));
                formData.append("tipo_documento", tipodoc);
                formData.append("documento", n_documento);
                formData.append("politicas", polt);
                formData.append("ofertas", ofert);

                ObjMain.ajax_post('POST', DOMAIN + 'ajax/setregister', formData)
                    .then((resp) => {
                        // resp = JSON.parse(resp);

                        /* login */
                        let formData2 = new FormData();
                        formData2.append("username", correo);
                        formData2.append("contrasena", pass1);
                        
                        // validacion del codigo q se envia por correo
                        

                        ObjMain.ajax_post('POST', DOMAIN + 'ajax/login', formData2).then((respl) => {
                            respl = JSON.parse(respl);
                            console.log(respl);
                            if (respl.status) {
                                let redirect = localStorage.getItem('reg-redir');
                                if (redirect) {
                                    localStorage.removeItem('reg-redir');
                                    window.location = redirect;
                                } else {
                                    window.location = DOMAIN;
                                }
                            }
                        });


                    })
                    .catch((err) => {
                        err = JSON.parse(err);
                        ObjMain.alert_form(false, err.message);
                    });
            }
        } else {

            ObjMain.alert_form(false, 'Complete todos los datos (*) para poder continuar');
        }


    },
    alert_form: (status, message) => {
        let perror = document.getElementById('dp_error');
        let error = document.getElementById('d_error');
        /* limpiamos mensajes previos */
        perror.style.display = "none";
        error.innerHTML = "";

        if (!status) {
            perror.style.display = "inline-block";
            error.innerHTML = message;
        }

    },
    solonumero: (event) => {
        event.value = event.value.replace(/\D/g, '');
    },
    render: (element, content) => {
        element.innerHTML = content;
    },
    changueColor: (visor, btnColorChangue, btnCarrito) => {
        document.addEventListener('click', event => {
            if (event.target.matches(btnColorChangue)) {
                DOMAIN = (window.location.hostname == 'localhost') ? 'http://localhost/beurer/' : 'https://www.blogingenieria.site/';

                const $visor = document.querySelector(visor),
                    $addCarrito = document.querySelector(btnCarrito)
                tabs = document.querySelectorAll('.tabs_section');

                const { img, color, producto_sku } = event.target.dataset;
                tabs.forEach(tab => tab.classList.remove('-open'))
                $visor.classList.add('-open')
                ObjMain.render($visor, `<img src=${DOMAIN}${img}>`);

                $addCarrito.setAttribute('data-color', color);
                $addCarrito.setAttribute('data-img', img);
                $addCarrito.setAttribute('data-producto_sku', producto_sku);
            }
        })
    },
    changueQuanty: (btnAdd, btnDown, nodeQuanty, btnCarrito) => {
        document.addEventListener('click', event => {

            if (event.target.matches(btnAdd)) {
                const $addCarrito = document.querySelector(btnCarrito);
                const $cantidad = document.querySelector(nodeQuanty)
                if (parseInt($cantidad.value) < 6) {
                    $cantidad.value = parseInt($cantidad.value) + 1
                    $addCarrito.setAttribute('data-cantidad', $cantidad.value);
                }



            }
            if (event.target.matches(btnDown)) {
                const $addCarrito = document.querySelector(btnCarrito);
                const $cantidad = document.querySelector(nodeQuanty)
                $cantidad.value = parseInt($cantidad.value) == 1 ? parseInt($cantidad.value) : parseInt($cantidad.value) - 1;
                $addCarrito.setAttribute('data-cantidad', $cantidad.value);

            }
        })
    },
    changueImg: (tagImg, ruta) => {
        document.querySelector(tagImg).src = ruta
    },
    modalCarrito: (btn, componentModal) => {
        const $btnAdd = document.querySelector(btn);
        if ($btnAdd) {
            $btnAdd.addEventListener('click', e => {
                ObjMain.render(
                    document.querySelector(componentModal),
                    `Cantidad: ${$btnAdd.dataset.cantidad}`
                );
                let foto = DOMAIN + $btnAdd.dataset.img;
                if ($btnAdd.dataset.img) {
                    ObjMain.changueImg('.img-modal', foto)
                }
            })
        }
    },
    valida_correo: (correo) => {
        var texto = correo;
        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if (!regex.test(texto)) {
            return false;

        } else {
            return true;

        }
    },
    ajax_post: (method, url, data) => {
        const promise = new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open(method, url);
            xhr.onload = () => {
                if (xhr.status >= 400) {
                    reject(xhr.response);
                }
                resolve(xhr.response);
            };
            xhr.onerror = () => {
                reject('Oh! ocurrio algo mal!');
            }
            xhr.send(data);
        });
        return promise;
    },
    comparePass: () => {
        const $newPass = document.querySelector('#newPass'),
            $repeatPass = document.querySelector('#repeatNewPass'),
            $btnUpdatePass = document.querySelector('.updatePass');

        if ($newPass) {
            $repeatPass.addEventListener('keyup', event => {
                const $divContainer = event.target.parentElement;

                if (event.target.value == $newPass.value) {
                    $btnUpdatePass.disabled = false;
                    $divContainer.dataset.content = ' √ Las contraseñas coinciden'
                    document.documentElement.style.setProperty('--color', 'green');
                    filterResult = true;
                } else {
                    $btnUpdatePass.disabled = true;
                    $divContainer.dataset.content = 'x Las contraseñas no coinciden';
                    document.documentElement.style.setProperty('--color', '#C51152');
                    filterResult = false;
                }

            })
        }

    },
    updatePass: () => {
        const $pass = document.querySelector('.updatePass');
        const $new_pass = document.querySelector('#newPass');
        const $containerPass = document.querySelector('.passContainer');
        const $repeat = document.querySelector('.repeat');
        if ($pass) {
            $pass.addEventListener('click', e => {
                e.preventDefault();
                const { id } = $pass.dataset;


                if (filterResult && document.querySelector('#currentPass').value !== '') {

                    const $form = document.querySelector('#formPass');
                    const formData = new FormData($form);

                    ObjMain.ajax_post('POST', `${DOMAIN}updatePass/${id}`, formData)
                        .then((resp) => {
                            resp = JSON.parse(resp);
                            $containerPass.dataset.content = resp.message;
                            document.documentElement.style.setProperty('--colorResponse', `${resp.code == 404 ? '#C51152': 'green'} `);
                            $form.reset()
                            $repeat.dataset.content = ''
                            $new_pass.parentElement.dataset.content = ''
                        })
                        .catch((err) => {
                            err = JSON.parse(err);

                        });
                } else {

                    document.querySelector('#currentPass').parentElement.dataset.content = 'Escriba una contraseña';
                    document.documentElement.style.setProperty('--colorResponse', '#C51152');


                }

            })
        }

    },
    limitPass: (component, limit) => {
        const $currentPass = document.querySelector(component);

        if ($currentPass) {
            $currentPass.addEventListener('keyup', event => {
                const $parent = event.target.parentElement;

                if ($currentPass.value.length > limit) {
                    $parent.dataset.content = '√ constraseña segura';
                    document.documentElement.style.setProperty('--colorFilter', 'green');
                    return
                } else {
                    $parent.dataset.content = 'constraseña muy corta';
                    document.documentElement.style.setProperty('--colorFilter', 'blue');
                    return
                }
            })
        }


    },
    showPass: (component) => {
        const $showPass = document.querySelectorAll(component);

        if ($showPass) {
            $showPass.forEach(show => {
                show.addEventListener('click', event => {
                    let $pass = event.target.parentElement.children[1]
                    $pass.type = $pass.type == "password" ? "text" : "password";
                })
            })
        }
    },
    taps: () => {
        let tabs = Array.prototype.slice.apply(document.querySelectorAll('.tap'));
        let panels = Array.prototype.slice.apply(document.querySelectorAll('.panel'));
        document.getElementById('taps').addEventListener('click', (e) => {
            if (e.target.tagName == 'LI') {
                let i = tabs.indexOf(e.target);
                tabs.map(tab => tab.classList.remove('active'));
                tabs[i].classList.add('active');

                panels.map(panel => panel.classList.remove('active'));
                panels[i].classList.add('active');
            }
        });
    },
    dataFacturacion: () => {
        return {
            comprador: JSON.parse(localStorage.getItem('comprador')),
            factura: localStorage.getItem('factura') ? JSON.parse(localStorage.getItem('factura')) : 'no solicito factura',
            destinatario: localStorage.getItem('destinatario') ? JSON.parse(localStorage.getItem('destinatario')) : 'el destinatario es unico',
        }
    },
    defaultUbigeo: () => {
        setTimeout(function() {

            document.querySelectorAll('#s_depa > option').forEach(depa => {
                if (depa.textContent == 'Lima') {
                    depa.setAttribute('selected', 'selected');
                    document.querySelector('#s_depa').disabled = true;
                }
            });
            $('#s_depa').trigger('change')

            document.querySelectorAll('#sprov > option').forEach(prov => {
                if (prov.textContent == 'Lima') {
                    prov.setAttribute('selected', 'selected');
                    document.querySelector('#sprov').disabled = true;
                }
            });

            $('#sprov').trigger('change')

            const nodeParent = document.querySelectorAll('#sdist > option')[0].parentNode;
            const childNode = document.createElement('option')
            childNode.textContent = 'SELECCIONE DISTRITO';
            childNode.setAttribute('selected', 'selected')
            nodeParent.insertBefore(childNode, document.querySelectorAll('#sdist > option')[0]);
            if (window.location.href == (`${DOMAIN}myaccount`) || window.location.href == (`${DOMAIN}facturacion`)) {
                if (userData.distrito) {
                    ObjMain.selectedDistrict(userData.distrito);
                }
            }
        }, 0)

    },
    selectedDistrict: district => {
        $selectDist = document.querySelector("#sdist");
        $distritos = document.querySelectorAll('#sdist > option');
        $distritos.forEach(dist => dist.textContent == district ? dist.setAttribute('selected', 'selected') : '')

    },
    cupon: (event) => {

        event.preventDefault();
        const $inputCupon = document.querySelector('.cup-btn');
        const $resCupon = document.querySelector('.res-cup');
        if (true) {
            const $cupon = document.querySelector('.cod-cupon');
            const $descuento = document.querySelector('.descont_cost');
            const $sub = parseFloat(document.querySelector('.sub_cost').textContent); // tomando en duro
            const $total = document.querySelector('.total_cost');
            const formData = new FormData();

            formData.append('codigo', $cupon.value);
            ObjMain.ajax_post('POST', 'ajax/cupon', formData)
                .then(res => {
                    res = JSON.parse(res);
                    if (res.status) {
                        intento++;
                        let tipo = parseInt(res.data.tipon_cupon);
                        let desc;
                        let total;
                        localStorage.setItem('tipo', tipo);
                        localStorage.setItem('descuento', res.data.descuento);
                        $descuento.textContent = tipo == 1 ? `${res.data.descuento} %` : `${res.data.descuento}`
                        $resCupon.style.color = 'green';
                        $resCupon.textContent = res.message;
                        localStorage.setItem('cupon_codigo', res.data.codigo)

                    } else {
                        $resCupon.textContent = res.message;
                        $resCupon.style.color = '#C51152';
                        $cupon.value = "";
                    }
                    ObjMain.costo_total();

                })
                .catch((err) => {
                    console.log(err)

                });
        }
    },
    calcEnvio: (vol, peso) => {
        const peso_small = 30;
        const peso_big = 60;
        const vol_small = 240;
        const vol_big = 480;
        const paq_small = 10;
        const paq_big = 20;
        if (vol == 0 || peso == 0) {
            return {
                total_coste: 0
            }
        }
        // if(peso < peso_small && vol < vol_small ) {
        //     return {
        //         paquete_small : 1,
        //         total_coste : paq_small
        //     }
        // }
        // if((peso > peso_small && peso < peso_big) && (vol > vol_small && vol < vol_big ) ) {
        //     return {
        //         paquete_big : 1,
        //         total_coste : paq_big
        //     }
        // }
        // if( peso > peso_big && vol > vol_big ) {
        //     const resPeso = peso % peso_big ;
        //     let caja_small = 0;
        //     let caja = parseInt(peso / peso_big); 
        //     resPeso < peso_small ? caja_small++ : caja++ 
        //     return  {
        //         paquete_big : caja,
        //         paquete_small : caja_small,
        //         coste_small : caja_small * paq_small,
        //         coste_big : caja * paq_big,
        //         total_coste : caja_small * paq_small + caja * paq_big,
        //     }
        // }
        return {
            paquete_big: 1,
            paquete_small: 1,
            coste_small: 0,
            coste_big: 20,
            total_coste: 10
        }
    },
    getDataSales: (sesion) => {
        const comprador = localStorage.getItem('Comprador') ? JSON.parse(localStorage.getItem('Comprador')) : null
        const destinatario = localStorage.getItem('Destinatario') ? JSON.parse(localStorage.getItem('Destinatario')) : null
        const factura = localStorage.getItem('facturacion') ? JSON.parse(localStorage.getItem('facturacion')) : null
        const productos = localStorage.getItem('productos') ? JSON.parse(localStorage.getItem('productos')) : null
        return !sesion ? {
            comprador,
            destinatario,
            factura,
            productos,
        } : {
            comprador,
            destinatario,
            factura,
            productos
        }
    },
    showDataSales: async() => {

        const session = parseInt(document.querySelector('.dataUser').dataset.id);
        const objSales = ObjMain.getDataSales(session);
        const peso_total = localStorage.getItem('peso_total') ? localStorage.getItem('peso_total') : 0
        const tipo_cupon = localStorage.getItem('tipo') ? parseInt(localStorage.getItem('tipo')) : null
        const descuento = localStorage.getItem('descuento') ? parseFloat(localStorage.getItem('descuento')) : 0
        const cupon = localStorage.getItem('descuento') ? true : false
        const recojo = localStorage.getItem('recojo') ? true : false
        const volumen_total = localStorage.getItem('volumen_total') ? localStorage.getItem('volumen_total') : 0
        let subtotal = 0
        const envio = localStorage.getItem('costo_envio') ? localStorage.getItem('costo_envio') : 0
        let cantidad = 0;
        let containerProd = document.querySelector('.table-products');
        let envio_pago = document.querySelector('#envio_pago');
        let $cupon = document.querySelector('#cupon_descuento');
        let subtotal_pago = document.querySelector('#subtotal_pago');
        let total_pago = document.querySelector('#total_pago');
        let total_payment = 0;
        let productos = []

        if (localStorage.getItem('productos')) {
            productos = JSON.parse(localStorage.getItem('productos'))
            let index = 0
            for (prod of productos) {
                let formData = new FormData()
                formData.append('id', prod.id)

                let resp = await ObjMain.ajax_post('POST', `${DOMAIN}ajax/getProducto`, formData)

                const { titulo: title, precio: precio_online } = JSON.parse(resp).data
                cantidad += parseInt(prod.cantidad);
                subtotal += precio_online * prod.cantidad

                let $tr = document.createElement('tr');
                let childOne = document.createElement('td')
                childOne.setAttribute('scope', 'row')
                let childTwo = document.createElement('td')
                childTwo.style.textAlign = 'left';
                let childThree = document.createElement('td')
                childThree.classList.add('subtotalr')
                childThree.classList.add('subt')
                childThree.style.textAlign = 'right'

                $tr.appendChild(childOne).innerHTML = `${index + 1 }`
                $tr.appendChild(childTwo).textContent = `${title}`;
                $tr.appendChild(childThree).textContent = `${parseFloat(precio_online * prod.cantidad).toFixed(2)}`
                containerProd.appendChild($tr)
                index++;
            }

        }
        let dataUser = objSales.comprador;

        const innerEnvio = !recojo ? `<div>LIMA LIMA </div>
                                        <div>${dataUser.distrito} </div>
                                        <div> ${dataUser.d_envio} ${dataUser.referencia} - Lima </div>
                                        <div>Volumen total de la carga: ${volumen_total} m3 </div>
                                        <div>Peso total de la carga: ${peso_total} kg </div>
                                        <br><br>` :
            `<div>Av.Caminos del Inca N.257 Tienda N° 149 Santiago de Surco - Lima</div>
                                                                <br>`;
        document.querySelector('.title-envio').textContent = !recojo ? 'INFORMACIÓN DE ENVÍO' : 'RECOJO EN TIENDA';
        const messageEnvio = !recojo ? `Su pedido llegará en un plazo de máximo de 4 días hábiles.` :
            `Recordar que tiene un plazo de 30 días para recoger su pedido, de no recogerlo, se procederá con la devolución de la compra.`
            // if(session) {
            //     dataUser = !localStorage.getItem('domicilio') ? objSales.destinatario : objSales.comprador ; 
            //     dataUser = !localStorage.getItem('domicilio') ? objSales.destinatario : objSales.comprador ; 
            // }else {
            //     dataUser = objSales.destinatario
            // }

        document.querySelector('.dataComprador').innerHTML = `
                        ${innerEnvio}
                        <li class="font-nexaheavy" style="list-style:none;font-size:1.2em;">COMPRA A NOMBRE DE </li>
                        <div>${dataUser.tipo_doc}: ${dataUser.number_doc }</div>
                        <div>${dataUser.nombres} ${dataUser.apellido_paterno } ${dataUser.apellido_materno} </div>
                        <br> <br>

                        <li class="font-nexaheavy" style="list-style:none;font-size:1.2em;">RESUMEN DEL PEDIDO</li>
                        <div>Cantidad de productos: ${cantidad} </div>
                        <div>Importe Sub Total: S/ ${parseFloat(subtotal).toFixed(2)} 
                        </div>
                        <p style="font-weight:600;font-size:1.2em;margin-top:15px">${messageEnvio} </p>

                        `;

        if (cupon) {
            document.querySelector('.tr_cupon').style.display = 'table-row';
            if (tipo_cupon == 1) {
                $cupon.textContent = `${parseFloat(descuento).toFixed(2)} %`
                total_payment = `${( (parseFloat(subtotal)* descuento/100) + parseFloat(envio)).toFixed(2)} `
            }
            if (tipo_cupon == 2) {
                $cupon.textContent = `- ${parseFloat(descuento).toFixed(2)}`
                total_payment = `${(parseFloat(envio) + parseFloat(subtotal)- descuento).toFixed(2)}`
            }
        } else {
            total_payment = `${(parseFloat(envio) + parseFloat(subtotal)).toFixed(2)} `;
        }

        subtotal_pago.textContent = `${parseFloat(subtotal).toFixed(2)}`;
        envio_pago.textContent = `${parseFloat(envio).toFixed(2)}`
        total_pago.textContent = total_payment;

        // Culqi.settings({
        //     title: 'BEURER',
        //     currency: 'PEN',
        //     description: 'Completamos tu pago con toda la seguridad que tú necesitas',
        //     amount: parseFloat(total_payment).toFixed(2) * 100,
        // });

    },
    culqiInit: () => {
        ObjMain.createOrder();
        Culqi.options({
            lang: 'auto',
            modal: true,
            customButton: 'Pagar {{moneda}} {{amount}} {{stringcurrency}}',
            style: {
                logo: `${DOMAIN}assets/images/logos/logo.png`,
                maincolor: '#C51152',
                buttontext: '#ffffff',
                maintext: '#4A4A4A',
                desctext: '#4A4A4A'
            }
        });
        document.getElementById('buy').addEventListener('click', event => {
            Culqi.open()
            event.preventDefault();

        })
    },
    paymentSelected: () => {

        document.querySelector('#pagoEfectivo').addEventListener('click', async event => {

            if (event.target.checked) {
                if (!localStorage.getItem('orden')) {
                    await ObjMain.createOrder();
                    localStorage.setItem('order', true)
                } else {
                    Culqi.open();
                }
            } else {
                Culqi.open()
            }
        })

    },

    createOrder: () => {
        const formOrder = dataFormSendOrder()
        ObjMain.ajax_post('POST', `${DOMAIN}ajax/createOrder`, formOrder)
            .then(order => {

                let streamOrder = JSON.parse(order);
                streamOrder = JSON.parse(streamOrder)
                console.log(streamOrder)
                Culqi.settings({
                    title: 'BEURER',
                    currency: 'PEN',
                    description: 'Completamos tu pago con toda la seguridad que tú necesitas',
                    amount: parseFloat(streamOrder.amount).toFixed(2),
                    order: streamOrder.id
                });

            }).catch(err => {
                let error = JSON.parse(JSON.parse(err))
                console.log(error)
            })
    },
    resumeOrder: () => {
        const orden = JSON.parse(localStorage.getItem('order'));
        const productos = JSON.parse(localStorage.getItem('productos'))
        orden['recojo'] = orden.metadata.envio,
            orden['dest_nombres'] = orden.metadata.destinatario ? JSON.parse(orden.metadata.destinatario).dest_nombres : null
        orden['dir_envio'] = orden.metadata.d_envio;
        ObjMain.resumeOrderView(orden)
        ObjMain.resumeOrderProductsView(productos)
    },
    resumeOrderView: data => {

        const recojo = parseFloat(data.recojo);
        if (recojo == 0) {
            document.querySelector('.title-envio').textContent = `Dirección de Recojo`
            document.querySelector('.dir_envio').textContent = `Av.Caminos del Inca N.257 Tienda N° 149`
            document.querySelector('.distrito').textContent = `Santiago de Surco.`
            document.querySelector('.title_referencia').style.display = `none`
            document.querySelector('.espaciado').style.display = `none`
            document.querySelector('.title_recojo').textContent = 'Fecha de Recojo'
            document.querySelector('.destinatario').textContent = data.dest_nombres ? `Lo puede recoger: ${data.dest_nombres} ` : 'La entrega es personal'
            document.querySelector('.horario-detalle').textContent = 'Horario de tienda : de lunes a sábado de 9:00 am a 6:00 pm.'
            document.querySelector('.fecha_entrega').textContent = `Su pedido estará disponible para recojo en un plazo máximo de 2 días hábiles ,apartir de la fecha en que haya cancelado la orden.
            `
        } else {
            document.querySelector('.title-envio').textContent = `Dirección de envío`
            document.querySelector('.dir_envio').textContent = `${data.dir_envio}`
            document.querySelector('.distrito').textContent = `${data.metadata.distrito.toUpperCase()}`
            document.querySelector('.destinatario').textContent = data.dest_nombres ? `Lo puede recibir: ${data.dest_nombres}.` : 'La entrega es personal'
            document.querySelector('.referencia').textContent = data.metadata.referencia
            document.querySelector('.fecha_entrega').textContent = `Su pedido llegara en un plazo información máximo de 4 días hábiles una vez confirme su pedido`;
        }
        document.querySelector('.title-resume').textContent = `!Gracias por tu Preferencia!`
        document.querySelector('.message-resume').textContent = `Recibirás una confirmación a través de tu correo electrónico indicandote como debes proceder.`

        document.querySelector('.orden-head').style.display = 'flex';
        document.querySelector('.codigo-cip').textContent = data.payment_code

        document.querySelector('.titular').textContent = `${data.metadata.nombres} ${data.metadata.apellidos}`
        document.querySelector('.provincia').textContent = `LIMA LIMA`
        document.querySelector('.numero_documento').textContent = `${data.metadata.numero_documento}`
        document.querySelector('.correo').textContent = data.metadata.correo

        document.querySelector('.codigo-venta').textContent = data.payment_code
        document.querySelector('.codigo-pago').innerHTML = 'Código CIP de pago'

    },
    resumeOrderProductsView: productos => {

        const $containerResume = document.querySelector('.pedido-products');
        productos.forEach(prod => {
            $containerResume.innerHTML +=
                `<div class="basket-product" style="text-align:center;">
                <div class="item">
                    <a class="product-image"
                    >
                        <img src="${DOMAIN}${prod.img}" alt=""
                            class="product-frame">
                    </a>
                    <div class="product-details">
                        <span>${prod.title}</span>
                        <p>SKU: ${prod.producto_sku}</p>
                        <p>Envío a domicilio</p>
                    </div>
                </div>

                <div class="price" id="preuni">
                    <div class="info-prod" style="display:block;">
                        <img src="assets/images/precio-online.png">
                        <div class="font-nexaheav text-left price rprice"> ${parseFloat(prod.precio_online).toFixed(2)}</div>
                    </div>
                    <div class="font-nexaheav"
                        style="font-size:1.1em;text-align:center;font-weight:bold;font-family:'nexa-lightuploaded_file';">
                        Normal: S/ ${parseFloat(prod.precio).toFixed(2)}</div>
                </div>

                <div class="quantity">

                    <input class="form-control-field cantidad" style="font-size:1.5rem!important;width:21%;font-family:nexaheavyuploaded_file!important" name="pwd" value="${parseInt(prod.cantidad)}" type="text"
                        min="1" readonly>
                </div>
                <div class="subtotal rsubtotal">${parseFloat(prod.subtotal).toFixed(2)}</div>
            </div>`
        })
    },
    resumePedido: (id) => {
        const formData = new FormData();
        formData.append('id_pedido', id);
        ObjMain.ajax_post('POST', `${DOMAIN}ajax/getPedido`, formData)
            .then(pedido => {
                pedido = JSON.parse(pedido)
                const productosResume = pedido.data.detalle
                const {...infoResume } = pedido.data.pedido
                console.log(infoResume)
                ObjMain.resumeInfoView(infoResume)
                ObjMain.resumeProductsView(productosResume)
            })
            .catch(err => {
                err = JSON.parse(err);

            });
    },

    resumeInfoView: data => {
        const recojo = parseInt(data.recojo);
        if (recojo) {
            document.querySelector('.title-envio').textContent = `Dirección de Recojo`
            document.querySelector('.dir_envio').textContent = `Av.Caminos del Inca N.257 Tienda N° 149`
            document.querySelector('.distrito').textContent = `Santiago de Surco.`
            document.querySelector('.title_referencia').style.display = `none`
            document.querySelector('.espaciado').style.display = `none`
            document.querySelector('.title_recojo').textContent = 'Fecha de Recojo'
            document.querySelector('.destinatario').textContent = data.dest_nombres ? `Lo puede recoger: ${data.dest_nombres} ` : 'La entrega es personal'
            document.querySelector('.horario-detalle').textContent = 'Horario de tienda : de lunes a sábado de 9:00 am a 6:00 pm.'
            document.querySelector('.fecha_entrega').textContent = `Su pedido estará disponible para recojo en un plazo máximo de 2 días hábiles ,apartir del ${ObjMain.formatFecha(data.pedido_fecha)}
            `
        } else {
            document.querySelector('.title-envio').textContent = `Dirección de envío`
            document.querySelector('.dir_envio').textContent = `${data.dir_envio}`
            document.querySelector('.distrito').textContent = `${data.distrito.toUpperCase()}`
            document.querySelector('.destinatario').textContent = data.dest_nombres ? `Lo puede recibir: ${data.dest_nombres}.` : 'La entrega es personal'
            document.querySelector('.referencia').textContent = data.referencia
            document.querySelector('.fecha_entrega').textContent = `Su pedido llegara en un plazo información máximo de 4 días hábiles,apartir del ${ObjMain.formatFecha(data.pedido_fecha)}`
        }
        document.querySelector('.titular').textContent = `${data.nombres} ${data.apellidos}`
        document.querySelector('.provincia').textContent = `${data.provincia.toUpperCase()} LIMA`
        document.querySelector('.numero_documento').textContent = `${data.numero_documento}`
        document.querySelector('.correo').textContent = data.correo
        document.querySelector('.codigo-venta').textContent = data.codigo

    },
    resumeProductsView: productos => {

        const $containerResume = document.querySelector('.pedido-products');
        productos.forEach(prod => {
            $containerResume.innerHTML +=
                `<div class="basket-product" style="text-align:center;">
                <div class="item">
                    <a class="product-image"
                    >
                        <img src="${DOMAIN}${prod.imagen}" alt=""
                            class="product-frame">
                    </a>
                    <div class="product-details">
                        <span>${prod.nombre}</span>
                        <p>SKU: ${prod.producto_sku}</p>
                        <p>Envío a domicilio</p>
                    </div>
                </div>

                <div class="price" id="preuni">
                    <div class="info-prod" style="display:block;">
                        <img src="assets/images/precio-online.png">
                        <div class="font-nexaheav text-left price rprice"> ${parseFloat(prod.precio_online).toFixed(2)}</div>
                    </div>
                    <div class="font-nexaheav"
                        style="font-size:1.1em;text-align:center;font-weight:bold;font-family:'nexa-lightuploaded_file';">
                        Normal: S/ ${parseFloat(prod.precio).toFixed(2)}</div>
                </div>

                <div class="quantity">

                    <input class="form-control-field cantidad" style="font-size:1.5rem!important;width:21%;font-family:nexaheavyuploaded_file!important;" name="pwd" value="${parseInt(prod.cantidad)}" type="text"
                        min="1" readonly>
                </div>
                <div class="subtotal rsubtotal">${parseFloat(prod.subtotal).toFixed(2)}</div>
            </div>`
        })
    },
    stateProgress: (estate, pos) => {
        const $statesNode = document.querySelectorAll(`.bar-${pos}`);
        $statesNode.forEach(barr => barr.style.backgroundColor = '#CCC')
        for (let index = 0; index < estate; index++) {
            $statesNode[index].style.backgroundColor = '#C51152';
        }
    },
    sendType: (type) => {
        const $containerSteps = document.querySelector('.container_progress');
        const $states_messages = document.querySelector('.state_messages');

        if (type) {
            // document.querySelector('.unstep').style.display = 'none';
            $containerSteps.innerHTML = `<div class="section-content discovery active">

            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Orden Generada</h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">
                    Estado:<p class="estado" style="font-weight:normal;">Incompleto</p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido
                        culminando con el pago. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;"> En proceso</p>
                </div>

            </div>
        </div>

        <div class="section-content strategy">
            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Preparando Pedido</h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">Estado:<p class="estado"
                        style="font-weight:normal;">Incompleto </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido
                        culminando con el pago. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;">En proceso </p>
                </div>

            </div>
        </div>
        <div class="section-content creative">
            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Listo en tienda </h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">Estado:<p class="estado"
                        style="font-weight:normal;"> Incompleto</p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">En esta etapa el Pedido esta disponible para su recojo. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;"> En proceso</p>
                </div>

            </div>
        </div>

        

        <div class="section-content production">
            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Pedido entregado</h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">Estado:<p class="estado"
                        style="font-weight:normal;">Incompleto </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido
                        culminando con el pago. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;">En proceso </p>
                </div>

            </div>
        </div>`
            $states_messages.innerHTML = `<span class="step step01 step_on active">
                                            Orden Generada</span>

                                        <span class="step_arrow"></span>
                                        <span class="step step02 step_off ">Preparando Pedido</span>
                                        <span class="step_arrow"></span>
                                        <span class="step step03 step_off ">Listo en Tienda</span>


                                        <span class="step_arrow"></span>
                                        <span class="step step04 step_off ">Pedido Entregado</span>`;

            $(".step02").click(function() {
                $("#line-progress").css("width", "33.33%");
                $(".strategy").addClass("active").siblings().removeClass("active");
            });

            $(".step03").click(function() {
                $("#line-progress").css("width", "66.66%");
                $(".creative").addClass("active").siblings().removeClass("active");
            });

            $(".step04").click(function() {
                $("#line-progress").css("width", "100%");
                $(".production").addClass("active").siblings().removeClass("active");
            });

        } else {
            document.querySelector('.unstep').style.display = 'block';
            $containerSteps.innerHTML = `<div class="section-content discovery active">

            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Orden Generada</h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">
                    Estado:<p class="estado" style="font-weight:normal;">Incompleto</p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido
                        culminando con el pago. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;"> En proceso</p>
                </div>

            </div>
        </div>

        <div class="section-content strategy">
            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Preparando Pedido</h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">Estado:<p class="estado"
                        style="font-weight:normal;">Incompleto </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido
                        culminando con el pago. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;">En proceso </p>
                </div>

            </div>
        </div>

        <div class="section-content creative">
            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Listo para recojo</h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">Estado:<p class="estado"
                        style="font-weight:normal;"> Incompleto</p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido
                        culminando con el pago. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;"> En proceso</p>
                </div>

            </div>
        </div>

        <div class="section-content production">
            <div align="center">
                <h1
                    style="text-align:left;border-bottom:3px solid #c51152;width:100%;font-size:2.5em;padding-bottom:1%;">
                    Pedido entregado</h1>

                <br>
                <div style="font-size:1.3em;font-weight:bold;color:black;">Estado:<p class="estado"
                        style="font-weight:normal;">Incompleto </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Descripción:<p
                        style="font-weight:normal;">Es el proceso el cual el cliente realiza el pedido
                        culminando con el pago. </p>
                </div>
                <div style="font-size:1.3em;font-weight:bold;">Fecha: <p class="fechaEstado"
                        style="font-weight:normal;">En proceso </p>
                </div>

            </div>
        </div>`
            $states_messages.innerHTML = `<span class="step step01 step_on active">
                                            Orden Generada</span>

                                        <span class="step_arrow"></span>
                                        <span class="step step02 step_off ">Preparando Pedido</span>

                                        <span class="step_arrow"></span>
                                        <span class="step step03 step_off ">Envío en curso</span>

                                        <span class="step_arrow"></span>
                                        <span class="step step04 step_off ">Pedido entregado</span>`
            $(".step02").click(function() {
                $("#line-progress").css("width", "33.33%");
                $(".strategy").addClass("active").siblings().removeClass("active");
            });

            $(".step03").click(function() {
                $("#line-progress").css("width", "66.66%");
                $(".creative").addClass("active").siblings().removeClass("active");
            });

            $(".step04").click(function() {
                $("#line-progress").css("width", "100%");
                $(".production").addClass("active").siblings().removeClass("active");
            });
        }

        $(".step").click(function() {
            $(this).addClass("active").prevAll().addClass("active");
            $(this).nextAll().removeClass("active");
        });
        $(".step01").click(function() {
            $("#line-progress").css("width", "1%");
            $(".discovery").addClass("active").siblings().removeClass("active");
        });



    },
    showStatePedido: (res) => {
        const $panelState = document.querySelector('#div_seg');
        const $searchMenu = document.querySelector('#div_buscarp');
        const $searchInput = document.querySelector('#div_buscarp1');
        const $inputCodigo = document.querySelector('#cod_seg');
        const $resCodigo = document.querySelector('.res-pedido');
        const $panelCodigo = document.querySelector('.codigo-pedido');
        const $panelFecha = document.querySelector('.fecha_pedido');
        if (res.status) {
            $searchInput.style.display = 'none';
            $searchMenu.style.display = 'none';
            $panelState.style.display = 'block';

            ObjMain.sendType(parseInt(res.data.recojo))

            const $estados = document.querySelectorAll('.estado');
            const $fechasEstado = document.querySelectorAll('.fechaEstado');
            $panelCodigo.textContent = `${res.data.codigo}`;
            $panelFecha.textContent = `${ObjMain.formatFecha(res.data.fecha)}`;
            $estados.forEach(estado => estado.textContent = 'Incompleto');

            let tipo_estado = parseInt(res.data.estado);
            let estadosPedido = res.data.estados_pedido
            for (let index = 0; index < tipo_estado; index++) {
                $estados[index].textContent = 'Completado'
            };

            if (estadosPedido) {
                estadosPedido.forEach((statePedido, pos) => {
                    $fechasEstado[pos].textContent = `${ObjMain.formatFecha(statePedido.fecha_estado)}`;
                })
            }
            setTimeout(function() {
                $(`.step0${tipo_estado}`).trigger('click');
            }, 1000)

        } else {
            $resCodigo.textContent = res.message;
            $resCodigo.style.color = '#C51152';
            $inputCodigo.value = "";
        }
    },
    statePedido: (event) => {


        const $inputCodigo = document.querySelector('#cod_seg');
        const $resCodigo = document.querySelector('.res-pedido');


        if ($inputCodigo.value !== '') {
            const resultExpr = /^[0-9]{8}$/.test($inputCodigo.value);
            if (resultExpr) {
                const formData = new FormData();
                formData.append('dni', $inputCodigo.value);
                ObjMain.ajax_post('POST', 'ajax/estadoPedido', formData)
                    .then(res => {
                        const { session } = document.querySelector('.dataUser').dataset;
                        if (session) {
                            res = JSON.parse(res)
                            if (!res.status) {
                                $resCodigo.textContent = res.message;
                                $resCodigo.style.color = '#C51152';
                                $inputCodigo.value = "";
                                return
                            }
                            localStorage.setItem('state_pedido', true)
                            window.location = `${DOMAIN}myaccount`;
                            localStorage.setItem('state_pedido', true)
                        } else {
                            res = JSON.parse(res);
                            ObjMain.showStatePedido(res);
                        }
                    })
                    .catch(err => {

                    })

            } else {
                const formData = new FormData();
                formData.append('codigo', $inputCodigo.value);
                ObjMain.ajax_post('POST', 'ajax/estadoPedido', formData)
                    .then(res => {
                        res = JSON.parse(res);
                        ObjMain.showStatePedido(res);
                    })
                    .catch((err) => {
                        console.log(err)
                    });
            }

        } else {
            $resCodigo.textContent = 'Escriba el código de su pedido'
            $resCodigo.style.color = '#C51152';
        }
    },
    showSearchPedido: () => {
        const $panelState = document.querySelector('#div_seg');
        const $searchMenu = document.querySelector('#div_buscarp');
        const $searchInput = document.querySelector('#div_buscarp1');
        const $inputCodigo = document.querySelector('#cod_seg');
        const $resCodigo = document.querySelector('.res-pedido');

        $panelState.style.display = 'none';
        $searchMenu.style.display = 'block';
        $searchInput.style.display = 'block';
        $inputCodigo.value = '';
        $resCodigo.textContent = ''
        $inputCodigo.focus();
    },
    formatFecha: (format, entrega = 0) => {
        const formato = format.split('-');
        const dia = formato[2]
        const mes = formato[1]
        const anio = formato[0]
        let nombres_dias = new Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado')
        let nombres_meses = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre')
        let fecha_actual = new Date()
        return `${dia} de ${nombres_meses[mes-1]} del ${anio}`
    },
    clientePedidos: (id) => {
        const $pedidosContainer = document.querySelector('.pedido');
        const formData = new FormData();
        formData.append('id_cliente', id);
        ObjMain.ajax_post('POST', `${DOMAIN}ajax/pedidosCliente`, formData)
            .then(response => {
                response = JSON.parse(response)
                if (response.status) {
                    response.data.forEach((pedido, pos) => {
                        let descuento = pedido.cupon_descuento ? pedido.cupon_descuento : 0;
                        let fecha = ObjMain.formatFecha(pedido.pedido_fecha);
                        let nodeDescuento = descuento ? `<span class="item-price" >Descuento: S/ ${descuento}</span>` : ''
                        let nodeEnvioDistrito = !parseInt(pedido.recojo) ? `<span class="detalle"> ${pedido.distrito}</span>` : ''

                        let progressBarrState = !parseInt(pedido.recojo) ?
                            `<div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Orden Generada
                        </div>
                        <div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Preparando Pedido
                        </div>
                        <div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Envío en curso
                        </div>
                        <div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Pedido Entregado
                        </div>` :
                            `<div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Orden Generada
                        </div>
                        <div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Preparando Pedido
                        </div>
                        <div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Listo en Tienda
                        </div>
                        <div class="progress-bar bar-${pos}" role="progressbar" style="width:25%;background-color:#CCC">
                            <i class="fa fa-check"></i> Pedido Entregado
                        </div>
                        `;

                        $pedidosContainer.innerHTML +=
                            `<article class="item-shop">
                <figure class="item-imagen">
                    <img src="https://beurer.pe/assets/sources/CM50_01.jpg" class="item-img">
                    <span class="item-title"> CÓDIGO DE PEDIDO <BR> ${pedido.codigo}</span>
                    <span class="item-title"></span>
                </figure>
                <div class="item-data">
                    <span class="detalle">${parseInt(pedido.recojo) ? '': 'Dirección de Envío:'} ${pedido.dir_envio}</span>
                    ${nodeEnvioDistrito}
                    <br>
                    <span class="item-price">Precio: S/. ${pedido.productos_precio}</span>
                    ${nodeDescuento}
                    <span class="item-price">Envio : S/. ${pedido.entrega_precio}</span>
                    <span class="detalle" style="margin-top:7px;">Total : S/.  ${(parseFloat(pedido.productos_precio) - parseFloat(descuento) + parseFloat(pedido.entrega_precio)).toFixed(2)}</span>

                </div>
                <div class="item-fecha">
                    <span>${fecha}</span>
                    <span>Comprador : ${pedido.nombres} ${pedido.apellidos}</span>
                    
                    <a style="color:#C51152;margin:5px auto;" target="_blank" href="${DOMAIN}pdf/${pedido.codigo}/show">ver detalles</a>
                    <a class="pdfDown" href="${DOMAIN}pdf/${pedido.codigo}/0">Descargar</a>
                
                </div>
            </article>
            
            <div class="progress" style="width:100%;margin-top:14px;margin-bottom:2rem;margin-left:5px">
                ${progressBarrState}
            </div>`;
                        ObjMain.stateProgress(pedido.pedido_estado, pos);

                    })
                } else {
                    document.getElementById('taps').style.display = 'none'
                    $pedidosContainer.innerHTML += `<h4 style="color:#C51152;width:100%;text-align:center;margin-top:18px" >  No tienes pedidos en proceso.</h4`
                }

            })
            .catch(err => {
                console.log(err)
                err = JSON.parse(err);

            });
    },
    nextStepCarrito: () => {
        const subtotal = parseFloat(document.querySelector('.sub_cost').textContent);
        if (subtotal == 0) {
            document.querySelector('.carrito-container').innerHTML = '<h4 style="display:block;margin:7.5em 0" >No tiene productos en su Carrito de Compras</h4>'
        }
        document.querySelector('.btn-nextCarrito').addEventListener('click', event => {
            event.preventDefault();
            const ruta = event.target.href;
            const subtotal = parseFloat(document.querySelector('.sub_cost').textContent);
            console.log(subtotal)
            if (subtotal > 0) {
                window.location = ruta
            } else {
                document.querySelector('.carrito-container').innerHTML = '<h4 style="display:block;margin:7.5em 0" >No tiene productos en su Carrito de Compras</h4>'
            }
        })

    },
    modalRegister: () => {
        const $btnVerify = document.querySelector('.send-verify');
        const $numberInputs = document.querySelectorAll('.code-group > input');
        $numberInputs.forEach(input => {
            input.addEventListener('keyup', e => {
                e.target.setAttribute('maxlength', '1');
                let count = 0;
                for (let index = 0; index < $numberInputs.length; index++) {
                    let number = $numberInputs[index].value != "" ? 1 : 0
                    count = count + number;
                }
                $btnVerify.disabled = count < $numberInputs.length ? true : false;
            })
        });
        $('#modal-verification').modal('show');
    }
}



class Carrito {
    constructor(btnAddCarrito) {
        this.stateCarrito = {
            cantidad: 0,
            total: 0,
            productos: []
        }
        this.$btnAddCarrito = document.querySelector(btnAddCarrito);
        this.$btnAddCarritoError = document.querySelector('.addCarritoError');
        this.TRIGGUER();
    }
    filter() {
        const DomTokenProd = {...this.$btnAddCarrito.dataset };
        delete DomTokenProd.target;
        delete DomTokenProd.toggle;
        DomTokenProd.subtotal = parseFloat(DomTokenProd.precio_online) * parseInt(DomTokenProd.cantidad);
        return DomTokenProd;
    }
    add() {
        const producto = this.filter();
        if (localStorage.getItem('productos')) {
            this.stateCarrito.productos = JSON.parse(localStorage.getItem('productos'));
            const result = this.stateCarrito.productos.filter(prod => prod.id == producto.id)
            if (result.length == 0) {
                this.addState(producto);
                this.addStorage();
            } else {
                this.$btnAddCarrito.dataset.toggle = '';
                this.$btnAddCarritoError.textContent = 'El producto ya se agregó al carrito'
                this.$btnAddCarritoError.classList.add('errorAdd')
                setTimeout(function() {
                    document.querySelector('.addCarritoError').classList.remove('errorAdd')
                    document.querySelector('.addCarritoError').textContent = ''
                }, 4000)

            }
        } else {
            console.log("carrito:" + producto);
            this.addState(producto);
            this.addStorage();

        }
    }
    addState(producto) {
        this.stateCarrito.productos.push(producto);
        console.log(this.stateCarrito.productos)
        this.stateCarrito.productos.forEach(prod => {
            this.stateCarrito.cantidad += parseInt(prod.cantidad)
            this.stateCarrito.total += parseFloat(prod.precio) * parseInt(prod.cantidad);
        })
    }
    addStorage() {
        localStorage.setItem('productos', JSON.stringify(this.stateCarrito.productos));
        localStorage.setItem('total', JSON.stringify(this.stateCarrito.total));
        localStorage.setItem('cantidad', JSON.stringify(this.stateCarrito.cantidad));
    }

    TRIGGUER() {
        this.$btnAddCarrito.addEventListener('click', e => {
            this.add();
        })
    }
}


const perfil = () => {
    let btns3 = document.querySelectorAll('.p_user')
    if (btns3) {
        let btnContainer3 = document.getElementById("p_users");
        let secciones = document.getElementById("panel-user1");
        let infouser = document.getElementById("info_puser");
        let titulouser = document.getElementById("title-info-user");
        let contenidouser = document.getElementById("cont-info-user");
        let back = document.getElementById("back-section-user");
        let inicio = document.getElementById("p_inicio");
        let datos = document.getElementById("p_datosp");
        let orden = document.getElementById("p_misord");
        // let direccion = document.getElementById("p_misdir");
        let info = document.getElementById("info_puser");
        let seccionPass = document.getElementById("panel_pass");
        for (var i = 0; i < btns3.length; i++) {
            btns3[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("p_user active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

        document.getElementById("back-section-user").addEventListener("click", function() {
            info.style.display = 'none';
            secciones.style.display = 'block';
        });

        inicio.addEventListener("click", function(e) {
            titulouser.innerHTML = '<h4 style="margin: auto;font-weight:600">Bienvenido al Panel de Administración del Cliente BEURER</h4>';

            contenidouser.innerHTML = '<h4>En este Panel te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1rem;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Cambio de Contraseña</li> <li>3. Mis Compras </li> </ul> </p>';
            if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }
        });

        datos.addEventListener("click", function() {
            titulouser.innerHTML = '<h4 style="margin: auto;font-weight:600">Datos Personales</h4>';
            contenidouser.innerHTML = `<div class="divTable" style=" width:100%;display:inline-block;margin-top:10px">
            <div class="divTableBody" style="display:block;">
                <div class="divTableRow" id="pn_datos1"  style="display:flex;flex-wrap:wrap;width:100%">
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Nombres </div>
                        <input type="text" size="20" maxlength="30" name="campo1"id="c_nombres1" onkeypress="return soloLetras(event)" value="${userData.nombre}">
                    </div>
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Apellido paterno</div> <input type="text" size="20" maxlength="20"
                            name="campo1" id="c_apep1" onkeypress="return soloLetras(event)" value="${userData.apellido_paterno}">
                    </div>
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Apellido materno</div> <input type="text" size="20" maxlength="20"
                            name="campo1" id="c_apem1" onkeypress="return soloLetras(event)" value="${userData.apellido_materno}">
                    </div>
                   
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Tipo Documento Identidad</div>
                        <select id="s_tipodoc" value="${userData.tipo_documento}"
                            >
                            <option id="di_pn1" value="DNI">DNI</option>
                            <option id="di_pn2" value="PASAPORTE">PASAPORTE</option>
                            <option id="di_pn3" value="CE">CE</option>
                        </select>
                    </div>
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Número Documento Identidad</div> <input type="text" size="20"
                            maxlength="20" name="campo1" id="campo1" value="${userData.documento}" required>
                    </div>
                    
                </div>
                <div class="divTableRow" style = "display:flex;flex-wrap:wrap">
                <div class="divTableCell">
                        <div class="etiquetaFormulario">Teléfono celular</div> <input type="text" size="9" maxlength="9"
                            name="campo1" id="c_telcel" onkeypress="return soloNumeros(event)" value="${userData.telefono}">
                    </div>
                    <div class="divTableCell">
                    <div class="etiquetaFormulario">Correo electrónico</div> <input type="email" id="c_correo1" size="20"
                        maxlength="30" name="campo1" id="correo" value="${userData.correo}"
                        style="">
                     </div>
                </div>
                <div class="divTableRow" style="display:flex;flex-wrap:wrap">
                <div style="width:90%;float:left;margin:auto 0px;font-weight:bold;font-size:1.3em">
                <h4 style="margin: auto;font-weight:600">Mis direcciones</h4>
                 </div> <br> <br>
                 <div class="divTableRow" style ="width:100%">
                    <div class="divTableCell">
                            <div class="etiquetaFormulario">Departamento: <div class="d_ob">*</div>
                            </div>
                            <select id="s_depa" onchange="ObjMain.showProvincesList(this)">
                                <option disabled selected>  </option>
                            </select>
                    </div>
                    
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Provincia: <div class="d_ob">*</div>
                        </div>
                        <select id="sprov" onchange="ObjMain.showDistrictsList(this)">
                            <option disabled selected> </option>
                        </select>
                    </div>
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Distrito: <div class="d_ob">*</div>
                        </div>
                        <select id="sdist">
                            <option disabled selected></option>
                        </select>
                    </div>
                    
                </div>
                <div class="divTableRow" style ="width:100%">
                <div class="divTableCell" style="display:block">
                        <div class="etiquetaFormulario">Dirección</div>
                        <input size="20" type="text" name="campo1"id="locationUser" onkeypress="return soloLetras(event)" value="${userData.direccion}">
                    </div>
                    <div class="divTableCell">
                    <div class="etiquetaFormulario">Referencia</div>
                    <input type="text" id="referencia" size="20" maxlength="45" value="${userData.referencia}">
                    </div>
                </div>
                   
                 </div>
                </div> <br> <br>
                <div style="width:90%;float:left;margin:auto 0px;font-weight:bold;font-size:1.3em">
                    <p>Conoce lo último de Beurer.pe</p>
                </div> <br> <br>
                <div style="text-align:left !important;">
                    <div class="checkbox" style="display:inline-block;" id="d_politicas"> 
                    <label class="font-light label-pol"style="display:inline;"> 
                    <input type="checkbox" id="politicas" ${userData.politicas == 1 ? 'checked':''} /><i class="helper"></i> 
                    </label>
                    <div style="display:inline-block; font-size:1.18em; color:black;"><span>He leído y acepto las <a
                                    href="politicas-de-privacidad" class="span-pol color-primary btn-modals">
                                    Políticas de Privacidad</a>.</span></div>
                    </div>
                </div>
                <div style="text-align:left !important;">
                    <div class="checkbox" style="display:inline-block; " id="d_publicidad"> <label class="font-light label-pol"
                            style="display:inline;"> 
                            <input type="checkbox" id="publicidad" ${userData.ofertas == 1 ? 'checked':''} /><i class="helper"></i> </label>
                        <div style="display:inline-block; font-size:1.18em; color:black;"> <span>Deseo recibir ofertas y novedades de
                                Beurer en mi e-mail.</span></div>
                    </div>
                </div>
                <span class="response-update"style="margin-left:10px;font-size:.8rem;color: #C51152"></span>

                <button onclick ="ObjMain.updateAccount(${userData.id_cliente})" class="btn saveUser" style="border-radius:15px;background-color:#C51152;color:#fff;margin-top:10px;float:left"> Guardar datos</button>
                `;


            let index = userData.tipo_documento == 'DNI' ? '1' :
                userData.tipo_documento == 'PASAPORTE' ? '2' :
                userData.tipo_documento == 'CE' ? '3' :
                ''
            const nodeSelect = document.querySelectorAll('#s_tipodoc > option')[parseInt(index) - 1];
            nodeSelect.setAttribute('selected', 'selected')
                //   update obj UserData
            const tipoDoc = document.querySelector('#s_tipodoc');
            tipoDoc.addEventListener('change', event => {
                userData.tipo_documento = event.target.value
            })

            if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }


            ObjMain.load_ubigeo();
            // ObjMain.defaultUbigeo();
        });

        orden.addEventListener("click", function() {
            titulouser.innerHTML = '<h4 style="margin: auto;font-weight:600">Panel de mis Pedidos</h4>';
            contenidouser.innerHTML = `
            <ul class="taps" id="taps">
                <li class="tap  active" style="font-size:.8rem;font-weight:bold;">
                    Mis Últimas Compras
                </li>
            </ul>
            <br>
            <div class="panels">
            <section class="panel active">
            <div class="pedido" >
                
            </div>
            </section>

               
        </div>`;
            if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }
            ObjMain.clientePedidos(userData.id_cliente)
            ObjMain.taps();
        });

        seccionPass.addEventListener("click", function() {
            titulouser.innerHTML = '<h4 style="margin: auto;font-weight:600">Cambio de Contraseña</h4><h4>Se recomientda usar una contraseña que no uses en otro sitio</h4>';
            contenidouser.innerHTML = `<form id ="formPass"  style="font-size:.85rem"method="POST">
                    <div class="input-group passContainer">
                        <label for="currentPass">Actual</label>
                        <input
                        type="password" name="currentPass" id="currentPass" placeholder="Contraseña actual"required>
                        <img class="eyes"
                        src="https://img2.freepng.es/20180501/bee/kisspng-computer-icons-password-blind-vector-5ae856af60c0e4.3327567715251759833963.jpg">
                    </div>
                    <div class="input-group">
                        <label for="newPass">Nueva</label>
                        <input type="password" name="newPass" id="newPass">
                        <img class="eyes"
                        src="https://img2.freepng.es/20180501/bee/kisspng-computer-icons-password-blind-vector-5ae856af60c0e4.3327567715251759833963.jpg">
                    </div>
                    <div class="input-group repeat"
                    >
                        <label for="repeatNewPass">Repetir contraseña nueva</label>
                        <input type="password" name="repeatNewPass" id="repeatNewPass">
                        <img class="eyes"
                        src="https://img2.freepng.es/20180501/bee/kisspng-computer-icons-password-blind-vector-5ae856af60c0e4.3327567715251759833963.jpg">
                    </div>
                    <hr>
                    <button 
                    data-id = '${userData.id_cliente}'
                    type="submit" class="btn btn-small updatePass" >Guardar cambios</button>
            </form> `;
            if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }

            ObjMain.comparePass()
            ObjMain.updatePass()
            ObjMain.limitPass('#newPass', 5)
            ObjMain.showPass('.eyes')

        });

    }
}

window.addEventListener('load', () => {
    ObjMain.init();
    if (window.location.href == (`${DOMAIN}myaccount`)) {
        perfil();
        if (localStorage.getItem('state_pedido')) {
            $('#p_misord').trigger('click');
            localStorage.removeItem('state_pedido')
        }
    }
    $btncarrito = document.querySelector('.btnAddCarrito')
    if ($btncarrito) {
        new Carrito('.btnAddCarrito');
    }
});