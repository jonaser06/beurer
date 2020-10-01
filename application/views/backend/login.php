<!DOCTYPE html>
<html>
    <head>
        <?= $this->load->view('backend/chunks/head', array(), TRUE) ?>
        <style>
            body,html{height: 100%;}
            .login-page{
                background-image: url(assets/images/bg-login.jpg);
                background-color: #fff;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
            /*.login-box, .register-box {*/
            .cont-login{position: absolute;top: 0px;left: 0px; height: 100%;background-color: #c51152;}
            .login-box {
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                /*top: 480px;*/
                bottom: 150px;
                margin: auto;
                width: 341px;
                height: 250px;
            }
            .login-box-footer{

            }
            .credits-exe{
                display: table;
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 50px;
                /*background-color: rgba(255,255,255,0.5);*/
                background-color: transparent;
            }
            .credits-exe .credits-content{
                display: table-cell;
                vertical-align: middle;
                padding: 0 15px;
                text-transform: uppercase;
                font-family: "arial";
                font-size: 10px;
                color: skyblue;
            }
            .credits-exe .credits-content a{
                color: #337ab7;
                text-decoration: underline;
            }
            .titulo{font-size: 27px; color: #ffffff; width:100%;text-align: center; }
            .subtitulo{font-size: 15px;color: #ffffff;text-align: center;}
            .login-box-body{background: inherit!important;}
            .login-box-body .form-control-feedback{color: #c51152;}
            @media (max-width: 768px){
              .login-box{width: 90%;}  
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="col-xs-12 col-sm-5 col-md-4 cont-login">
          <div class="login-box">
                <div class="login-logo">
                    <!--a href="<?php echo $this->config->item('base_url') ?>">
                        <img src="<?= base_url(); ?>assets/images/logo-beurer-login.png" style="width:80%;height:80%;">
                    </a-->
                    <img src="<?= base_url(); ?>assets/images/logo-beurer-login.png" style="width:80%;height:80%;">
                </div>
                <h1 class="titulo">MANAGER</h1>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="subtitulo">Inicia Sesión</p>
                    <form id="loginjm" action="manager/login" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <!--                            <div class="checkbox icheck">
                                                                <label>
                                                                    <input type="checkbox"> Remember Me
                                                                </label>
                                                            </div>-->
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-box-body -->
            </div>  
        </div>
        
        
        <!-- /.login-box -->
        <div class="credits-exe">
            <div class="credits-content text-right">
                Power by <a href="http://exe.pe" target="_blank">EXE.PE</a>
            </div>
        </div>

        <?= $this->load->view('backend/chunks/scripts', array(), TRUE) ?>

        <script>
            $(function () {
                
                $("#loginjm").submit(function(e){
                   e.preventDefault();
                   $.ajax({
                      url:$(this).attr('action'),
                      type:$(this).attr('method'),
                      data:$(this).serialize(),
                      success:function(response){
//                          console.log(response); return false;
                            var jm=JSON.parse(response);
                    
                            if(jm.tipo==1){
                                toastr.success(jm.mensaje,{timeOut:2000});
//                                window.location.href="manager/dashboard";
                                setTimeout("location.href='manager/paginas'", 2000);
                            }else{
                                toastr.error(jm.mensaje,{timeOut:5000});
                                var errores=JSON.parse(jm.errores); 
                                $.each( errores, function( key, value ) {
                                    $("#"+value+"").parent().addClass("has-error");
                                });
                            }
                      }
                   });
                });
//                $('input').iCheck({
//                    checkboxClass: 'icheckbox_square-blue',
//                    radioClass: 'iradio_square-blue',
//                    increaseArea: '20%' // optional
//                });
            });
        </script>
    </body>
</html>
