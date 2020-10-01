Helpers.prototype.init = function (datos) {
    var self = this;
    this.dataApp = datos;

    this.table_pedidos();

//    
    $("#datetimepickerinicio,#datetimepickerfin").on("dp.change", function (e) {
        self.filterss();
    });

    $("#filtro,#estadopago, #metodopago").on("change", function () {
        self.filterss();
    });
};

Helpers.prototype.table_pedidos = function () {
    this.loadDataTable('table_pedidos', {
        "lengthMenu": [[25, 50, 75, -1], [25, 50, 75, "Todos"]],
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
        }, "columns": [
            {"data": "idpedido"},
            {"data": "metodo_pago", "render": function (data, display, row) {
                    var salida = '';

                    switch (data) {
                        case 'deposito_bancario':
                            salida = '<i class="fa fa-university" aria-hidden="true" style="font-size: 34px;color: #9a9a9a;vertical-align: middle;"></i>';
                            break;
                        case 'visa':
                            salida = '<i class="fa fa-cc-visa" aria-hidden="true" style="font-size: 34px;color: #172274;vertical-align: middle;"></i>';
                            break;
                        case 'mastercard':
                            salida = '<i class="fa fa-cc-mastercard" aria-hidden="true" style="font-size: 34px;color: #FF5F01;vertical-align: middle;"></i>';
                            break;
                        case 'american_express':
                            salida = '<i class="fa fa-cc-amex" aria-hidden="true" style="font-size: 34px;color: #2E78BF;vertical-align: middle;"></i>';
                            break;
                        case 'diners_club':
                            salida = '<i class="fa fa-cc-diners-club" aria-hidden="true" style="font-size: 34px;color: #0069aa;vertical-align: middle;"></i>';
                            break;
                    }

//                    if (row.cupon != '' && row.cupon !== null) {
//                        salida += ' <img src="' + row.cupon_imagen + '" style="height: 34px; width: auto;">'
//                    }

                    return salida;
                }
            },
            {"data": "envia_nombres"},
//            {"data": "envia_apellidos"},
            {"data": "envia_correo"},
            {"data": "envia_celular"},
//            {"data": "departamento"},
//            {"data": "distrito"},
            {"data": "total_pedido_soles"},
            {"data": "fecha_pedido"},
            {"data": "exportar", "render": function (data) {
                    var salida = '';

                    switch (data) {
                        case '1':
                            salida = '<span class="label label-success"><i class="fa fa-check"></i></span>';
                            break;
                        default:
                            salida= '<span class="label label-danger"><i class="fa fa-close"></i></span>';
                            break;
                    }

                    return salida;
                }
            },
//            {"data": "fecha_pago"},
            {"data": "estado_pago"/*, "render": function (data) {
             var salida = '';
             
             switch (parseInt(data)) {
             case 1:
             //                            salida = '<i class="fa fa-cc-visa" aria-hidden="true" style="font-size: 34px;color: #172274;"></i>';
             salida = 'Pendiente Pago';
             break;
             case 2:
             //                            salida = '<i class="fa fa-cc-visa" aria-hidden="true" style="font-size: 34px;color: #172274;"></i>';
             salida = 'Pagado';
             break;
             case 3:
             salida = 'Entregado';
             break;
             case 4:
             salida = 'Recibido';
             break;
             default:
             salida = 'No Completado';
             break;
             }
             
             return salida;
             }*/
            },
            {"data":"estado_entrega"},
            {"data": "botones"}
        ],
//        "footerCallback": function ( row, data, start, end, display ) {
//            var api = this.api(), data;
// 
//            // converting to interger to find total
//            var intVal = function ( i ) {
//                return typeof i === 'string' ?
//                    i.replace(/[\$,]/g, '')*1 :
//                    typeof i === 'number' ?
//                        i : 0;
//            };
// 
//            // computing column Total of the complete result 
//            var monTotal = api
//                .column( 6 )
//                .data()
//                .reduce( function (a, b) {
//                    return intVal(a) + intVal(b);
//                }, 0 );
//                
////                console.log(monTotal);
//            // Update footer by showing the total with the reference of the column index 
////	    $( api.column( 0 ).footer() ).html('Total');
//            $( api.column( 1 ).footer() ).html('S/ '+ parseFloat(monTotal).toFixed(2));
//        }
    });
};

Helpers.prototype.verPedido = function (idpedido) {
    var url = this.dataApp.dpedido;
    var data = {
        "idpedido": idpedido
    };

    this.sendAjax(url, data, "popupPedido");
};

Helpers.prototype.expPedido = function (idpedido) {
    this.sendAjax('manager/pedidos/exportarpedidojm', {"idpedido": idpedido});
};

Helpers.prototype.popupPedido = function (response) {
    this.loadResponse(response);
};

Helpers.prototype.estadoPedido = function (estado, idpedido) {
    switch (estado) {
        case 'pagado':
            this.pedidoPagado(idpedido);
            break;
        case 'enviado':
            this.pedidoEnviado(idpedido);
            break;
        case 'entregado':
            this.pedidoEntregado(idpedido);
            break;
        case 'cancelado':
            this.pedidoCancelado(idpedido);
            break;
        default:
            //cancelado
            this.pedidoCancelado(idpedido);
            break;
    }
};

Helpers.prototype.estadoEntrega = function (estado, idpedido) {
    switch (estado) {
        case 'entregado':
            this.entregaTerminada(idpedido);
            break;
        case 'cancelado':
            this.entregaCancelada(idpedido);
            break;
        default:
            //cancelado
            this.entregaCancelada(idpedido);
            break;
    }
};

Helpers.prototype.entregaTerminada = function (idpedido) {
    this.sendAjax('manager/pedidos/entregaterminada', {"idpedido": idpedido}, "reloadTablePedidos");
};

Helpers.prototype.entregaCancelada = function (idpedido) {
    this.sendAjax('manager/pedidos/entregacancelada', {"idpedido": idpedido}, "reloadTablePedidos");
};

Helpers.prototype.pedidoPagado = function (idpedido) {
    this.sendAjax('manager/pedidos/pedidopagado', {"idpedido": idpedido}, "reloadTablePedidos");
};

Helpers.prototype.pedidoEnviado = function (idpedido) {
    this.sendAjax('manager/pedidos/pedidoenviado', {"idpedido": idpedido}, "reloadTablePedidos");
};

Helpers.prototype.pedidoEntregado = function (idpedido) {
    this.sendAjax('manager/pedidos/pedidoentregado', {"idpedido": idpedido}, "reloadTablePedidos");
};

Helpers.prototype.pedidoCancelado = function (idpedido) {
    this.sendAjax('manager/pedidos/pedidocancelado', {"idpedido": idpedido}, "reloadTablePedidos");
};

Helpers.prototype.envio_validar = function () {
    var self = this;

    var config = {
        ignore: "",
        rules: {
            "empresa": {required: true},
            "codigo": {required: true}
        },
        messages: {
            "empresa": {required: ""},
            "codigo": {required: ""}
        },
        submitHandler: function (form) {
            var formulario = $(form);
            var data = formulario.serializeArray();

            self.sendAjax('manager/pedidos/notificar', data, 'reloadTablePedidos');
        }
    };

    this.validate('formCreateEdit', config);
};

Helpers.prototype.reloadTablePedidos = function (response) {
    this.tables['table_pedidos'].ajax.reload();

    if (response.success) {
        $('#modalCreateEdit').modal('toggle');
    }
};

//Helpers.prototype.reporte = function (dataPedidosactual, dataPedidospasado) {
//    var barChartCanvas = $("#barChart").get(0).getContext("2d");
//    var barChart = new Chart(barChartCanvas);
//    var barChartData = {
//        labels: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SETIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
//        datasets: [
//            {
//                label: "Pedidos año pasado",
//                fillColor: "rgba(210, 214, 222, 1)",
//                strokeColor: "rgba(210, 214, 222, 1)",
//                pointColor: "rgba(210, 214, 222, 1)",
//                pointStrokeColor: "#c1c7d1",
//                pointHighlightFill: "#fff",
//                pointHighlightStroke: "rgba(220,220,220,1)",
//                data: dataPedidospasado
//            },
//            {
//                label: "Pedidos año actual",
//                fillColor: "rgba(60,141,188,0.9)",
//                strokeColor: "rgba(60,141,188,0.8)",
//                pointColor: "#3b8bba",
//                pointStrokeColor: "rgba(60,141,188,1)",
//                pointHighlightFill: "#fff",
//                pointHighlightStroke: "rgba(60,141,188,1)",
//                data: dataPedidosactual
//            }
//        ]
//    };
//
////    console.log(barChartData);
////    barChartData.datasets[1].fillColor = "#00a65a";
////    barChartData.datasets[1].strokeColor = "#00a65a";
////    barChartData.datasets[1].pointColor = "#00a65a";
//    var barChartOptions = {
//        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
//        scaleBeginAtZero: true,
//        //Boolean - Whether grid lines are shown across the chart
//        scaleShowGridLines: true,
//        //String - Colour of the grid lines
//        scaleGridLineColor: "rgba(0,0,0,.05)",
//        //Number - Width of the grid lines
//        scaleGridLineWidth: 1,
//        //Boolean - Whether to show horizontal lines (except X axis)
//        scaleShowHorizontalLines: true,
//        //Boolean - Whether to show vertical lines (except Y axis)
//        scaleShowVerticalLines: true,
//        //Boolean - If there is a stroke on each bar
//        barShowStroke: true,
//        //Number - Pixel width of the bar stroke
//        barStrokeWidth: 2,
//        //Number - Spacing between each of the X value sets
//        barValueSpacing: 5,
//        //Number - Spacing between data sets within X values
//        barDatasetSpacing: 1,
//        //String - A legend template
//        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
//        //Boolean - whether to make the chart responsive
//        responsive: true,
//        maintainAspectRatio: true
//    };
//
//    barChartOptions.datasetFill = false;
//    barChart.Bar(barChartData, barChartOptions);
//};

Helpers.prototype.reportejm = function () {
    Chart.pluginService.register({
        beforeRender: function (chart) {
            if (chart.config.options.showAllTooltips) {
                // create an array of tooltips
                // we can't use the chart tooltip because there is only one tooltip per chart
                chart.pluginTooltips = [];
                chart.config.data.datasets.forEach(function (dataset, i) {
                    chart.getDatasetMeta(i).data.forEach(function (sector, j) {
                        chart.pluginTooltips.push(new Chart.Tooltip({
                            _chart: chart.chart,
                            _chartInstance: chart,
                            _data: chart.data,
                            _options: chart.options.tooltips,
                            _active: [sector]
                        }, chart));
                    });
                });

                // turn off normal tooltips
                chart.options.tooltips.enabled = false;
            }
        },
        afterDraw: function (chart, easing) {
            if (chart.config.options.showAllTooltips) {
                // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                if (!chart.allTooltipsOnce) {
                    if (easing !== 1)
                        return;
                    chart.allTooltipsOnce = true;
                }

                // turn on tooltips
                chart.options.tooltips.enabled = true;
                Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                    tooltip.initialize();
                    tooltip.update();
                    // we don't actually need this since we are not animating tooltips
                    tooltip.pivot();
                    tooltip.transition(easing).draw();
                });
                chart.options.tooltips.enabled = false;
            }
        }
    });

// Show tooltips always even the stats are zero


    var canvas = $('#canvas').get(0).getContext('2d');
    var doughnutChart = new Chart(canvas, {
        type: 'doughnut',
        data: {
            labels: [
                "Success",
                "Failure"
            ],
            datasets: [{
                    data: [45, 9],
                    backgroundColor: [
                        "#1ABC9C",
                        "#566573"
                    ],
                    hoverBackgroundColor: [
                        "#148F77",
                        "#273746"
                    ]
                }]
        },
        options: {
            // In options, just use the following line to show all the tooltips
            showAllTooltips: true
        }
    });
}

Helpers.prototype.chartplugin = function () {
    Chart.pluginService.register({
        beforeRender: function (chart) {
            if (chart.config.options.showAllTooltips) {
                chart.pluginTooltips = [];
//          console.log(chart.config.data.datasets[0].data[0]);
                chart.config.data.datasets.forEach(function (dataset, i) {
                    chart.getDatasetMeta(i).data.forEach(function (sector, j) {
//                if(chart.config.data.datasets[0].data[j] != 0){
                        chart.pluginTooltips.push(new Chart.Tooltip({
                            _chart: chart.chart,
                            _chartInstance: chart,
                            _data: chart.data,
                            _options: chart.options.tooltips,
                            _active: [sector]
                        }, chart));
//                }
                    });
                });
                // turn off normal tooltips
                chart.options.tooltips.enabled = false;
            }
        },
        afterDraw: function (chart, easing) {
            if (chart.config.options.showAllTooltips) {
                // we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
                if (!chart.allTooltipsOnce) {
                    if (easing !== 1)
                        return;
                    chart.allTooltipsOnce = true;
                }

                // turn on tooltips
                chart.options.tooltips.enabled = true;
                Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
                    tooltip.initialize();
                    tooltip.update();
                    // we don't actually need this since we are not animating tooltips
                    tooltip.pivot();
                    tooltip.transition(easing).draw();
                });
                chart.options.tooltips.enabled = false;
            }
        }
    });
}

Helpers.prototype.reporte = function (dataPedidosactual) {
//    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//    this.chartplugin(); 
    var pieChartContent = document.getElementById('pedidosChartContent');
    pieChartContent.innerHTML = '&nbsp;';
    $('#pedidosChartContent').append('<canvas id="canvas" style="height:290px;"><canvas>');

    var barChartData = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [dataPedidosactual]

    };
    var ctx = document.getElementById('canvas').getContext('2d');
//                        console.log(dataPedidosactual);
    var grafica = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
//                        showAllTooltips: true,
            title: {
                display: true,
//						text: 'Chart.js Bar Chart'
            }, tooltips: {
                yAlign: 'bottom',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function (tooltipItem, data) {
                        return 'Pedidos : ' + data['datasets'][0]['data'][tooltipItem['index']];
                    },
//                              afterLabel: function(tooltipItem, data) {
//                                var dataset = data['datasets'][0];
////                                        var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)
//                                return 'Ventas: S/'+data['datasets'][0]['data2'][tooltipItem['index']];
//                              }
//                                        labelColor: function(tooltipItem, chart) {
//                                            return {
//                                                borderColor: 'rgb(255, 0, 0)',
//                                                backgroundColor: 'rgb(255, 0, 0)'
//                                            }
//                                        },
//                                        labelTextColor:function(tooltipItem, chart){
//                                            return '#543453';
//                                        }
                }
            }
        }
    });

};

Helpers.prototype.reportetipos = function (dataPedidosnormales,dataPedidosconvenios) {
//    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//    this.chartplugin(); 
    var pieChartContent = document.getElementById('pedidosChartContentjm');
    pieChartContent.innerHTML = '&nbsp;';
    $('#pedidosChartContentjm').append('<canvas id="jmtipos" style="height:290px;"><canvas>');

    var barChartData = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [dataPedidosnormales,dataPedidosconvenios]

    };
    var ctx = document.getElementById('jmtipos').getContext('2d');
//                        console.log(dataPedidosactual);
    var grafica = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
//                        showAllTooltips: true,
            title: {
                display: true,
//						text: 'Chart.js Bar Chart'
            }, tooltips: {
                yAlign: 'bottom',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function (tooltipItem, data) {
                        return 'Pedidos Normales : ' + data['datasets'][0]['data'][tooltipItem['index']];
                    },
                              afterLabel: function(tooltipItem, data) {
                                var dataset = data['datasets'][1];
//                                        var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)
                                return 'Pedidos Convenios :'+data['datasets'][1]['data'][tooltipItem['index']];
                              }
//                                        labelColor: function(tooltipItem, chart) {
//                                            return {
//                                                borderColor: 'rgb(255, 0, 0)',
//                                                backgroundColor: 'rgb(255, 0, 0)'
//                                            }
//                                        },
//                                        labelTextColor:function(tooltipItem, chart){
//                                            return '#543453';
//                                        }
                }
            }
        }
    });

};

Helpers.prototype.reportetiposventas = function (dataVentasnormales,dataVentasconvenios) {
//    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//    this.chartplugin(); 
    var pieChartContent = document.getElementById('pedidosChartContentjmjm');
    pieChartContent.innerHTML = '&nbsp;';
    $('#pedidosChartContentjmjm').append('<canvas id="jmventas" style="height:290px;"><canvas>');

    var barChartData = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [dataVentasnormales,dataVentasconvenios]

    };
    var ctx = document.getElementById('jmventas').getContext('2d');
//                        console.log(dataPedidosactual);
    var grafica = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
//                        showAllTooltips: true,
            title: {
                display: true,
//						text: 'Chart.js Bar Chart'
            }, tooltips: {
                yAlign: 'bottom',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function (tooltipItem, data) {
                        return 'Ventas Normales : S/' + data['datasets'][0]['data'][tooltipItem['index']];
                    },
                              afterLabel: function(tooltipItem, data) {
                                var dataset = data['datasets'][1];
//                                        var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)
                                return 'Ventas Convenios : S/'+data['datasets'][1]['data'][tooltipItem['index']];
                              }
//                                        labelColor: function(tooltipItem, chart) {
//                                            return {
//                                                borderColor: 'rgb(255, 0, 0)',
//                                                backgroundColor: 'rgb(255, 0, 0)'
//                                            }
//                                        },
//                                        labelTextColor:function(tooltipItem, chart){
//                                            return '#543453';
//                                        }
                }
            }
        }
    });

};

Helpers.prototype.reporteventas = function (dataVentasactual) {
//    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//    this.chartplugin(); 
    var pieChartContent = document.getElementById('ventasChartContent');
    pieChartContent.innerHTML = '&nbsp;';
    $('#ventasChartContent').append('<canvas id="chartjm2" style="height:290px;"><canvas>');

    var barChartData = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [dataVentasactual]

    };
    var ctx = document.getElementById('chartjm2').getContext('2d');
//                        console.log(dataPedidosactual);
    var grafica = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
//                        showAllTooltips: true,
            title: {
                display: true,
//						text: 'Chart.js Bar Chart'
            }, tooltips: {
                yAlign: 'bottom',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function (tooltipItem, data) {
                        return 'Ventas : S/  ' + data['datasets'][0]['data'][tooltipItem['index']];
                    },
//                              afterLabel: function(tooltipItem, data) {
//                                var dataset = data['datasets'][0];
////                                        var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)
//                                return 'Ventas: S/'+data['datasets'][0]['data2'][tooltipItem['index']];
//                              }
//                                        labelColor: function(tooltipItem, chart) {
//                                            return {
//                                                borderColor: 'rgb(255, 0, 0)',
//                                                backgroundColor: 'rgb(255, 0, 0)'
//                                            }
//                                        },
//                                        labelTextColor:function(tooltipItem, chart){
//                                            return '#543453';
//                                        }
                }
            }
        }
    });

};

Helpers.prototype.reportepromedio = function (dataPromedio) {
//    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//    this.chartplugin(); 
    var pieChartContent = document.getElementById('promChartContent');
    pieChartContent.innerHTML = '&nbsp;';
    $('#promChartContent').append('<canvas id="chartjm" style="height:290px;"><canvas>');
    var barChartData = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [dataPromedio]

    };
    var ctx = document.getElementById('chartjm').getContext('2d');
//                        console.log(dataPedidosactual);
    var grafica = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
//                        showAllTooltips: true,
            title: {
                display: true,
//						text: 'Chart.js Bar Chart'
            }, tooltips: {
                yAlign: 'bottom',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function (tooltipItem, data) {
                        return 'Ticket Promedio: ' + data['datasets'][0]['data'][tooltipItem['index']];
                    },
//                              afterLabel: function(tooltipItem, data) {
//                                var dataset = data['datasets'][0];
////                                        var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)
//                                return 'Ventas: S/'+data['datasets'][0]['data2'][tooltipItem['index']];
//                              }
//                                        labelColor: function(tooltipItem, chart) {
//                                            return {
//                                                borderColor: 'rgb(255, 0, 0)',
//                                                backgroundColor: 'rgb(255, 0, 0)'
//                                            }
//                                        },
//                                        labelTextColor:function(tooltipItem, chart){
//                                            return '#543453';
//                                        }
                }
            }
        }
    });

};

Helpers.prototype.reportprueba = function (dataMetodos, labelMetodos, iconMetodos) {
//     Chart.pluginService.register({
//  beforeRender: function (chart) {
//    if (chart.config.options.showAllTooltips) {
//
//        chart.pluginTooltips = [];
//        chart.config.data.datasets.forEach(function (dataset, i) {
//            chart.getDatasetMeta(i).data.forEach(function (sector, j) {
//                chart.pluginTooltips.push(new Chart.Tooltip({
//                    _chart: chart.chart,
//                    _chartInstance: chart,
//                    _data: chart.data,
//                    _options: chart.options.tooltips,
//                    _active: [sector]
//                }, chart));
//            });
//        });
//
//        chart.options.tooltips.enabled = false;
//    }
//},
//  afterDraw: function (chart, easing) {
//    if (chart.config.options.showAllTooltips) {
//        if (!chart.allTooltipsOnce) {
//            if (easing !== 1)
//                return;
//            chart.allTooltipsOnce = true;
//        }
//
//        chart.options.tooltips.enabled = true;
//        Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
//            tooltip.initialize();
//            tooltip.update();
//            tooltip.pivot();
//            tooltip.transition(easing).draw();
//        });
//        chart.options.tooltips.enabled = false;
//    }
//  }
//});
    var config = {
        type: 'pie',
        data: {
            datasets: [dataMetodos],
            labels: labelMetodos,
            icons: iconMetodos,
        },
        options: {
            responsive: true,
            showAllTooltips: true,
            legend: {
                display: false,
                position: 'left',
                labels: {
                    fontColor: '#0f0'
                }
            }, tooltips: {
                yAlign: 'bottom'
            },
            legendCallback: function (chartx) {
                var legendHtml = [];
                legendHtml.push('<ul>');
                var item = chartx.data.datasets[0];
                for (var i = 0; i < item.data.length; i++) {
                    if (i == 0) {
//                        console.log(item);
//                        console.log(item.data);
//                        console.log(chartx.data);
                    }

                    legendHtml.push('<center><li>');
                    legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[i] + '"></span>');
                    legendHtml.push('<span class="chart-legend-label-text"><i class="' + chartx.data.icons[i] + '" aria-hidden="true" title="' + chartx.data.labels[i] + '" style="font-size: 34px;color: ' + item.backgroundColor[i] + ';"></i></span>');
                    legendHtml.push('</li></center>');
                }

                legendHtml.push('</ul>');
                return legendHtml.join("");
            }
        }
    };

    var pieChartContent = document.getElementById('pieChartContent');
    pieChartContent.innerHTML = '&nbsp;';
    $('#pieChartContent').append('<canvas id="myChart" style="height:250px;"><canvas>');

    var ctx = document.getElementById('myChart').getContext('2d');
//    this.chartplugin();
    var grafica = new Chart(ctx, config);

    document.getElementById('chartLegend').innerHTML = grafica.generateLegend();
};

Helpers.prototype.reportezonas = function (dataMetodos) {
//    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
//    var pieChart = new Chart(pieChartCanvas)
//    var PieData = dataMetodos
//
//    var pieOptions = {
//        //Boolean - Whether we should show a stroke on each segment
//        segmentShowStroke: true,
//        //String - The colour of each segment stroke
//        segmentStrokeColor: '#fff',
//        //Number - The width of each segment stroke
//        segmentStrokeWidth: 2,
//        //Number - The percentage of the chart that we cut out of the middle
//        percentageInnerCutout: 50, // This is 0 for Pie charts
//        //Number - Amount of animation steps
//        animationSteps: 100,
//        //String - Animation easing effect
//        animationEasing: 'easeOutBounce',
//        //Boolean - Whether we animate the rotation of the Doughnut
//        animateRotate: true,
//        //Boolean - Whether we animate scaling the Doughnut from the centre
//        animateScale: false,
//        //Boolean - whether to make the chart responsive to window resizing
//        responsive: true,
//        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
//        maintainAspectRatio: true,
//        //String - A legend template
//        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
//    }
//    //Create pie or douhnut chart
//    // You can switch between pie and douhnut using the method below.
//    pieChart.Doughnut(PieData, pieOptions)
};

Helpers.prototype.reportedistritos = function (dataDistritos) {
    var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
    var pieChart = new Chart(pieChartCanvas)
    var PieData = dataDistritos

    var pieOptions = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth: 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //String - A legend template  
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
};

Helpers.prototype.filter0 = function (event) {
    var elem = $(event.target);
    var valor = elem.val();

    $('#form_exportable div.filters').css('display', 'none').find('.filtersi').prop('disabled', true);

    if (parseInt(valor) === 0) {
        this.tables['table_pedidos'].ajax.reload();
        return false;
    }

    var content_filter = $('#content_filter_' + valor);
    var filter = $('#filter_' + valor);

    content_filter.css('display', 'inline-block');
    filter.prop('disabled', false);
};

Helpers.prototype.filterss = function () {
    this.tables['table_pedidos'].ajax.reload();
};