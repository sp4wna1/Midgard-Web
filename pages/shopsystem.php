<?php
if (!$config['site']['shop_system']) {
    return;
} else {

    $records = $SQL->query('SELECT * FROM ' . $SQL->tableName('donation_items'))->fetchAll();

    if ($logged) {
        $account_logged = Visitor::getAccount();
        $points = $account_logged->getPoints();
        $account_players = $account_logged->getPlayers();
    } else {
        $points = 0;
    }

    $pid = 10;

    if (isset($_POST['submit0'])) {
        $playerId = $account_players->getResult($_POST['select'])->getId();
        Premium_Account::tryToPurchase($records[0], $playerId, $points, $account_logged, $SQL, $pid);
        $points = $account_logged->getPoints();
    } else if (isset($_POST['submit1'])) {
        $playerId = $account_players->getResult($_POST['select'])->getId();
        Premium_Account::tryToPurchase($records[1], $playerId, $points, $account_logged, $SQL, $pid);
        $points = $account_logged->getPoints();
    } else if (isset($_POST['submit2'])) {
        $playerId = $account_players->getResult($_POST['select'])->getId();
        Premium_Account::tryToPurchase($records[2], $playerId, $points, $account_logged, $SQL, $pid);
        $points = $account_logged->getPoints();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <center>
        <h2>Shop</h2>
        <?php
        echo "<form method='post'>";

        if ($logged) {
            echo "<h4> You have <b>$points</b> points left. </h4>";

            echo "<div>
                  <label>Player:</label>
                  <select name='select'>";


            for ($i = 0; $i < $account_players->count(); $i++) {
                echo "<option value = $i>" . $account_players->getResult($i)->getName() . "</option>";
            }

            echo "</select>
                  </div>";

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
				<th WIDTH=15%><center>Points</center></th>";
if ($logged) {
    echo "<th WIDTH=5%><center>Selected</center></th>";
}
echo "</tr>";

foreach ($records as $i => $record) {

    $rowColor = (($i % 2 == 1) ? $config['site']['darkborder'] : $config['site']['lightborder']);

    echo "    
		 <tr bgcolor='$rowColor'>
		 	<td><center><img src=$record[3]></center></td>
			<td>$record[1]</td>
			<td>$record[2]</td>
			<td><center>$record[4]</center></td>";

    if ($logged) {
        echo "<td><center><input type='submit' id='submit$i' name='submit$i' /> </center></td>";
    }

    echo "</tr>";
}

echo "</tbody>
	</table><br>
	</form>";
?>


</body>
</html>
