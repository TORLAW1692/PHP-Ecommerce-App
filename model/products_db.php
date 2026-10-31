<?php

require_once('database.php');

// Retrieve all products from the database.
function get_all_products()
{
    $conn = get_db_conn();

    $query = "SELECT * FROM products";

    return mysqli_query($conn, $query);
}

?>