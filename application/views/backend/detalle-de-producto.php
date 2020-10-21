<?php
    include 'src/includes/header.php'
?>
    <main class="main-detail-products">
        <section class="sct-detail-products">
            <div class="container-fluid">
                <div class="row">
                    <!-- BREADCRUMB -->
                    <div class="col-xs-12">
                        <ol class="breadcrumb row">
                            <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas">Productos</a></li>
                            <li class="item-bradcrumb"><a href="<?= base_url($pagina['url']); ?>" class="link-bradcrumb p-internas"><?= $pagina['pagina']; ?></a></li>
                            <li class="item-bradcrumb"><a href="<?= base_url($pagina['url'].'/'.$product['subcat_url']); ?>" class="link-bradcrumb p-internas"><?= $product['category']; ?></a></li>
                            <li class="item-bradcrumb"><a href="<?= base_url($pagina['url'].'/'.$product['subcat_url'].'/'.$product['prod_url']); ?>" class="link-bradcrumb p-internas active"><?= $product['titulo']; ?></a>
                            </li class="item-bradcrumb">
                        </ol>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="tabss row">
                                    <a href="<?= base_url($product['pdf']); ?>" class="icon-descarga-detalle"></a>
                                    <div class="tabs_gotoWrap col-xs-12 col-md-2 animatedParent animateOnce" data-sequence='500'>
                                        <?php
                                            if(isset($product['imagen'])){
                                                for ($i=0; $i < count($product['imagen']); $i++) { ?> 
                                                    <?php if($i ==0){ ?>
                                                        <div class="animated fadeInLeftShort tabs_goto -active" data-id="<?= ($i+1); ?>">
                                                            <img class="img-cover" src="<?= base_url($product['imagen'][$i]); ?>" alt="">
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="animated fadeInLeftShort tabs_goto" data-id="<?= ($i+1); ?>">
                                                            <img class="img-cover" src="<?= base_url($product['imagen'][$i]); ?>" alt="">
                                                        </div>
                        
                                                    <?php } ?>
                                        <?php 
                                                }
                                            } 
                                        ?>
                                                                                
                                        
                                        <div class="animated fadeInLeftShort video-circle" data-id="4">
                                            <a data-fancybox href="assets/video/video_1.mp4">
                                                <img class="img-cover" src="assets/images/icons/play.svg" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tabs_sectionsWrap col-xs-12 col-md-10 animatedParent animateOnce">
                                        <?php
                                            if(isset($product['imagen'])){
                                            for ($i=0; $i < count($product['imagen']); $i++) { ?> 
                                                <?php if($i ==0){ ?>
                                                <section class="tabs_section -open animated growIn"><img src="<?= base_url($product['imagen'][$i]); ?>" alt=""></section>
                                                <?php }else{ ?>
                                                <section class="tabs_section animated growIn"><img src="<?= base_url($product['imagen'][$i]); ?>" alt=""></section>    
                                                <?php } ?>
                                        <?php } }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 info-prod animatedParent animateOnce">
                        <div class="animated fadeInRightShort">
                            <button class="trans-info name-product bg-actividad font-nexaregular"><?= $pagina['pagina']; ?></button>
                            <h2 class="px-0 col-xs-12 title-detail-product font-nexaheavy"><?= $product['titulo']; ?></h2>
                            <span class="px-0 col-xs-12 subtitle-detail-product font-nexaregular"><?= $product['subtitulo']; ?></span>
                            <p class="p-internas"><?= $product['contenido']; ?></p>
                            <h3 class="ttl-encuent font-nexaheavy text-center bg-primary">ENCUÉNTRALO EN:</h3>
                            <div class="col-xs-12 logos-tiendas">
                            <?php if (isset($product['marca'])): ?>
                            <?php foreach (json_decode($product['marca']) as $row): ?>
                                <a href="<?= $row->enlace ?>">
                                    <figure class="col-xs-4 col-sm-3">
                                        <img src="<?= base_url($row->imagen_marcas); ?>" alt="">
                                    </figure>
                                </a>
                            <?php endforeach ?>
                            <?php endif ?>
         
                            </div>
                            <div class="tabs-info-product col-xs-12 px-0">
                                <div class="tabs text-uppercase">
                                    <span class="font-regular tab-link current"
                                        data-tab="description">Descripción</span>
                                    <span class="font-regular tab-link" data-tab="ficha-tecnica">ficha técnica</span>
                                    <span class="font-regular tab-link" data-tab="accesorios">accesorios</span>
                                </div>

                                <div class="content">
                                    <div id="description" class="tab-content current">
                                      
                                        <ul class="list-descr-detall">
                                            <?php if (isset($product['descripcion'])): ?>    
                                            <?php foreach (json_decode($product['descripcion']) as  $row): ?>
                                                <li class="item-list-descr"><?= $row->descripcion ?></li>
                                            <?php endforeach ?>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <div id="ficha-tecnica" class="tab-content">
                                        
                                        
                                            
                                        
                                        <div class="descr-ft">
                                            <p class="text-primary-ft d-in-block">Denominación del producto</p>
                                            <p class="text-secondary-ft d-in-block">Sensor de actividad</p>
                                        </div>
                                        <?php if (isset($product['ficha_tecnica'])): ?>
                                        <?php foreach (json_decode($product['ficha_tecnica']) as $row): ?>
                                        <div class="descr-ft">
                                            <p class="text-primary-ft d-in-block"><?= $row->denominacion ?></p>
                                            <p class="text-secondary-ft d-in-block"><?= $row->sensor ?></p>
                                        </div>
                                        <?php endforeach ?>
                                        <?php endif ?>
                                    </div>

                                    <div id="accesorios" class="tab-content">
                                        <div class="container-fluid px-0">
                                            <div class="row">
                                                <?php if (isset($product['accesorios'])): ?>   
                                                <?php foreach (json_decode($product['accesorios']) as $row): ?>
                                                    <div class="col-xs-3 acces">
                                                        <div class="img-acces">
                                                            <a href="<?= base_url($row->imagen); ?>"
                                                                data-fancybox="images">
                                                                <img src="<?= base_url($row->imagen); ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <h2 class="ttl-prod-acces font-nexaregular"><?= $row->nombre ?></h2>
                                                    </div>
                                                <?php endforeach ?>
                                                <?php endif ?>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- PRODUCTOS RELACIONADOS -->
        <section class="sct-product-rel container-fluid">
            <div class="row">
                <h1 class="ttl-prl font-bold text-center">PRODUCTOS QUE TE PUEDEN INTERESAR</h1>
                <div class="carrosuel-two-home">
                    <?php foreach ($slide  as $value): ?>
                        <div class="wrapper-cards-products">
                            <div class="content-img-card">
                                <?php foreach ($value['imagen']  as  $row): ?>
                                    <img src="<?= base_url($row['images']); ?>" alt="" class="img-cnt">
                                <?php endforeach ?>
                                
                            </div>
                            <div class="content-title-card">
                                <h2 class="h2-title font-nexaheavy"><?= $value['titulo']; ?></h2>
                                <span class="d-block subtitle-card"><?= $value['subtitulo']; ?></span>
                                <div class="btn-vp">
                                    <a href="<?= base_url($cat.'/'.$subcat.'/'.$value['url']); ?>" class="a-btn font-nexaheavy">ver producto</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>

    </main>
    <?php
        include 'src/includes/footer.php'
    ?>
    <script src="<?= base_url('assets/js/libraries/fancybox.min.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.tabs span').click(function () {
                var tab_id = $(this).attr('data-tab');
                $('.tabs span').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            })
        })
    </script>
    <script>
        $(".tabs_goto").click(function() {
            $(this)
                .addClass("-active")
                .siblings()
                .removeClass("-active")
                .closest(".tabss")
                .find(".tabs_section")
                .eq($(this).index())
                .addClass("-open")
                .siblings()
                .removeClass("-open")
            })
    </script>
</body>

</html>