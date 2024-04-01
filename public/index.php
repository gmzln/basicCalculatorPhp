<?php

use Azubi\Math\Math;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


$num1 = '';
$num2 = '';
$operation = '';
$result = '';
$error = '';

if (isset($_GET['operation'])) {
    $num1 = $_GET['value1'];
    $num2 = $_GET['value2'];
    $operation = $_GET['operation'];

    $math = new Math();

    if ($operation === 'divide' && ($num1 == 0 || $num2 == 0)) {
        $error = 'Durch 0 kann nicht geteilt werden';
    } else if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operation) {
            case 'add':
                $result = $math->add($num1, $num2);
                break;
            case 'subtract':
                $result = $math->subtract($num1, $num2);
                break;
            case 'multiply':
                $result = $math->multiply($num1, $num2);
                break;
            case 'divide':
                $result = $math->divide($num1, $num2);
                break;
        }
    } else {
        $error = 'Zahl eingeben';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="./style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="calculator">
        <h1><?= $error ?></h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label class="form-label" for="value1">value:</label>
            <input class="form-input" type="number" step="any" name="value1" id="value1" value="<?= $num1 ?>">

            <label class="form-label" for="operation"></label>
            <select name="operation" id="operation">
                <option <?= ($operation === '' || $operation === 'add') ? 'selected' : '' ?>>add</option>
                <option <?= ($operation === 'subtract') ? 'selected' : '' ?>>subtract</option>
                <option <?= ($operation === 'multiply') ? 'selected' : '' ?>>multiply</option>
                <option <?= ($operation === 'divide') ? 'selected' : '' ?>>divide</option>
            </select>

            <label class="form-label" for="value2">value:</label>
            <input class="form-input" type="number" step="any" name="value2" id="value2" value="<?= $num2 ?>">

            <div class="form-result">
                <label id="operation-result" for="result">=</label>
                <input type="number" id="result" value="<?= $result ?>" disabled>
            </div>

            <input class="submit" type="submit" value="calculate">
        </form>

    </div>

    <script src="js/script.js"></script>
</body>

</html>