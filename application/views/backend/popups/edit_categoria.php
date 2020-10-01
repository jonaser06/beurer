<div class="modal-dialog modal-lg" role="document">
	<form id="formCrearEditarCategoria" action="manager/videos/savecategoria" method="POST">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>
					<strong>Tipo de producto</strong>
				</h4>

			</div>
			<style>
				.form-group.required .control-label:after {
					color: #d00;
					content: "*";
					position: absolute;
					margin-left: 8px;
					top:2px;
				}
			</style>
			<div class="modal-body">
				<!-- Nav tabs -->
				<div class="container-fluid">
					<div class="row">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-10">
									<div class="form-group required" id="tipoverify">
										<label class="control-label">Categoría</label>
										<input type="text" class="form-control" id="nombre" name="categoria[nombre]" placeholder="Ingrese una categoría" value="<?= isset($categoria['nombre']) ? $categoria['nombre'] : ''; ?>" >
										<span class="help-block" id="mensajeerror"></span>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-xs-10">
									<div class="form-group required" id="tipoverify">
										<label class="control-label">Categoría ingles</label>
										<input type="text" class="form-control" id="nombre_en" name="categoria[nombre_en]" placeholder="Ingrese una categoría" value="<?= isset($categoria['nombre_en']) ? $categoria['nombre_en'] : ''; ?>" >
										<span class="help-block" id="mensajeerror"></span>
									</div>
								</div>
								
							</div>
							<div class="row">
						
								<div class="col-xs-5">
									<div class="form-group">
										<label>Orden</label>
										<input type="text" name="categoria[orden]" class="form-control" value="<?= isset($categoria['orden']) ? $categoria['orden'] : '0.00'; ?>" >
									</div>
								</div>
								<div class="col-xs-5">
									<div class="form-group required">
										<label for="campo_3-1" class="control-label">Estado</label>
										<select name="categoria[estado]" class="form-control">
											<option value="1" <?= ($categoria['estado'] == 1 ? 'selected' : '') ?>>Activo</option>
											<option value="0" <?= ($categoria['estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
										</select>
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
			<input type="hidden" name="categoria[idcategoria_video]" value="<?= isset($categoria['idcategoria_video']) ? $categoria['idcategoria_video'] : '';?>">
		</div>
	</form>

	<script>
		$(document).ready(function () {
			$('[data-toggle="tooltip"]').tooltip();
			Exeperu.key = '<?= $this->config->item('akey') ?>';
			Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
	//        Exeperu.validartipo();
		 
			$("#formCrearEditarCategoria").submit(function(e){
				e.preventDefault();
				$.ajax({
					url: $(this).attr('action'),
					type:$(this).attr('method'),
					data:$(this).serialize(),
					success:function(response){
						var jm=JSON.parse(response);   
						
						if(jm.tipo==1){
							toastr.success(jm.mensaje,{timeOut:2000});
							Exeperu.reloadTableCategorias();
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