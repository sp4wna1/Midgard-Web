<?php
require 'vendor/autoload.php';

if (!$config['site']['send_emails']) {
    $main_content .= '<b>Account maker is not configured to send e-mails, you can\'t use Lost Password Interface. Contact with admin to get help.</b>';
}

function sendEmail()
{
    $sendgrid = new SendGrid("SENDGRID_APIKEY");
    $email    = new SendGrid\Email();

    $email->addTo("test@sendgrid.com")
        ->setFrom("you@youremail.com")
        ->setSubject("Sending with SendGrid is Fun")
        ->setHtml("and easy to do anywhere, even with PHP");

    $sendgrid->send($email);

    $email = new SendGrid\Mail\Mail();
    $email->setFrom($config['site']['mail_address'], "Midgard - Recovery Account");
    $email->addTo(document . getElementById("email") . value);
    $email->setSubject("Forgot Account - New Password");
    $email->addContent(
        "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    );

    $sendgrid = new \SendGrid();
    try {

        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: ' . $e->getMessage() . "\n";
    }
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

    <form>
        <table width="50%" border=0 cellspacing=1 cellpadding=4>
            <tbody>
            <tr>
                <td bgcolor="#505050" class="white"><b>Recovery Account</b></td>
            </tr>
            <td bgcolor="#D4C0A1">
                <table border="0" cellspacing="8" cellpadding="0">
                    <tr>
                        <td width="150"><b>E-mail Address:</b></td>
                        <td width="150" colspan="2"><input type="text" id="email" size=30 maxlength=50></td>
                    </tr>
                    <tr>
                        <td width="150"><b>Account Number:</b></td>
                        <td width="150" colspan="2"><input type="text" id="number" size=30 maxlength=11></td>
                    </tr>
                </table>
            </td>
            </tbody>
        </table>

        <br>

        <input type=image id=submit name=submit alt=submit src=<?php echo "$layout_name/images/buttons/sbutton_submit.gif" ?> border=0
                     width=120 height=18 onclick="sendEmail()">
    </form>

</div>
</body>
</html>