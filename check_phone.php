<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "scripting_2025");
if(!$conn){
    die("Connection Failed: ". $conn_error());
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $phone = $_GET['phone'];

// Query the database
$query = "SELECT * FROM students WHERE phone = '$phone'";
$result = mysqli_query($conn, $query);

// Output message
if (mysqli_num_rows($result) > 0) {
    echo "<span style='color:red;'>Phone number already exists</span>";
} else {
    echo "<span style='color:green;'>Phone number is unique</span>";
}
}

?>
