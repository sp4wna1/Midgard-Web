<?php
require 'vendor/autoload.php';

if (!$config['site']['recovery_account']) {
    $main_content .= 'Recovery Password in maintenance. Contact with admin to get help.';
    return;
}

function findAccount($email, $number)
{
    global $SQL;

    $result = $SQL->
    query(
        'SELECT ' . $SQL->fieldName('id') .
        ' FROM ' . $SQL->tableName('accounts') .
        ' WHERE ' . $SQL->fieldName('id') . ' = ' . $number .
        ' AND ' . $SQL->fieldName('email') . ' = \'' . $email . '\';'
    )->fetch();

    return $result['id'] == $number;
}

$emailFrom = $config['site']['mail_address'];
function recoveryPassword($emailTo, $accountNumber)
{
    global $SQL, $emailFrom;

    $newPassword = mt_rand(9999, 99999999);
    $encrypted = Website::encryptPassword($newPassword);

    $sendgrid = new SendGrid("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");
    $email = new SendGrid\Mail\Mail();

    $email->setFrom($emailFrom, "Midgard - Recovery Account");
    $email->addTo($emailTo);
    $email->setSubject("Forgot Account - New Password");


    $mailBody = '<html>
				<body>
				<h3>Your new account password!</h3>
				<p>Account Number:  <b>' . htmlspecialchars(trim($accountNumber)) . '</b></p>
				<p>New Password: <b>' . htmlspecialchars(trim($newPassword)) . '</b></p>
				<br />
				<p>After login you can:</p>
				<li>Change your current password
				</body>
				</html>';

    $email->addContent("text/html", $mailBody);

    try {
        $SQL->query(
            'UPDATE ' . $SQL->tableName('accounts') .
            ' SET ' . $SQL->fieldName('password') . ' = \'' . $encrypted . '\'' .
            ' WHERE ' . $SQL->fieldName('id') . ' = ' . $accountNumber);

        $sendgrid->send($email);
    } catch (Exception $e) {
        $SQL->rollBack();
        echo 'Something is wrong. Call the admin from server.';
    }
}

if (isset($_POST['sendemail'])) {
    $email = $_POST['email'];
    $number = $_POST['number'];

    if (findAccount($email, $number)) {
        recoveryPassword($email, $number);
    } else {
        echo "<script type='text/javascript'> 
                alert('Wrong e-mail or account number.'); 
             </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt">
<body>
<div>
    Insert your e-mail and account number to generate your new Password.
    <br>
    <br>

    <form method="post">
        <table width="100%" border=0 cellspacing=1 cellpadding=4>
            <tbody>
            <tr>
                <td bgcolor=" #505050" class="white"><b>Recovery Account</b></td>
            </tr>
            <td bgcolor="#D4C0A1">
                <table border="0" cellspacing="8" cellpadding="0">
                    <tr>
                        <td width="150"><b>E-mail Address:</b></td>
                        <td width="150" colspan="2"><input type="text" name="email" id="email" size=30
                                                           maxlength=50>
                        </td>
                    </tr>
                    <tr>
                        <td width="150"><b>Account Number:</b></td>
                        <td width="150" colspan="2"><input type="text" name="number" id="number" size=30
                                                           maxlength=11>
                        </td>
                    </tr>
                </table>
            </td>

            </tbody>
        </table>

        <br>

        <div align="center">
            <input type=submit name=sendemail
                   src=<?php echo "$layout_name/images/buttons/sbutton_submit.gif" ?> border=0
                   width=120 height=18>
        </div>
    </form>

</div>
</body>
</html>