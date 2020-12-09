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
                        Reporte de Novedades
                       
                    </h1>
                </section>
                <?php }?>
                <!-- Main content -->
                <section class="content container-fluid">
                <?php if( in_array($modulo['idmodulo'],$modulosjm)){
                ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><small style="margin-bottom:3rem">PERSONAS QUE DIERON CLICK EN EL CHECK QUIERO RECIBIR NOVEDADES EN EL PROCESO DE COMPRA</small>
</h3>
                            <div class="container">
                              
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <table id="table_novedades" class="table table-bordered table-striped table-hover nowrap dataTable dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                        <!-- <i style="color:#C51152;margin: 0 10px;font-size:22px" class="fa fa-envelope-square "></i> -->
                                        <!-- <i style="color:#C51152;margin: 0 10px;font-size:18px" class="fa fa-check"> -->
                                            <th>Nombres</th>
                                            <th style="display: flex;align-items:center">Correo</th>
                                            <th>Tipo Cliente</th>
                                            <th style="display: flex;align-items:center">N° de veces check</i></th>
                                            
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
    
       <style>
           #table_novedades tr {
               font-weight: bold;
           }
       </style>
             <!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js
"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js
"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js
"></script>
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
                        return `<span style="width:100% ;display:flex;juntify-content:center;color:#C51152; font-weight:bold"><i style="color:#C51152;margin: 0 10px;font-size:17px" class="fa fa-check"></i>${data}</span>`;
                    }}
                   
                ],dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ], 
            });
            
        

        </script>

    
    </body>
</html>