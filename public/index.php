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
    <title>Calculator</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div>
        <h1><?= $error ?></h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label class="form-label" for="value1">Value1:</label>
            <input class="form-input" type="number" step="any" name="value1" id="value1" value="<?= $num1 ?>">

            <label class="form-label" for="operation">operation:</label>
            <select name="operation" id="operation">
                <option>add</option>
                <option>subtract</option>
                <option>multiply</option>
                <option>divide</option>
            </select>

            <label class="form-label" for="value2">Value2:</label>
            <input class="form-input" type="number" step="any" name="value2" id="value2" value="<?= $num2 ?>">
            <hr />
            <div class="form-result">
                <label for="result">Result</label>
                <input type="number" id="result" value="<?= $result ?>" disabled>
            </div>
            <hr />
            <input type="submit" value="calculate">
        </form>

    </div>

    <script src="js/script.js"></script>
</body>

</html>