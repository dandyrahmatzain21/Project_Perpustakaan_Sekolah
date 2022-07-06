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
<h3 align="center">Laporan Data Buku
					<br/>Bulan <?php echo date('M Y');?></h3>
<p>

<table>
<thead>
	<tr>
		<th>No</th>
		<th>Kode Buku</th>
		<th>Judul Buku</th>
		<th>Pengarang</th>
		<th>Penerbit</th>
		<th>Kategori</th>
		<th>Jml. Eks.</th>
		<th>Tgl. Terima</th>
	</tr>
</thead>
<tbody>
<?php
	$sql_buku=mysqli_query($koneksi,"SELECT 
	tbl_buku.*,
	tbl_pengarang.nama_pengarang,
	tbl_penerbit.nama_penerbit,
	tbl_kategori.nama_kategori
	FROM tbl_buku
	JOIN tbl_pengarang ON tbl_pengarang.kode_pengarang=tbl_buku.kode_pengarang
	 JOIN tbl_penerbit ON tbl_penerbit.kode_penerbit=tbl_buku.kode_penerbit 
	JOIN tbl_kategori ON tbl_kategori.kode_kategori=tbl_buku.kode_kategori
	") or die (mysqli_error($koneksi));
	$no_urut=null;
	while($data_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC)){												
	$no_urut++;
	
	echo '
					<tr>
					<td>'.$no_urut.'</td>
					<td align="center">'.$data_buku['kode_buku'].'</td>
					<td>'.$data_buku['judul_buku'].'</td>
					<td>'.$data_buku['nama_pengarang'].'</td>
					<td>'.$data_buku['nama_penerbit'].'</td>
					<td>'.$data_buku['kode_kategori'].' - '.$data_buku['nama_kategori'].'</td>
					<td align="center">'.$data_buku['jumlah_buku'].'</td>
					<td>'.$data_buku['tgl_diterima'].'</td>
					</tr>
	';
	}
?>	
</tbody>
</table>
</body>
</html>
