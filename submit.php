<?php
$dataArray = json_decode(file_get_contents('./src/Files/input.json'), true);
if (is_null($dataArray)) {
    $dataArray = [];
}

$date = date('Y/m/d');

$dataArray[] = [
    "qty" => $_POST['qty'],
    "price" => $_POST['price'],
    "tarifas" => $_POST['tarifas'],
    "menesis" => $_POST['menesis'],
    "createdAt" => date('Y/m/d')

];
file_put_contents('./src/Files/input.json', json_encode($dataArray));

if(isset($_POST['submit'])) {
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $tarifas = $_POST['tarifas'];
    $month = $_POST['menesis'];
}

if ($tarifas == '1') {
    $totalPrice = $qty * $price;
    $text = 'dieninio tarifo ';
} else {
    $totalPrice = ($qty * $price) * 0.5;
    $text = 'naktinio tarifo ';
}

?>

<!DOCTYPE html>
<html>
<head></head>

<body>
<h4>Suvartotas kiekis:<?php echo $qty ?></h4>
<h4>Vienos kWh kaina:<?php echo $price ?></h4>
<h4>Tarifas:<?php echo $tarifas ?></h4>
<h4>Menesis:<?php echo $month ?></h4>
<h4>Total <?php echo $text ?>kaina:<?php echo $totalPrice ?></h4>

<form action="index.php">
    <input type="submit" name="select" value="Deklaruoti ir Sumokėti"/>
</form>
</body>

</html>