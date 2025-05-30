<?php
$con = new mysqli("localhost", "root", "", "db_praktik");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
