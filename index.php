<?php
require_once 'db.php';
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];

    $checkQuery = "SELECT * FROM cart WHERE product_id = $productId";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $updateQuery = "
            UPDATE cart
            SET quantity = quantity + 1
            WHERE product_id = $productId
        ";

        mysqli_query($conn, $updateQuery);
    } else {
        $insertQuery = "
            INSERT INTO cart (product_id, quantity)
            VALUES ($productId, 1)
        ";

        mysqli_query($conn, $insertQuery);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Ecommerce App</title>
</head>
<body>

    <h1>PHP Ecommerce App</h1>

    <nav>
        <a href="index.php">Products</a> |
        <a href="cart.php">Shopping Cart</a>
    </nav>

    <hr>

    <h2>Product Catalog</h2>

    <?php
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>";
    echo "<h3>" . $row['product_name'] . "</h3>";
    echo "<p>Category: " . $row['category'] . "</p>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>Price: $" . $row['price'] . "</p>";
    echo "<img src='" . $row['image_url'] . "' width='200' alt='" . $row['product_name'] . "'>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
    echo "<input type='submit' name='add_to_cart' value='Add to Cart'>";
    echo "</form>";
    echo "<hr>";
    echo "</div>";
}
?>
</body>
</html>