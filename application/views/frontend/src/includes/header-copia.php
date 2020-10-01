<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BEURER - <?php if ($varify_product == 1) { echo $product['pagetitle']; }elseif($varify_product == 0){ echo $pagina['pagetitle']; }else{ echo $category[0]['titulo']; } ?></title>
    <meta name="description" content="<?php if ($varify_product == 1) { echo $product['meta_description']; }elseif($varify_product == 0){ echo $pagina['meta_description']; } ?>"/>
    <meta name="keywords" content="<?php if ($varify_product == 1) { echo $product['meta_keyword']; }elseif($varify_product == 0){ echo $pagina['meta_keyword']; } ?>"/>
    <meta property="og:title" content="<?php if ($varify_product == 1) { echo $product['og_title']; }elseif($varify_product == 0){ echo $pagina['og_title']; } ?>" />
    <meta property="og:description" content="<?php if ($varify_product == 1) { echo $product['og_description']; }elseif($varify_product == 0){ echo $pagina['og_description']; } ?>" />
    <meta property="og:image" content="<?php if ($varify_product == 1) { echo $product['og_image']; }elseif($varify_product == 0){ echo $pagina['og_imagen']; } ?>" />

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/logos/favicon.ico'); ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">    
    <link rel="stylesheet" href="<?= base_url('assets/css/app_nuevo.css'); ?>">
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
                                    <a href="<?php echo $confif['facebook']; ?>" class="icn icon-h icon-facebook"></a>
                                    <a href="<?php echo $confif['instagram'] ?>" class="instg"><img src="<?= base_url('assets/images/icons/instagram.svg'); ?>" alt=""
                                            class="icn icon-instg"></a>
                                    <a href="<?php echo $confif['youtube'] ?>" class="icn icon-h icon-youtube"></a>
                                </li>
                                <li class=""><a href="<?php echo $confif['whatsapp'] ?>" class="icon-h icon-wts"></a><span
                                        class="font-nexaregular n-phone visible-lg"><?php echo $confif['numero_t']; ?></span></li>
                            </ul>
                        </div>
                        <div class="col-xs-7 col-sm-4 pos-mob">
                            <div class="img-logo">
                                <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/logos/logo.png'); ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-4 pos-inh box-search">
                            <div class="text-right txt-mob">
                                <form class="div-search d-in-block" method="POST" action="<?= base_url('productos/resultado/') ?>">
                                    <input type="text" class="input-search search_get" name="search_get" placeholder="¿Qué estas buscando?" autocomplete="off">
                                    <span class="icon-h icon-lupa btn-search"></span>
                                    <button type="submit" class="bsc-btn hidden-md hidden-lg font-nexaregular">BUSCAR</button>
                                </form>
                                <i id="button-menu" class="icon-hamb-open"></i>
                               <div class="result_buscador">
                                   <ul id="show_result">
                                        
                                   </ul>
                               </div>
                            </div>
                            
                        </div>
                        
                        <div class="menu-hamb">
                            <div class="container">
                                <div class="row">
                                    <ul class="col-xs-12 col-md-5 visible-md visible-lg">
                                        <li><a href="<?= base_url('salud'); ?>" class="link-menu-hamb font-nexaheavy">salud</a></li>
                                        <li><a href="<?= base_url('bienestar'); ?>" class="link-menu-hamb font-nexaheavy">bienestar</a></li>
                                        <li><a href="<?= base_url('belleza'); ?>" class="link-menu-hamb font-nexaheavy">belleza</a></li>
                                        <li><a href="<?= base_url('actividad'); ?>" class="link-menu-hamb font-nexaheavy">actividad</a></li>
                                        <li><a href="<?= base_url('linea-bebe'); ?>" class="link-menu-hamb font-nexaheavy">línea bebé</a></li>
                                    </ul>
                                    <ul class="col-xs-12 col-md-5 visible-md visible-lg">
                                        <li><a href="<?php echo base_url('nosotro'); ?>s" class="link-menu-hamb font-nexaheavy">quienes somos</a></li>
                                        <li><a href="<?php echo base_url('contactanos'); ?>" class="link-menu-hamb font-nexaheavy">Contacto</a></li>
                                        <li><a href="#" class="font-nexaheavy nolink">Ayuda al cliente:</a>
                                            <ul class="sub-m">
                                                <li><a href="<?php echo base_url('preguntas-frecuentes'); ?>" class="link-subm-hamb font-nexaregular">FAQ</a></li>
                                                <!-- <li><a href="<?php echo base_url('instrucciones-de-uso'); ?>" class="link-subm-hamb font-nexaregular">Instrucciones de uso</a> --></li>
                                                <li><a href="<?php echo base_url(''); ?>centro-de-descargas" class="link-subm-hamb font-nexaregular">Centro de descargas</a></li>
                                                <li><a href="<?php echo base_url('terminos-y-condiciones'); ?>" class="link-subm-hamb font-nexaregular">Términos y condiciones</a></li>
                                                <li><a href="<?php echo base_url('politicas-de-privacidad'); ?>" class="link-subm-hamb font-nexaregular">Políticas de privacidad</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="menu-mobile container-fluid visible-xs visible-sm">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <ul class="list-unstyled">
                                                     <!-- MENU MOBILE - SALUD -->
                                                    <?php 
                                                        $icon = array('', 'icon-salud', 'icon-bienestar', 'icon-belleza', 'icon-actividad', 'icon-linea-bb');
                                                        $menu_bg = array('', 'menu-salud', 'menu-bienestar', 'menu-belleza', 'menu-actividad', 'menu-bebe');
                                                        $link = array('', 'salud/', 'bienestar/', 'belleza/', 'actividad/', 'linea-bebe/');
                                                        $num = 1;
                                                        if ($menu['menu_list']) {
                                                            foreach ($menu['menu_list'] as $row) {

                                                         
                                                    ?>
                                                        <li class="nav-header"> 
                                                            <a href="#" data-toggle="collapse" data-target="#<?= $menu_bg[$num]; ?>">
                                                                <h5 class="name-prod"><i class="icon-mob <?= $icon[$num]; ?>"></i><?= $row['cat']; ?>  <i class="icon-arrow-m-mobile"></i></h5>
                                                            </a>
                                                            <ul class="subm-nav-header collapse" id="<?= $menu_bg[$num]; ?>">
                                                                <?php if ( isset($row['subcat']) ): ?>
                                                                <?php foreach ($row['subcat'] as $value): ?>
                                                                <li class="item-subm-nav">
                                                                    <a class="link-subm-nav" href="<?php echo base_url($link[$num].$value['url']); ?>" data-toggle="collapse" data-target="#<?php echo $value['url'] ?>">
                                                                        <?= $value['titulo']; ?>
                                                                    </a>
                                                                </li>    
                                                                <?php endforeach ?>
                                                                <?php endif ?>
                                                                
                                                              
                                                            </ul>
                                                        </li>
                                                    <?php  
                                                            $num++;
                                                           }
                                                        }
                                                    ?>



                                                    
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
                                                <li class="item-nav-enl font-nexaheavy"><a href="<?php echo base_url('nosotros'); ?>">Quienes Somos</a></li>
                                                <li class="item-nav-enl font-nexaheavy"><a href="<?php echo base_url('contacto') ?>">Contacto</a></li>
                                                <li class="item-nav-enl font-nexaheavy"><a href="<?php echo base_url('ayuda') ?>">Ayuda al Cliente</a>
                                                    <ul>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="<?php echo base_url('preguntas-frecuentes'); ?>">FAQ</a></li>
                                                        <!-- <li class="subm-nav-enl font-nexaregular"><a href="<?php echo base_url('instrucciones-de-uso'); ?>">Instrucciones de Uso</a></li> -->
                                                        <li class="subm-nav-enl font-nexaregular"><a href="<?php echo base_url('centro-de-descargas'); ?>">Centro de descargas</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="<?php echo base_url('terminos-y-condiciones'); ?>">Términos y condiciones</a></li>
                                                        <li class="subm-nav-enl font-nexaregular"><a href="<?php echo base_url('politicas-de-privacidad'); ?>">Políticas de privacidad</a></li>
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
                        <?php
                            $icon = array('', 'icon-salud', 'icon-bienestar', 'icon-belleza', 'icon-actividad', 'icon-linea-bb');
                            $menu_bg = array('', 'menu-salud', 'menu-bienestar', 'menu-belleza', 'menu-actividad', 'menu-bebe');
                            $link = array('', 'salud/', 'bienestar/', 'belleza/', 'actividad/', 'linea-bebe/');
                            $num = 1;
                            if ($menu['menu_list']) {
                                # code...
                            
                                foreach ($menu['menu_list'] as $row) {
                        ?>
                        <li class="item-nav d-menu d-menu<?= $num; ?> text-uppercase font-nexabold ">
                            <a id="salud-php" href="<?= base_url('salud'); ?>" class="link-nav"><span class="icon-nav <?= $icon[$num]; ?>"></span><?= $row['cat']; ?></a>
                            <ul class="submenu- ">
                                <li>
                                    <div class="menus menu-salud col-xs-12 ">
                                        <div class="container">
                                            <div class="row ">
                                                <div class="col-xs-3 visible-lg">
                                                    <div class="content-img-menu">
                                                        <img src="<?= base_url(); ?>assets/images/<?= $menu_bg[$num]; ?>.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-table-12">
                                                    <div class="info-subm">
                                                        <div class="div content-ttl-prd">
                                                            <a href="<?= base_url($link[$num]); ?>">
                                                            <i class="icon-rep <?= $icon[$num]; ?>"></i>
                                                            <h2 class="ttl-prd font-nexaheavy mt-0"><?= $row['cat']; ?></h2>
                                                            </a>
                                                            
                                                        </div>
                                                        <div class="container cont-menudesplegable">
                                                            <div class="row">
                                                                <?php 
                                                                if($row['subcat']){
                                                                    foreach ($row['subcat'] as $low) { 
                                                                ?>
                                                                <div class="col-sm-4 item-desplegable"><a href="<?= base_url($link[$num]).$low['url']; ?>"><?= $low['titulo']; ?></a></div>
                                                                 <?php 
                                                                    }
                                                                } 
                                                                ?>
                                                            </div>
                                                        </div>



                                                        <!--div class="div-scroll">                                                

                                                            <ul class="list-submenu">
                                                                <?php 
                                                                if($row['subcat']){
                                                                    foreach ($row['subcat'] as $low) { 
                                                                ?>
                                                        
                                                                <li class="col-sm-4 item-submenu">
                                                                    <a href="<?= base_url($link[$num]).$low['url']; ?>"><span class="span-item-sub"><?= $low['titulo']; ?></span></a>
                                                                </li>
                                                                <?php 
                                                                    }
                                                                } 
                                                                ?>
                                                               
                                                            </ul>

                                                        </div-->



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="icon-cerrar"></div>
                            </ul>                           
                        </li>
                        <?php
                                $num++;
                                }
                            }
                        ?>
                    </ul>
                    <ul class="carrousel-header visible-xs">
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('salud'); ?>"><i class="icon-h-cars icon-salud"></i> salud</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('bienestar'); ?>"><i class="icon-h-cars icon-bienestar"></i> bienestar</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('belleza'); ?>"><i class="icon-h-cars icon-belleza"></i> belleza</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('actividad'); ?>"><i class="icon-h-cars icon-actividad"></i> actividad</a></li>
                        <li class="item-carrosuel-h font-bold"><a href="<?= base_url('linea-bebe'); ?>"><i class="icon-h-cars icon-linea-bb"></i> linea bebé</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
