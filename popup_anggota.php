<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cari Anggota</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="bootstrap/css/loader.css" rel="stylesheet">
	<style>
	.container{
	padding-top:0px;	
	}

	table{
	font-size:12px;	
	}
	
	th{
		text-align:center;
		color:#FFFFFF;
		background-color:#000000;
		opacity:0.4;
	}
	</style>
</head>
<body class="container">
<h2>Pencarian Data Anggota</h2>

<form class="form-horizontal" method="POST">
	<div class="form-group">
	<label class="col-sm-3">Kata Kunci</label>
		<div class="col-sm-9">
			<div class="input-group">
			<input type="text" name="nama_anggota" class="form-control" placeholder="Masukan bagian dari nama sebagai kata kunci" autofocus autocomplete="off">
			<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
			</span>			
			</div>
		</div>
	</div>
</form>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead class="table-heading">
		<tr>
			<th>No. </th>
			<th>No.  Anggota</th>
			<th>Nama Anggota</th>
			<th>Jumlah<br/>Peminjaman</th>
			<th>Pilih</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(isset($_POST['nama_anggota'])){
		
		include('koneksi.php');
		$nama_anggota=$_POST['nama_anggota'];
		
		$sql_anggota=mysqli_query($konek,"SELECT tbl_anggota.nama_anggota, tbl_anggota.kode_anggota FROM tbl_anggota
		WHERE tbl_anggota.nama_anggota like '%$nama_anggota%'");
		$no_urut=null;
		
		while($data_anggota=mysqli_fetch_array($sql_anggota,MYSQLI_ASSOC)){
			$no_urut++;
			$sql_cek_buku_masih_dipinjam=mysqli_query($konek,"SELECT count(kode_buku) as jml_buku_dipinjam FROM tbl_peminjaman where
				kode_anggota='".$data_anggota['kode_anggota']."' AND kembali='T'") or die (mysqli_error($konek));
			$cek_buku_masih_dipinjam=mysqli_fetch_array($sql_cek_buku_masih_dipinjam,MYSQLI_ASSOC);
			echo '<tr>
			<td align="right">'.$no_urut.'</td>
			<td align="center">'.$data_anggota['kode_anggota'].'</td>
			<td>'.$data_anggota['nama_anggota'].'</td>
			<td align="center">'.$cek_buku_masih_dipinjam['jml_buku_dipinjam'].'</td>
			<td align="center">';
			if($cek_buku_masih_dipinjam['jml_buku_dipinjam']<3)
			{
			echo '<a href="javascript:KosongkanForm();InsertKodeAnggota(\''.$data_anggota['kode_anggota'].'\');
			InsertNamaAnggota(\''.$data_anggota['nama_anggota'].'\');">
			<span class="glyphicon glyphicon-ok"></span>
			</a>';
			}
			echo '</td>
			</tr>';
			}
		}
		?>
	</tbody>
</table>
</div>

<button class="btn btn-warning"  OnClick="javascript:window.close()"><span class="glyphicon glyphicon-remove-sign"></span> Tutup</button>



<script type="text/javascript">
		function InsertKodeAnggota(kode){
			opener.document.forms['form_pinjam'].kode_anggota.value+=kode;
				window.close();
		}
		function InsertNamaAnggota(nama){
			opener.document.forms['form_pinjam'].nama_anggota.value+=nama;
				window.close();
		}
		function KosongkanForm(){
			opener.document.forms['form_pinjam'].kode_anggota.value="";
			opener.document.forms['form_pinjam'].nama_anggota.value="";
		}
	</script>
	
</body>
</html>