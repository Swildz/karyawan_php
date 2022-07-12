<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title> Edit Karyawan </title>
</head>
<body>
<?php
	 include 'koneksi.php';
	 $ambil=mysqli_query($database,"SELECT * FROM karyawan WHERE nik='$_GET[nik]'");
	 $data=mysqli_fetch_array($ambil);
	 
	 ?>
<div class="col-sm-12" style="padding-top: 20px">
	<a href="../karyawan/index.php?p=karyawan" class="btn btn-danger"><img src="icons/gear.svg"> List Data</a>
	<h2>Edit Karyawan</h2><hr>

	<form role="form" method="POST" action="">
		<div class="form-group">
			<label>NIK</label>
			<input type="number" name="nik" class="form-control"  value="<?=$data['nik']?>">
		</div>
		<div class="form-group">
			<label>Nama Karyawan</label>
			<input type="text" name="nama_lengkap" class="form-control"  value="<?=$data['nama_lengkap']?>">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label><br>
            <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
        </div>
		<div class="form-group">
			<label>Tanggal Lahir</label> <br>
			<input type="date" name="tanggal_lahir" value="<?php echo date("d-m-Y"); ?>">
		</div>
		<div class="form-group">
			<label>Alamat</label>
            <input type="text" name="alamat" class="form-control"  value="<?=$data['alamat']?>">
		</div>
        <div class="form-group">
			<label>Negara</label>
			<select name="negara" class="form-control">
				<option value="" disabled>--negara asal--</option>
				<option value="ID">Indonesia</option>
				<option value="AR">Argentina</option>
                <option value="PT">Portugal</option>
				<option value="RU">Rusia</option>
                <option value="MY">Malaysia</option>
                value="<?=$data['negara']?>
			</select>
		</div>
		<button type="submit" class="btn btn-primary" name="edit_karyawan" value="Update">Simpan</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</form>
	<?php
		if (isset($_POST['edit_karyawan'])) {
			$update=mysqli_query($database,"UPDATE karyawan SET
                        		nik = '$_POST[nik]',
                                nama_lengkap ='$_POST[nama_lengkap]',
                                jenis_kelamin = '$_POST[jenis_kelamin]',
                                tanggal_lahir = '$_POST[tanggal_lahir]',
								alamat = '$_POST[alamat]',
                                negara = '$_POST[negara]'			
								WHERE nik = '$_GET[nik]'");
			if ($update) 
                header('location:../karyawan/index.php?p=karyawan');
		}
	?>
</div>
</body>
</html>