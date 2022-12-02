<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
        body {
             background-color: powderblue  !important;
        }
        form{
        font-size: 25px;
        color: white;
        background:  #2F495A;
        margin:  10px auto;
        padding:  50px 20px 50px 20px;
        border-radius: 5px;
        }
        table  {
			background:  #2F495A;
        color: white;
        width: 100%;
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
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];
        $no_telp = $_POST['no_telp'];
		
	$sql= "INSERT INTO mahasiswa VALUES('$nim','$nama','$fakultas','$prodi','$alamat','$no_telp')";
	$data = $database->query($sql);
	header("location:mahasiswa.php");
	} ?>
	<form method="post" action="">	
		<div class="container">	
		<tr>
				<td>nim :</td>
				<td><input class="form-control" type="text" name="nim"></td>
			</tr>
			<tr>
                <td>nama :</td>
				<td><input class="form-control" type="text" name="nama"></td>
			</tr>
			<tr>
				<td>fakultas :</td>
				<td><select class="form-control" name="fakultas">
					<option value="FAKULTAS TEKNIK">Fakultas Teknik</option>
                    <option value="FAKULTAS HUKUM">Fakultas Hukum</option>
                    <option value="FAKULTAS PERTANIAN">Fakultas Pertanian</option>
                </select>    
				</td>
			</tr>
			<tr>
				<td>prodi :</td>    
                <td><select class="form-control" name="prodi"></td>
					<option value="INF">informatika</option>
                    <option value="SI">Sistem Informasi</option>
                    <option value="RSK">Rekayasa Sistem komputer </option>
                </select>
                </td>
			</tr>
			<tr>
				<td>alamat :</td>
				<td><textarea class="form-control" name="alamat" cols="20" rows="15"></textarea></td>
			</tr>
			<tr>
            <td>No_telp :</td>
			<td><input class="form-control" type="text" name="no_telp"></td>
			</tr>
			<tr colspan="2" align="center">
                <td><input class="btn btn-success" type="submit" name="simpan" value="SIMPAN"></td>
                <td><input class="btn btn-primary" type="reset" name="cencel" value="URUNG"></td>
			</tr>
</div>
	</form>
<table border="1" cellspacing="0" class="table">
</tr>	

                <tr>
					<td>NIM</td>
					<td>NAMA</td>
					<td>FAKULTAS</td>
					<td>PRODI</td>
					<td>ALAMAT</td>
                    <td>NO_TELP</td>
                    <td>OPSI</td>
				</tr>
<?php

$sql= "SELECT * FROM mahasiswa";
$data = $database->query($sql);
?>


<?php if ($data->num_rows > 0) {
		// jika data benar
		while($row = $data->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['nim']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['fakultas']; ?></td>
					<td><?php echo $row['prodi']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['no_telp']; ?></td>
                    <td><a class="btn btn-danger"href="delete_mahasiswa.php?nim=<?php echo"$row[nim]";?>">DELETE</a></td>

					
				</tr>
			
	<?php 	}?>
	</table>
	<?php } else {
		// jika data salah
		echo "data kosong";
	} ?>