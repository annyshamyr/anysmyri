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
		$ID_FAKULTAS = $_POST['id_fakultas'];
		$NAMA_FAKULTAS = $_POST['nama_fakultas'];

	$sql= "INSERT INTO fakultas VALUES('$id_fakultas','$nama_fakultas')";
	$data = $database->query($sql);
	header("location:fakultas.php");
	} ?>
	<form method="post" action="">	
		<div class="container">
			<tr>
				<td>ID_FAKULTAS:</td>
				<td><input class="form-control" type="text" name="id_fakultas"></td>
				<td>NAMA_FAKULTAS:</td>
			</tr>
			<tr>
				<td><input class="form-control" type="text" name="nama_fakultas"></td>
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
					<td>ID_FAKULTAS</td>
					<td>NAMA_FAKULTAS</td>
					<td>OPSI</td>
				</tr>
<?php				

	$sql= "SELECT * FROM fakultas";
	$data = $database->query($sql);
?>

			


<?php if ($data->num_rows > 0) {
		// jika data benar
		while($row = $data->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['id_fakultas']; ?></td>
					<td><?php echo $row['nama_fakultas']; ?></td>
					
					<td><a class="btn btn-danger"href="delfakul.php?ID_FAKULTAS=<?php echo"$row[id_fakultas]";?>">Delete</a></td>
					
				</tr>
			
	<?php 	}?>
	</table>
	<?php } else {
		// jika data salah
		echo "data kosong";
	} ?>
	</body>
	</html>
