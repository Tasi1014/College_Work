<?php
$conn = mysqli_connect("localhost", "root", "", "scripting_2025");

$phone = $_POST['phone'];

$query = "SELECT * FROM students WHERE phone = '$phone'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<span style='color:red;'>Phone number already exists</span>";
} else {
    echo "<span style='color:green;'>Phone number is unique</span>";
}
?>
