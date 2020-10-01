<?php
    include 'src/includes/header.php'
?>
    <main class="main-dtll">
        <section class="sct-banner-dtll pos-rel">
            <img src="<?= base_url(); ?>assets/images/banner/bienestar-int.jpg" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h2 class="title-banner font-nexaheavy text-uppercase">Resultado de busqueda...</h2>
            </div>

        </section>
        <!-- NAV TABS -->

        <section class="sct-info-subproduct">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="row animatedParent animateOnce" data-sequence='500'>
                            <!-- List Products -->
                            <?php foreach ($rows as $row) { ?>
                            <div class="col-xs-6 col-md-3 px-0 animated fadeInLeftShort" data-id="1">
                                <div class="wrapper-cards-products dtll card-prd-salud">
                                    <div class="content-img-card">
                                        <img src="<?= base_url($row['imagen']); ?>" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy"><?= $row['titulo']; ?></h2>
                                        <span class="d-block subtitle-card"><?= $row['subtitulo']; ?></span>
                                        <div class="btn-vp border-salud">
                                            <a href="<?= base_url($row['cat_url'].'/'.$row['subcat_url'].'/'.$row['prod_url']) ?>" class="a-btn font-nexaheavy color-salud">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- End List Products -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
        include 'src/includes/footer.php'
    ?>
   
</body>

</html>