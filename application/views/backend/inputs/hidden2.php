<div class="form-group" >
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?>
    </label>
    <input type="hidden" class="form-control" name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" value="<?= isset($variable['valor']) ? $variable['valor'] : ''; ?>">
</div>
