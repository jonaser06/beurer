<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equip="X-UA-Compatible" content="ie-dge">
</head>

<body style="margin: 0 auto ; padding:0;color:#333333;max-width: 720px; padding: 0rem;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" >
        <!-- HEADER  -->
        <tr>
            <td align="center" style="padding-top :20px;padding-bottom:20px;margin-bottom:10px">
                <img src="<?php echo base_url('assets/images/logos/logo-beurer.png'); ?>" alt="logo-beurer" style="width:180px ; height:auto;display: block;">
            </td>
        </tr>
        <tr>
            <td>
                <table width="95%" height="210">
                    <tr>
                        <td align="center" style="padding: 14px; position: relative; background-size: 100% 100%;" background="<?php echo base_url('assets/images/group_fondo.png'); ?>">
                            <!-- <img width="95%" src="<?php echo base_url('assets/images/group_fondo.png'); ?>" alt="#" style="border-radius: 14px;"> -->
                            <span style="padding:0px 25px;font-size:40px;position: absolute;top:40px;left:50px; color: #fff;text-align: center">
                                <span >¡Bienvenid@!</span><span ><?php echo ' '.$nombre ?></span> 
                                <span style="display: block; font-size: 40px;margin-top:20px">Gracias por preferir beurer.pe</span>
                            </span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <!-- <td style="color:#646464; padding: 1rem;text-align: center;">Para confirmar tu cuenta haz click <a href="<?php echo URL_BASE.'activate?code='.$id; ?>">aqui!</a></td> -->
            <td style="color:#646464; padding: 1rem;text-align: center;">A continuación le indicamos el código de validación: </td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 30px; font-weight: bold;"><p><?php echo $codigo; ?></p></td>
        </tr>
         <tr align="center">
            <td>
                <table bgcolor="#fff" width='95%' style="padding-top: 25px;margin-bottom:50px">
                    <tr>
                        <td width="100%" style="font-weight: bold;font-size:18px;text-align: center;">Beneficios de comprar en Beurer</td>
                    </tr>
                    <tr>
                        <td width="100%">
                            <table style="margin:auto; width: 100%; ">
                                <tr>
                                    <td widht="33%" align="center" style="padding: 10px; ">
                                        <table style="margin:auto; padding: 12px 20px; background-color: #f1f1f1;border-radius:14px;text-align:center;height:140px;width:160px;">
                                            <tr>
                                                <td>
                                                    <a href="#" target="_blank ">
                                                        <img src="<?php echo base_url('assets/images/honor.png')?>" alt="phone" height="65" style="margin :10px 0 ">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:#333333;font-weight:bold;width: 100%; ">De 3 a 5 años de garantía</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td widht="33%" align="center" style="padding: 10px; ">
                                        <table style="margin:auto; padding: 12px 20px; background-color: #f1f1f1;border-radius:14px;text-align:center;height:140px;min-width:160px; ">

                                            <tr>
                                                <td>
                                                    <a href="#" target="_blank ">
                                                        <img src="<?php echo base_url('assets/images/escudo.png')?>" alt="facebook" height="65" style="margin :10px 0 ">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:#333333;font-weight:bold "><span>Compra</span><br> <span>segura</span></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td widht="33% " align="center" style="padding: 10px; ">
                                        <table style="margin:auto; padding: 12px 20px; background-color: #f1f1f1;border-radius:14px;text-align:center;height:140px;width:160px; ">
                                            <tr>
                                                <td>
                                                    <a href="#" target="_blank ">
                                                        <img src="<?php echo base_url('assets/images/phone-user.png')?>" height="65" style="margin :10px 0 ">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:#333333;font-weight:bold "><span>Atención</span><br> <span>Personalizada</span></td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

       
        <?php include 'tpl/footer.php'; ?>

    </table>

</body>

</html>