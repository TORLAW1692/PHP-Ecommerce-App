<?php

require_once('database.php');

// Retrieve all cart items with their related product information.
function get_cart_items()
{
    $conn = get_db_conn();

    $query = "
        SELECT
            cart.cart_id,
            cart.product_id,
            products.product_name,
            products.price,
            cart.quantity
        FROM cart
        INNER JOIN products
            ON cart.product_id = products.product_id
    ";

    return mysqli_query($conn, $query);
}

// Find out whether a product is already in the cart.
function get_cart_item_by_product($product_id)
{
    $conn = get_db_conn();

    $query = "
        SELECT *
        FROM cart
        WHERE product_id = $product_id
    ";

    return mysqli_query($conn, $query);
}

// Add a new product to the cart.
function insert_cart_item($product_id)
{
    $conn = get_db_conn();

    $query = "
        INSERT INTO cart (product_id, quantity)
        VALUES ($product_id, 1)
    ";

    return mysqli_query($conn, $query);
}

// Increase the quantity when a product is already in the cart.
function increment_cart_item($product_id)
{
    $conn = get_db_conn();

    $query = "
        UPDATE cart
        SET quantity = quantity + 1
        WHERE product_id = $product_id
    ";

    return mysqli_query($conn, $query);
}

// Change the quantity of an existing cart item.
function update_cart_quantity($cart_id, $quantity)
{
    $conn = get_db_conn();

    $query = "
        UPDATE cart
        SET quantity = $quantity
        WHERE cart_id = $cart_id
    ";

    return mysqli_query($conn, $query);
}

// Remove an item from the cart.
function delete_cart_item($cart_id)
{
    $conn = get_db_conn();

    $query = "
        DELETE FROM cart
        WHERE cart_id = $cart_id
    ";

    return mysqli_query($conn, $query);
}

?>