<?php
    include 'src/includes/header.php'
?>
    <main class="main-dtll">
        <section class="sct-banner-dtll pos-rel">
            <img src="assets/images/banner/bienestar-int.jpg" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h2 class="title-banner font-nexaheavy text-uppercase">por su bienestar</h2>
            </div>
            <ol class="breadcrumb bread-products container">
                <li class="item-bradcrumb"><a href="#" class="link-bradcrumb">Productos</a></li>
                <li class="item-bradcrumb"><a href="bienestar.php" class="link-bradcrumb">Bienestar</a></li>
                <li class="item-bradcrumb"><a href="#" class="link-bradcrumb bienestar active">Sueño y descanso</a></li class="item-bradcrumb">
            </ol>
        </section>
        <!-- NAV TABS -->
        <section class="container">
            <div class="row">
                <ul class="nav-tabs-int slid-bienestar">
                    <li class="item-nav-tabs <?= in_array('dispositivos-antirronquidos.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="#" class="link-nav-tabs">Dispositivo<br>Antirronquido</a>
                    </li>
                    <li class="item-nav-tabs <?= in_array('sleepline.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="sleepline.php" class="link-nav-tabs">SleepLine</a>
                    </li>
                    <li class="item-nav-tabs <?= in_array('sensores-de-sueno.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="sensores-de-sueno.php" class="link-nav-tabs">Sensores de sueño</a>
                    </li>
                    <li class="item-nav-tabs <?= in_array('luz-para-despertar.php', $uriSegments ) ? 'active' : ''; ?>">
                        <a href="luz-para-despertar.php" class="link-nav-tabs">Luz para despertar</a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="sct-info-subproduct">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="info-subproduct animatedParent animateOnce" data-sequence='500'>
                            <h2 class="ttl-info-subproducts color-bienestar font-nexaheavy text-uppercase animated fadeInLeftShort" data-id="1">dispositivo antirronquidos
                            </h2>
                            <h4 class="font-bold animated fadeInLeftShort" data-id="2">Adiós a las noches en vela con el dispositivo antirronquidos de
                                Beurer</h4>
                            <p class="p-internas animated fadeInLeftShort" data-id="3">El dispositivo antirronquidos de Beurer reduce los ronquidos nocturnos
                                mediante una suave terapia contra ronquidos para disfrutar de noches reparadoras. Se
                                coloca en el oído de forma discreta. Un impulso acústico y vibratorio en el oído
                                interrumpe eficazmente el ronquido o lo evita nada más empezar.</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9">
                        <div class="row animatedParent animateOnce" data-sequence='500'>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="1">
                                <div class="wrapper-cards-products dtll card-prd-bienestar">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-bienestar">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-bienestar">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="2">
                                <div class="wrapper-cards-products dtll card-prd-bienestar">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-bienestar">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-bienestar">ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 px-0 animated fadeInLeftShort" data-id="3">
                                <div class="wrapper-cards-products dtll card-prd-bienestar">
                                    <div class="content-img-card">
                                        <img src="assets/images/productos/producto1.jpg" alt="" class="img-cnt">
                                    </div>
                                    <div class="content-title-card">
                                        <h2 class="h2-title font-nexaheavy">FC 96 pureo intense cleansing</h2>
                                        <span class="d-block subtitle-card">sauna facial</span>
                                        <div class="btn-vp border-bienestar">
                                            <a href="detalle-de-producto.php" class="a-btn font-nexaheavy color-bienestar">ver producto</a>
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
</body>

</html>