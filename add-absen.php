<?php
    session_start();
    include("koneksi.php");

        $waktu_masuk = date('H:i:s');
        $waktu_pulang = date('H:i:s');
        $nip = $_SESSION['id'];
        
        $sql = "INSERT INTO absensi (absen_id, tanggal, waktu_masuk, waktu_pulang, jam_kerja, updated_at, nip) VALUES (0, CURDATE(), NOW(), null, TIMEDIFF('$waktu_pulang', '$waktu_masuk'), CURRENT_TIMESTAMP,'$nip')";
        $add = mysqli_query($config, $sql);

        if($add){
            header("location:attendance-superadmin.php");
            include 'alert.php';
            echo $alert;
            return "<script type='text/javascript'>alert('$alert');</script>";
        }

        else{
            echo "ERROR in adding data" ;
        }
?>