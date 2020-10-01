<div class="form-group">
    <label for="<?= $variable['nombre'] ?>-on">
        <?= $variable['label']; ?> <small style="color: #999;"><?= $variable['descripcion']; ?></small>
    </label>
    <div class="checkbox">
        <label for="<?= $variable['nombre'] ?>-on">
            <input type="hidden" name="<?= $variable['nombre'] ?>" id="<?= $variable['nombre'] ?>-off" value="0">
            <input type="checkbox" 
                   name="<?= $variable['nombre'] ?>" 
                   id="<?= $variable['nombre'] ?>-on" 
                   value="1" 
                   <?= (isset($variable['valor']) && $variable['valor'] == 1) ? 'checked' : ''; ?>
                   />
                   <?= $variable['label']; ?>
        </label>
    </div>
</div>
<script>
    $(document).ready(function () {
        var inputOn = $('#<?= $variable['nombre'] ?>-on');
        var inputOff = $('#<?= $variable['nombre'] ?>-off');

        inputOn.change(checboxValue);

        function checboxValue() {
//            if (inputOn.prop("checked")) {
            if (inputOn.is(':checked')) {
                inputOff.removeAttr("name");
                inputOn.attr("name", "<?= $variable['nombre'] ?>");
            } else {
                inputOn.removeAttr("name");
                inputOff.attr("name", "<?= $variable['nombre'] ?>");
            }
        }

        return checboxValue();
    });
</script>