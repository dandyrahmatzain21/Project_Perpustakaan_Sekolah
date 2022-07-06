<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Daftar Pengarang</h2>
<p>Berikut adalah daftar pengarang yang sudah terdaftar di database perpustakaan SMKN 2 Kuningan</p>
<p><a href="index.php?file=pengarang_tambah" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a></p>

<div class="table-responsive">
<table class="table table-bordered tabel-hover">
	<thead>
		<tr>
			<th>No </th>
			<th>Kode</th>
			<th>Nama pengarang</th>
			<th>Email</th>
			<th colspan="2">Website</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql_pengarang=mysqli_query($konek,"SELECT * FROM tbl_pengarang");
		$no_urut=null;
		while($data_pengarang=mysqli_fetch_array($sql_pengarang,MYSQLI_ASSOC)){
			$no_urut++;

			echo '<tr>
			<td>'.$no_urut.'</td>
			<td><a href="index.php?file=pengarang_edit&kode='.$data_pengarang['kode_pengarang'].'">'.$data_pengarang['kode_pengarang'].'</a></td>
			<td>'.$data_pengarang['nama_pengarang'].'</td>
			<td>'.$data_pengarang['email_pengarang'].'</td>
			<td>'.$data_pengarang['website_pengarang'].'</td>
			<td align="center"><a onclick="return window.confirm(\'yakin data ini di hapus?\')" href="index.php?file=pengarang_hapus&kode='.$data_pengarang['kode_pengarang'].'"
			class="tombol"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
			</tr>';
		}
		?>
	</tbody>
</table>