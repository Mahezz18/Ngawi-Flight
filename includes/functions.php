<?php
include 'db_connect.php';

// Fungsi untuk registrasi pengguna baru
function register($username, $password, $role = 'user') {
    global $conn;

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $role);
    
    return $stmt->execute();
}

// Fungsi untuk login
function login($username, $password) {
    global $conn;

    // Ambil data pengguna berdasarkan username
    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();
        
        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Jika valid, kembalikan data pengguna
            return [
                'id' => $id,
                'username' => $username,
                'role' => $role
            ];
        }
    }
    return false;
}
?>
