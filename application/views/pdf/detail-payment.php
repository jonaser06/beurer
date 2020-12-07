<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equip="X-UA-Compatible" content="ie-dge">

</head>

<body style=" font-size:1rem;margin: 0 auto ; padding:0;color:#333333; padding: 0rem;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;border-right: 1px solid #333333;">
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
        <!-- code bar  -->

        <!-- HEADER  -->
        <tr>
            <td align="center" style="padding-top :20px;padding-bottom:20px;margin-bottom:10px">
                <img src="<?php echo base_url('assets/images/logos/logo-beurer.png'); ?>" alt="logo-beurer" style="width:180px ; height:auto;display: block;">
            </td>
        </tr>
        

        <!-- aquí va el codigo de pedido -->
        <tr>
            <td style="text-align:center;color:#333333;font-weight:bold;padding:16px">
                <b style="font-size: 1.1REM;">Código de pedido</b>
                <b style="font-size: 1.1REM;"><?php echo $pedido['codigo']; ?></b>
                <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
            </td>
        </tr>
        
         <tr style="margin-bottom:2rem">
            <td>
                <tr>
                    <td align="left" style="padding:1rem;color:#C51152;font-weight:bold;text-align:left; font-size:1.2rem">
                        Detalle de tu pedido:
                    </td>
                </tr>
            </td>
        </tr>
        <tr>
            <td>
            <table width=100% >
                <thead >
                    <tr>
                        <th style="width:15% ">IMAGEN</th>
                        <th style="width:30% ">PRODUCTO</th>
                        <th style="width:15% ">CÓDIGO-SKU</th>
                        <th style="width:15% ">CANTIDAD</th>
                        <th style="width:15% ">C/U</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detalle as $key => $value) { ?>
                         <tr >
                             <td >
                                 <img width="130px " src="<?php echo base_url($value['imagen']); ?>">
                             </td>
                             <td style="text-align:left;display: block;width:25% "><?php echo $value['nombre']; ?></td>
                             <td style="text-align:center;display: block;width:15%  ">rerere </td>
                             <td style="text-align:center;display: block;width:15%  "> <?php echo $value['cantidad']; ?></td>
                             <td style="text-align:center;display: block;width:15%  "> S/. <?php echo $value['precio_online']; ?></td>   
                         </tr>
                     <?php } ?>
                </tbody>
                        
            </table>
         </td>
        </tr>
        <!-- montos  -->
        <tr>
            <td style="text-align:left;color:#333333;font-weight:bold;padding:16px">
                <table align="right">
                    <tr>
                        <td align="right" style="padding-right:20px">Subtotal:</td>
                        <td align="left">S/.<?php echo $pedido['productos_precio']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Envío:</td>
                        <td align="left">S/.<?php echo $pedido['entrega_precio']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Descuento:</td>
                        <td align="left">S/.<?php echo $pedido['cupon_descuento']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-right:20px">Total:</td>
                        <td align="left">S/. <?php echo $pedido['total']; ?></td>
                    </tr>
                </table>
                <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
            </td>
        </tr>
        <tr>
            <td>
            <?php $mensaje = (int)$pedido['recojo'] ? 'Dirección de Entrega':'Entrega en Tienda' ?>
             <span style="padding-right:13px;font-weight: bold;display:block"><?php echo $mensaje ?></span>
             
             <span ><?php echo (int)$pedido['recojo'] ? $pedido['dir_envio'].' - ' .$pedido['distrito']:'Av. Caminos del Inca Nº 257 Tienda Nº 149 Santiago de Surco - Lima' ?></span>

            </td>
        </tr>
        <tr>
            <td style="text-align:left;color:#333333;font-weight:bold;padding:16px">
                <table style="float:left">
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">Comprador:</td>
                        <td align="left"><?php echo $pedido['nombres'].$pedido['apellidos']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">correo:</td>
                        <td align="left"><?php echo $pedido['correo'];?></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">Teléfono:</td>
                        <td align="left"><?php echo $pedido['telefono']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px"><?php echo $pedido['tipo_documento'] ?></td>
                        <td align="left"><?php echo $pedido['numero_documento']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php if($pedido['dest_nombres']){ ?>
        <tr>
            <td style="text-align:left;color:#333333;font-weight:bold;padding:16px">
                <table style="float:left">
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">Destinatario:</td>
                        <td align="left"><?php echo $pedido['dest_nombres'].$pedido['dest_apellidos']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">DNI:</td>
                        <td align="left"><?php echo $pedido['correo'];?></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">Teléfono:</td>
                        <td align="left"><?php echo $pedido['dest:telefono']; ?></td>
                    </tr>
                  
                </table>
            </td>
        </tr>
        <?php } ?>
        <?php if($pedido['ruc']){ ?>
        <tr>
            <td style="text-align:left;color:#333333;font-weight:bold;padding:16px">
                <table style="float:left">
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">RUC:</td>
                        <td align="left"><?php echo $pedido['ruc']; ?></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">Razon Social:</td>
                        <td align="left"><?php echo $pedido['r_social'];?></td>
                    </tr>
                    <tr>
                        <td align="right" style="font-weight:bold;padding-right:20px">Domicilio Fiscal:</td>
                        <td align="left"><?php echo $pedido['r_fiscal']; ?></td>
                    </tr>
                  
                </table>
            </td>
        </tr>
        <?php } ?>
        <hr style="height:.1px; background-color: #333333;" width="100%" align="center">

        <tr>
            <td>
                <table>
                <tr>
                    <td align="left" style="font-weight:bold;text-align:left; font-size:1.1rem">
                        Fecha de Compra:
                    </td>
                    <td align="left" style="padding-left:1rem;text-align:left; font-size:1.1rem">
                        <?php echo $pedido['pedido_fecha'] ?>
                    </td>
                </tr>
                </table>
            </td>

        </tr>
        <hr style="height:.1px; background-color: #333333;" width="100%" align="center">
        <tr>
            <td>
                <table>
                    <?php 
                    $value_estate = (int)$pedido['pedido_estado'] ;
                    $estado = $value_estate == 1 ? 'Pedido Ordenado': ($value_estate == 2 ? 'preparando Pedido': ($value_estate == 3 ? 'Listo en Despacho':' Pedido Entregado'))
                    ?>
                <tr>
                    <td align="left" style="font-weight:bold;text-align:left; font-size:1.1rem">
                        Estado de Pedido:
                    </td>
                    <td align="left" style="padding-left:1rem;text-align:left; font-size:1.1rem">
                        <?php echo $estado ?>
                    </td>
                </tr>
                </table>
            </td>

        </tr>
       
    </table>
    
</body>

</html>