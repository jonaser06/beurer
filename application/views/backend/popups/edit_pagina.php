<div class="modal-dialog modal-lg" role="document">
  <form id="formCrearEditarpagina" action="manager/paginas/saveanuncios" method="POST">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><strong>Anuncios</strong></h4>
            <style>
                .form-group.required .control-label:after {
                        color: #d00;
                        content: "*";
                        position: absolute;
                        margin-left: 8px;
                        top:2px;
                  }
            </style>
        </div>
        <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group" style="position: relative;">
                                <label for="campo_14mich">Anuncios </label>
                                <textarea class="form-control" name="anuncios_paginas[anuncios_paginas]" id="campo_14mich" rows="3" style="display: none;"><?= isset($anuncios_paginas) ? $anuncios_paginas : '[]'; ?></textarea><br>
                                <a href="javascript: Exeperu.crear_anuncio('<?= (isset($idpagina) && (int) $idpagina > 0) ? $idpagina : '0' ?>')" class="btn btn-xs btn-info btn-flat"><i class="glyphicon glyphicon-plus"></i> Agregar</a><br><br>
                                <div class="table-responsive">
                                <table id="table_anuncios" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Url</th>
<!--                                                <th>Tipo</th>
                                            <th>Dimensión</th>-->
                                            <th>Orden</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
                <button type="reset" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
          </div>
        <input type="hidden" id="ids" name="paginas[idpagina]" value="<?= isset($idpagina) ? $idpagina : '';?>">
    </div>
  </form>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        Exeperu.key = '<?= $this->config->item('akey') ?>';
        Exeperu.tinyInit('<?= $this->config->item('akey'); ?>');
        Exeperu.tablePrueba();
        Exeperu.dimensiones = <?= $dimensiones ?>;
//        Exeperu.tableAnuncios();
        $('#campo_15').select2({dropdownParent: $("#modalCreateEdit")});

        $("#formCrearEditarpagina").submit(function(e){
           e.preventDefault();
           $.ajax({
              url: $(this).attr('action'),
              type:$(this).attr('method'),
              data:$(this).serialize(),
              success:function(response){
                    var jm=JSON.parse(response);
                    
                    if(jm.tipo==1){
                        toastr.success(jm.mensaje,{timeOut:2000});
                        Exeperu.reloadTablePaginas();
                    }else{
                        toastr.error(jm.mensaje,{timeOut:2000});
                        var errores=JSON.parse(jm.errores); 
                        $.each( errores, function( key, value ) {
                            $("#"+value+"").parent().addClass("has-error");
                            if(value=='campo_4'){
                                $("#"+value+"").parent().parent().addClass("has-error");
                            }
                        });
                        var jmjm=JSON.parse(jm.jm); 
                        $.each( jmjm, function( key, value ) {
                            $("#"+value+"").parent().removeClass();
                        });
                    }
                    
              }
           });
        });
    });
</script>

</div>