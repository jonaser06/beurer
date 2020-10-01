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
                        Correos recibidos
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
                            <div class="row">
                                <form id="form_exportablemod" action="" method="post" target="_blank">
                                    <div class="col-xs-2">
                                        <div class="form-group">
                                            <label>Ver : </label>
                                            <select class="form-control" name="formulario" id="formulariojm">
                                                <option value="1">Contactos</option>
                                                <option value="2">Cotizaciones</option>
                                            </select>
                                        </div> 
                                    </div>
                                <?php if($permiso['editar']==1){?>
                                    <div class="col-sm-2" style="width:130px;">
                                        <label for="">Generar excel</label>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-flat" id="btnexportar">
                                                Exportar <i class="glyphicon glyphicon-download-alt"></i>
                                            </button>
                                         
                                        </div>
                                    </div>
                                <?php } ?>
                                </form>
                            </div>
                            <!--<a href="javascript: Exeperu.addMarca()" class="btn btn-sm btn-info btn-flat"> Agregar <i class="glyphicon glyphicon-plus"></i></a><br><br>-->
                            <table id="table_correos" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <!--                        <div class="box-footer">
                                                    
                                                </div>-->
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

        <!-- REQUIRED JS SCRIPTS -->
        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>

        <script src="<?= getFilex('mgr/exeperu/js/correos.js') ?>"></script>

        <script>
            $(document).ready(function () {
                Exeperu.init({
//                    'akey': '$this->config->item('akey')',
                    'url': 'manager/correos/read'
                });
                
                $("#btnexportar").click(function(e){
                   e.preventDefault();
                   var tipo=$("#formulariojm").val();
                   window.open('manager/correos/exportar?tipo='+tipo,'_blank');
                });

            });
        </script>
    </body>
</html>