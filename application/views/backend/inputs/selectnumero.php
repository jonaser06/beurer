<div class="row">
<div class="col-xs-4">
    <div class="form-group">
        <label for="<?= $variable['nombre'] ?>">
            <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
        </label>
        <select name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" class="form-control select2" style="width: 100%;">
            <option <?= isset($variable['valor']) && $variable['valor'] == 'Telefono' ? 'selected' : ''?> value="Telefono">Telefono</option>
            <option <?= isset($variable['valor']) && $variable['valor'] == 'Celular' ? 'selected' : ''?> value="Celular">Celular</option>
        </select>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
 

    });
</script>