Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_colores();
    
};

Helpers.prototype.table_colores = function () {
    this.loadDataTable('table_colores', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
//            "data": function (d) {
//                var data = {};
//                $.each($('#form_exportable').serializeArray(), function (index, item) {
//                    data[item['name']] = item['value'];
//                });
//
//                return $.extend({}, d, data);
//            }
        },
        "columns": [
            {"data": "color"},
            {"data": "codigo"},
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

Helpers.prototype.delColor = function (idcolor) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/colores/delete', {"id": idcolor}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_colores'].ajax.reload();
};

Helpers.prototype.editColor = function (idcolor) {
    this.sendAjax('manager/colores/edit', {"id": idcolor}, 'loadResponse');
};

Helpers.prototype.addColor = function () {
    this.sendAjax('manager/colores/edit', {"idcolor": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableColores = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_colores'].ajax.reload();
};

Helpers.prototype.filterss = function () {
    this.tables['table_delivery'].ajax.reload();
};



