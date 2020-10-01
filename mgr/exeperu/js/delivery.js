Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_delivery();
    
    $("#delivery").on("change", function () {
        self.filterss();
    });
};

Helpers.prototype.table_delivery = function () {
    this.loadDataTable('table_delivery', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
            "data": function (d) {
                var data = {};
                $.each($('#form_exportable').serializeArray(), function (index, item) {
                    data[item['name']] = item['value'];
                });

                return $.extend({}, d, data);
            }
        },
        "columns": [
            {"data": "distrito"},
            {"data": "precio_sol"},
            {"data": "precio_dol"},
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

Helpers.prototype.delDelivery = function (iddistrito) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/delivery/delete', {"id": iddistrito}, 'refrescar');
    }
};

Helpers.prototype.editPreciosdel = function () {
    this.sendAjax('manager/delivery/editprecios',location.href="manager/delivery");
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_delivery'].ajax.reload();
};

Helpers.prototype.editDelivery = function (iddistrito) {
    this.sendAjax('manager/delivery/edit', {"id": iddistrito}, 'loadResponse');
};

Helpers.prototype.addDelivery = function () {
    this.sendAjax('manager/delivery/edit', {"iddistrito": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableDelivery = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_delivery'].ajax.reload();
};

Helpers.prototype.filterss = function () {
    this.tables['table_delivery'].ajax.reload();
};



