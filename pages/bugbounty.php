<?php
    if(!$config['site']['bounty_system']) return;
?>

<!DOCTYPE html>
<html>
<head>
    <center>
        <h2>Bug Bounty System</h2>
        You have <b>X</b> points left.
    </center>
</head>
<body>

<?php
$headerColor = $config['site']['darkborder'];

echo "<table  BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100%>
	  	<tbody>
        	<tr bgcolor='$headerColor'>
				<th WIDTH=15%><center>Image</center></th>
				<th WIDTH=25%>Name</th>
				<th WIDTH=40%>Description</th>
				<th WIDTH=10%><center>Points</center></th>
				<th WIDTH=5%><center>Selected</center></th>
			</tr>";

$records = $SQL->query('SELECT * FROM ' . $SQL->tableName('bounty'))->fetchAll();

foreach ($records as $i => $record) {

    $rowColor = (($i % 2 == 1) ? $config['site']['darkborder'] : $config['site']['lightborder']);

    echo "    
		 <tr bgcolor='$rowColor'>
	     	<td><center> <img id='image' src=$layout_name$record[4]> </center></td>
			<td>$record[1]</td>
			<td>$record[2]</td>
			<td><center>$record[3]</center></td>
			<td><center><input type='checkbox'/> </center></td>
		 </tr>";
}

echo "</tbody>
	</table>";

echo "<center>
    <h3>Selected points: Y</h3> 
    <input type=image name=submit alt=Submit src=$layout_name/images/buttons/sbutton_submit.gif border=0
           width=120 height=18>
</center>";

?>
</body>
</html>
