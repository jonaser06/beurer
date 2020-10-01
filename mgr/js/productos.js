Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_productos();
    this.stable_sabores();
    this.stable_presentaciones();
};

Helpers.prototype.table_productos = function () {
    this.loadDataTable('table_pedidos', {
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
            {"data": "idproducto"},
            {"data": "nombre"},
            {"data": "codigo"},
//            {"data": "grupo"},
            {"data": "precio_sol"},
            {"data": "precio_dol"},
            {"data": "estado", "render": function (data) {
                    var salida = '';

                    switch (parseInt(data)) {
                        case 1:
//                            salida = '<i class="fa fa-cc-visa" aria-hidden="true" style="font-size: 34px;color: #172274;"></i>';
                            salida = 'Act.';
                            break;
                        default:
                            salida = 'Inact.';
                            break;
                    }

                    return salida;
                }
            },
            {"data": "botones"}
        ]
    });
};

Helpers.prototype.delProducto = function (idproducto) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/productos/delete', {"id": idproducto}, 'refrescar');
    }
};

Helpers.prototype.delSabor = function (idsabor) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/sabores/delete', {"id": idsabor}, 'refrescars');
    }
};

Helpers.prototype.delPresentacion = function (idpresentacion) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/presentaciones/delete', {"id": idpresentacion}, 'refrescarp');
    }
};

Helpers.prototype.stable_sabores = function () {
    this.loadDataTable('stable_sabores', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": "manager/sabores/read"
        },
        "columns": [
            {"data": "idsabor"},
            {"data": "sabor"},
            {"data": "estado", "render": function (data) {
                    var salida = '';

                    switch (parseInt(data)) {
                        case 1:
//                            salida = '<i class="fa fa-cc-visa" aria-hidden="true" style="font-size: 34px;color: #172274;"></i>';
                            salida = 'Act.';
                            break;
                        default:
                            salida = 'Inact.';
                            break;
                    }

                    return salida;
                }
            },
            {"data": "botones"}
        ]
    });
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_pedidos'].ajax.reload();
};

Helpers.prototype.refrescars = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['stable_sabores'].ajax.reload();
};

Helpers.prototype.refrescarp = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['stable_presentaciones'].ajax.reload();
};


Helpers.prototype.stable_presentaciones = function () {
    this.loadDataTable('stable_presentaciones', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": "manager/presentaciones/read"
        },
        "columns": [
            {"data": "idpresentacion"},
            {"data": "presentacion"},
            {"data": "botones"}
        ]
    });
};

Helpers.prototype.editProducto = function (idproducto) {
    this.sendAjax('manager/productos/edit', {"id": idproducto}, 'loadResponse');
};

Helpers.prototype.addProducto = function () {
    this.sendAjax('manager/productos/edit', {"idproducto": 0}, 'loadResponse');
}

Helpers.prototype.tablePresentaciones = function () {
    var self = this;
    var campo_16 = $('#campo_16');
    var data = JSON.parse(campo_16.val());

    this.loadDataTable('table_presentaciones', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "idsabor", render: function (data, type, row, meta) {
                    var salida;

                    for (var index in self.sabores) {
                        if (self.sabores[index].idsabor === data) {
                            salida = self.sabores[index].sabor;
                            break;
                        }
                    }

                    return !salida ? data : salida;
                }
            },
            {"data": "idpresentacion", render: function (data, type, row, meta) {
                    var salida;

                    for (var index in self.presentaciones) {
                        if (self.presentaciones[index].idpresentacion === data) {
                            salida = self.presentaciones[index].presentacion;
                            break;
                        }
                    }

                    return !salida ? data : salida;
                }
            },
            {"data": "stock"},
            {"data": "idcolumn", render: function (data, type, row, meta) {
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_presentacion('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_presentacion('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
                            "<a href=\"javascript: Exeperu.eliminar_presentacion('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.cancelar_presentacion = function () {
    var tabla = this.tables['table_presentaciones'];
    var row = tabla.row('.row_edit');
    var page = tabla.page();

    if (row.node()) {
        var $_row = $(row.node());

        delete this.raw_data_current.row_edit;
        $_row.removeClass('row_edit');

        row.data(this.raw_data_current).page(page).draw('page');

        this.raw_data_current = {};
    }

    return true;
};

Helpers.prototype.crear_presentacion = function (idproducto) {
    if (!this.cancelar_presentacion())
        return false;

    var tabla = this.tables['table_presentaciones'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;
//    var next = 0;

    tabla.row.add({
        "idproducto": idproducto,
        "idsabor": "0",
        "idpresentacion": "0",
        "stock": "0",
        "idcolumn": "esp_" + next,
//        "row_edit": true
    }).draw().page('last').draw('page');

//    tabla.page('last').draw('page');

//    row.data(edit_data).page(page).draw('page');

    return this.editar_presentacion("esp_" + next);
};

Helpers.prototype.editar_presentacion = function (iditem) {
    var self = this;

    if (!this.cancelar_presentacion())
        return false;

    var tabla = this.tables['table_presentaciones'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    var raw_data = this.raw_data_current = row.data();
    var edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
            case 'idproducto':
                var valuex = value;
                break;
            case 'idsabor':
                var valuex = '<select name="' + index + '" id="sels_' + iditem + '" class="sels_select2 celda_editada" style="width: 100%">';
                valuex += '<option>Sabor</option>';
                valuex += self.getOptionsSabores(value);
                valuex += '</select>';
                break;
            case 'idpresentacion':
                var valuex = '<select name="' + index + '" id="selp_' + iditem + '" class="sels_select2 celda_editada" style="width: 100%">';
                valuex += '<option>Presentación</option>';
                valuex += self.getOptionsPresentaciones(value);
                valuex += '</select>';
                break;
            default:
                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                break;
        }

        edit_data[index] = valuex;
    });

    edit_data.row_edit = true;
    $_row.addClass('row_edit');

    row.data(edit_data).page(page).draw('page');

    $('.sels_select2').select2({dropdownParent: $("#modalCreateEdit")});
};

Helpers.prototype.guardar_presentacion = function (iditem) {
    var tabla = this.tables['table_presentaciones'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page();
    var raw_data = row.data();
    var new_values = $('#' + iditem + ' .celda_editada').serializeArray();
    var new_data = {};

    $.each(new_values, function (index, value) {
        raw_data[value.name] = value.value;
    });

//    console.log(raw_data);
//    return false;

    delete raw_data.row_edit;
    $_row.removeClass('row_edit');

    row.data(raw_data).page(page).draw('page');

    return this.guardar_textarea();
};

Helpers.prototype.eliminar_presentacion = function (iditem) {
    var tabla = this.tables['table_presentaciones'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');

    return this.guardar_textarea();
};

Helpers.prototype.guardar_textarea = function () {
    var tabla = this.tables['table_presentaciones'];
    var texarea = $('#campo_16');
    var data = tabla.data().toArray();

    texarea.val(JSON.stringify(data));
};

Helpers.prototype.getOptionsSabores = function (valor) {
    var salida;

    for (var index in this.sabores) {
        if (this.sabores[index].idsabor === valor) {
            salida += '<option value="' + this.sabores[index].idsabor + '" selected>' + this.sabores[index].sabor + '</option>';
        } else {
            salida += '<option value="' + this.sabores[index].idsabor + '">' + this.sabores[index].sabor + '</option>';
        }
    }

    return salida;
};

Helpers.prototype.getOptionsPresentaciones = function (valor) {
    var salida;

    for (var index in this.presentaciones) {
        if (this.presentaciones[index].idpresentacion === valor) {
            salida += '<option value="' + this.presentaciones[index].idpresentacion + '" selected>' + this.presentaciones[index].presentacion + '</option>';
        } else {
            salida += '<option value="' + this.presentaciones[index].idpresentacion + '">' + this.presentaciones[index].presentacion + '</option>';
        }
    }

    return salida;
};

Helpers.prototype.validar = function () {
    var self = this;

    var config = {
        ignore: "",
//        rules: {
//            "categoria": {required: true}
//        },
//        messages: {
//            "categoria": {required: ""}
//        },
        submitHandler: function (form) {
            var formulario = $(form);
            var data = formulario.serializeArray();

            self.sendAjax('manager/productos/save', data, 'reloadTableProductos');
        }
    };

    this.validate('formCrearEditar', config);
};

Helpers.prototype.reloadTableProductos = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_pedidos'].ajax.reload();
};



///////////////////////////////////////////////////////////////////////////



Helpers.prototype.addSabor = function () {
    this.sendAjax('manager/sabores/edit', {"idsabor": 0}, 'loadResponse');
}

Helpers.prototype.addPresentacion = function () {
    this.sendAjax('manager/presentaciones/edit', {"idpresentacion": 0}, 'loadResponse');
}

Helpers.prototype.seditSabor = function (idsabor) {
    this.sendAjax('manager/sabores/edit', {"idsabor": idsabor}, 'loadResponse');
};

Helpers.prototype.seditPresentacion = function (idpresentacion) {
    this.sendAjax('manager/presentaciones/edit', {"idpresentacion": idpresentacion}, 'loadResponse');
};

Helpers.prototype.validarSabor = function () {
    var self = this;

    var config = {
        ignore: "",
//        rules: {
//            "categoria": {required: true}
//        },
//        messages: {
//            "categoria": {required: ""}
//        },
        submitHandler: function (form) {
            var formulario = $(form);
            var data = formulario.serializeArray();

            self.sendAjax('manager/sabores/save', data, 'reloadTableSabores');
        }
    };

    this.validate('formCrearEditar2', config);
};

Helpers.prototype.validarPresentacion = function () {
    var self = this;

    var config = {
        ignore: "",
//        rules: {
//            "categoria": {required: true}
//        },
//        messages: {
//            "categoria": {required: ""}
//        },
        submitHandler: function (form) {
            var formulario = $(form);
            var data = formulario.serializeArray();

            self.sendAjax('manager/presentaciones/save', data, 'reloadTablePresentaciones');
        }
    };

    this.validate('formCrearEditar3', config);
};

Helpers.prototype.reloadTableSabores = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['stable_sabores'].ajax.reload();
};

Helpers.prototype.reloadTablePresentaciones = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['stable_presentaciones'].ajax.reload();
};