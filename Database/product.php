<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "scripting_2025";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {  // if(isset(POST['register']) == "POST")
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    $sql = "INSERT INTO product_list(Product_Name,Price,Quantity,Category) VALUES ('$name','$price','$quantity','$category')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Product submitted successfully";
    } else {
        echo "ERRO! Couldn't submit product";
    }
}
$sql = "SELECT * FROM product_list";

$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Validation</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Add Product</h1>
    <form method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" /><br /><br>
        <label for="price">Price</label>
        <input type="number" name="price" /><br /> <br>

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" /><br /><br>

        <label for="category">Category</label>
        <select name="category">
            <option value="" selected>Select Category</option>
            <option value="Shoes">Shoes</option>
            <option value="Clothing">Clothing</option>
            <option value="Sports">Sports</option>
        </select><br /><br>

        <button type="submit">Submit</button>

    </form>



    <?php
    if (mysqli_num_rows($result) > 0): ?>
        <h2>View Product Data</h2>

        <table border="1" style="border-collapse: collapse">
            <tr>
                <th>S.N</th>
                <th>Product_Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>
                <th>Update</th>
            </tr>
            <?php $count = 1;
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $row['Product_Name'] ?></td>
                    <td><?= $row['Price'] ?></td>
                    <td><?= $row['Quantity'] ?></td>
                    <td><?= $row['Category'] ?></td>
                    <td><a href="delete-products.php?sid=<?php echo $row['id']; ?>" onclick="alert("Are you sure you want to delete the product?" >Delete</a></td>
                    <td><a href="update_products.php?sid=<?php echo $row['id'];?>" >Update</a></td>
                </tr>
            <?php endwhile; ?>

        </table>

    <?php else: ?>
        <p>No records Found</p>
    <?php endif; ?>

</body>

</html>