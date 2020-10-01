Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_categorias();

//    $("#filter_0").on("change", function (event) {
//        self.filter0(event);
//    });
//    $("#filter_1, #filter_2, #filter_3, #filter_4").on("change", function () {
//        self.filterss();
//    });
};

Helpers.prototype.table_categorias = function () {
    this.loadDataTable('table_categorias', {
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
            {"data": "categoria"},
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



Helpers.prototype.editCategoria = function (idcategoria) {
    this.sendAjax('manager/categorias/edit', {"id": idcategoria}, 'loadResponse');
};

Helpers.prototype.addCategoria = function () {
    this.sendAjax('manager/categorias/edit', {"idcategoria": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableCategorias = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_categorias'].ajax.reload();
};

Helpers.prototype.refrescarc = function (response) {
    return this.tables['table_categorias'].ajax.reload();
};

Helpers.prototype.delCategoria = function (idcategoria) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/categorias/delete', {"id": idcategoria}, 'refrescarc');
    }
};


