Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_usuarios();
};

Helpers.prototype.table_usuarios = function () {
    this.loadDataTable('table_usuarios', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
        },
        "columns": [
            {"data": "username"},
            {"data": "alias"},
            {"data": "perfil"},
            {"data": "registerdate", "render": function (data) {
                    var salida = '';

                    salida=data.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
                    return salida;
                }
            },
            {"data": "active", "render": function (data) {
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

Helpers.prototype.delUsuario = function (iduser) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/usuarios/delete', {"id": iduser}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    toastr.success("Usuario eliminado correctamente",{timeOut:2000});
    this.tables['table_usuarios'].ajax.reload();
};

Helpers.prototype.editUsuario = function (iduser) {
    this.sendAjax('manager/usuarios/edit', {"id": iduser}, 'loadResponse');
};

Helpers.prototype.addUsuario = function () {
    this.sendAjax('manager/usuarios/edit', {"iduser": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableUsers = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_usuarios'].ajax.reload();
};



