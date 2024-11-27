 <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'db_qhk_bd';    

    $connection = mysqli_connect($host, $user, $pass, $dbname);

    if (!$connection) {
        echo "Koneksi ke database gagal" . mysqli_connect_error();
    }
 ?>