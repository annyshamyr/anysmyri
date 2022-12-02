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
		$id_masuk = $_POST['id_masuk'];
		$id_pegawai = $_POST['id_pegawai'];
		$tgl = $_POST['tgl'];
		

	$sql= "INSERT INTO masuk VALUES('$id_masuk','$id_pegawai','$tgl')";
	$data = $database->query($sql);
	header("location:masuk.php");
	} ?>
	<form method="post" action="">	
		<div class="container">
			<tr>
				<td>ID MASUK :</td>
				<td><input class="form-control" type="text" name="id_masuk"></td>
			</tr>
			<tr>
				<td>ID PEGAWAI:</td>
				<td><input class="form-control" type="text" name="id_pegawai"></td>
			</tr>
			<tr>
				<td>JAM & TGL :</td>
				<td><input class="form-control" type="datetime-local" name="tgl"></td>
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
					<td>ID MASUK</td>
					<td>ID PEGAWAI</td>
					<td>JAM & TGL</td>
					
					<td>OPSI</td>
				</tr>
<?php				

	$sql= "SELECT * FROM masuk";
	$data = $database->query($sql);
?>

			


<?php if ($data->num_rows > 0) {
		// jika data benar
		while($row = $data->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['id_masuk']; ?></td>
					<td><?php echo $row['id_pegawai']; ?></td>
					<td><?php echo $row['tgl']; ?></td>
					
					
					<td><a href="delete.php?id_masuk=<?php echo"$row[id_masuk]";?>">Delete</a></td>
					
				</tr>
			
	<?php 	}?>
	</table>
	<?php } else {
		// jika data salah
		echo "data kosong";
	} ?>
	</body>
	</html>
