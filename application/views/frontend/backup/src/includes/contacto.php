<section class="sct-form container-fluid px-0">
    <div class="row justify-content-end">
        <div class="col-12 col-lg-6 wrapper-form wow fadeInLeft">
            <div class="row">
                <div class="col-12 col-lg-11 content-titles-form">
                    <h2 class="title-big-form titles-big"><?= ($lang == 'es/')?'¿Dudas o consultas?':'Doubts or Question?'; ?></h2>
                    <span class="subtitle-form font-titles-md"><?= ($lang == 'es/')?'ESCRÍBENOS AQUÍ':'WRITE US HERE'; ?></span>
                </div>
                <div class="col-12 col-lg-11 titles-form-home">
                    <h2 class="title-big-form titles-big"><?php echo ($lang == 'es/')? 'Contáctanos':'Contact Us'; ?></h2>
                </div>
                <div class="col-12 col-lg-11">
                    <?php
                        include 'form.php'
                    ?>
                </div>
            </div>
        </div>
        <!--MODAL-->
        <?php if($lang == 'es/'){ ?>
            <section class="sct-modal sct-moda1">
                <div class="modal-content modal-content1">
                    <div class="modal">
                        <div class="modal-header">
                            <h2 class="titles-big">POLÍTICA DE PRIVACIDAD</h2>
                            <span id="modal-close-btn">&Cross;</span>
                        </div>
                        <div class="modal-info">
                            <p class="font-internas">El sitio web de INNOVATIVE FOOD SOLUTIONS cuenta con una estricta política de privacidad y confidencialidad en la información de nuestros clientes. </p>
                            <p class="font-internas">Somos responsables de todo el contenido publicado en esta página web, siendo los únicos autorizados en realizar cambios en la misma.</p>
                            <p class="font-internas">Mediante la aceptación de esta política de privacidad y de protección de datos personales, usted acepta y consiente de manera expresa a INNOVATIVE FOOD SOLUTIONS, 
                                tratar los datos personales que proporciones de manera oral, escrita, o a través de cualquier medio de comunicación electrónica o convencional para los siguientes 
                                fines: Envío de publicidad, mediante cualquier medio y soporte, envío de invitaciones y actividades relacionadas a la empresa.</p>
                            <p class="font-internas">Compromiso de INNOVATIVE FOOD SOLUTIONS es garantizar en salvaguardar los datos recopilados con total confidencialidad.</p>
                            <p class="font-internas">El titular del dato personal o su representante podrá presentar la solicitud de ejercicio de sus derechos reconocidos en la ley 29733 escribiendo al 
                                correo de <a href="mailto:exports@innovativefoodsolutions.es" class="a-polt"><strong>exports@innovativefoodsolutions.es</strong></a></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php }else{ ?>
            <section class="sct-modal sct-moda1">
                <div class="modal-content modal-content1">
                    <div class="modal">
                        <div class="modal-header">
                            <h2 class="titles-big">PRIVACY POLICY</h2>
                            <span id="modal-close-btn">&Cross;</span>
                        </div>
                        <div class="modal-info">
                            <p class="font-internas"> The INNOVATIVE FOOD SOLUTIONS website has a strict privacy and confidentiality policy in the information of our clients.</p>
                            <p class="font-internas">We are responsible for all content published on this website, being the only ones authorized to make changes to it.</p>
                            <p class="font-internas">By accepting this privacy policy and personal data protection, you expressly accept and consent to INNOVATIVE FOOD SOLUTIONS,
                                treat the personal data you provide orally, in writing, or through any means of electronic or conventional communication for the following
                                Purposes: Sending advertising, by any means and support, sending invitations and activities related to the company.</p>
                            <p class="font-internas">Commitment of INNOVATIVE FOOD SOLUTIONS is to guarantee in safeguarding the data collected with total confidentiality.</p>
                            <p class="font-internas">The holder of the personal data or his representative may submit the request to exercise his rights recognized in law 29733 by writing to
                                mail of <a href="mailto:exports@innovativefoodsolutions.es" class="a-polt"><strong>exports@innovativefoodsolutions.es</strong></a></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!--MODAL2-->
        <section class="sct-modal sct-modal2">
            <div class="modal-content modal-content2">
                <div class="modal">
                    <div class="modal-header">
                        <h2 class="titles-big">MENSAJE ENVIADO</h2>
                        <span id="modal-close-btn">&Cross;</span>
                    </div>
                    <div class="modal-info">
                        <p class="font-internas">Tu solicitud fue enviada con éxito. </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-12 col-lg-5 px-0">
            <div class="content-map wow fadeInRight">
                <div id="map" style="height: 100%; width: 100%"></div>
                <!-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.4336789470512!2d-3.6880964843509503!3d40.4213949632791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422899a67f3305%3A0xe5e3c44f1eea5d32!2sCalle%20de%20Lagasca%2C%205%2C%2028001%20Madrid%2C%20Espa%C3%B1a!5e0!3m2!1ses-419!2spe!4v1566841754179!5m2!1ses-419!2spe"
                     style="border:0;" allowfullscreen=""></iframe> -->
            </div>
        </div>
    </div>
</section>