<section class="sct-navbar-products">
    <div class="wow zoomIn wrapper-navP <?= in_array('industria-alimentaria', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="assets/images/spiner.png" alt="">
        <a href="<?= base_url() ?><?= ($lang == 'es/')?'es/':''; ?>industria-alimentaria" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-ind-alimentaria"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')?$categoria['categoria'] : $categoria['categoria_en']; ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('nutricion-y-salud', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="assets/images/spiner.png" alt="">
        <a href="<?= base_url() ?><?= ($lang == 'es/')?'es/':''; ?>nutricion-y-salud" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-nutricion"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')?$categoria['nutri_categoria'] : $categoria['nutri_categoria_en']; ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('cuidado-personal', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="assets/images/spiner.png" alt="">
        <a href="<?= base_url() ?><?= ($lang == 'es/')?'es/':''; ?>cuidado-personal" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-cuidado-personal"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')?$categoria['cuid_categoria'] : $categoria['cuid_categoria_en']; ?></h1>
            </div>
        </a>
    </div>
    <div class="wow zoomIn wrapper-navP <?= in_array('cuidado-del-hogar', $uriSegments ) ? 'active' : ''; ?>">
        <img class="img-spinner" src="assets/images/spiner.png" alt="">
        <a href="<?= base_url() ?><?= ($lang == 'es/')?'es/':''; ?>cuidado-del-hogar" class="contenedor-navP">
            <div class="info-nav">
                <i class="icon-nP icon-cuidado-hogar"></i>
                <h1 class="font-titles-md textUppercase"><?= ($lang == 'es/')?$categoria['hogar_categoria'] : $categoria['hogar_categoria_en']; ?></h1>
            </div>
        </a>
    </div>
</section>