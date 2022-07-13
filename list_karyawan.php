<div class="col-sm" style="padding-top: 20px">
    <h2>Search Karyawan</h2>
    <td align="center"><a href=?p=search_karyawan class="search"><img src="icons/search.svg"> Search Karyawan</a><br></td>
	<h2>List Karyawan</h2>
	<a href=?p=entri_karyawan class="btn btn-primary"><img src="icons/plus.svg"> Entri Karyawan</a><br>
	<p>
		<table class="table table-hover table-bordered table-hover" id="dataTables-example">
			<thead class="table-info" disabled>
				<tr class="text-center">
					<th>No</th>
					<th>NIK</th>
					<th>Nama Lengkap</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Negara</th>

					<?php
					if($_SESSION['level']=='administrator'){
						echo "<th>Aksi</th>";
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
					include 'koneksi.php';
					$no=1;
					$tampil=mysqli_query($database,"SELECT * FROM karyawan");
					while ($data=mysqli_fetch_array($tampil)) {
				?>
				<tr>
					<td align="center"><?php echo $no++,"."; ?></td>
					<td class="text-center"><?php echo $data['nik']; ?></td>
					<td><?php echo $data['nama_lengkap']; ?></td>
					<td class="text-center"><?php echo $data['tanggal_lahir'] ?></td>
					<td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
                    <td class="text-center"><?php echo $data['alamat'] ?></td>
					<td class="text-center"><?php echo $data['negara']; ?></td>
					<?php
					if($_SESSION['level']=='administrator'){
						?>
					<td class="text-center">
                        <a href="detail_karyawan.php?nik=<?php echo $data ['nik']; ?> ">detail</a> |
						<a href="edit_karyawan.php?nik=<?php echo $data['nik']; ?>"> <img src="icons/reply.svg"></a> |
						<a href="delete_karyawan.php?nik=<?php echo $data['nik']; ?>" onclick="return confirm('Yakin akan menghapus data ?');"><img src="icons/trash.svg"></a>
					</td> 
					<?php
					}
					?>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</p>
</div>