<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?>
    </label>
    <textarea class="form-control" name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>" rows="3"><?= isset($variable['valor']) ? $variable['valor'] : ''; ?></textarea>
</div>