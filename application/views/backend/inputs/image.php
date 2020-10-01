<div class="form-group">
    <label for="imagen-<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
    </label>
    <div class="input-group">
        <input type="text" id="imagen-<?= $variable['nombre'] ?>" name="<?= $variable['nombre'] ?>" class="form-control" placeholder="Selecciona tu imagen" value="<?= isset($variable['valor']) ? $variable['valor'] : ''; ?>">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('imagen-<?= $variable['nombre'] ?>', '', '<?= $this->config->item('akey'); ?>');">
                <span class="glyphicon glyphicon-picture"></span>
            </button>
        </div>
    </div>
    <div style="display: table; width: 100%;">
        <div style="display: table-cell;text-align: center;vertical-align: middle;width: 100%;height: auto;padding: 15px;">
            <img src="<?= isset($variable['valor']) ? $variable['valor'] : ''; ?>" id="imagen-<?= $variable['nombre']; ?>-preview" style="width: auto; height: auto; max-width: 400px; max-height: 170px;">
        </div>
    </div>
</div>