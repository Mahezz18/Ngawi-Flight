<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omega_express";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
