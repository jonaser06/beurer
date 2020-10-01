<a href="#" class="btn btn-xs btn-info btn-flat" id="open_madal" data-toggle="modal" data-target="#myModal">
	<i class="glyphicon glyphicon-plus"></i> Agregar
</a>
<br><br>
<div class="table-responsive">
    <table id="datatable-category" data-order='[[ 3, "asc" ]]' class="table table-striped table-responsive" width="100%">
        <thead>
            <tr>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Imagen</th>
                <th>Orden</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($cat as  $row){ ?>
        		<tr>
        			<td><?= $row['titulo']; ?></td>
        			<td><?= $row['subtitle']; ?></td>
        			<td><img src="<?=  base_url($row['imagen']); ?>" width="40"></td>
        			<td><?= $row['orden']; ?></td>
        			<td>
        				<button type="button" data-target="#Productos" data-id="<?= $row['id']; ?>" data-toggle="modal" class="btn-productos btn btn-info btn-xs btn-flat">
							<i class="fa fa-eye"></i>
						</button> 
						 | 
        				<button type="button"  data-id="<?= $row['id']; ?>" class="btn_editar btn btn-primary btn-xs btn-flat">
							<i class="fa fa-pencil"></i>
						</button> 
						| 
        				<button type="button" data-id="<?= $row['id']; ?>" class="btn_delete btn btn-danger btn-xs btn-flat" >
        					<i class="fa fa-trash-o"></i>
						</button>
        			</td>
        		</tr>
        	<?php } ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Form -->
			<form id="subcat" method="POST" action="">
			<input type="hidden" id="idcategoria" name="idcategoria">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">SubCategoría</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Imagen</label>
					<div class="input-group">
				        <input type="text" id="fileUpload" name="fileUpload" class="form-control" placeholder="Selecciona tu imagen" value="">
				        <div class="input-group-btn">
				            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('fileUpload', '', '<?= $this->config->item('akey'); ?>');">
				                <span class="glyphicon glyphicon-picture"></span>
				            </button>
				        </div>
				    </div>
				</div>
	
				<div class="form-group">
					<label>Título</label>
					<input type="text" class="form-control" name="titulo" id="titulo">
				</div>
				<div class="form-group">
					<label>Subtítulo</label>
					<input type="text" class="form-control" name="subtitulo" id="subtitulo">
				</div>
				<div class="form-group">
					<label>Contendido</label>
					<textarea class="form-control" name="contendido" id="contendido" rows="6"></textarea>
				</div>	  	
				<div class="form-group">
					<label>orden</label>
					<input type="text" class="form-control" id="orden" name="orden">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-info">Guardar</button>
			</div>
			</form>
			<!-- Form end -->
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="Productos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Productos</h4>
			</div>
			<div class="modal-body">
				<!-- Tabla -->
				<table id="datatable-productos" data-order='[[ 3, "asc" ]]' class="table table-striped table-responsive" width="100%">
			        <thead>
			            <tr>
			                <th>Título</th>
			                <th>Subtítulo</th>
			                <th>Imagen</th>
			                <th>Orden</th>
			                <th></th>
			            </tr>
			        </thead>
			    </table>
			    <!-- end Tabla -->
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	//alert(<?= $pagina ?>)

 	$(document).ready(function() {
 		// Loading Data Table
 		$('#open_madal').click(function(event) {
 			$('#idcategoria').val('');
 			$('#subcat')[0].reset();
 		});

	    var table  = $('#datatable-category').DataTable();
	    


	    //Save Data Category 
		$('#subcat').submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: '<?= base_url('categoria/save/'.$pagina); ?>',
				type: 'POST',
				data: new FormData(this),   //new FormData(document.getElementById("formTarea")),
				dataType:'JSON',
				contentType: false,
				cache: false,
				processData: false,
			})
			.done(function(response) {
				if(response.verify == true){
				
					table.row.add( [
					            response.titulo,
					            response.subtitle,
					            "<img src='"+response.imagen+"' width='40'>",
					            response.orden,
					            "<button type=\"button\" onclick=\"\" class=\"btn btn-info btn-xs btn-flat\"><i class=\"fa fa-eye\"></i></button> | <button type=\"button\" class=\"btn btn-primary btn-xs btn-flat\"><i class=\"fa fa-pencil\"></i> </button> | <button type=\"button\"data-id=\""+response.id+"\" class=\"btn_delete btn btn-danger btn-xs btn-flat\" onclick=\"alert('hola')\" ><i class=\"fa fa-trash-o\"></i></button>"
					        ] ).draw().page('last').draw('page');
				    $('#subcat')[0].reset();
				    $('#myModal').modal('hide')

				    setInterval( function () {
						    location.reload(true);
						}, 3000 );
				}else{
					$('#subcat')[0].reset();
					$('#myModal').modal('hide')
					setInterval( function () {
						    location.reload(true);
						}, 3000 );
				}
			})
			
		});
		// Edit Categoria
		$('.btn-productos').click(function(event) {
			 	$('#datatable-productos').dataTable().fnClearTable();
    			$('#datatable-productos').dataTable().fnDestroy();
    			
			var id = $(this).attr('data-id');
			console.log("<?= base_url('productos/'); ?>"+id)
			$('#datatable-productos').DataTable({
				"ajax": "<?= base_url('productos/'); ?>"+id,
			        "columns": [
			            { "data": "titulo" },
			            { "data": "subtitulo" },
			            //{ "data": "office" },
			            { "data": "contenido" },
			            { "data": "descripcion" },
			            {"data": "idcolumn", render: function (data, type, row, meta) {
                        var salida;

                        if (row.row_edit) {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.guardar_pdf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-floppy-o\"></i></a>",
                                "</center>",
                            ].join('');
                        } else {
                            salida = [
                                "<center>",
                                "<a href=\"javascript: Exeperu.editar_pdf('" + data + "');\" class=\"btn btn-primary btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-pencil\"></i></a>",
                                " | <a href=\"javascript: Exeperu.eliminar_pdf('" + data + "');\" class=\"btn btn-danger btn-xs btn-flat\" data-id=\"" + data + "\"><i class=\"fa fa-trash-o\"></i></a>",
                                "</center>",
                            ].join('');
                        }

                        return salida;
                    }
                }
			        ]
			});
		});
		// Detete Category
		$('.btn_delete').click(function(event) {
			var e = $(this);
			var id = e.attr('data-id');
			$.ajax({
				url: '<?= base_url(); ?>categoria/dalate/'+id,
			})
			.done(function() {
				 table.row(e.parents('tr'))
		        .remove()
		        .draw(); 
		        
			})

		     
		});
		$('.btn_editar').click(function(event) {
			var e = $(this);
			var id = e.attr('data-id');
			$.ajax({
				url: '<?= base_url(); ?>categoria/get/'+id,
			})
			.done(function(response) {
				console.log(response.data);
				$('#idcategoria').val(response.data.id)
				$('#fileUpload').val(response.data.imagen)
				$('#titulo').val(response.data.titulo)
				$('#subtitulo').val(response.data.subtitle)
				$('#contendido').val(response.data.contenido)
				$('#orden').val(response.data.orden)

			})
			
			$('#myModal').modal('show');
			 //console.log( table.row(this).data() );
		});
		/*
		function eliminar_cat(id=0) {
			$.ajax({
				url: '<?= base_url(); ?>categoria/dalate/'+id,
			})
			.done(function() {

				 table.row($(this).parents('tr'))
		        .remove()
		        .draw();

		        
			})

		}
		*/
		/*setInterval( function () {
					    table.ajax.reload();
					}, 300 );*/

	} );


	
</script>