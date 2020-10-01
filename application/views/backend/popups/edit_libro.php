<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarlibro" action="manager/libros/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><strong>Libro</strong></h4>
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
                    <a href="#sseo" aria-controls="descripcion" role="tab" data-toggle="tab">SEO</a>
                </li>
                <li>
                    <a href="#sface" aria-controls="descripcion" role="tab" data-toggle="tab">Facebook</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="sdetalle">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group required">
                                        <label class="control-label">Título</label>
                                        <input type="text" id="titulo" class="form-control" name="libros[titulo]" placeholder="Ingrese el titulo" value="<?= isset($libro['titulo']) ? $libro['titulo'] : ''; ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="form-group required">
                                        <label class="control-label">Autor</label>
                                        <input type="text" id="autor" class="form-control" name="libros[autor]" placeholder="Ingrese el autor" value="<?= isset($libro['autor']) ? $libro['autor'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group required">
                                        <label class="control-label">Enlace</label>
                                        <input type="text" id="enlace" class="form-control" name="libros[enlace]" placeholder="Ingrese el enlace" value="<?= isset($libro['enlace']) ? $libro['enlace'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Orden</label>
                                        <input type="text" id="orden" class="form-control" name="libros[orden]"  value="<?= isset($libro['orden']) ? $libro['orden'] : '0.00'; ?>" >
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-xs-9">
                                    <div class="form-group">
                                        <label for="campo_14jm">Imagen </label>
                                        <small style="color: #999;">Dimensiones: 600 x 315px como mínimo.</small>
                                        <div class="input-group">
                                            <input type="text" id="campo_14jm" name="libros[imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($libro['imagen']) ? $libro['imagen'] : ''; ?>">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14jm', '', '<?= $this->config->item('akey'); ?>');">
                                                    <span class="glyphicon glyphicon-picture"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div style="display: table; width: 100%;">
                                            <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                                <img src="<?= isset($libro['imagen']) ? $libro['imagen'] : ''; ?>" id="campo_14jm-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label for="campo_3-1" class="control-label">Estado</label>
                                        <select name="libros[estado]" id="estado" class="form-control">
                                            <option value="1" <?= ($libro['estado'] == 1 ? 'selected' : '') ?>>Activo</option>
                                            <option value="0" <?= ($libro['estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
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
                                    <textarea cols="100" rows="6" name="libros[descripcion]" class="form-control richtext"><?= isset($libro['descripcion']) ? $libro['descripcion'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
 
                <div role="tabpanel" class="tab-pane" id="sseo">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_4">Pagetitle</label>
                                    <input type="text" class="form-control" id="campo_4" name="sitemap[pagetitle]"  value="<?= isset($libro['pagetitle']) ? $libro['pagetitle'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_5">Descripción de la Página</label>
                                    <textarea class="form-control" name="sitemap[meta_description]" id="campo_5" rows="3"><?= isset($libro['meta_description']) ? $libro['meta_description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_6">Palabras claves de la Página</label>
                                    <textarea class="form-control" name="sitemap[meta_keyword]" id="campo_6" rows="3"><?= isset($libro['meta_keyword']) ? $libro['meta_keyword'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="sface">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_4">Título Facebook</label>
                                    <input type="text" class="form-control" id="campo_4" name="sitemap[og_title]" placeholder="Título de la Página" value="<?= isset($libro['og_title']) ? $libro['og_title'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_5">Descripción Facebook</label>
                                    <textarea class="form-control" name="sitemap[og_description]" id="campo_5" rows="3"><?= isset($libro['og_description']) ? $libro['og_description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_14">Imagen facebook </label>
                                    <small style="color: #999;">Dimensiones: 600 x 315px como mínimo.</small>
                                    <div class="input-group">
                                        <input type="text" id="campo_14" name="sitemap[og_imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($libro['og_imagen']) ? $libro['og_imagen'] : ''; ?>">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14', '', '<?= $this->config->item('akey'); ?>');">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div style="display: table; width: 100%;">
                                        <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                            <img src="<?= isset($libro['og_imagen']) ? $libro['og_imagen'] : ''; ?>" id="campo_14-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
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
        <input type="hidden" id="idl" name="libros[idlibro]" value="<?= isset($libro['idlibro']) ? $libro['idlibro'] : '';?>">
        <input type="hidden" id="ids" name="sitemap[idsitemap]" value="<?= isset($libro['idsitemap']) ? $libro['idsitemap'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
//        Exeperu.validartipo();
        $('#campo_15').select2({dropdownParent: $("#modalCreateEdit")});
//        $('#datetimepickerinicio').datetimepicker({
//            icons: {
//                time: "fa fa-clock-o",
//                date: "fa fa-calendar",
//                up: "fa fa-arrow-up",
//                down: "fa fa-arrow-down"
//            }
//        });
        $('#fecha').datetimepicker();
        
        $("#formCrearEditarlibro").submit(function(e){
           e.preventDefault();
           $.ajax({
              url: $(this).attr('action'),
              type:$(this).attr('method'),
              data:$(this).serialize(),
              success:function(response){
                    var jm=JSON.parse(response);
                    
                    if(jm.tipo==1){
                        toastr.success(jm.mensaje,{timeOut:2000});
                        Exeperu.reloadTableLibros();
                    }else{
                        toastr.error(jm.mensaje,{timeOut:2000});
                        var errores=JSON.parse(jm.errores); 
                        $.each( errores, function( key, value ) {
                            $("#"+value+"").parent().addClass("has-error");
                            if(value=='campo_4'){
                                $("#"+value+"").parent().parent().addClass("has-error");
                            }
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