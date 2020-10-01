Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_videos();
    this.table_categorias();
};

Helpers.prototype.table_videos = function () {
    this.loadDataTable('table_videos', {
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
                        salida= '<img src="assets/images/libros/default.png" width="60px;" height="50px;">';
                    }else{
                        salida= '<img src="'+data+'" width="60px;" height="50px;">';
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

Helpers.prototype.table_categorias = function () {
    this.loadDataTable('table_categorias', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.dcat,
        },
        "columns": [
            {"data": "nombre"},
            //{"data": "descripcion"},
			
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
			{"data": "orden"},
            {"data": "botones"}
        ]
    });
};

Helpers.prototype.delVideo = function (idvideo) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/videos/delete', {"id": idvideo}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_videos'].ajax.reload();
};

Helpers.prototype.editVideo = function (idvideo) {
    this.sendAjax('manager/videos/edit', {"id": idvideo}, 'loadResponse');
};

Helpers.prototype.addVideo = function () {
    this.sendAjax('manager/videos/edit', {"idvideo": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableVideos = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_videos'].ajax.reload();
};

/**************categorias*********************/

Helpers.prototype.delCategoria = function (idcategoria_video) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/videos/deletecategoria', {"id": idcategoria_video}, 'refrescarx');
    }
};

Helpers.prototype.refrescarx = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_categorias'].ajax.reload();
};

Helpers.prototype.editCategoria = function (idcategoria_video) {
    this.sendAjax('manager/videos/editcategoria', {"id": idcategoria_video}, 'loadResponse');
};

Helpers.prototype.addCategoria = function () {
    this.sendAjax('manager/videos/editcategoria', {"idcategoria_video": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableCategorias = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_categorias'].ajax.reload();
};

