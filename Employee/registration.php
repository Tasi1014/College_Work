<?php
include 'connection.php';
$name = $email = $phone = $position = $gender = "";
$terms = $remember = false;

$errors = array();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Validate Name
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        $name = trim($_POST['name']);
    } else {
        $errors['name'] = "Name must be 3-15 alphabetic characters.";
    }

    // Validate Email
    if (!empty($_POST['email']) && preg_match('/^[a-z0-9_\-\.]+[@][a-z]+[\.][a-z]{2,3}[\.]?[a-z]{0,3}$/', $_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $errors['email'] = "Enter a valid email address.";
    }

    // Validate Phone (10 digits)
    if (!empty($_POST['phone']) && preg_match('/^\d{10}$/', $_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $errors['phone'] = "Phone must be exactly 10 digits.";
    }

    // Validate Position
    if (!empty($_POST['position'])) {
        $position = $_POST['position'];
    } else {
        $errors['position'] = "Please select a position.";
    }

    // Validate Gender
    if (!empty($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $errors['gender'] = "Please select your gender.";
    }

    // Validate Terms
    if (!empty($_POST['terms'])) {
        $terms = true;
    } else {
        $errors['terms'] = "You must accept terms & conditions.";
    }

    // Validate Password
    if (!empty($_POST['password']) && preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?]).{8,}$/', $_POST['password'])) {
        // Hash password using MD5
        $password = $_POST['password'];
    } else {
        $errors['password'] = "Password must be at least 8 characters, include one uppercase and one special character.";
    }

    if (empty($errors)) {

        $sql = "INSERT INTO employees (username, email, phone, position, gender, terms_and_conditions, password) VALUES ('$name', '$email', '$phone', '$position', '$gender', '$terms','$password')";

        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: login.php');
         $errors['result'] = "<p style='color:green'>Registration Successful!</p>";
        }
    } else {
         $errors['result'] = "<p style='color:red'>Error Registration unsuccessfull </p>";
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-heading {
            text-align: center;
            margin-bottom: 20px;
            color: green;
        }


        .red {
            color: red;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: green;
        }

        .main {
            width: auto;
            background-color: #FEFEFE;
            padding: 10px;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        label{
            color: green;
            font-weight: 500;
        }

        button {
            width: 100%;
            height: 35px;
            font-size: 20px;
            font-weight: 600;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: white;
            cursor: pointer;
        }

        #reset {
            width: 100%;
            height: 35px;
            font-size: 20px;
            font-weight: 600;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .input {
            width: 100%;
        }

        #username,
        #pw,
        #phone,
        #email {
            padding: 10px;
            border-radius: 5px;
            outline: none;
            border: 1px solid gray;
            width: 100%;
            transition: 0.2s ease-in;
        }

        #username:focus,
        #pw:focus,
        #phone:focus,
        #email:focus {
            border: 1px solid blue;
            box-shadow: 0 0 5px rgba(24, 119, 242, 0.5);
        }

        .group1,
        .group2 {
            display: flex;
            gap: 10px;
        }

        .formgrp {
            flex: 1;
            /* Make both inputs equal width */
        }

        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid gray;
            width: 100%;
            transition: 0.2s ease-in;
        }

        select:focus {
            border: 1px solid blue;
            box-shadow: 0 0 5px rgba(24, 119, 242, 0.5);
        }

        input[type="radio"],
        input[type="checkbox"] {
            accent-color: green;
            /* Makes radios & checkboxes match your theme */
        }

        .group3 {
            display: flex;
            gap: 10px;
        }

        .group3 .formgrp {
            flex: 1;
        }

        #reset {
            background-color: #6c757d;
        }

        #reset:hover {
            background-color: #5a6268;
        }

        .gender-options {
            display: flex;
            flex-wrap: nowrap;
            /* Prevent wrapping */
            gap: 10px;
            /* Space between buttons */
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="main">
        <h1 class="form-heading">Registration Form</h1>
        <form method="POST">
            <div class="group1">
                <div class="formgrp">
                    <label>Username:</label>
                    <input type="text" name="name" value="<?= $name ?>  " class="input" id="username"><br>
                    <p class="red"><?= $errors['name'] ?? '' ?></p>
                </div>

                <div class="formgrp">
                    <label>Password:</label>
                    <input type="password" name="password" class="input" id="pw"><br>
                    <p class="red"><?= $errors['password'] ?? '' ?></p>
                </div>
            </div>

            <div class="group2">
                <div class="formgrp">
                    <label>Email:</label>
                    <input type="text" name="email" value="<?= $email ?>" class="input" id="email"><br>
                    <p class="red"><?= $errors['email'] ?? '' ?></p>
                </div>

                <div class="formgrp">
                    <label>Phone:</label>
                    <input type="text" name="phone" value="<?= $phone ?>" class="input" id="phone"><br>
                    <p class="red"><?= $errors['phone'] ?? '' ?></p>
                </div>
            </div>

            <div class="group3">

                <div class="formgrp">
                    <label>Position:</label>
                    <select name="position">
                        <option value="">Select Position</option>
                        <option value="Frontend Developer" <?= $position == "Frontend Developer" ? "selected" : "" ?>>
                            Frontend
                            Developer</option>
                        <option value="Backend Developer" <?= $position == "Backend Developer" ? "selected" : "" ?>>Backend
                            Developer
                        </option>
                        <option value="QA Engineer" <?= $position == "QA Engineer" ? "selected" : "" ?>>QA Engineer
                        </option>
                        <option value="DevOps Engineer" <?= $position == "DevOps Engineer" ? "selected" : "" ?>>DevOps
                            Engineer
                        </option>
                    </select>
                    <p class="red"><?= $errors['position'] ?? '' ?></p>
                </div>

                <div class="formgrp">
                    <label>Gender:</label>
                    <div class="gender-options">
                        <label><input type="radio" name="gender" value="Male" <?= $gender == "Male" ? "checked" : "" ?>>
                            Male</label>
                        <label><input type="radio" name="gender" value="Female" <?= $gender == "Female" ? "checked" : "" ?>> Female</label>
                        <label><input type="radio" name="gender" value="Others" <?= $gender == "Others" ? "checked" : "" ?>> Others</label>
                    </div>
                    <p class="red"><?= $errors['gender'] ?? '' ?></p>
                </div>
            </div>

            <label><input type="checkbox" name="terms" <?= $terms ? "checked" : "" ?>> I accept the terms &
                conditions</label>
            <p class="red"><?= $errors['terms'] ?? '' ?></p>

            <button type="submit">Register</button><br>
            <input type="reset" id="reset">

            <p> <?= $errors['result'] ?? '' ?> </p>
    </div>
    </form>
</body>

</html>