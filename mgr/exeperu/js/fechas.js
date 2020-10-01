Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_fechas();
    
};

Helpers.prototype.table_fechas = function () {
    this.loadDataTable('table_fechas', {
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
            {"data": "dia"},
            {"data": "mes"},
            {"data": "anio"},
            {"data": "descripcion"},
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

Helpers.prototype.delFecha = function (idfecha) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/fechas/delete', {"id": idfecha}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_fechas'].ajax.reload();
};

Helpers.prototype.editFecha = function (idfecha) {
    this.sendAjax('manager/fechas/edit', {"id": idfecha}, 'loadResponse');
};

Helpers.prototype.addFecha = function () {
    this.sendAjax('manager/fechas/edit', {"idcolor": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableFechas = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_fechas'].ajax.reload();
};

Helpers.prototype.filterss = function () {
    this.tables['table_fechas'].ajax.reload();
};



