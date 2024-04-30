<?php
// Connection details
-
$host = "localhost";
$user = "MAHORO";
$pass = "Chany@123";
$database = "mahoro_chany_personalized _daily_ news _digest";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>