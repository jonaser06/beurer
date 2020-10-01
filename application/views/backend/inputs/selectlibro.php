<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
    </label>
    <!--<input type="text" class="jm" name="<!?= $variable['nombreextra']?>" value="<!?= isset($variable['extra']) ? $variable['extra'] : ''?>">-->
    <select name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" class="form-control sels_select2" style="width: 100%;">
        <option value="0">Selecciona producto...</option>

    </select>
</div>
<script>
    $(document).ready(function () {
        listareventos();
        function listareventos(){
            var html='<option value="0">Selecciona producto...</option>';
            $.ajax({
               url:'manager/productos/read',
               type:'post',
               data:{},
               success:function(response){
                   var obj=response.data;
                   $.each(obj,function(i,item){
                       if(item.titulo == "<?= isset($variable['valor']) && !empty($variable['valor']) ? $variable['valor'] : '' ?>"){
                           var sel="selected";
                        }else{
                            var sel="";
                        }
                        $(".jm").val(item.titulo);
                        var html='<option '+sel+' value="'+item.titulo+'">'+item.titulo+'</option>';
                        $("#<?= $variable['nombre'] ?>").append(html);
                   });
               }
            });
        }
        
        /*
        $("#<?= $variable['nombre'] ?>").change(function(e){
            e.preventDefault();
            var jm14=$(this).val();
            $.ajax({
               url:'manager/productos/productonom',
               type:'post',
               data:{'idproducto':jm14},
               success:function(response){
                        $("#productojm").val(response);
                    }
                   });
        });
        */
        $('.sels_select2').select2({dropdownParent: $("#modalCreateEdit")});

    });
</script>