<?php
if (!$config['site']['shop_system']) return;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <center>
        <h2>Donate</h2>
    </center>
</head>
<body>
<br>

<?php
$headerColor = $config['site']['darkborder'];

// Donation Values
echo "<table  BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100%>
	  	<tbody>
        	<tr bgcolor='$headerColor'>
				<th WIDTH=15%><center>Donation Price</center></th>
				<th WIDTH=25%><center>AmountPoints</center></th>
			</tr>";

$records = $SQL->query('SELECT * FROM ' . $SQL->tableName('donation_values'))->fetchAll();

foreach ($records as $i => $record) {

    $rowColor = (($i % 2 == 1) ? $config['site']['darkborder'] : $config['site']['lightborder']);

    echo "    
		 <tr bgcolor='$rowColor'>
	     	<td><center>$record[1] </center></td>
			<td><center>$record[2]</center></td>
		 </tr>";
}

echo "</tbody>
	</table>
	<br>
	<br>";

// Donation Type
echo "<table  BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100%>
	  	<tbody>
        	<tr bgcolor='$headerColor'>
				<th WIDTH=40%><center>Name</center></th>
				<th WIDTH=45%><center>Description</center></th>
				<th WIDTH=15%><center>Option</center></th>
			</tr>";

$records = $SQL->query('SELECT * FROM ' . $SQL->tableName('donation_types'))->fetchAll();

foreach ($records as $i => $record) {

    $rowColor = (($i % 2 == 1) ? $config['site']['darkborder'] : $config['site']['lightborder']);

    echo "    
		 <tr bgcolor='$rowColor'>
			<td><center>$record[1]</center></td>
			<td><center>$record[2]</center></td>
			<td><center><input type='submit' id='submit$i' name='submit-payment$i' onClick=window.location=$record[4] /> </center></td>
		 </tr>";
}

echo "</tbody>
	</table>";
?>


</body>
</html>
