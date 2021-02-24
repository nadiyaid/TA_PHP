<?php
    session_start();
	include("koneksi.php");
	if (!$_SESSION['username'])
	{
		header("location:login.php?pesan=Haven't logged in");
		exit;
	}

?>
