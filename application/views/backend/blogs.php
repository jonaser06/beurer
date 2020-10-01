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
                        Administrador de Artículos
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
                                            <label>Categoría : </label>
                                            <select class="form-control" name="idcategoria" id="formulariojm">
                                                <option value="0">Todas</option>
                                                <?php foreach($categorias as $categoria){?>
                                                <option value="<?= $categoria['idcategoria']?>"><?= $categoria['categoria']?></option>
                                                <?php }?>
                                            </select>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                            <div class="nav-tabs-custom">
                                <?php if($permiso['editar']==1){?>
                                <a href="javascript: Exeperu.addBlog()" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                <?php }?>
                                <table id="table_blogs" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Imagen</th>
                                            <th>Autor</th>
                                            <th>Usuario</th>
                                            <th>Categoría</th>
                                            <th>Fecha</th>
                                            <!--<th>Orden</th>-->
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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

        <!-- REQUIRED JS SCRIPTS -->
        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>

        <script src="<?= getFilex('mgr/exeperu/js/blogs.js') ?>"></script>

        <script>
            $(document).ready(function () {
                Exeperu.init({
                    'url': 'manager/articulos/read'
                });
//                toastr.success('Registrado correctamente',{timeOut:3000});
            });
        </script>
    </body>
</html>