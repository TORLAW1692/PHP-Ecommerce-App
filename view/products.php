<?php

require_once('../controller/products_controller.php');
require_once('../controller/cart_controller.php');

if (isset($_POST['add_to_cart'])) {
    $product_id = (int) $_POST['product_id'];
    add_to_cart($product_id);
}

$products = get_products();

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Ecommerce App</title>
</head>
<body>

    <h1>PHP Ecommerce App</h1>

    <nav>
        <a href="products.php">Products</a> |
        <a href="cart.php">Shopping Cart</a>
    </nav>

    <hr>

    <h2>Product Catalog</h2>

    <?php foreach ($products as $product): ?>

        <div>
            <h3><?php echo $product["product_name"]; ?></h3>

            <p>
                Category:
                <?php echo $product["category"]; ?>
            </p>

            <p>
                <?php echo $product["description"]; ?>
            </p>

            <p>
                Price:
                $<?php echo number_format($product["price"], 2); ?>
            </p>

            <img
                src="../<?php echo $product["image_url"]; ?>"
                width="200"
                alt="<?php echo $product["product_name"]; ?>"
            >

            <form method="POST">
                <input
                    type="hidden"
                    name="product_id"
                    value="<?php echo $product["product_id"]; ?>"
                >

                <input
                    type="submit"
                    name="add_to_cart"
                    value="Add to Cart"
                >
            </form>

            <hr>
        </div>

    <?php endforeach; ?>

</body>
</html>