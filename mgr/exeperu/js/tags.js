Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_tags();
};

Helpers.prototype.table_tags = function () {
    this.loadDataTable('table_tags', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
        },
        "columns": [
            {"data": "nombre"},
            {"data": "orden"},
            {"data": "estado", "render": function (data) {
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

Helpers.prototype.delTag = function (idtag) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/tags/delete', {"id": idtag}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    toastr.success("Tag eliminado correctamente",{timeOut:2000});
    this.tables['table_tags'].ajax.reload();
};

Helpers.prototype.editTag = function (idtag) {
    this.sendAjax('manager/tags/edit', {"id": idtag}, 'loadResponse');
};

Helpers.prototype.addTag= function () {
    this.sendAjax('manager/tags/edit', {"idtag": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableTags = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_tags'].ajax.reload();
};



