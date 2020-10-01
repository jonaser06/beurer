<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
    </label>
    <select name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" class="form-control" style="width: 100%;">

    </select>
</div>
<script>
	<?php if (!empty($variable['valor']) AND $variable['nombre'] == 'subcategoria'): ?>

		var xd='<option value="">Seleccione una producto...</option>';
        $("#producto").html(xd);
         $.ajax({
            url:'<?= base_url('categorias/getProducto'); ?>',
            type:'post',
            data:{'idsubcat':<?= $variable['valor']  ?>},
            success:function(response){
                $.each(response, function(i,item){
                	if(item.id == "<?= isset($variable['valor']) && !empty($variable['valor']) ? $variable['valor'] : '' ?>"){

                   var sel="selected";

                }else{

                    var sel="";

                }
                   var html='<option '+sel+' value="'+item.titulo+'">'+item.titulo+'</option>'; 
                   $("#producto").append(html);
                });
            }
         });
	<?php endif ?>

    $(document).ready(function () {
    	$("#subcategoria").change(function(e) {
            e.preventDefault();

                var idsubcat=$(this).val();

                var xd='<option value="">Seleccione una producto...</option>';
                $("#producto").html(xd);
                 $.ajax({
                    url:'<?= base_url('categorias/getProducto'); ?>',
                    type:'post',
                    data:{'idsubcat':idsubcat},
                    success:function(response){
                        $.each(response, function(i,item){
                        	if(item.idpagina == "<?= isset($variable['valor']) && !empty($variable['valor']) ? $variable['valor'] : '' ?>"){

                           var sel="selected";

                        }else{

                            var sel="";

                        }
                           var html='<option '+sel+' value="'+item.titulo+'">'+item.titulo+'</option>'; 
                           $("#producto").append(html);
                        });
                    }
                 });

                 $("#producto").val(0);
        });
    });
</script>