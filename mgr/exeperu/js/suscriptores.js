Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_suscriptores();
};

Helpers.prototype.table_suscriptores = function () {
    this.loadDataTable('table_suscriptores', {
        "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "Todos"]],
        "pagingType": "full_numbers",
        "ajax": {
            "type": "POST",
            "url": this.dataApp.url,
        },
        "columns": [
            {"data": "email"},
        ]
    });
};




