<?php

// Creates and returns a connection to the ecommerce database.
function get_db_conn()
{
    $hostname = "localhost";
    $username = "ecpi_user";
    $password = "Password1";
    $dbname = "php_ecommerce_app";

    return mysqli_connect($hostname, $username, $password, $dbname);
}

?>
