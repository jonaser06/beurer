Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_marcas();

//    $("#filter_0").on("change", function (event) {
//        self.filter0(event);
//    });
//    $("#filter_1, #filter_2, #filter_3, #filter_4").on("change", function () {
//        self.filterss();
//    });
};

Helpers.prototype.table_marcas = function () {
    this.loadDataTable('table_marcas', {
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
            {"data": "nombre"},
            {"data": "imagen_negra", "render": function (data) {
                    var salida = '';

                    salida= '<img src="'+data+'" width="60px;" height="40px;">';
                            
                    return salida;
                }
            },
            {"data": "imagen_color", "render": function (data) {
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



Helpers.prototype.editMarca = function (idmarca) {
    this.sendAjax('manager/marcas/edit', {"id": idmarca}, 'loadResponse');
};

Helpers.prototype.addMarca = function () {
    this.sendAjax('manager/marcas/edit', {"idmarca": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableMarcas = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_marcas'].ajax.reload();
};

Helpers.prototype.refrescarc = function (response) {
    return this.tables['table_marcas'].ajax.reload();
};

Helpers.prototype.delMarca = function (idmarca) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/marcas/delete', {"id": idmarca}, 'refrescarc');
    }
};


