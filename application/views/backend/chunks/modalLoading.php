<!-- Modal Loading -->
<div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="" style="z-index: 9999">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModalCreateEdit">Loading</h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <span class="sr-only">100% Complete</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Alerta -->
<div class="modal fade modal-danger" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="" style="z-index: 9998">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModalAlert">Alerta</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
                <button type="button" class="btn btn-default btn-acepted"><i class="glyphicon glyphicon-ok"></i> Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Crear / Editar -->
<div class="modal fade" id="modalCreateEdit" tabindex="-1" role="dialog" aria-labelledby="titleModalCreateEdit" style="z-index: 1500"></div>