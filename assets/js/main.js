/* Control de eventos 
*  ObjMain.init : objeto que que inicializa los eventos
*  ObjMain.ajax_post : objeto para peticiones ajax
*/
ObjMain = {
    init: ()=>{
        ObjMain.changueColor('#principal-img','.selectColor','.btnAddCarrito');
        ObjMain.changueQuanty('#aum','#dism','#cantidad_prod','.btnAddCarrito');
        ObjMain.modalCarrito('.btnAddCarrito','.cantidadModal')
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

