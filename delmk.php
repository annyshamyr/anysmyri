<?php
	$database = new mysqli('localhost','root','','akademik');
	if($database->connect_errno){
		echo"Database Tidak Dapat Terhubung";
	}
	$sql = "DELETE FROM mk where id_mk =('$_GET[id_mk]')";
	$data=$database->query($sql);
	header("location:mk.php");
	?>