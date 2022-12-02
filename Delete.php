<?php
    $database = new mysqli('localhost','root','','akademik');
    if($database->connect_errno) {
        echo"Database Tidak Dapat Terhubung";
    } 
    $sql ="DELETE FROM  mahasiswa where nim =('$_GET[nim]')";
    $data=$database->query($sql);
    header("location:tampil1.php");
?>    