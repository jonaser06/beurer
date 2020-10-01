<?php
$datosx = json_decode($variable['entrada'], TRUE);
//print_r(json_encode($datosx['data']));
?>
    <div class="form-group">
        <label for="<?= $variable['nombre'] ?>">
            <?= $variable['label']; ?>
        </label>
        <textarea class="form-control" name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" rows="3" style="display: none;"><?= isset($variable['valor']) ? $variable['valor'] : '[]'; ?></textarea>
        <div id="dataTable-panel-<?= $variable['idcontenido'] ?>">
            <?php
            if ((bool) $datosx['botones']['crear']) {
                echo '<a href="javascript: void(0);" class="btn btn-xs btn-info btn-flat btn-crear-js"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>';
            }
            ?>
            <table id="dataTable-<?= $variable['idcontenido'] ?>" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <?php
                        $columns = array();
                        foreach ($datosx['columns'] as $key => $datox) {
                            $columns[] = $datox;

                            echo '<th>' . $datox['label'] . '</th>';
                        }
                        ?>
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
<hr>
<script>
    $(document).ready(function () {
        var textarea = $('#<?= $variable['nombre'] ?>');
        var data_orig = JSON.parse(textarea.val());
        var data = JSON.parse(textarea.val());
        
        $.each(data, function (key, value) {
            if(value.item_libro){
                value.item_librojm="JM";
//                $.ajax({
//                    url:"manager/libros/libronom",
//                    type:"post",
//                    data:{'idlibro':value.item_libro},
//                    success:function(response){
//                        value.item_librojm="JM";
//                    }
//                });
            }else{
                value.item_librojm="jmjm";
            }
            value.botones = [
                '<center>',
<?php
if ((bool) $datosx['botones']['editar']) {
    echo '\'<a href="javascript: void(0);" class="btn btn-primary btn-xs btn-flat btn-editar-js" data-id="\' + value.idcolumn + \'"><i class="fa fa-pencil"></i></a>\',';
}
if ((bool) $datosx['botones']['editar'] && (bool) $datosx['botones']['eliminar']) {
    echo '\'&nbsp;&nbsp; | &nbsp;&nbsp;\',';
}
if ((bool) $datosx['botones']['eliminar']) {
    echo '\'<a href="javascript: void(0);" class="btn btn-danger btn-xs btn-flat btn-eliminar-js" data-id="\' + value.idcolumn + \'"><i class="fa fa-trash-o"></i></a>\',';
}
?>
                '</center>'
            ].join('');
        });
        Exeperu.loadDataTable('dataTable-<?= $variable['idcontenido'] ?>', {
            "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "Todos"]],
            "pagingType": "numbers",
//            "renderer": "bootstrap",
            "data": data,
            "columns": <?= json_encode($columns); ?>
        });

        /*
         * CREAR
         */
        $('#dataTable-panel-<?= $variable['idcontenido'] ?>').on('click', '.btn-crear-js', function () {
            var row_data = {};

            row_data.columnas = '<?= json_encode($datosx['data']); ?>';
            row_data.idvariable = <?= $variable['idcontenido'] ?>;

            Exeperu.sendAjax('manager/action/popupinputdata', row_data, 'loadResponse');
        });

        function crear(idcolumn, form_values) {
            form_values.idcolumn = idcolumn;

            var new_data = Exeperu.applyIf({
            idcolumn: idcolumn,
                    botones: [
                            '<center>',
<?php
if ((bool) $datosx['botones']['editar']) {
    echo '\'<a href="javascript: void(0);" class="btn btn-primary btn-xs btn-flat btn-editar-js" data-id="\' + idcolumn + \'"><i class="fa fa-pencil"></i></a>\',';
}
if ((bool) $datosx['botones']['editar'] && (bool) $datosx['botones']['eliminar']) {
    echo '\'&nbsp;&nbsp; | &nbsp;&nbsp;\',';
}
if ((bool) $datosx['botones']['eliminar']) {
    echo '\'<a href="javascript: void(0);" class="btn btn-danger btn-xs btn-flat btn-eliminar-js" data-id="\' + idcolumn + \'"><i class="fa fa-trash-o"></i></a>\',';
}
?>
                    '</center>'
                    ].join('')
            }
            , form_values);

            Exeperu.tables['dataTable-<?= $variable['idcontenido'] ?>'].row.add(new_data).draw();

            data_orig.push(form_values);

            return saveTextarea();
        }

        /*
         * EDITAR
         */
        $('#dataTable-panel-<?= $variable['idcontenido'] ?>').on('click', '.btn-editar-js', function () {
        var row = $(this);
                var row_data = Exeperu.tables['dataTable-<?= $variable['idcontenido'] ?>'].row(row.parents('tr')).data();
                row_data.columnas = '<?= json_encode($datosx['data']); ?>';
                row_data.idvariable = <?= $variable['idcontenido'] ?>;
                Exeperu.sendAjax('manager/action/popupinputdata', row_data, 'loadResponse');
        });
                function editar(idcolumn, form_values) {
                var new_data = Exeperu.applyIf({}, form_values);
                        var eq = data_orig.findIndex(function (obj) {
                        return obj.idcolumn == idcolumn;
                        });
                        var row_data = Exeperu.tables['dataTable-<?= $variable['idcontenido'] ?>'].row(eq).data();
                        row_data = Exeperu.applyIf(new_data, row_data);
                        Exeperu.tables['dataTable-<?= $variable['idcontenido'] ?>'].row(eq).data(row_data);
                        data_orig[eq] = form_values;
                        return saveTextarea();
                }

        /*
         * 
         */
        $('body').on('submit', '#popcreateeditform-inputdata-<?= $variable['idcontenido']; ?>', function (ev) {
            var form = $(this);
            var form_values = Exeperu.convertSerializeArray(form.serializeArray());

            var idcolumn = parseInt(form_values.idcolumn);

            if (typeof (idcolumn) === 'number' && !isNaN(idcolumn)) {
                editar(idcolumn, form_values);
            } else {
                idcolumn = getID();
                crear(idcolumn, form_values);
            }
        });

        function getID() {
            var last = 0;

            $.each(data_orig, function (index, row_data) {
                var id = parseInt(row_data.idcolumn);

                if (id > last) {
                    last = id;
                }
            });

            return last + 1;
        }
        function saveTextarea() {
            data_orig.sort(function(a,b){
                return parseFloat(a.orden) - parseFloat(b.orden);
            });  

            data = JSON.stringify(data_orig).replace(/null,/g, "");

            textarea.val(data);
 
            setTimeout(function () {
                $('#modalCreateEdit').modal('toggle');
            }, 500);
        }

        /*
         * ELIMINAR
         */
        $('#dataTable-panel-<?= $variable['idcontenido'] ?>').on('click', '.btn-eliminar-js', function () {
            var row = $(this);
            var idcolumn = row.data('id');
            data_orig = data_orig.filter(function (obj) {
                if ('idcolumn' in obj && typeof (parseInt(obj.idcolumn)) === 'number' && !isNaN(obj.idcolumn)) {
                    return obj.idcolumn != idcolumn;
                } else {
                    alert('Debe indicar la propiedad "idcolumn"');
                }
            });
            Exeperu.tables['dataTable-<?= $variable['idcontenido'] ?>'].row(row.parents('tr')).remove().draw();
            textarea.val(JSON.stringify(data_orig));
        });
        
        Helpers.prototype.cancelar_pdf = function () {
        var tabla = this.tables['table_pdfjm'];
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

    Helpers.prototype.crear_pdf = function (idmatricula) {
        if (!this.cancelar_pdf())
            return false;

        var tabla = this.tables['table_pdfjm'];
        var page = tabla.page();
        var total = tabla.data().length;
        var next = total + 1;
    //    var next = 0;

        tabla.row.add({
            "nombre": "",
            "pdf": "",
            "imagen": "",
            "idcolumn": "pdf_" + next,
    //        "row_edit": true
        }).draw().page('last').draw('page');

        return this.editar_pdf("pdf_" + next);
    };

    Helpers.prototype.tablePdfs = function () {
        var self = this;
        var camp14 = $('#cam14');
        var data = JSON.parse(camp14.val());

        this.loadDataTable('table_pdfjm', {
            "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
            "pagingType": "full_numbers",
            "rowId": "idcolumn",
            "data": data,
            "columns": [
                {"data": "nombre"},
                {"data": "pdf"},
                {"data": "imagen"},
                {"data": "idcolumn", render: function (data, type, row, meta) {
                        var salida;

                        if (row.row_edit) {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.guardar_pdf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                                "</center>",
                            ].join('');
                        } else {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.editar_pdf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
                                " | <a href=\"javascript: Exeperu.eliminar_pdf('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                                "</center>",
                            ].join('');
                        }

                        return salida;
                    }
                }
            ]
        });
    };

    Helpers.prototype.editar_pdf = function (iditem) {
        var self = this;

        if (!this.cancelar_pdf())
            return false;

        var tabla = this.tables['table_pdfjm'];
        var row = tabla.row('#' + iditem);
        var $_row = $(row.node());
        var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
        var raw_data = this.raw_data_current = row.data();
        var edit_data = {};

        $.each(raw_data, function (index, value) {
            switch (index) {
                case 'idcolumn':
                case 'idmatricula':
                    var valuex = value;
                break;
                case 'nombre':
                    var valuex = '<input type="text" style="width:400px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'pdf':
                    var valuex = '<input type="text" style="width:200px;" id="campo_' + raw_data.idcolumn + '" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
                    valuex += '<button type="button" onclick="Exeperu.popupManager(\'campo_' + raw_data.idcolumn + '\',\'\',\'' + self.key + '\',2)"><span class="glyphicon glyphicon-file"></span></button>';
                    break;
               case 'imagen':
                   var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';

                   valuex += '<button type="button" onclick="Exeperu.popupManager(\'campo_' + raw_data.idcolumn + '\',\'\',\'' + self.key + '\',2)"><span class="glyphicon glyphicon-picture"></span></button>';
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

    Helpers.prototype.guardar_pdf = function (iditem) {
        var tabla = this.tables['table_pdfjm'];
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

        return this.guardar_textareapdf();
    };

    Helpers.prototype.guardar_textareapdf = function () {
        var tabla = this.tables['table_pdfjm'];
        var texarea = $('#cam14');
        var data = tabla.data().toArray();

        texarea.val(JSON.stringify(data));
    };

    Helpers.prototype.eliminar_pdf = function (iditem) {
        var tabla = this.tables['table_pdfjm'];
        var row = tabla.row('#' + iditem);
        var page = tabla.page();

        row.remove().page(page).draw('page');

        return this.guardar_textareapdf();
    };
    
    //JM JM JM JM JM
    
     Helpers.prototype.cancelar_enlace = function () {
        var tabla = this.tables['table_enlace'];
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

    Helpers.prototype.crear_enlace = function () {
        if (!this.cancelar_enlace())
            return false;

        var tabla = this.tables['table_enlace'];
        var page = tabla.page();
        var total = tabla.data().length;
        var next = total + 1;
    //    var next = 0;

        tabla.row.add({
            "titulo": "",
            "titulolink": "",
            "enlace": "",
            "idcolumn": "en_" + next,
    //        "row_edit": true
        }).draw().page('last').draw('page');

        return this.editar_enlace("en_" + next);
    };

    Helpers.prototype.tableEnlaces = function () {
        var self = this;
        var camp14 = $('#cam1414');
        var data = JSON.parse(camp14.val());

        this.loadDataTable('table_enlace', {
            "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
            "pagingType": "full_numbers",
            "rowId": "idcolumn",
            "data": data,
            "columns": [
                {"data": "titulo"},
                {"data": "titulolink"},
                {"data": "enlace"},
                {"data": "idcolumn", render: function (data, type, row, meta) {
                        var salida;

                        if (row.row_edit) {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.guardar_enlace('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                                "</center>",
                            ].join('');
                        } else {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.editar_enlace('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
                                " | <a href=\"javascript: Exeperu.eliminar_enlace('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                                "</center>",
                            ].join('');
                        }

                        return salida;
                    }
                }
            ]
        });
    };

    Helpers.prototype.editar_enlace = function (iditem) {
        var self = this;

        if (!this.cancelar_enlace())
            return false;

        var tabla = this.tables['table_enlace'];
        var row = tabla.row('#' + iditem);
        var $_row = $(row.node());
        var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
        var raw_data = this.raw_data_current = row.data();
        var edit_data = {};

        $.each(raw_data, function (index, value) {
            switch (index) {
                case 'idcolumn':
                case 'idmatricula':
                    var valuex = value;
                break;
                case 'titulo':
                    var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'titulolink':
                    var valuex = '<input type="text"  name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'enlace':
                    var valuex = '<input type="text" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
    //            case 'pdf':
    //                var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
    //                break;
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

    Helpers.prototype.guardar_enlace = function (iditem) {
        var tabla = this.tables['table_enlace'];
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

        return this.guardar_textareaenlace();
    };

    Helpers.prototype.guardar_textareaenlace = function () {
        var tabla = this.tables['table_enlace'];
        var texarea = $('#cam1414');
        var data = tabla.data().toArray();

        texarea.val(JSON.stringify(data));
    };

    Helpers.prototype.eliminar_enlace = function (iditem) {
        var tabla = this.tables['table_enlace'];
        var row = tabla.row('#' + iditem);
        var page = tabla.page();

        row.remove().page(page).draw('page');

        return this.guardar_textareaenlace();
    };
    
     //JM JM JM JM JM JM JM JM JM
    
    Helpers.prototype.cancelar_oficina = function () {
        var tabla = this.tables['table_oficina'];
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

    Helpers.prototype.crear_oficina = function (idmatricula) {
        if (!this.cancelar_oficina())
            return false;

        var tabla = this.tables['table_oficina'];
        var page = tabla.page();
        var total = tabla.data().length;
        var next = total + 1;
    //    var next = 0;

        tabla.row.add({
            "direccion": "",
            "latitud": "",
            "longitud": "",
            "mapa": "0",
            "idcolumn": "ofi_" + next,
    //        "row_edit": true
        }).draw().page('last').draw('page');

        return this.editar_oficina("ofi_" + next);
    };

    Helpers.prototype.tableOficinas = function () {
        var self = this;
        var camp14 = $('#c14jm');
        var data = JSON.parse(camp14.val());

        this.loadDataTable('table_oficina', {
            "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
            "pagingType": "full_numbers",
            "rowId": "idcolumn",
            "data": data,
            "columns": [
                {"data": "direccion"},
                {"data": "latitud"},
                {"data": "longitud"},
                {"data": "mapa", "render": function (data) {
                        var myRe = /^<input type/g;
                        var resultado = myRe.exec(data);
                        if (resultado !== null && resultado.length > 0) {
                            return data;
                        }
                         var salida = '';

                            switch (data) {
                                case '1':
                                    salida = 'Si.';
                                    break;
                                default:
                                    salida= 'No.';
                                    break;
                            }
                            
                        return salida;    
                    }
                },{"data": "idcolumn", render: function (data, type, row, meta) {
                        var salida;

                        if (row.row_edit) {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.guardar_oficina('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                                "</center>",
                            ].join('');
                        } else {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.editar_oficina('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
                                " | <a href=\"javascript: Exeperu.eliminar_oficina('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                                "</center>",
                            ].join('');
                        }

                        return salida;
                    }
                }
            ]
        });
    };

    Helpers.prototype.editar_oficina = function (iditem) {
        var self = this;

        if (!this.cancelar_oficina())
            return false;

        var tabla = this.tables['table_oficina'];
        var row = tabla.row('#' + iditem);
        var $_row = $(row.node());
        var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
        var raw_data = this.raw_data_current = row.data();
        var edit_data = {};

        $.each(raw_data, function (index, value) {
            switch (index) {
                case 'idcolumn':
                case 'idmatricula':
                    var valuex = value;
                break;
                case 'direccion':
                    var valuex = '<input type="text" style="width:300px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'latitud':
                    var valuex = '<input type="text" style="width:120px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'longitud':
                    var valuex = '<input type="text" style="width:120px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'mapa':
                    var valuex = '<input type="hidden" name="' + index + '" value="0" class="celda_editada">';
                    valuex += '<input type="checkbox" name="' + index + '"  ' + (value == 1 ? 'checked' : '') + ' value="1" class="celda_editada">';
                    break;
    //            case 'pdf':
    //                var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
    //                break;
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

    Helpers.prototype.guardar_oficina = function (iditem) {
        var tabla = this.tables['table_oficina'];
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

        return this.guardar_textareaoficina();
    };

    Helpers.prototype.guardar_textareaoficina = function () {
        var tabla = this.tables['table_oficina'];
        var texarea = $('#c14jm');
        var data = tabla.data().toArray();

        texarea.val(JSON.stringify(data));
    };

    Helpers.prototype.eliminar_oficina = function (iditem) {
        var tabla = this.tables['table_oficina'];
        var row = tabla.row('#' + iditem);
        var page = tabla.page();

        row.remove().page(page).draw('page');

        return this.guardar_textareaoficina();
    };
    
    Helpers.prototype.cancelar_pdf = function () {
        var tabla = this.tables['table_pdfjm'];
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

    Helpers.prototype.crear_pdf = function (idmatricula) {
        if (!this.cancelar_pdf())
            return false;

        var tabla = this.tables['table_pdfjm'];
        var page = tabla.page();
        var total = tabla.data().length;
        var next = total + 1;
    //    var next = 0;

        tabla.row.add({
            "nombre": "",
            "subtitulo": "",
            "pdf": "",
            "imagen": "",
            "idcolumn": "pdf_" + next,
    //        "row_edit": true
        }).draw().page('last').draw('page');

        return this.editar_pdf("pdf_" + next);
    };

    Helpers.prototype.tablePdfs = function () {
        var self = this;
        var camp14 = $('#cam14');
        var data = JSON.parse(camp14.val());

        this.loadDataTable('table_pdfjm', {
            "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
            "pagingType": "full_numbers",
            "rowId": "idcolumn",
            "data": data,
            "columns": [
                {"data": "nombre","width":"15%"},
                {"data": "subtitulo","width":"15%"},
                {"data": "pdf","width":"30%"},
                {"data": "imagen","width":"30%"},
                {"data": "idcolumn", render: function (data, type, row, meta) {
                        var salida;

                        if (row.row_edit) {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.guardar_pdf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                                "</center>",
                            ].join('');
                        } else {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.editar_pdf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
                                " | <a href=\"javascript: Exeperu.eliminar_pdf('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                                "</center>",
                            ].join('');
                        }

                        return salida;
                    }
                }
            ]
        });
    };

    Helpers.prototype.editar_pdf = function (iditem) {
        var self = this;

        if (!this.cancelar_pdf())
            return false;

        var tabla = this.tables['table_pdfjm'];
        var row = tabla.row('#' + iditem);
        var $_row = $(row.node());
        var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
        var raw_data = this.raw_data_current = row.data();
        var edit_data = {};

        $.each(raw_data, function (index, value) {
            switch (index) {
                case 'idcolumn':
                case 'idmatricula':
                    var valuex = value;
                break;
                case 'nombre':
                    var valuex = '<input type="text" style="width:140px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'subtitulo':
                    var valuex = '<input type="text" style="width:140px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    break;
                case 'pdf':
                    var valuex = '<input type="text" style="width:180px;" id="campo_' + raw_data.idcolumn + '" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
                    valuex += '<button type="button" onclick="Exeperu.popupManager(\'campo_' + raw_data.idcolumn + '\',\'\',\'' + self.key + '\',2)"><span class="glyphicon glyphicon-file"></span></button>';
                    break;
               case 'imagen':
                    var valuex = '<input type="text" style="width:180px;" id="image_' + raw_data.idcolumn + '" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 100%">';
                   valuex += '<button type="button" onclick="Exeperu.popupManager(\'image_' + raw_data.idcolumn + '\',\'\',\'' + self.key + '\',2)"><span class="glyphicon glyphicon-picture"></span></button>';
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

    Helpers.prototype.guardar_pdf = function (iditem) {
        var tabla = this.tables['table_pdfjm'];
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

        return this.guardar_textareapdf();
    };

    Helpers.prototype.guardar_textareapdf = function () {
        var tabla = this.tables['table_pdfjm'];
        var texarea = $('#cam14');
        var data = tabla.data().toArray();

        texarea.val(JSON.stringify(data));
    };

    Helpers.prototype.eliminar_pdf = function (iditem) {
        var tabla = this.tables['table_pdfjm'];
        var row = tabla.row('#' + iditem);
        var page = tabla.page();

        row.remove().page(page).draw('page');

        return this.guardar_textareapdf();
    };
	
	
	/****************LISTA********************/
	
		Helpers.prototype.cancelar_lista = function () {
			var tabla = this.tables['table_lista'];
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

		Helpers.prototype.crear_lista = function (idmatricula) {
			if (!this.cancelar_lista())
				return false;

			var tabla = this.tables['table_lista'];
			var page = tabla.page();
			var total = tabla.data().length;
			var next = total + 1;
		//    var next = 0;

			tabla.row.add({
                "Titulo": "",
                "Detalles": "",
				// "Producto_en": "",
				//"pdf": "",
				"idcolumn": "pdf_" + next,
		//        "row_edit": true
			}).draw().page('last').draw('page');

			return this.editar_lista("pdf_" + next);
		};

		Helpers.prototype.tableLista = function () { 
			var self = this;
			var camp27 = $('#cam27');
			var data = JSON.parse(camp27.val());
            console.log(data);
            
			this.loadDataTable('table_lista', {
				"lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
				"pagingType": "full_numbers",
				"rowId": "idcolumn",
				"data": data,
				"columns": [
                    {"data": "Titulo","width":"30%"},
                    {"data": "Detalles","width":"50%"},
					// {"data": "Producto_en","width":"30%"},
					//{"data": "pdf","width":"20%"},
					{"data": "idcolumn", render: function (data, type, row, meta) {
							var salida;

							if (row.row_edit) {
								salida = [
									"<center>",
									"<a href=\"javascript: Exeperu.guardar_lista('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
									"</center>",
								].join('');
							} else {
								salida = [
									"<center>",
									"<a href=\"javascript: Exeperu.editar_lista('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
									" | <a href=\"javascript: Exeperu.eliminar_lista('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
									"</center>",
								].join('');
							}

							return salida;
						}
					}
				]
			});
		};

		Helpers.prototype.editar_lista = function (iditem) {
			var self = this;

			if (!this.cancelar_lista())
				return false;

			var tabla = this.tables['table_lista'];
			var row = tabla.row('#' + iditem);
			var $_row = $(row.node());
			var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
			var raw_data = this.raw_data_current = row.data();
			var edit_data = {};

			$.each(raw_data, function (index, value) {
				switch (index) {
					case 'idcolumn':
					case 'idmatricula':
						var valuex = value;
					break;
					case 'Detalles':
                        var valuex = '<textarea style="width:100%"   name="' + index + '" class="celda_editada">' + (!value ? '' : value) + '</textarea>';
                        break;
                    // case 'Producto_en':
                    //     var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    //     break;
					//case 'pdf':
					//	var valuex = '<input type="text" style="width:200px;" id="campo_' + raw_data.idcolumn + '" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 90%">';
					//	valuex += '<button type="button" onclick="Exeperu.popupManager(\'campo_' + raw_data.idcolumn + '\',\'\',\'' + self.key + '\',2)"><span class="glyphicon glyphicon-file"></span></button>';
					//	break;
		   //          case 'concentrado':
		   //              var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
		   //              break;
					// case 'congelado':
		   //              var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
		   //              break;
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

		Helpers.prototype.guardar_lista = function (iditem) {
			var tabla = this.tables['table_lista'];
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

			return this.guardar_textarealista();
		};

		Helpers.prototype.guardar_textarealista = function () {
			var tabla = this.tables['table_lista'];
			var texarea = $('#cam27');
			var data = tabla.data().toArray();

			texarea.val(JSON.stringify(data));
		};

		Helpers.prototype.eliminar_lista = function (iditem) {
			var tabla = this.tables['table_lista'];
			var row = tabla.row('#' + iditem);
			var page = tabla.page();

			row.remove().page(page).draw('page');

			return this.guardar_textarealista();
		};
		
	
	/****************LISTA********************/


    /****************Preguntas Frecuentes********************/
    
        Helpers.prototype.cancelar_pf = function () {
            var tabla = this.tables['table_pf'];
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

        Helpers.prototype.crear_pf = function (idmatricula) {
            if (!this.cancelar_pf())
                return false;

            var tabla = this.tables['table_pf'];
            var page = tabla.page();
            var total = tabla.data().length;
            var next = total + 1;
        //    var next = 0;

            tabla.row.add({
                "Producto": "",
                "Titulo": "",
                "Detalles": "",
                // "Producto_en": "",
                //"pdf": "",
                "idcolumn": "pdf_" + next,
        //        "row_edit": true
            }).draw().page('last').draw('page');

            return this.editar_pf("pdf_" + next);
        };

        Helpers.prototype.tablepf = function () { 
            var self = this;
            var camp27 = $('#cam27');
            var data = JSON.parse(camp27.val());
            console.log(data);
            
            this.loadDataTable('table_pf', {
                "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
                "pagingType": "full_numbers",
                "rowId": "idcolumn",
                "data": data,
                "columns": [
                    {"data": "Producto","width":"25%"},
                    {"data": "Titulo","width":"25%"},
                    {"data": "Detalles","width":"30%"},
                    // {"data": "Producto_en","width":"30%"},
                    //{"data": "pdf","width":"20%"},
                    {"data": "idcolumn", render: function (data, type, row, meta) {
                            var salida;

                            if (row.row_edit) {
                                salida = [
                                    "<center>",
                                    "<a href=\"javascript: Exeperu.guardar_pf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                                    "</center>",
                                ].join('');
                            } else {
                                salida = [
                                    "<center>",
                                    "<a href=\"javascript: Exeperu.editar_pf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
                                    " | <a href=\"javascript: Exeperu.eliminar_pf('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                                    "</center>",
                                ].join('');
                            }

                            return salida;
                        }
                    }
                ]
            });
        };

        Helpers.prototype.editar_pf = function (iditem) {
            var self = this;

            if (!this.cancelar_pf())
                return false;

            var tabla = this.tables['table_pf'];
            var row = tabla.row('#' + iditem);
            var $_row = $(row.node());
            var page = tabla.page(); //obtener la pagina actual en donde se esta realizando la edicion
            var raw_data = this.raw_data_current = row.data();
            var edit_data = {};

            $.each(raw_data, function (index, value) {
                switch (index) {
                    case 'idcolumn':
                    case 'idmatricula':
                        var valuex = value;
                    break;
                    case 'Titulo':
                        var valuex = '<textarea style="width:100%"   name="' + index + '" class="celda_editada">' + (!value ? '' : value) + '</textarea>';
                        break;
                    case 'Detalles':
                        var valuex = '<textarea style="width:100%"   name="' + index + '" class="celda_editada">' + (!value ? '' : value) + '</textarea>';
                        break;
                    // case 'Producto_en':
                    //     var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
                    //     break;
                    //case 'pdf':
                    //  var valuex = '<input type="text" style="width:200px;" id="campo_' + raw_data.idcolumn + '" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada" style="width: 90%">';
                    //  valuex += '<button type="button" onclick="Exeperu.popupManager(\'campo_' + raw_data.idcolumn + '\',\'\',\'' + self.key + '\',2)"><span class="glyphicon glyphicon-file"></span></button>';
                    //  break;
           //          case 'concentrado':
           //              var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
           //              break;
                    // case 'congelado':
           //              var valuex = '<input type="text" style="width:200px;" name="' + index + '" value="' + (!value ? '' : value) + '" class="celda_editada">';
           //              break;
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

        Helpers.prototype.guardar_pf = function (iditem) {
            var tabla = this.tables['table_pf'];
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

            return this.guardar_textareapf();
        };

        Helpers.prototype.guardar_textareapf = function () {
            var tabla = this.tables['table_pf'];
            var texarea = $('#cam27');
            var data = tabla.data().toArray();

            texarea.val(JSON.stringify(data));
        };

        Helpers.prototype.eliminar_pf = function (iditem) {
            var tabla = this.tables['table_pf'];
            var row = tabla.row('#' + iditem);
            var page = tabla.page();

            row.remove().page(page).draw('page');

            return this.guardar_textareapf();
        };
        
    
    /****************LISTA********************/
	
    }
    );
</script>