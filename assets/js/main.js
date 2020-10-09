/* Control de eventos 
*  ObjMain.init : objeto que que inicializa los eventos
*  ObjMain.ajax_post : objeto para peticiones ajax
*/
var ubigeoPeru = {
	ubigeos: new Array()
};

ObjMain = {
    init: ()=>{
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
            polt = (document.querySelector('#politicas').checked )? true : false ;
            ofert = (document.querySelector('#publicidad').checked )? true : false ;

            /* validar campos nulos */
            if( tipodoc != null && n_documento != null && nombre != null && apellidoP != null && apellidoM != null && correo != null && pass1 != null &&  pass2 != null && 
                dep != null && prov != null && dist != null && dire != null && ref != null && telf != null && day != null && month != null && year != null && polt == true ){
                    /* valida correo, politicas, y contraseñas */
                    if(!ObjMain.valida_correo(correo)){
                        ObjMain.alert_form(false,'El correo ingresado es inválido!');
                    }else if(polt==false){
                        ObjMain.alert_form(false,'Debe aceptar las politicas!');
                    }else if(pass1!=pass2){
                        ObjMain.alert_form(false,'Las contraseñas no coinciden');
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

                        ObjMain.ajax_post('POST','./ajax/setregister', formData)
                        .then((resp)=>{
                            resp = JSON.parse(resp);
                            window.location = "./registro";
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


window.addEventListener('load', () => {
    ObjMain.init();
} );

