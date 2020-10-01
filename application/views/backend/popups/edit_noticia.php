<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarnoticia" action="manager/noticias/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
            <h4><strong>Noticias</strong></h4>
            <style>
                .form-group.required .control-label:after {
                        color: #d00;
                        content: "*";
                        position: absolute;
                        margin-left: 8px;
                        top:2px;
                  }
            </style>
        </div>
        <div class="modal-body">
            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;" id="tabs">
                <li role="presentation" class="active">
                    <a href="#sdetalle" aria-controls="detalle" role="tab" data-toggle="tab">Detalle</a>
                </li>
                <li>
                    <a href="#sdatos" aria-controls="descripcion" role="tab" data-toggle="tab">Descripción</a>
                </li>
				<li>
					<a href="#sseo" aria-controls="banner" role="tab" data-toggle="tab">Seo</a>
				</li>
				<li>
					<a href="#sface" aria-controls="banner" role="tab" data-toggle="tab">Facebook</a>
				</li>
               
            </ul>
            <div class="tab-content">
			<?php
				if (isset($noticia['fecha']) && $noticia['fecha'] != '0000-00-00 00:00:00') {
					$fecin = (new DateTime($noticia['fecha']))->format('d/m/Y H:i:s');
				} else {
					$fecin = '';
				}

            ?>

                <div role="tabpanel" class="tab-pane active" id="sdetalle">
                    <div class="container-fluid">
						<div class="row">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group required">
											<label class="control-label">Titulo</label>
											<input type="text" class="form-control" id="titulo" name="noticia[titulo]" placeholder="Ingrese el titulo" value="<?= isset($noticia['titulo']) ? $noticia['titulo'] : ''; ?>" >
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group required">
											<label class="control-label">Titulo Ingles</label>
											<input type="text" class="form-control" id="titulo_en" name="noticia[titulo_en]" placeholder="Ingrese el titulo" value="<?= isset($noticia['titulo_en']) ? $noticia['titulo_en'] : ''; ?>" >
										</div>
									</div>
									<!--<div class="col-xs-7">
										<div class="form-group required">
											<label class="control-label">Apellidos</label>
											<input type="text" class="form-control" id="apellidos" name="noticia[apellidos]" placeholder="Ingrese apellidos del autor" value="<?//= isset($autor['apellidos']) ? $autor['apellidos'] : ''; ?>" >
										</div>
									</div>-->
								</div>
				
								<div class="row">
									<div class="col-xs-7">
										<div class="form form-group">
											<label for="campo_4" class="control-label">Imagen <small style="color: #999;">Dimensiones: 1000 x 1000px. </small></label>
											<div class="input-group">
												<input type="text" id="campo_4" id="imagen" name="noticia[imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($noticia['imagen']) ? $noticia['imagen'] : ''; ?>">
												<div class="input-group-btn">
													<button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_4', '', '<?= $this->config->item('akey'); ?>');">
														<span class="glyphicon glyphicon-picture"></span>
													</button>
												</div>
											</div>
											<div style="display: table; width: 100%;">
												<div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
													<img src="<?= isset($noticia['imagen']) ? $noticia['imagen'] : ''; ?>" id="campo_4-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
												</div>
											</div>
										</div>
									</div>
								
									<div class="col-xs-5">
										<div class="form-group required">
											<label for="campo_3-1" class="control-label">Estado</label>
											<select name="noticia[estado]" id="estado" class="form-control">
												<option value="1" <?= ($noticia['estado'] == 1 ? 'selected' : '') ?>>Activo</option>
												<option value="0" <?= ($noticia['estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
											</select>
										</div>
									</div>
								</div>
							
							</div>
							
						</div>
					</div>  
                </div>
                <div role="tabpanel" class="tab-pane" id="sdatos">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_3-1">Descripción</label>
                                    <textarea cols="100" rows="6" name="noticia[descripcion]" class="form-control richtext"><?= isset($noticia['descripcion']) ? $noticia['descripcion'] : ''; ?></textarea>
                                </div>
                            </div>
							<div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_3-1">Descripción Ingles</label>
                                    <textarea cols="100" rows="6" name="noticia[descripcion_en]" class="form-control richtext"><?= isset($noticia['descripcion_en']) ? $noticia['descripcion_en'] : ''; ?></textarea>
                                </div>
                            </div>
							<div class="col-xs-4">
								<div class="form-group" style="width:100%;">
								  
									<input type="hidden" id="fecha" class="form-control" name="noticia[fecha]" value="<?= isset($noticia['fecha']) ? $fecin : '' ?>"> 
								</div>
							</div>
                        </div>
                    </div>  
                </div> 
				
				<div role="tabpanel" class="tab-pane" id="sseo">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_4">Título de la página</label>
									<input type="text" class="form-control" id="campo_4" name="noticia[pagetitle]"  value="<?= isset($noticia['pagetitle']) ? $noticia['pagetitle'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-6"> 
								<div class="form-group">
									<label for="campo_4">Pagetitle</label>
									<input type="text" class="form-control" id="campo_4x" name="noticia[pagetitle_en]"  value="<?= isset($noticia['pagetitle_en']) ? $noticia['pagetitle_en'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_5">Descripción de la Página</label>
									<textarea class="form-control" name="noticia[meta_description]" id="campo_5" rows="3"><?= isset($noticia['meta_description']) ? $noticia['meta_description'] : ''; ?></textarea>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_5">Meta Description</label>
									<textarea class="form-control" name="noticia[meta_description_en]" id="campo_5" rows="3"><?= isset($noticia['meta_description_en']) ? $noticia['meta_description_en'] : ''; ?></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_6">Palabras claves de la Página</label>
									<textarea class="form-control" name="noticia[meta_keyword]" id="campo_6" rows="3"><?= isset($noticia['meta_keyword']) ? $noticia['meta_keyword'] : ''; ?></textarea>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_6">Meta Keywords</label>
									<textarea class="form-control" name="noticia[meta_keyword_en]" id="campo_6" rows="3"><?= isset($noticia['meta_keyword_en']) ? $noticia['meta_keyword_en'] : ''; ?></textarea>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="sface">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_4">Título Facebook</label>
									<input type="text" class="form-control" id="campo_4" name="noticia[og_title]" placeholder="Título de la Página" value="<?= isset($noticia['og_title']) ? $noticia['og_title'] : ''; ?>">
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_4">Title Facebook</label>
									<input type="text" class="form-control" id="campo_4" name="noticia[og_title_en]" placeholder="Título de la Página" value="<?= isset($noticia['og_title_en']) ? $noticia['og_title_en'] : ''; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_5">Description Facebook</label>
									<textarea class="form-control" name="noticia[og_description]" id="campo_5" rows="3"><?= isset($noticia['og_description']) ? $noticia['og_description'] : ''; ?></textarea>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="campo_5">Descripción Facebook</label>
									<textarea class="form-control" name="noticia[og_description_en]" id="campo_5" rows="3"><?= isset($noticia['og_description_en']) ? $noticia['og_description_en'] : ''; ?></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="campo_14">Imagen facebook </label>
									<small style="color: #999;">Dimensiones: 600 x 315px como mínimo.</small>
									<div class="input-group">
										<input type="text" id="campo_14" name="noticia[og_imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($noticia['og_imagen']) ? $noticia['og_imagen'] : ''; ?>">
										<div class="input-group-btn">
											<button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14', '', '<?= $this->config->item('akey'); ?>');">
												<span class="glyphicon glyphicon-picture"></span>
											</button>
										</div>
									</div>
									<div style="display: table; width: 100%;">
										<div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
											<img src="<?= isset($noticia['og_imagen']) ? $noticia['og_imagen'] : ''; ?>" id="campo_14-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>					
            </div>      
          </div>
          <div class="modal-footer">
                <button type="reset" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
				
                <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
          </div>
		  
        
		
        <input type="hidden" id="ids" name="noticia[idnoticia]" value="<?= isset($noticia['idnoticia']) ? $noticia['idnoticia'] : '';?>">
		<input type="hidden" id="ids" name="sitemap[idsitemap]" value="<?= isset($servicios['idsitemap']) ? $servicios['idsitemap'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip(); 
        Exeperu.key = '<?= $this->config->item('akey') ?>';
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
//        Exeperu.validartipo();
     
        $("#formCrearEditarnoticia").submit(function(e){
			e.preventDefault();
			$.ajax({
				url: $(this).attr('action'),
				type:$(this).attr('method'),
				data:$(this).serialize(),
				success:function(response){
                    var jm=JSON.parse(response);   
					
                    if(jm.tipo==1){
                        toastr.success(jm.mensaje,{timeOut:2000});
                        Exeperu.reloadTableNoticias();
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
    });
</script>

</div>