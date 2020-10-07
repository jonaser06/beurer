/* Control de eventos 
*  ObjMain.init : objeto que que inicializa los eventos
*  ObjMain.ajax_post : objeto para peticiones ajax
*/
ObjMain = {
    init: ()=>{
        /* Eventos */
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


window.addEventListener('load', () => {
    ObjMain.init();
} );

