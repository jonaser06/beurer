<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarper" action="manager/perfiles/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><strong>Perfil</strong></h4>

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
            <style>
                * {
                    padding: 0px;
/*                                            margin: 0px;
                    outline: none;
                    font: 16px "Calibri";
                    font-weight: lighter;*/
                    list-style-type: none;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                  }


                  .controls {
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    /*background: #fff;*/
                    z-index: 1;
                    padding: 6px 10px;
                    /*box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);*/
                  }

                  input[type=checkbox] {
                    vertical-align: middle !important;
                  }

/*                                          h1 {
                    font-size: 3em;
                    font-weight: lighter;
                    color: #fff;
                    text-align: center;
                    display: block;
                    padding: 40px 0px;
                    margin-top: 40px;
                  }*/

                  .treejm {
                    margin: 2% auto;
                    width: 100%;
                  }

                  .treejm ul {
                    display: none;
                    margin: 4px auto;
                    margin-left: 6px;
                    border-left: 1px dashed #dfdfdf;
                  }


                  .treejm li {
                    padding: 12px 18px;
                    cursor: pointer;
                    vertical-align: middle;
                    background: #fff;
                  }

                  .treejm li:first-child {
                    border-radius: 3px 3px 0 0;
                  }

                  .treejm li:last-child {
                    border-radius: 0 0 3px 3px;
                  }

                  .treejm .active,
                  .active li {
                    background: #efefef;
                  }

                  .treejm label {
                    cursor: pointer;
                  }

                  .treejm input[type=checkbox] {
                    margin: -2px 6px 0 0px;
                  }

                  .has > label {
                    color: #000;
                  }

/*                                          .treejm .total {
                    color: #e13300;
                  }*/
            </style>
                <div class="container-fluid">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group required">
                                        <label class="control-label">Perfil</label>
                                        <input type="text" class="form-control" id="perfil" name="perfiles[perfil]" placeholder="Ingrese un nombre" value="<?= isset($perfil['perfil']) ? $perfil['perfil'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label for="campo_3-1" id="activo" class="control-label">Estado</label>
                                        <select name="perfiles[activo]" class="form-control">
                                            <option value="1" <?= ($perfil['activo'] == 1 ? 'selected' : '') ?>>Activo</option>
                                            <option value="0" <?= ($perfil['activo'] == 0 ? 'selected' : '') ?>>Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <h5><strong>Accesos</strong></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="panel-group" id="accordionjm2" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne12">
                                                <div class="panel-title">
                                                    <strong></strong>
<!--                                                    <a class="panel-checked pull-right" role="button" data-toggle="collapse" data-parent="#accordionjm2" href="#collapseOne12" aria-expanded="true" aria-controls="collapseOne12">
                                                        <i class="glyphicon glyphicon-unchecked"></i>
                                                    </a>-->
                                                </div>
                                            </div>
                                            <div id="collapseOne12" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne12" aria-expanded="true">
                                                <div class="panel-body">
                                                    <ul class="treejm">
                                                        <?php foreach($modulos as $jm=>$modulo){
                                                            if($jm<6){?>
                                                        <?php if($modulo['idmodulo']!= 1){?>
                                                        <label><?= $modulo['modulo']?> </label>
                                                        
                                                        <li class="has">
                                                             <?php   if($modulo['idmodulo']==10 || $modulo['idmodulo']==11){?>
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][ver]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$verjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][ver]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Ver </label>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][editar]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$editarjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][editar]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Exportar</label>
                                                            <?php }else{?>
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][ver]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$verjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][ver]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Ver </label>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][editar]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$editarjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][editar]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Editar - Agregar</label>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][eliminar]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$eliminarjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][eliminar]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Eliminar</label>
                                                            <?php }?>
                                                        </li>
                                                        
                                                        <?php
                                                        }} }?>
                                                      </ul>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="panel-group" id="accordionjm2jm" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne12jm">
                                                <div class="panel-title">
                                                    <!--<strong>Módulos</strong>-->
<!--                                                    <a class="panel-checked pull-right" role="button" data-toggle="collapse" data-parent="#accordionjm2" href="#collapseOne12" aria-expanded="true" aria-controls="collapseOne12">
                                                        <i class="glyphicon glyphicon-unchecked"></i>
                                                    </a>-->
                                                </div>
                                            </div>
                                            <div id="collapseOne12jm" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne12" aria-expanded="true">
                                                <div class="panel-body">
                                                    <ul class="treejm">
                                                        <?php foreach($modulos as $jm=>$modulo){
                                                            if($jm>=6){?>
                                                        
                                                        <label><?= $modulo['modulo']?> </label>
                                                        <li class="has">
                                                             <?php   if($modulo['idmodulo']==10 || $modulo['idmodulo']==11){?>
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][ver]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$verjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][ver]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Ver </label>&nbsp;&nbsp;
                                                            <?php }else{?>
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][ver]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$verjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][ver]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Ver </label>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][editar]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$editarjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][editar]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Editar - Agregar</label>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][eliminar]" value="0">
                                                            <input type="checkbox" <?= in_array($modulo['idmodulo'],$eliminarjm) ? 'checked' : ''?> name="modulos[<?= $modulo['idmodulo']?>][eliminar]" value="1">
                                                            <input type="hidden" name="modulos[<?= $modulo['idmodulo']?>][idmodulo]" value="<?= $modulo['idmodulo']?>">
                                                            <label> Eliminar</label>
                                                            <?php }?>
                                                        </li>
                                                        
                                                        <?php } }?>
                                                      </ul>
                                                    
                                                </div>
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
        <input type="hidden" id="ids" name="perfiles[idperfil]" value="<?= isset($perfil['idperfil']) ? $perfil['idperfil'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
//        Exeperu.validartipo();

        
        $("#formCrearEditarper").submit(function(e){
           e.preventDefault();
           $.ajax({
              url: $(this).attr('action'),
              type:$(this).attr('method'),
              data:$(this).serialize(),
              success:function(response){
                    var jm=JSON.parse(response);
                    
                    if(jm.tipo==1){
                        toastr.success(jm.mensaje,{timeOut:2000});
                        Exeperu.reloadTablePerfiles();
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