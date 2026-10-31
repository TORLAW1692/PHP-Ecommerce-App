<?php

require_once('../model/cart_db.php');

// Add a product to the cart.
// If the product already exists, increase its quantity instead.
function add_to_cart($product_id)
{
    $existing_item = get_cart_item_by_product($product_id);

    if ($existing_item && mysqli_num_rows($existing_item) > 0) {
        return increment_cart_item($product_id);
    }

    return insert_cart_item($product_id);
}

// Update the quantity of an existing cart item.
function change_cart_quantity($cart_id, $quantity)
{
    return update_cart_quantity($cart_id, $quantity);
}

// Remove an item from the cart.
function remove_cart_item($cart_id)
{
    return delete_cart_item($cart_id);
}

// Convert cart database rows into an array for the view.
function get_cart()
{
    $cart_rows = get_cart_items();
    $cart = array();

    if ($cart_rows) {
        $index = 0;

        while ($row = mysqli_fetch_assoc($cart_rows)) {
            $cart[$index]["cart_id"] = $row["cart_id"];
            $cart[$index]["product_id"] = $row["product_id"];
            $cart[$index]["product_name"] = $row["product_name"];
            $cart[$index]["price"] = $row["price"];
            $cart[$index]["quantity"] = $row["quantity"];
            $cart[$index]["total"] = $row["price"] * $row["quantity"];

            $index++;
        }
    }

    return $cart;
}

?>