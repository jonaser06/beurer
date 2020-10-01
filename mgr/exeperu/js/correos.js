Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_correos();

//    $("#filter_0").on("change", function (event) {
//        self.filter0(event);
//    });
//    $("#filter_1, #filter_2, #filter_3, #filter_4").on("change", function () {
//        self.filterss();
//    });
    $("#formulariojm").on("change", function () {
        self.filterss();
    });
};

Helpers.prototype.table_correos = function () {
    this.loadDataTable('table_correos', {
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
            {"data": "persona"},
            {"data": "telefono"},
            {"data": "email"},
            {"data": "fecha"}
        ]
    });
};

Helpers.prototype.filterss = function () {
    this.tables['table_correos'].ajax.reload();
};




