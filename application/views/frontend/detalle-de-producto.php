<?php
    include 'src/includes/header.php';

    function format_text($text = ''){
        $texto = $text;

        $select = explode(' ', $texto);
        $num = count($select);

        $html_set = '';
        for ($i = 0; $i<($num - 1); $i++){
            $html_set .=  mb_strtolower($select[$i]).' ';
        }

        return ucfirst(strtolower($html_set)).' '.strtoupper(end($select));
    }
?>
    <main class="main-detail-products">
        <section class="sct-detail-products">
            <div class="container cont-detail-products">
                <?php if ($product['active'] == 1): ?>
                <div class="row">
                    <!-- BREADCRUMB -->
                    <div class="col-xs-12">
                        <ol class="breadcrumb row">
                            <li class="item-bradcrumb"><a href="#" class="link-bradcrumb p-internas">Productos</a></li>
                            <li class="item-bradcrumb"><a href="<?= base_url($pagina['url']); ?>" class="link-bradcrumb p-internas"><?= ucfirst(mb_strtolower($pagina['pagina'])); ?></a></li>
                            <li class="item-bradcrumb"><a href="<?= base_url($pagina['url'].'/'.$product['subcat_url']); ?>" class="link-bradcrumb p-internas"><?= ucfirst(mb_strtolower($product['category']))  ; ?></a></li>
                            <li class="item-bradcrumb"><a href="<?= base_url($pagina['url'].'/'.$product['subcat_url'].'/'.$product['prod_url']); ?>" class="link-bradcrumb p-internas active"><?= $product['titulo']; ?></a>
                            </li class="item-bradcrumb">
                        </ol>
                    </div>
                    <div class="col-xs-12 col-md-7 foto-sticky">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="tabss row">
                                    <a href="<?= base_url($product['pdf']); ?>" class="icon-descarga-detalle2"  title="Descargar" target="_blank"></a>
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
                                                                                
                                        <?php if (!empty($product['video'])): ?>
                                        <div class="animated fadeInLeftShort video-circle" data-id="4">
                                            <a data-fancybox href="<?= $product['video'] ?>">
                                           <!--  <a data-fancybox href="assets/video/video_1.mp4"> -->
                                                <img class="img-cover" src="<?= base_url('assets/images/icons/play.svg'); ?>" />
                                            </a>
                                        </div>
                                        <?php endif ?>
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
                            <?php  
                                switch ($pagina['pagina']) {
                                    case 'SALUD':
                                            $color ='bg-primary';
                                        break;
                                    case 'BIENESTAR':
                                            $color ='bg-primary';
                                        break;
                                    case 'BELLEZA ':
                                            $color ='bg-primary';
                                        break;
                                    case 'ACTIVIDAD':
                                            $color ='bg-primary';
                                        break;
                                    case 'LINEA BEBE':
                                            $color ='bg-primary';
                                        break;
                                    default:
                                            $color ='';
                                        break;
                                }
                            ?>
            
                            <button class="trans-info name-product <?= $color; ?> font-nexaregular"><?= $pagina['pagina']; ?></button>
                            <h2 class="px-0 col-xs-12 title-detail-product font-nexaheavy"><?= $product['titulo']; ?></h2>
                            <span class="px-0 col-xs-12 subtitle-detail-product font-nexaregular"><?= $product['subtitulo']; ?></span>
                            <p class="p-internas"><?= $product['contenido']; ?></p>
                            <h3 class="ttl-encuent font-nexaheavy text-center bg-primary">CÓMPRALO EN:</h3>
                            <div class="col-xs-12 logos-tiendas">
                            <?php if (isset($product['marca'])): ?>
                            <?php foreach (json_decode($product['marca']) as $row): ?>
                                <a href="<?= $row->enlace ?>" target="_blank">
                                    <figure class="col-xs-4 col-sm-4">
                                        <img src="<?= base_url($row->imagen_marcas); ?>" alt="">
                                    </figure>
                                </a>
                            <?php endforeach ?>
                            <?php endif ?>
         
                            </div>





                            <div class="tabs col-xs-12">
                                <div class="tab-button-outer">
                                    <ul id="tab-button">
                                        <?php echo ( trim($product['descripcion'])=='[]' OR trim($product['descripcion'])=='' )?'':'<li id="icon-descripcion"><a href="#description">DESCRIPCIÓN</a></li>'; ?>
                                        <?php echo ( trim($product['ficha_tecnica'])=='[]' OR trim($product['ficha_tecnica'])=='' )?'':'<li id="icon-ficha"><a href="#ficha-tecnica">FICHA TÉCNICA</a></li>'; ?>
                                        <?php echo ( trim($product['accesorios'])=='[]' OR trim($product['accesorios'])=='' )?'':'<li id="icon-accesorios"><a href="#accesorios">ACCESORIOS</a></li>'; ?>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div id="description" class="tab-contents" style="display:block;">
                                        <ul class="list-descr-detall">
                                            <?php if (isset($product['descripcion'])): ?>    
                                            <?= $product['descripcion']; ?>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <div id="ficha-tecnica" class="tab-contents">                                
                                        <?php if (isset($product['ficha_tecnica'])): ?>
                                            <?= $product['ficha_tecnica']; ?>
                                        <?php endif ?>
                                    </div>
                                    <div id="accesorios" class="tab-contents">                                
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




                            <!--div class="tabs-info-product col-xs-12 px-0">
                                <div class="tabs text-uppercase">
                                <?php echo ( trim($product['descripcion'])=='[]' OR trim($product['descripcion'])=='' )?'':'<span class="font-regular tab-link current" data-tab="description">Descripción</span>'; ?>
                                <?php echo ( trim($product['ficha_tecnica'])=='[]' OR trim($product['ficha_tecnica'])=='' )?'':'<span class="font-regular tab-link" data-tab="ficha-tecnica">Ficha técnica</span>'; ?>
                                <?php echo ( trim($product['accesorios'])=='[]' OR trim($product['accesorios'])=='' )?'':'<span class="font-regular tab-link" data-tab="accesorios">Accesorios</span>'; ?>
                                </div>

                                <div class="content">
                                    <div id="description" class="tab-content current">
                                      
                                        <ul class="list-descr-detall">
                                            <?php if (isset($product['descripcion'])): ?>    
                                            <?= $product['descripcion']; ?>
                                            <?php endif ?>
                                        </ul>
                                    </div>

                                    <div id="ficha-tecnica" class="tab-content">
                                        <?php if (isset($product['ficha_tecnica'])): ?>
                                            <?= $product['ficha_tecnica']; ?>
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
                            </div-->
                        </div>
                    </div>
                </div>    
                <?php else: ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="text-center">!Ups... el producto no se encuentra disponible!</h2>
                        </div>
                    </div>
                <?php endif ?>
                
            </div>
        </section>
        <!-- PRODUCTOS RELACIONADOS -->
        <?php if ($product['active'] == 1): ?>
        <section class="sct-product-rel container-fluid">
            <div class="row">
                <h1 class="ttl-prl font-bold text-center">PRODUCTOS QUE TE PUEDEN INTERESAR</h1>
                <div class="carrosuel-two-home">
                <?php if(isset($producto_rel) ){ ?>
                    <?php foreach ($producto_rel  as $value): ?>
                        <div class="wrapper-cards-products">
                            <a class="linkabsolute" href="<?php echo base_url($value['cat_url'].'/'.$value['subcat_url'].'/'.$value['prod_url']) ?>"></a>
                            <div class="content-img-card">
                                <img src="<?= base_url($value['imagen']); ?>" alt="" class="img-cnt">
                            </div>
                            <div class="content-title-card">
                                <h2 class="h2-title font-nexaheavy"><?= $value['titulo']; ?></h2>
                                <span class="d-block subtitle-card"><?= $value['subtitulo']; ?></span>
                                <div class="btn-vp">
                                    <a href="<?php echo base_url($value['cat_url'].'/'.$value['subcat_url'].'/'.$value['prod_url']) ?>" class="a-btn font-nexaheavy">ver producto</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php endif ?>

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
    <script>
        $(function() {
          var $tabButtonItem = $('#tab-button li'),
              $tabSelect = $('#tab-select'),
              $tabContents = $('.tab-contents'),
              activeClass = 'is-active';

          $tabButtonItem.first().addClass(activeClass);
          $tabContents.not(':first').hide();

          $tabButtonItem.find('a').on('click', function(e) {
            var target = $(this).attr('href');

            $tabButtonItem.removeClass(activeClass);
            $(this).parent().addClass(activeClass);
            $tabSelect.val(target);
            $tabContents.hide();
            $(target).show();
            e.preventDefault();
          });

          $tabSelect.on('change', function() {
            var target = $(this).val(),
                targetSelectNum = $(this).prop('selectedIndex');

            $tabButtonItem.removeClass(activeClass);
            $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
            $tabContents.hide();
            $(target).show();
          });
        });
    </script>
</body>

</html>
