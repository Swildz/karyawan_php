<?php
include 'koneksi.php';
    $hapus=mysqli_query($database, "delete from karyawan where nik = '$_GET[nik]'");
    if($hapus){
        header('location:../karyawan/index.php?p=karyawan');
    }
?>