<?php
    include 'src/includes/header.php'
?>
    <main class="main-us">
        <section class="sct-banner-int pos-rel" id="section0">
            <img src="<?= base_url($contenido['imagen']) ?>" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase"><?= $contenido['t_descarga'] ?></h1>
            </div>
        </section>
        <section class="sct-download">
            <div class="container">
                <div class="row">
                    <!-- BREADCRUMB -->
                    <div class="col-xs-12">
                        <ol class="breadcrumb row">
                            <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas">Home</a></li>
                            <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas active">Centro de
                                    descargas</a></li class="item-bradcrumb">
                        </ol>
                    </div>
                    <!-- TITLE / DESCRIPTION PAGE -->
                    <div class="col-xs-12 descr-ttl-dob">
                        <div class="row animatedParent animateOnce" data-sequence='500'>
                            <div class="col-xs-12 col-sm-6 col-md-5 animated fadeInLeftShort" data-id="1">
                                <h2 class="title-border text-uppercase font-nexaheavy"><?= $contenido['titulo'] ?></h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-5 animated fadeInLeftShort" data-id="2">
                                <p class="p-internas"><?= $contenido['contenido'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($contenido['descargar'] as $row) { ?>
                    <!--APP PARA ANDROID-->
                    <div class="col-xs-12 rsp-slct">
                        <div class="row animatedParent animateOnce" data-sequence="300">
                            <div class="col-xs-12 col-sm-5 col-md-3 animated fadeInLeftShort" data-id="1">
                                <div class="">
                                    <h3 class="titles-int-sl"><?= $row['titulo'] ?></h3>
                                    <p class="p-internas-sl"><?= $row['descripcion'] ?></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-9 animated fadeIn" data-id="2">
                                <div class="row">
                                    <div class="col-xs-12 col-md-11 float-r">
                                        <div class="downdload-center slider-dscg">
                                            <?php  
                                                $ft = json_decode($row['lista_prod']);
                                                foreach ($ft as $value) {
                                            ?>
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="<?= base_url($value->imagen); ?>" alt="" class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy"><?= $value->nombre; ?></h2>
                                                    <span class="d-block subtitle-card"><?= $value->subtitulo; ?></span>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="<?= base_url($value->pdf); ?>" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="<?= base_url($value->pdf); ?>" target="_blank" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                            <?php }  ?>
                                            <!-- END PRODUCTO -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!--SOFTWARE BEURER-->
                    <!-- <div class="col-xs-12 rsp-slct">
                        <div class="row animatedParent animateOnce" data-sequence="300">
                            <div class="col-xs-12 col-sm-5 col-md-3 animated fadeInLeftShort" data-id="1">
                                <h3 class="titles-int-sl">software<br> beurer</h3>
                                <p class="p-internas-sl">Aqui encontrará las últimas versiones de software de nuestros
                                    productos.</p>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-9 animated fadeIn" data-id="2">
                                <div class="row">
                                    <div class="col-xs-12 col-md-11 float-r">
                                        <div class="downdload-center slider-dscg">
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="assets/images/descargas/app1.jpg" alt="" class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy">Health Manager 2.3</h2>
                                                    <span class="d-block subtitle-card">sauna facial</span>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="#" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="#" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="assets/images/descargas/app1.jpg" alt="" class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy">BodShape V1.1.2</h2>
                                                    <span class="d-block subtitle-card">sauna facial</span>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="#" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="#" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="assets/images/descargas/app2.jpg" alt="" class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy">SleepQiet 1.4</h2>
                                                    <span class="d-block subtitle-card">sauna facial</span>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="#" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="#" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="assets/images/descargas/app3.jpg" alt="" class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy">eurer MyIPL V1.1</h2>
                                                    <span class="d-block subtitle-card">sauna facial</span>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="#" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="#" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--CATÁLOGO BEURER-->
                    <!-- <div class="col-xs-12 rsp-slct">
                        <div class="row animatedParent animateOnce" data-sequence="300">
                            <div class="col-xs-12 col-sm-5 col-md-3 animated fadeInLeftShort" data-id="1">
                                <h3 class="titles-int-sl">catálogo<br> beurer</h3 >
                                <p class="p-internas-sl">Aqui podrá descargar nuestros catálogos actual data-id="2"es.</p>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-9 animated fadeIn" data-id="2">
                                <div class="row">
                                    <div class="col-xs-12 col-md-11 float-r">
                                        <div class="downdload-center slider-dscg">
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="assets/images/descargas/catalog.jpg" alt=""
                                                        class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy">Health Manager 2.3</h2>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="#" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="#" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--OTROS-->
                    <!-- <div class="col-xs-12 rsp-slct">
                        <div class="row animatedParent animateOnce" data-sequence="300">
                            <div class="col-xs-12 col-sm-5 col-md-3 animated fadeInLeftShort" data-id="1">
                                <h3 class="titles-int-sl">otros</h3>
                                <p class="p-internas-sl">Aqui encontrará otros docuemntos e información importantes.</p>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-9 animated fadeIn" data-id="2">
                                <div class="row">
                                    <div class="col-xs-12 col-md-11 float-r">
                                        <div class="downdload-center slider-dscg">
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="assets/images/descargas/otros1.jpg" alt=""
                                                        class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy">Health Manager 2.3</h2>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="#" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="#" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                            <div class="wrapper-cards-products">
                                                <div class="content-img-card">
                                                    <img src="assets/images/descargas/otros2.jpg" alt=""
                                                        class="img-cnt">
                                                </div>
                                                <div class="content-title-card">
                                                    <h2 class="h2-title font-nexaheavy">BodShape V1.1.2</h2>
                                                </div>
                                                <div class="btn-dscg">
                                                    <a download href="#" class="a-btn font-nexaheavy">descargar</a>
                                                </div>
                                                <a download href="#" class="icon-dscg-use icon-descargar"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

    </main>
    <?php
        include 'src/includes/footer.php'
    ?>

</body>

</html>