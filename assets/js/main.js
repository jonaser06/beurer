/* Control de eventos 
*  ObjMain.init : objeto que que inicializa los eventos
*  ObjMain.ajax_post : objeto para peticiones ajax
*
*  ObjMain.getDataCarrito()    : retorna un obj con  los datos del carrito
*/
var ubigeoPeru = {
	ubigeos: new Array()
};
let DOMAIN;
let filterResult = false;


ObjMain = {
    init: ()=>{
        DOMAIN = (window.location.hostname=='localhost')?'http://localhost/beurer/':'http://www.blogingenieria.site/';
        ObjMain.changueColor('#principal-img','.selectColor','.btnAddCarrito');
        ObjMain.changueQuanty('#aum','#dism','#cantidad_prod','.btnAddCarrito');
        ObjMain.modalCarrito('.btnAddCarrito','.cantidadModal');
        if(window.location.href== ( DOMAIN+'registro' ) ){
            console.log('Pagina de registro');
            ObjMain.load_ubigeo();
        }
        if(document.querySelector('.login') != null){
            ObjMain.sign_in();
        }
        if(document.querySelector('.email-recovery') != null){
            ObjMain.recovery();
        }
        if(document.querySelector('.change_password') != null){
            ObjMain.changePassword();
        }
        if(document.querySelector('.change_password') != null){
            ObjMain.changePassword();
        }
        ObjMain.comparePass()
        ObjMain.updatePass()
        ObjMain.limitPass('#currentPass',5)
        ObjMain.showPass('.eyes')
        if(document.querySelector('#container10') != null){
            ObjMain.overload();
        }
        if(document.querySelector('#checkout_crumb') != null){
            ObjMain.listar_items(); 
        }
    },
    recalculo: () =>{

    },
    listar_items: () => {
        let item = localStorage.getItem('productos');
        if(item){
            item = JSON.parse(item);
            item.forEach((p,index)=>{
                document.querySelector('.carrito-container').innerHTML += ObjMain.item_carrito(index, p.id, p.cantidad, p.img, p.precio, p.precio_online, p.producto_sku, p.subtotal, p.title);
                document.querySelector('.body-resumen').innerHTML += ObjMain.pedido(index,p.id, p.cantidad, p.img, p.precio, p.precio_online, p.producto_sku, p.subtotal, p.title);
            });
        }else{
            console.log('Sin productos en el carrito');
        }
    },
    pedido: (index, id, cantidad, img, precio, precio_online, producto_sku, subtotal, title)=>{
        index = index+1;
        precio_online = precio_online * cantidad;
        let pedido = '';
            pedido += '<div class="item-body-resumen ibr-'+id+'">';
            pedido += '<div class="ind-resumen">'+index+'</div>'; 
            pedido += '<div class="name-resumen">'+title+'</div>'; 
            pedido += '<div class="cost-partial" id="res-'+id+'">'+(precio_online).toFixed(2)+'</div>'; 
            pedido += '</div>'; 
        return pedido;
    },
    item_carrito: (index, id, cant, img, precio, precio_online, producto_sku, subtotal, title)=>{
        subtotal = (precio_online * cant).toFixed(2);
        let item = '';
            item += '<div class="basket-product" data-id="'+id+'">';
            item += '<div class="item">';
            item += '<a class="product-image" data-toggle="modal" onclick=ObjMain.modal("'+img+'") data-target="#exampleModal">';
            item += '<img src="'+DOMAIN+img+'" alt="Placholder Image 2" class="product-frame"></a>';
            item += '<div class="product-details">';
            item += '<span>'+title+'</span>';
            item += '<p>SKU: '+producto_sku+'</p>';
            item += '<p>Envío a domicilio</p>';
            item += '</div>';
            item += '</div>';
            item += '<div class="price" id="preuni">';
            item += '<div class="info-prod" style="display:block;">';
            item += '<img src="assets/images/precio-online.png">';
            item += '<div class="font-nexaheav text-left price rprice"> '+precio_online+'</div>';
            item += '<input type="hidden" class="precio-'+id+'" value="'+precio_online+'">';
            item += '</div>';
            item += '<div class="font-nexaheav">Normal: S/ '+precio+'</div>';
            item += '</div>';
            item += '<div class="quantity">';
            item += '<button class="count-cant" onclick="ObjMain.menos('+id+');">-</button>';
            item += '<input class="form-control-field cantidad cant-'+id+'" name="pwd" value="'+parseInt(cant)+'" type="text" min="1" readonly>';
            item += '<button class="count-cant" onclick="ObjMain.mas('+id+');">+</button>';
            item += '</div>';
            item += '<div class="subtotal rsubtotal sub-'+id+'" id="subtotal">'+subtotal+'</div>';
            item += '<div class="remove">';
            item += '<a id="trash" href="#"><img src="assets/images/nuevo/delete.png" alt="" onclick=ObjMain.delete(event)></a>';
            item += '</div>';
            item += '</div>';
        return item;
    },
    delivery: () =>{
        d_envio = document.getElementById("d_envio");
        var checkBo = document.getElementById("check_envio");
        if (checkBo.checked == true) {

            d_envio.style.display = "block";
            ObjMain.load_ubigeo();


        } else {

            d_envio.style.display = "none";

        }
    },
    delete: (event)=>{
        event.preventDefault();
        let id = event.path[3].getAttribute('data-id');
        event.path[3].remove();
        document.querySelector('.ibr-'+id).remove();
        
        // console.log(event.path[3]);
        // document.querySelector('.item-prod-'+id).remove();
    },
    mas:(id)=>{
        if(parseInt(document.querySelector('.cant-'+id).value) < 10){ 
            let cantidad = parseInt(document.querySelector('.cant-'+id).value);
            let ncantidad = cantidad + 1; 
            let precio   = parseFloat(document.querySelector('.precio-'+id).value).toFixed(2);
            let subtotal = (ncantidad*precio).toFixed(2);
            document.querySelector('.cant-'+id).value = ncantidad;
            document.querySelector('.sub-'+id).innerHTML = subtotal;
            document.querySelector('#res-'+id).innerHTML = subtotal;
            /* update productos */
            let productos = localStorage.getItem('productos');
            if(productos){
                productos = JSON.parse(productos);
                for(let i = 0; i < productos.length ; i++){
                    if(productos[i].cantidad == cantidad){
                        productos[i].cantidad = ncantidad;
                        break;
                    }
                }
            }
            localStorage.removeItem('productos');
            localStorage.setItem('productos',JSON.stringify(productos));
        };
        
        return;
    },
    menos: (id)=>{
        if(parseInt(document.querySelector('.cant-'+id).value) > 1){ 
            let cantidad = parseInt(document.querySelector('.cant-'+id).value);
            let ncantidad = cantidad  - 1;  
            let precio   = parseFloat(document.querySelector('.precio-'+id).value).toFixed(2);
            let subtotal = (ncantidad*precio).toFixed(2);
            document.querySelector('.cant-'+id).value = ncantidad;
            document.querySelector('.sub-'+id).innerHTML = subtotal;
            document.querySelector('#res-'+id).innerHTML = subtotal;
            /* update productos */
            let productos = localStorage.getItem('productos');
            if(productos){
                productos = JSON.parse(productos);
                for(let i = 0; i < productos.length ; i++){
                    if(productos[i].cantidad == cantidad){
                        productos[i].cantidad = ncantidad;
                        break;
                    }
                }
            }
            localStorage.removeItem('productos');
            localStorage.setItem('productos',JSON.stringify(productos));
        };
        
        return;
    },
    modal:(img) =>{
        console.log(img);
        let imgmodal = '<img src="'+DOMAIN+img+'" style="width: 100%;box-shadow:-3px 3px 25px -3px rgba(0,0,0,0.3); " alt="Placholder Image 2"></img>';
        document.querySelector('.modal-body').innerHTML = imgmodal;

        var prueba = document.getElementById("modal_foto");
        prueba.style.paddingTop = $(window).scrollTop() - 150 + "px";
        console.log($(window).scrollTop());
    },
    overload(){
        setTimeout(ObjMain.myFunction(), 0);
    },
    myFunction: () =>{
        document.getElementById("container10").style.display='none';
        document.getElementById("cabecera").style.display='block';
        document.getElementById("piedepag").style.display='block';
        document.getElementById("cuerpo").style.display='block';   
        document.getElementById("parte-contacto").style.display='block';   
        document.getElementById("principal").style.backgroundColor='white'; 
    },
    changePassword: ()=>{
        document.querySelector('.change_password').addEventListener('click', ()=>{
            let contrasena = document.querySelector('.new_password').value;
            let id = document.querySelector('.idrecovery').value;
            let formData = new FormData();
            formData.append('contrasena', contrasena);
            formData.append('id_cliente', id);
            ObjMain.ajax_post('POST',DOMAIN+'ajax/new_password', formData)
            .then((resp)=>{
                resp = JSON.parse(resp);
                console.log(resp);
                let aviso = '<p class="res_mail">'+resp.message+'</p>';
                document.querySelector('.ajax-resp').innerHTML = aviso;
                window.location = DOMAIN;
            })
            .catch((err)=>{
                err = JSON.parse(err);
                document.querySelector('.err_recovery').style.display = 'block';
            });
        });
    },
    recovery: () => {
        document.querySelector('.button_recovery').addEventListener('click', ()=>{
            document.querySelector('.err_mail').style.display = 'none';
            document.querySelector('.err_recovery').style.display = 'none';

            let correo = document.querySelector('.email-recovery').value;
            if(!ObjMain.valida_correo(correo)){
                document.querySelector('.err_mail').style.display = 'block';
            }else{
                let formData = new FormData();
                formData.append('correo', correo);
                ObjMain.ajax_post('POST',DOMAIN+'ajax/recovery', formData)
                .then((resp)=>{
                    resp = JSON.parse(resp);
                    console.log(resp.data.correo);
                    let aviso = '<p class="res_mail">Se envio un correo ah: '+resp.data.correo+'</p>';
                    document.querySelector('.ajax-resp').innerHTML = aviso;
                })
                .catch((err)=>{
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
    getDataCarrito : () => {
        return localStorage.getItem('productos')? 
        {
            total : parseFloat(localStorage.getItem('total')) ,
            cantidad : parseInt(localStorage.getItem('cantidad')),
            productos : JSON.parse(localStorage.getItem('productos'))
        }:{ 
            response : 'No se agregaron al carrito'
        }
        
    },
    updateAccount : (id) => {
        const $btnSave = document.querySelector('.saveUser')
        let formData = new FormData();
        const apellidos = document.querySelector('#c_apep1').value.trim().split(' ');
        const politicas = (document.querySelector('#politicas').checked )? 1 : 0 ;
        const correo    = document.querySelector('#c_correo1').value ;
        let tipo = document.querySelector('#s_tipodoc').value;
        let direccion= document.querySelector('#locationUser').value;

        
        if (!politicas ) {
            $btnSave.dataset.content = 'x Acepte las Politicas';
            // document.documentElement.style.setProperty('--colorSave','#C51152');            
            return;
        }
        formData.append("nombre", document.querySelector('#c_nombres1').value);
        formData.append("apellido_paterno", apellidos[0]);
        formData.append("apellido_materno", apellidos[1]);
        formData.append("correo", correo);
        formData.append("telefono", document.querySelector('#c_telcel').value);
        formData.append("tipo_documento",tipo  );
        formData.append("documento",  document.querySelector('#campo1').value);
        formData.append("politicas",politicas) ;
        formData.append("direccion",direccion) ;
        formData.append("ofertas",(document.querySelector('#publicidad').checked )? 1 : 0  );

        ObjMain.ajax_post('POST',`${DOMAIN}myaccount/update/${id}`, formData)
        .then((resp)=>{
            resp = JSON.parse(resp);
            $btnSave.dataset.content = '√ Datos Actualizados';
            document.documentElement.style.setProperty('--colorSave','green');  

            const spinner = document.getElementById("spinner");
            ObjMain.showSpinner(spinner);
            userData = resp.data;
            const $nodeSaludo = document.querySelector('.user-name-db')
            ObjMain.render(
                $nodeSaludo,
                `${userData.nombre} ${userData.apellido_paterno} ${userData.apellido_materno}`);

            document.getElementById("p_datosp").click();

            
        })
        .catch((err)=>{
            err = JSON.parse(err);
            ObjMain.alert_form(false,err.message);
        });
    },
    sign_in: () =>{
        if(localStorage.getItem('remember')!= null){
            let sesion = localStorage.getItem('remember');
            sesion = JSON.parse(sesion);
            document.querySelector("#username_").value = sesion.user;
            document.querySelector("#pasword_").value = sesion.pass;
            console.log("desde la memoria "+sesion);
        }
        if(document.querySelector('.login-container') != null ){
            document.querySelector('.login-container').addEventListener('submit',(e)=>{
                e.preventDefault();
                let remember = {};
                polt = (document.querySelector('#remember_').checked ) ? 1 : 0 ;
                let user = document.querySelector("#username_").value;
                let pass = document.querySelector("#pasword_").value;
                if( polt == 1 ){
                    remember.user = user;
                    remember.pass = pass;
                    localStorage.setItem('remember', JSON.stringify(remember));
                }
                let formData = new FormData();
                formData.append("username", user);
                formData.append("contrasena", pass);
                ObjMain.ajax_post('POST',DOMAIN+'ajax/login', formData )
                .then((resp)=>{
                    resp = JSON.parse(resp);
                    if(resp.status){
                        window.location = DOMAIN;
                    }
                })
                .catch((err)=>{
                    err = JSON.parse(err);
                    let message = document.querySelector(".response_sesion");
                    message.innerHTML = err.message;
    
                });
            });
        }
    },
    login: ()=>{
        let ventanalogin = document.getElementsByClassName("login")[0];
        if (ventanalogin.style.display == "none" && screen.width > 767) {
            ventanalogin.style.display = "block";
        } else {
            ventanalogin.style.display = "none";
        }
    },
    load_ubigeo: ()=>{
        ObjMain.ajax_post('GET', DOMAIN+'ajax/getprovincia','')
        .then((resp)=>{
            ubigeoPeru.ubigeos = JSON.parse(resp);
            ObjMain.showRegionsList();
        })
        .catch((err)=>{
            console.log(err);
        });
    },
    showRegionsList: () =>{
        ubigeoPeru.ubigeos.forEach((ubigeo)=>{
            if (ubigeo.provincia === '00' && ubigeo.distrito === '00') {
                let option = document.createElement('option');
                option.id = 'dpto-' + ubigeo.departamento;
                option.name = 'departamento';
                option.value = ubigeo.departamento;
                option.setAttribute('data-name',ubigeo.nombre);
                option.textContent = ubigeo.nombre;
                document.querySelector('#s_depa').appendChild(option);
            }
        });
    },
    showProvincesList: (departamento) => {
        departamento = departamento.value;

        document.querySelector('#sprov').innerHTML = '';
        document.querySelector('#sdist').innerHTML = '';
        
        ubigeoPeru.ubigeos.forEach((ubigeo)=>{
            if (ubigeo.departamento === departamento && ubigeo.provincia !== '00' && ubigeo.distrito === '00') {

                let option = document.createElement('option');
                option.id = 'prov-' + ubigeo.provincia;
                option.name = 'provincia';
                option.value = ubigeo.provincia;
                option.setAttribute('data-name',ubigeo.nombre);
                option.textContent = ubigeo.nombre;
    
                document.querySelector('#sprov').appendChild(option);
            }
        });
        ObjMain.showDistrictsList(document.querySelector('#sprov'));
    },
    showDistrictsList: (provincia)=>{
        departamento = document.getElementById('s_depa').value;
        provincia = provincia.value;
        document.querySelector('#sdist').innerHTML = '';

        ubigeoPeru.ubigeos.forEach((ubigeo)=>{
            if (ubigeo.departamento === departamento && ubigeo.provincia === provincia && ubigeo.distrito !== '00') {

                let option = document.createElement('option');

                option.id = 'dist-' + ubigeo.distrito;
                option.name = 'distrito';
                option.value = ubigeo.distrito;
                option.setAttribute('data-name',ubigeo.nombre);
                if(ubigeo.small_price) {
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
            polt = (document.querySelector('#politicas').checked )? 1 : 0 ;
            ofert = (document.querySelector('#publicidad').checked )? 1 : 0 ;

            /* validar campos nulos */
            if( tipodoc != null && n_documento != null && nombre != null && apellidoP != null && apellidoM != null && correo != null && pass1 != null &&  pass2 != null && 
                dep != null && prov != null && dist != null && dire != null && ref != null && telf != null && day != null && month != null && year != null ){
                    /* valida correo, politicas, y contraseñas */
                    if(!ObjMain.valida_correo(correo)){
                        return ObjMain.alert_form(false,'El correo ingresado es inválido!');
                    }

                    if(polt == 0){
                        return ObjMain.alert_form(false,'Debe aceptar las politicas!');
                    }
                    
                    if(pass1!=pass2){
                        return ObjMain.alert_form(false,'Las contraseñas no coinciden');
                    }else{
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
                            formData.append("fecha_nacimiento", (year+'-'+month+'-'+day) );
                            formData.append("tipo_documento", tipodoc);
                            formData.append("documento", n_documento);
                            formData.append("politicas", polt);
                            formData.append("ofertas", ofert);

                        ObjMain.ajax_post('POST',DOMAIN+'ajax/setregister', formData)
                        .then((resp)=>{
                            resp = JSON.parse(resp);
                            window.location = DOMAIN;
                        })
                        .catch((err)=>{
                            err = JSON.parse(err);
                            ObjMain.alert_form(false,err.message);
                        });
                    }
            }else{

                ObjMain.alert_form(false,'Complete todos los datos');
            }


    },
    alert_form: (status, message) =>{
        let perror = document.getElementById('dp_error');
        let error = document.getElementById('d_error');
        /* limpiamos mensajes previos */
        perror.style.display = "none";
        error.innerHTML = "";

        if(!status){
            perror.style.display = "inline-block";
            error.innerHTML = message;
        }

    },
    solonumero: (event) =>{
        event.value = event.value.replace(/\D/g, '');
    },   
    render:  ( element ,content ) => {
        element.innerHTML = content ;
    },
    changueColor : ( visor , btnColorChangue ,btnCarrito)  => {
        document.addEventListener('click', event => {
            if(event.target.matches(btnColorChangue)){
                DOMAIN = (window.location.hostname=='localhost')?'http://localhost/beurer/':'http://www.blogingenieria.site/';

             const $visor = document.querySelector(visor),
             $addCarrito = document.querySelector(btnCarrito)
             tabs = document.querySelectorAll('.tabs_section');
             
             const { img , color, producto_sku }= event.target.dataset;
             tabs.forEach(tab => tab.classList.remove('-open'))
             $visor.classList.add('-open')
             ObjMain.render($visor , `<img src=${DOMAIN}${img}>`);
                
                $addCarrito.setAttribute('data-color',color);
                $addCarrito.setAttribute('data-img',img);
                $addCarrito.setAttribute('data-producto_sku',producto_sku);
            }
        })
      },
    changueQuanty : ( btnAdd,btnDown,nodeQuanty,btnCarrito) =>{
        document.addEventListener('click', event => {

            if(event.target.matches(btnAdd)){
                const $addCarrito = document.querySelector(btnCarrito);
                const $cantidad = document.querySelector(nodeQuanty)
                $cantidad.value = parseInt($cantidad.value) + 1
                $addCarrito.setAttribute('data-cantidad',$cantidad.value);

                
            }
            if(event.target.matches(btnDown)){
                const $addCarrito = document.querySelector(btnCarrito);
                const $cantidad = document.querySelector(nodeQuanty)
                $cantidad.value = parseInt($cantidad.value) == 1 ? parseInt($cantidad.value):parseInt($cantidad.value) - 1 ;
                $addCarrito.setAttribute('data-cantidad',$cantidad.value);

            }
        })
    },
    changueImg : (tagImg , ruta ) => {
        document.querySelector(tagImg).src = ruta
    },
    modalCarrito: (btn , componentModal ) => {
        const $btnAdd = document.querySelector(btn);
        if($btnAdd) {
            $btnAdd.addEventListener('click' , e => {
                ObjMain.render( 
                document.querySelector(componentModal),
                `Cantidad: ${$btnAdd.dataset.cantidad}`
                );
                let foto = DOMAIN + $btnAdd.dataset.img;
                if($btnAdd.dataset.img) {
                    ObjMain.changueImg('.img-modal',foto)
                }
            })
        }
    },  
    valida_correo:(correo) =>{
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
    comparePass : () => {
        const $newPass = document.querySelector('#newPass'),
        $repeatPass    = document.querySelector('#repeatNewPass'),
        $btnUpdatePass = document.querySelector('.updatePass');

        if($newPass) {
            $repeatPass.addEventListener('keyup', event => {
                const $divContainer = event.target.parentElement;
        
                if (event.target.value == $newPass.value) {
                    $btnUpdatePass.disabled = false;
                    $divContainer.dataset.content = ' √ Las contraseñas coinciden'
                    document.documentElement.style.setProperty('--color','green');
                    filterResult =  true ;
                }else {
                    $btnUpdatePass.disabled = true ;
                    $divContainer.dataset.content = 'x Las contraseñas no coinciden';
                    document.documentElement.style.setProperty('--color','#C51152');
                    filterResult=  false;
                }
                
            })
        }
        
    },
    updatePass: () =>  {
        const $pass= document.querySelector('.updatePass');
        const $containerPass = document.querySelector('.passContainer');
        const $repeat = document.querySelector('.repeat');
        if($pass) {
            $pass.addEventListener('click' , e => {
                e.preventDefault();
                const { id } = $pass.dataset; 
                
               
                if(filterResult && document.querySelector('#currentPass').value !=='') {
                    
                    const $form= document.querySelector('#formPass');
                    const formData = new FormData($form);
    
                    ObjMain.ajax_post('POST',`${DOMAIN}updatePass/${id}`,formData)
                    .then((resp)=>{
                        resp = JSON.parse(resp);
                        $containerPass.dataset.content = resp.message;
                        document.documentElement.style.setProperty('--colorResponse',`${resp.code == 404 ? '#C51152': 'green'} `);
                        $form.reset()
                        $repeat.dataset.content = ''
                    })
                    .catch((err)=>{
                        err = JSON.parse(err);
                        
                    });
                }else {
                    
                        document.querySelector('#currentPass').parentElement.dataset.content = 'Escriba una contraseña';
                        document.documentElement.style.setProperty('--colorResponse','#C51152');
    
                    
                }
    
            }
        )
        }
      
    } ,
    limitPass : (component , limit ) => {
        const $currentPass = document.querySelector(component);
        
        if($currentPass){
            $currentPass.addEventListener('keyup', event => {
                const $parent = event.target.parentElement;

                if($currentPass.value.length > limit ) {
                    $parent.dataset.content = '√ constraseña segura';
                    document.documentElement.style.setProperty('--colorResponse','green');
                    return
                }else {
                    $parent.dataset.content = 'constraseña muy corta';
                    document.documentElement.style.setProperty('--colorResponse','blue');
                    return
                }
            })
        }
        

    },
    showPass : (component) => {
        const $showPass = document.querySelectorAll(component);
        
        if($showPass){
           $showPass.forEach( show => {
               show.addEventListener('click', event => {
                let $pass = event.target.parentElement.children[1]
                $pass.type = $pass.type == "password" ? "text" : "password";
               })
           })
        }
    }

}


class Carrito {
    constructor (btnAddCarrito) {
        this.stateCarrito = {
            cantidad : 0 ,
            total : 0 ,
            productos : []
        }
        this.$btnAddCarrito  = document.querySelector(btnAddCarrito);
        this.TRIGGUER();
    }
    filter(){
        const DomTokenProd = {...this.$btnAddCarrito.dataset};
        delete DomTokenProd.target ;
        delete DomTokenProd.toggle ;
        DomTokenProd.subtotal = parseFloat(DomTokenProd.precio )* parseInt(DomTokenProd.cantidad );
        return DomTokenProd;
    }
    add() {
        const producto = this.filter();
        if ( localStorage.getItem('productos') ) {
            this.stateCarrito.productos = JSON.parse(localStorage.getItem('productos'));
            this.addState(producto);
            this.addStorage();
        }else {
            this.addState(producto);
            this.addStorage();

        }
    }
    addState (producto){
        this.stateCarrito.productos.push(producto);
        console.log(this.stateCarrito.productos)
        this.stateCarrito.productos.forEach(prod => {
            this.stateCarrito.cantidad += parseInt(prod.cantidad) 
            this.stateCarrito.total    +=  parseFloat(prod.precio )* parseInt(prod.cantidad );
        })
    }
    addStorage(){
        localStorage.setItem('productos', JSON.stringify(this.stateCarrito.productos));
        localStorage.setItem('total', JSON.stringify(this.stateCarrito.total));
        localStorage.setItem('cantidad', JSON.stringify(this.stateCarrito.cantidad));
    }
    
    TRIGGUER () {
        this.$btnAddCarrito.addEventListener('click', e => {
            this.add();
        })
    }
}


const perfil = () => {
    let btns3 = document.querySelectorAll('.p_user')
    if(btns3){
        let btnContainer3 = document.getElementById("p_users");
        let secciones = document.getElementById("panel-user1");
        let infouser = document.getElementById("info_puser");
        let titulouser = document.getElementById("title-info-user");
        let contenidouser = document.getElementById("cont-info-user");
        let back = document.getElementById("back-section-user");
        let inicio = document.getElementById("p_inicio");
        let datos = document.getElementById("p_datosp");
        let orden = document.getElementById("p_misord");
        let direccion = document.getElementById("p_misdir");
        let info = document.getElementById("info_puser");
        let seccionPass = document.getElementById("panel_pass");
        for (var i = 0; i < btns3.length; i++) {
            btns3[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("p_user active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
        
        document.getElementById("back-section-user").addEventListener("click", function () {
            info.style.display = 'none';
            secciones.style.display = 'block';
        });
    
        inicio.addEventListener("click", function (e) {
            titulouser.innerHTML = '<p style="margin: auto;">Bienvenido al Panel de Administración del Cliente BEURER</p>';
    
            contenidouser.innerHTML = '<h4>En este Panel te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p>';
            if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }
        });
    
        datos.addEventListener("click", function () { 
            titulouser.innerHTML = '<p>Datos Personales</p>';
            contenidouser.innerHTML = `<div class="divTable" style=" width:100%;display:inline-block;">
            <div class="divTableBody" style="display:block;">
                <div class="divTableRow" id="pn_datos1">
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Nombres </div>
                        <input type="text" size="20" maxlength="30" name="campo1"id="c_nombres1" onkeypress="return soloLetras(event)" value="${userData.nombre}">
                    </div>
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Apellidos</div> <input type="text" size="20" maxlength="20"
                            name="campo1" id="c_apep1" onkeypress="return soloLetras(event)" value="${userData.apellido_paterno} ${userData.apellido_materno}">
                    </div>
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Correo electrónico</div> <input type="email" id="c_correo1" size="20"
                            maxlength="30" name="campo1" id="correo" value="${userData.correo}"
                            style="">
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
                    <div class="divTableCell">
                        <div class="etiquetaFormulario">Teléfono celular</div> <input type="text" size="9" maxlength="9"
                            name="campo1" id="c_telcel" onkeypress="return soloNumeros(event)" value="${userData.telefono}">
                    </div>
                </div>
                
                <div class="divTableRow" style="display:flex;flex-wrap:wrap">
                <div style="width:90%;float:left;margin:auto 0px;font-weight:bold;font-size:1.3em">
                <p>Conoce lo último de Beurer.pe</p>
                 </div> <br> <br>
                    <div class="divTableCell" style="display:block">
                        <div class="etiquetaFormulario">Domicilio</div>
                        <input type="text" name="campo1"id="locationUser" onkeypress="return soloLetras(event)" value="${userData.direccion}">
                    </div>
                    <div class="divTableCell" style="display:block">
                        <div class="etiquetaFormulario">Dirección de Envio</div> 
                        <input type="text" size="20" maxlength="20"name="campo1" id="envio"  value="direccion de entrega">
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
                <button onclick ="ObjMain.updateAccount(${userData.id_cliente})" class="btn saveUser" style="background-color:#C51152;color:#fff;margin-top:10px;float:left"> guardar datos</button>
                `;
          let index   = userData.tipo_documento == 'DNI' ? '1' 
                                    :userData.tipo_documento == 'PASAPORTE' ? '2'
                                    : userData.tipo_documento == 'CE' ? '3'
                                    :''
          const nodeSelect = document.querySelectorAll('#s_tipodoc > option')[parseInt(index)-1];
          nodeSelect.setAttribute('selected','selected')
        //   update obj UserData
          const tipoDoc = document.querySelector('#s_tipodoc');
          tipoDoc.addEventListener('change' , event => {
             userData.tipo_documento = event.target.value
          })
        
    
    
        if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }
        });
    
        orden.addEventListener("click", function () {
            titulouser.innerHTML = '<p style="margin: auto;">Mis órdenes</p>';
            contenidouser.innerHTML = '<h4>En este Panel2 te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p>';
            if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }
        });
    
        direccion.addEventListener("click", function () {
            titulouser.innerHTML = '<p style="margin: auto;">Mis direcciones</p>';
            contenidouser.innerHTML = ``;
            if (screen && screen.width < 700) {
                secciones.style.display = 'none';
                infouser.style.display = 'block';
            }
        });
    
     
        seccionPass.addEventListener("click", function () {
            titulouser.innerHTML = '<p style="margin: auto;">Cambio de Contraseña</p><h4>Se recomientda usar una contraseña que no uses en otro sitio</h4>';
            contenidouser.innerHTML = `<form id ="formPass" method="POST">
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
            ObjMain.limitPass('#currentPass',5)
            ObjMain.showPass('.eyes')
               
        });
        
    }

    
}

window.addEventListener('load', () => {
    ObjMain.init();
    if( window.location.href== ( `${DOMAIN}myaccount` ) ){
        perfil();
    }
   $btncarrito = document.querySelector('.btnAddCarrito')
    if($btncarrito) {
        new Carrito('.btnAddCarrito');
    }
} );

