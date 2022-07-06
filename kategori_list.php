<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Daftar Kategori</h2>
<p>Berikut adalah daftar kategori yang sudah terdaftar di database perpustakaan SMKN 2 Kuningan</p>
<p><a href="index.php?file=kategori_tambah" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a></p>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No </th>
			<th>Kode</th>
			<th>Nama kategori</th>
			<th colspan="2">Deskripsi kategori</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql_kategori=mysqli_query($konek,"SELECT * FROM tbl_kategori");
		$no_urut=null;
		while($data_kategori=mysqli_fetch_array($sql_kategori,MYSQLI_ASSOC)){
			$no_urut++;

			echo '<tr>
			<td align="center">'.$no_urut.'</td>
			<td><a href="index.php?file=kategori_edit&kode='.$data_kategori['kode_kategori'].'">'.$data_kategori['kode_kategori'].'</a></td>
			<td>'.$data_kategori['nama_kategori'].'</td>
			<td>'.$data_kategori['deskripsi_kategori'].'</td>
			<td align="center" width="5%"><a onclick="return window.confirm(\'yakin data ini di hapus?\')" href="index.php?file=kategori_hapus&kode='.$data_kategori['kode_kategori'].'"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
			</tr>';
		}
		?>
	</tbody>
</table>
</div>