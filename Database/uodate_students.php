<?php

$host = 'localhost';
$username = "root";
$password = "";
$dbname = "scripting_2025";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: ". mysqli_connect_error());
} 
    $sid = $_GET['sid'];

    $sql = " SELECT * FROM students WHERE id = '$sid' ";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo "No students records found";
    }
    $students = mysqli_fetch_assoc($result);

    if(isset($_POST['update'])){
        $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pw'];
          $update_sql = "UPDATE students
SET Name = '$name', Email = '$email'
WHERE id = '$sid'; ";

    $update_result = mysqli_query($conn, query: $update_sql);


    if($update_result){
        echo "Updated successfully";
        header('location: view-students.php');
    }else{
        echo "Error Updating!";
    }

    }


?>



<form method="POST">
    <label for="name">Name: </label>
    <input type="text" name="name" id="name" value="<?php echo $students['Name'] ?>" /><br><br>

    <label for="email">Email: </label>
    <input type="email" name="email" id="email" value="<?php echo $students['Email'] ?>" /><br><br>

    <label for="pq">Password: </label>
    <input type="password" name="pw" id="pw" value="<?php echo $students['Password'] ?>" /><br><br>

    <input type="submit" name="update" value="Update" />
</form>