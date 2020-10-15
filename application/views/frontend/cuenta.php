<?php
include 'src\includes\header.php'
?>

<style>
.p_user h3 {
    font-size: 1.2em;
}

.divTableCell {
    width: 33.333%;
}

.divTableRow {
    display: flex;
}

input {
    font-size: .75em;
    text-align: left;
}

@media (min-width: 700px) {
    #panel-user1 {
        display: block !important;
    }
}
</style>

<main class="main-detail-products">
    <!--Inicio de cuerpo-->

    <div class="formulario" style="background-color:transparent;text-align:center;">

        <div class="row cont_datos" id="d_formularios1" align="center"
            style="background-color:white;display:inline-block;width:90%;text-align:left;margin-bottom:1%;">
            <div class="col-md-12" style="color:#161616;display:flex;">

                <img src="<?= base_url('beurer_plantilla/assets/images/user-solid.svg')?>"
                    style="width:80px;height:80x;margin:auto 0;padding:0.5%;border-radius:50%;border:5px solid #c51152;">

                <div style="margin:20px 10px;">
                    <span style="font-size:1.3em;font-family:'nexaregularuploaded_file';">HOLA</span>
                    <p   
                        class="user-name-db"
                        style="margin-top:5px;font-size:1.4em;margin-bottom:10px;font-weight:bold;
                        font-family:'nexaregularuploaded_file';">
                        <?php echo $userData['nombre']." ".$userData['apellido_paterno']." ".$userData['apellido_materno']?>
                        </p>
                </div>

            </div>
        </div>

        <div class="row cont_datos" id="d_formularios1" style="display:inline-block;width:90%;">
            <div id="panel-user1" style="width:27%;float:left;background-color:white;color:#161616;margin-right:1.5%;">
                <ul id="p_users" style="text-align:left;background-color:white;">
                    <li><button id="p_inicio" class="btn btnprimary1 p_user active">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <h3>Inicio</h3>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <h3>></h3< /div>
                        </button></li>
                    <li><button id="p_datosp" class="btn btnprimary1 p_user">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <h3>Datos Personales</h3>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <h3>></h3>
                            </div>
                        </button></li>
                    <li><button id="p_misord" class="btn btnprimary1 p_user">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <h3>Mis Pedidos</h3>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <h3>></h3>
                            </div>
                        </button></li>
                    <li><button id="p_miscomp" class="btn btnprimary1 p_user">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <h3>Mis Comprobantes</h3>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <h3>></h3>
                            </div>
                        </button></li>
                    <li><button id="p_misdir" class="btn btnprimary1 p_user">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <h3>Mis Direcciones</h3>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <h3>></h3>
                            </div>
                        </button></li>
                    <li><button class="btn btnprimary1 p_user"><a href="producto.php">
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <h3>Cerrar Sesión</h3>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <h3>></h3>
                                </div>
                            </a></button></li>

                </ul>
            </div>

            <!-- <div id="info_puser" style="text-align:left;width:71%;min-height:25em;float:left;background-color:white;padding:3% 5%;;color:#161616;transition: all 0.3s ease-out;">
                <div class="row" style="margin:0;display:flex;font-size:1.3em;font-weight:bold;"> 
                <div id="back-section-user" style="font-size:1.6em;margin-right:4%;display:none;width:10%;float:left;border-right:2px solid whitesmoke;">
                <p> < </p>
                </div>
                
                <div id="title-info-user" style="width:90%;float:left;margin:auto 0px;" ><p>Bienvenido al Panel de Administración del Cliente BEURER</p> </div> 
                </div>
                <div id="cont-info-user">
                <h4>En este Panel te ofrecemos la comodidad que mereces, para que puedas administrar todas tus gestiones con nosotros.</h4> <h4>Contamos con 3 secciones a tu disposición:</h4> <p> <ul style="font-size:1.2em;line-height:50px;"> <li>1. Datos Personales</li> <li>2. Mis órdenes</li> <li>3. Mis Direcciones</li> </ul> </p></div>
                            
            </div>             -->

            <div id="info_puser"
                style="text-align:left;width:71%;min-height:25em;float:left;background-color:white;padding:3% 5%;;color:#161616;transition: all 0.3s ease-out;">
                <div class="row" style="margin:0;display:flex;font-size:1.3em;font-weight:bold;">
                    <div id="back-section-user"
                        style="font-size:1.6em;margin-right:4%;display:none;width:10%;float:left;border-right:2px solid whitesmoke;">
                        <p>
                            < </p>
                    </div>

                    <div id="title-info-user" style="width:90%;float:left;margin:auto 0px;">
                        <p>Bienvenido al Panel de Administración del Cliente BEURER</p>
                    </div>
                </div>
                <div id="cont-info-user">

                    <h4>En este Panel te ofrecemos la comodidad que mereces, para que puedas administrar todas tus
                        gestiones con nosotros.</h4>
                    <h4>Contamos con 3 secciones a tu disposición:</h4>
                    <p>
                    <ul style="font-size:1.2em;line-height:50px;">
                        <li>1. Datos Personales</li>
                        <li>2. Mis órdenes</li>
                        <li>3. Mis Direcciones</li>
                    </ul>
                    </p>

                </div>


            </div>
        </div>
    </div>

    <div style="text-align:center !important;">
        <div class="checkbox"
            style="display:inline-block;  border:3px solid #c51152; background-color:whitesmoke; display:none;"
            id="dp_error">
            <div style="display:inline-block; font-size:1.3em; font-weight:bold; margin: 12px 32px;" id="d_error"> -
            </div>
        </div>
    </div>
    <div id="spinner"></div>


    </div>

    </div>


    <div class="linea"></div>

    <br>
    
    </div>
<style>
    #spinner {
        visibility: hidden;
        width: 80px;
        height: 80px;

        border: 2px solid #f3f3f3;
        border-top: 3px solid #f25a41;
        border-radius: 100%;

        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        z-index: 900;
        animation: spin 1s infinite linear;
    }
    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    #spinner.show {
        visibility: visible;
    }

</style>
    <!--Fin de cuerpo-->
    <?php 
    // switch ($userData['tipo_documento']) {
    //     case 'DNI':
    //         $tipo = '1';
    //         break;
    //     case 'PASAPORTE':
    //         $tipo = '2';
    //         break;
    //     case 'CE':
    //         $tipo = '3';
    //         break;
    //     default:
    //         break;
    // }

    ?> 

    <input
    type="hidden" 
    class="dataUser"
    data-id_cliente = <?= $_SESSION['id_cliente']?>
    data-nombre   =<?= $userData['nombre']?>
    data-apellido_paterno =<?= $userData['apellido_paterno']?>
    data-apellido_materno      =<?= $userData['apellido_materno']?>
    data-correo      =<?= $userData['correo']?>
    data-tipo_documento =<?=$userData['tipo_documento']?>
    data-documento     =<?= $userData['documento']?>
    data-telefono     =<?= $userData['telefono']?>
    data-ofertas      =<?= (int)$userData['ofertas']?>
    data-politicas    =<?= (int)$userData['politicas']?>
    >
</main>

<script>
    
    
  let {...userData } = document.querySelector('.dataUser').dataset;
  
   
</script>

<script src="assets/js/registro.js"></script>


<?php

include 'src\includes\footer.php'

?>