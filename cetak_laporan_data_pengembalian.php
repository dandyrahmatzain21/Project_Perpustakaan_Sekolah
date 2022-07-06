<html>
<head>
<title>Laporan Pengembalian Buku Tahun <?php echo $_GET['tahun'];?></title>
<style>
body,table{
background-color:#E5E5E5;	
font-size:11px;	
font-family:verdana
}

h3{
text-align:center;
}

table{
width:100%;
background-color:#dedede;
border:1px solid black;	
}

thead{
background-color:black;	
color:white;	
}

th,td{
padding:0px;	
}

</style>
</head>
<body OnLoad="window.print();window.close();">
<?php
include('koneksi.php');
?>
<h3>Laporan Data Daftar Pengembilan Buku
<br/>
Tahun <?php echo $_GET['tahun'];?></h3>

<table class="data">
	<tr>
		<th width="5%">No.</th>
		<th width="10%">Kode Anggota</th>
		<th>Nama Anggota</th>
		<th width="10%">Kode Buku</th>
		<th>Judul Buku</th>
		<th width="10%">Tgl. Harus Kembali</th>
		<th width="10%">Tgl. Pengembalian</th>
		<th width="10%">Telat</th>
		<th width="10%">Denda (Rp.)</th>
	</tr>
<?php

	$tgl_sekarang=date('Y-m-d');
	$sql_peminjaman=mysqli_query($koneksi,"SELECT tbl_pengembalian.kode_pengembalian,
	tbl_pengembalian.kode_anggota,
	tbl_pengembalian.kode_buku,
	tbl_peminjaman.tgl_pinjaman,
	tbl_peminjaman.tgl_harus_kembali,
	tbl_pengembalian.tgl_kembali,
	tbl_pengembalian.kode_pinjaman,
	tbl_buku.judul_buku,
	tbl_anggota.nama_anggota,
	tbl_pengembalian.jml_hari_telat,
	tbl_pengembalian.besar_denda 
	FROM tbl_pengembalian 
	JOIN tbl_anggota ON tbl_anggota.kode_anggota=tbl_pengembalian.kode_anggota
	JOIN tbl_buku ON tbl_buku.kode_buku=tbl_pengembalian.kode_buku
	JOIN tbl_peminjaman ON tbl_peminjaman.kode_pinjaman=tbl_pengembalian.kode_pinjaman
	WHERE year(tbl_pengembalian.tgl_kembali)='$_GET[tahun]' AND tbl_peminjaman.kembali='Y'
	ORDER BY tbl_pengembalian.kode_pengembalian DESC") or die(mysqli_error($koneksi));
	$no_urut=null;
	$total_denda=null;
	while($data_peminjaman=mysqli_fetch_array($sql_peminjaman,MYSQLI_ASSOC)){												
	$no_urut++;
	$total_denda=$total_denda+$data_peminjaman['besar_denda'];
	echo '
	<tr>
		<td align="center">'.$no_urut.'</td>
		<td align="center">'.$data_peminjaman['kode_anggota'].'</td>
		<td>'.$data_peminjaman['nama_anggota'].'</td>
		<td align="center">'.$data_peminjaman['kode_buku'].'</td>
		<td>'.$data_peminjaman['judul_buku'].'</td>
		<td align="center">'.$data_peminjaman['tgl_harus_kembali'].'</td>
		<td align="center">'.$data_peminjaman['tgl_kembali'].'</td>
		<td align="center">'.$data_peminjaman['jml_hari_telat'].' hari</td>
		<td align="center">'.number_format($data_peminjaman['besar_denda'],0,',','.').'</td>
	</tr>
	';
	}

?>	
<tr><th colspan="8">Jumlah penerimaan denda hari ini</th><th><?php echo number_format($total_denda,0,',','.');?></th><th></th></tr>

</table>

</body>
</html>
