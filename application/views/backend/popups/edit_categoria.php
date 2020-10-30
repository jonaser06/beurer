<div class="modal-dialog modal-lg" id="modalCreateEdit" role="document">
	<form id="formCrearEditarCategoria" action="manager/categorias/save" method="POST">
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
										<label class="control-label">Nombre de la Categoría</label>
										<input type="text" class="form-control" id="nombre" name="categoria[nombre]" placeholder="Ingrese una categoría" value="<?= isset($categoria['pagina']) ? $categoria['pagina'] : ''; ?>" >
										<span class="help-block" id="mensajeerror"></span>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-xs-10">
									<div class="form-group required" id="tipoverify">
									<div class="form-group">
										<label for="color">Color de la Categoría</label>

										<div id="color-colorpicker" class="input-group colorpicker-element">
											<input type="text" name="categoria[color]" id="color" class="form-control" value="<?= isset($categoria['color']) ? $categoria['color'] : ''; ?>">
											<div class="input-group-addon">
												<i style="background-color: #000;"></i>
											</div>
										</div>
									<script>
										$(document).ready(function () {
											$("#color-colorpicker").colorpicker({
												customClass: 'colorpicker-2x',
												
											});
										});
									</script>
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
			<input type="hidden" name="categoria[idsitemap]" value="<?= isset($categoria['idsitemap']) ? $categoria['idsitemap'] : '';?>">
		</div>
	</form>

	<script>

		$(document).ready(function () {
			$("#formCrearEditarCategoria").submit(function(e){
				e.preventDefault();
				$.ajax({
					url:  $(this).attr('action'),
					type: $(this).attr('method'),
					data: $(this).serialize(),
					success:function(response){
					const res = JSON.parse(response);   
						if( res.tipo == 1 ) {
							toastr.success(res.mensaje, { timeOut:2000 } );
							// Exeperu.reloadTableCategorias();
							table.ajax.reload(null , false );
							$('#modalCreateEdit').modal('toggle');
						}else{
							toastr.error(res.mensaje,{timeOut:2000});
							const errores =JSON.parse(res.errores); 

							$.each( errores, function( key, value ) {
								$("#"+value+"").parent().addClass("has-error");
							});
							const respons = JSON.parse( res.jm ); 
							$.each( respons, function( key, value ) {
								$("#"+value+"").parent().removeClass();
							});
						}                    
					}
				});
			});
			
		});
	</script>

</div>