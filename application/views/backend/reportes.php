<!DOCTYPE html>
<html>
    <head>
        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <?= $this->load->view('backend/chunks/header', array(), TRUE) ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?= $this->load->view('backend/chunks/sidebar', array(), TRUE) ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <section class="content-header">
                    <?php if($permiso['ver']==1){?>
                    <h1>
                        Administrador de Reportes
                    </h1>
                    <?php }?>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <?php if($permiso['ver']==1){?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!--<h3 class="box-title">Filtrar</h3>-->
                            <div class="container">
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="section_reportes"></div>
                            <div class="row">
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" id="select-report">
                                            <option value="1" selected>Clientes y Compras</option>
                                            <option value="2">Seguimiento de Compras</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="#" class="btn btn-sm btn-success btn-block" onclick="ObjReclamos.get_report(event);">Buscar</a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <form action="<?= base_url(); ?>ajax/reportexsl" method="POST">
                                        <input type="hidden" name="fecha" class="fecha_reclamo">
                                        <button type="submit" class="btn-sbmt-exp btn btn-sm btn-success btn-block">Exportar</button>
                                    </form>
                                </div>
                            </div>

                            <div class="nav-tabs-custom">
                                <br><br>
                                <table id="table_suscriptores" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Pedido</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Fecha</th>
                                            <th>Producto</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table_reclamos"></tbody>
                                </table>
                            </div>
                            <div class="dataTables_paginate paging_simple_numbers" id="table_subcategory_paginate">
                                <ul class="pagination"></ul>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
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

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?= $this->load->view('backend/chunks/footer', array(), TRUE) ?>
        </div>
        <!-- ./wrapper -->

        <?= $this->load->view('backend/chunks/modalLoading', array(), TRUE) ?>

        <script src="<?= getFilex('mgr/exeperu/js/reclamos.js') ?>?v2"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="mgr/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script>
            $('#reservation').daterangepicker(
                {
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                }
            )
        </script>

    </body>
</html>