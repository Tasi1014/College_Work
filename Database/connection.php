<?php

$host = 'localhost';
$username = "root";
$password = "";
$dbname = "scripting_2025";

$conn = new mysqli($host,$username, $password, $dbname);

if(!$conn){
 die("Connection failed: ". mysqli_connect_error());   
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // if(isset(POST['register']) == "POST")
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pw'];
    $hashed_Password = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO students(Name,Email,Password) VALUES ('$name','$email','$hashed_Password')";

    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Student registered successfully";
    }else{
        echo "Student could not register";
    }
}


?>



<form method="POST">
    <label for="name">Name: </label>
    <input type="text" name="name" id="name"/><br><br>

    <label for="email">Email: </label>
    <input type="email" name="email" id="email"/><br><br>

    <label for="pq">Password: </label>
    <input type="password" name="pw" id="pw"/><br><br>

    <input type="submit" value="Register"/>
</form>