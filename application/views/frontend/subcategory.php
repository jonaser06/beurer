<?php
    include 'src/includes/header.php'
?>
    <main class="main-dtll top-subcategoria">
        <section class="sct-banner-dtll pos-rel">
            <div class="bg-degrde"></div>
            <?php if ( isset($contenido['t_salud_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_salud']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_bienestar_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_bienestar']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_belleza_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_belleza']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_actividad_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_actividad']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <?php if ( isset($contenido['t_linea_bebe_img']) ){ ?>
                <img src="<?= base_url($contenido['imagen_linea_bebe']); ?>" alt="" class="img-cover">
            <?php }  ?>

            <div class="container content-title-banner">

                 <?php if ( isset($contenido['t_salud_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_salud_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_salud_img'] ?></h2>
                 <?php }  ?>

                <?php if ( isset($contenido['t_bienestar_img']) ){ ?>
                    <<h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_bienestar_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_bienestar_img'] ?></h2>
                <?php }  ?>

                <?php if ( isset($contenido['t_belleza_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_belleza_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_belleza_img'] ?></h2>
                <?php }  ?>

                <?php if ( isset($contenido['t_actividad_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_actividad_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_actividad_img'] ?></h2>
                <?php }  ?>

                <?php if ( isset($contenido['t_linea_bebe_img']) ){ ?>
                    <h2 class="title-peq-bproducts font-bold text-uppercase" style="margin-bottom:0px"><?= $contenido['t_linea_bebe_img'] ?></h3>
                    <h2 class="title-b-products font-bold text-uppercase" style="margin-top:0px"><?= $contenido['st_linea_bebe_img'] ?></h2>
                <?php }  ?>

            </div>
            <ol class="breadcrumb bread-products container">
                <li class="item-bradcrumb"><a href="#" class="link-bradcrumb">Productos</a></li>
                <li class="item-bradcrumb"><a href="<?= base_url($pagina['url']) ?>" class="link-bradcrumb"><?= ucfirst(mb_strtolower($pagina['pagina']))?></a></li>
                <li class="item-bradcrumb"><a href="<?= base_url($pagina['url'].'/'.$category[0]['url']); ?>" class="link-bradcrumb bienestar active"><?= ucfirst(mb_strtolower($category[0]['titulo'])) ?></a></li class="item-bradcrumb">
            </ol>
        </section>
        <!-- NAV TABS -->

        <section class="sct-info-subproduct">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-3 sticky-sidebar">
                        <div class="info-subproduct animatedParent animateOnce" data-sequence='500'>
                            <h2 class="ttl-info-subproducts color-<?= $this->uri->segment(1); ?> font-nexaheavy text-uppercase animated fadeInLeftShort" data-id="1"><?= $category[0]['titulo']; ?>
                            </h2>
                            <h4 class="font-bold animated fadeInLeftShort" data-id="2"><?= $category[0]['subtitle']; ?></h4>
                            <p class="p-internas animated fadeInLeftShort" data-id="3"><?= $category[0]['contenido']; ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9">
                        <div class="row animatedParent animateOnce" data-sequence='500'>
                            <!-- List Products -->
                            <?php foreach ($products as $row) { ?>
                            <?php if ($row['active'] == 1): ?>
                                <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="1">
                                    <div class="wrapper-cards-products dtll card-prd-salud">
                                        <a class="linkabsolute" href="<?= base_url($pagina['url'].'/'.$category[0]['url'].'/').$row['prod_url'] ?>"></a>
                                        <div class="content-img-card">
                                            <?php if (isset($row['imagen']) == 1) { ?>
                                                   
                                                    <img src="<?= base_url($row['imagen'][0]); ?>" alt="" class="img-cnt">
                                            <?php } ?>
                                                
                                            
                                        </div>
                                        <div class="content-title-card">
                                            <h2 class="h2-title font-nexaheavy"><?= $row['titulo']; ?></h2>
                                            <span class="d-block subtitle-card"><?= $row['subtitulo']; ?></span>
                                            <div class="btn-vp">
                                                <a href="<?= base_url($pagina['url'].'/'.$category[0]['url'].'/').$row['prod_url'] ?>" class="a-btn font-nexaheavy">ver producto</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            
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
