<?php
// Include database connection
include '../includes/db_connect.php';

$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket</title>
</head>
<body>
    <h1>Daftar Tiket</h1>
    <a href="create.php">Tambah Tiket Baru</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Penumpang</th>
            <th>Nomor Penerbangan</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama_penumpang']; ?></td>
            <td><?php echo $row['nomor_penerbangan']; ?></td>
            <td><?php echo $row['tujuan']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
