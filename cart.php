<?php
require_once 'db.php';
?>

<?php

if (isset($_POST['update_quantity'])) {
    $cartId = $_POST['cart_id'];
    $quantity = $_POST['quantity'];

    $updateQuery = "
        UPDATE cart
        SET quantity = $quantity
        WHERE cart_id = $cartId
    ";

    mysqli_query($conn, $updateQuery);
}

if (isset($_POST['delete_item'])) {
    $cartId = $_POST['cart_id'];

    $deleteQuery = "
        DELETE FROM cart
        WHERE cart_id = $cartId
    ";

    mysqli_query($conn, $deleteQuery);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

    <h1>Shopping Cart</h1>

    <nav>
        <a href="index.php">Products</a> |
        <a href="cart.php">Shopping Cart</a>
    </nav>

    <hr>

    <?php
$query = "
    SELECT
        cart.cart_id,
        products.product_name,
        products.price,
        cart.quantity
    FROM cart
    INNER JOIN products
        ON cart.product_id = products.product_id
";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "<th>Total</th>";
    echo "<th>Update</th>";
    echo "<th>Remove</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $total = $row['price'] * $row['quantity'];

        echo "<tr>";
        echo "<td>" . $row['product_name'] . "</td>";
        echo "<td>$" . number_format($row['price'], 2) . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>$" . number_format($total, 2) . "</td>";
        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='number' name='quantity' min='1' value='" . $row['quantity'] . "'>";
        echo "<input type='hidden' name='cart_id' value='" . $row['cart_id'] . "'>";
        echo "<input type='submit' name='update_quantity' value='Update'>";
        echo "</form>";
        echo "</td>";

        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='cart_id' value='" . $row['cart_id'] . "'>";
        echo "<input type='submit' name='delete_item' value='Remove'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Your shopping cart is currently empty.</p>";
}
?>

</body>
</html>