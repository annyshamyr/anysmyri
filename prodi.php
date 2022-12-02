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
		$id_prodi = $_POST['id_prodi'];
		$nama_prodi = $_POST['nama_prodi'];

	$sql= "INSERT INTO prodi VALUES ('$id_prodi','$nama_prodi')";
	$data = $database->query($sql);
	header("location: prodi.php");
	} ?>
	<form method="post" action="">	
		<div class="container">
			<tr>
				<td>id_prodi :</td>
				<td><input class="form-control" type="text" name="id_prodi"></td>
			</tr>
			<tr>
				<td>nama_prodi :</td>
				<td><input class="form-control" type="text" name="nama_prodi"></td>
			</tr>
			<tr>
			<tr colspan="2" align="center">
				<td><input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN"></td>
				<td><input class="btn btn-primary" type="reset" name="cancel" value="BATALKAN"></td>
			</tr>	
			
		</div>
	</form>
<table border="1" cellspacing="0" class="table">
</tr>
				<tr>
					<td>id_prodi</td>
					<td>nama_prodi</td>
					
				</tr>
<?php				

	$sql= "SELECT * FROM prodi ";
	$data = $database->query($sql);
?>

			


<?php if ($data->num_rows > 0) {
		// jika data benar
		while($row = $data->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['id_prodi']; ?></td>
					<td><?php echo $row['nama_prodi']; ?></td>
				
					<td><a href="delprodi.php?id_prodi=<?php echo"$row[id_prodi]";?>">Delete</a></td>
					
			
					
				</tr>
			
	<?php 	}?>
	</table>
	<?php } else {
		// jika data salah
		echo "data kosong";
	} ?>
	</body>
	</html>
