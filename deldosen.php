<?php
	$database = new mysqli('localhost','root','','akademik');
	if($database->connect_errno){
		echo"Database Tidak Dapat Terhubung";
	}
	$sql = "DELETE FROM dosen where nidn =('$_GET[nidn]')";
	$data=$database->query($sql);
	header("location:dosen.php");
	?>