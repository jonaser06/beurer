<div class="modal-dialog modal-lg" role="document">
    <form id="popcreateeditform-inputdata-<?= $values['idvariable']; ?>" action="#" method="POST" onsubmit="return false;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal</h4>
            </div>
            <div class="modal-body">
                <?php
                foreach ($columnas as $key => $datax) {
                    $dataix = array(
                        'variable' => array(
                            'label' => $datax['label'],
                            'descripcion' => $datax['description'],
                            'nombre' => $datax['col'],
                            'valor' => isset($values[$datax['col']]) ? $values[$datax['col']] : '',
                            'entrada' => '',
                        )
                    );

                    echo $this->load->view('backend/inputs/' . $datax['type'], $dataix, TRUE);
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary btn-flat btn-guardar-popup-inputdata-<?= $values['idvariable']; ?>">Guardar</button>
            </div>
        </div>
    </form>
</div>