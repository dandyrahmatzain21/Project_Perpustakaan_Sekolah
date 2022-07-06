<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Data Anggota</h2>

<p>Berikut data anggota perpustakaan SMK Negeri 2 Kuningan, untuk menambah data klik tombol tambah, untuk menghapus klik tombol hapus,
gunakan tombol edit untuk mengubah data</p>

<p><a href="index.php?file=anggota_tambah" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Tambah</a></p>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Nama Lengkap</th>
		<th>Tempat,tanggal lahir</th>
		<th>Jenis Kelamin</th>
		<th>No. Telepon</th>
		<th>Alamat</th>
		<th colspan="2">Tanggal Daftar</th>
	</tr>
	</thead>
	<tbody>
		<?php
			$sql_anggota=mysqli_query($konek,"SELECT * FROM tbl_anggota");
			$no_urut=null;
			while($data_anggota=mysqli_fetch_array($sql_anggota,MYSQLI_ASSOC)){
				$no_urut++;
				if($data_anggota['jk_anggota']=='L'){$jk='Laki-laki';}else{$jk='Perempuan';}
				echo '<tr>
				<td>'.$no_urut.'</td>
				<td><a href="index.php?file=anggota_edit&kode='.$data_anggota['kode_anggota'].'">'.$data_anggota['kode_anggota'].'</td>
				<td>'.$data_anggota['nama_anggota'].'</td>
				<td>'.$data_anggota['tempat_lahir'].','.$data_anggota['tanggal_lahir'].'</td>
				<td>'.$jk.'</td>
				<td>'.$data_anggota['tlp_anggota'].'</td>
				<td>'.$data_anggota['alamat_anggota'].'</td>
				<td>'.$data_anggota['tanggal_daftar'].'</td>
				<td><a onclick="return window.confirm(\'yakin data ini dihapus?\')" href="index.php?file=anggota_hapus&kode='.$data_anggota['kode_anggota'].'" ><span class="glyphicon glyphicon-remove-sign"></span></a></td>
				</tr>';
			}
		?>
	</tbody>
</table>
</div>