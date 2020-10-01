Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.tab_registros();

};

Helpers.prototype.tab_registros = function () {
    this.loadDataTable('table_registros', {
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
            {"data": "idformulario"},
            {"data": "formulario"},
            {"data": "contacto_nombre"},
            {"data": "contacto_correo"},
            {"data": "contacto_telefono"},
            {"data": "fecha"}
        ]
    });
};
//Helpers.prototype.tab_registros = function (akey, principal) {
//    this.akey = akey;
//    this.principal = principal;
//
//    this.loadDataTable('table_registros', {
//        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
//        "pagingType": "full_numbers",
//        "ajax": {
//            "type": "POST",
//            "url": 'manager/contactos/read'
//        },
//        "columns": [
//            {"data": "idformulario", "width": "20%"},
//            {"data": "formulario", "width": "40%"},
//            {"data": "fecha", "width": "40%"}
//        ]
//    });
//
//};