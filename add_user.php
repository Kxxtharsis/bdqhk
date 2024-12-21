<?php
session_start();
include 'connection.php';
// Jika Form Dikirim

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
    $nama = $_POST['nama'];
    $telpon = $_POST['telpon'];
    $divisi = $_POST['divisi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $password = $_POST['password'];
    $nama_profil = $_FILES['foto_profil']["name"];

    $target_file = "";
    if(isset($_FILES['foto_profil'])) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["foto_profil"]["name"]);

    }

     // Validasi dan upload file
     if (move_uploaded_file($_FILES["foto_profil"]["tmp_name"], $target_file)) {
        // Query untuk menambahkan data
        $sql = "INSERT INTO user (nama, password, jenis_kelamin, divisi, telpon, foto_profil) 
                VALUES ('$nama', '$password', '$jenis_kelamin', '$telpon', '$divisi', '$nama_profil')";

        if ($connection->query($sql) === TRUE) {
            // echo "User berhasil ditambahkan.";
            alert("user berhasil ditambahkan");
        } else {
            // echo "Error: " . $sql . "<br>" . $connection->error;
            alert("Error: " . $sql . "<br>" . $connection->error);
        }
    } else {
        // echo "Terjadi kesalahan saat mengupload file.";
        alert("Terjadi kesalahan saat mengupload file.");
    }

$connection->close();
?>