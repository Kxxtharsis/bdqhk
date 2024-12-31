<?php
session_start();
include 'connection.php';
// Jika ID user dikirim via GET atau POST
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Query untuk menghapus data user
    $sql = "DELETE FROM users WHERE id = $id";

    if ($connection->query($sql) === TRUE) {
        echo "User berhasil dihapus.";
    } else {
        echo "Error: " . $connection->error;
    }
} else {
    echo "ID user tidak ditemukan.";
}

$connection->close();
?>