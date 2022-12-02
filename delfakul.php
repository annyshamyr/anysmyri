<?php
	$database = new mysqli('localhost','root','','akademik');
	if($database->connect_errno){
		echo"Database Tidak Dapat Terhubung";
	}
	$sql = "DELETE FROM fakultas where id_fakultas =('$_GET[id_fakultas]')";
	$data=$database->query($sql);
	header("location:fakultas.php");
	?>