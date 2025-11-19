<?php
include 'connection.php';

$action = $_GET['action'];
if($action === 'create'){
    $name = sanitize($_POST['name'],$conn);
    $email = sanitize($_POST['email'],$conn);
    $sql = "INSERT INTO persons (name, email) VALUES ('$name', '$email')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo json_encode(array('message'=> 'User created successfully'));
    }else{
        echo json_encode(array('message'=> 'User creation failed'));
    }
}else if($action === 'read'){
    $sql = "SELECT * FROM persons";
    $result = mysqli_query($conn, $sql);
    $persons = array();
    while($row = mysqli_fetch_assoc($result)){
        $persons[] = $row;
    }
    echo json_encode($persons);
}else if($action === 'update'){
    $id = sanitize($_POST['id'],$conn);
    $name = sanitize($_POST['name'],$conn);
    $email = sanitize($_POST['email'],$conn);
    $sql = "UPDATE persons SET name = '$name', email = '$email' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo json_encode(array('message'=> 'User updated successfully'));
    }else{
        echo json_encode(array('message'=> 'User update failed'));
    }
}else if($action === 'delete'){
    $id = sanitize($_GET['id'],$conn);
    $sql = "DELETE FROM persons WHERE id = '$id'";
   $result = mysqli_query($conn, $sql);
   if($result){
    echo json_encode(array('message'=> 'User deleted successfully'));
   }else{
    echo json_encode(array('message'=> 'User deletion failed'));
   }
}else if($action === 'search'){
    $query = sanitize($_GET['query'],$conn);
    $sql = "SELECT * FROM persons WHERE name LIKE '%$query%' OR email LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);
    $persons = array();
    while($row = mysqli_fetch_assoc($result)){
        $persons[] = $row;
    }
    echo json_encode($persons);
}

function sanitize($input,$conn){
    return mysqli_real_escape_string($conn, $input);
}
mysqli_close($conn);


?>