<?php
if (!$config['site']['shop_system']) return;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <center>
        <h2>Doação PicPay</h2>


    </center>
</head>
<body>

    <center>
        <img src="https://midgard-files.s3-sa-east-1.amazonaws.com/PicPay.jpeg" width="250" height="300">
    </center>

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
    <br>";

?>
        <center>
                    <label> 1. Baixe o Aplicativo; </label><br>
                    <label> 2. Crie uma conta;</label><br>
                    <label>3. Cadastre um Cartão de Crédito;<label><br>
                    <label>4. Scaneie o QR Code ou insira o nome que consta na foto;</label><br>
                    <label>5. Realize o Pagamento com o valor selecionado;</label><br>
                    <label>6. Envie o <b>Comprovante</b> com o seu <b>Account Number</b> para gabriel@midgard.com.br;</label><br>
                    <label>7. Aguarde até 24 Horas para a confirmação.</label><br><br>
        </center>
</body>
</html>