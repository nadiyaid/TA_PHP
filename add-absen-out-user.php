<?php
    include("koneksi.php");

        $sql = "UPDATE absensi SET waktu_pulang = CURRENT_TIMESTAMP, jam_kerja = TIMEDIFF(CURRENT_TIMESTAMP, waktu_masuk), updated_at = CURRENT_TIMESTAMP WHERE waktu_pulang is null";
        $update = mysqli_query($config, $sql);

        if($update){
            echo "Successfully added";
            header("location:attendance.php");
        }
        else{
            echo "ERROR in adding data" ;
        }
?>