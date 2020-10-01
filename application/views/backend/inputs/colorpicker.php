<div class="form-group">
    <label for="<?= $variable['variables-name'] ?>"><?= $variable['variables-title']; ?></label>

    <div id="<?= $variable['variables-name'] ?>-colorpicker" class="input-group colorpicker-element">
        <input type="text" name="<?= $variable['variables-name'] ?>" id="<?= $variable['variables-name'] ?>" class="form-control" value="<?= isset($variable['variables_values-value']) ? $variable['variables_values-value'] : ''; ?>">
        <div class="input-group-addon">
            <i style="background-color: #000;"></i>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#<?= $variable['variables-name'] ?>-colorpicker").colorpicker({
            customClass: 'colorpicker-2x',
            sliders: {
                saturation: {maxLeft: 150, maxTop: 150},
                hue: {maxTop: 150},
                alpha: {maxTop: 150}
            }
        });
    });
</script>