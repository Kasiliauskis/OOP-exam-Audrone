<?php
//require("json.php")

$data = json_decode(file_get_contents('./src/Files/input.json'), true);
if (is_null($data)) {
    $data = [];
}


?>

<!DOCTYPE html>
<html>
<head></head>

<body>

<h2>Elektros suvartojimo deklaravimas</h2>
<h3>Iveskite duomenis:</h3>
<form method="post" action="submit.php">
    Sunaudotų kWh kiekis: <input type="text" name="qty" placeholder="kWh"><br><br>
    Vienos kWh kaina: <input type="text" name="price" placeholder="kwh kaina"><br><br>

    <label for="tarifas">Tarifas:</label>
            <select name="tarifas" id="tarifas">
                <option value="0">--- Pasirinkite tarifa ---</option>
                <option value="1">Dieninis</option>
                <option value="2">Naktinis</option>
            </select><br><br>

    <label for="menesis">Menesis:</label>
            <select name="menesis" id="menesis">
                <option value="0">--- Pasirinkite menesi ---</option>
                <option value="1">Sausis</option>
                <option value="2">Vasaris</option>
                <option value="3">Kovas</option>
                <option value="4">Balandis</option>
                <option value="5">Geguze</option>
                <option value="6">Birzelis</option>
                <option value="7">Liepa</option>
                <option value="8">Rugpjutis</option>
                <option value="9">Rugsejis</option>
                <option value="10">Spalis</option>
                <option value="11">Lapkritis</option>
                <option value="12">Gruodis</option>
            </select><br><br>

    <input type="submit" value="Skaičiuoti kainą">
</form>
</body>

</html>



