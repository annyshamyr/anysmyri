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
		$id_pegawai = $_POST['id_pegawai'];
		$nama = $_POST['nama'];
		$jabatan = $_POST['jabatan'];
		

	$sql= "INSERT INTO karyawan VALUES('$id_pegawai','$nama','$jabatan')";
	$data = $database->query($sql);
	header("location:karyawan.php");
	} ?>
	<form method="post" action="">	
		<div class="container">
			<tr>
				<td>ID PEGAWAI :</td>
				<td><input class="form-control" type="text" name="id_pegawai"></td>
			</tr>
			<tr>
				<td>NAMA :</td>
				<td><input class="form-control" type="text" name="nama"></td>
			</tr>
			<tr>
				<td>JABATAN :</td>
				<td><input class="form-control" type="text" name="jabatan"></td>
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
					<td>ID PEGAWAI</td>
					<td>NAMA</td>
					<td>JABATAN</td>
					<td>MASUK</td>
					<td>KELUAR</td>
					<td>OPSI</td>
				</tr>
<?php				

	$sql= "SELECT * FROM karyawan, keluar, masuk where karyawan.id_pegawai= keluar.id_pegawai and karyawan.id_pegawai=masuk.id_pegawai";
	$data = $database->query($sql);
?>

			


<?php if ($data->num_rows > 0) {
		// jika data benar
		while($row = $data->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['id_pegawai']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['jabatan']; ?></td>
					<td><?php echo $row['tgl']; ?></td>
					<td><?php echo $row['tgl_keluar']; ?></td>
					
					<td><a href="delete.php?id_pegawai=<?php echo"$row[id_pegawai]";?>">Delete</a></td>
					
				</tr>
			
	<?php 	}?>
	</table>
	<?php } else {
		// jika data salah
		echo "data kosong";
	} ?>
	</body>
	</html>
