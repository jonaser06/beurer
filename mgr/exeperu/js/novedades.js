Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_novedades();

//    $("#filter_0").on("change", function (event) {
//        self.filter0(event);
//    });
//    $("#filter_1, #filter_2, #filter_3, #filter_4").on("change", function () {
//        self.filterss();
//    });
};

Helpers.prototype.table_novedades = function () {
    this.loadDataTable('table_novedades', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
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
            {"data": "titulo"},
            {"data": "imagen", "render": function (data) {
                    var salida = '';

                    salida= '<img src="'+data+'" width="60px;" height="40px;">';
                            
                    return salida;
                }
            },
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



Helpers.prototype.editNovedad = function (idnovedad) {
    this.sendAjax('manager/novedades/edit', {"id": idnovedad}, 'loadResponse');
};

Helpers.prototype.addNovedad = function () {
    this.sendAjax('manager/novedades/edit', {"idnovedad": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableNovedades = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_novedades'].ajax.reload();
};

Helpers.prototype.refrescarc = function (response) {
    return this.tables['table_novedades'].ajax.reload();
};

Helpers.prototype.delNovedad = function (idnovedad) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/novedades/delete', {"id": idnovedad}, 'refrescarc');
    }
};


