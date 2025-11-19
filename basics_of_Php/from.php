<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="" method="POST">
        <label for="num">Multiplicand: </label>
        <input type="number" name="num1" id="num1"><br><br>
        <label for="num2">Multiplier: </label>
        <input type="number" name="num2" id="num2"><br><br>
        <button>calculate</button>
    </form>
</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['num1']) && !empty($_POST['num2'] && isset($_POST['num2']) && !empty($_POST['num2']))) {
        $multiplicand = $_POST['num1'];
        $multiplier = $_POST['num2'];
         $result = $multiplicand * $multiplier;
    echo " The multiplication of $multiplicand and $multiplier is $result";
    } else {
        echo "Please provide a input";
    }
}
?>