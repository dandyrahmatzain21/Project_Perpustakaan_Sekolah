<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Daftar Peminjaman Buku</h2>
<p>Berikut adalah daftar buku yang sedang di pinjam oleh anggota perpustakaan SMKN 2 Kuningan pada tanggal <b><?php echo date('d-M-Y');?></b></p>
<p><a href="index.php?file=peminjaman_tambah" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a></p>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
	<tr>
		<th>No</th>
		<th>Kode Anggota</th>
		<th>Nama Anggota</th>
		<th>Kode Buku</th>
		<th>Judul Buku</th>
		<th>Tgl. Kembali</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<body>
	<?php
	$tgl_sekarang=date('Y-m-d');
	$sql_peminjaman=mysqli_query($konek,"SELECT tbl_peminjaman.kode_pinjaman,tbl_peminjaman.kode_anggota,
	tbl_peminjaman.kode_buku,tbl_peminjaman.tgl_pinjaman,tbl_peminjaman.tgl_harus_kembali,tbl_buku.judul_buku,tbl_anggota.nama_anggota
	FROM tbl_peminjaman JOIN tbl_anggota ON tbl_anggota.kode_anggota=tbl_peminjaman.kode_anggota JOIN tbl_buku ON tbl_buku.kode_buku=
	tbl_peminjaman.kode_buku where tbl_peminjaman.tgl_pinjaman='$tgl_sekarang' AND tbl_peminjaman.kembali='T' ORDER BY
	tbl_peminjaman.kode_pinjaman DESC");
	$no_urut=null;
	while($data_peminjaman=mysqli_fetch_array($sql_peminjaman,MYSQLI_ASSOC)){
		$no_urut++;

		echo '<tr>
			<td>'.$no_urut.'</td>
			<td>'.$data_peminjaman['kode_anggota'].'</td>
			<td>'.$data_peminjaman['nama_anggota'].'</td>
			<td align="center">'.$data_peminjaman['kode_buku'].'</td>
			<td>'.$data_peminjaman['judul_buku'].'</td>
			<td align="center">'.$data_peminjaman['tgl_harus_kembali'].'</td>
			<td align="center"><a onclick="return window.confirm(\'yakin data ini dihapus?\')" href="index.php?file=peminjaman_hapus&kode=
			'.$data_peminjaman['kode_pinjaman'].'&buku='.$data_peminjaman['kode_buku'].'" class="tombol"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
			</tr>';
	}
	?>
	</body>
</table>
</div>