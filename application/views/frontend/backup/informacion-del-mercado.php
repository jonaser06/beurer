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
    <main class="">
        <!--BANNER-->
        <section class="sct-banner container-fluid px-0 d-flex justify-content-center">
            <img class="bg-shadow" src="<?php echo base_url(); ?>assets/images/sombra.png" alt="">
            <div class="content-img-banner">
                <img src="<?php echo base_url().$relacion['mercado_bg']; ?>" alt="">
            </div>
            <div class="content-text-banner container d-flex flex-column justify-content-end wow fadeInLeft">
                <h1 class="title-big-banner titles-big textUppercase"><?= ($lang == 'es/')? $contenido['h1']:$contenido['h1_en']; ?></h1>
                <span class="subtitle-banner font-titles-md textUppercase"><?= ($lang == 'es/')? $contenido['span']:$contenido['span_en']; ?></span>
            </div>
        </section>
        <?php
            include 'src/includes/navbar-services-int.php'
        ?>
        <section class="sct-info-services overflow-h">
            <div class="container px-0">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 col-lg-11">
                                <div class="row justify-content-center">
                                    <div class="col-12 content-description px-0 d-flex flex-column wow fadeInLeft">
                                        <i class="icon-descr icon-info-de-mercad"></i>
                                        <h1 class="titles-big color-secondary"><?= ($lang == 'es/')? $contenido['titulo_1']:$contenido['titulo_1_en']; ?></h1>
                                        <span class="span-desc font-internas textUppercase"><?= ($lang == 'es/')? $contenido['titulo_2']:$contenido['titulo_2_en']; ?></span>
                                        <span class="subtitle-internas font-titles-md textUppercase"><?= ($lang == 'es/')? $contenido['titulo_3']:$contenido['titulo_3_en']; ?></span>
                                    </div>
                                    <div class="col-12 col-lg-11 wow fadeInLeft">
                                        <p class="font-internas"><?= ($lang == 'es/')? $contenido['contenido']:$contenido['contenido_en']; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-11 col-md-9 col-lg-6 px-0 wrapper-img-servDscrp">
                        <div class="content-img-servDscrp wow zoomIn">
                            <img src="<?= base_url(); ?><?= $contenido['imagen'] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <img class="forma-spinner"src="assets/images/icons/forma.svg" alt="">
        </section>
    </main>
    <?php
        include 'src/includes/footer.php'
    ?>
</body>

</html>