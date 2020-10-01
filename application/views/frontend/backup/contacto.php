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
    <main class="main-contactUs overflow-h">
        <section class="sct-banner container-fluid px-0 d-flex justify-content-center">
            <img class="bg-shadow" src="<?= base_url(); ?>assets/images/sombra.png" alt="">
            <div class="content-img-banner vh">
                <img src="<?= base_url(); ?><?= $contenido['imagen'] ?>" alt="">
            </div>
            <div class="content-text-banner container d-flex flex-column justify-content-end wow fadeInLeft">
                <h1 class="title-big-banner titles-big"><?= ($lang == 'es/')? $contenido['h1']:$contenido['h1_en']; ?></h1>
                <span class="subtitle-banner font-titles-md"><?= ($lang == 'es/')? $contenido['span']:$contenido['span_en']; ?></span>
            </div>
        </section>
        <div class="bg-spinner-contacUs overflow-h">
            <?php
                include 'src/includes/contacto.php'
            ?>
            <img class="forma-spinner spinner-formLeft" src="<?= base_url(); ?>assets/images/icons/forma.svg" alt="">
        </div>
        

    </main>
    
    <?php
        include 'src/includes/footer.php'
    ?>
    <script src="<?= base_url(); ?>assets/js/modal-pol-dat-confi.js"></script>
    <script src="<?= base_url(); ?>assets/js/modal-pol-dat.js"></script>
    <script src="<?= base_url(); ?>assets/js/input-file.js"></script>
    <script src="<?= base_url(); ?>assets/js/libraries/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/form.js"></script>
</body>


</html>
