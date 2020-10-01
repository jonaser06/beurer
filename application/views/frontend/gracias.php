<!DOCTYPE html>
<html lang="en">

<?php
    include 'src/includes/header.php'
?>
    <main class="main-contact-us">
        <section class="sct-banner-int pos-rel" id="section0">
            <img src="<?php echo base_url('assets/images/banner/contactanos.jpg'); ?>" alt="" class="img-cover">
            <div class="container content-title-banner">
            </div>
        </section>
        <section class="sct-form-contact" style="padding-bottom: 4em;">
            <div class="container">
                <div class="row animatedParent animateOnce">
                    <div class="col-xs-12 col-md-12 animated fadeInLeftShort">
                            <h2 class="text-uppercase text-center font-nexaheavy">
                                    Su mensaje fue enviado con éxito
                            </h2>
                            <!--button type="button" onclick="javascript:history.back(1)" class="btn btn-primary btn-enviar bold blanco verdeb button" style="width: 78px; margin: 0px auto; display: block;">VOLVER</button-->
                            <div class="col-xs-12 col-sm-2 text-center" style="margin: 0 auto;float: none;">
                                <button type="submit" onclick="javascript:window.location.href='https://beurer.pe/contactanos'" class="font-nexaheavy btn-send" id="btn-send-form">VOLVER</button>
                                <!--<a href="https://beurer.pe/contactanos" class="font-nexaheavy btn-send" id="btn-send-form" >VOLVER</a>-->
                            </div>
                            
                    </div>
                    
                </div>
            </div>
        </section>

    </main>
    <?php
        include 'src/includes/footer.php'
    ?>
</body>

</html>
