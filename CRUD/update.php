<?php
// Include database connection
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tickets WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_penumpang = $_POST['nama_penumpang'];
    $nomor_penerbangan = $_POST['nomor_penerbangan'];
    $tujuan = $_POST['tujuan'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];

    $sql = "UPDATE tickets SET nama_penumpang = ?, nomor_penerbangan = ?, tujuan = ?, tanggal = ?, harga = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdi", $nama_penumpang, $nomor_penerbangan, $tujuan, $tanggal, $harga, $id);
    if ($stmt->execute()) {
        echo "Tiket berhasil diperbarui!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tiket</title>
</head>
<body>
    <h1>Edit Tiket</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
        <label>Nama Penumpang:</label><br>
        <input type="text" name="nama_penumpang" value="<?php echo $ticket['nama_penumpang']; ?>" required><br>
        <label>Nomor Penerbangan:</label><br>
        <input type="text" name="nomor_penerbangan" value="<?php echo $ticket['nomor_penerbangan']; ?>" required><br>
        <label>Tujuan:</label><br>
        <input type="text" name="tujuan" value="<?php echo $ticket['tujuan']; ?>" required><br>
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="<?php echo $ticket['tanggal']; ?>" required><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?php echo $ticket['harga']; ?>" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
