<?php
	include("koneksi.php");
    session_start();

    if(isset($_POST['request'])){

        $reqdate = $_POST['reqdate'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $pengganti = $_POST['pengganti'];
        $nip = $_SESSION['id'];

        $sql = "INSERT INTO request (request_id, tanggal_request, status_ketidakhadiran, keterangan, dari_tanggal, sampai_tanggal, pengganti, approval, nip) VALUES (0, '$reqdate', '$status', '$keterangan', '$from', '$to', '$pengganti', '', '$nip')";
        $add = mysqli_query($config, $sql) or die(mysqli_error($config));
        

        if($add){
            echo "Successfully requested";
            header("location:attendance-superadmin.php");
        }
        else{
            echo "ERROR in requesting" ;
        }
    }
?>