<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'"; 
    $result = $connection->query($sql); 

    if ($result->num_rows > 0) { 

        $_SESSION['username'] = $username; 
        header("Location: Dashboard.php"); 

    } else { 

        $_SESSION['error'] = "Login gagal. Username atau password salah.";
        header('Location: Dashboard.php'); // Redirect ke halaman login
    } 


    // if ($user && password_verify($password, $user['password'])) {
    //     $_SESSION['user'] = $user['username'];
    //     header('Location: Dashboard.php');
    // } else {
    //     echo "Login gagal. Username atau password salah.";
    // }
}


?>
