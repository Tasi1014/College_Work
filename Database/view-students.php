<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "scripting_2025";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
</head>

<body>
    <h2>View Students</h2>

    <?php
    if(mysqli_num_rows($result) > 0):?>

    <table border = "1" style="border-collapse: collapse" >
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            <th>Update</th>
        </tr>
        <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $row['Name'] ?></td>
                <td><?= $row['Email'] ?></td>
                <td><a href="delete-student.php?sid=<?php echo $row['id']; ?>">Delete</td>
                <td><a href="update.php?sid=<?php echo $row['id'];?>" >Update</a></td>
            </tr>
        <?php endWhile; ?>

    </table>

    <?php else: ?>
        <p>No records Found</p>
    <?php endif; ?>
</body>

</html>


<?php mysqli_close($conn); ?>
