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
                        Reporte de Nodedades: 
                        <small>PERSONAS QUE DIERON CLICK EN EL CHECK QUIERO RECIBIR NOVEDADES EN RPOCESO DE COMPRA</small>
                    </h1>
                </section>
                <?php }?>
                <!-- Main content -->
                <section class="content container-fluid">
                <?php if(! in_array($modulo['idmodulo'],$modulosjm)){
                ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!--<h3 class="box-title">Filtrar</h3>-->
                            <div class="container">
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <table id="table_novedades" class="table table-bordered table-striped table-hover nowrap dataTable dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th style="display: flex;align-items:center"><i style="color:#C51152;margin: 0 10px;font-size:22px" class="fa fa-envelope-square "></i>Correo</th>
                                            <th>Tipo Cliente</th>
                                            <th style="display: flex;align-items:center"><i style="color:#C51152;margin: 0 10px;font-size:18px" class="fa fa-check"></i>N° de veces check</th>
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

       <script src="<?= getFilex('mgr/exeperu/js/ofertas.js')?>"></script>
        
        <script>
           
            let table = $('#table_novedades').DataTable({
            "ajax": "manager/novedades/getNovedades",
                "columns": [
                    { "data": "nombres" , 'render' : function (data ,type , row) {
                        return `${row.nombres} ${row.apellidos}`
                    } },
                    { "data": "correo" ,'render' : function (data , type , row ) {
                    
                        return `<span>
                                ${data}</span>`;
                    }},
                    { "data": "id_session" , 'render' : function (data , type , row ) {
                        let salida = '';
                        $data = parseInt(data)
                        
                            switch (data) {
                            case '0':
                                salida = `<i class="fa fa-user" style="margin-right:7px" aria-hidden="true"></i> Invitado`;
                                break;
                        
                            default:
                                salida= `<i class="fa fa-user" style="color:#C51152;margin-right:7px" aria-hidden="true"></i> Autenticado`;;
                                break;
                        
                        
                        }
                        return salida;
                    } },
                    {"data": "checked" , 'render' : function(data,type,row) {
                        return `<span style="width:100% ;display:flex;juntify-content:center;font-weight:bold">${data}</span>`;
                    }}
                   
                ]
            });
            
          

        </script>

    
    </body>
</html>