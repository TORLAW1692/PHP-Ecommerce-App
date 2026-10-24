<?php

$hostname = "localhost";
$username = "ecpi_user";
$password = "Password1";
$dbname = "php_ecommerce_app";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>