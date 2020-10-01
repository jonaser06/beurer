<div class="form-group">
    <label><?= $variable['variables-label']; ?></label>

    <div class="input-group date" id="<?= $variable['variables-name'] ?>">
        <input type="text" class="form-control" name="<?= $variable['variables-name'] ?>" value="<?= isset($variable['variables_values-value']) ? $variable['variables_values-value'] : ''; ?>">
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#<?= $variable['variables-name'] ?>").datetimepicker({
            allowInputToggle: true,
            format: "YYYY-MM-DD"
        });
    });
</script>