<?php include 'src/includes/header.php' ?>

<div class="content-recovery">
    <div class="row-content-recovery">
        <h2>Cambiar clave</h2>
        <p>Ingresa la nueva contraseña de tu cuenta de Beurer.pe</p>
        <hr>
        <label for="">Nueva Contraseña</label>
        <input type="hidden" name="id" value="<?php echo $id['key']; ?>">
        <input type="password" class="email-recovery">
        <input type="button" value="Cambiar" class="change_password">
    </div>
</div>

<?php include 'src/includes/footer.php' ?>

</body>

</html>