<?php
// Jika ID user dikirim via GET atau POST
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data user
    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "User berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID user tidak ditemukan.";
}

$conn->close();
?>