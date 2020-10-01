<div class="form-group">
    <label for="<?= $variable['nombre'] ?>">
        <?= $variable['label']; ?> 
        <small style="color: #999;">
            <?= $variable['descripcion']; ?>
        </small>
    </label>
    <textarea class="form-control" name="<?= $variable['nombre'] ?>" id="cam27" rows="3" style="display: none;">
        <?= (isset($variable['valor']) && !empty($variable['valor']))?$variable['valor']:'[]'; ?>
    </textarea>
    <br>
    <a href="javascript: Exeperu.crear_pf()" class="btn btn-xs btn-info btn-flat">
        <i class="glyphicon glyphicon-plus"></i> Agregar
    </a>
    <br><br>
    <div class="table-responsive">
        <table id="table_pf" class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Título</th>
                    <th>Detallaes</th>
                    <!-- <th>Producto(Ingles)</th> -->
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function () {
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');

        $('[data-toggle="tooltip"]').tooltip();
        Exeperu.key= '<?= $this->config->item('akey')?>' ;
        Exeperu.tablepf();
        Exeperu.tinyInit();
        $('#comple').select2({dropdownParent: $("#modalCreateEdit")});
        $('#colo').select2({dropdownParent: $("#modalCreateEdit")});
    });
</script>