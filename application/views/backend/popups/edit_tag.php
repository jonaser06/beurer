<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarautor" action="manager/tags/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><strong>Tag</strong></h4>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group required">
                                        <label class="control-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="tags[nombre]" placeholder="Ingrese nombres del tag" value="<?= isset($tag['nombre']) ? $tag['nombre'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Orden</label>
                                        <input type="text" class="form-control" id="orden" name="tags[orden]"  value="<?= isset($tag['orden']) ? $tag['orden'] : '0.00'; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label for="campo_3-1" class="control-label">Estado</label>
                                        <select name="tags[estado]" id="estado" class="form-control">
                                            <option value="1" <?= ($tag['estado'] == 1 ? 'selected' : '') ?>>Activo</option>
                                            <option value="0" <?= ($tag['estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
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
        <input type="hidden" id="ids" name="tags[idtag]" value="<?= isset($tag['idtag']) ? $tag['idtag'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
//        Exeperu.validartipo();
        
        $("#formCrearEditarautor").submit(function(e){
           e.preventDefault();
           $.ajax({
              url: $(this).attr('action'),
              type:$(this).attr('method'),
              data:$(this).serialize(),
              success:function(response){
                    var jm=JSON.parse(response);
                    
                    if(jm.tipo==1){
                        toastr.success(jm.mensaje,{timeOut:2000});
                        Exeperu.reloadTableTags();
                    }else{
                        toastr.error(jm.mensaje,{timeOut:2000});
                        var errores=JSON.parse(jm.errores); 
                        $.each( errores, function( key, value ) {
                            $("#"+value+"").parent().addClass("has-error");
                        });
                    }
                    
              }
           });
        });
    });
</script>

</div>