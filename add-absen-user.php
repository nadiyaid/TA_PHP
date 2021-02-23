<?php
    session_start();
    include("koneksi.php");

        $waktu_masuk = date('H:i:s');
        $waktu_pulang = date('H:i:s');

        $sql = "INSERT INTO absensi (absen_id, tanggal, waktu_masuk, waktu_pulang, jam_kerja, updated_at, nip) VALUES (0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, null, TIMEDIFF('$waktu_pulang', '$waktu_masuk'), CURRENT_TIMESTAMP,'3')";
        $add = mysqli_query($config, $sql);

        if($add){
            echo "Successfully added";
            header("location:attendance.php");
        }
        else{
            echo "ERROR in adding data" ;
        }
?>