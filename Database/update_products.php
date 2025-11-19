<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "scripting_2025";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (!isset($_GET['sid'])) {
    die("ERROR no sid");
}

$sid = $_GET['sid'];

$sql = " SELECT * FROM product_list WHERE id = '$sid'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("No students record found!");
}

$product = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    $update_Sql = "UPDATE product_list SET Product_Name = '$p_name',
    Price = '$price', Quantity = '$quantity', 
    Category = '$category' WHERE id = '$sid'";

    $update_result = mysqli_query($conn, $update_Sql);

    if ($update_result) {
        header('Location: product.php');
        exit();
    } else {
        echo "Error! Failed to update the records!";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <form method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" value="<?php echo $product['Product_Name'] ?>" /><br /><br>
        <label for="price">Price</label>
        <input type="number" name="price" value="<?php echo $product['Price'] ?>" /><br /> <br>

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" value="<?php echo $product['Quantity'] ?>" /><br /><br>

        <label for="category">Category</label>
        <select name="category">
            <option value="" disabled>Select Category</option>
            <option value="Shoes" <?php if ($product['Category'] == "Shoes")
                echo "selected"; ?>>Shoes</option>
            <option value="Clothing" <?php if ($product['Category'] == "Clothing")
                echo "selected"; ?>>Clothing</option>
            <option value="Sports" <?php if ($product['Category'] == "Sports")
                echo "selected"; ?>>Sports</option>
        </select>
        <br /><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>