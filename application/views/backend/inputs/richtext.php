<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?>
    </label>
    <textarea class="form-control richtext" name="<?= $variable['nombre'] ?>" rows="3"><?= isset($variable['valor']) ? $variable['valor'] : ''; ?></textarea>
</div>
<script>
    $(document).ready(function () {
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
    });
</script>