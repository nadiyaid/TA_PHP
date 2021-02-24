<?php
    session_start();
    include("koneksi.php");

        $waktu_masuk = date('H:i:s');
        $waktu_pulang = date('H:i:s');
        $nip = $_SESSION['id'];

        $sql = "INSERT INTO absensi (absen_id, tanggal, waktu_masuk, waktu_pulang, jam_kerja, updated_at, nip) VALUES (0, CURDATE(), NOW(), null, TIMEDIFF('$waktu_pulang', '$waktu_masuk'), CURRENT_TIMESTAMP,'$nip')";
        $add = mysqli_query($config, $sql);

        if($add){
            echo "Successfully added";
            header("location:attendance.php");
        }
        else{
            echo "ERROR in adding data" ;
        }
?>