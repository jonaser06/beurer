<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarautor" action="manager/autores/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><strong>Autor</strong></h4>
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
                    <a href="#sanuncios" aria-controls="descripcion" role="tab" data-toggle="tab">Anuncios</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="sdetalle">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="form-group required">
                                        <label class="control-label">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="autores[nombres]" placeholder="Ingrese nombres del autor" value="<?= isset($autor['nombres']) ? $autor['nombres'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group required">
                                        <label class="control-label">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="autores[apellidos]" placeholder="Ingrese apellidos del autor" value="<?= isset($autor['apellidos']) ? $autor['apellidos'] : ''; ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="form form-group">
                                        <label for="campo_4" class="control-label">Foto <small style="color: #999;">Dimensiones: 1000 x 1000px. </small></label>
                                        <div class="input-group">
                                            <input type="text" id="campo_4" id="foto" name="autores[foto]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($autor['foto']) ? $autor['foto'] : ''; ?>">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_4', '', '<?= $this->config->item('akey'); ?>');">
                                                    <span class="glyphicon glyphicon-picture"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div style="display: table; width: 100%;">
                                            <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                                <img src="<?= isset($autor['foto']) ? $autor['foto'] : ''; ?>" id="campo_4-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-5">
                                    <div class="form-group required">
                                        <label class="control-label">Cargo y/o Ocupación</label>
                                        <input type="text" class="form-control" id="apellidos" name="autores[ocupacion]" placeholder="Ingrese cargo" value="<?= isset($autor['ocupacion']) ? $autor['ocupacion'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group required">
                                        <label for="campo_3-1" class="control-label">Estado</label>
                                        <select name="autores[estado]" id="estado" class="form-control">
                                            <option value="1" <?= ($autor['estado'] == 1 ? 'selected' : '') ?>>Activo</option>
                                            <option value="0" <?= ($autor['estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
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
                                    <textarea cols="100" rows="6" name="autores[descripcion]" class="form-control richtext"><?= isset($autor['descripcion']) ? $autor['descripcion'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div role="tabpanel" class="tab-pane" id="sanuncios">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group" style="position: relative;">
                                    <label for="campo_14mich">Anuncios </label>
                                    <textarea class="form-control" name="anuncios_autores[anuncios_autores]" id="campo_14mich" rows="3" style="display: none;"><?= isset($anuncios_autores) ? $anuncios_autores : '[]'; ?></textarea><br>
                                    <a href="javascript: Exeperu.crear_anuncio('<?= (isset($autor['idautor']) && (int) $autor['idautor'] > 0) ? $autor['idautor'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                    <div class="table-responsive">
                                    <table id="table_anuncios" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Url</th>
                                                <th>Orden</th>
                                                <th>Estado</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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
        <input type="hidden" id="ids" name="autores[idautor]" value="<?= isset($autor['idautor']) ? $autor['idautor'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        Exeperu.key = '<?= $this->config->item('akey') ?>';
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
//        Exeperu.validartipo();
        Exeperu.tablePrueba();
        Exeperu.dimensiones = <?= $dimensiones ?>;
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
                        Exeperu.reloadTableAutores();
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