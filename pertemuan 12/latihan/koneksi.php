<?php
$con = new mysqli("localhost", "root", "", "perkuliahan");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
