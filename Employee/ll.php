<?php
include 'connection.php';

$name = $password = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Username
    if (isset($_POST['name']) && trim($_POST['name'])== "") {
        $errors['name'] = "Name cannot be empty.";
    } else if (strlen($name) < 3 || strlen($name) > 15) {
        $errors['name'] = "Name must be 3–15 alphabetic characters.";
    } else {
        $name = $_POST['name'];
    }
}

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if ($email == "") {
        $errors['email'] = "Email cannot be empty.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } else {
        $email = $_POST['email'];
    }
}

if (isset($_POST['password'])) {
    $password = trim(string: $_POST['password']);
    if ($password == "") {
        $errors['password'] = "Password cannot be empty.";
    } else if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%&!]).{8,}$/', $password)) {
        $errors['password'] = "Password must be at least 8 characters include one character one uppercase and one special character.";
    } else {
        $password = $_POST['password'];
    }
}


    // Check credentials only if validation passes
    if (empty($errors)) {
        $sql = "SELECT * FROM employees WHERE username = '$name' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $errors['result'] = "Login successfull";
        } else {
            $errors['result'] = "<p style='color:red;'>Invalid credentials!</p>";
        }
    } else {
        $errors['result'] = "<p style='color:red;'>Please correct the above mistakes.</p>";
    }

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <div class="main">
        <h2>Login Form</h2>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="name" value="<?= $name ?>"><br>
            <p style="color:red;"><?= $errors['name'] ?? '' ?></p>

            <label>Password:</label>
            <input type="password" name="password" value="<?=$password ?>"><br>
            <p style="color:red;"><?= $errors['password'] ?? '' ?></p>

            <button type="submit">Log In</button>
            <p><?= $errors['result'] ?? '' ?></p>
        </form>
    </div>
</body>
</html>


