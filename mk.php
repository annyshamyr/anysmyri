<html>
<head>
	<title>Pemrograman Berorientasi Objek</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-color: powderblue !important;
		}
		form{
		font-size: 25px;
		color: white;
		background: #2F495A;
		margin: 10px auto;
		padding: 50px 20px 50px 20px;
		border-radius: 5px;
		}
		table {
		background: #2F495A;	
		color: white;
		width: 600px;  
		padding: 10px 10px 50px 10px;
	}
	</style>
</head>
<body>
<?php
	$database = new mysqli('localhost','root','','akademik');
	if($database->connect_errno){
		echo"Database Tidak Dapat Terhubung";
	}
if(isset($_POST['simpan'])){
		$id_mk = $_POST['id_mk'];
		$nama_mk = $_POST['nama_mk'];
		$sks = $_POST['sks'];
		$semester = $_POST['semester'];
	
		

	$sql= "INSERT INTO mk VALUES ('$id_mk','$nama_mk','$sks','$semester')";
	$data = $database->query($sql);
	header("location: mk.php");
	} ?>
	<form method="post" action="">	
		<div class="container">
			<tr>
				<td>kd_mk :</td>
				<td><input class="form-control" type="text" name="id_mk"></td>
			</tr>
			<tr>
				<td>nama_mk :</td>
				<td><input class="form-control" type="text" name="nama_mk"></td>
			</tr>
			<tr>
				<td>sks :</td>
				<td><input class="form-control" type="text" name="sks"></td>
			</tr>
			
			<tr>
				<td>semester :</td>
				<td><input class="form-control" type="text" name="semester"></td>
			</tr>
						<tr>
				<td>NO_TLP :</td>
				<td><input class="form-control" type="text" name="no_tlp"></td>
			</tr>
			<tr colspan="2" align="center">
				<td><input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN"></td>
				<td><input class="btn btn-primary" type="reset" name="cancel" value="BATALKAN"></td>
			</tr>	
			
		</div>
	</form>
<table border="1" cellspacing="0" class="table">
</tr>
				<tr>
					<td>kd_mk</td>
					<td>nama_mk</td>
					<td>sks</td>
					<td>semester</td>
					
				</tr>
<?php				

	$sql= "SELECT * FROM mk ";
	$data = $database->query($sql);
?>

			


<?php if ($data->num_rows > 0) {
		// jika data benar
		while($row = $data->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['id_mk']; ?></td>
					<td><?php echo $row['nama_mk']; ?></td>
					<td><?php echo $row['sks']; ?></td>
					<td><?php echo $row['semester']; ?></td>
			
					<td><a class="btn btn-danger"href="delmk.php?id_mk=<?php echo"$row[id_mk]";?>">Delete</a></td>
					
			
					
				</tr>
			
	<?php 	}?>
	</table>
	<?php } else {
		// jika data salah
		echo "data kosong";
	} ?>
	</body>
	</html>
