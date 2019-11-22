<?php
if (!$config['site']['bounty_system']) return;
?>

<script type="text/javascript" src="<?PHP echo $layout_name; ?>/bugbounty/bugbounty.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="<?PHP echo $layout_name; ?>/bugbounty/bugbounty.css" rel="stylesheet" type="text/css">

<!DOCTYPE html>
<html lang="pt">
<head>
    <center>
        <h2>Bug Bounty System</h2>
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
			<td><center><input type='checkbox' id='checkbox-bounty$i' name='checkbox-bounty$i' onclick='onCheck($record[3], $i)' /> </center></td>
		 </tr>";
}

echo "</tbody>
	</table>";

echo "<center>
    <div>
        <h3>Selected points:</h3>   <input type='text' id='selected-counter' name='selected-counter' value='0' disabled/>
    </div>";

if ($logged) {
    echo "<input type=image id=submit name=submit alt=Submit src=$layout_name/images/buttons/sbutton_submit.gif border=0
           width=120 height=18>";
}

echo "</center>";
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
