<table border="1">
    <thead>
<!--        <tr>
            <th rowspan="2"># Pedidos</th>
            <th colspan="6">Entrega</th>
            <th colspan="3">Entrega</th>
            <th colspan="7">Pedido</th>
        </tr>-->
        <tr>
            <th>Idpedido</th>
            <th>Idusuario</th>
            <th><?= htmlentities("Día de compra", ENT_QUOTES, "UTF-8")?></th>
            <th>Fecha compra</th>
            <th><?= htmlentities("Día", ENT_QUOTES, "UTF-8")?></th>
            <th>Mes</th>
            <th><?= htmlentities('Día de semana', ENT_QUOTES, "UTF-8")?></th>
            <th><?= htmlentities('Año', ENT_QUOTES, "UTF-8") ?></th>
            <th>Hora</th>
            <th>Nombres</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Tipo documento</th>
            <th>Tipo pago</th>
            <th>Exportado</th>
            <th>Estado pago</th>
            <th>Estado entrega</th>
            <th>Total S/</th>
            <th>Tipo cliente</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedidos as $key => $pedido) { ?>
            <tr>
                <td><?= $pedido['idpedido'] ?></td>
                <td><?= $pedido['idusuario'] ?></td>
                <!-- entrega -->
                <td><?= $pedido['fecha_compra_dia'] ?></td>
                <td><?= $pedido['fecha_compra'] ?></td>
                <td><?= $pedido['dia'] ?></td>
                <td><?= $pedido['mes'] ?></td>
                <td><?= htmlentities($pedido['dia_semana'], ENT_QUOTES, "UTF-8") ?></td>
                <td><?= $pedido['año'] ?></td>
                <td><?= $pedido['hora'] ?></td>                
                <td><?= htmlentities($pedido['nombres'], ENT_QUOTES, "UTF-8") ?></td>
                <td><?= $pedido['telefonosolicita'] ?></td>
                <td><?= $pedido['celularsolicita'] ?></td>
                <td><?= htmlentities($pedido['correosolicita'], ENT_QUOTES, "UTF-8") ?></td>
                <td><?= $pedido['tipofactura'] ?></td>
                <td><?= $pedido['tipo_pago'] ?></td>
                <td><?= $pedido['exportado'] ?></td>
                <td><?= $pedido['estadopago'] ?></td>
                <td><?= $pedido['estadoentrega'] ?></td>
                <td><?= $pedido['total'] ?></td>
                <td><?= $pedido['tipocliente'] ?></td>
                <?php
                ?>
            </tr>
        <?php } ?>
    </tbody>
</table>