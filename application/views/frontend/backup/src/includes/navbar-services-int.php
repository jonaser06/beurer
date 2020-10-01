<section class="sct-navbar-products nb-serv">
    <div class="wow zoomIn wrapper-navP <?= in_array('garantizamos-el-despacho', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="<?= base_url();  ?>assets/images/spiner.png" alt="">
        <a href="<?= base_url();  ?><?= ($lang == 'es/')?'es/':'' ?>garantizamos-el-despacho" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-despacho"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')? $relacion['despacho']:$relacion['despacho_en'] ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('asesoria-tecnica', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="<?= base_url();  ?>assets/images/spiner.png" alt="">
        <a href="<?= base_url();  ?><?= ($lang == 'es/')?'es/':'' ?>asesoria-tecnica" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-asesoria"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')? $relacion['asesoria']:$relacion['asesoria_en'] ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('calidad-de-productos', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="<?= base_url();  ?>assets/images/spiner.png" alt="">
        <a href="<?= base_url();  ?><?= ($lang == 'es/')?'es/':'' ?>calidad-de-productos" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-calidad"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')? $relacion['producto']:$relacion['producto_en'] ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('condiciones-de-pago', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="<?= base_url();  ?>assets/images/spiner.png" alt="">
        <a href="<?= base_url();  ?><?= ($lang == 'es/')?'es/':'' ?>condiciones-de-pago" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-cond-de-pago"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')? $relacion['pagos']:$relacion['pagos_en'] ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('informacion-del-mercado', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="<?= base_url();  ?>assets/images/spiner.png" alt="">
        <a href="<?php echo base_url(); ?><?= ($lang == 'es/')?'es/':'' ?>informacion-del-mercado" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-info-de-mercad"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')? $relacion['mercado']:$relacion['mercado_en'] ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('informacion-de-tendencias', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="<?= base_url();  ?>assets/images/spiner.png" alt="">
        <a href="<?= base_url();  ?><?= ($lang == 'es/')?'es/':'' ?>informacion-de-tendencias" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-info-de-tend"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')? $relacion['tendencia']:$relacion['tendencia_en'] ?></h1>
            </div>
        </a>
    </div>
</section>