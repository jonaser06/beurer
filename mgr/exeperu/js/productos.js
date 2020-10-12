Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    //this.table_productos();
    //this.table_modelos();
    //this.table_caracteristicas();

    $("#prodjm").on("change", function () {
        self.filterss();
    });
};

/*Helpers.prototype.table_modelos = function () {

    this.loadDataTable('table_modelos', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
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
            {"data": "imagen", "render": function (data) {
                    var salida = '';

                    salida= '<img src="'+data+'" width="60px;" height="60px;">';
                            
                    return salida;
                }
            },
            {"data": "nom_producto"},
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
};*/
/*
Helpers.prototype.table_productos = function () {
    this.loadDataTable('table_productos', {
        "lengthMenu": [[10, 25, 50, 75, -1], [10, 25, 50, 75, "Todos"]],
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
            {"data": "titulo"},
            {"data": "imagen", "render": function (data) {
                    var salida = '';

                    salida= '<img src="'+data+'" width="60px;" height="60px;">';
                            
                    return salida;
                }
            },
            // {"data": "subutitulo"},
            // {"data": "nom_cat"},
            // {"data": "orden"},
            {"data": "id", 'render': function(data) {
                var salida = '';

                    salida= 'tabla'+data+'';
                            
                    return salida;
                }
            }
        ]
    });
};*/
/*
Helpers.prototype.table_caracteristicas = function () {
    this.loadDataTable('table_caracteristicas', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.urlcar,
           "data": function (d) {
               var data = {};
               $.each($('#form_exportable').serializeArray(), function (index, item) {
                   data[item['name']] = item['value'];
               });

               return $.extend({}, d, data);
           }
        },
        "columns": [
            {"data": "caracteristica"},
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
            {"data": "id"}
        ]
    });
};*/

Helpers.prototype.editProducto = function (idproducto) {
    this.sendAjax('manager/productos/edit', {"id": idproducto}, 'loadResponse');
};

Helpers.prototype.addProducto = function () {
    this.sendAjax('manager/productos/edit', {"idproducto": 0}, 'loadResponse');
};

Helpers.prototype.eliminarProducto = function (idproducto) {
    this.sendAjax('manager/productos/eliminar', {"idproducto": idproducto}, 'UpdateInfo');
};

/*
Helpers.prototype.editModelo = function (idmodelo) {
    this.sendAjax('manager/productos/editmod', {"id": idmodelo}, 'loadResponse');
};

Helpers.prototype.editModelojm = function (idmodelo) {
    this.sendAjax('manager/productos/editmod', {"id": idmodelo}, 'loadResponsejm');
};

Helpers.prototype.addModelo = function () {
    this.sendAjax('manager/productos/editmod', {"idmodelo": 0}, 'loadResponse');
};

Helpers.prototype.editCaracteristica = function (idcaracteristica) {
    this.sendAjax('manager/productos/editcar', {"id": idcaracteristica}, 'loadResponse');
};

Helpers.prototype.addCaracteristica = function () {
    this.sendAjax('manager/productos/editcar', {"idcaracteristica": 0}, 'loadResponse');
};

Helpers.prototype.editModelos = function (idproducto) {

   window.location.href="manager/productos/"+idproducto;
     
};

Helpers.prototype.editPrecios = function () {
    this.sendAjax('manager/productos/editprecios',location.href="manager/productos");
};

Helpers.prototype.editTipo = function (idtipo) {
    this.sendAjax('manager/productos/edittipo', {"id": idtipo}, 'loadResponse');
};

Helpers.prototype.addTipo = function () {
    this.sendAjax('manager/productos/edittipo', {"idtipo": 0}, 'loadResponse');
}

Helpers.prototype.tableModelosjm = function (idproductojm) {
    this.loadDataTable('table_modelosjm', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": "manager/productos/modelosjm/"+idproductojm,
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
};*/
//












Helpers.prototype.xxcrear_complemento = function (idproducto) {
    if (!this.cancelar_complemento())
        return false;

    var tabla = this.tables['table_complementos'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;
//    var next = 0;

    tabla.row.add({
        "idproducto": idproducto,
        "nombre": "",
        "orden": "0.00",
        "estado": "1",
        "idcolumn": "esp_" + next,
//        "row_edit": true
    }).draw().page('last').draw('page');

//    tabla.page('last').draw('page');

//    row.data(edit_data).page(page).draw('page');

    return this.editar_complemento("esp_" + next);
};







Helpers.prototype.xxxeditar_complemento = function (iditem) {
    var self = this;

    if (!this.cancelar_complemento())
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
            case 'idproducto':
                var valuex = value;
                break;
            case 'nombre':
                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                break;
            case 'orden':
                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                break;
            case 'estado':
                var valuex = '<select type="text" name="' + index + '"  class="celda_editada" style="width: 100%">';
                valuex += '<option value="0">Estado</option>';
                valuex += '<option ' + (value == 1 ? 'selected' : '') + ' value="1">Activo</option>';
                valuex += '<option ' + (value == 0 ? 'selected' : '') + ' value="0">Inactivo</option>';
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

Helpers.prototype.xxxguardar_complemento = function (iditem) {
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

    return this.guardar_textarea();
};

Helpers.prototype.xxxxeliminar_complemento = function (iditem) {
    var tabla = this.tables['table_complementos'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');

    return this.guardar_textarea();
};

Helpers.prototype.xxxguardar_textarea = function () {
    var tabla = this.tables['table_complementos'];
    var texarea = $('#campo_14');
    var data = tabla.data().toArray();


    texarea.val(JSON.stringify(data));
};

Helpers.prototype.getOptionsComplementos = function (valor) {
    var salida;

    for (var index in this.productos) {
        if (this.productos[index].idproducto === valor) {
            salida += '<option value="' + this.productos[index].idproducto + '" selected>' + this.productos[index].nombre + '</option>';
        } else {
            salida += '<option value="' + this.productos[index].idproducto + '">' + this.productos[index].nombre + '</option>';
        }
    }

    return salida;
};


Helpers.prototype.reloadTableModelos = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_modelos'].ajax.reload();
};

Helpers.prototype.reloadTableCaracteristicas = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_caracteristicas'].ajax.reload();
};

Helpers.prototype.reloadTableProductos = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_productos'].ajax.reload();
};

Helpers.prototype.refrescart = function (response) {
    return this.tables['table_tipos'].ajax.reload();
};

Helpers.prototype.refrescarmod = function (response) {
    return this.tables['table_modelos'].ajax.reload();
};

Helpers.prototype.refrescarcar = function (response) {
    return this.tables['table_caracteristicas'].ajax.reload();
};

Helpers.prototype.refrescarp = function (response) {
    return this.tables['table_productos'].ajax.reload();
};

Helpers.prototype.filterss = function () {
    this.tables['table_modelos'].ajax.reload();
};

Helpers.prototype.delModelo = function (idmodelo) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/productos/deletemodelo', {"id": idmodelo}, 'refrescarmod');
    }
};

Helpers.prototype.delCaracteristica = function (idcaracteristica) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/productos/deletecaracteristica', {"id": idcaracteristica}, 'refrescarcar');
    }
};

Helpers.prototype.delProducto = function (idproducto) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/productos/delete', {"id": idproducto}, 'refrescarp');
    }
};

//JM JM JM JM JM JM JM JM JM JM JM

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







// PRODUCTOS RELACIONEDOS 
Helpers.prototype.tableComplementosRelacionados = function () {

    var self = this;
    var campo_14 = $('#prod_relacionados');
    var data = JSON.parse(campo_14.val());
    //console.log("hola");
    console.log(data);

    this.loadDataTable('table_complementos_relacionados', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            //{"data": "idcolumn"},         
            {"data": "imagenes"},
            {"data": "idcolumn", render: function (data, type, row, meta) {
                //console.log(data)
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_complementocar_relacionados('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_complementocar_relacionados('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
                            "<a href=\"javascript: Exeperu.eliminar_complementocar_relacionados('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.crear_complemento_relacionados = function (idmodelo) {
    if (!this.cancelar_complementocar_relacionados())
        return false;

    var tabla = this.tables['table_complementos_relacionados'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;

    tabla.row.add({
        "imagenes": '',
        "idcolumn": "comp_" + next,
        "row_edit": true
    }).draw().page('last').draw('page');

    return this.editar_complementocar_relacionados("comp_" + next);
};

Helpers.prototype.editar_complementocar_relacionados = function (iditem) {
    var self = this;

    if (!this.cancelar_complementocar_relacionados())
        return false;

    var tabla = this.tables['table_complementos_relacionados'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    var raw_data = this.raw_data_current = row.data();
    var edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
           //case 'idmodelo':
                var valuex = value;
                break;
            case 'imagenes':

                var valuex = '<select name="'+index+'" id="option_prod_'+iditem+'"  class="celda_editada" style="width: 80%">';
                valuex += '</select>';

                
                $.ajax({
                    url:'categoria/123',
                    success:function(response){
                        $.each(response.data, function(i,item){
                            //console.log(item.titulo);
                            if(item.titulo == value){
                               var sel="selected";
                            }else{
                                var sel="";
                            }
                        
                           var html='<option '+sel+' value="'+item.titulo+'">'+item.titulo+'</option>'; 
                           $("#option_prod_"+iditem).append(html);
                           
                        });
                    }
                 });

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
};

Helpers.prototype.guardar_complementocar_relacionados = function (iditem) {
    var tabla = this.tables['table_complementos_relacionados'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page();
    var raw_data = row.data();
    var new_values = $('#' + iditem + ' .celda_editada').serializeArray();
    var new_data = {};

    $.each(new_values, function (index, value) {
        raw_data[value.name] = value.value;
    });
    delete raw_data.row_edit;
    $_row.removeClass('row_edit');

    row.data(raw_data).page(page).draw('page');

    return this.guardar_textareacar_relacionados();
};

Helpers.prototype.eliminar_complementocar_relacionados = function (iditem) {
    var tabla = this.tables['table_complementos_relacionados'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');
    
    return this.guardar_textareacar_relacionados();
};

Helpers.prototype.guardar_textareacar_relacionados = function () {
    var tabla = this.tables['table_complementos_relacionados'];
    var texarea = $('#prod_relacionados');
    var data = tabla.data().toArray();
    console.log(data);
    texarea.val(JSON.stringify(data));
};

Helpers.prototype.cancelar_complementocar_relacionados = function () {
    var tabla = this.tables['table_complementos_relacionados'];
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




// DATA TABLE  IMAGENES
Helpers.prototype.tableComplementosImagenes = function () {

    var self = this;
    var campo_14 = $('#img_prod');
    var data = JSON.parse(campo_14.val());
    //console.log("hola");
    console.log(data);

    this.loadDataTable('table_complementos_imagenes', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "imagenes"},
            //{"data": "idcolumn"}         
            {"data": "idcolumn", render: function (data, type, row, meta) {
                //console.log(data)
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_complementocar_imagenes('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_complementocar_imagenes('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
                            "<a href=\"javascript: Exeperu.eliminar_complementocar_imagenes('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.crear_complemento_imagenes = function (idmodelo) {
    if (!this.cancelar_complementocar_imagenes())
        return false;

    var tabla = this.tables['table_complementos_imagenes'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;

    tabla.row.add({
        "imagenes": '',
        "idcolumn": "comp_" + next,
        "row_edit": true
    }).draw().page('last').draw('page');

    return this.editar_complementocar_imagenes("comp_" + next);
};


Helpers.prototype.editar_complementocar_imagenes = function (iditem) {
    var self = this;

    if (!this.cancelar_complementocar_imagenes())
        return false;

    var tabla = this.tables['table_complementos_imagenes'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    var raw_data = this.raw_data_current = row.data();
    var edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
           //case 'idmodelo':
                var valuex = value;
                break;
            case 'imagenes':
                var valuex = '<input type="text" name="' + index + '" id="cam_img_'+ iditem +'" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 80%">';
                valuex += '<button type="button" onclick="Exeperu.popupManager(\'cam_img_' + iditem + '\',\'\',\'' + self.key + '\')"><span class="glyphicon glyphicon-picture"></span></button>';
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
};

Helpers.prototype.guardar_complementocar_imagenes = function (iditem) {
    var tabla = this.tables['table_complementos_imagenes'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page();
    var raw_data = row.data();
    var new_values = $('#' + iditem + ' .celda_editada').serializeArray();
    var new_data = {};

    $.each(new_values, function (index, value) {
        raw_data[value.name] = value.value;
    });
    delete raw_data.row_edit;
    $_row.removeClass('row_edit');

    row.data(raw_data).page(page).draw('page');

    return this.guardar_textareacar_imagenes();
};

Helpers.prototype.eliminar_complementocar_imagenes = function (iditem) {
    var tabla = this.tables['table_complementos_imagenes'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');

    

    $.ajax({
        url: 'productos/eliminarimagen',
        type: 'POST',
        data: {imagen_id: iditem},
    })
    .done(function() {
        console.log("success");
    })

    
    return this.guardar_textareacar_imagenes();
};

Helpers.prototype.guardar_textareacar_imagenes = function () {
    var tabla = this.tables['table_complementos_imagenes'];
    var texarea = $('#img_prod');
    var data = tabla.data().toArray();
    console.log(data);
    texarea.val(JSON.stringify(data));
};

Helpers.prototype.cancelar_complementocar_imagenes = function () {
    var tabla = this.tables['table_complementos_imagenes'];
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
// DATAT TABLE DESCRIPCION

Helpers.prototype.tableComplementos = function () {

    var self = this;
    var campo_14 = $('#desc_prod');
    var data = JSON.parse(campo_14.val());
    //console.log("hola");
    //console.log(data);

    this.loadDataTable('table_complementos', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "descripcion"},
            //{"data": "idcolumn"}         
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


Helpers.prototype.crear_complemento = function (idmodelo) {
    if (!this.cancelar_complementocar())
        return false;

    var tabla = this.tables['table_complementos'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;

    tabla.row.add({
        "descripcion": '',
        "idcolumn": "comp_" + next,
        "row_edit": true
    }).draw().page('last').draw('page');

    return this.editar_complementocar("comp_" + next);
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
           //case 'idmodelo':
                var valuex = value;
                break;
            case 'descripcion':
                //var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
                var valuex = '<textarea class="form-control richtext" name="' + index + '" rows="3" style="width: 80%">' + (!value ? '' : value) + '</textarea>';
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
    var texarea = $('#desc_prod');
    var data = tabla.data().toArray();
    texarea.val(JSON.stringify(data));
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

// DATA TABLE FICHA TECNIA
Helpers.prototype.tableComplementosft = function () {

    var self = this;
    var campo_14 = $('#ft_prod');
    var data = JSON.parse(campo_14.val());
    this.loadDataTable('table_complementos_ft', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "denominacion"},
            {"data": "sensor"},         
            {"data": "idcolumn", render: function (data, type, row, meta) {
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_complementocarft('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_complementocarft('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
                            "<a href=\"javascript: Exeperu.eliminar_complementocarft('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.crear_complemento_ft = function (idmodelo) {
    if (!this.cancelar_complementocar_ft())
        return false;

    var tabla = this.tables['table_complementos_ft'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;
    tabla.row.add({
        "denominacion": '',
        "sensor": "",
        "idcolumn": "comp_" + next,
        "row_edit": true
    }).draw().page('last').draw('page');

    return this.editar_complementocarft("comp_" + next);
};

Helpers.prototype.editar_complementocarft = function (iditem) {
    var self = this;

    if (!this.cancelar_complementocar_ft())
        return false;

    var tabla = this.tables['table_complementos_ft'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    var raw_data = this.raw_data_current = row.data();
    var edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
           //case 'idmodelo':
                var valuex = value;
                break;

            case 'denominacion':
                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
                break;
            case 'sensor':
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
};

Helpers.prototype.guardar_complementocarft = function (iditem) {
    var tabla = this.tables['table_complementos_ft'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page();
    var raw_data = row.data();
    var new_values = $('#' + iditem + ' .celda_editada').serializeArray();
    var new_data = {};

    $.each(new_values, function (index, value) {
        raw_data[value.name] = value.value;
    });

    delete raw_data.row_edit;
    $_row.removeClass('row_edit');

    row.data(raw_data).page(page).draw('page');

    return this.guardar_textareacar_ft();
};

Helpers.prototype.eliminar_complementocarft = function (iditem) {
    var tabla = this.tables['table_complementos_ft'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');

    return this.guardar_textareacar_ft();
};

Helpers.prototype.guardar_textareacar_ft = function () {
    var tabla = this.tables['table_complementos_ft'];
    var texarea = $('#ft_prod');
    var data = tabla.data().toArray();
    texarea.val(JSON.stringify(data));
};

Helpers.prototype.cancelar_complementocar_ft = function () {
    var tabla = this.tables['table_complementos_ft'];
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

// DATA TABLE  MARCAS

Helpers.prototype.tableComplementosMarcas = function () {

    var self = this;
    var campo_14 = $('#marcas_prod');
    var data = JSON.parse(campo_14.val());

    this.loadDataTable('table_complementos_marcas', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "imagen_marcas"},
            {"data": "enlace"},         
            {"data": "idcolumn", render: function (data, type, row, meta) {
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_complementocar_marcas('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_complemento_marcas('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
                            "<a href=\"javascript: Exeperu.eliminar_complemento_marcas('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.crear_complemento_marca = function (idproducto) {
    if (!this.cancelar_complemento_marcas())
        return false;

    var tabla = this.tables['table_complementos_marcas'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;

    tabla.row.add({
        "imagen_marcas": "",
        "enlace": "",
        "idcolumn": "marca_" + next,
        "row_edit": true
    }).draw().page('last').draw('page');


    return this.editar_complemento_marcas("marca_" + next);
};

Helpers.prototype.editar_complemento_marcas = function (iditem) {
    var self = this;

    if (!this.cancelar_complemento_marcas())
        return false;

    var tabla = this.tables['table_complementos_marcas'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    var raw_data = this.raw_data_current = row.data();
    var edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
                var valuex = value;
                break;
            case 'imagen_marcas':
                var valuex = '<input type="text" name="' + index + '" id="cam_'+ iditem +'" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 80%">';
                valuex += '<button type="button" onclick="Exeperu.popupManager(\'cam_' + iditem + '\',\'\',\'' + self.key + '\')"><span class="glyphicon glyphicon-picture"></span></button>';
                break;
            case 'enlace':
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
};

Helpers.prototype.guardar_complementocar_marcas = function (iditem) {
    var tabla = this.tables['table_complementos_marcas'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page();
    var raw_data = row.data();
    var new_values = $('#' + iditem + ' .celda_editada').serializeArray();
    var new_data = {};

    $.each(new_values, function (index, value) {
        raw_data[value.name] = value.value;
    });
    delete raw_data.row_edit;
    $_row.removeClass('row_edit');

    row.data(raw_data).page(page).draw('page');

    return this.guardar_textareacar_marcas();
};

Helpers.prototype.cancelar_complemento_marcas = function () {
    var tabla = this.tables['table_complementos_marcas'];
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

Helpers.prototype.eliminar_complemento_marcas = function (iditem) {
    var tabla = this.tables['table_complementos_marcas'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');

    return this.guardar_textareacar_marcas();
};

Helpers.prototype.guardar_textareacar_marcas = function () {
    var tabla = this.tables['table_complementos_marcas'];
    var texarea = $('#marcas_prod');
    var data = tabla.data().toArray();
    console.log(data);
    texarea.val(JSON.stringify(data));
};


// DATA TABLE  ACCESORIOS
Helpers.prototype.tableComplementosAccesorios = function () {

    var self = this;
    var campo_14 = $('#accesorio_prod');
    var data = JSON.parse(campo_14.val());

    this.loadDataTable('table_complementos_accesorio', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "nombre"},
            {"data": "imagen"} ,        
            {"data": "idcolumn", render: function (data, type, row, meta) {
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_complementocar_accesorio('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_complementocar_accesorio('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
                            "<a href=\"javascript: Exeperu.eliminar_complementocar_accesorio('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.crear_complemento_accesorio = function (idmodelo) {
    if (!this.cancelar_complementocar_accesorio())
        return false;

    var tabla = this.tables['table_complementos_accesorio'];
    var page = tabla.page();
    var total = tabla.data().length;
    var next = total + 1;

    tabla.row.add({
        "nombre": '',
        "imagen": '',
        "idcolumn": "acceso_" + next,
        "row_edit": true
    }).draw().page('last').draw('page');
    return this.editar_complementocar_accesorio("acceso_" + next);
};


Helpers.prototype.editar_complementocar_accesorio = function (iditem) {
    var self = this;

    if (!this.cancelar_complementocar_accesorio())
        return false;

    var tabla = this.tables['table_complementos_accesorio'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    var raw_data = this.raw_data_current = row.data();
    var edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
           //case 'idmodelo':
                var valuex = value;
                break;
            case 'nombre':
                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
                break;
            case 'imagen':
                var valuex = '<input type="text" name="' + index + '" id="accesorio_img_'+ iditem +'" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 80%">';
                valuex += '<button type="button" onclick="Exeperu.popupManager(\'accesorio_img_' + iditem + '\',\'\',\'' + self.key + '\')"><span class="glyphicon glyphicon-picture"></span></button>';
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
};

Helpers.prototype.guardar_complementocar_accesorio = function (iditem) {
    var tabla = this.tables['table_complementos_accesorio'];
    var row = tabla.row('#' + iditem);
    var $_row = $(row.node());
    var page = tabla.page();
    var raw_data = row.data();
    var new_values = $('#' + iditem + ' .celda_editada').serializeArray();
    var new_data = {};

    $.each(new_values, function (index, value) {
        raw_data[value.name] = value.value;
    });
    delete raw_data.row_edit;
    $_row.removeClass('row_edit');

    row.data(raw_data).page(page).draw('page');

    return this.guardar_textareacar_accesorio();
};

Helpers.prototype.eliminar_complementocar_accesorio = function (iditem) {
    var tabla = this.tables['table_complementos_accesorio'];
    var row = tabla.row('#' + iditem);
    var page = tabla.page();

    row.remove().page(page).draw('page');

    return this.guardar_textareacar_accesorio();
};

Helpers.prototype.guardar_textareacar_accesorio = function () {
    let tabla = this.tables['table_complementos_accesorio'];
    let texarea = $('#accesorio_prod');
    let data = tabla.data().toArray();
    console.log(data);
    texarea.val(JSON.stringify(data));
};

Helpers.prototype.cancelar_complementocar_accesorio = function () {
    let tabla = this.tables['table_complementos_accesorio'];
    let row = tabla.row('.row_edit');
    let page = tabla.page();

    if (row.node()) {
        let $_row = $(row.node());
        delete this.raw_data_current.row_edit;
        $_row.removeClass('row_edit');
        row.data(this.raw_data_current).page(page).draw('page');
        this.raw_data_current = {};
    }
    return true;
};



// COLORES 

Helpers.prototype.tableComplementosColors = function () {
    let self = this;
    let campo_14 = $('#color_prod');
    let data = JSON.parse(campo_14.val());

    this.loadDataTable('table_complementos_color', {
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        "pagingType": "full_numbers",
        "rowId": "idcolumn",
        "data": data,
        "columns": [
            {"data": "codigo"},
            {"data": "foto"} ,  
            {"data": "color"} ,  
            {"data": "estado"} ,  
            {"data": "idcolumn", render: function (data, type, row, meta) {
                    var salida;

                    if (row.row_edit) {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.guardar_complementocar_color('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                            "</center>",
                        ].join('');
                    } else {
                        salida = [
                            "<center>",
                            "<a href=\"javascript: Exeperu.editar_complementocar_color('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>&nbsp;&nbsp;",
                            "<a href=\"javascript: Exeperu.eliminar_complementocar_color('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                            "</center>",
                        ].join('');
                    }

                    return salida;
                }
            }
        ]
    });
};

Helpers.prototype.crear_complemento_color = function (idmodelo) {
    if (!this.cancelar_complementocar_color())
        return false;

    let tabla = this.tables['table_complementos_color'];
    let page = tabla.page();
    let total = tabla.data().length;
    var next = total + 1;

    tabla.row.add({
        "codigo": '',
        "foto": '',
        "color": '',
        "estado": '',
        "idcolumn": "color_" + next,
        "row_edit": true
    }).draw().page('last').draw('page');
    return this.editar_complementocar_color("color_" + next);
};


Helpers.prototype.editar_complementocar_color = function (iditem) {
    let self = this;

    if (!this.cancelar_complementocar_color())
        return false;

    let tabla = this.tables['table_complementos_color'];
    let row = tabla.row('#' + iditem);
    let $_row = $(row.node());
    let page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
    let raw_data = this.raw_data_current = row.data();
    let edit_data = {};

    $.each(raw_data, function (index, value) {
        switch (index) {
            case 'idcolumn':
           //case 'idmodelo':
                var valuex = value;
                break;
            case 'codigo':
                var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
                break;
            case 'estado':
                var valuex = '<select name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%"><option value="activo">activo</option><option value="inactivo">inactivo</option></select>';
                break;
            case 'foto':
                var valuex = '<input type="text" name="' + index + '" id="color_img_'+ iditem +'" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 80%">';
                valuex += '<button type="button" onclick="Exeperu.popupManager(\'color_img_' + iditem + '\',\'\',\'' + self.key + '\')"><span class="glyphicon glyphicon-picture"></span></button>';
                break;
            case 'color':
                    var valuex = '<input type="color" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="cursor:pointer;width:30px;height:30px;border:0;padding:0;border-radius;outline:none">';
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
};


Helpers.prototype.guardar_complementocar_color = function (iditem) {
    let tabla = this.tables['table_complementos_color'];
    let row = tabla.row('#' + iditem);
    let $_row = $(row.node());
    let page = tabla.page();
    let raw_data = row.data();
    let new_values = $('#' + iditem + ' .celda_editada').serializeArray();
    let new_data = {};

    $.each(new_values, function (index, value) {
        raw_data[value.name] = value.value;
    });
    delete raw_data.row_edit;
    $_row.removeClass('row_edit');

    row.data(raw_data).page(page).draw('page');

    return this.guardar_textareacar_color();
};

Helpers.prototype.eliminar_complementocar_color = function (iditem) {
    let tabla = this.tables['table_complementos_color'];
    let row = tabla.row('#' + iditem);
    let page = tabla.page();

    row.remove().page(page).draw('page');

    return this.guardar_textareacar_color();
};

Helpers.prototype.guardar_textareacar_color = function () {
    let tabla = this.tables['table_complementos_color'];
    let texarea = $('#color_prod');
    let data = tabla.data().toArray();
    texarea.val(JSON.stringify(data));
};


Helpers.prototype.cancelar_complementocar_color = function () {
    let tabla = this.tables['table_complementos_color'];
    let row = tabla.row('.row_edit');
    let page = tabla.page();

    if (row.node()) {
        let $_row = $(row.node());
        delete this.raw_data_current.row_edit;
        $_row.removeClass('row_edit');
        row.data(this.raw_data_current).page(page).draw('page');
        this.raw_data_current = {};
    }
    return true;
};