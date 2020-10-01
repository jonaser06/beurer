<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarVideo" action="manager/videos/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
            <h4><strong>Videos</strong></h4>
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
                    <a href="#vdetalle" aria-controls="detalle" role="tab" data-toggle="tab">Detalle</a>
                </li>
                <!--<li>
                    <a href="#sdatos" aria-controls="descripcion" role="tab" data-toggle="tab">Descripción</a>
                </li>-->
               
            </ul>
			
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="vdetalle">
                    <div class="container-fluid">
						<div class="row">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group required">
											<label class="control-label">Titulo</label>
											<input type="text" class="form-control" id="titulo" name="video[titulo]" placeholder="Ingrese el titulo" value="<?= isset($video['titulo']) ? $video['titulo'] : ''; ?>" >
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group required">
											<label class="control-label">Titulo ingles</label>
											<input type="text" class="form-control" id="titulo_en" name="video[titulo_en]" placeholder="Ingrese el titulo" value="<?= isset($video['titulo_en']) ? $video['titulo_en'] : ''; ?>" >
										</div>
									</div>
																	
								</div>
								
								<div class="row">								
									
									
									<div class="col-xs-6">
                                        <div class="form form-group required">
                                            <label for="campo_2" class="control-label">Tipo de categoría</label>
                                            <select name="video[idcategoria_video]" id="tipoprod" class="form-control" style="width: 100%;">
                                                <!--<option value="">Seleccione el tipo...</option>-->
                                                <?php foreach($categorias as $categoria){ 
													//print_r($categoria);
                                                    $categoria['idcategoria_video']==$video['idcategoria_video'] ? $sel='selected' : $sel='' ?>
                                                <option value="<?= $categoria['idcategoria_video'] ?>" <?= $sel?>><?= $categoria['nombre']?></option>
                                                <?php }?>
                                            </select>
                                        </div> 
                                    </div>	
									<div class="col-xs-6">
										<div class="form-group required">
											<label class="control-label">Url</label>
											<input type="video" class="form-control" id="src" name="video[src]" placeholder="Ingrese el video" value="<?= isset($video['src']) ? $video['src'] : ''; ?>" >
										</div>
									</div>
									
									
								</div>
								<div class="row">
									<div class="col-xs-6">
										<div class="form form-group">
											<label for="campo_4" class="control-label">Imagen <small style="color: #999;">Dimensiones: 1000 x 1000px. </small></label>
											<div class="input-group">
												<input type="text" id="campo_4" id="imagen" name="video[imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($video['imagen']) ? $video['imagen'] : ''; ?>">
												<div class="input-group-btn">
													<button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_4', '', '<?= $this->config->item('akey'); ?>');">
														<span class="glyphicon glyphicon-picture"></span>
													</button>
												</div>
											</div>
											<div style="display: table; width: 100%;">
												<div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
													<img src="<?= isset($video['imagen']) ? $video['imagen'] : ''; ?>" id="campo_4-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group required">
											<label for="campo_3-1" class="control-label">Estado</label>
											<select name="video[estado]" id="estado" class="form-control">
												<option value="1" <?= ($video['estado'] == 1 ? 'selected' : '') ?>>Activo</option>
												<option value="0" <?= ($video['estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
											</select>
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
		<input type="hidden" id="ids" name="video[idvideo]" value="<?= isset($video['idvideo']) ? $video['idvideo'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        Exeperu.key = '<?= $this->config->item('akey') ?>';
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
//        Exeperu.validartipo();
     
        $("#formCrearEditarVideo").submit(function(e){
			e.preventDefault();
			$.ajax({
				url: $(this).attr('action'),
				type:$(this).attr('method'),
				data:$(this).serialize(),
				success:function(response){
                    var jm=JSON.parse(response);   
					
                    if(jm.tipo==1){
                        toastr.success(jm.mensaje,{timeOut:2000});
                        Exeperu.reloadTableVideos();
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