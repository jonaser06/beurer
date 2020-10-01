<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INNOVATIVE FOOD SOLUTIONS - <?= ($lang == 'es/') ? $pagetitle : $pagetitle_en ?> </title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/images/logo-ifs.ico" />
    <meta name="description" content="<?= ($lang == 'es/') ? $meta_description : $meta_description_en ?>">
    <meta name="keywords" content="<?= ($lang == 'es/') ? $meta_keyword : $meta_keyword_en ?>">
    <meta name="author" content="EXE MARKETING DIGITAL INTEGRADO" />
    <meta name="copyright" content="INNOVATIVE FOOD SOLUTIONS" />
    <meta name="language" content="ES" />
    <meta name="robots" content="index,follow" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
</head>

<body>
    <?php 
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));    
    ?>
    <header class="header">
        <img class="bg-logo" src="<?php echo base_url(); ?>assets/images/bg-logo.png" alt="bg/logo">
        <div class="logo">
            <a href="<?php echo ($lang == 'es/')?  base_url('es/') : base_url() ; ?>">
                <img class="img-logo" src="<?php echo base_url();  ?>assets/images/logo-innovative.png" alt="logo/innovative">
            </a>
        </div>
        <i id="button-menu" class="icon-hamburger"></i>

        <div class="inner-header container">
            <div class="content-menu floatR">
                <div class="phonesHeader textR">
                    <i class="icon-phone-h"></i>
                    <a class="aPhone aPhoneOne font-titles-md" href="tel:+34648887963"><span><?= $informacion['telefono_1'] ?></span></a>
                    <a class="aPhone font-titles-md" href="tel:+34915789360"><span><?= $informacion['telefono_2'] ?></span></a>
                    <?php if($lang == 'es/'){ ?>
                        <a href="<?= base_url(); ?>" class="aPhone lenguage font-titles-md color-white"><span>EN</span></a>
                    <?php }else{ ?>
                        
                        <a href="<?= base_url('es/'); ?>" class="aPhone lenguage font-titles-md color-white"><span>ES</span></a>
                    <?php } ?>
                </div>
                <nav class="navbar">
                    <ul class="navbarList floatR">
                        <!-- Menu -->
                            <li class="navbarItem  <?= in_array('empresa', $uriSegments ) ? 'active' : ''; ?>">
                                <a class="navbarLink font-titles-md" href="<?= base_url(); ?><?= ($lang == 'es/')?'es/':''; ?>empresa">
                                    <?= ($lang == 'es/')?'empresa':'company'; ?>
                                </a>
                            </li>
                                <li class="navbarItem  <?= (in_array('industria-alimentaria', $uriSegments )
                                                            or in_array('nutricion-y-salud', $uriSegments )
                                                            or in_array('cuidado-personal', $uriSegments )
                                                            or in_array('cuidado-del-hogar', $uriSegments ))? 'active' : ''; ?>">
                                    <a class="navbarLink font-titles-md" href="#">
                                        <?= ($lang == 'es/')?'productos':'products'; ?>
                                    </a>
                                    <div class="submenu">
                                        <div class="wrapper-submenu">
                                            <ul class="tabs floatL container">
                                                <li class="tab-item  <?= in_array('industria-alimentaria', $uriSegments ) ? 'active' : ''; ?>">
                                                    <a class="tab-link textUppercase font-titles-md"
                                                        href="<?= base_url(); ?><?= ($lang == 'es/')?'es/':''; ?>industria-alimentaria" data-name="#tab1">
                                                        <?= strip_tags(($lang == 'es/')? $categoria['categoria']:$categoria['categoria_en']) ?>
                                                            
                                                    </a>
                                                </li>
                                                <li class="tab-item  <?= in_array('cuidado-personal', $uriSegments ) ? 'active' : ''; ?>"><a class="tab-link textUppercase font-titles-md" href="<?= base_url(); ?><?= ($lang == 'es/')?'es/':''; ?>cuidado-personal"
                                                        data-name="#tab2"><?= strip_tags(($lang == 'es/')? $categoria['cuid_categoria']:$categoria['cuid_categoria_en']) ?></a></li>
                                                <li class="tab-item  <?= in_array('nutricion-y-salud', $uriSegments ) ? 'active' : ''; ?>"><a class="tab-link textUppercase font-titles-md" href="<?= base_url(); ?><?= ($lang == 'es/')?'es/':''; ?>nutricion-y-salud"
                                                        data-name="#tab3"><?= strip_tags(($lang == 'es/')? $categoria['nutri_categoria']:$categoria['nutri_categoria_en']) ?></a></li>
                                                <li class="tab-item  <?= in_array('cuidado-del-hogar', $uriSegments ) ? 'active' : ''; ?>"><a class="tab-link textUppercase font-titles-md" href="<?= base_url(); ?><?= ($lang == 'es/')?'es/':''; ?>cuidado-del-hogar"
                                                        data-name="#tab4"><?= strip_tags(($lang == 'es/')? $categoria['hogar_categoria']:$categoria['hogar_categoria_en']) ?></a></li>
                                            </ul>

                                            <div class="secciones floatL">
                                                <div class="tab-img" id="tab1">
                                                    <img class="wow fadeIn" src="<?php echo base_url(); ?>assets/images/internas/bajas/ind-alimentaria-int1.jpg" alt="">
                                                </div>
                                                <div class="tab-img" id="tab2">
                                                    <img class="wow fadeIn" src="<?php echo base_url(); ?>assets/images/internas/bajas/cuidado-personal1.jpg" alt="">
                                                </div>
                                                <div class="tab-img" id="tab3">
                                                    <img class="wow fadeIn" src="<?php echo base_url(); ?>assets/images/internas/bajas/nutricion-1.jpg" alt="">
                                                </div>
                                                <div class="tab-img" id="tab4">
                                                    <img class="wow fadeIn" src="<?php echo base_url(); ?>assets/images/internas/bajas/limpieza.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="navbarItem  <?= (in_array('garantizamos-el-despacho.php', $uriSegments ) 
                                                            or in_array('asesoria-tecnica', $uriSegments )
                                                            or in_array('calidad-de-productos', $uriSegments )
                                                            or in_array('condiciones-de-pago', $uriSegments )
                                                            or in_array('informacion-de-mercado', $uriSegments )
                                                            or in_array('informacion-de-tendencias', $uriSegments )) ? 'active' : ''; ?>"><a class="navbarLink font-titles-md" href="garantizamos-el-despacho"><?= ($lang == 'es/')?'servicios':'services'; ?></a></li>
                                <li class="navbarItem  <?= in_array('clientes', $uriSegments ) ? 'active' : ''; ?>"><a class="navbarLink font-titles-md" href="<?= base_url(); ?><?= ($lang == 'es/')?'es/':''; ?>clientes"><?= ($lang == 'es/')?'clientes':'customers'; ?></a>
                                </li>
                                <li class="navbarItem  <?= in_array('contacto', $uriSegments ) ? 'active' : ''; ?>"><a class="navbarLink font-titles-md" href="<?= base_url(); ?><?= ($lang == 'es/')?'es/':''; ?>contacto"><?= ($lang == 'es/')?'contacto':'contact'; ?></a>
                                </li>

                        
                    </ul>
                </nav>
            </div>
        </div>
    </header>