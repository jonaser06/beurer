<?php
    include 'src/includes/header.php'
?>
    <main class="main-dtll">
        <section class="sct-banner-dtll pos-rel">
            <img src="assets/images/banner/bienestar-int.jpg" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h2 class="title-banner font-nexaheavy text-uppercase">por su salud</h2>
            </div>
            <ol class="breadcrumb bread-products container">
                <li class="item-bradcrumb"><a href="#" class="link-bradcrumb">Productos</a></li>
                <li class="item-bradcrumb"><a href="salud.php" class="link-bradcrumb">Salud</a></li>
                <li class="item-bradcrumb"><a href="#" class="link-bradcrumb bienestar active">Termómetros digitales</a></li class="item-bradcrumb">
            </ol>
        </section>
        <!-- NAV TABS -->
        <section class="container">
            <div class="row">
                <ul class="nav-tabs-int slid-salud">
                    <li class="item-nav-tabs <?= in_array('termometro-digital1.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="termometro-digital1.php" class="link-nav-tabs">Termómetro<br>Digital 1</a>
                    </li>
                    <li class="item-nav-tabs <?= in_array('sleepline.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="#" class="link-nav-tabs">SleepLine</a>
                    </li>
                    <li class="item-nav-tabs <?= in_array('sensores-de-sueno.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="#" class="link-nav-tabs">Sensores de sueño</a>
                    </li>
                    <li class="item-nav-tabs <?= in_array('luz-para-despertar.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="#" class="link-nav-tabs">Luz para despertar</a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="sct-info-subproduct">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="info-subproduct animatedParent animateOnce" data-sequence='500'>
                            <h2 class="ttl-info-subproducts color-salud font-nexaheavy text-uppercase animated fadeInLeftShort" data-id="1">termómetro1
                            </h2>
                            <h4 class="font-bold animated fadeInLeftShort" data-id="2">Conciliar mejor el sueño, dormir mejor, despertar mejor</h4>
                            <p class="p-internas animated fadeInLeftShort" data-id="3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias ipsum sed itaque minus. Itaque, impedit assumenda 
                            nulla sit numquam velit suscipit id laudantium soluta asperiores quam iusto adipisci voluptatibus esse.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9">
                        <div class="row animatedParent animateOnce" data-sequence='500'>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="1">
                                <div class="wrapper-cards-products dtll card-prd-salud">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-salud">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-salud">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="2">
                                <div class="wrapper-cards-products dtll card-prd-salud">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-salud">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-salud">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="3">
                                <div class="wrapper-cards-products dtll card-prd-salud">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-salud">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-salud">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="1">
                                <div class="wrapper-cards-products dtll card-prd-salud">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-salud">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-salud">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="2">
                                <div class="wrapper-cards-products dtll card-prd-salud">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-salud">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-salud">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="3">
                                <div class="wrapper-cards-products dtll card-prd-salud">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-salud">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-salud">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
        include 'src/includes/footer.php'
    ?>
    <script>

    </script>
</body>

</html>