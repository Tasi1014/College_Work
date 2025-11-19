<?php
$stationery = array(
    array(
        "name" => "Pen",
        "price" => 20,
        "Quantity" => 10
    ),
    array(
        "name" => "Book",
        "price" => 200,
        "Quantity" => 5
    ),
    array(
        "name" => "Copy",
        "price" => 100,
        "Quantity" => 15
    )
);
?>
<table border="2" style="border-collapse: collapse;">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php foreach ($stationery as $product) { ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['Quantity']; ?></td>
        </tr>
    <?php } ?>
</table>
