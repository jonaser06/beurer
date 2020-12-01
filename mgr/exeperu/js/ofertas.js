Helpers.prototype.init = function(datos) {
    var self = this;
    this.dataApp = datos;

    this.table_pedido_estado();

};

Helpers.prototype.table_pedido_estado = function() {
    this.loadDataTable('table_pedido_estado', {
        "lengthMenu": [
            [25, 50, 75, -1],
            [25, 50, 75, "Todos"]
        ],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,

        },
        "columns": [
            { "data": "pedido" },
            { "data": "codigo" },
            {
                "data": "estado",
                "render": function(data) {
                    var salida = '';

                    switch (data) {
                        case '1':
                            salida = '<span class="label ">Activo</span>';
                            break;
                        case '2':
                            salida = '<span class="label ">Activo</span>';
                            break;
                        case '3':
                            salida = '<span class="label "></span>';
                            break;
                        default:
                            salida = '<span class="label ">Completado</span>';
                            break;
                    }

                    return salida;
                }
            },
            { "data": "botones" }
        ]
    });
};



Helpers.prototype.editEstado = function(idcategoria) {
    this.sendAjax('manager/pedidos/edit', { "id_pedido": idcategoria }, 'loadResponse');
};

Helpers.prototype.addEstado = function() {
    this.sendAjax('manager/categorias/edit', { "idcategoria": 0 }, 'loadResponse');
};

Helpers.prototype.reloadTableEstados = function(response) {
    $('#modalEdit').modal('toggle');
    return this.tables['table_novedades'].ajax.reload();
};

Helpers.prototype.refrescarc = function(response) {
    return this.tables['table_novedades'].ajax.reload();
};

Helpers.prototype.delEstado = function(idcategoria) {
    if (confirm('Desea eliminar')) {
        this.sendAjax('manager/categorias/delete', { "id": idcategoria }, 'refrescarc');
    }
};