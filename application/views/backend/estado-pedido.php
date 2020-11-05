<!DOCTYPE html>
<html>
    <head>
        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        Administrador de estados de los Pedidos
                    </h1>
                </section>
                <?php }?>
                <!-- Main content -->
                <section class="content container-fluid">
                <?php if(in_array($modulo['idmodulo'],$modulosjm)){
                ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!--<h3 class="box-title">Filtrar</h3>-->
                            <div class="container">
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <table id="table_pedido_estado" class="table table-bordered table-striped table-hover nowrap dataTable dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                            <th>Código Pedido</th>
                                            <th>Comprador</th>
                                            <th>Tipo de Entrega</th>
                                            <th>Estado</th>
                                            <th></th>
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

       <script src="<?= getFilex('mgr/exeperu/js/estadoPedidos.js')?>"></script>
        <script>
          
        </script> 
        <script>
            
            let table = $('#table_pedido_estado').DataTable({
            "ajax": "manager/pedidos/getPedidos",
                "columns": [
                    { "data": "codigo" },
                    { "data": "nombres" , 'render' : function (data ,type , row) {
                        return `${row.nombres} ${row.apellidos}`
                    } },
                    { "data": "recojo" ,'render' : function (data , type , row ) {
                        
                        if(parseInt(data)){
                            return `<span class="label label-success"><i class="fa fa-shopping-bag ml-4" aria-hidden="true"></i>
                            Tienda</div>`
                        }
                        return `<span class="label label-warning"><i class="fa fa-truck" aria-hidden="true ml-4"></i>
                                Envio</span>`;
                    }},
                    { "data": "pedido_estado" , 'render' : function (data , type , row ) {
                        let salida = '';
                        
                        if(parseInt(row.recojo)) {
                            switch (data) {
                            case '1':
                                salida = '<span class="label"style="background-color:#C51152">Orden generada</span>';
                                break;
                            case '2':
                                salida = '<span class="label"style="background-color:#C51152">Preparando el Pedido</span>';
                                break;
                            case '3':
                                salida = '<span class="label"style="background-color:#C51152">Listo en tienda</span>';
                                break;
                            default:
                                salida= '<span class="label"style="background-color:#C51152"></span>';
                                break;
                        }
                        }else{
                            switch (data) {
                            case '1':
                                salida = '<span class="label"style="background-color:#C51152">Orden generada</span>';
                                break;
                            case '2':
                                salida = '<span class="label"style="background-color:#C51152">Preparando Pedido</span>';
                                break;
                            case '3':
                                salida = '<span class="label"style="background-color:#C51152">Listo para recojo</span>';
                                break;
                            case '4':
                                salida = '<span class="label"style="background-color:#C51152">Pedido Entregado</span>';
                                break;
                            default:
                                salida= '<span class="label"style="background-color:#C51152">Completado</span>';
                                break;
                        }
                        }
                        return salida;
                    } },
                    { "data": "id_pedido", 'render': function(data, type, row){
                       let salida;
                        salida = "<a href=\"javascript:Exeperu.editEstado("+data+");\" class=\"btn btn-primary btn-sm btn-flat\"><i class=\"fa fa-pencil\"></i></a>";
                        
                        return  salida;
                    } },
                ]
            });
            
           class TableEstados {
                constructor(  ) {
                    
                }
                 addEstado() {
                     
                 }
           }

        </script>

    
    </body>
</html>