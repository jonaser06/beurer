<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BEURER</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logos/favicon.ico"/>
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <?php 
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));    
    ?>
    <div class="wrapper-header">
        <header class="header">
            <div class="container-fluid menu-one px-0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            <ul class="list-rs">
                                <li class="">
                                    <a href="#" class="icn icon-h icon-facebook"></a>
                                    <a href="#" class="instg"><img src="assets/images/icons/instagram.svg" alt=""
                                            class="icn icon-instg"></a>
                                    <a href="#" class="icn icon-h icon-youtube"></a>
                                </li>
                                <li class=""><a href="#" class="icon-h icon-wts"></a><span
                                        class="font-nexaregular n-phone visible-lg">982 700 080</span></li>
                            </ul>
                        </div>
                        <div class="col-xs-7 col-sm-4 pos-mob">
                            <div class="img-logo">
                                <a href="index.php"><img src="assets/images/logos/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-4 pos-inh">
                            <div class="text-right txt-mob">
                                <form class="div-search d-in-block">
                                    <input type="text" class="input-search" placeholder="¿Qué estas buscando?">
                                    <span class="icon-h icon-lupa btn-search"></span>
                                    <button class="bsc-btn hidden-md hidden-lg font-nexaregular">BUSCAR</button>
                                </form>
                                <i id="button-menu" class="icon-hamb-open"></i>
                               
                            </div>
                            
                        </div>
                        
                        <div class="menu-hamb">
                            <div class="container">
                                <div class="row">
                                    <ul class="col-xs-12 col-md-5 visible-md visible-lg">
                                        <li><a href="salud.php" class="link-menu-hamb font-nexaheavy">salud</a></li>
                                        <li><a href="bienestar.php" class="link-menu-hamb font-nexaheavy">bienestar</a></li>
                                        <li><a href="belleza.php" class="link-menu-hamb font-nexaheavy">belleza</a></li>
                                        <li><a href="actividad.php" class="link-menu-hamb font-nexaheavy">actividad</a></li>
                                        <li><a href="linea-bebe.php" class="link-menu-hamb font-nexaheavy">línea bebé</a></li>
                                    </ul>
                                    <ul class="col-xs-12 col-md-5 visible-md visible-lg">
                                        <li><a href="nosotros.php" class="link-menu-hamb font-nexaheavy">quienes somos</a></li>
                                        <li><a href="contactanos.php" class="link-menu-hamb font-nexaheavy">Contacto</a></li>
                                        <li><a href="#" class="link-menu-hamb font-nexaheavy">Ayuda al cliente</a>
                                            <ul class="sub-m">
                                                <li><a href="preguntas-frecuentes.php" class="link-subm-hamb font-nexaregular">FAQ</a></li>
                                                <li><a href="instrucciones-de-uso.php" class="link-subm-hamb font-nexaregular">Instrucciones de uso</a></li>
                                                <li><a href="centro-de-descargas.php" class="link-subm-hamb font-nexaregular">Centro de descargas</a></li>
                                                <li><a href="terminos-y-condiciones.php" class="link-subm-hamb font-nexaregular">Términos y condiciones</a></li>
                                                <li><a href="politicas-de-privacidad.php" class="link-subm-hamb font-nexaregular">Políticas de privacidad</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="menu-mobile container-fluid visible-xs visible-sm">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <ul class="list-unstyled">
                                                     <!-- MENU MOBILE - SALUD -->
                                                    <li class="nav-header"> 
                                                        <a href="#" data-toggle="collapse" data-target="#msalud">
                                                            <h5 class="name-prod"><i class="icon-mob icon-salud"></i>salud  <i class="icon-arrow-m-mobile"></i></h5>
                                                        </a>
                                                        <ul class="subm-nav-header collapse" id="msalud">
                                                            <li class="item-subm-nav">
                                                                <a class="link-subm-nav" href="#" data-toggle="collapse" data-target="#termometros-digitales">termómetros digitales <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="termometros-digitales">
                                                                    <li class="item-int"><a href="termometro-digital1.php">termometro1</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">termometro2</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">termometro3</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">termometro4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a class="link-subm-nav" href="#" data-toggle="collapse" data-target="#medidor-de-glucosa">medidor de glucosa <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="medidor-de-glucosa">
                                                                    <li class="item-int"><a href="termometro-digital1.php">medidor de glucosa1</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">medidor de glucosa2</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">medidor de glucosa3</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">medidor de glucosa4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a class="link-subm-nav" href="#" data-toggle="collapse" data-target="#oximetros">oxímetros <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="oximetros">
                                                                    <li class="item-int"><a href="termometro-digital1.php">oximetro1</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">oximetro2</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">oximetro3</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">oximetro4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a class="link-subm-nav" href="#" data-toggle="collapse" data-target="#nebulizadores">nebulizadores <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="nebulizadores">
                                                                    <li class="item-int"><a href="termometro-digital1.php">nebulizador1</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">nebulizador2</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">nebulizador3</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">nebulizador4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a class="link-subm-nav" href="#" data-toggle="collapse" data-target="#amplificadores-de-audio">amplificadores de audio <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="amplificadores-de-audio">
                                                                    <li class="item-int"><a href="termometro-digital1.php">amplificador1</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">amplificador2</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">amplificador3</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">amplificador4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a class="link-subm-nav" href="#" data-toggle="collapse" data-target="#tensiometro">tensiómetro <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="tensiometro">
                                                                    <li class="item-int"><a href="termometro-digital1.php">tensiometro</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">tensiometro2</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">tensiometro3</a></li>
                                                                    <li class="item-int"><a href="termometro-digital1.php">tensiometro4</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                     <!-- MENU MOBILE - BIENESTAR -->
                                                    <li class="nav-header"> 
                                                        <a href="#" data-toggle="collapse" data-target="#mbienestar">
                                                            <h5 class="name-prod"><i class="icon-mob icon-bienestar"></i>bienestar <i class="icon-arrow-m-mobile"></i></h5>
                                                        </a>
                                                        <ul class="subm-nav-header collapse" id="mbienestar">
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#productos-termicos-adaptables">productos térmicos adaptables <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="productos-termicos-adaptables">
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">productos termicos 1</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">productos termicos 2</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">productos termicos 3</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">productos termicos 4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#balanzas-b">balanzas <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="balanzas-b">
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">balanzas1</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">balanzas2</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">balanzas3</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">balanzas4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#fototerapia">Fototerapia <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="fototerapia">
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">Fototerapia</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">Fototerapia</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">Fototerapia</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">Fototerapia</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#sueño-y-descanso">sueño y descanso <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="sueño-y-descanso">
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">sueño y descanso1</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">sueño y descanso1</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">sueño y descanso1</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">sueño y descanso1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#aire-y-aroma">aire y aroma <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="aire-y-aroma">
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">aire y aroma1</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">aire y aroma2</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">aire y aroma3</a></li>
                                                                    <li class="item-int"><a href="dispositivos-antirronquidos.php">aire y aroma4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#shiatsu-y-masaje">shiatsu y masaje <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="shiatsu-y-masaje">
                                                                    <li class="item-int"><a href="#">shiatsu y masaje1</a></li>
                                                                    <li class="item-int"><a href="#">shiatsu y masaje2</a></li>
                                                                    <li class="item-int"><a href="#">shiatsu y masaje3</a></li>
                                                                    <li class="item-int"><a href="#">shiatsu y masaje4</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- MENU MOBILE - BELLEZA -->
                                                    <li class="nav-header"> 
                                                        <a href="#" data-toggle="collapse" data-target="#m-belleza">
                                                            <h5 class="name-prod"><i class="icon-mob icon-belleza"></i>belleza <i class="icon-arrow-m-mobile"></i></h5>
                                                        </a>
                                                        <ul class="subm-nav-header collapse" id="m-belleza">
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#cepillos-faciales">cepillos faciales <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="cepillos-faciales">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cepillos faciales 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cepillos faciales 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cepillos faciales 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cepillos faciales 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#cuidado-corporal">cuidado corporal <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="cuidado-corporal">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado corporal 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado corporal 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado corporal 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado corporal 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#cuidado-peeling-facial">cuidado peeling facial <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="cuidado-peeling-facial">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado peeling facial 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado peeling facial 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado peeling facial 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado peeling facial 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#cuidado-antiedad">cuidado antiedad <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="cuidado-antiedad">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado antiedad 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado antiedad 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado antiedad 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado antiedad 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#cuidado-del-cabello">cuidado del cabello <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="cuidado-del-cabello">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado del cabello 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado del cabello 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado del cabello 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">cuidado del cabello 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#espejos-cosmeticos">espejos cosméticos <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="espejos-cosmeticos">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">espejos cosmeticos 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">espejos cosmeticos 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">espejos cosmeticos 1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">espejos cosmeticos 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#depiladoras">depiladoras IPL <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="depiladoras">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">depiladores1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">depiladores1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">depiladores1</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">depiladores1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#saunas-faciales">saunas faciales <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="saunas-faciales">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">saunas faciales</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">saunas faciales</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">saunas faciales</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">saunas faciales</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#anticeluliticos">anticelulíticos<i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="anticeluliticos">
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">anticeluliticos</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">anticeluliticos</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">anticeluliticos</a></li>
                                                                    <li class="item-int"><a href="cepillos-faciales1.php">anticeluliticos</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                     <!-- MENU MOBILE - ACTIVIDAD -->
                                                    <li class="nav-header"> 
                                                        <a href="#" data-toggle="collapse" data-target="#m-actividad">
                                                            <h5 class="name-prod"><i class="icon-mob icon-actividad"></i>actividad <i class="icon-arrow-m-mobile"></i></h5>
                                                        </a>
                                                        <ul class="subm-nav-header collapse" id="m-actividad">
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#balanzas-basicas">balanzas basicas <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="balanzas-basicas">
                                                                    <li class="item-int"><a href="balanzas-basicas.php">balanzas basicas 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">balanzas basicas 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">balanzas basicas 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#balanzas-de-diagnostico">balanzas de diágnostico <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="balanzas-de-diagnostico">
                                                                    <li class="item-int"><a href="balanzas-basicas.php">balanzas de diagnostico 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">balanzas de diagnostico 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">balanzas de diagnostico 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#tratamiento-del-dolor">tratamiento del dolor <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="tratamiento-del-dolor">
                                                                    <li class="item-int"><a href="balanzas-basicas.php">tratamiento del dolor 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">tratamiento del dolor 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">tratamiento del dolor 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#electro-estimuladores">electro estimuladores <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="electro-estimuladores">
                                                                    <li class="item-int"><a href="balanzas-basicas.php">electroestimuladores 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">electroestimuladores 1</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">electroestimuladores 1</a></li>

                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#pulsometro">pulsómetro <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="pulsometro">
                                                                    <li class="item-int"><a href="balanzas-basicas.php">pulsometro</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">pulsometro</a></li>
                                                                    <li class="item-int"><a href="balanzas-basicas.php">pulsometro</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                     <!-- MENU MOBILE - LINEA BB -->
                                                    <li class="nav-header"> 
                                                        <a href="#" data-toggle="collapse" data-target="#m-lineabb">
                                                            <h5 class="name-prod"><i class="icon-mob icon-linea-bb"></i>línea bebé <i class="icon-arrow-m-mobile"></i></h5>
                                                        </a>
                                                        <ul class="subm-nav-header collapse" id="m-lineabb">
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#extractores">extractores <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="extractores">
                                                                    <li class="item-int"><a href="extractores.php">extractores 1</a></li>
                                                                    <li class="item-int"><a href="extractores.php">extractores 1</a></li>
                                                                    <li class="item-int"><a href="extractores.php">extractores 1</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#estirilizadores">estirilizadores <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="estirilizadores">
                                                                    <li class="item-int"><a href="extractores.php">estirilizadores 1</a></li> 
                                                                    <li class="item-int"><a href="extractores.php">estirilizadores 1</a></li> 
                                                                    <li class="item-int"><a href="extractores.php">estirilizadores 1</a></li>   
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#balanzas">balanzas <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="balanzas">
                                                                    <li class="item-int"><a href="extractores.php">balanza 1</a></li> 
                                                                    <li class="item-int"><a href="extractores.php">balanza 2</a></li> 
                                                                </ul>
                                                            </li>
                                                            <li class="item-subm-nav">
                                                                <a href="#" class="link-subm-nav" data-toggle="collapse" data-target="#calentador-de-biberones">calentador de biberones <i class="icon-arrow-m-mobile"></i></a>
                                                                <ul class="list-int collapse" id="calentador-de-biberones">
                                                                    <li class="item-int"><a href="extractores.php">calentador de biberones 1</a></li> 
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <!-- OTROS ENLACES -->
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <h2 class="font-nexaheavy ttl-enl"><a href="#">OTROS ENLACES <i class="icon-arrow-m-mobile"></i></a></h2>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="menu-enl">
                                            <h2><i class="icon-arrow-regresar"></i></h2>
                                            <ul class="nav-enl">
                                                <li class="item-nav-enl font-nexaheavy"><a href="nosotros.php">Quienes Somos</a></li>
                                                <li class="item-nav-enl font-nexaheavy"><a href="contacto.php">Contacto</a></li>
                                                <li class="item-nav-enl font-nexaheavy"><a href="#">Ayuda al Cliente</a>
                                                    <ul>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="preguntas-frecuentes.php">FAQ</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="instrucciones-de-uso.php">Instrucciones de Uso</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="centro-de-descargas.php">Centro de descargas</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="terminos-y-condiciones.php">Términos y condiciones</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="politicas-de-privacidad.php">Políticas de privacidad</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-0">
                <nav class="content-nav">
                    <ul class="list-nav h100 hidden-xs">
                        <!-- MENU SALUD -->
                        <li class="item-nav d-menu d-menu1 text-uppercase font-nexabold ">
                            <a id="salud-php" href="salud.php" class="link-nav"><span class="icon-nav icon-salud"></span>salud</a>
                            <ul class="submenu- ">
                                <li>
                                    <div class="menus menu-salud col-xs-12 ">
                                        <div class="container">
                                            <div class="row ">
                                                <div class="col-xs-3 visible-lg d-img-none ">
                                                    <div class="content-img-menu">
                                                        <img src="assets/images/menu-salud.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-table-12">
                                                    <div class="info-subm">
                                                        <div class="div content-ttl-prd">
                                                            <a href="salud.php">
                                                            <i class="icon-rep icon-salud"></i>
                                                            <h2 class="ttl-prd font-nexaheavy mt-0">Salud</h2>
                                                            </a>
                                                            
                                                        </div>
                                                        <ul class="list-submenu">
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">termómetros digitales</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Térmómetros sin contacto
                                                                            FT90</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Termómetro multifuncional
                                                                            FT65</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Termómetro de oído FT55</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Termómetro punta flexible
                                                                            FT15</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">medidor de glucosa</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tiras reactivas GL42</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tiras reactivas
                                                                            GL44/GL50</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Glucómetro GL50</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">Oxímetros</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Oxímetro de pulso PO30</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">NEBULIZADORES</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Nebulizador IH60</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Nebulizador IH21</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">amplificadores de audio</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Audífono amplificador HA50</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Audífono amplificador HA20</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">tensiómetro</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tensiómetro de brazo con
                                                                            bluetooth
                                                                            BM85</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tensiómetro de brazo BM44 </a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tensiómetro de brazo BM35</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tensiómetro de brazo BM26</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tensiómetro de muñeca BC44</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tensiómetro de muñeca BC32</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="icon-cerrar"></div>
                            </ul>
                            
                        </li>
                        <!-- MENU BIENESTAR -->
                        <li class="item-nav d-menu d-menu2 text-uppercase font-nexabold">
                            <a id="bienestar.php" href="bienestar.php" class="link-nav"><span class="icon-nav icon-bienestar"></span>bienestar</a>
                            <ul class="submenu- ">
                                <li>
                                    <div class="menus menu-bienestar col-xs-12">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-3 visible-lg d-img-none">
                                                    <div class="content-img-menu">
                                                        <img src="assets/images/menu-bienestar.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-9 col-table-12">
                                                    <div class="info-subm">
                                                        <div class="div content-ttl-prd">
                                                            <a href="bienestar.php">
                                                                <i class="icon-rep icon-bienestar"></i>
                                                                <h2 class="ttl-prd font-nexaheavy mt-0">bienestar</h2>
                                                            </a>
                                                        </div>
                                                        <ul class="list-submenu">
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">productos térmicos adaptables</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Productos térmicos To Go con batería</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Almohadillas eléctricas</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Calientacamas eléctrico</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Mantas eléctricas</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Calientapiés</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">balanzas</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza para equipaje</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza para cocina</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">Fototerapia</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Lámparas de luz diurna</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Lámparas de infrarrojos</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">sueño y descanso</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">SleepLine</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Sensores de sueño</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Dispositivos antirronquidos</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Luz para despertar</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">aire y aroma</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Purificadores de aire</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Lavadores de aire</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Humidificadores de aire</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Deshumidificadores de aire</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Trmohigrómetros</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">shiatsu y masaje</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cojines y asientos de masajes Shiatsu</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Sillones de masajes Shiatsu</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Masaje corporal</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Masaje para pies</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Stress releaZer</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="icon-cerrar"></div>
                            </ul>
                        </li>
                        <!-- MENU BELLEZA -->
                        <li class="item-nav d-menu d-menu3 text-uppercase font-nexabold">
                            <a href="belleza.php" class="link-nav"><span class="icon-nav icon-belleza"></span>belleza</a>
                            <ul class="submenu- ">
                                <li>
                                    <div class="menus menu-belleza col-xs-12">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-3 visible-lg d-img-none">
                                                    <div class="content-img-menu">
                                                        <img src="assets/images/menu-belleza.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-9 col-table-12">
                                                    <div class="info-subm">
                                                        <div class="div content-ttl-prd">
                                                            <a href="belleza.php">
                                                            <i class="icon-rep icon-belleza"></i>
                                                            <h2 class="ttl-prd font-nexaheavy mt-0">belleza</h2>
                                                            </a>
                                                        </div>
                                                        <ul class="list-submenu">
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">cepillos faciales</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cepillo de limpieza facial FC48</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cepillo de limpieza facial 2 en 1 FC49</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cepillo de limpieza facial FCE60</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cepillo de limpieza facial con luz led FC65</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cepillo de limpieza facial FC95</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">espejos cosméticos</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Espejo cosmético con espejo magnético</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Espejo cosmético con luz y batería</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Espejo cosmético con luz BS49</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Espejo cosmético con luz BS55</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Espejo cosmético con luz BS69</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">cuidado corporal</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cepillo de limpieza corporal FC55</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Limador eléctrico de uñas potátil MP18</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Removedor de callos MP55</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Set de manicure y pedicure MP62</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">cuidado antiedad</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cuidado facial iónico antiedad FC90</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">Saunas faciales</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Sauna facial F50</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Sauna facial iónico FC72</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">cuidado del cabello</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cepillo iónico desenredante HT10 </a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Peine eléctrico antipiojos HT15</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">cuidado Peeling facial</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Equipo de microodermoabrasión FC76</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Equipo de microodermoabrasión FC100</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Limpiador de poros por succión FC40</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">depiladoras IPL</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Depiladora luz pulsada IPL8500</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Depiladora de luz pulsada 10000</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">Anticelulíticos</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Masajeador anticelulitico CM50</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Baston masajeador anticelulítis CM100</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="icon-cerrar"></div>
                            </ul>
                        </li>
                        <!-- MENU ACTIVIDAD -->
                        <li class="item-nav d-menu d-menu4 text-uppercase font-nexabold">
                            <a href="actividad.php" class="link-nav"><span class="icon-nav icon-actividad"></span>actividad</a>
                            <ul class="submenu- ">
                                <li>
                                    <div class="menus menu-actividad col-xs-12">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-3 visible-lg d-img-none">
                                                    <div class="content-img-menu">
                                                        <img src="assets/images/menu-actividad.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-9 col-table-12">
                                                    <div class="info-subm">
                                                        <div class="div content-ttl-prd">
                                                            <a href="actividad.php">
                                                            <i class="icon-rep icon-actividad"></i>
                                                            <h2 class="ttl-prd font-nexaheavy mt-0">actividad</h2>
                                                            </a>
                                                        </div>
                                                        <ul class="list-submenu">
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">BALANZAS básicas</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de peso básica GS14</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de peso básica GS206</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de peso antideslizante GS300</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de peso básica PS25</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de peso básica PS160</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">BALANZAS DE diagnóstico</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de diagnóstico BG17</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de diagnóstico BG51</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de diagnóstico BG55</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de diagnóstico BF105</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza de diagnóstico BF850</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">tRATAMIENTO DEL DOLOR</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tens para el tobillo EM27</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tens para la muñeca y el brazo EM28</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Tens para el codo y rodilla EM29</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cinturón tonificador abdominal EM37</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cinturón lumbar EM38</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Cinturón tonificador abdominal y lumbar</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">Electroestimuladores</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Electroestimulador digital tens EMS49</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Electroestimulador digital tens EMS80</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Entrenador EMS EM95</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">pulsometro</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Pulsómetro con correa pectoral PM25</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="icon-cerrar"></div>
                            </ul>
                        </li>
                        <!-- MENU LINEA BB -->
                        <li class="item-nav d-menu d-menu5 text-uppercase font-nexabold">
                            <a href="linea-bebe.php" class="link-nav"><span class="icon-nav icon-linea-bb"></span>línea bebé</a>
                            <ul class="submenu- ">
                                <li>
                                    <div class="menus menu-linea-bb col-xs-12">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-3 visible-lg d-img-none">
                                                    <div class="content-img-menu">
                                                        <img src="assets/images/menu-bebe.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-9 col-table-12">
                                                    <div class="info-subm">
                                                        <div class="div content-ttl-prd">
                                                            <a href="linea-bebe.php">
                                                            <i class="icon-rep icon-linea-bb"></i>
                                                            <h2 class="ttl-prd font-nexaheavy mt-0">Línea bebé</h2>
                                                            </a>
                                                        </div>
                                                        <ul class="list-submenu">
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">extractores</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Extractor de leche manual BY15</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Extractor de leche eléctrico BY40</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Extractor de leche eléctrico BY70</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">estirilizadores</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Estirilizador de biberones para microondas JBY40</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Estirilizador de biberones BY76</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">balanzas</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza para bebé BY80</a>
                                                                    </li>
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Balanza para bebé BY90</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="item-submenu">
                                                                <span class="span-item-sub">calentador de biberones</span>
                                                                <ul class="list-prd-sub">
                                                                    <li class="item-pdr-sub">
                                                                        <a href="#" class="link-pdr-sub">Calentador de biberones BY52</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="icon-cerrar"></div>
                            </ul>
                        </li>
                    </ul>
                    <ul class="carrousel-header visible-xs">
                        <li class="item-carrosuel-h font-bold"><a href="salud.php"><i class="icon-h-cars icon-salud"></i> salud</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="bienestar.php"><i class="icon-h-cars icon-bienestar"></i> bienestar</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="belleza.php"><i class="icon-h-cars icon-belleza"></i> belleza</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="actividad.php"><i class="icon-h-cars icon-actividad"></i> actividad</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="linea-bebe.php"><i class="icon-h-cars icon-linea-bb"></i> linea bebé</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>