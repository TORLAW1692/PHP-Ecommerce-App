<?php

require_once('../model/products_db.php');

// Convert product database rows into an array for the view.
function get_products()
{
    $product_rows = get_all_products();
    $products = array();

    if ($product_rows) {
        $index = 0;

        while ($row = mysqli_fetch_assoc($product_rows)) {
            $products[$index]["product_id"] = $row["product_id"];
            $products[$index]["product_name"] = $row["product_name"];
            $products[$index]["category"] = $row["category"];
            $products[$index]["description"] = $row["description"];
            $products[$index]["price"] = $row["price"];
            $products[$index]["image_url"] = $row["image_url"];

            $index++;
        }
    }

    return $products;
}

?>