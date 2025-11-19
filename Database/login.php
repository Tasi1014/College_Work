<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "scripting_2025";

// session_start();
// if(isset($_SESSION['name'])){
//   header('Location: welcome.php');
//   exit();
// }

if(isset($_COOKIE['name'])){
  header('Location: welcome.php');
  exit();
}

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
  die("Connection Error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $pw = $_POST['password'];

  $sql = "SELECT * FROM students WHERE Name = '$name' AND Password = '$pw' ";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $student = mysqli_fetch_assoc($result);

    //Get student data in indexed array
    // $student = mysqli_fetch_array($result,MYSQLI_NUM);

    // $_SESSION['name'] = $student['Name'];
    $expiry = time()+(86400*30);  //Cookie expires in 30 days;
    setcookie('name', $student['Name'],$expiry);//setcookie (cookie name, cookie value, exprty date)
    header('Location: welcome.php');
    exit();
  } else {
    echo "Error! Username or Password didn't matched.";
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f2f4f7;
    }

    .main {
      height: auto;
      width: 300px;
      border: none;
      border-radius: 10px;
      padding: 20px;
      background-color: #ffffff;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    p {
      margin: 10px 0 5px 0;
      /* p tag automatically takes margin of 16px so i reset it tp margin top 10px and all others to 0   */
    }

    .red {
      color: red;
    }

    #btn {
      width: 100%;
      padding: 8px;
      margin-top: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }

    #userName,
    #pw {
      padding: 10px;
      border-radius: 5px;
      outline: none;
      border: 1px solid gray;
      width: 100%;
      transition: 0.2s ease-in;
    }

    #userName:focus,
    #pw:focus {
      border: 1px solid blue;
      box-shadow: 0 0 5px rgba(24, 119, 242, 0.5);
    }
  </style>
</head>

<body>
  <div class="main">
    <form id="form" method="POST">
      <input type="text" name="name" placeholder="UserName or Email" id="userName" /><br>
      <input type="password" name="password" placeholder="Password" id="pw" /><br>
      <button type="submit" id="btn">Log in</button><br>
      <span>Not yet Registered?<a href="connection.php">Register Here</a></span>
    </form>
  </div>
</body>

</html>