<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo  $subject; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        body {
            font-family: "Arial", sans-serif;
        }
        a, a:link, a:visited, a:active, a:hover {
            color: #34668e;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
    <tr>
        <td align="center" style="padding: 40px 0 30px 0;">
            <img src="<?php echo  base_url('assets/img/logo-invert.png', get_protocol()); ?>" alt="WangNaFei.com" width="291" height="100" style="display: block;" />
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="260" valign="top">
                        <?php $this->load->view($body) ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#F67F17" style="padding: 30px 30px 30px 30px;color: #fff;font-size: 12px;">
            &copy; <?php echo  date('Y'); ?> WangNaFei.com. All Rights Reserved.
        </td>
        <td align="right">
        </td>
    </tr>
</table>
</body>
</html>