<?php
include 'connection.php';

$sql = "SELECT * FROM employees";
$result =  mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>


</head>
<body>
    <?php if(mysqli_num_rows($result)>0): ?>

    <table border="1" style="border-collapse: collapse">
        <caption>Employee Records</caption>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Position</th>
            <th>Gender</th>
            <th>Terms and condition</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['position'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['terms_and_conditions']? "Accepted" : "Not accepted"; ?></td>
                <td><?= $row['password'] ?></td>
                <td><a href="delete.php?sid=<?php echo $row['id']; ?>">Delete</td>
                <td><a href="update.php?sid=<?php echo $row['id'];?>" >Update</a></td>
            </tr>
        <?php endWhile; ?>

    </table>

    <?php else: ?>
        <p>No records Found</p>
    <?php endif; ?>
</body>
</html>