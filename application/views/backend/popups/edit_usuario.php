<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditaruser" action="manager/usuarios/save" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><strong>Usuario</strong></h4>
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
                    <a href="#sdetalle" aria-controls="detalle" role="tab" data-toggle="tab">Accesos</a>
                </li>
                <li>
                    <a href="#sdatos" aria-controls="descripcion" role="tab" data-toggle="tab">Datos personales</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="sdetalle">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Usuario</label>
                                        <input type="text" id="username" class="form-control" name="sys_users[username]" placeholder="Ingrese nombre de usuario" value="<?= isset($usuario['username']) ? $usuario['username'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Alias</label>
                                        <input type="text" id="alias" class="form-control" name="sys_users[alias]" placeholder="Ingrese alias de usuario" value="<?= isset($usuario['alias']) ? $usuario['alias'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group required">
                                        <label class="control-label">Perfil</label>
                                        <select class="form-control" id="idperfil" name="sys_users[idperfil]">
                                            <option value="">Seleccione perfil...</option>
                                            <?php if(isset($perfiles) && !empty($perfiles)){
                                                foreach($perfiles as $perfil){?>
                                            <option <?= ($usuario['idperfil'] == $perfil['idperfil'] ? 'selected' : '')?> value="<?= $perfil['idperfil']?>"><?= $perfil['perfil'] ?></option>
                                            <?php 
                                                }
                                                }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group required">
                                        <label class="control-label">Estado</label>
                                        <select class="form-control" name="sys_users[active]">
                                            <option <?= ($usuario['active'] == 1 ? 'selected' : '')?> value="1">Activo</option>
                                            <option <?= ($usuario['active'] == 0 ? 'selected' : '')?> value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php if($usuario['iduser']>0){?>
                                <div class="col-xs-10">
                                    <div class="panel-group" id="accordionjm" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <div class="panel-title">
                                                    Cambiar contraseña
                                                    <a class="panel-checked pull-right" role="button" data-toggle="collapse" data-parent="#accordionjm" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="glyphicon glyphicon-unchecked"></i>
                                                    </a>
                                                    <input type="checkbox" name="changepassword" id="changepassword" value="1" style="display: none;">
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                <?php }?>                    
                                                    <div class="col-xs-<?= $usuario['iduser'] >0 ? '6' : '5'?>">
                                                        <div class="form-group">
                                                            <div class="form-group required">
                                                                <label class="control-label">Contraseña</label>
                                                                <input type="password" id="password" class="form-control" name="user[password]" placeholder="Ingrese contraseña">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-<?= $usuario['iduser'] >0 ? '6' : '5'?>">
                                                        <div id="pswverify" class="form-group">
                                                            <div class="form-group required">
                                                                <label class="control-label">Confirmar contraseña</label>
                                                                <input type="password" class="form-control" id="passwordc" name="user[passwordc]" placeholder="Confirmar contraseña">
                                                                <!--<span class="help-block" id="mensajeerror"></span>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                <?php if($usuario['iduser']>0){?>                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>  
                </div>
                <div role="tabpanel" class="tab-pane" id="sdatos">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group required">
                                        <label class="control-label">Nombres y Apellidos</label>
                                        <input type="text" class="form-control" name="sys_users_profile[firstname]" placeholder="Ingrese sus nombres" value="<?= isset($perfiljm['firstname']) ? $perfiljm['firstname'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group required">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control" name="sys_users_profile[email]" placeholder="Ingrese su email" value="<?= isset($perfiljm['email']) ? $perfiljm['email'] : ''; ?>" >
                                    </div>
                                </div>
<!--                                <div class="col-xs-7">
                                    <div class="form-group required">
                                        <label class="control-label">Apellidos</label>
                                        <input type="text" class="form-control" name="sys_users_profile[lastname]" placeholder="Ingrese sus apellidos" value="<!?= isset($perfiljm['lastname']) ? $perfiljm['lastname'] : ''; ?>" >
                                    </div>
                                </div>-->
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="campo_4">Foto <small style="color: #999;"></small></label>
                                        <div class="input-group">
                                            <input type="text" id="campo_14jmjm" name="sys_users_profile[photo]" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($perfiljm['photo']) ? $perfiljm['photo'] : ''; ?>">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14jmjm', '', '<?= $this->config->item('akey'); ?>');">
                                                    <span class="glyphicon glyphicon-picture"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div style="display: table; width: 100%;">
                                            <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                                <img src="<?= isset($perfiljm['photo']) ? $perfiljm['photo'] : ''; ?>" id="campo_14jmjm-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Teléfono</label>
                                        <input type="text" class="form-control" name="sys_users_profile[phone]" placeholder="Ingrese su telefono" value="<?= isset($perfiljm['phone']) ? $perfiljm['phone'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group required">
                                        <label class="control-label">Celular</label>
                                        <input type="text" class="form-control" name="sys_users_profile[mobil]" placeholder="Ingrese su celular" value="<?= isset($perfiljm['mobil']) ? $perfiljm['mobil'] : ''; ?>" >
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
        <input type="hidden" id="ids" name="sys_users[iduser]" value="<?= isset($usuario['iduser']) ? $usuario['iduser'] : '';?>">
        <input type="hidden" id="idsp" name="sys_users_profile[idprofile]" value="<?= isset($perfiljm['idprofile']) ? $perfiljm['idprofile'] : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
//        Exeperu.validartipo();
        $('#accordionjm').on('show.bs.collapse hide.bs.collapse', function (ev) {
            var boton = $(ev.currentTarget).find('.panel-checked i.glyphicon');
            var checked = $('#changepassword');

            if (ev.type == 'show') {
                boton.removeClass('glyphicon-unchecked').addClass('glyphicon-check');
                $('#changepassword').prop('checked', true);
            } else {
                boton.removeClass('glyphicon-check').addClass('glyphicon-unchecked');
                $('#changepassword').prop('checked', false);
            }
        });
        
        $("#formCrearEditaruser").submit(function(e){
           e.preventDefault();
           $.ajax({
              url: $(this).attr('action'),
              type:$(this).attr('method'),
              data:$(this).serialize(),
              success:function(response){
                    //console.log(response); return false;
                    var jm=JSON.parse(response);
                    
                    if(jm.tipo==1){
                        toastr.success(jm.mensaje,{timeOut:2000});
                        Exeperu.reloadTableUsers();
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