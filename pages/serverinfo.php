<?php

$main_content .= '<table style="width:90%;margin-left:auto;margin-right:auto"><tr bgcolor="' . $config['site']['vdarkborder'] . '"><td colspan="2" style="color:white;font-weight:bold">Server Informations</td></tr>';
$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
$main_content .= '<tr bgcolor="' . $bgcolor . '"><td style="font-weight:bold;width:150px">PVP protection</td><td>to ' . SERVER_PROTECTION . ' level</td></tr>';
$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
$main_content .= '<tr bgcolor="' . $bgcolor . '"><td style="font-weight:bold;">Exp rate</td><td>';
$stages = new DOMDocument();
if($stages->load($config['site']['serverPath'] . 'XML/stages.xml') && $stages->getElementsByTagName('config')->item(0)->getAttribute('enabled'))
{
	foreach($stages->getElementsByTagName('stage') as $stage)
	{
		$main_content .= $stage->getAttribute('minlevel');
		if($stage->hasAttribute('maxlevel'))
		{
			$main_content .= ' - ' . $stage->getAttribute('maxlevel') . ' level';
		}
		else
		{
			$main_content .= '+ level';
		}
		$main_content .= ', ' . $stage->getAttribute('multiplier') . 'x<br />';
	}
}
else
{
	$main_content .= SERVER_RATE_EXP . 'x';
}
$main_content .= '</td></tr>';
$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
$main_content .= '<tr bgcolor="' . $bgcolor . '"><td style="font-weight:bold;">Skill rate</td><td>' . SERVER_RATE_SKILL . 'x</td></tr>';
$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
$main_content .= '<tr bgcolor="' . $bgcolor . '"><td style="font-weight:bold;">Magic rate</td><td>' . SERVER_RATE_MAGIC . 'x</td></tr>';
$bgcolor = (($number_of_rows++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
$main_content .= '<tr bgcolor="' . $bgcolor . '"><td style="font-weight:bold;">Loot rate</td><td>' . SERVER_RATE_LOOT . 'x</td></tr></table>';