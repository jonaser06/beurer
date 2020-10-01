Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_libros();
};

Helpers.prototype.table_libros = function () {
    this.loadDataTable('table_libros', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
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
            {"data":"autor"},
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

Helpers.prototype.delLibro = function (idlibro) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/libros/delete', {"id": idlibro}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    toastr.success("Libro eliminado correctamente",{timeOut:2000});
    this.tables['table_libros'].ajax.reload();
};

Helpers.prototype.editLibro = function (idlibro) {
    this.sendAjax('manager/libros/edit', {"id": idlibro}, 'loadResponse');
};

Helpers.prototype.addLibro = function () {
    this.sendAjax('manager/libros/edit', {"idlibro": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableLibros = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_libros'].ajax.reload();
};



