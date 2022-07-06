<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Daftar Penerbit</h2>
<p>Berikut adalah daftar penerbit yang sudah terdaftar di database perpustakaan SMKN 2 Kuningan</p>

<p><a href="index.php?file=penerbit_tambah" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a></p>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No </th>
			<th>Kode</th>
			<th>Nama penerbit</th>
			<th>Alamat penerbit</th>
			<th>Telp/Fax</th>
			<th>Email</th>
			<th colspan="2">Website</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql_penerbit=mysqli_query($konek,"SELECT * FROM tbl_penerbit");
		$no_urut=null;
		while($data_penerbit=mysqli_fetch_array($sql_penerbit,MYSQLI_ASSOC)){
			$no_urut++;

			echo '<tr>
			<td>'.$no_urut.'</td>
			<td><a href="index.php?file=penerbit_edit&kode='.$data_penerbit['kode_penerbit'].'">'.$data_penerbit['kode_penerbit'].'</a></td>
			<td>'.$data_penerbit['nama_penerbit'].'</td>
			<td>'.$data_penerbit['alamat_penerbit'].'</td>
			<td>'.$data_penerbit['telp_fax'].'</td>
			<td>'.$data_penerbit['email'].'</td>
			<td>'.$data_penerbit['website'].'</td>
			<td align="center"><a onclick="return window.confirm(\'yakin data ini di hapus?\')" href="index.php?file=penerbit_hapus&kode='.$data_penerbit['kode_penerbit'].'"
			class="tombol"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
			</tr>';
		}
		?>
	</tbody>
</table>
</div>
