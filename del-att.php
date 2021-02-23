<?php
	session_start();
	include("koneksi.php");

	$del = mysqli_query($config, "DELETE FROM absensi WHERE absen_id = '$_GET[absen_id]'");
    mysqli_query($config, "ALTER TABLE absensi AUTO_INCREMENT=0");
    header("location:rekap-absen.php?nip=3");
?>