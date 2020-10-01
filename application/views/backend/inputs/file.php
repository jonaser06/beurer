<div class="form-group">
    <label for="file-<?= $variable['nombre'] ?>"><?= $variable['label']; ?></label>
    <div class="input-group">
        <input type="text" id="file-<?= $variable['nombre'] ?>" name="<?= $variable['nombre'] ?>" class="form-control" placeholder="Selecciona tu archivo" value="<?= isset($variable['valor']) ? $variable['valor'] : ''; ?>">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default" aria-label="Search" onclick="Exeperu.popupManager('file-<?= $variable['nombre'] ?>', '', '<?= $this->config->item('akey'); ?>', 2);">
                <span class="fa fa-file-pdf-o"></span>
            </button>
        </div>
    </div>
</div>