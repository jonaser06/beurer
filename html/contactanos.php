<!DOCTYPE html>
<html lang="en">

<?php
    include 'src/includes/header.php'
?>
    <main class="main-contact-us">
        <section class="sct-banner-int pos-rel" id="section0">
            <img src="assets/images/banner/contactanos.jpg" alt="" class="img-cover">
            <div class="container content-title-banner">
                <h1 class="title-banner font-nexaheavy text-uppercase">Contáctanos</h1>
            </div>
        </section>
        <section class="sct-form-contact">
            <div class="container">
                <div class="row animatedParent animateOnce">
                    <div class="col-xs-12 col-md-6 animated fadeInLeftShort">
                        <div class="row">
                            <div class="col-xs-12 col-md-11">
                                <h2 class="title-border text-uppercase font-nexaheavy">nos complacerá recibir su mensaje
                                    y ponernos en contacto con usted</h2>
                                <p class="p-internas">Si tiene preguntas sobre nuestros productos o nuestro sitio web,
                                    nos complacerá recibir su mensaje y ponernos en contacto con usted para atenderlo
                                    debidamente.</p>
                                <div class="wrapper-info-form col-xs-12 px-0">
                                    <div class="row">
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Síguenos:</h3>
                                            <div class="rds-form">
                                                <a href="#" class="icon-rs-form icon-facebook"></a>
                                                <a href="#" class="icon-rs-form icon-instagram"></a>
                                                <a href="#" class="icon-rs-form icon-youtube"></a>
                                            </div>
                                        </div>
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Correo:</h3>
                                            <a href="#" class="p-internas">ventas@beurer.pe</a>
                                        </div>
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Ubícanos en:</h3>
                                            <p class="p-internas">Av.Caminos del Inca N.257 Tienda N.149 Santiago de
                                                Surco - Lima</p>
                                        </div>
                                        <div class="info-form col-xs-6 col-sm-6">
                                            <h3 class="titles-info-form font-nexaheavy">Teléfono:</h3>
                                            <a href="#" class="p-internas">51 965981940</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 animated fadeInRightShort">
                        <form action="#" class="form row" method="post" id="form-contact-us">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="form__wrapper col-xs-12">
                                        <input type="text" class="form__input bg-input" id="name" name="name">
                                        <label class="form__label">
                                            <span class="form__label-content">Nombres</span>
                                        </label>
                                    </div>
                                    <div class="form__wrapper col-xs-12">
                                        <input type="text" class="form__input bg-input" id="last-name" name="last-name">
                                        <label class="form__label">
                                            <span class="form__label-content">Apellidos</span>
                                        </label>
                                    </div>
                                    <div class="form__wrapper col-xs-12">
                                        <input type="text" class="form__input bg-input" id="direction" name="direction">
                                        <label class="form__label">
                                            <span class="form__label-content">Dirección</span>
                                        </label>
                                    </div>
                                    <div class="form__wrapper col-xs-12 col-sm-6">
                                        <input type="text" class="form__input bg-input" id="pais" name="pais">
                                        <label class="form__label">
                                            <span class="form__label-content">País</span>
                                        </label>
                                    </div>
                                    <div class="form__wrapper col-xs-12 col-sm-6">
                                        <input type="text" class="form__input bg-input" id="cod-post" name="cod-post">
                                        <label class="form__label">
                                            <span class="form__label-content">Código Postal</span>
                                        </label>
                                    </div>
                                    <div class="form__wrapper col-xs-12 col-sm-6">
                                        <input type="text" class="form__input bg-input" id="phone" name="phone">
                                        <label class="form__label">
                                            <span class="form__label-content">Teléfono</span>
                                        </label>
                                    </div>
                                    <div class="form__wrapper col-xs-12 col-sm-6">
                                        <input type="email" class="form__input bg-input" id="email" name="email">
                                        <label class="form__label">
                                            <span class="form__label-content">Correo</span>
                                        </label>
                                    </div>
                                    <div class="form__wrapper col-xs-12">
                                        <textarea class="form__input form_textarea bg-input" id="textarea"
                                            name="textarea"></textarea>
                                        <label class="form__label">
                                            <span class="form__label-content">Mensaje</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="checkbox">
                                            <label class="font-light label-pol">
                                                <input type="checkbox" /><i class="helper"></i><span>He leído y acepto
                                                    las <a href="politicas-de-privacidad.php" class="span-pol color-primary">Políticas de
                                                        Privacidad.</a></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <button type="submit" class="font-nexaheavy btn-send"
                                                id="btn-send-form">ENVIAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="map-beurer">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1950.4907676532623!2d-76.99343005794609!3d-12.11341581285309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7ec37a6d22d%3A0x12293e9ad3f61963!2sAv.%20Caminos%20del%20Inca%20257%2C%20Lima%2015038!5e0!3m2!1ses-419!2spe!4v1579623677859!5m2!1ses-419!2spe" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </section>

    </main>
    <?php
        include 'src/includes/footer.php'
    ?>
    <script src="assets/js/libraries/jquery.validate.min.js"></script>
    <script src="assets/js/form.js"></script>

</body>

</html>