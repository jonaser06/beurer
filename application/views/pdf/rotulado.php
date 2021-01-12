<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equip="X-UA-Compatible" content="ie-dge">
</head>

<body
    style="border:1px solid #646464;width:320px;height:540;margin:0 auto;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <table width="100%" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table width="100%" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width:100%">
                            <img src="<?php echo base_url('assets/images/logos/logo-beurer.png'); ?>" alt="logo-beurer"
                                style="width:150px ; height:auto;display: block;">
                        </td>
                        <td align="center" style="margin: auto ;width: 60%;">
                            <table width="100%" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <barcode code="<?php echo strtoupper($pedido['codigo'])?>" type="C128A" text="1"
                                            width="300px" height="2" />
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center">
                                        <?php echo strtoupper($pedido['codigo'])?>
                                        <br><br>
                                        <br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
        <tr>
            <td style=" width: 100%; ">
                <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                    <tr>
                        <td width="100%"></td>
                        <td width="60%">
                            <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                                <tr>
                                    <td align="center">
                                        <h4
                                            style="margin:10px 0;text-align:center;width: 100%;color:#000 ;padding:10px">
                                            MÉTODO DE PAGO</h4>
                                        <br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#000" align="center">
                                        <h4
                                            style="margin:10px 0;text-align: center;color:#fff;background-color: #000000; ">
                                            PAGADO
                                        </h4>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>

                <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                    <tr>

                        <td style="width:33% ; text-align: center; "><?php echo $pedido['codigo'] ?></td>
                        <td style="width:33% ; text-align: center; ">PIEZAS 1/1</td>
                        <td style="width:33% ; text-align: center; ">Boleta</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td bgcolor="#000" align="center" padding="4">
                            <h4 style="padding-top:10px;margin: 10px 0 0 0 ;text-align: center;color:#fff;"> REMITENTE
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td>BEURER </td>
                    </tr>
                    <tr>
                        <td>
                        Av. Caminos del Inca Nº 257 2da etapa Tienda Nº 149 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            SANTIAGO DE SURCO - LIMA - LIMA
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- DESTINATARIO -->
        <tr>
            <td>
                <table width="100% " align="center " cellpadding="0 " cellspacing="0">
                    <tr>
                        <td bgcolor="#000" align="center">
                            <h4 style="padding:10px;margin: 10px 0 0 0 ;color:#fff;"> DESTINATÁRIO
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100% " align="center " cellpadding="0 " cellspacing="0 ">
                                <tr>
                                    <td style="width:30% ">Cliente</td>
                                    <td style="width:60% ">: <?php echo $pedido['nombres'].' '.$pedido['apellidos']?></td>
                                </tr>
                                <tr>
                                    <td style="width:30% "><?php echo $pedido['tipo_documento']?></td>
                                    <td style="width:60% ">: <?php echo $pedido['numero_documento']?></td>
                                </tr>
                                <tr>
                                    <td style="width:30% ">Teléfono</td>
                                    <td style="width:60% ">: <?php echo $pedido['telefono']?></td>
                                </tr>
                                <tr>
                                    <td style="width:30% ">Receptor Alternativo</td>
                                    <td style="width:60% ">: <?php echo $pedido['dest_nombres']?></td>
                                </tr>

                            </table>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>

        <tr>
            <td bgcolor="#fff" style="padding:14px;height: 13px; width:100%">
                <hr bgcolor="#ffffff">
            </td>
        </tr>
        <tr>
            <td>
                <table width="100% " align="center " cellpadding="1 " cellspacing="1">

                    <tr>
                        <td>
                            <table width="100% " align="left " cellpadding="1" cellspacing="0 ">
                                <tr>
                                    <td style="width:10% "><b>Dirección</b></td>
                                    <td style="width:80% ">: <?php echo intval($pedido['recojo']) ? 'Av. Caminos del Inca Nº 257 - Tienda Nº 149': $pedido['dir_envio'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width:10% "><b>Nro. /Lote</b></td>
                                    <td style="width:80% "><b>Dpto</b></td>

                                </tr>
                                <tr>
                                    <td style="width:10% "><b>Urbanizacion</b></td>
                                    <td style="width:80% "></td>
                                </tr>
                                <tr>
                                    <td style="width:10% "><b>Distrito</b></td>
                                    <td style="width:80% ">: <?php echo intval($pedido['recojo'])? 'SANTIAGO DE SURCO': $pedido['distrito']?></td>
                                </tr>
                                <tr>
                                    <td style="width:10% "><b>Provincia</b></td>
                                    <td style="width:80% ">: LIMA - LIMA</td>
                                </tr>
                                <tr>
                                    <td style="width:20% "><b>Referencia</b></td>
                                    <?php if(intval($pedido['recojo'])) { ?>
                                        <td style="width:80% ">: Av. Caminos del Inca 2da etapa </td>
                                    <?php } else {?>
                                    <td style="width:80% ">: <?php echo ($pedido['referencia']&&$pedido['referencia'] !== 'undefined' ) ?$pedido['referencia'] : ''  ?></td>
                                    <?php }?>
                                    
                                </tr>

                            </table>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
        <br>
        <br>
        <tr>
            <td align="center" style="margin: auto ;width: 100%;">
                <table width="100%" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <barcode code="<?php echo strtoupper($pedido['codigo'])?>" type="C128A" text="1"
                                width="400px" height="2" />
                        </td>
                    </tr>
                    <tr align="center">
                        <td align="center" style="font-size:25px">
                            <?php echo strtoupper($pedido['codigo'])?>
                            <br><br>
                            <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>