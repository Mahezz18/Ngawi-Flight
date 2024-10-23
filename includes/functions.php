<?php
include 'db.php';

function register($username, $password) {
    global $conn;

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Masukkan ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    
    return $stmt->execute();
}

function login($username, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        
        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            return true;
        }
    }
    return false;
}
?>
