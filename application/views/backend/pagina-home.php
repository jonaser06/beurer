<!DOCTYPE html>
<html>
    <head>
        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
        <style>
            .tabs-left{

            }
            .my-fixed-item {
                position: fixed;
                min-height: 120px;
                width: 252px;
                text-align: right;
                word-wrap: break-word;
                /*background-color: aquamarine;*/
            }
            .tabs-left .nav-tabs{
                border-right: 1px solid #ddd;
                border-bottom: 0;
            }
            .tabs-left .nav {
                height: 100%;
                padding-bottom: 50%;
                padding-top: 5px;
            }
            .tabs-left .nav-tabs>li {
                float: left;
                width: 100%;
                margin-bottom: 2px;
            }
            .tabs-left .nav-tabs>li.active {
                border-left: solid 3px #3c8dbc;
            }
            .tabs-left .nav>li>a {

            }
            .tabs-left .nav-tabs>li>a:hover {
                border-color: #eee #ddd #eee #eee;
            }
            .tabs-left .nav>li>a:focus, .tabs-left .nav>li>a:hover {
                text-decoration: none;
                background-color: #eee;
            }
            .tabs-left .nav-tabs>li.active>a, .tabs-left .nav-tabs>li.active>a:focus, .tabs-left .nav-tabs>li.active>a:hover{
                border-color: #ddd;
                border-right-color: transparent;
                border-left: 0;
                background-color: #fff;
            }
            .tabs-left .nav-tabs>li>a {
                margin-right: -1px;
                border-radius: 0;
            }
            div.pull-right2{
                position: absolute;
                top: 10px;
                right: 30px;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper" style="width:100%;height:100%">
            <!-- Main Header -->
            <?= $this->load->view('backend/chunks/header', array(), TRUE) ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?= $this->load->view('backend/chunks/sidebar', array(), TRUE) ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                
                <section class="content-header">
                    <h1>
                        <?= ($permiso['ver']==1) ? $titulo :''?>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php if($permiso['ver']==1){?>
                    <div class="nav-tabs-custom" style="box-shadow: none;">
                        
                        <ul class="nav nav-tabs">
                            
                            
                                <!-- <li><a href="#tab_categoria" data-toggle="tab">Categoría</a></li> -->
                            
                            <?php if (!empty($variables)) { ?>
                                <li class="active"><a href="#tab_variables" data-toggle="tab">Variables</a></li>
                            <?php } ?>
                            <li class="<?= (empty($variables))?'active':'' ?>"><a href="#tab_pagina" data-toggle="tab">SEO</a></li>
                            <li><a href="#tab_facebook" data-toggle="tab">Facebook</a></li>
                            <?php
                            if (!empty($tabs)) {
                                foreach ($tabs as $key => $tab) {
                                    ?>
                                    <li><a href="#tab_<?= clearString($tab['tabname']); ?>" data-toggle="tab"><?= $tab['tabname']; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <div class="tab-content">
                            <!-- <div class="tab-pane" id="tab_categoria">
                                <form id="inputs_categoria" action="manager/paginas/savecategoria" method="post">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="pagetitle" data-toggle="tooltip" data-placement="bottom">
                                                    Nombre de categoría 
                                                </label>
                                                <input type="text" class="form-control" name="categorias[categoria]" id="categoriajm" value="<?= isset($categoria['categoria']) ? $categoria['categoria'] :''?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="meta_description" data-toggle="tooltip" data-placement="bottom">
                                                    Frase
                                                </label>
                                                <input type="text" class="form-control" name="categorias[frase]" id="frasejm" value="<?= isset($categoria['frase']) ? $categoria['frase'] :''?>">
                                                <input type="hidden" class="form-control" name="categorias[idcategoria]" value="<?= isset($categoria['idcategoria']) ? $categoria['idcategoria'] :''?>">
                                                <input type="hidden" class="form-control" name="categorias[idsitemap]" value="<?= isset($categoria['idsitemap']) ? $categoria['idsitemap'] :''?>">
                                            </div>
                                            
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="meta_keyword" data-toggle="tooltip" data-placement="bottom">
                                                    Color
                                                </label>
                                                <input type="text"  class="form-control my-colorpicker1 colorpicker-element" name="categorias[color]" id="colorjm" value="<?= isset($categoria['color']) ? $categoria['color'] :''?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12" style="padding-top:20px;">
                                            <button type="button" class="btn btn-warning btn-flat pull-right botonjm" style="margin-right:20px;"><i class="glyphicon glyphicon-share-alt"></i> Volver</button>
                                            <button type="submit" class="btn btn-primary btn-flat pull-right" style="margin-right:20px;"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                                        </div>
                                    </div>

                              <input type="hidden" class="form-control" name="sitemap-idsitemap" value="<!?= isset($recurso['sitemap-idsitemap']) ? $recurso['sitemap-idsitemap'] : ''; ?>">
                                    <input type="hidden" class="form-control" name="sitemap-idrecurso" value="<!?= isset($recurso['sitemap-idrecurso']) ? $recurso['sitemap-idrecurso'] : ''; ?>">
                                    <input type="hidden" class="form-control" name="recursos-idrecurso" value="<!?= isset($recurso['recursos-idrecurso']) ? $recurso['recursos-idrecurso'] : ''; ?>">
                                </form>
                            </div> -->
                            <div class="tab-pane <?= (empty($variables))?'active':'' ?>" id="tab_pagina">
                                <form id="inputs_pagina" action="manager/paginas/saveedit/" method="post">
                                    <div class="row">
                                        
                                        <input type="hidden" name="sitemap[idsitemap]" value="<?= isset($datapagina['idsitemap']) ? $datapagina['idsitemap'] :'' ?>">
                                        
										<div class="col-xs-12">
											<h4 style="text-align:center"><b>Texto en Español</b></h4>
                                            <div class="col-xs-12">
												<div class="form-group">
													<label for="pagetitle" data-toggle="tooltip" data-placement="bottom" title="Título de página para las pestañas de los navegadores">
														Título de la página <small style="color:#A9A9A9"> 60-67 caracteres como máximo</small>
													</label>
													
													<input type="text" id="recursos-pagetitle" class="form-control" name="sitemap[pagetitle]" value="<?= isset($datapagina['pagetitle']) ? $datapagina['pagetitle'] :'' ?>">
												</div>
                                            </div>
                                            <div class="col-xs-12"></div>
                                            <div class="col-xs-12">
												<div class="form-group">
													<label for="sitemap-menutitle" data-toggle="tooltip" data-placement="bottom" title="Título para mostrar en los menus">
														Meta Descripción <small style="color:#A9A9A9"> 150-155 caracteres como máximo</small>
													</label>													
													<textarea class="form-control" id="meta_descriptio" name="sitemap[meta_description]" rows="3"><?= isset($datapagina['meta_description']) ? $datapagina['meta_description'] :'' ?></textarea>
												</div>
                                            </div>
                                            <div class="col-xs-12">
												<div class="form-group">
													<label for="orden" data-toggle="tooltip" data-placement="bottom" title="Url">													
														Meta palabras clave
													</label>
													<textarea class="form-control" name="sitemap[meta_keyword]" id="recursos-meta_keyword" rows="3"><?= isset($datapagina['meta_keyword']) ? $datapagina['meta_keyword'] :'' ?></textarea>
												</div>
                                            </div>
                                           
                                                                                                                                  
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12" style="padding-top:20px;">
                                            <button type="button" class="btn btn-warning btn-flat pull-right botonjm" style="margin-right:20px;"><i class="glyphicon glyphicon-share-alt"></i> Volver</button>
                                            <button type="submit" class="btn btn-primary btn-flat pull-right" style="margin-right:20px;"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                                        </div>
                                    </div>

<!--                                    <input type="hidden" class="form-control" name="sitemap-idsitemap" value="<!?= isset($recurso['sitemap-idsitemap']) ? $recurso['sitemap-idsitemap'] : ''; ?>">
                                    <input type="hidden" class="form-control" name="sitemap-idrecurso" value="<!?= isset($recurso['sitemap-idrecurso']) ? $recurso['sitemap-idrecurso'] : ''; ?>">
                                    <input type="hidden" class="form-control" name="recursos-idrecurso" value="<!?= isset($recurso['recursos-idrecurso']) ? $recurso['recursos-idrecurso'] : ''; ?>">-->
                                </form>
                            </div>
                            <?php
                            if (!empty($categorias) && !empty($variables)) {
                                ?>
                                <div class="tab-pane active" id="tab_variables">
                                    <form id="inputs_variables" action="manager/paginas/guardar" method="post">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="row tabs-left">
                                                    <div class="col-md-2 col-xs-12 pestanias">
                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($categorias as $key => $categoria) {
                                                                echo '<li role="presentation" class="' . (($i == 0) ? 'active' : '') . '"><a href="#tab_categoria_' . $categoria['idcontenedor'] . '" aria-controls="#tab_categoria_' . $categoria['idcontenedor'] . '" role="tab" data-toggle="tab">' . $categoria['contenedor'] . '</a></li>';
                                                                $i++;
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-10 col-xs-12">
                                                        <div class="tab-content">
                                                            <?php
                                                            $i = 0;
                                                            foreach ($categorias as $key => $categoria) {
                                                                echo '<div role="tabpanel" class="tab-pane ' . (($i == 0) ? 'active' : '') . '" id="tab_categoria_' . $categoria['idcontenedor'] . '">';

                                                                foreach ($variables as $variable) {
                                                                    if ($variable['idcontenedor'] == $categoria['idcontenedor']) {
                                                                        $datai = array(
                                                                            'variable' => $variable
                                                                        );
                                                                        switch ($variable['tipo']) {
                                                                            case 'data':
                                                                                echo $this->load->view('backend/inputs/data', $datai, TRUE);
                                                                                break;
                                                                            case 'datalibro':
                                                                                echo $this->load->view('backend/inputs/datalibro', $datai, TRUE);
                                                                                break;
                                                                            case 'hidden2':
                                                                                echo $this->load->view('backend/inputs/hidden2', $datai, TRUE);
                                                                                break;
                                                                            case 'selectlibro':
                                                                                echo $this->load->view('backend/inputs/selectlibro', $datai, TRUE);
                                                                                break;
                                                                            case 'selectcategoria':
                                                                                echo $this->load->view('backend/inputs/selectcategoria', $datai, TRUE);
                                                                                break;
                                                                            case 'datacuota':
                                                                                echo $this->load->view('backend/inputs/datacuota', $datai, TRUE);
                                                                                break;
                                                                            case 'richtext':
                                                                                echo $this->load->view('backend/inputs/richtext', $datai, TRUE);
                                                                                break;
                                                                            case 'textarea':
                                                                                echo $this->load->view('backend/inputs/textarea', $datai, TRUE);
                                                                                break;
                                                                            case 'image':
                                                                                echo $this->load->view('backend/inputs/image', $datai, TRUE);
                                                                                break;
                                                                            case 'imagejm':
                                                                                echo $this->load->view('backend/inputs/imagejm', $datai, TRUE);
                                                                                break;
                                                                            case 'textjm':
                                                                                echo $this->load->view('backend/inputs/textjm', $datai, TRUE);
                                                                                break;
                                                                            case 'imagejm2':
                                                                                echo $this->load->view('backend/inputs/imagejm2', $datai, TRUE);
                                                                                break;
                                                                            case 'textjm2':
                                                                                echo $this->load->view('backend/inputs/textjm2', $datai, TRUE);
                                                                                break;
                                                                            case 'radio':
                                                                                echo $this->load->view('backend/inputs/radio', $datai, TRUE);
                                                                                break;
                                                                            case 'select':
                                                                                echo $this->load->view('backend/inputs/select', $datai, TRUE);
                                                                                break;
                                                                            case 'hidden':
                                                                                echo $this->load->view('backend/inputs/hidden', $datai, TRUE);
                                                                                break;
                                                                            case 'multiselect':
                                                                                echo $this->load->view('backend/inputs/selectmultiple', $datai, TRUE);
                                                                                break;
                                                                            case 'file':
                                                                                echo $this->load->view('backend/inputs/file', $datai, TRUE);
                                                                                break;
                                                                            case 'video':
                                                                                echo $this->load->view('backend/inputs/video', $datai, TRUE);
                                                                                break;
                                                                            case 'colorpicker':
                                                                                echo $this->load->view('backend/inputs/colorpicker', $datai, TRUE);
                                                                                break;
                                                                            case 'checkbox':
                                                                                echo $this->load->view('backend/inputs/checkbox', $datai, TRUE);
                                                                                break;
                                                                            case 'radio':
                                                                                echo $this->load->view('backend/inputs/radio', $dataix, TRUE);
                                                                                break;
                                                                            case 'date':
                                                                                echo $this->load->view('backend/inputs/date', $datai, TRUE);
                                                                                break;
                                                                            default:
                                                                                echo $this->load->view('backend/inputs/text', $datai, TRUE);
                                                                                break;
                                                                        }
                                                                    }
                                                                }

                                                                echo '</div>';
                                                                $i++;
                                                            }
                                                            ?>
                                                        </div>
                                                        <div style="height:150px;">

                                                        </div>
                                                    </div>
                                                    <!--<div class="clearfix"></div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="pagina" value="<?= $pagina ?>">
                                        <div class="row">
                                            <div class="col-xs-12" style="padding-top:20px;">
                                                <button type="button" class="btn btn-warning btn-flat pull-right botonjm" style="margin-right:20px;"><i class="glyphicon glyphicon-share-alt"></i> Volver</button>
                                                <button type="submit" class="btn btn-primary btn-flat pull-right" style="margin-right:20px;"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                            ?>
                                <div class="tab-pane" id="tab_facebook">
                                
                                <form id="inputs_facebook" action="manager/paginas/saveeditface" method="post">
                                    <div class="row">
                                        <div class="col-xs-6">
											<h4 style="text-align:center"><b>Texto en Español</b></h4>
                                            <div class="form-group">
                                                <label for="og_title" data-toggle="tooltip" data-placement="bottom" title="Título de la página para compartir en Facebook">
                                                    Título Facebook
                                                </label>
                                                <input type="text" class="form-control" name="sitemap[og_title]" id="og_title" value="<?= isset($datapagina['og_title']) ? $datapagina['og_title'] :'' ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="og_description" data-toggle="tooltip" data-placement="bottom" title="Descripción de la página para compartir en Facebook">
                                                    Descripcion Facebook
                                                </label>
                                                <textarea class="form-control" name="sitemap[og_description]" id="recursos-og_description" rows="3"><?= isset($datapagina['og_description']) ? $datapagina['og_description'] :'' ?></textarea>
                                            </div>
                                           
                                        </div>
										<div class="col-xs-6">
											<h4 style="text-align:center"><b>Texto en Ingles</b></h4>
                                            <div class="form-group">
                                                <label for="og_title_en" data-toggle="tooltip" data-placement="bottom" title="Título de la página para compartir en Facebook">
                                                    Title Facebook
                                                </label>
                                                <input type="text" class="form-control" name="sitemap[og_title_en]" id="og_title_en" value="<?= isset($datapagina['og_title_en']) ? $datapagina['og_title_en'] :'' ?>">
                                                <input type="hidden" class="form-control" name="sitemap[idsitemap]" id="idsitemap" value="<?= isset($datapagina['idsitemap']) ? $datapagina['idsitemap'] :'' ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="og_description_en" data-toggle="tooltip" data-placement="bottom" title="Descripción de la página para compartir en Facebook">
                                                    Description Facebook
                                                </label>
                                                <textarea class="form-control" name="sitemap[og_description_en]" id="recursos-og_description" rows="3"><?= isset($datapagina['og_description_en']) ? $datapagina['og_description_en'] :'' ?></textarea>
                                            </div>                                         
                                        </div>
										<div class="col-xs-12">
											<div class="form-group">
                                                <label for="og_imagen">Image facebook </label>
                                                <small style="color: #999;">Dimensiones: 600 x 315px como mínimo.</small>
                                                <div class="input-group">
                                                    <input type="text" id="camp14" name="sitemap[og_imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($datapagina['og_imagen']) ? $datapagina['og_imagen'] :'' ?>">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('camp14', '', '<?= $this->config->item('akey'); ?>');">
                                                            <span class="glyphicon glyphicon-picture"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div style="display: table; width: 100%;">
                                                    <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                                        <img src="<?= isset($datapagina['og_imagen']) ? $datapagina['og_imagen'] :'' ?>" id="camp14-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
                                                    </div>
                                                </div>
                                            </div>
										</div>
                                    </div>
									
                                    <div class="row">
                                        <div class="col-xs-12"  style="padding-top:20px;">
                                            <button type="button" class="btn btn-warning btn-flat pull-right botonjm" style="margin-right:20px;"><i class="glyphicon glyphicon-share-alt"></i> Volver</button>
                                            <button type="submit" class="btn btn-primary btn-flat pull-right" style="margin-right:20px;"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                                        </div>
                                    </div>
                                </form>
								
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
                            </div>
                            <?php
                            if (!empty($tabs)) {
                                foreach ($tabs as $key => $tab) {
                                    ?>
                                    <div class="tab-pane" id="tab_<?= clearString($tab['tabname']); ?>">
                                        <?= $this->load->view($tab['tabview'], array(), TRUE); ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <?= $this->load->view('backend/chunks/footer', array(), TRUE) ?>
                        </div>
                <!-- /.content -->
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            
        <!-- ./wrapper -->

        <?= $this->load->view('backend/chunks/modalLoading', array(), TRUE) ?>

        <!-- REQUIRED JS SCRIPTS -->
        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>
        
        <?php
        if (!empty($tabs)) {
            foreach ($tabs as $key => $tab) {
                if (isset($tab['tabcss']) && !empty($tab['tabcss'])) {
                    echo '<link type="text/css" href="' . $tab['tabcss'] . '" rel="stylesheet" property="stylesheet">';
                }

                if (isset($tab['tabjs']) && !empty($tab['tabjs'])) {
                    echo '<script type="text/javascript" src="' . getFilex($tab['tabjs']) . '"></script>';
                    echo '<script type="text/javascript">';
                    echo '$(document).ready(function(){Exeperu.tab_' . clearString($tab['tabname'], '_') . '(\'' . $this->config->item('akey') . '\', ' . (isset($tab['idtipo']) ? $tab['idtipo'] : '') . ');});';
                    echo '</script>';
                }
            }
        }
        ?> 
        <script>
            $(document).ready(function () {
                
                $('.tabs-left a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    var tab_content = $(e.target.hash);
                    var tab_content_height = tab_content.height();

                    $(e.target).parents('div.pestanias').css({height: tab_content_height});
                });
                
                $(".my-colorpicker1").colorpicker();
                
                $(".botonjm").click(function(e){
                   e.preventDefault();
                   window.location.href="manager/paginas";
                });
                
                $("#inputs_pagina").submit(function(e){
                   e.preventDefault();
                   $.ajax({
                      url:$(this).attr('action'),
                      type:$(this).attr('method'),
                      data:$(this).serialize(),
                      success:function(response){
                            var jm=JSON.parse(response);
                    
                            if(jm.tipo==1){
                                toastr.success(jm.mensaje,{timeOut:2000});
                                setTimeout("location.href='manager/paginas/0/0/"+jm.idpagina+"'", 2000);
//                                window.location.href="manager/perfil/editar";
                            }else{
                                toastr.error(jm.mensaje,{timeOut:2000});
                                var errores=JSON.parse(jm.errores); 
                                $.each( errores, function( key, value ) {
                                    $("#"+value+"").parent().addClass("has-error");
                                });
                                var jmjm=JSON.parse(jm.jm); 
                                $.each( jmjm, function( key, value ) {
                                    $("#"+value+"").parent().removeClass();
                                });
                            } 
                      }
                   });
                });
                
                $("#inputs_variables").submit(function(e){
                   e.preventDefault();
                   $.ajax({
                      url:$(this).attr('action'),
                      type:$(this).attr('method'),
                      data:$(this).serialize(),
                      success:function(response){
                        var jm=JSON.parse(response);
                        toastr.success(jm.mensaje,{timeOut:2000});
                        setTimeout("location.href='manager/paginas/0/0/"+jm.idpagina+"'", 2000);
                      }
                   });
                });
                
                $("#inputs_facebook").submit(function(e){
                   e.preventDefault();
                   $.ajax({
                      url:$(this).attr('action'),
                      type:$(this).attr('method'),
                      data:$(this).serialize(),
                      success:function(response){
                            var jm=JSON.parse(response);
                            toastr.success(jm.mensaje,{timeOut:2000});
                            setTimeout("location.href='manager/paginas/0/0/"+jm.idpagina+"'", 2000);
                      }
                   });
                });
                
                $("#inputs_categoria").submit(function(e){
                   e.preventDefault();
                   $.ajax({
                      url:$(this).attr('action'),
                      type:$(this).attr('method'),
                      data:$(this).serialize(),
                      success:function(response){
                            var jm=JSON.parse(response);
                            toastr.success(jm.mensaje,{timeOut:2000});
                            setTimeout("location.href='manager/paginas/0/0/"+jm.idpagina+"'", 2000);
                      }
                   });
                });
            });
        </script>
    </body>
</html> 