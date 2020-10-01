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
    <main class="main-customers">
        <!--BANNER-->
        <section class="sct-banner container-fluid px-0 d-flex justify-content-center wrapper-ancla">
            <img class="bg-shadow" src="<?= base_url(); ?>assets/images/sombra.png" alt="">
            <div class="content-img-banner vh">
                <img src="<?= base_url(); ?><?= $contenido['imagen']; ?>" alt="">
            </div>
            <div class="content-text-banner container d-flex flex-column justify-content-end wow fadeInLeft">
                <h1 class="title-big-banner titles-big"><?= ($lang == 'es/')? $contenido['h1']:$contenido['h1_en']; ?></h1>
                <span class="subtitle-banner font-titles-md"><?= ($lang == 'es/')? $contenido['span']:$contenido['span_en']; ?></span>
            </div>
            <a href="#inf-customrs" data-ancla="inf-customrs" class="content-ancla d-none d-lg-block">
                <h1 class="h1-text-Rotate font-internas color-white"><?= ($lang == 'es/')?'Más información':'More information'; ?></h1>
                <i class="color-white icon-flecha"></i>
            </a>
        </section>
        <!--DESCRIPTION CLIENTES-->
        <section class="section-sct-description overflow-h" id="inf-customrs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-7 col-xl-5">
                        <div class="row">
                            <div class="col-12 col-lg-11">
                                <div class="row justify-content-center">
                                    <div class="col-12 content-description px-0 d-flex flex-column wow fadeInLeft">
                                        <i class="icon-descr icon-clientes"></i>
                                        <h1 class="titles-big color-secondary"><?= ($lang == 'es/')? $contenido['titulo_1']:$contenido['titulo_1_en']; ?></h1>
                                        <span class="subtitle-internas font-titles-md">Y
                                            <?= ($lang == 'es/')? $contenido['titulo_2']:$contenido['titulo_2_en']; ?></span>
                                    </div>
                                    <div class="col-12 col-lg-11 wow fadeInLeft">
                                        <p class="font-internas"><?= ($lang == 'es/')? $contenido['contenido']:$contenido['contenido_en']; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-11 col-md-9 col-lg-5 col-xl-7">
                        <div class="content-img wow zoomIn">
                            <img src="<?= base_url(); ?><?= $contenido['imagen_main'] ?>" alt="">
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