<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kehadiran";
    $config = mysqli_connect($host, $username, $password, $database);
    date_default_timezone_set('Asia/Jakarta');

    if(!$config){
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>
