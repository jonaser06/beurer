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
            <th>Categoria</th>
            <th>Codigox</th>
            <th>Producto</th>
            <th>Presentacion</th>
            <th>Piezas</th>
            <th>Material</th>
            <th>Alto</th>
            <th>Diametro</th>
            <th>Capacidad_ml</th>
            <th>Capacidad_oz</th>
            <th>Color</th>
            <th>Cantidad</th>
            <th>Bolsa</th>
            <th>Numero_bolsas</th>
            <th>Regalo</th>
            <th>Precio</th>
            <th>Precio_anterior</th>
            <th>Precio_total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $key => $producto) { ?>
            <tr>
                <td><?= $producto['idpedido'] ?></td>
                <td><?= htmlentities($producto['categoria'], ENT_QUOTES, "UTF-8") ?></td>
                <td><?= $producto['codigox'] ?></td>
                <td><?= htmlentities($producto['producto'], ENT_QUOTES, "UTF-8") ?></td>
                <td><?= htmlentities($producto['presentacion'], ENT_QUOTES, "UTF-8") ?></td>
                <td><?= $producto['piezas'] ?></td>
                <td><?= $producto['material'] ?></td>
                <td><?= $producto['alto'] ?></td>
                <td><?= $producto['diametro'] ?></td>
                <td><?= $producto['capacidad_ml'] ?></td>
                <td><?= $producto['capacidad_oz'] ?></td>
                <td><?= $producto['color'] ?></td>
                <td><?= $producto['cantidad'] ?></td>
                <?php if($producto['bolsa'] == 1){
                    $bolsa='Si';
                }else{
                    $bolsa='No';
                }
                ?>
                <td><?= $bolsa ?></td>
                <td><?= $producto['numbolsas'] ?></td>
                <?php if($producto['regalo'] == 1){
                    $regalo='Si';
                }else{
                    $regalo='No';
                }
                ?>
                <td><?= $regalo ?></td>
                <td><?= $producto['precio'] ?></td>
                <td><?= $producto['precio_anterior'] ?></td>
                <td><?= $producto['precio_total'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>