<!DOCTYPE html>
<html lang="en-US">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>scadaLIB :: Aplikasi Perpustakaan SMK N 2 Kuningan</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<style>
	.login{
		text-align:right;
		font-size:12px;
	}
	.login a{
		text-decoration:underline;
	}
	h2{
		text-align:center;
		font-weight:bold;
		margin-bottom:30px;
	}
	.footer{
		margin-top:50px;
		text-align:center;
		color:blue;
		font-size:9pt;
	}
	.blue{
		font-family:"Arial Black";
		font-size:60pt;
		color:blue;
	}
	.green{
		font-family:"Arial Black";
		font-size:50pt;
		color:green;
	}
	.yellow{
		font-family:"Arial Black";
		font-size:40pt;
		color:yellow;
	}
	.red{
		font-family:"Arial Black";
		font-size:30pt;
		color:red;
	}
	</style>
  </head>
<body>
	<div class="container">
	<div class="login">
	<a href="login.php">Login</a>
	</div>
	<h2>
	<span class="blue">S</span>
	<span class="green">C</span>
	<span class="yellow">A</span>
	<span class="red">D</span>
	<span class="red">A</span>
	<span class="yellow">L</span>
	<span class="green">I</span>
	<span class="blue">B</span>
	</h2>

	<form class="form-horizontal" method="POST">
	<div class="form-group">
		<div class="col-sm-12">
			<div class="input-group">
			<input type="text" name="kata_kunci" class="form-control" placeholder="Masukan bagian dari judul buku, pengarang buku sebagai kata kunci" autofocus autocomplete="off">
			<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
			</span>			
			</div>
		</div>
	</div>
	</form>

	<?php
	if(isset($_POST['kata_kunci'])){
	$kata_kunci=$_POST['kata_kunci'];
	include('koneksi.php');		
	$sql_buku=mysqli_query($konek,"
	SELECT tbl_buku.*,tbl_pengarang.nama_pengarang,
	tbl_penerbit.nama_penerbit,
	tbl_kategori.nama_kategori
	FROM tbl_buku 
	JOIN tbl_pengarang ON tbl_pengarang.kode_pengarang=tbl_buku.kode_pengarang 
	JOIN tbl_penerbit ON tbl_penerbit.kode_penerbit=tbl_buku.kode_penerbit 
	JOIN tbl_kategori ON tbl_kategori.kode_kategori=tbl_buku.kode_kategori
	WHERE tbl_buku.judul_buku LIKE '%$kata_kunci%' 
	OR tbl_pengarang.nama_pengarang LIKE  '%$kata_kunci%'
	") or die (mysqli_error($konek));

	echo '<p>Ditemukan <b>'.mysqli_num_rows($sql_buku).' buku</b> yang mengandung kata kunci <b>'.$kata_kunci.'</b>';

		while($data_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC)){
		echo '
		<p><b><u><font color="blue">'.$data_buku['judul_buku'].'</font></u></b>
		<br/>
		<small>Pengarang : '.$data_buku['nama_pengarang'].' -- Penerbit :'.$data_buku['nama_penerbit'].' -- Tahun Terbit : '.$data_buku['tahun_terbit'].' -- Tersedia : '.$data_buku['jumlah_buku'].' eksemplar</small>
		</p>';		
		}	
	}
	?>
	
	<p class="footer">Powered By RPL SMK N 2 Kuningan</p>
	</div>
</body>  
</html>