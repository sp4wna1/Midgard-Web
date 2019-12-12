<?php
if (!$config['site']['shop_system']) return;
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="<?PHP echo $layout_name; ?>/bugbounty/bugbounty.css" rel="stylesheet" type="text/css">

<!DOCTYPE html>
<html lang="pt">
<head>
    <center>
        <h2>Shop</h2>
        <?php
        if ($logged) {
            $account_logged = Visitor::getAccount();
            $points = $account_logged->getPoints();
            echo "<h4> You have <b>$points</b> points left. </h4>";
        } else {
            echo "You have to be <b><a href='?subtopic=accountmanagement'>logged</a></b> to use this system.";
        }
        ?>
    </center>
</head>
<body>
<br>

<?php
$headerColor = $config['site']['darkborder'];

echo "<table  BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100%>
	  	<tbody>
        	<tr bgcolor='$headerColor'>
				<th WIDTH=15%>Image</th>
				<th WIDTH=35%>Name</th>
				<th WIDTH=30%>Description</th>
				<th WIDTH=15%><center>Points</center></th>
				<th WIDTH=5%><center>Selected</center></th>
			</tr>";

$records = $SQL->query('SELECT * FROM ' . $SQL->tableName('donation_items'))->fetchAll();

foreach ($records as $i => $record) {

    $rowColor = (($i % 2 == 1) ? $config['site']['darkborder'] : $config['site']['lightborder']);

    echo "    
		 <tr bgcolor='$rowColor'>
		 	<td><center><img src=$record[3]></center></td>
			<td>$record[1]</td>
			<td>$record[2]</td>
			<td><center>$record[4]</center></td>
			<td><center><input type='submit' id='submit$i' name='submit$i' /> </center></td>
		 </tr>";
}

echo "</tbody>
	</table><br>";

echo "<script>

        $(submit).on( 'click', function( event ) {
            let counter = $('#selected-counter').val();
            
            if (counter == 0) {
                alert('You have to select an item.');
            } else if (counter > $points) {
                alert('You don`t have enough points.');    
            } else {
                alert('Nice');
              
            }
        });
        
    </script>";
?>


</body>
</html>
