/* Control de eventos 
*  ObjMain.init : objeto que que inicializa los eventos
*  ObjMain.ajax_post : objeto para peticiones ajax
*/
var ubigeoPeru = {
	ubigeos: new Array()
};

ObjMain = {
    init: ()=>{
        ObjMain.changueColor('#principal-img','.selectColor','.btnAddCarrito');
        ObjMain.changueQuanty('#aum','#dism','#cantidad_prod','.btnAddCarrito');
        ObjMain.modalCarrito('.btnAddCarrito','.cantidadModal')
        ObjMain.load_ubigeo();
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
        ObjMain.ajax_post('GET', './ajax/getprovincia','')
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
            if (ubigeo.departamento === departamento && ubigeo.provincia !== 0 && ubigeo.distrito === '00') {

                let option = document.createElement('option');
                option.id = 'prov-' + ubigeo.provincia;
                option.name = 'provincia';
                option.value = ubigeo.provincia;
    
                option.textContent = ubigeo.nombre;
    
                document.querySelector('#sprov').appendChild(option);
            }
        });
    },
    showDistrictsList: (provincia)=>{
        departamento = document.getElementById('s_depa').value;
        provincia = provincia.value;
        document.querySelector('#sdist').innerHTML = '';

        ubigeoPeru.ubigeos.forEach((ubigeo)=>{
            if (ubigeo.departamento === departamento && ubigeo.provincia === provincia && ubigeo.distrito !== 0) {

                let option = document.createElement('option');

                option.id = 'dist-' + ubigeo.distrito;
                option.name = 'distrito';
                option.value = ubigeo.distrito;
                option.textContent = ubigeo.nombre;

                document.querySelector('#sdist').appendChild(option);
            }
        });

    },
    submit_form: () => {
        let tipodoc = document.querySelector('#s_tipodoc').value;
            n_documento = document.querySelector('#n_documento').value;
            nombre = document.querySelector('#c_nombres1').value;
            apellidoP = document.querySelector('#c_apep1').value;
            apellidoM = document.querySelector('#c_apem1').value;
            correo = document.querySelector('#correo').value;
            pass1 = document.getElementById('passw').value;
            pass2 = document.getElementById('confpassw').value;
            dep = document.getElementById('confpassw').value;
            prov = document.getElementById('confpassw').value;
            dist = document.getElementById('confpassw').value;
            dire = document.getElementById('confpassw').value;
            ref = document.getElementById('confpassw').value;
            day = document.getElementById('confpassw').value;
            month = document.getElementById('confpassw').value;
            year = document.getElementById('confpassw').value;
            polt = document.getElementById('confpassw').value;
            ofert = document.getElementById('confpassw').value;

        let formData = new FormData();
        formData.append("tipo_documento", tipodoc);
        formData.append("n_documento", n_documento);
        formData.append("n_documento", n_documento);

        console.log(tipodoc);
        /* 
        let pass1 = document.getElementById('passw').value;
        let pass2 = document.getElementById('confpassw').value;
        let alerterr = document.querySelector('.passalert');
        let alerterr2 = document.querySelector('.passalert2');
        if( pass1 != pass2){
            alerterr.style.display = 'block';
            alerterr2.style.display = 'block';
        } else {
            alerterr.style.display = 'none';
            alerterr2.style.display = 'none';
        } */

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

             const $visor = document.querySelector(visor),
             $addCarrito = document.querySelector(btnCarrito);

             const { img , color, codigo }= event.target.dataset;
             ObjMain.render($visor , `<img src=${img}>` );
                
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
      modalCarrito: (btn , componentModal ) => {
        const $btnAdd = document.querySelector(btn);
        if($btnAdd) {
            $btnAdd.addEventListener('click' , e => ObjMain.render( 
                document.querySelector(componentModal),
                `Cantidad: ${$btnAdd.dataset.cantidad}`
            ))
        }
      },  
    
    valida_correo:(event) =>{
        var perror = document.getElementById('dp_error');
        var error = document.getElementById('d_error');
        var texto = event.value;
        var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if (!regex.test(texto)) {
            perror.style.display = "inline-block";
            error.innerHTML = "El correo ingresado es inválido";

        } else {
            perror.style.display = "none";
            error.innerHTML = "";

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
    }
    filter(){
        const DomTokenProd = {...this.$btnAddCarrito.dataset};
        delete DomTokenProd.target ;
        delete DomTokenProd.toggle ;
        return DomTokenProd;
    }
    add () {
        const producto = this.filter();

        // this.stateCarrito.productos.push(producto)
        // this.stateCarrito.cantidad = parseInt(producto.cantidad);
        // this.stateCarrito.total = this.stateCarrito.cantidad * parseFloat(product)
        // localStorage.setItem('productos', JSON.stringify(this.stateCarrito.productos))
    }
    listeners () {
        this.$btnAddCarrito.addEventListener('click', e => {
            this.add();
        })
    }
}

window.addEventListener('load', () => {
    
    new Carrito('.bntAddCarrito');
    ObjMain.init();
} );

