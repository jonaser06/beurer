<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">

        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>

    </label>

    <select name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" class="form-control" style="width: 100%;">

        <option value="0">Selecciona categoria...</option>



    </select>

</div>

<script>
  <?php if (!empty($variable['valor'])):  ?>
      var xd='<option value="">Seleccione una subcategoría...</option>';

      $("#subcategoria").html(xd);

       $.ajax({

          url:'<?= base_url('categorias/lissubcategorias'); ?>',

          type:'post',

          data:{'idcat':<?= $variable['valor'] ?>},

          success:function(response){
              //console.log(response)
              //var obj=JSON.parse(response);

              $.each(response, function(i,item){
                  if(item.id == "<?= isset($variable['valor']) && !empty($variable['valor']) ? $variable['valor'] : '' ?>"){

                         var sel="selected";

                      }else{

                          var sel="";

                      }
                 var html='<option '+sel+' value="'+item.id+'">'+item.titulo+'</option>'; 

                 $("#subcategoria").append(html);

              });

          }

       });
    <?php endif ?>

    $(document).ready(function () {

        listarcategorias();
        function listarcategorias(){

            var html='<option value="0">Selecciona evento...</option>';

            $.ajax({

               url:'categorias/list/',

               type:'post',

               data:{},

               success:function(response){

                   //var obj=JSON.parse(response);

                   $.each(response ,function(i,item){

                       if(item.idpagina == "<?= isset($variable['valor']) && !empty($variable['valor']) ? $variable['valor'] : '' ?>"){

                           var sel="selected";

                        }else{

                            var sel="";

                        }



                        //var nombre=item.subtitulo;

                        var html='<option '+sel+' value="'+item.idpagina+'">'+item.pagina+'</option>';

                        $("#<?= $variable['nombre'] ?>").append(html);

                   });

               }

            });

        }


        $("#<?= $variable['nombre'] ?>").change(function(e){

                e.preventDefault();

                var idcat=$(this).val();

                var xd='<option value="">Seleccione una subcategoría...</option>';

                $("#subcategoria").html(xd);

                 $.ajax({

                    url:'<?= base_url('categorias/lissubcategorias'); ?>',

                    type:'post',

                    data:{'idcat':idcat},

                    success:function(response){
                        //console.log(response)
                        //var obj=JSON.parse(response);

                        $.each(response, function(i,item){

                           var html='<option  value="'+item.id+'">'+item.titulo+'</option>'; 

                           $("#subcategoria").append(html);

                        });

                    }

                 });

                 $("#subcategoria").val(0);
             });



        




    });

</script>