<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarautor" action="manager/articulos/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><strong>Artículo</strong></h4>
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
            <?php
            if (isset($blog['fecha']) && $blog['fecha'] != '0000-00-00 00:00:00') {
                $fecin = (new DateTime($blog['fecha']))->format('d/m/Y H:i:s');
            } else {
                $fecin = '';
            }

            ?>
            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;" id="tabs">
                <li role="presentation" class="active">
                    <a href="#sdetalle" aria-controls="detalle" role="tab" data-toggle="tab">Detalle</a>
                </li>
                <li role="presentation">
                    <a href="#smultimedia" aria-controls="detalle" role="tab" data-toggle="tab">Multimedia</a>
                </li>
<!--                <li>
                    <a href="#sreseña" aria-controls="descripcion" role="tab" data-toggle="tab">Reseña</a>
                </li>-->
                <li>
                    <a href="#sdatos" aria-controls="descripcion" role="tab" data-toggle="tab">Descripción</a>
                </li>
                <li>
                    <a href="#stags" aria-controls="descripcion" role="tab" data-toggle="tab">Tags</a>
                </li>
                
                <li>
                    <a href="#sseo" aria-controls="descripcion" role="tab" data-toggle="tab">SEO</a>
                </li>
                <li>
                    <a href="#sface" aria-controls="descripcion" role="tab" data-toggle="tab">Facebook</a>
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
                                <div class="col-xs-12">
                                    <div class="form-group required">
                                        <label class="control-label">Título</label>
                                        <input type="text" id="titulo" class="form-control" name="blogs[titulo]" placeholder="Ingrese el titulo" value="<?= isset($blog['titulo']) ? $blog['titulo'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group required">
                                        <label class="control-label">Sumilla</label>
                                        <textarea class="form-control" name="blogs[resena]" cols="50" rows="3"><?= $blog['resena']?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="campo_3-1">Entrevista</label>
                                        <div class="input-group">
                                            <input type="text" id="campo_3-1" class="form-control" value="Confirmar" readonly="">
                                            <span class="input-group-addon">
                                                <input type="hidden" name="blogs[entrevista]" value="0">
                                                <input type="checkbox" name="blogs[entrevista]" <?= (isset($blog['entrevista']) && $blog['entrevista'] == 1) ? 'checked' : ''; ?> value="1">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label">Tiempo de lectura</label>
                                        <input type="text" id="tiempo_lectura" class="form-control" name="blogs[tiempo_lectura]" placeholder="Ingrese el tiempo" value="<?= isset($blog['tiempo_lectura']) ? $blog['tiempo_lectura'] : ''; ?>" >
                                    </div>
                                </div>
                                
                                <div class="col-xs-4">
                                    <div class="form-group" style="width:100%;">
                                       <label class="control-label">Fecha y hora de publicación</label>
                                        <input type="text" id="fecha" class="form-control" name="fecha[fecha]" value="<?= isset($blog['fecha']) ? $fecin : '' ?>"> 
                                    </div>
                                </div>
                                
                                
<!--                                <div class="col-xs-5">
                                    <div class="form form-group">
                                        <label for="campo_8">
                                            Fecha de creación
                                        </label>
                                        <div class='input-group date' id='datetimepickerinicio'>
                                            <input type="text" class="form-control" name="fecha[fechaini]" id="campo_8" value="<!?= isset($blog['fecha']) ? $fecin : ''; ?>">
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar">
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>-->
                                
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Autor</label>
                                        <select class="form-control" name="blogs[idautor]" id="idautor">
                                            <!--<option value="">Seleccionar autor...</option>-->
                                            <option value="141414">SIN AUTOR</option>
                                            <?php foreach($autores as $autor){?>
                                            <option <?= ($autor['idautor']==$blog['idautor'] ? 'selected' : '')?> value="<?= $autor['idautor']?>"><?= $autor['nombres']." ".$autor['apellidos']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Usuario</label>
                                        <select class="form-control" name="blogs[iduser]" id="iduser">
                                            <!--<option value="">Seleccionar autor...</option>-->
                                            <option value="141414">SIN USUARIO</option>
                                            <?php $attr = '';?>
                                            <?php foreach($usuarios as $usuario){?>
                                            <?php if( ($blog['iduser']!=NULL && $usuario['iduser']==$blog['iduser']) || ($blog['iduser']==NULL && $usuario['iduser']== $this->manager['user']['iduser']) ) { ?>
                                            <?php $attr = 'selected'; ?>
                                            <?php } ?>
                                            <option <?= $attr ?> value="<?= $usuario['iduser']?>"><?= $usuario['username']." ".$usuario['alias']?></option>
                                            
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Categoría</label>
                                        <select class="form-control" name="blogs[idcategoria]" id="idcategoria">
                                            <option value="">Seleccionar categoría...</option>
                                            <?php foreach($categorias as $categoria){?>
                                            <option <?= ($categoria['idcategoria']==$blog['idcategoria'] ? 'selected' : '')?> value="<?= $categoria['idcategoria']?>"><?= $categoria['categoria'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label for="campo_3-1" class="control-label">Estado</label>
                                        <select name="blogs[estado]" id="estado" class="form-control">
                                            <option value="1" <?= ($blog['estado'] == 1 ? 'selected' : '') ?>>Activo</option>
                                            <option value="0" <?= ($blog['estado'] == 0 ? 'selected' : '') ?>>Inactivo</option>
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
                                    <textarea cols="100" rows="6" name="blogs[descripcion]" class="form-control richtext"><?= isset($blog['descripcion']) ? $blog['descripcion'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                
<!--                <div role="tabpanel" class="tab-pane" id="sreseña">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_3-1">Reseña</label>
                                    <textarea cols="100" rows="6" name="blogs[resena]" class="form-control richtext"><!?= isset($blog['resena']) ? $blog['resena'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>-->
                <div role="tabpanel" class="tab-pane" id="stags">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group" style="position: relative;">
                                    <label for="campo_15">Tag</label>
                                    <select class="form-control" name="grupos_tags[idtag][]" id="campo_15" multiple style="width: 100%">
                                        <?php
                                        foreach ($tags as $key => $tag) {
                                          
                                                echo '<option value="' . $tag['idtag'] . '" ' . (in_array($tag['idtag'], $blog_tags) ? 'selected' : '') . '>' . $tag['nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
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
                                    <textarea class="form-control" name="anuncios_articulos[anuncios_articulos]" id="campo_14mich" rows="3" style="display: none;"><?= isset($anuncios_articulos) ? $anuncios_articulos : '[]'; ?></textarea><br>
                                    <a href="javascript: Exeperu.crear_anuncio('<?= (isset($blog['idblog']) && (int) $blog['idblog'] > 0) ? $blog['idblog'] : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                    <div class="table-responsive">
                                    <table id="table_anuncios" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Url</th>
<!--                                                <th>Tipo</th>
                                                <th>Dimensión</th>-->
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
                <div role="tabpanel" class="tab-pane" id="smultimedia">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="file-jm">Video <small style="color: #999;"> Opcional </small></label>
                                    <div class="input-group">
                                        <input type="text" id="file-videojm" name="blogs[video]" class="form-control" placeholder="Selecciona tu archivo" value="<?= isset($blog['video']) ? $blog['video'] : ''; ?>">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('file-videojm', '', '<?= $this->config->item('akey'); ?>', 3);">
                                                <span class="glyphicon glyphicon-film"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form form-group">
                                    <label for="campo_4" class="control-label">Imagen principal <small style="color: #999;"> Dimensiones: 380 x 380px. </small></label>
                                    <div class="input-group">
                                        <input type="text" id="campo_4"  name="blogs[imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($blog['imagen']) ? $blog['imagen'] : ''; ?>">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_4', '', '<?= $this->config->item('akey'); ?>');">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div style="display: table; width: 100%;">
                                        <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                            <img src="<?= isset($blog['imagen']) ? $blog['imagen'] : ''; ?>" id="campo_4-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form form-group">
                                    <label for="campo_14jmjm" class="control-label">Imagen portada <small style="color: #999;"> Dimensiones: 1920 x 1300px. </small></label>
                                    <div class="input-group">
                                        <input type="text" id="campo_14jmjm" name="blogs[imagen_grande]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($blog['imagen_grande']) ? $blog['imagen_grande'] : ''; ?>">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14jmjm', '', '<?= $this->config->item('akey'); ?>');">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div style="display: table; width: 100%;">
                                        <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                            <img src="<?= isset($blog['imagen_grande']) ? $blog['imagen_grande'] : ''; ?>" id="campo_14jmjm-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div role="tabpanel" class="tab-pane" id="sseo">
                    <div class="container-fluid">
<!--                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_4">Alias</label>
                                    <input type="text" class="form-control" id="campo_jm" name="sitemap[url]"  value="<!?= isset($blog['url']) ? $blog['url'] : ''; ?>">
                                </div>
                            </div>
                        </div>-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_4">Pagetitle</label>
                                    <input type="text" class="form-control" id="campo_4" name="sitemap[pagetitle]"  value="<?= isset($blog['pagetitle']) ? $blog['pagetitle'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_5">Descripción de la Página</label>
                                    <textarea class="form-control" name="sitemap[meta_description]" id="campo_5" rows="3"><?= isset($blog['meta_description']) ? $blog['meta_description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_6">Palabras claves de la Página</label>
                                    <textarea class="form-control" name="sitemap[meta_keyword]" id="campo_6" rows="3"><?= isset($blog['meta_keyword']) ? $blog['meta_keyword'] : ''; ?></textarea>
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
                                    <input type="text" class="form-control" id="campo_4" name="sitemap[og_title]" placeholder="Título de la Página" value="<?= isset($blog['og_title']) ? $blog['og_title'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_5">Descripción Facebook</label>
                                    <textarea class="form-control" name="sitemap[og_description]" id="campo_5" rows="3"><?= isset($blog['og_description']) ? $blog['og_description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="campo_14">Imagen facebook </label>
                                    <small style="color: #999;">Dimensiones: 600 x 315px como mínimo.</small>
                                    <div class="input-group">
                                        <input type="text" id="campo_14" name="sitemap[og_imagen]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($blog['og_imagen']) ? $blog['og_imagen'] : ''; ?>">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14', '', '<?= $this->config->item('akey'); ?>');">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div style="display: table; width: 100%;">
                                        <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                            <img src="<?= isset($blog['og_imagen']) ? $blog['og_imagen'] : ''; ?>" id="campo_14-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
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
        <input type="hidden" id="ids" name="blogs[idblog]" value="<?= isset($blog['idblog']) ? $blog['idblog'] : '';?>">
        <input type="hidden" id="ids" name="sitemap[idsitemap]" value="<?= isset($blog['idsitemap']) ? $blog['idsitemap'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        Exeperu.key = '<?= $this->config->item('akey') ?>';
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
        Exeperu.tablePrueba();
        Exeperu.dimensiones = <?= $dimensiones ?>;
//        Exeperu.tableAnuncios();
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
                        Exeperu.reloadTableBlogs();
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