<?php

require_once('../controller/cart_controller.php');

// Handle quantity updates.
if (isset($_POST['update_quantity'])) {
    $cart_id = (int) $_POST['cart_id'];
    $quantity = (int) $_POST['quantity'];

    if ($quantity < 1) {
        $quantity = 1;
    }

    change_cart_quantity($cart_id, $quantity);
}

// Handle item removal.
if (isset($_POST['delete_item'])) {
    $cart_id = (int) $_POST['cart_id'];

    remove_cart_item($cart_id);
}

// Retrieve the current cart after any changes are processed.
$cart = get_cart();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

    <h1>Shopping Cart</h1>

    <nav>
        <a href="products.php">Products</a> |
        <a href="cart.php">Shopping Cart</a>
    </nav>

    <hr>

    <?php if (count($cart) > 0): ?>

        <table border="1" cellpadding="10">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Update</th>
                <th>Remove</th>
            </tr>

            <?php foreach ($cart as $item): ?>
                <tr>
                    <td>
                        <?php echo $item["product_name"]; ?>
                    </td>

                    <td>
                        $<?php echo number_format($item["price"], 2); ?>
                    </td>

                    <td>
                        <?php echo $item["quantity"]; ?>
                    </td>

                    <td>
                        $<?php echo number_format($item["total"], 2); ?>
                    </td>

                    <td>
                        <form method="POST">
                            <input
                                type="number"
                                name="quantity"
                                min="1"
                                value="<?php echo $item["quantity"]; ?>"
                            >

                            <input
                                type="hidden"
                                name="cart_id"
                                value="<?php echo $item["cart_id"]; ?>"
                            >

                            <input
                                type="submit"
                                name="update_quantity"
                                value="Update"
                            >
                        </form>
                    </td>

                    <td>
                        <form method="POST">
                            <input
                                type="hidden"
                                name="cart_id"
                                value="<?php echo $item["cart_id"]; ?>"
                            >

                            <input
                                type="submit"
                                name="delete_item"
                                value="Remove"
                            >
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    <?php else: ?>

        <p>Your shopping cart is currently empty.</p>

    <?php endif; ?>

</body>
</html>