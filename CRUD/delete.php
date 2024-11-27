<?php
// Include database connection
include '../includes/db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tickets WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Tiket berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
