<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_absen = $_POST['tanggal_absen'];
    $lokasi = $_POST['lokasi'];
    
    // Handle file upload
    $foto_bukti = "";
    if(isset($_FILES['profile'])) {
        $target_dir = "uploads/";
        $foto_bukti = $target_dir . basename($_FILES["profile"]["name"]);
        move_uploaded_file($_FILES["profile"]["tmp_name"], $foto_bukti);
    }
    
    // Insert to database
    $sql = "INSERT INTO absensi (tanggal_absen, lokasi, gambar) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $tanggal_absen, $lokasi, $foto_bukti);
    
    if ($stmt->execute()) {
        echo "<script>alert('Absensi berhasil!'); window.location.href='absensi-member.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
?>