<?php
session_start();
include 'connection.php';

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE nama='$username' AND password='$password'"; 
    $result = $connection->query($sql); 

    if ($result->num_rows > 0) { 

        $_SESSION['nama'] = $username; 
        header("Location: Dashboard.php"); 

    } else { 
        
        alert("login gagal username ato password salah");
        $_SESSION['error'] = "Login gagal. Username atau password salah.";
        header('Location: index.php'); // Redirect ke halaman login
    } 


    // if ($user && password_verify($password, $user['password'])) {
    //     $_SESSION['user'] = $user['username'];
    //     header('Location: Dashboard.php');
    // } else {
    //     echo "Login gagal. Username atau password salah.";
    // }
}


?>
