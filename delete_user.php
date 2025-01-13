<?php

session_start();
include 'connection.php';
// Jika ID user dikirim via GET atau POST
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    

    // Query untuk menghapus data user
    $sql = "DELETE FROM user WHERE id_user = $id_user";

    if ($connection->query($sql) === TRUE) {
        echo "User berhasil dihapus.";
        header('Location: User.php'); 
    } else {
        echo "Error: " . $connection->error;
    }
} else {
    echo "ID user tidak ditemukan.";
    header('Location: Undex.php'); 
}

$connection->close();
?>