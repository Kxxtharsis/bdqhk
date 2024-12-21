<?php
session_start();
include 'connection.php';
// Jika Form Dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $telpon = $_POST['telpon'];
    $divis = $_POST['divdivisiision'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $profile = $_FILES['profile']['name'];

    // Lokasi untuk menyimpan file foto
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile"]["name"]);

     // Validasi dan upload file
     if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
        // Query untuk menambahkan data
        $sql = "INSERT INTO users (name, phone, division, gender, profile) 
                VALUES ('$name', '$phone', '$division', '$gender', '$profile')";

        if ($conn->query($sql) === TRUE) {
            echo "User berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Terjadi kesalahan saat mengupload file.";
    }
}

$conn->close();
?>