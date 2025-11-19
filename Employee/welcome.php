<?php
session_start();
if(!isset($_SESSION['username'])){
    if(isset($_SESSION['remember_name'])){
        $_SESSION['username'] = $_SESSION['remember_name'];
    } else {
        header('Location: login.php');
        exit(); 
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body{
            background-color: green;
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
        }

        .main{

            border: none;
            border-radius: 10px;
            background-color: #FEFEFE;
            padding: 10px;
            text-align: center;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;


        }

        a{
            text-decoration: none;
            color: white;
            font-weight: 700;
            font-size: 20px;
            display: flex;
            height: 35px;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            justify-content: center;
            align-items: center;
            background-color: green;

        }

        p{
            color: green;
            font-weight: 900;
            font-size: 30px;
        }

        button{
            width: 100%;
            height: 35px;
            background-color: #7AA1D8;
            border-radius: 5px;
        }


    </style>
</head>
<body>
    <div class="main">
        
    <h1>Welcome Page</h1>
    <?php
    echo "<p>Welcome: ". $_SESSION['username']. "</p>";
    ?>
    <a href="logout.php">Logout here</a>
    </div>
</body>
</html>