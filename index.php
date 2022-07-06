<?php
/*
// memulai session
session_start();
// jika belum login
if(!isset($_SESSION['jenis_user'])){
// maka arahkan ke cari.php
header('location:cari.php');
// kemudian keluar dari prosedur menjalankan baris program
exit;	
}*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>scadaLIB :: Aplikasi Perpustakaan SMK N 2 Kuningan</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="bootstrap/css/loader.css" rel="stylesheet">

  </head>

  <body>

<?php
include('konstanta.php');
include('array.php');
include('koneksi.php');
include('navigasi.php');
?>

    <div class="container">
      

		<?php
		if (isset($_GET['file'])){
			include($_GET['file'].'.php');
			}else{
			include('dashboard.php'); 
			}
		?>

    </div> <!-- /container -->


    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
