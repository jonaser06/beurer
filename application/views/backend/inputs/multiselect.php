<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
    </label>
    <select name="<?= $variable['nombre'] ?>[]" id="<?= $variable['nombre'] ?>" class="form-control select2" style="width: 100%;" multiple="multiple"></select>
</div>
<script>
    $(document).ready(function () {
        $('#<?= $variable['nombre'] ?>').select2(<?= $variable['entrada'] ?>);
    });
</script>