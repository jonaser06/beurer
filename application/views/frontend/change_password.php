<?php include 'src/includes/header.php' ?>

<div class="content-recovery">
    <div class="row-content-recovery">
        <h2>Cambiar clave</h2>
        <p>Ingresa la nueva contraseña de tu cuenta de Beurer.pe</p>
        <hr>
        <label for="">Nueva Contraseña</label>
        <div class="ajax-resp"></div>
        <input type="hidden" name="id" class="idrecovery" value="<?php echo $id['key']; ?>">
        <input type="password" class="new_password">
        <input type="button" value="Cambiar" class="change_password">
    </div>
</div>

<?php include 'src/includes/footer.php' ?>

</body>

</html>