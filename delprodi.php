<?php
	$database = new mysqli('localhost','root','','akademik');
	if($database->connect_errno){
		echo"Database Tidak Dapat Terhubung";
	}
	$sql = "DELETE FROM prodi where id_prodi =('$_GET[id_prodi]')";
	$data=$database->query($sql);
	header("location:prodi.php");
	?>