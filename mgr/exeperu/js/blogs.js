Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_blogs();
    
    $("#formulariojm").on("change", function () {
        self.filterss();
    });
};

Helpers.prototype.table_blogs = function () {
    this.loadDataTable('table_blogs', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
            "data": function (d) {
                var data = {};
                $.each($('#form_exportablemod').serializeArray(), function (index, item) {
                    data[item['name']] = item['value'];
                });

                return $.extend({}, d, data);
            }
        },
        "columns": [
            {"data": "titulo"},
//            {"data": "foto"},
            {"data": "imagen", "render": function (data) {
                    var salida = '';

                    salida= '<img src="'+data+'" width="60px;" height="60px;">';
                            
                    return salida;
                }
            },
            {"data": "nombrecompleto", "render": function (data) {
                    var salida = '';
                    
                    salida=data;
                    
                    if(data==null){
                        salida="Sin autor";
                    }
                    
                    return salida;
                }
            },
            {"data": "alias", "render": function (data) {
                    var salida = '';
                    
                    salida=data;
                    
                    if(data==null){
                        salida="Sin usuario";
                    }
                    
                    return salida;
                }
            },
            {"data":"categoria"},
            {"data": "fechajm"},
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

Helpers.prototype.delBlog = function (idblog) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/articulos/delete', {"id": idblog}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    toastr.success("Blog eliminado correctamente",{timeOut:2000});
    this.tables['table_blogs'].ajax.reload();
};

Helpers.prototype.editBlog = function (idblog) {
    this.sendAjax('manager/articulos/edit', {"id": idblog}, 'loadResponse');
};

Helpers.prototype.addBlog = function () {
    this.sendAjax('manager/articulos/edit', {"idblog": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableBlogs = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_blogs'].ajax.reload();
};

Helpers.prototype.filterss = function () {
    this.tables['table_blogs'].ajax.reload();
};

//
//Helpers.prototype.tableAnuncios = function () {
//    var self = this;
//    var campo_14mich = $('#campo_14mich');
//    var data = JSON.parse(campo_14mich.val());
//
//    this.loadDataTable('table_anuncios', {
//        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
//        "pagingType": "full_numbers",
//        "rowId": "idcolumn",
//        "data": data,
//        "columns": [
//            {"data": "imagen","width":"30%", "render": function (data) {
//                    var myRe = /^<input type/g;
//                    var resultado = myRe.exec(data);
//                    if (resultado !== null && resultado.length > 0) {
//                        return data;
//                    }
//                    return '<img src="' + data + '" width="50" height="50">';
//                }
//            },
//            {"data": "url"},
//            {"data": "idtipo"},
//            {"data": "iddimension"},
//            {"data": "orden"},
//            {"data": "estado"},
//            {"data": "idcolumn", render: function (data, type, row, meta) {
//                    var salida;
//
//                    if (row.row_edit) {
//                        salida = [
//                            "<center>",
//                            "<a href=\"javascript: Exeperu.guardar_anuncio('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
//                            "</center>",
//                        ].join('');
//                    } else {
//                        salida = [
//                            "<center>",
//                            "<a href=\"javascript: Exeperu.editar_anuncio('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
//                            "<a href=\"javascript: Exeperu.eliminar_anuncio('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
//                            "</center>",
//                        ].join('');
//                    }
//
//                    return salida;
//                }
//            }
//        ]
//    });
//};
//
//Helpers.prototype.cancelar_anuncio = function () {
//    var tabla = this.tables['table_anuncios'];
//    var row = tabla.row('.row_edit');
//    var page = tabla.page();
//
//    if (row.node()) {
//        var $_row = $(row.node());
//
//        delete this.raw_data_current.row_edit;
//        $_row.removeClass('row_edit');
//
//        row.data(this.raw_data_current).page(page).draw('page');
//
//        this.raw_data_current = {};
//    }
//
//    return true;
//};
//
//Helpers.prototype.crear_anuncio = function (idanuncio) {
//    if (!this.cancelar_anuncio())
//        return false;
//
//    var tabla = this.tables['table_anuncios'];
//    var page = tabla.page();
//    var total = tabla.data().length;
//    var next = total + 1;
////    var next = 0;
//
//    tabla.row.add({
//        "idanuncio": idanuncio,
//        "imagen": "",
//        "url": "",
//        "idtipo": "",
//        "iddimension": "",
//        "orden": "0.00",
//        "estado": "",
//        "idcolumn": "esp_" + next
////        "row_edit": true
//    }).draw().page('last').draw('page');
//
////    tabla.page('last').draw('page');
//
////    row.data(edit_data).page(page).draw('page');
//
//    return this.editar_anuncio("esp_" + next);
//};
//
//Helpers.prototype.editar_anuncio = function (iditem) {
//    var self = this;
//
//    if (!this.cancelar_anuncio())
//        return false;
//
//    var tabla = this.tables['table_anuncios'];
//    var row = tabla.row('#' + iditem);
//    var $_row = $(row.node());
//    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
//    var raw_data = this.raw_data_current = row.data();
//    var edit_data = {};
//
//    $.each(raw_data, function (index, value) {
//        switch (index) {
//            case 'idcolumn':
//            case 'idblog':
//                var valuex = value;
//                break;
//            case 'imagen':
//                var valuex = '<input type="text" id="camp_' + raw_data.idcolumn + '" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 90%">';
//                valuex += '<button type="button" onclick="Exeperu.popupManager(\'camp_' + raw_data.idcolumn + '\',\'\',\'' + self.key + '\')"><span class="glyphicon glyphicon-picture"></span></button>';
//                break;
//            case 'url':
//                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
//                break;
//            case 'idtipo':
//                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
//                break;
//            case 'iddimension':
//                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
//                break;
//            case 'orden':
//                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
//                break;
//            case 'estado':
//                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
//                break;
//            default:
//                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
//                break;
//        }
//
//        edit_data[index] = valuex;
//    });
//
//    edit_data.row_edit = true;
//    $_row.addClass('row_edit');
//
//    row.data(edit_data).page(page).draw('page');
//
//    $('.sels_select2').select2({dropdownParent: $("#modalCreateEdit")});
//};
//
//Helpers.prototype.guardar_anuncio = function (iditem) {
//    var tabla = this.tables['table_anuncios'];
//    var row = tabla.row('#' + iditem);
//    var $_row = $(row.node());
//    var page = tabla.page();
//    var raw_data = row.data();
//    var new_values = $('#' + iditem + ' .celda_editada').serializeArray();
//    var new_data = {};
//
//    $.each(new_values, function (index, value) {
//        raw_data[value.name] = value.value;
//    });
//
////    console.log(raw_data);
////    return false;
//
//    delete raw_data.row_edit;
//    $_row.removeClass('row_edit');
//
//    row.data(raw_data).page(page).draw('page');
//
//    return this.guardar_textareanun();
//};
//
//Helpers.prototype.eliminar_anuncio = function (iditem) {
//    var tabla = this.tables['table_anuncios'];
//    var row = tabla.row('#' + iditem);
//    var page = tabla.page();
//
//    row.remove().page(page).draw('page');
//
//    return this.guardar_textareanun();
//};
//
//Helpers.prototype.guardar_textareanun = function () {
//    var tabla = this.tables['table_anuncios'];
//    var texarea = $('#campo_14mich');
//    var data = tabla.data().toArray();
//
//    texarea.val(JSON.stringify(data));
//};
//
//
//
Helpers.prototype.getOptionsDimensiones = function (valor) {
    var salida;

    for (var index in this.dimensiones) {
        if (this.dimensiones[index].iddimension === valor) {
            salida += '<option value="' + this.dimensiones[index].iddimension + '" selected>' + this.dimensiones[index].dimension + '</option>';
        } else {
            salida += '<option value="' + this.dimensiones[index].iddimension + '">' + this.dimensiones[index].dimension + '</option>';
        }
    }


    return salida;
};

Helpers.prototype.tablePrueba = function () {
    var self = this;
    var camp_14 = $('#campo_14mich');
    var data = JSON.parse(camp_14.val());

    this.loadDataTable('table_anuncios', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "imagen", "orderable": false, "render": function (data) {
                    var myRe = /^<input type/g;
                    var resultado = myRe.exec(data);
                    if (resultado !== null && resultado.length > 0) {
                        return data;
                    }
                    return '<img src="' + data + '" width="50" height="50">';
                }
            },
            {"data": "url", "orderable": false},
//            {"data": "idtipo", "orderable": false},
//            {"data": "iddimension", "orderable": false},
            {"data": "orden", "orderable": false},
            {"data": "estado", "orderable":false,"render": function (data) {
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
           
            {"data": "botones", "orderable": false, render: function (data) {
                    var salida;

                    salida = [
                        "",
                        "<button class=\"btn btn-primary btn-xs editarp\"><i class=\"glyphicon glyphicon-pencil\"></i></button> | ",
                        "<button class=\"btn btn-danger btn-xs eliminar\"><i class=\"glyphicon glyphicon-trash\"></i></button>",
                        "",
                    ].join('');

                    return salida;
                }
            }
//        {
////                            "className": 'details-control',
//            "orderable": false,
//            "data": "botones",
////                            "defaultContent": ""
//        },
//                        {"data": "botones", "orderable": false}
        ]
    });

    //EDITAR
    $('#table_anuncios tbody').on('click', '.editarp', function (e) {
        e.preventDefault();
        var table = self.tables['table_anuncios'];

        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            cerrar_prueba();
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
            $('.sels_select2').select2({dropdownParent: $("#modalCreateEdit"), width: '100%'});
//            $('.sels_select2').select2({ width: '100%' }); 
        }
    });

    function cerrar_prueba() {
        var table = self.tables['table_anuncios'];
        var abiertos = table.rows('tr.shown');
        var nodos = abiertos.nodes();

        nodos.each(function (tr, index) {
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                $(tr).removeClass('shown');
            }
        });
    }
    ;

    function format(d) {
        var plantilla = [
            '<div id="form_' + d.idcolumn + '" onsubmit="return false;">',
            '   <table class="table">',
            '   <tr>',
            '       <td><label style="width: 20%">Imagen</label>',
            '       <input type="text" id="cam_' + d.idcolumn + '" class="celda_editada" name="imagen" value="' + d.imagen + '" style="width: 80%">',
            '           <button type="button" onclick="Exeperu.popupManager(\'cam_' + d.idcolumn + '\',\'\',\'' + self.key + '\')"><span class="glyphicon glyphicon-picture"></span></button>',
            '       </td>',
            ' <td colspan="2"><label>Url</label><input type="text" class="celda_editada" name="url" value="' + d.url + '" style="width: 100%"></td>',
            
            '   </tr>',
            '  <tr>',
            '       <td><label>Dimensión</label><select name="iddimension" id="selpjm_' + d.idcolumn + '" class="celda_editada" style="width: 100%">',
            '           <option>Seleccione dimensión</option>' + self.getOptionsDimensiones(d.iddimension) + '</select></td>',
            ' <td><label>Orden</label><input type="text" class="celda_editada" name="orden" value="' + d.orden + '" style="width: 100%"></td>',
            ' <td><label>Estado</label><select name="estado" class="celda_editada" style="width: 100%"><option ' + (d.estado == 1 ? 'selected' : '') + ' value="1">Activo</option><option ' + (d.estado == 0 ? 'selected' : '') + ' value="0">Inactivo</option></select></td>',
            
            '  </tr>',
            '   </table>',
            '   <button class="btn btn-success btn-sm guardar" data-item="' + d.idcolumn + '"><i class="glyphicon glyphicon-floppy-disk"></i>Guardar</button>',
            '</div>'
        ].join(""); 
        return plantilla;
    }
    ;


    $('#table_anuncios').on('click', 'button.guardar', function () {
        var table = self.tables['table_anuncios'];
        var row = table.row('tr.shown');
        var tr = row.node();
        var iditem = $(this).attr('data-item');
//                    var row = tabla.row('#' + iditem);
        var $_row = $(row.node());
        var page = table.page();
        var raw_data = row.data();
//                        console.log(raw_data);
        var new_values = $('#form_' + iditem + ' .celda_editada').serializeArray();
//                        console.log(new_values);
        var new_data = {};

        $.each(new_values, function (index, value) {
            raw_data[value.name] = value.value;
        });

        //    console.log(raw_data);
        //    return false;

        delete raw_data.row_edit;
        $_row.removeClass('row_edit');

        row.data(raw_data).page(page).draw('page');


        if (row.child.isShown()) {


            // This row is already open - close it
            row.child.hide();
            $(tr).removeClass('shown');
        }

        return guardar_textareapresjm();
    });

    //ELIMINAR
    $('#table_anuncios tbody').on('click', '.eliminar', function () {
        var table = self.tables['table_anuncios'];
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }

        //continuar con el proceso de eliminacion

//                    var row = tabla.row('#' + iditem);
        var page = table.page();

        row.remove().page(page).draw('page');

        return guardar_textareapresjm();

    });

    function guardar_textareapresjm() {
        var table = self.tables['table_anuncios'];
        var texarea = $('#campo_14mich');
        var data = table.data().toArray();
        texarea.val(JSON.stringify(data));
    }
    ;

    Helpers.prototype.crear_anuncio = function (idblog) {
//                    if (!this.cancelar_presentacion())
//                        return false;

        var table = self.tables['table_anuncios'];
        var page = table.page();
        var total = table.data().length;
        var next = total + 1;
        //    var next = 0;

        var tr = table.row.add({
            "idblog": idblog,
            "imagen": "",
            "url": "",
            "iddimension": "",
            "orden": "0.00",
            "estado": "1",
            "idcolumn": "esp_" + next,
            //        "row_edit": true
        }).draw().page('last').draw('page').node();

        var row = table.row(tr);

        cerrar_prueba();
        // Open this row
        row.child(format(row.data())).show();
        $(tr).addClass('shown');
        $('.sels_select2').select2({dropdownParent: $("#modalCreateEdit"), width: '100%'});
//        $('.sels_select2').select2({ width: '100%' });
    };
};
