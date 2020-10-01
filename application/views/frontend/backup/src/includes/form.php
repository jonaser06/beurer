<form action="enviar/contact" class="form row" method="post" id="form-contact" enctype="multipart/form-data">
    <div class="form__wrapper col-12">
        <input type="text" class="form__input" name="nombres">
        <label class="form__label">
            <span class="form__label-content">Nombres y apellidos</span>
        </label>
    </div>
    <div class="form__wrapper col-12 col-lg-6">
        <input type="text" class="form__input" name="empresa">
        <label class="form__label">
            <span class="form__label-content">Empresa</span>
        </label>
    </div>
    <div class="form__wrapper col-12 col-lg-6">
        <input type="email" class="form__input" name="email">
        <label class="form__label">
            <span class="form__label-content">Email</span>
        </label>
    </div>
    <div class="form__wrapper col-12 col-lg-6">
        <input type="text" class="form__input" name="telefono">
        <label class="form__label">
            <span class="form__label-content">Phone</span>
        </label>
    </div>
    <div class="form__wrapper col-12 col-sm-6 col-lg-6 d-flex align-items-center">
        <div class="input_file d-flex">
            <div class="img-file d-flex justify-content-center align-items-center"><img
                    src="<?= base_url();  ?>assets/images/icons/archivo.svg" alt=""></div>
            <label class="file_label d-flex align-items-center font-titles-md">
                <span class="font-titles-reg">Adjuntar archivo</span>
            </label>
            <input type="file" class="font-titles-md" name="adjuntar" id="file" multiple />
        </div>
    </div>
    <div class="form__wrapper col-12">
        <textarea class="form__input form_textarea" id="mensaje" name="mensaje"></textarea>
        <label class="form__label">
            <span class="form__label-content">Mensaje</span>
        </label>
    </div>
    <div class="d-flex justify-content-between align-items-center col-12 flex-column flex-lg-row">
        <div class="checkbox">
            <label class="font-titles-md label-pol">
                <input type="checkbox" name="acepta" value="1" /><i class="helper"></i><span>Usted reconoce haber leído y
                aceptado <span class="span-pol color-primary btn-modals btn-modals1" id="btn-modals1">la Política de datos
                    personales.</span></span>
            </label>
        </div>
        <div class="btn-container">            
            <button type="submit" class="btn font-titles-md btn-modals btn-modals2" id="btn-send-form">ENVIAR</button>
        </div>
    </div>
</form>