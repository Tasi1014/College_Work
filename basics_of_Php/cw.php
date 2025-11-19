<?php
$nameErr = $emailErr = $ageErr = $countryErr = $mssg = "";
$name = $email = $age = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $isValid = true;
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $nameErr = "Name is required";
        $isValid = false;
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $emailErr = "Email is required";
        $isValid = false;
    }

    if (isset($_POST['age']) && !empty($_POST['age'])) {
        $age = $_POST['age'];
    } else {
        $ageErr = "Age is required";
        $isValid = false;
    }

    if (isset($_POST['country']) && !empty($_POST['country'])) {
        $country = $_POST['country'];
    } else {
        $countryErr = "Please select a country";
        $isValid = false;
    }

    // Displaying the  form data if all fields are valid
    if ($isValid) {
        echo "<h3>Form Details:</h3>";
        echo "Name: $name <br>";
        echo "Email: $email <br>";
        echo "Age: $age <br>";
        echo "Country: $country <br>";
    }else{
        $mssg = "Form Submission Failed. Try Again!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Validation</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<form method="POST" action="">
    <label for="name">Name: </label>
    <input type="text" name="name" id="name">
    <p class="error"><?php echo $nameErr; ?></p>

    <label for="email">Email: </label>
    <input type="email" name="email" id="email">
    <p class="error"><?php echo $emailErr; ?></p>

    <label for="age">Age: </label>
    <input type="number" name="age" id="age">
    <p class="error"><?php echo $ageErr; ?></p>

    <label for="country">Country: </label>
    <select name="country" id="country">
        <option value="">Select a country</option>
        <option value="Nepal">Nepal</option>
        <option value="India">India</option>
        <option value="China">China</option>
    </select>
    <p class="error"><?php echo $countryErr; ?></p>
    <button type="submit">Submit</button>
    <p> <?php echo $mssg; ?></p>
</form>

</body>
</html>
