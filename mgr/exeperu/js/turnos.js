Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_turnos();
};

Helpers.prototype.table_turnos = function () {
    this.loadDataTable('table_turnos', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
        },
        "columns": [
            {"data": "turno"},
            {"data": "hora_ini"},
            {"data": "hora_fin"},
            {"data":"nomcat", "render": function (data) {
                    var salida = '';

                    if(data!= null){
                        salida=data;
                    }else{
                        salida='TODAS';
                    }

                    return salida;
                }
            },
            {"data":"nomsub", "render": function (data) {
                    var salida = '';

                    if(data!= null){
                        salida=data;
                    }else{
                        salida='TODAS';
                    }

                    return salida;
                }
            },
            {"data": "botones"}
        ]
    });
};

Helpers.prototype.delTurno = function (idturno) {
    if(confirm('Desea eliminar')){
        this.sendAjax('manager/turnos/delete', {"id": idturno}, 'refrescar');
    }
};

Helpers.prototype.refrescar = function () {
    //$('#modalCreateEdit').modal('toggle');
    this.tables['table_turnos'].ajax.reload();
};

Helpers.prototype.editTurno = function (idturno) {
    this.sendAjax('manager/turnos/edit', {"id": idturno}, 'loadResponse');
};

Helpers.prototype.addTurno = function () {
    this.sendAjax('manager/turnos/edit', {"idturno": 0}, 'loadResponse');
};

Helpers.prototype.reloadTableTurnos = function (response) {
    $('#modalCreateEdit').modal('toggle');

    return this.tables['table_turnos'].ajax.reload();
};



