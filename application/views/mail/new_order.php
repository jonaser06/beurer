<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equip="X-UA-Compatible" content="ie-dge">
</head>

<body style="margin: 0 auto ; padding:0;color:#333333;max-width: 720px; padding: 0rem;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;border-right: 1px solid #333333;">
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-left: 1px solid #333333;">
        <!-- HEADER  -->
        <tr>
            <td align="center" style="padding-top :20px;padding-bottom:20px;margin-bottom:10px">
                <img src="<?php echo base_url('assets/images/logos/logo-beurer.png'); ?>" alt="logo-beurer" style="width:180px ; height:auto;display: block;">
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" height="310">
                    <tr>
                        <td align="center" style="padding: 14px; position: relative; background-size: 100% 100%;" background="<?php echo base_url('assets/images/fondomail.png'); ?>">
                            <!-- <img width="95%" src="<?php echo base_url('assets/images/fondomail.png'); ?>" alt="#" style="border-radius: 14px;"> -->
                            <span style="padding:14px 25px;font-size:45px;position: absolute;top:40px;left:30px; color: #fff;text-align: left">
                                <span style="display: block;">Tienes un nuevo pedido  </span>
                            </span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- aquí va el codigo de pedido -->
        <tr>
            <td style="text-align:center;color:#333333;font-weight:bold;padding:16px">
                <b>Código de pedido</b>
                <b><?php echo $orders['cod_pedido']; ?></b>
                <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
            </td>
        </tr>
        <!-- productos comprados -->
        <tr>
            <td>
                <tr>
                    <td align="center" style="color:#C51152;font-weight:bold;text-align:center">
                        Detalle de tu pedido:
                    </td>
                </tr>
            </td>
            <!-- productos -->
            <td>
                <?php foreach ($orders['productos'] as $key => $value) { ?>
                    <table width=100%>
                        <tr>
                            <td width="50%" align="center">
                                <img width="120px" src="<?php echo base_url($value['imagen']); ?>">
                            </td>
                            <td width="50%">
                                <span style="font-weight:bold;display: block; "><?php echo $value['nombre']; ?></span>
                                <span style="display: block; ">sku: <?php echo $value['producto_sku']; ?> </span>
                                <span style="display: block; ">cantidad: <?php echo $value['cantidad']; ?></span>
                                <span style="display: block; ">precio : S/. <?php echo $value['precio_online']; ?></span>

                            </td>
                        </tr>
                    </table>
                <?php } ?>
            </td>
        </tr>

        <!-- montos  -->
        <tr>
            <td style="text-align:center;color:#333333;font-weight:bold;padding:16px">
                <table align="right">
                    <tr>
                        <td align="right" style="padding-right:20px">Subtotal:</td>
                        <td align="left"><?php echo $orders['subtotal']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Envío:</td>
                        <td align="left"><?php echo $orders['envio']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Descuento:</td>
                        <td align="left"><?php echo $orders['descuento']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Total:</td>
                        <td align="left">S/. <?php echo $orders['total']; ?></td>
                    </tr>
                </table>
                <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
            </td>
        </tr>
        <tr>
            <td>
                <table align="center " border="0 " cellpadding="0 " cellspacing="0 ">
                    <tr>
                        <td>
                            <table cellpadding="0 " cellspacing="0 " width="100% ">
                                <tr>
                                    <td style="text-align:center;color :#C51152;font-weight: bold; padding: 1rem; ">Información de entrega:</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 16px ">
                                        <b>Método de envío: </b>
                                        <span> <?php echo $orders['recojo']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Dirección: </b>
                                        <span> <?php echo $orders['direccion']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Comprador: </b>
                                        <span> <?php echo $orders['comprador']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Correo: </b>
                                        <span> <?php echo $orders['correo']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Teléfono: </b>
                                        <span> <?php echo $orders['telefono']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b><?php echo $orders['tipo_doc']; ?> </b>
                                        <span> <?php echo $orders['number_doc']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px;">
                                        <b>Fecha de compra: </b>
                                        <span> <?php echo $orders['pedido_fecha']; ?> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 16px;">
                                        <b>Tipo de Pago: </b>
                                        <span><?php echo preg_match("/^P/", $orders['cod_pedido']) ? 'Pago Efectivo ': 'Pago con Tarjeta'; ?></span>
                                    </td>
                                </tr>
                                <?php if ($orders['recojo'] == 'Recojo en tienda') {?>
                                <tr>
                                    <td style="padding:5px 16px; ">
                                        <b>Podrá recoger su pedido según lo indicado: </b><br><br>
                                        <span>De comprarlo antes de las 3 PM, puede pasar a recoger su pedido el día siguiente de la compra.</span><br>
                                        <span>De comprar su pedido luego de las 3 PM, podrá pasar por su pedido dos días después de realizada la compra.</span>
                                    </td>
                                </tr>       
                                <?php }?>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td bgcolor="#FBF8EF " align="left " style="padding-top :20px;padding-bottom:20px;padding-left: 20px;padding-right:20px ; font-size: 10px;font-family:Arial, Helvetica, sans-serif; margin-top:20px ">
                            <b>Nota:</b>
                            <br>Si el pedido llegase a la dirección, pero el cliente no se encuentra disponible, se procederá a devolver el producto a las oficinas de Beurer donde el cliente podrá recogerlo. En caso requiera volver a enviarlo, se cobrará
                            una logística adicional.
                            <br>
                            <br>
                            <b>Para tu seguridad y privacidad:</b>
                            <br> Esta dirección de correo fue utilizada para realizar una compra en Beurer. Para dar de baja, cambiar tu dirección de correo o reportar el uso no autorizado de la misma, por favor contáctanos, en caso contrario entenderemos
                            que estás de acuerdo en que nos comuniquemos contigo en esta dirección de correo para cualquier asunto relacionado con tu compra en Beurer. Recuerda que en Beurer nunca te solicitaremos por ningún medio número de tarjeta o
                            claves personales. Por favor, no compartas esta información.
                            <br>
                            <br>
                            <b>Este mensaje podría contener información confidencial, si tú no eres el destinatario por favor reporta esta situación a los datos de contacto aquí descritos y bórralo sin retener copia alguna.
                            </b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <?php include 'tpl/footermail.php'; ?>

    </table>

</body>

</html>