<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
    </label>
    <input type="text" class="form-control my-colorpicker1 colorpicker-element" name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" value="<?= isset($variable['valor']) ? $variable['valor'] : ''; ?>">
</div>

<script>
    $(document).ready(function () {
        $(".my-colorpicker1").colorpicker();
        
    });
</script>