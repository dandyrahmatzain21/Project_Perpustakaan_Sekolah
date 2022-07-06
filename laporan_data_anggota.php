<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h3 align="center">Laporan Data Anggota
					<br/>Bulan <?php echo date('M Y');?></h3>

<p><a href="" class="tombol" OnClick="javascript:window.open('cetak_laporan_data_anggota.php','_blank','width=800,height=800,scrollbars=no,status=no,resizable=yes,screenx=100,screeny=100')" style="text-decoration:none;"> Cetak</a></p>

<table class="data">
	<thead>
		<tr>
			<td>No.</td>
			<td>Kode</td>
			<td>Nama Lengkap</td>
			<td>Tempat, Tanggal Lahir</td>
			<td>L/P</td>
			<td>Alamat</td>
			<td>No. Telepon</td>
			<td>Tanggal Daftar</td>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql_anggota=mysqli_query($koneksi,"SELECT * FROM tbl_anggota");
	$no_urut=null;
	while($data_anggota=mysqli_fetch_array($sql_anggota,MYSQLI_ASSOC)){												
	$no_urut++;
	echo '
	<tr>
		<td>'.$no_urut.'</td>
		<td>'.$data_anggota['kode_anggota'].'</td>
		<td>'.$data_anggota['nama_anggota'].'</td>
		<td>'.$data_anggota['tempat_lahir'].', '.$data_anggota['tanggal_lahir'].'</td>
		<td>'.$data_anggota['jk_anggota'].'</td>
		<td>'.$data_anggota['alamat_anggota'].'</td>
		<td>'.$data_anggota['tlp_anggota'].'</td>	
		<td>'.$data_anggota['tanggal_daftar'].'</td>
	</tr>';
	}
	?>
	</tbody>
</table>
