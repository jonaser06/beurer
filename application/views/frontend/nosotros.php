<?php
    include 'src/includes/header.php'
?>
    <main class="main-us">
        <section class="sct-banner-int pos-rel" id="section0">
            <img src="<?php echo $contenido['nosotros_img'];  ?>" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase"><?php echo $contenido['titulo_imagen']  ?></h1>
            </div>
        </section>
        <section class="sct-description">
            <div class="container">
                <div class="row animatedParent animateOnce">
                    <div class="col-xs-12 col-md-6 animated fadeInLeftShort">
                        <div class="row">
                            <div class="col-xs-12 col-sm-11">
                                <h2 class="title-border text-uppercase font-nexaheavy"><?php echo $contenido['titulo']  ?></h2>
                            </div>
                            <div class="description-us col-xs-12 col-sm-11">
                                <?php echo $contenido['contenido']  ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 animated growIn">
                        <div class="img-us-int">
                            <img src="<?php echo $contenido['image_right']  ?>" alt="">
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