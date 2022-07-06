<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Daftar User</h2>

<p>Berikut daftar user perpustakaan SMK Negeri 2 Kuningan yang diberi hak untuk mengoperasikan aplikasi perpustakaan</p>

<p><a href="index.php?file=user_tambah" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span>  Tambah</a></p>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Lengkap</th>
		<th>Username</th>
		<th>Jenis User</th>
		<th>Email</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		<?php
			$sql_user=mysqli_query($konek,"SELECT * FROM tbl_user");
			$no_urut=null;
			while($data_user=mysqli_fetch_array($sql_user,MYSQLI_ASSOC)){
				$no_urut++;
				echo '<tr>
				<td align="center">'.$no_urut.'</td>
				<td><a href="index.php?file=user_edit&user='.$data_user['username'].'">'.$data_user['namauser'].'</td>
				<td>'.$data_user['username'].'</td>
				<td>'.$data_user['jenis_user'].'</td>
				<td>'.$data_user['email'].'</td>
				<td align="center"><a onclick="return window.confirm(\'yakin data ini dihapus?\')" href="index.php?file=user_hapus&user='.$data_user['username'].'" ><span class="glyphicon glyphicon-remove-sign"></span></a></td>
				</tr>';
			}
		?>
	</tbody>
</table>
</div>