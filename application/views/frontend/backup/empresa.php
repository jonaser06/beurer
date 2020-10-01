<?php
    $pagetitle = $pagina['pagetitle'];
    $pagetitle_en = $pagina['pagetitle_en'];
    $meta_description = $pagina['meta_description'];
    $meta_description_en = $pagina['meta_description_en'];
    $meta_keyword = $pagina['meta_keyword'];
    $meta_keyword_en = $pagina['meta_keyword_en'];
    $og_title = $pagina['og_title'];
    $og_title_en = $pagina['og_title'];
    $og_description = $pagina['og_description'];
    $og_description_en = $pagina['og_description'];
    $og_imagen = $pagina['og_imagen']; 
    include 'src/includes/header.php'
?>
    <main class="main-company">
        <!--BANNER-->
        <section class="sct-banner container-fluid px-0 d-flex justify-content-center wrapper-ancla">
            <img class="bg-shadow" src="<?php echo base_url(); ?>assets/images/sombra.png" alt="">
            <div class="content-img-banner vh">
                <img src="<?php echo base_url().$contenido['img_emp']; ?>" alt="">
            </div>
            <div class="content-text-banner container d-flex flex-column justify-content-end wow fadeInLeft">
                <h1 class="title-big-banner titles-big"><?= ($lang == 'es/')? $contenido['titulo_img']:$contenido['titulo_img_en']; ?></h1>
                <span class="subtitle-banner font-titles-md"><?= ($lang == 'es/')? $contenido['titulo_img_02'] : $contenido['titulo_img_02_en']; ?></span>
            </div>
            <a href="#inf-company" data-ancla="inf-company" class="content-ancla d-none d-lg-block">
                <h1 class="h1-text-Rotate font-internas color-white"><?= ($lang == 'es/')? 'Más información' : 'More information'; ?></h1>
                <i class="color-white icon-flecha"></i>
            </a>
   
            
        </section>
        <!--DESCRIPTION EMPRESA-->
        <div class="content-bg-spinner overflow-h" id="inf-company">
            <section class="section-sct-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-lg-11">
                                    <div class="row justify-content-center">
                                        <div class="col-12 content-description px-0 d-flex flex-column wow fadeInLeft">
                                            <i class="icon-descr icon-suministro"></i>
                                            <h1 class="titles-big color-secondary"><?php echo ($lang == 'es/')? $contenido['emp_h1'] : $contenido['emp_h1_en']; ?></h1>
                                            <span class="span-desc font-internas"><?php echo ($lang == 'es/')? $contenido['emp_h3'] : $contenido['emp_h3_en']; ?></span>
                                            <span class="subtitle-internas font-titles-md"><?php echo ($lang == 'es/')? $contenido['emp_h3_02'] : $contenido['emp_h3_02_en']; ?></span>
                                        </div>
                                        <div class="col-12 col-xl-11 wow fadeInLeft">
                                            <p class="font-internas">
                                                <?php echo ($lang == 'es/')? $contenido['emp_textarea'] : $contenido['emp_textarea_en']; ?>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="content-img wow zoomIn">
                                <img src="<?php echo base_url().$contenido['imagen_emp']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="sct-mv">
                <div class="container">
                    <div class="row">
                        <div class="col-12 content-mv">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6 wrapper-img-mv wow zoomIn">
                                    <div class="container-img-mv">
                                        <img src="<?php echo base_url().$contenido['vision_img']; ?>" alt="img/vission">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5 wow fadeInRight">
                                    <h1 class="title-mv titles-big"><?php echo ($lang == 'es/')? $contenido['vision_titulo'] : $contenido['vision_titulo_en']; ?></h1>
                                    <p class="font-internas"><?php echo ($lang == 'es/')? $contenido['vision_content'] : $contenido['vision_content_en']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 content-mv">
                            <div class="row align-items-center justify-content-end">
                                <div class="col-12 col-lg-5 textR wow fadeInLeft">
                                    <h1 class="title-mv titles-big"><?php echo ($lang == 'es/')? $contenido['mision_titulo'] : $contenido['mision_title_en']; ?></h1>
                                    <p class="font-internas"><?php echo ($lang == 'es/')? $contenido['mision_content'] : $contenido['mision_content_en']; ?></p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="wrapper-img-mv W-img-mission wow zoomIn">
                                        <div class="container-img-mv container-img-mission">
                                            <img src="<?php echo base_url().$contenido['mision_img']; ?>" alt="img/mission">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="forma-spinner fs-vss" src="<?php echo base_url(); ?>assets/images/icons/forma.svg" alt="">
                <img class="forma-spinner fs-mss" src="<?php echo base_url(); ?>assets/images/icons/forma.svg" alt="">
            </section>
            <img class="forma-spinner" src="<?php echo base_url(); ?>assets/images/icons/forma.svg" alt="">
        </div>
        
    </main>
    <?php
        include 'src/includes/footer.php'
    ?>
</body>

</html>