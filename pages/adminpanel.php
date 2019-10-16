<?php
if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
{
	$main_content .= 'Nothing to see here dude';
}
else
{
	$main_content .= 'You don\'t have admin access.';
}