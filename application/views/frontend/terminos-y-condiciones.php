<?php
    include 'src/includes/header.php'
?>
    <main class="main-us">
        <section class="sct-banner-dtll pos-rel" id="section0">
            <img src="assets/images/banner/banner_politicas.jpg" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase"><?php echo $contenido['titulo'] ?></h1>
            </div>
        </section>
        <section class="sct-tc">
            <div class="container">
                <div class="row">
                    <!-- ACCORDION TÉRMINOS Y CONDICIONES -->
                    <div class="col-xs-12 px-0">
                        <ul class="accordion">
                            <?php foreach ($contenido['preguntas'] as  $row) { ?>
                            <li class="list-accordion">
                                <a class="accordion-heading font-bold"><i class="icon-cerrar"></i>General
                                    information, scope</a>
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
    <!-- <script>
            $(document).ready(function(){
                $(".list-nav .item-nav:first-child").hover(function() {
                   

                    if ($('.content-nav').attr('class') == 'bg-salud') {
                        $(".menu-salud").css("opacity","1");
                        $('.content-nav').addClass('bg-salud');

                    }else{
                        $('.content-nav').removeClass('bg-salud')
                    }
                    
                });
                $(".list-nav .item-nav:nth-child(2)").hover(function() {
                    $(".content-nav").addClass('bg-bienestar');
                    $(".menu-bienestar").css("opacity","1")
                });
                $(".list-nav .item-nav:nth-child(3)").hover(function() {
                    $(".content-nav").addClass('bg-belleza');
                    $(".menu-belleza").css("opacity","1")
                });
                $(".list-nav .item-nav:nth-child(4)").hover(function() {
                    $(".content-nav").addClass('bg-actividad');
                    $(".menu-actividad").css("opacity","1")
                });
                $(".list-nav .item-nav:nth-child(5)").hover(function() {
                    $(".content-nav").addClass('bg-linea-bb');
                    $(".menu-linea-bb").css("opacity","1")
                });   
            });
        </script> -->

</body>

</html>