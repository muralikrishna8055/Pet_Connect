<?php
$connection = new mysqli('localhost', 'root', '0000', 'petConnect');
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
