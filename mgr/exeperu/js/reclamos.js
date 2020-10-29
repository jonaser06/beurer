let DOMAIN;
let ObjReclamos = {
    init: ()=>{
        DOMAIN = (window.location.hostname=='localhost')?'http://localhost/beurer/':'http://www.blogingenieria.site/';
        ObjReclamos.load_reclamos();
    },
    load_reclamos: ()=>{
        let table = document.querySelector('.table_reclamos');

        let reclamo = '';

        ObjReclamos.ajax_post('GET', DOMAIN+'ajax/get_reclamos', '')
        .then((resp)=>{
            resp = JSON.parse(resp);
            resp.data.forEach((d)=>{
                reclamo += '<tr>';
                reclamo += '<th>'+ d.id_reclamo +'</th>';
                reclamo += '<th>'+ d.r_nombr +'</th>';
                reclamo += '<th>'+ d.r_apat +'</th>';
                reclamo += '<th>'+ d.r_amat +'</th>';
                reclamo += '<th>'+ d.r_fecha +'</th>';
                reclamo += '</tr>';
            });
            table.innerHTML = reclamo;
        })
        .catch();
        
    },
    
    reclammo_buscar: (e)=>{
        e.preventDefault();

        let formData = new FormData();

        formData.append('fecha', document.querySelector('#reservation').value );

        document.querySelector('.fecha_reclamo').value = document.querySelector('#reservation').value;

        let table = document.querySelector('.table_reclamos');

        let reclamo = '';
        ObjReclamos.ajax_post('POST', DOMAIN+'ajax/get_reclamos', formData)
        .then((resp)=>{
            resp = JSON.parse(resp);
            // console.log(resp);
            resp.data.forEach((d)=>{
                reclamo += '<tr>';
                reclamo += '<th>'+ d.id_reclamo +'</th>';
                reclamo += '<th>'+ d.r_nombr +'</th>';
                reclamo += '<th>'+ d.r_apat +'</th>';
                reclamo += '<th>'+ d.r_amat +'</th>';
                reclamo += '<th>'+ d.r_fecha +'</th>';
                reclamo += '</tr>';
            });
            table.innerHTML = reclamo;
        })
        .catch();
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
};

window.addEventListener('load', ()=>{
    ObjReclamos.init();
});