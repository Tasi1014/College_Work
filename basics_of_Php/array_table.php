<?php
$users = array(
    array(
        "name" => "Tasi",
        "age" => 20
    ),
    array(
        "name" => "Neha",
        "age" => 19
    ),
    array(
        "name" => "Messi",
        "age" => 36
    )
);
?>
<table style="border: 1px solid black">
    <tr>
        <th style="border: 1px solid black">Name</th>
        <th style="border: 1px solid black">Age</th>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td style="border: 1px solid black"><?php echo $user['name']; ?></td>
            <td style="border: 1px solid black"><?php echo $user['age']; ?></td>
        </tr>
    <?php } ?>
</table>

</table>