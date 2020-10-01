Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_autores();
};

Helpers.prototype.table_autores = function () {
    this.loadDataTable('table_autores', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
        },
        "columns": [
            {"data": "nombres"},
            {"data": "apellidos"},
//            {"data": "foto"},
            {"data": "foto", "render": function (data) {
                    var salida = '';
                    
                    if(data==null || data==''){
                        salida= '<img src="assets/images/libros/default.png" width="60px;" height="60px;">';
                    }else{
                        salida= '<img src="'+data+'" width="60px;" height="60px;">';
                    }
                            
                    return salida;
                
                }
            },
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

Helpers.prototype.delAutor = function (idautor) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/autores/delete', {"id": idautor}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function (response) {
    var jm=JSON.parse(response);
                    
    if(jm.tipo==1){
        toastr.success(jm.mensaje,{timeOut:2000});
        this.tables['table_autores'].ajax.reload();
    }else{
        toastr.error(jm.mensaje,{timeOut:2000});
    }
};

Helpers.prototype.editAutor = function (idautor) {
    this.sendAjax('manager/autores/edit', {"id": idautor}, 'loadResponse');
};

Helpers.prototype.addAutor = function () {
    this.sendAjax('manager/autores/edit', {"idautor": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableAutores = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_autores'].ajax.reload();
};

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

    Helpers.prototype.crear_anuncio = function (idautor) {
//                    if (!this.cancelar_presentacion())
//                        return false;

        var table = self.tables['table_anuncios'];
        var page = table.page();
        var total = table.data().length;
        var next = total + 1;
        //    var next = 0;

        var tr = table.row.add({
            "idautor": idautor,
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


