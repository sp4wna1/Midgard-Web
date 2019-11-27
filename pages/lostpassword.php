<?php
require 'vendor/autoload.php';

if (!$config['site']['recovery_account']) {
    $main_content .= 'Recovery Password in maintenance. Contact with admin to get help.';
    return;
}

$emailFrom = $config['site']['mail_address'];

function sendEmail($emailTo, $accountNumber)
{
    global $emailFrom;

    $sendgrid = new SendGrid("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");
    $email = new \SendGrid\Mail\Mail();

    $email = new SendGrid\Mail\Mail();
    $email->setFrom($emailFrom, "Midgard - Recovery Account");
    $email->addTo($emailTo);
    $email->setSubject("Forgot Account - New Password");
    $email->addContent(
        "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    );

    try {
        //$sendgrid->send($email);
    } catch (Exception $e) {
        echo 'Something is wrong. Call the admin from server.';
    }
}

if (isset($_POST['sendemail'])) {
    sendEmail($_POST['email'], $_POST['number']);
}
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <h2 align="center">Lost Password?</h2>
</head>
<body>
<div align="center">
    Insert your e-mail to recovery your Password.
    <br>
    <br>

    <form method="post">
        <table width="50%" border=0 cellspacing=1 cellpadding=4>
            <tbody>
            <tr>
                <td bgcolor="#505050" class="white"><b>Recovery Account</b></td>
            </tr>
            <td bgcolor="#D4C0A1">
                <table border="0" cellspacing="8" cellpadding="0">
                    <tr>
                        <td width="150"><b>E-mail Address:</b></td>
                        <td width="150" colspan="2"><input type="text" name="email" id="email" size=30 maxlength=50></td>
                    </tr>
                    <tr>
                        <td width="150"><b>Account Number:</b></td>
                        <td width="150" colspan="2"><input type="text" name="number" id="number" size=30 maxlength=11></td>
                    </tr>
                </table>
            </td>
            </tbody>
        </table>

        <br>

        <input type=submit name=sendemail
               src=<?php echo "$layout_name/images/buttons/sbutton_submit.gif" ?> border=0
               width=120 height=18>
    </form>

</div>
</body>
</html>