<div class="col-sm-12" style="padding-top: 20px">
	<a href="../karyawan/index.php?p=karyawan" class="btn btn-danger"><img src="icons/gear.svg"> List Data</a>
	<h2>Entri Karyawan</h2><hr>

	<form role="form" method="POST" action="">
		<div class="form-group">
			<label>NIK</label>
			<input type="number" name="nik" class="form-control" placeholder="Nomor Induk Keluarga">
		</div>
		<div class="form-group">
			<label>Nama Karyawan</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Karyawan">
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
			<textarea name="alamat" class="form-control" rows="5"></textarea>
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
			</select>
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</form>
	<?php
        include ("koneksi.php");
		if (isset($_POST['submit'])) {
			$simpan=mysqli_query($database,"INSERT INTO karyawan (nik,nama_lengkap,jenis_kelamin,tanggal_lahir,alamat,negara) 
									VALUES(
											'$_POST[nik]','$_POST[nama_lengkap]','$_POST[jenis_kelamin]','$_POST[tanggal_lahir]',
											'$_POST[alamat]','$_POST[negara]')"
									);
			if ($simpan) 
			echo "<script>window.location='index.php?p=karyawan'</script>";
		}
	?>
</div>