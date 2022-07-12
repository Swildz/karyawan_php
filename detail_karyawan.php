<?php
    if(isset($_GET['nik'])){
        $nik =$_GET['nik'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    $query    =mysqli_query($database, "SELECT * FROM karyawan WHERE nik='$nik'");
    $result    =mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Script PHP untuk Menampilkan Data dari Database Derdasarkan Id</title>
</head>
<body>
    <h2>Detail Data Karyawan</h2>
    <p><i>Note: Dibawah ini adalah detail informasi karyawan berdasarkan nik</i> <b><?php echo $nik?></b></p>
    <table border="0" cellpadding="4">
        <tr>
            <td size="90">NIK</td>
            <td>: <?php echo $result['nik']?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>: <?php echo $result['nama_lengkap']?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?php echo $result['jenis_kelamin']?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>: <?php echo $result['tanggal_lahir']?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?php echo $result['alamat']?></td>
        </tr>
        <tr>
            <td>Negara</td>
            <td>: <?php echo $result['negara']?></td>
        </tr>
        <tr height="40">
            <td></td>
            <td>   <a href="./">Back</a></td>
        </tr>
    </table>
</body>
</html>