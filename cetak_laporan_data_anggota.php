<html>
<head>
<title>Laporan Data Anggota</title>
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

<h3 align="center">Laporan Data Anggota
					<br/>Bulan <?php echo date('M Y');?></h3>

<table>
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

</body>
</html>
