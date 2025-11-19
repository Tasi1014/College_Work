<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "scripting_2025";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
$sid = $_GET['sid'];
$sql = "DELETE FROM product_list WHERE id = $sid";

$result = mysqli_query($conn, $sql);

 if($result){
        echo "Deleted Record Successfully";
        header('location: product.php');
    }else{
        echo "Failed to delete!";
    }

?>