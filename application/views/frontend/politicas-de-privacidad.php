<?php
    include 'src/includes/header.php'
?>
    <main class="main-us">
        <section class="sct-banner-dtll pos-rel" id="section0">
            <img src="<?php echo base_url('assets/images/banner/banner_privacidad_datos.jpg'); ?>" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase"><?php echo $contenido['t_imagen_priv'] ?></h1>
            </div>
        </section>
        <section class="sct-polit">
            <div class="container">
                <div class="row">
                    <!-- ACCORDION TÉRMINOS Y CONDICIONES -->
                    <div class="col-xs-12">
                        <h2 class="font-nexaeavy"><?php echo $contenido['titulo'] ?></h2>
                        <?php echo $contenido['contenido']; ?>
                    </div>
                    <div class="col-xs-12 px-0">
                        <ul class="accordion">
                            <?php foreach ($contenido['preguntas'] as  $row) { ?>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold"><i class="icon-cerrar"></i><?php echo $row['titulo'] ?></a>
                                <div class="accordion-content">
                                    <ul class="list-descr-detall">
                                        <?php 
                                        $pro = json_decode($row['lista_prod']);
                                        foreach ($pro as $value) { 
                                            ?>
                                        <li class="item-list-descr"><?php echo $value->Detalles;  ?></li>
                                        <?php }  ?>
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            

                        </ul>
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