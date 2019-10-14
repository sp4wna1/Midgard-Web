<?php
echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>';
$account = strtoupper(trim($_REQUEST['account']));
if(empty($account))
{
    echo '<font color="red">Please enter an account number.</font>';
    exit;
}
if($account < 99999999999)
{
    if(!check_account_number($account))
    {
        echo '<font color="red">Invalid account number format. Use numbers 0-9.</font>';
        exit;
    }
    $account_db = new Account();
    $account_db->find($account);
    if($account_db->isLoaded())
        echo '<font color="red">Account with this number already exist.</font>';
    else
        echo '<font color="green">Good account number ( '.htmlspecialchars($account).' ). You can create account.</font>';
}
else
    echo '<font color="red">Account number is too long (max. 11 number).</font>';
exit;