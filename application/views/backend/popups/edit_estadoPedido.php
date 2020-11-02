<div class="modal-dialog modal-lg" id="modalCreateEdit" role="document">
	<form id="formEditarEstado" action="manager/pedidos/save" method="POST">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>
					<strong>Cambio de Estado </strong>
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
									<div class="form-group">
										<label class="control-label">Código de Pedido</label>
										<input readonly type="text" class="form-control" id="codigo" name="pedido[codigo]"  value="<?= isset($pedido['codigo']) ? $pedido['codigo'] : 'No tiene codigo'; ?>" >
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-xs-10">
									<div class="form-group">
									
									</script>
										<span class="help-block" id="mensajeerror"></span>
									</div>
								</div>
								
							</div>
							<div class="row">
						
				
								<div class="col-xs-5">
									<div class="form-group">
                                        <label for="campo_3-1" class="control-label">Estado</label>
                                        <?php if($pedido['recojo']== '1'){?>
										<select name="pedido[pedido_estado]" class="form-control">
											<option value="1" <?= ($pedido['pedido_estado'] == 1 ? 'selected' : '') ?>>Orden generada</option>
											<option value="2" <?= ($pedido['pedido_estado'] == 2? 'selected' : '') ?>>Prepando Pedido</option>
											<option value="3" <?= ($pedido['pedido_estado'] == 3 ? 'selected' : '') ?>>Listo en Tienda</option>
                                        </select>
                                        <?php } else {?>
                                            <select name="pedido[pedido_estado]" class="form-control">
											<option value="1" <?= ($pedido['pedido_estado'] == 1 ? 'selected' : '') ?>>Orden generada</option>
											<option value="2" <?= ($pedido['pedido_estado'] == 2 ? 'selected' : '') ?>>Prepando Pedido</option>
											<option value="3" <?= ($pedido['pedido_estado'] == 3 ? 'selected' : '') ?>>Listo en Para recojo</option>
											<option value="4" <?= ($pedido['pedido_estado'] == 4 ? 'selected' : '') ?>>Pedido entregado</option>
                                        </select>
                                       <?php } ?>
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
			<input type="hidden" name="pedido[id_pedido]" value="<?= isset($pedido['id_pedido']) ? $pedido['id_pedido'] : '';?>">
		</div>
	</form>

	<script>

		$(document).ready(function () {
			$("#formEditarEstado").submit(function(e){
                e.preventDefault();
				$.ajax({
					url:  $(this).attr('action'),
					type: $(this).attr('method'),
					data: $(this).serialize(),
					success:function(response){
					const res = JSON.parse(response);   
						if( res.tipo == 1 ) {
							toastr.success(res.mensaje, { timeOut:2000 } );
                            table.ajax.reload(null , false );
                            
							$('#modalCreateEdit').modal('toggle');
						}else{
							toastr.error(res.mensaje,{timeOut:2000});
							const errores =JSON.parse(res.errores); 

							// $.each( errores, function( key, value ) {
							// 	$("#"+value+"").parent().addClass("has-error");
							// });
							// const respons = JSON.parse( res.jm ); 
							// $.each( respons, function( key, value ) {
							// 	$("#"+value+"").parent().removeClass();
							// });
						}                    
					}
				});
            });
         
			
		});
	</script>

</div>