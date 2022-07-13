<?php 
include 'koneksi.php';
?>

<a href="./" class="btn btn-secondary">Back</a><br>
<h2>Form Pencarian</h2>
<form action="search_karyawan.php" method="get">
 <label>Nik :</label><br>
 <input type="number" name="cari_nik"><br>
 <label>Nama Lengkap :</label><br>
 <input type="text" name="cari_nama"><br>
 <input type="submit" value="Pencarian">
</form>
 
<?php 
if(isset($_GET['cari_nik']) && ($_GET['cari_nama'])){
 $cari_nik = $_GET['cari_nik'];
 $cari_nama = $_GET['cari_nama'];
 echo "<b>Hasil pencarian : <br>".$cari_nik." <br> ".$cari_nama." </b>";
}
?>
    <p>
    <table class="table table-hover table-bordered table-hover" id="dataTables-example">
        <thead class="table-info" disabled>
                <tr class="text-center">
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Negara</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_GET['cari_nik']) && ($_GET['cari_nama'])){
                $cari_nik = $_GET['cari_nik'];
                $cari_nama = $_GET['cari_nama'];
                $data = mysqli_query($database,"select * from karyawan where nik like '%".$cari_nik."%' union select * from karyawan where nik like '%".$cari_nama."%'");
                }else{
                $data = mysqli_query($database,"select * from karyawan");  
                }
                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>  
                <td align="center"><?php echo $no++; ?></td>
                <td class="text-center"><?php echo $d['nik']; ?></td>
                <td class="text-center"><?php echo $d['nama_lengkap']; ?></td>
                <td class="text-center"><?php echo $d['jenis_kelamin']; ?></td>
                <td class="text-center"><?php echo $d['tanggal_lahir']; ?></td>
                <td class="text-center"><?php echo $d['alamat']; ?></td>
                <td class="text-center"><?php echo $d['negara']; ?></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </p>
</div>
