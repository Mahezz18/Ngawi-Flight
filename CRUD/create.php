<?php
// Include database connection
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penumpang = $_POST['nama_penumpang'];
    $nomor_penerbangan = $_POST['nomor_penerbangan'];
    $tujuan = $_POST['tujuan'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO tickets (nama_penumpang, nomor_penerbangan, tujuan, tanggal, harga) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $nama_penumpang, $nomor_penerbangan, $tujuan, $tanggal, $harga);
    if ($stmt->execute()) {
        echo "Tiket berhasil ditambahkan!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tiket</title>
</head>
<body>
    <h1>Tambah Tiket Baru</h1>
    <form method="POST">
        <label>Nama Penumpang:</label><br>
        <input type="text" name="nama_penumpang" required><br>
        <label>Nomor Penerbangan:</label><br>
        <input type="text" name="nomor_penerbangan" required><br>
        <label>Tujuan:</label><br>
        <input type="text" name="tujuan" required><br>
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" required><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
