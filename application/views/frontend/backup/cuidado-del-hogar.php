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
    <main class="main-products">
        <!--BANNER-->
        <section class="sct-banner container-fluid px-0 d-flex justify-content-center">
            <img class="bg-shadow" src="assets/images/sombra.png" alt="">
            <div class="content-img-banner">
                <img src="<?= base_url();  ?>assets/images/banner/bajas/ind-alimentaria.jpg" alt="">
            </div>
            <div class="content-text-banner container d-flex flex-column justify-content-end wow fadeInLeft">
                <h1 class="title-big-banner titles-big textUppercase"><?= ($lang == 'es/')?'insumos':'high'; ?></h1>
                <span class="subtitle-banner font-titles-md textUppercase"><?= ($lang == 'es/')?'de alta calidad':'QUALITY SUPPLIES'; ?></span>
            </div>
        </section>
        <!--NAVBAR PRODUCTOS-->
        <?php
            include 'src/includes/navbar-products.php'
        ?>
        <!--DESCRIPCION DE PRODUCTOS-->
        <section class="sct-description-products overflow-h">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="row">
                            <div class="col-12 titles-big-products textR">
                                <i class="icon-desc-products icon-cuidado-hogar"></i>
                                    <?php
                                        $titulo_2 = "";
                                        if ($lang == 'es/') {
                                            $titulo_1 = explode(' ', $categoria['hogar_categoria']);
                                        }else{
                                            $titulo_1 = explode(' ', $categoria['hogar_categoria_en']);
                                        }
                                    ?>
                                <h1 class="title-primary titles-big"><?= $titulo_1[0] ?></h1>
                                <h2 class="title-secondary font-titles-md textUppercase">
                                    <?php
                                        for($i=1; $i<count($titulo_1); $i++) { 
                                            echo strip_tags($titulo_1[$i]).' ';
                                        }
                                    ?>  
                                </h2>
                            </div>
                            <div class="img-products content-img-two d-none d-lg-block wow zoomIn">
                                <img src="<?= base_url();?><?= $contenido['imagen_1'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-lg-none content-accordion-mobile">
                        <ul class="accordion content-subProducts">
                            <!-- Cetogoria movil -->
                            <?php foreach ($categoria['producto_data4'] as $row) { ?>
                            <?php $a = json_decode($row['lista_prod']); ?>
                            <li class="li-accordion"><a class="titles-subProducts titles-big"><?= ($lang == 'es/')? $row['titulo'] : $row['titulo_en']  ?></a>
                                <ul class="list-subProducts">
                                    <?php foreach ($a as $value) { ?>
                                        <li class="item-subProducts font-titles-md"><?= ($lang == 'es/')? $value->Producto: $value->Producto_en ?></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                            <!-- fin -->
                        </ul>
                    </div>
                    <div class="col-12 col-lg-7 d-none d-lg-block">
                        <div class="wrapper_subproduct">
                            <!-- Categoria -->
                            <?php foreach ($categoria['producto_data4'] as $row) { ?>
                            <?php $a = json_decode($row['lista_prod']); ?>
                            <div class="content-subProducts">
                                <h1 class="titles-subProducts titles-big"><?= ($lang == 'es/')? $row['titulo'] : $row['titulo_en']  ?></h1>
                                <ul class="list-subProducts">
                                    <?php foreach ($a as $value) { ?>
                                        <li class="item-subProducts font-titles-md"><?= ($lang == 'es/')? $value->Producto: $value->Producto_en ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
                            <!-- Fin de Categoria -->
                        </div>
                    </div>
                </div>
            </div>
            <img class="forma-spinner"src="<?= base_url();?>assets/images/icons/forma.svg" alt="">
            <img class="forma-esquina" src="<?= base_url();?>assets/images/icons/forma_esquina.svg" alt="">
        </section>
    </main>
    <?php
        include 'src/includes/footer.php'
    ?>
</body>

</html>