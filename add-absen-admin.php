<?php
    session_start();
    include("koneksi.php");
    
        $checked = false;
        $select = "SELECT tanggal, waktu_masuk, waktu_pulang, date_format(jam_kerja, '%H:%i') as jam_kerja FROM absensi WHERE nip = '$_SESSION[id]'";
        $query_run = mysqli_query($config, $select);
        while($row = mysqli_fetch_array($query_run)){
            if($row['tanggal']==date('Y-m-d')){
                $checked = true;
                echo "<script language='javascript'>alert('You have already checked in!')</script>";
                echo "<script language='javascript'>window.location.replace('attendance-admin.php'); </script>";
            }
        }

        if ($checked == false) {
            $waktu_masuk = date('H:i:s');
            $waktu_pulang = date('H:i:s');
            $nip = $_SESSION['id'];

            $sql = "INSERT INTO absensi (absen_id, tanggal, waktu_masuk, waktu_pulang, jam_kerja, updated_at, nip) VALUES (0, CURDATE(), NOW(), null, TIMEDIFF('$waktu_pulang', '$waktu_masuk'), CURRENT_TIMESTAMP,'$nip')";
            $add = mysqli_query($config, $sql);

            if($add){
                echo "<script language='javascript'>alert('Successfully check in!')</script>";
                echo "<script language='javascript'>window.location.replace('attendance-admin.php'); </script>";
            }
            else{
                echo "ERROR in adding data" ;
            }
        }
?>