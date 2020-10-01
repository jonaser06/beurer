Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_noticias();
};

Helpers.prototype.table_noticias = function () {
    this.loadDataTable('table_noticias', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
        },
        "columns": [
            {"data": "titulo"},
            //{"data": "descripcion"},
           
			{"data":"imagen", "render": function (data) {
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

Helpers.prototype.delNoticia = function (idnoticia) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/noticias/delete', {"id": idnoticia}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_noticias'].ajax.reload();
};

Helpers.prototype.editNoticia = function (idnoticia) {
    this.sendAjax('manager/noticias/edit', {"id": idnoticia}, 'loadResponse');
};

Helpers.prototype.addNoticia = function () {
    this.sendAjax('manager/noticias/edit', {"idnoticia": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableNoticias = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_noticias'].ajax.reload();
};



