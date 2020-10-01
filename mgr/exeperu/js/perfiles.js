Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_perfiles();
};

Helpers.prototype.table_perfiles = function () {
    this.loadDataTable('table_perfiles', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
        },
        "columns": [
            {"data": "perfil"},
            {"data": "activo", "render": function (data) {
                    var salida = '';

                    switch (data) {
                        case '1':
                            salida = '<span class="label label-success">Activo</span>';
                            break;
                        default:
                            salida= '<span class="label label-danger">Inactivo</span>';
                            break;
                    }

                    return salida;
                }
            },
            {"data": "botones"}
        ]
    });
};

Helpers.prototype.delPerfil = function (idperfil) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/perfiles/delete', {"id": idperfil}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function (response) {
//    console.log(response);
    var jm=JSON.parse(response);
                    
    if(jm.tipo==1){
        toastr.success(jm.mensaje,{timeOut:2000});
        this.tables['table_perfiles'].ajax.reload();
    }else{
        toastr.error(jm.mensaje,{timeOut:2000});
    }
        
        
};

Helpers.prototype.editPerfil = function (idperfil) {
    this.sendAjax('manager/perfiles/edit', {"id": idperfil}, 'loadResponse');
};

Helpers.prototype.addPerfil = function () {
    this.sendAjax('manager/perfiles/edit', {"idperfil": 0}, 'loadResponse');
};

Helpers.prototype.reloadTablePerfiles = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_perfiles'].ajax.reload();
};



