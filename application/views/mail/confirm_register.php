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
                                <span >Bienvenido a beurer</span>.<span >pe</span> 
                                <span style="display: block; font-size: 25px;margin-top:20px">Tu Cuenta se ha registrado correctamente</span>
                            </span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="color:#646464; padding: 1rem;text-align: center;">Para confirmar tu cuenta haz click <a href="<?php echo URL_BASE.'activate?code='.$id; ?>">aqui!</a></td>
        </tr>

        <?php include 'tpl/footermail.php'; ?>

    </table>

</body>

</html>