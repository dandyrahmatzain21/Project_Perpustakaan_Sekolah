<?php
include('koneksi.php');
include('konstanta.php');
?>
<!DOCTYPE html>
<html>
	<head>
	<title><?php echo nama_aplikasi;?></title>
	<link href="style.css" rel="stylesheet"/>
	</head>
<body>
<p align="right"><a href="login.php" style="font-family:arial;font-size:14px;text-decoration:none;">.:: Login ::.</a></p>
<h3 align="center" style="margin-top:100px">Pencarian Buku</h3>
<form>
<p align="center"><input type="text" name="kata_kunci" placeholder="Masukan judul, pengarang atau kata kunci pencarian" size="70px"/>
<br/><br/>
<input type="submit" name="t_cari" value="Cari !"/>
</p>

</form>
</body>
</html>
