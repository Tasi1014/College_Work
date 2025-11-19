<?php

$host = 'localhost';
$username = "root";
$password = "";
$dbname = "Scripting_2025";

$conn = new mysqli($host,$username, $password, $dbname);

if($conn->connect_error){
 die("Connection failed: ". $conn->connect_error);   
}

?>