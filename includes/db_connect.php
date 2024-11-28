<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'omega_express';

// Buat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
