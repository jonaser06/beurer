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
                        <li class="item-bradcrumb"><a href="<?= base_url($pagina['url']); ?>"
                                class="link-bradcrumb p-internas"><?= ucfirst(mb_strtolower($pagina['pagina'])); ?></a>
                        </li>
                        <li class="item-bradcrumb"><a href="<?= base_url($pagina['url'].'/'.$product['subcat_url']); ?>"
                                class="link-bradcrumb p-internas"><?= ucfirst(mb_strtolower($product['category']))  ; ?></a>
                        </li>
                        <li class="item-bradcrumb"><a
                                href="<?= base_url($pagina['url'].'/'.$product['subcat_url'].'/'.$product['prod_url']); ?>"
                                class="link-bradcrumb p-internas active"><?= $product['titulo']; ?></a>
                        </li class="item-bradcrumb">
                    </ol>
                </div>
                <div class="col-xs-12 col-md-7 foto-sticky">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tabss row">
                                <a href="<?= base_url($product['pdf']); ?>" class="icon-descarga-detalle2"
                                    title="Descargar" target="_blank"></a>
                                <div class="tabs_gotoWrap col-xs-12 col-md-2 animatedParent animateOnce"
                                    data-sequence='500'>
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
                                            <img class="img-cover"
                                                src="<?= base_url('assets/images/icons/play.svg'); ?>" />
                                        </a>
                                    </div>
                                    <?php endif ?>
                                </div>
                                <div class="tabs_sectionsWrap col-xs-12 col-md-10 animatedParent animateOnce">
                                    <?php
                                            if(isset($product['imagen'])){
                                    for ($i=0; $i < count($product['imagen']); $i++) { ?>
                                    <?php if($i ==0){ ?>
                                    <section class="tabs_section -open animated growIn" id="principal-img">
                                        <img src="<?= base_url($product['imagen'][$i]); ?>" alt="">
                                    </section>
                                    <?php }else{ ?>
                                    <section class="tabs_section animated growIn"><img
                                            src="<?= base_url($product['imagen'][$i]); ?>" alt=""></section>
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

                        <button
                            class="trans-info name-product <?= $color; ?> font-nexaregular"><?= $pagina['pagina']; ?></button>
                        <h2 class="px-0 col-xs-12 title-detail-product font-nexaheavy"><?= $product['titulo']; ?></h2>
                        <span class="px-0 col-xs-12 subtitle-detail-product font-nexaregular"
                            style="border-bottom:2px solid lightgray;margin-bottom:15px;padding-bottom:15px;"><?= $product['subtitulo']; ?></span>



                        <div style="display:block;"> <img
                                style="display:inline-block;width:10vh;height:8vh;margin-right:3%;padding-bottom:4%;"
                                src="<?= base_url(); ?>assets/images/precio-online.png">
                            <div class="font-nexaheav text-left"
                                style="display:inline-block;color:#c51152;font-weight:bold; font-size: 2.3em;font-family:'nexaregularuploaded_file';">
                                S/ <?= $product['precio']; ?></div>
                        </div>

                        <div class="font-nexaheav"
                            style="text-align:left;font-size:1.1em;font-weight:bold;font-family:'nexa-lightuploaded_file';margin-top:-0.5rem;">
                            Normal: S/ <?= $product['precio_anterior']; ?></div>
                        <br>
                        <span class="px-0 col-xs-12  font-nexaregular"
                            style="font-size:1.2em; font-family:'nexaheavyuploaded_file';padding-bottom:11px; ">
                            <?php 
                                    $detalles = $product["detalles-multimedia"];
                                    echo !empty($detalles) ? 'COLORES DISPONIBLES' : 'COLOR UNICO';
                                ?>
                        </span>
                        <ul class="colors" id="div-colors" style="display:block;">

                            <?php 
                                            if(!empty($detalles)){
                                                foreach ($detalles as $key => $value) {
                                                    if($value['estado']== 'activo'){
                                                        echo '<li class="btn btnprimary1 color active selectColor" 
                                                        style="background-color:'.$value['color'].';"
                                                        data-img = "'.$value['foto'].'"
                                                        data-color =  "'.$value['color'].'"
                                                        data-stock =  "'.$value['stock'].'"
                                                        data-producto_sku =  "'.$value['producto_sku'].'"
                                                        ></li>';
                                                    }
                                                    
                                                }
                                            }
                                    ?>

                        </ul>

                        <div style="margin-top:4px;">
                            <label
                                style="display:inline-block;font-size:16px;font-family:'nexaregularuploaded_file';font-weight:bold;">CANTIDAD:
                            </label>

                            <div class="cantidad_btn" style="display:inline-block;">
                                <button id="dism" style="margin:0 2%;width:42px;height:42px">-</button>
                                <input class="form-control-field" name="pwd" value="1" type="text" id="cantidad_prod"
                                    min="1" style="padding:0px;width:10%; border:none!important;text-align:center; 
                                    vertical-align: middle!important;font-size:2em!important;font-family:nexaheavyuploaded_file!important;background-color:transparent!important" readonly>
                                <button id="aum" style="margin:0 2%;width:42px;height:42px">+</button>
                            </div>
                            <br> <br>
                            <button class="btnAddCarrito btn btn-cmn" type="button" data-toggle="modal"
                                data-target="#DetalleProducto" 
                                data-title="<?php echo $product['titulo']?>"
                                data-id       = "<?php echo $product['id']?>"
                                data-precio   = "<?php echo $product['precio_anterior']?>"
                                data-producto_sku   = "<?php echo $product['producto_sku']?>"
                                data-precio_online   = "<?php echo $product['precio']?>"
                                data-img   = "<?= $product['imagen'][0] ?>"
                                data-peso   = <?= $product['precio'] ?>
                                data-volumen   = <?= $product['volumen'] ?>
                                data-cantidad ="1">
                                <a href="#" style="color:white;border: 2px solid #c51152;" tabindex="-1"
                                >AÑADIR AL CARRO
                                </a>
                            </button>
                        </div>

                        <br>




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
                                                    <a href="<?= base_url($row->imagen); ?>" data-fancybox="images">
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
                
                <?php 
                if(isset($producto_rel) ){ ?>
                <?php foreach ($producto_rel as $value): ?>
                <div class="wrapper-cards-products">
                    <a class="linkabsolute"
                        href="<?php echo base_url($value['cat_url'].'/'.$value['subcat_url'].'/'.$value['prod_url']) ?>"></a>
                    <div class="content-img-card">
                        <img src="<?= base_url($value['imagen']); ?>" alt="" class="img-cnt">
                    </div>
                    <div class="content-title-card">
                        <h2 class="h2-title font-nexaheavy"><?= $value['titulo']; ?></h2>
                        <span class="d-block subtitle-card"><?= $value['subtitulo']; ?></span>
                        <div class="btn-vp">
                            <a href="<?php echo base_url($value['cat_url'].'/'.$value['subcat_url'].'/'.$value['prod_url']) ?>"
                                class="a-btn font-nexaheavy">ver producto</a>
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

<script src="<?= base_url('assets/js/libraries/fancybox.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('.tabs span').click(function() {
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

<div class="modal fade" id="DetalleProducto" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width:100%; padding:1%;padding-top:0px;border-radius:5%;padding:4%;">
            <div class="modal-header" style=" color:#c51152; border-bottom:0 none;padding-bottom:1%;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-25px;">
                    <span aria-hidden="true" style="color:#c51152;font-weight:bold;font-size:1.5em;">&times;</span>
                </button>

                <div style="display:block;text-align:center;">
                    <div style="display:inline-block"> 
                    <img src="<?= base_url(); ?>assets/images/icono-comprobar.svg"
                            id="img-check" style="width:1.5rem;height:auto;"></div>
                    <div style="display:inline-block;vertical-align:middle;margin-left:1.5%;">
                        <h2 class="modal-title" id="txt-exito"
                            style="font-size:1.7rem;vertical-align:middle;font-family:'nexaheavyuploaded_file';text-align:center;">
                            Producto añadido con éxito</h2>
                    </div>
                </div>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-xs-5">
                        <img 
                        class="img-modal"
                        src="<?= base_url($product['imagen'][0]); ?>" 
                        alt="<?= $product['titulo']; ?>" 
                        style="width:100%; height:auto;text-align:left;"
                        >
                    </div>
                    <div class="col-md-7 col-xs-7" 
                    style=" display: flex;
                    justify-content: center;
                    align-content: center;
                    flex-direction: column;"
                    >
                        <h2 class="modal-title" id="title-principal" style="font-size:1.3rem;font-weight:bold;">
                        <?= $product['titulo']?>
                        </h2>
                        <div class="font-nexaheav cantidadModal"
                            style="text-align:left;font-size:1.3em;font-family:'nexaregularuploaded_file';font-weight:100">
                            Cantidad: 1
                        </div>


                        <div style="display:block;"> <img
                                style="text-align:left;display:inline-block;width:7vh;height:5vh;margin-right:3%;padding-bottom:4%;"
                                src="<?= base_url(); ?>assets/images/precio-online.png">
                            <div class="font-nexaheav"
                                style="text-align:left;display:inline-block;color:#c51152;font-weight:bold; font-size: 1.2rem;font-family:'nexaregularuploaded_file';">
                                S/ <?=$product['precio'] ?></div>
                        </div>
                        <div class="font-nexaheav"
                            style="font-weight:100;text-align:left;font-size:1.1em;font-family:'nexaregularuploaded_file';">Normal: S/ <?=$product['precio_anterior'] ?></div>
                    </div>

                </div>
            </div>
            <div class="modal-footer"
                style="text-align:center;border-top:0 none;padding-top:7px;border-bottom:1px solid #c3c3c3;padding-bottom:35px;">

                <a href="<?php echo base_url('carrito'); ?>"><button type="button" class="btn  btn-cmn"
                style="width:75%!important;text-align:center;font-size:1.2rem!important;padding-top:7px;padding-bottom:7px; padding-left:0px;padding-right:0px; ">IR
                        AL CARRO</button></a>
                <br>
                <br>
                <a href="<?php echo base_url('belleza/cuidado-del-rostro'); ?>"
                    style="font-size: 0.95rem;font-weight:bold;text-decoration-line:underline;">Seguir comprando</a>
            </div>
            <?php 
            $sugeridos = $product["sugeridos"];
            if(!empty($sugeridos)) {
                echo 
                    '<div class="modal-header" style="text-align:center;border-bottom:0 none;">
                    <h4 class="modal-title font-nexaheavy" id="exampleModalLongTitle"
                    style="font-size:2.4vh;color:#c51152;">
                    PRODUCTOS SUGERIDOS
                    </h4>
                    </div>';
            }
            ?>
            
           
            <div class="modal-body" style="padding:0px;">
                <div class="row" style="margin:0px;">
                    <div class="col-md-12 ">
                        <div class="row" style="margin:0px;">
                            
                        <?php 
                        if(!empty($producto_rel)) {
                            $sugeridos = array_slice($producto_rel,0,3);
                            
                            $col = 12/count($sugeridos);

                            foreach($sugeridos as $value ):
                                echo 
                                '
                                <div class="col-md-'.$col.' col-xs-'.$col.'" style="padding:0;">
                                    <div class="carrosuel-two-home slick-initialized slick-slider">
                                        <div class="slick-list draggable">
                                            <div class="slick-track"
                                                style="opacity: 1;width: 100%;transform: translate3d(0px, 0px, 0px);">
                                                <div class="slick-slide slick-current slick-active" data-slick-index="0"
                                                    aria-hidden="false" style="width: 100%;">
                                                    <div>
                                                        <div class="wrapper-cards-products pro-suger"
                                                            style="background-color:transparent !important;width: 100%; height:100%; display: inline-block;">
                                                            <a class="linkabsolute" href="#" tabindex="0"></a>
                                                            <div class="content-img-card"
                                                                style="width:100% !important; margin-top:8%; height:auto;">
                                                                <img src="'.base_url($value['imagen']).'" alt=""
                                                                    class="img-cnt">
                                                            </div>
                                                            <div class="content-title-card">
                                                                <h2 class="h2-title font-bold title-sugerido"
                                                                    style="font-size:1.2em;color:black;">'.$value['titulo'].'</h2>
                                                                <br>
                                                                <div class="btn-vp" style="width:75%;">
                                                                    <a href="'.base_url($value['cat_url'].'/'.$value['subcat_url'].'/'.$value['prod_url']).'" class="a-btn font-nexaheavy ver-prod"
                                                                        style="font-size:1.2vh;padding-top:0.6em;padding-bottom:0.6em;"
                                                                        tabindex="0">ver producto</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                           
                                 ';
                            endforeach;
                           
                        }
                        ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #fff!important;
    }
</style>
<?php
        include 'src/includes/footer.php'
    ?>
</body>

</html>