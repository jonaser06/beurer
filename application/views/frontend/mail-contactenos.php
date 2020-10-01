<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>BEURER</title>
    </head>
    <body style="margin:0;padding:0;">
        <table width="700" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;margin:0;padding:0;width:700px;">
            <tr style="padding:0;">
                <td style="background:#fff;;padding:30px 30px 0 30px;">
                    <img src="<?= $this->config->base_url('assets/images/header-mailing.jpg') ?>" alt="logo"   style="float:left;margin:0 0 20px 0;display:block; width:100%;">
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;margin:0;padding:0;width:700px;">
                        <tr>
                            <td width="345" style="text-align:right;"><span style="width:100%; font-family:arial;font-size:17px;color:#000000; text-align:right;font-weight: bold">Nombres :</span></td>
                            <td width="16"></td>
                            <td width="339"><span style="font-family:arial;font-size:17px;color:#000000; text-align:left;"><?= $name ?></span></td>
                        </tr>
                        <tr><td height="4"></td></tr>

                        <tr>
                            <td width="345" style="text-align:right;"><span style="width:100%; font-family:arial;font-size:17px;color:#000000; text-align:right;font-weight: bold">Apellidos :</span></td>
                            <td width="16"></td>
                            <td width="339"><span style="font-family:arial;font-size:17px;color:#000000; text-align:left;"><?= $lastname ?></span></td>
                        </tr>
                        <tr><td height="4"></td></tr>

                        <tr>
                            <td width="345" style="text-align:right;"><span style="width:100%; font-family:arial;font-size:17px;color:#000000; text-align:right;font-weight: bold">Dirección :</span></td>
                            <td width="16"></td>
                            <td width="339"><span style="font-family:arial;font-size:17px;color:#000000; text-align:left;"><?= $direction ?></span></td>
                        </tr>
                        <tr><td height="4"></td></tr>
                        <tr>
                            <td width="345" style="text-align:right;"><span style="width:100%; font-family:arial;font-size:17px;color:#000000; text-align:right;font-weight: bold">Teléfono :</span></td>
                            <td width="16"></td>
                            <td width="339"><span style="font-family:arial;font-size:17px;color:#000000; text-align:left;"><?= $phone ?></span></td>
                        </tr>
                        <tr><td height="4"></td></tr>

                        <tr>
                            <td width="345" style="text-align:right;"><span style="width:100%; font-family:arial;font-size:17px;color:#000000; text-align:right;font-weight: bold">Correo :</span></td>
                            <td width="16"></td>
                            <td width="339"><span style="font-family:arial;font-size:17px;color:#000000; text-align:left;"><?= $email ?></span></td>
                        </tr>
                        <tr><td height="4"></td></tr>

                        <tr>
                            <td width="345" valing="top" style="text-align:right;"><span style="width:100%; font-family:arial;font-size:17px;color:#000000; text-align:right;font-weight: bold">Mensaje :</span></td>
                            <td width="16"></td>
                            <td width="339"><span style="font-family:arial;font-size:17px;color:#000000; text-align:left;"><?= $textarea ?></span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!--tr style="padding:0;">
                <td style="background:#fff;;padding:30px 30px 0 30px;">
                    <hr style="background:#dcdcdc;border:none;float:left;height:1px;margin:0 0 20px 0;width:100%;">

                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        Nombre: <?= $name ?>
                    </p>
                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        Apellidos: <?= $lastname; ?>
                    </p>
                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        Dirección: <?= $direction ?>
                    </p>
                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        Correo: <?= $pais ?>
                    </p>
                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        COdigo Postal: <?= $codpost ?>
                    </p>
                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        Teléfono: <?= $phone ?>
                    </p>
                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        Correo: <?= $email ?>
                    </p>
                    <p style="color:#505050;float:left;font-family:arial;font-size:16px;margin:0 0 20px 0;text-align:left;width:100%;">
                        Mensaje: <?= $textarea ?>
                    </p>
                    <hr style="background:#dcdcdc;border:none;float:left;height:1px;margin:0 0 20px 0;width:100%;">
                </td>
            </tr-->
            <tr style="padding:0;">
                <td style="background:#fff;;padding:30px 30px 0 30px;">
                    <img src="<?= $this->config->base_url('assets/images/pie-mailing.jpg') ?>" alt="logo"   style="float:left;margin:0 0 20px 0;display:block; width:100%;">
                </td>
            </tr>
            
        </table>
    </body>
</html>
