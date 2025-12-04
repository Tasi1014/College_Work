<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "scripting_2025"); // use your correct DB

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $password = $_POST['password'];
    $gender   = $_POST['gender'];
    $faculty  = $_POST['faculty'];
    $dob      = $_POST['dob'];


$stmt = $conn->prepare("
        INSERT INTO bca (Name, Email, Phone, Password, Gender, Faculty, DOB)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param("sssssss", 
        $name, 
        $email, 
        $phone, 
        $password, 
        $gender, 
        $faculty, 
        $dob
    );
     if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
