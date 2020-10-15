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

ObjMain = {
    init: ()=>{
        DOMAIN = (window.location.hostname=='localhost')?'http://localhost/beurer/':'http://www.blogingenieria.site/';
        console.log(DOMAIN);
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
    },
    changePassword: ()=>{
        
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
       
        let formData = new FormData();
        const apellidos = document.querySelector('#c_apep1').value.trim().split(' ');
        const politicas = (document.querySelector('#politicas').checked )? 1 : 0 ;
        const correo    = document.querySelector('#c_correo1').value ;
        let tipo = document.querySelector('#s_tipodoc').value;

        
        if (!politicas ) {
            ObjMain.alert_form(false,'Acepte las politicas');
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
        formData.append("ofertas",(document.querySelector('#publicidad').checked )? 1 : 0  );

        ObjMain.ajax_post('POST',`${DOMAIN}myaccount/update/${id}`, formData)
        .then((resp)=>{
            resp = JSON.parse(resp);
            ObjMain.alert_form(false,'update user');
            console.log(resp.data)
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
             
             const { img , color, codigo }= event.target.dataset;
             tabs.forEach(tab => tab.classList.remove('-open'))
             $visor.classList.add('-open')
             ObjMain.render($visor , `<img src=${DOMAIN}${img}>`);
                
                $addCarrito.setAttribute('data-color',color);
                $addCarrito.setAttribute('data-img',img);
                $addCarrito.setAttribute('data-codigo',codigo);
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
        return DomTokenProd;
    }
    add() {
        const producto = this.filter();
        if ( localStorage.getItem('productos') ) {
            this.stateCarrito.productos = JSON.parse(localStorage.getItem('productos'));
            this.addState(producto);
            this.addStorage();
            console.log(localStorage)
        }else {
            this.addState(producto);
            this.addStorage();
            console.log(localStorage)

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



window.addEventListener('load', () => {
    ObjMain.init();

   $btncarrito = document.querySelector('.btnAddCarrito')
    if($btncarrito) {
        new Carrito('.btnAddCarrito');
    }
} );

