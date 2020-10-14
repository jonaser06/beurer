<?php include 'src/includes/header.php' ?>

<div class="content-recovery">
    <div class="row-content-recovery">
        <h2>Recuperar clave</h2>
        <p>ingresa el email de tu cuenta de Beurer.pe</p>
        <hr>
        <p class="err_recovery">Este e-mail no se encuentra registrado. Por favor, inténtalo nuevamente o crea una nueva cuenta <a href="<?php echo base_url('registro'); ?>">aquí</a>.</p>
        <p class="err_mail">Este correo no es valido!</p>
        <label for="">Email</label>
        <input type="text" class="email-recovery">
        <input type="button" value="Continuar" class="button_recovery">
    </div>
</div>

<?php include 'src/includes/footer.php' ?>

</body>

</html>