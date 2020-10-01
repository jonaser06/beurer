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
                    <?php if($permiso['ver']==1){ ?>
                    <h1>
                        Administrador de Videos
                    </h1>
                    <?php } ?>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <?php if($permiso['ver']==1){ ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!--<h3 class="box-title">Filtrar</h3>-->
                            <div class="container"></div>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom">
								<div class="tab-content">
									<ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
											<a href="#vvideos" aria-controls="home" role="tab" data-toggle="tab">Videos</a>
										</li>
                                        <li role="presentation">
											<a href="#vcategorias" aria-controls="profile" role="tab" data-toggle="tab">Categorias</a>
										</li>                                      
                                    </ul>
									
									<div role="tabpanel" class="tab-pane active" id="vvideos"><br>
										<?php if($permiso['editar']==1){?>
										<a href="javascript: Exeperu.addVideo()" class="btn btn-xs btn-info btn-flat">
											<i class="glyphicon glyphicon-plus"></i> Agregar
										</a>
										<br><br>
										<?php } ?>
										<table id="table_videos" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Titulo</th>
													<th>Descripción</th>
													<th>Imagen</th>
													<th>Estado</th>
													<th></th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
									<div role="tabpanel" class="tab-pane" id="vcategorias"><br>
                                        <a href="javascript: Exeperu.addCategoria()" class="btn btn-sm btn-info btn-flat">
										<i class="glyphicon glyphicon-plus"></i> Agregar
										</a>
										<br><br>
                                        <table id="table_categorias" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <!--<th>Idtipo.</th>-->
                                                    <th>Tipo</th>
                                                    <th>Orden</th>
                                                    <th>Estado</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
									
								</div>	
                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">
								<strong>NO TIENES ACCESO A ESTE MÓDULO</strong>
							</h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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

        <script src="<?= getFilex('mgr/exeperu/js/videos.js') ?>"></script>

        <script>
            $(document).ready(function () {
                Exeperu.init({
                    'url': 'manager/videos/read',
                    'dcat': 'manager/videos/readcategoria'
                });
            });
        </script>
    </body>
</html>