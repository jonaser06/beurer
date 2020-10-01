<?php
    include 'src/includes/header.php'
?>
    <main class="main-products">
        <section class="sct-banner-products pos-rel" id="section0">
            <div class="bg-degrde"></div>
            <img src="<?= base_url($contenido['imagen_belleza']); ?>" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h3 class="title-peq-bproducts font-bold text-uppercase"><?= $contenido['t_belleza_img'] ?></h3>
                <h2 class="title-b-products font-bold text-uppercase"><?= $contenido['st_belleza_img'] ?></h2>
            </div>
        </section>
        <section class="sct-products container-fluid bg-productss">
            <div class="row">
                <div class="info-general-products col-xs-12 col-md-5 col-lg-4 animatedParent animateOnce" data-sequence='500'>
                    <!-- BREADCRUMB -->
                    <ol class="breadcrumb bread-products animated fadeInLeftShort" data-id="1">
                        <li class="item-bradcrumb"><a href="#" class="link-bradcrumb">Productos</a></li>
                        <li class="item-bradcrumb"><a href="<?= base_url($pagina['url']); ?>" class="link-bradcrumb color-belleza active">Belleza</a></li class="item-bradcrumb">
                    </ol>
                    <div class="wrapper-title-info t-belleza animated fadeInLeftShort" data-id="2">
                        <i class="icon-t-info icon-belleza"></i>
                        <h2 class="title-info"><?= $contenido['t_belleza'] ?></h2>
                    </div>
                    <p class="p-regular animated fadeInLeftShort" data-id="3"><?= $contenido['c_belleza'] ?></p>
                </div>
                <div class="info-card-products col-xs-12 col-md-7 col-lg-8 px-0">
                    <div class="container-fluid px-0">
                        <div class="animatedParent animateOnce" data-sequence='900'>
                            
                            <?php foreach($category as $row){ ?>
                            <a href="<?= base_url($pagina['url']).'/'.$row['url'] ?>">
                                <div class="wrapper-card-info col-xs-12 col-sm-6 col-lg-4 px-0 animated fadeInLeftShort" data-id="1"
                                    style="background-image: url(<?= base_url().$row['imagen'] ?>)">
                                    <div class="info-card-p">
                                        <h2><?= $row['titulo']; ?></h2>
                                        <p><?= $row['contenido']; ?></p>
                                    </div>
                                    <div class="hover-card-product bg-belleza"></div>
                                </div>
                            </a>    
                            <?php } ?>


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