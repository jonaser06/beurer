Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_blogs();
    this.table_categoriasb();

};

Helpers.prototype.table_blogs = function () {
    this.loadDataTable('table_blogs', {
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
            {"data": "idblog"},
            {"data": "titulo"},
            {"data": "fecha"},
            {"data": "botones"}
        ]
    });
};

Helpers.prototype.table_categoriasb = function () {
    this.loadDataTable('table_categoriasb', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": "manager/blogs/readc"
        },
        "columns": [
            {"data": "idcategoria"},
            {"data": "categoria"},
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

Helpers.prototype.editBlog = function (idblog) {
    this.sendAjax('manager/blogs/edit', {"id": idblog}, 'loadResponse');
};

Helpers.prototype.editCategoria = function (idcategoria) {
    this.sendAjax('manager/blogs/editc', {"id": idcategoria}, 'loadResponse');
};

Helpers.prototype.addCategoria = function () {
    this.sendAjax('manager/blogs/editc', {"idcategoria": 0}, 'loadResponse');
}

Helpers.prototype.addBlog = function () {
    this.sendAjax('manager/blogs/edit', {"idblog": 0}, 'loadResponse');
}

Helpers.prototype.validarcategoriab = function () {
    var self = this;

    var config = {
        rules: {
            "categoria": {required: true,minlength: 1},
            "banner": {required: true,minlength: 3},
            "orden": {required: true, minlength: 1}, 
        },
        messages: {
            "categoria": {required: "",minlength: ""},
            "banner": {required: ""},
            "orden": {required: "", minlength: ""}
        },
        submitHandler: function (form) {
            var formulario = $(form);
            var data = formulario.serializeArray();

            self.sendAjax('manager/blogs/savec', data, 'refrescarc');
            $("#modalCreateEdit").modal("toggle");
        }
    };
    this.validate('formCrearEditarcb', config);
};

Helpers.prototype.validarblog = function () {
    var self = this;

    var config = {
        rules: {
            "titulo": {required: true,minlength: 1},
            "idcategoria":{required: true},
            "imagen": {required: true,minlength: 3},
//            "tags": {required: true,minlength: 1},
        },
        messages: {
            "titulo": {required: "",minlength: ""},
            "idcategoria": {required: ""},
            "imagen": {required: ""},
        },
        submitHandler: function (form) {
            var formulario = $(form);
            var data = formulario.serializeArray();

            self.sendAjax('manager/blogs/save', data, 'refrescar');
            $("#modalCreateEdit").modal("toggle");
        }
    };
    this.validate('formCrearEditarb', config);
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_blogs'].ajax.reload();
};

Helpers.prototype.refrescarc = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_categoriasb'].ajax.reload();
};

Helpers.prototype.delBlog = function (idblog) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/blogs/delete', {"id": idblog}, 'refrescar');
    }
};

Helpers.prototype.delCategoriab = function (idcategoria) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/blogs/deletec', {"id": idcategoria}, 'refrescarc');
    }
};
