<div class="form-group">
    <label for="file-<?= $variable['nombre'] ?>"><?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small></label>
    <div class="input-group">
        <input type="text" id="file-<?= $variable['nombre'] ?>" name="<?= $variable['nombre'] ?>" class="form-control" placeholder="Selecciona tu archivo" value="<?= isset($variable['valor']) ? $variable['valor'] : ''; ?>">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('file-<?= $variable['nombre'] ?>', '', '<?= $this->config->item('akey'); ?>', 3);">
                <span class="glyphicon glyphicon-film"></span>
            </button>
        </div>
    </div>
</div>