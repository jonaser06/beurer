/* Control de eventos 
*  ObjMain.init : objeto que que inicializa los eventos
*  ObjMain.ajax_post : objeto para peticiones ajax
*/
ObjMain = {
    init: ()=>{
        /* Eventos */
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

