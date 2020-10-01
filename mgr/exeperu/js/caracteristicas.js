Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_modelos();

//    $("#filter_0").on("change", function (event) {
//        self.filter0(event);
//    });
//    $("#filter_1, #filter_2, #filter_3, #filter_4").on("change", function () {
//        self.filterss();
//    });
};

Helpers.prototype.table_modelos = function () {
    this.loadDataTable('table_modelos', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
            "data":{"idp":this.dataApp.idp}
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
//            {"data": "orden"},
            {"data": "estado", "render": function (data) {
                    var salida = '';

                    switch (data) {
                        case '1':
                            salida = '<span class="label label-success">Activo</span>';
                            break;
                        case '0':
                            salida= '<span class="label label-danger">Inactivo</span>';
                            break;
                        default:
                            salida = '<span class="label label-success">Activo</span>';
                            break;
                    }

                    return salida;
                }
            },
            {"data": "botones"}
        ]
    });
};



Helpers.prototype.editModelo = function (idmodelo) {
    this.sendAjax('manager/caracteristicas/edit', {"id": idmodelo,"idp":this.dataApp.idp}, 'loadResponse');
};

Helpers.prototype.addModelo = function () {
    this.sendAjax('manager/caracteristicas/edit', {"idmodelo": 0,"idp":this.dataApp.idp}, 'loadResponse');
};

Helpers.prototype.reloadTableModelos = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_modelos'].ajax.reload();
};

Helpers.prototype.refrescarc = function (response) {
    return this.tables['table_modelos'].ajax.reload();
};

Helpers.prototype.delModelo = function (idmodelo) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/caracteristicas/delete', {"id": idmodelo}, 'refrescarc');
    }
};


Helpers.prototype.tableModeloscar = function () {
    var self = this;
    var campo_14 = $('#campo_14');
    var data = JSON.parse(campo_14.val());

    this.loadDataTable('table_complementos', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "idcaracteristica", render: function (data, type, row, meta) {
                    var salida;

                    for (var index in self.caracteristicas) {
                        if (self.caracteristicas[index].idcaracteristica === data) {
                            salida = self.caracteristicas[index].caracteristica;
                            break;
                        }
                    }

                    return !salida ? data : salida;
                }
            },
            {"data": "valor"},
            {"data": "orden"},
            {"data": "idcolumn", render: function (data, type, row, meta) {
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_complementocar('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_complementocar('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
                            "<a href=\"javascript: Exeperu.eliminar_complementocar('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.cancelar_complementocar = function () {
    var tabla = this.tables['table_complementos'];
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

Helpers.prototype.crear_complementocar = function (idmodelo) {
    if (!this.cancelar_complementocar())
        return false;

    var tabla = this.tables['table_complementos'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;
//    var next = 0;

    tabla.row.add({
        "idmodelo": idmodelo,
        "idcaracteristica": "",
        "valor": "",
        "orden": "0.00",
        "idcolumn": "esp_" + next
//        "row_edit": true
    }).draw().page('last').draw('page');

//    tabla.page('last').draw('page');

//    row.data(edit_data).page(page).draw('page');

    return this.editar_complementocar("esp_" + next);
};

Helpers.prototype.editar_complementocar = function (iditem) {
    var self = this;

    if (!this.cancelar_complementocar())
        return false;

    var tabla = this.tables['table_complementos'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    var raw_data = this.raw_data_current = row.data();
    var edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
            case 'idmodelo':
                var valuex = value;
                break;
            case 'idcaracteristica':
                var valuex = '<select name="' + index + '" id="sels_' + iditem + '" class="sels_select2 celda_editada" style="width: 100%">';
                valuex += '<option>Característica</option>';
                valuex += self.getOptionsCaracteristicas(value);
                valuex += '</select>';
                break;
            case 'valor':
                var valuex = '<textarea name="' + index + '"  class="celda_editada" style="width: 100%">'+(!value ? '' : value)+'</textarea>';
                break;
            case 'orden':
                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
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

Helpers.prototype.guardar_complementocar = function (iditem) {
    var tabla = this.tables['table_complementos'];
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

    return this.guardar_textareacar();
};

Helpers.prototype.eliminar_complementocar = function (iditem) {
    var tabla = this.tables['table_complementos'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');

    return this.guardar_textareacar();
};

Helpers.prototype.guardar_textareacar = function () {
    var tabla = this.tables['table_complementos'];
    var texarea = $('#campo_14');
    var data = tabla.data().toArray();

    texarea.val(JSON.stringify(data));
};

Helpers.prototype.getOptionsCaracteristicas = function (valor) {
    var salida;

    for (var index in this.caracteristicas) {
        if (this.caracteristicas[index].idcaracteristica === valor) {
            salida += '<option value="' + this.caracteristicas[index].idcaracteristica + '" selected>' + this.caracteristicas[index].caracteristica + '</option>';
        } else {
            salida += '<option value="' + this.caracteristicas[index].idcaracteristica + '">' + this.caracteristicas[index].caracteristica + '</option>';
        }
    }

    return salida;
};





