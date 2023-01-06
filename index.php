<?php

require_once './vendor/autoload.php';

use Manta\OopExam\Framework\Router;
use Manta\OopExam\Container\DIContainer;

// Load custom DI container
$container = new DIContainer();
$container->loadDependencies();

$requestUri = str_replace( '/OopExam' ,  '', $_SERVER['REQUEST_URI']);
$router = $container->get(Router::class);
$router->process($requestUri);

//require("json.php")

$data = json_decode(file_get_contents('./src/Files/input.json'), true);
if (is_null($data)) {
    $data = [];
}

$reaDdate = date('Y/m/d');
$date = date('Y/m', strtotime($reaDdate. ' -1 months'))

?>

<!DOCTYPE html>
<html>
<head></head>

<body>

<h2>Elektros suvartojimo deklaravimas</h2>
<h3>Iveskite duomenis:</h3>
<form method="post" action="submit.php">
    Menesis: <input type="text" name="menesis" value="<?php echo $date ?>"><br><br>
    Sunaudotų kWh kiekis: <input type="text" name="qty" placeholder="kWh"><br><br>
    Vienos kWh kaina: <input type="text" name="price" placeholder="kwh kaina"><br><br>

    <label for="tarifas">Tarifas:</label>
    <select name="tarifas" id="tarifas">
        <option value="0">--- Pasirinkite tarifa ---</option>
        <option value="1">Dieninis</option>
        <option value="2">Naktinis</option>
    </select><br><br>

    <input type="submit" name="submit" value="Skaičiuoti kainą">
</form>
</body>

</html>



