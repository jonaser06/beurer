<?php
    include 'src/includes/header.php'
?>
<style>
    .wrapper-footer{float:none;}
</style>
    <main class="main-home" id="fullpage">
        <div class="popup-ini" id="login">
          <div class="popup-inner">
           <img id="img-popup" src="<?php echo base_url($confif['popup']); ?>" class="img-responsive" alt="">
            <!--button type="reset" class="aspa acordion_cerrar close" style="width: 34px!important;top: 5px;right: 5px;"> <i></i> </button-->
            <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div> 
        <section class="section sct-video-home pos-rel">
        
                <video data-autoplay loop muted src="<?= base_url($contenido['video']); ?>" class="video hidden-xs hidden-sm"></video>
            
            <div class="text-center title-banner-home hidden-xs hidden-sm">
                <h2 class="title-b-products font-nexaheavy">#SaludYBienestar</h2>
            </div>
            <?php
                $slide_show = array(
                    $contenido['box_img_salud'],
                    $contenido['box_img_bienestar'],
                    $contenido['box_img_belleza'],
                    $contenido['box_img_actividad'],
                    $contenido['box_img_linea-bebe']
                );

                $slide_link = array(
                    base_url('salud'),
                    base_url('bienestar'),
                    base_url('belleza'),
                    base_url('actividad'),
                    base_url('linea-bebe'),
                );

                $slide_txt = array(
                    'Salud',
                    'Bienestar',
                    'Belleza',
                    'Actividad',
                    'Linea Bebe',
                );
                $slide_bg = array(
                    'bg-salud',
                    'bg-bienestar',
                    'bg-belleza',
                    'bg-actividad',
                    'bg-linea-bb',
                );
            ?>
            <div class="slider-home visible-xs visible-sm">
                <?php for ($i=0; $i<count($slide_show); $i++){ ?>
                <div class="item-slider-home">
                    <figure>
                        <img src="<?= $slide_show[$i] ?>" alt="">
                    </figure>
                    <div class="name-prod-slider">
                        <h2 class="title-slider-h"><?= $slide_txt[$i]  ?></h2>
                        <a href="<?= $slide_link[$i]  ?>" class="btn-slider-h <?= $slide_bg[$i]  ?>">ver más</a>
                    </div>
                    <div class="degradado"></div>
                </div>
                <?php } ?>
           
            </div>
            
        </section>

        <section class="section sct-four-home">
            <div class="container-fluid h100">
                <div class="row h100">                    
                    <div class="col-exe">
                        <figure class="effect-selena bgc-celeste">
                            <a href="<?= base_url('salud'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_salud']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cceleste">SALUD</h2>
                                <p><?= $getbox[0]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-naranja">
                            <a href="<?= base_url('bienestar'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_bienestar']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cnaranja">BIENESTAR</h2>
                                <p><?= $getbox[1]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-morado">
                            <a href="<?= base_url('belleza'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_belleza']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cmorado">BELLEZA</h2>
                                <p><?= $getbox[2]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-verde">
                            <a href="<?= base_url('actividad'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_actividad']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="cverde">ACTIVIDAD</h2>
                                <p><?= $getbox[3]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                    <div class="col-exe">
                        <figure class="effect-selena bgc-amarillo">
                            <a href="<?= base_url('linea-bebe'); ?>"></a>
                            <img src="<?= base_url($contenido['box_img_linea-bebe']); ?>" alt="salud"/>
                            <figcaption>
                                <h2 class="camarillo">LÍNEA BEBÉ</h2>
                                <p><?= $getbox[4]['valor']; ?></p>
                            </figcaption>           
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- CARROSUEL PRODUCTOS DESTACADOS -->
        <section class="section sct-two-home">
            <h2 class="ttl-prd-dst text-center font-nexaheavy">PRODUCTOS DESTACADOS</h2>
            <div class="container">
                <div class="row">
                    
                        
                    <div class="carousel-home-general">
                        <?php foreach ($dstcd as $row): ?>
                        <?php if ($row['active'] == 1): ?>
                            <div class="item-carosuel">
                                <div class="container">
                                    <div class="info-slider-home">
                                        <!--button class="trans-info name-product bg-belleza font-nexaregular  bg-pink"><?php $row['pagina'] ?></button-->
                                        <h2 class="trans-info title-big-slider font-nexaheavy"><?= $row['titulo'] ?></h2>
                                        <span class="trans-info subtile-slider text-uppercase font-nexaregular"><?= $row['subtitulo'] ?></span>
                                        <p class="trans-info description-slider font-nexaregular"><?= $row['contenido'] ?></p>
                                        <a href="<?= base_url($row['cat_url'].'/'.$row['subcat_url'].'/'.$row['prod_url']); ?>" class="trans-info btn-slider bg-pink">VER PRODUCTO</a>
                                    </div>
                                    <div class="img-slider-h">
                                            <img src="<?= base_url($row['imagen']); ?>" alt="">
                                        
                                    </div>
                                </div>
                            </div>    
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section sct-three-home">
            <div class="container-fluid">
                <div class="row">
                    <div class="carrosuel-two-home">
                        <?php foreach ($slideme as  $low): ?>
                        <?php if ($low['active'] == 1): ?>
                            <div class="wrapper-cards-products">
                                <a class="linkabsolute" href="<?= base_url($low['cat_url'].'/'.$low['subcat_url'].'/'.$low['prod_url']); ?>"></a>
                                <div class="content-img-card">
                                    <img src="<?= base_url($low['imagen']); ?>" alt="" class="img-cnt">
                                </div>
                                <div class="content-title-card">
                                    <h2 class="h2-title font-nexaheavy"><?= $low['titulo'] ?></h2>
                                    <span class="d-block subtitle-card"><?= $low['subtitulo'] ?></span>
                                    <div class="btn-vp">
                                        <a href="<?= base_url($low['cat_url'].'/'.$low['subcat_url'].'/'.$low['prod_url']); ?>" class="a-btn font-nexaheavy">ver producto</a>
                                    </div>
                                </div>
                            </div>    
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section fp-auto-height">
            <?php
                include 'src/includes/footer.php'
            ?>
        </section>
    </main>
    <!-- Modal >
    <div class="modal fade" id="PopupPromotions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">  
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <img id="img-popup" src="<?php echo base_url($confif['popup']); ?>" class="img-responsive">
         
        </div>
      </div>
    </div-->
    
    <script src="assets/js/libraries/fullpage.js"></script>
    <script>
        if (screen && screen.width > 1300) {
            let fullpageDiv = $('#fullpage');
            if (fullpageDiv.length) {
                fullpageDiv.fullpage({
                    scrollBar: true,
                    scrollOverflow: true,
                    verticalCentered: true,
                    afterRender: function () {
                    }
                });
            }
        }

        <?php if ($confif['popup_check'] == 1): ?>
            $('#login').fadeIn();
        <?php else: ?>
            $('.popup-ini').css('display', 'none');
        <?php endif ?>

    </script>
    <script>

  
        $(".popup-btn").click(function () {
                    var target = $(this).attr("href");
                    $(target).fadeIn();
         });
         
        $(".popup-ini .close").click(function () {
                    $(".popup-ini").fadeOut();
         });
        

    </script>
</body>

</html>