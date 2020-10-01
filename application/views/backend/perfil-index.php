<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->load->view('backend/chunks/head', '', TRUE); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php
            echo $this->load->view('backend/chunks/header', '', TRUE);

            echo $this->load->view('backend/chunks/sidebar', array('active' => ''), TRUE);
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Perfil
                        
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <form id="inputs_pagina" action="manager/perfil/guardar" method="post">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#perfil_tab" data-toggle="tab" aria-expanded="false">Perfil</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="perfil_tab">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="firstname">
                                                    Nombres
                                                </label>
                                                <input type="text" class="form-control" name="profile[firstname]" id="firstname" value="<?= isset($perfil['firstname']) ? $perfil['firstname'] : ''; ?>">
                                            </div>
<!--                                            <div class="form-group">
                                                <label for="lastname">
                                                    Apellidos
                                                </label>
                                                <input type="text" class="form-control" name="profile[lastname]" id="lastname" value="<!?= isset($perfil['lastname']) ? $perfil['lastname'] : ''; ?>">
                                            </div>-->
                                            <div class="form-group">
                                                <label for="email">
                                                    E-Mail
                                                </label>
                                                <input type="text" class="form-control" name="profile[email]" id="email" value="<?= isset($perfil['email']) ? $perfil['email'] : ''; ?>">
                                            </div>
                                            <?php if($this->manager['user']['superuser']==1){?>
                                            <div class="form-group">
                                                <label for="email">
                                                    Usuario
                                                </label>
                                                <input type="text" class="form-control" name="user[username]" id="username" value="<?= isset($perfil['username']) ? $perfil['username'] : ''; ?>">
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="phone">
                                                    Teléfono
                                                </label>
                                                <input type="text" class="form-control" name="profile[phone]" id="phone" value="<?= isset($perfil['phone']) ? $perfil['phone'] : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobil">
                                                    Celular
                                                </label>
                                                <input type="text" class="form-control" name="profile[mobil]" id="mobil" value="<?= isset($perfil['mobil']) ? $perfil['mobil'] : ''; ?>">
                                            </div>
                                            <?php if($this->manager['user']['superuser']==1){?>
                                            <div class="form-group">
                                                <label></label>
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <div class="panel-title">
                                                                Cambiar Contraseña
                                                                <a class="panel-checked pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    <i class="glyphicon glyphicon-unchecked"></i>
                                                                </a>
                                                                <input type="checkbox" name="changepassword" id="changepassword" value="1" style="display: none;">
                                                            </div>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <label for="password">
                                                                        Nueva Contraseña
                                                                    </label>
                                                                    <input type="password" class="form-control" id="password" name="user[password]" id="password" value="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="passwordc">
                                                                        Confirmar Nueva Contraseña
                                                                    </label>
                                                                    <input type="password" class="form-control" id="passwordc" name="user[passwordc]" id="passwordc" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
<!--                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="campo_4">Foto <small style="color: #999;"></small></label>
                                                    <div class="input-group">
                                                        <input type="text" id="campo_14jmjm" name="profile[photo]" class="form-control" placeholder="Selecciona tu imagen" value="<!?= isset($perfil['photo']) ? $perfil['photo'] : ''; ?>">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('campo_14jmjm', '', '<!?= $this->config->item('akey'); ?>');">
                                                                <span class="glyphicon glyphicon-picture"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div style="display: table; width: 100%;">
                                                        <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
                                                            <img src="<!?= isset($perfil['photo']) ? $perfil['photo'] : ''; ?>" id="campo_14jmjm-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            
                                        </div>
                                        <hr>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <?php
            echo $this->load->view('backend/chunks/footer', '', TRUE);

//            if ($user['manager']['sudo']) {
//                echo $this->load->view('backend/chunks/content-sidebar-sudo', '', TRUE);
//            }
            ?>
        </div>
        <!-- ./wrapper -->

        <?php echo $this->load->view('backend/chunks/scripts', '', TRUE); ?>

        <script>
            $(document).ready(function () {
                $('#accordion').on('show.bs.collapse hide.bs.collapse', function (ev) {
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
                
                $("#inputs_pagina").submit(function(e){
                   e.preventDefault();
                   $.ajax({
                      url:$(this).attr('action'),
                      type:$(this).attr('method'),
                      data:$(this).serializeArray(),
                      success:function(response){
//                         console.log("jm");
                            var jm=JSON.parse(response);
                    
                            if(jm.tipo==1){
                                toastr.success(jm.mensaje,{timeOut:2000});
                                setTimeout("location.href='manager/perfil/editar'", 3000);
//                                window.location.href="manager/perfil/editar";
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
    </body>
</html>