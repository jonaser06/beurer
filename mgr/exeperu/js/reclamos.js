let DOMAIN;
let ObjReclamos = {
    init: ()=>{
        DOMAIN = (window.location.hostname=='localhost')?'http://localhost/beurer/':'http://www.blogingenieria.site/';
        ObjReclamos.load_reclamos();
    },
    load_reclamos: ()=>{
        let table = document.querySelector('.table_reclamos');
        let url = window.location.href;
        url = new URL(url);
        let reclamo = '';

        let page = url.searchParams.get("page");
        // console.log(page);

        ObjReclamos.ajax_post('GET', DOMAIN+'ajax/get_reclamos?page='+page, '')
        .then((resp)=>{
            resp = JSON.parse(resp);
            // history.pushState({}, null, 'manager/reclamos');
            // console.log(window.location.href);
            resp.data.forEach((d)=>{
                reclamo += '<tr>';
                reclamo += '<th>'+ d.id_reclamo +'</th>';
                reclamo += '<th>'+ d.r_nombr +'</th>';
                reclamo += '<th>'+ d.r_apat +'</th>';
                reclamo += '<th>'+ d.r_amat +'</th>';
                reclamo += '<th>'+ d.r_fecha +'</th>';
                reclamo += '</tr>';
            });
            let btn_page = '';
            let previus_page = '';
            let next_page = '';
            let previus_page_url = DOMAIN+'manager/reclamos?page='+resp.previus_page;
            let next_page_url = DOMAIN+'manager/reclamos?page='+resp.next_page;

            if(!resp.previus_page){
                previus_page = 'disabled';
                previus_page_url = DOMAIN+'manager/reclamos?page='+parseInt(resp.currentpage);
            }
            console.log(previus_page);
            
            btn_page += '<li class="paginate_button previous '+previus_page+'" id="table_subcategory_previous"><a href="'+previus_page_url+'" >Previous</a></li>';
            let active = '';
            
            for (let i = 1; i <= resp.paginas; i++) {
                active = (parseInt(resp.currentpage) == i)?'active':'';

                btn_page += '<li class="paginate_button '+active+'"><a href="'+DOMAIN+'manager/reclamos?page='+i+'" aria-controls="table_subcategory" data-dt-idx="1" tabindex="0">'+i+'</a></li>';
            }

            if(!resp.next_page){
                next_page = 'disabled';
                next_page_url = DOMAIN+'manager/reclamos?page='+parseInt(resp.currentpage);
            }

            btn_page += '<li class="paginate_button next '+next_page+'" id="table_subcategory_next"><a href="'+next_page_url+'" >Next</a></li>';

            document.querySelector('.pagination').innerHTML = btn_page;
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
            if(resp.status){
                // console.log(resp);
                document.querySelector('.btn-sbmt-exp').disabled = false;
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
                document.querySelector('.pagination').innerHTML = '';
            }else{
                document.querySelector('.btn-sbmt-exp').disabled = true;
                table.innerHTML = '';
                document.querySelector('.pagination').innerHTML = '';
            }
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