<html>
<head>
<title>Laporan Data Buku</title>
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
<body onload="window.print();window.close();">
<?php
include('koneksi.php');
?>

<h3 align="center">Laporan Data Peminjaman Buku</h3>

<table>
	<tr>
		<th width="5%">No.</th>
		<th width="10%">Kode Anggota</th>
		<th>Nama Anggota</th>
		<th width="10%">Kode Buku</th>
		<th>Judul Buku</th>
		<th width="10%">Tgl. Pengembalian</th>
		<th width="10%">Telat</th>
	</tr>
<?php
	
	$tgl_sekarang=date('Y-m-d');
	$sql_peminjaman=mysqli_query($koneksi,"SELECT tbl_peminjaman.kode_pinjaman,
	tbl_peminjaman.kode_anggota,
	tbl_peminjaman.kode_buku,
	tbl_peminjaman.tgl_pinjaman,
	tbl_peminjaman.tgl_harus_kembali,
	tbl_buku.judul_buku,
	tbl_anggota.nama_anggota,
	datediff(now(),tbl_peminjaman.tgl_harus_kembali) as telat 
	FROM tbl_peminjaman 
	JOIN tbl_anggota ON tbl_anggota.kode_anggota=tbl_peminjaman.kode_anggota
	JOIN tbl_buku ON tbl_buku.kode_buku=tbl_peminjaman.kode_buku 
	WHERE tbl_peminjaman.kembali='T'
	ORDER BY tbl_peminjaman.kode_pinjaman DESC");
	$no_urut=null;
	while($data_peminjaman=mysqli_fetch_array($sql_peminjaman,MYSQLI_ASSOC)){												
	$no_urut++;
	
	echo '
	<tr>
		<td align="center">'.$no_urut.'</td>
		<td align="center">'.$data_peminjaman['kode_anggota'].'</td>
		<td>'.$data_peminjaman['nama_anggota'].'</td>
		<td align="center">'.$data_peminjaman['kode_buku'].'</td>
		<td>'.$data_peminjaman['judul_buku'].'</td>
		<td align="center">'.$data_peminjaman['tgl_harus_kembali'].'</td>
		<td align="center">'.$data_peminjaman['telat'].' hari</td>
	</tr>
	';
	}
?>	
</table>


</body>
</html>
