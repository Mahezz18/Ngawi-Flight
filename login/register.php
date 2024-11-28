<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../includes/db_connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashed_password, $role);
    if ($stmt->execute()) {
        // Setelah registrasi berhasil, redirect ke halaman login
        header('Location: login.php'); 
        exit; // Hentikan eksekusi skrip untuk memastikan redirect bekerja
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pengguna</title>
</head>
<body>
    <h1>Registrasi Pengguna Baru</h1>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>Role:</label><br>
        <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
