<?php
	include("koneksi.php");

    if(isset($_POST['request'])){

        $type = $_POST['type'];
        $keterangan = $_POST['keterangan'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $pengganti = $_POST['pengganti'];

        $sql = "INSERT INTO request (request_id, izin, sakit, cuti, unpaid, keterangan, dari_tanggal, sampai_tanggal, pengganti, approval, nip) VALUES (0, '$type', '$type', '$type', 0, '$keterangan', '$from', '$to', '$pengganti', '', '3')";
        $add = mysqli_query($config, $sql) or die(mysqli_error($config));
        

        if($add){
            echo "Successfully requested";
            header("location:attendance.php");
        }
        else{
            echo "ERROR in requesting" ;
        }
    }
?>