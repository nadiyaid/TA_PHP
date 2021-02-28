<?php
	include("koneksi.php");
	if (!$_SESSION['username'])
	{
		header("location:login.php?error=Haven't logged in");
	}

?>
