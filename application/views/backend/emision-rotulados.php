<!DOCTYPE html>
<html>
    <head>
        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?= $this->load->view('backend/chunks/header', array(), TRUE) ?>
            <?= $this->load->view('backend/chunks/sidebar', array(), TRUE) ?>

            <div class="content-wrapper">
              <?php 
                $uri = $this->uri->segment_array();
                $modulo = $this->sistema->getModulo($uri[2]);

                if(in_array( $modulo['idmodulo'] , $modulosjm)){
              ?>
                <section class="content-header">
                    <h1>
                        Módulo emisión de rotulados
                    </h1>
                </section>
                <?php }?>
                <!-- Main content -->
                <section class="content container-fluid">
                <?php if(in_array($modulo['idmodulo'],$modulosjm)){
                ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">EN ESTE MÓDULO PODRA EMITIR ROTULADOS , CON UN CÓDIGO DE BARRAS UNICO </h3>
                            <div class="container">
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <table id="table_rotulados" class="table table-bordered table-striped table-hover nowrap dataTable dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                            <th>Código Compra</th>
                                            <th>Fecha de compra</th>
                                            <th>DNI</th>
                                            <th>Tipo de Entrega</th>
                                            <th>Rotulados</th>
                                            <th>factura</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }else {?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong>NO TIENES ACCESO A ESTE MÓDULO</strong></h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                    </div>
                <?php }?>
                </section>

            </div>

            <!-- Main Footer -->
            <?= $this->load->view('backend/chunks/footer', array(), TRUE) ?>
        </div>

        <?= $this->load->view('backend/chunks/modalLoading', array(), TRUE) ?>

        <!-- REQUIRED JS SCRIPTS -->
        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>

        <script>
            
            let table = $('#table_rotulados').DataTable({
                "order": [[ 1, "desc" ]],
                responsive: true,
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                "scrollCollapse": true,
                "order": [[ 1, "desc" ]],
            "language"    :{"search":"Buscar", "zeroRecords":"Sin Resultados Coincidentes"},
            "ajax": "manager/pedidos/getPedidos",
                "columns": [
                    { "data": "codigo", 'render' : function (data) {
                        return data.toUpperCase();
                    } },
                    { "data": "pedido_fecha", 'render' : function (data) {
                        return data;
                    } }
                    ,
                    { "data": "numero_documento" }
                    ,
                    { "data": "recojo" ,'render' : function (data , type , row ) {
                        
                        if(parseInt(data)){
                            return `<span class="label label-success"><i class="fa fa-shopping-bag ml-4" aria-hidden="true"></i>
                            Tienda</div>`
                        }
                        return `<span class="label label-warning"><i class="fa fa-truck" aria-hidden="true ml-4"></i>
                                Envio</span>`;
                    }},
                    
                    { "data": "id_pedido", 'render': function(data, type, row){
                       let salida;
                       let code = row.codigo;
                        
                        salida = `<a href="<?= base_url('rotulado/${code}/0')?>" class="rotuladoDown" >DESCARGAR</a>
                        <a target="_blank"href="<?= base_url('rotulado/${code}/show')?>" class="rotuladoDown " style="margin: 0 10px" >Ver detalles</a>
                        `;
                        return  salida;
                    } },
                    { "data": "nombres", 'render': function(data, type, row){
                       let salida;
                       let code = row.codigo;
                        
                        salida = `<a href="<?= base_url('pdf/${code}/0')?>" class="rotuladoDown" >DESCARGAR</a>
                        <a target="_blank"href="<?= base_url('pdf/${code}/show')?>" class="rotuladoDown " style="margin: 0 10px" >Ver detalles</a>
                        `;
                        return  salida;
                    } },
                    
                ]
            });
            
         

        </script>

    <style>
        .rotuladoDown {
            font-size:1rem;
    margin: 8px auto;
    border-radius: 10px;
    color: #C51152;
    border: 1.4px solid #C51152;
    padding:4px 7px;
    transition: .3s all ease-in;
}

.rotuladoDown:hover {
    background-color: #C51152;
    color: #fff;
}
    </style>
    </body>
</html>