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
<h2>Pencarian Data Buku</h2>
<form class="form-horizontal" method="POST">
	<div class="form-group">
	<label class="col-sm-3">Kata Kunci</label>
		<div class="col-sm-9">
			<div class="input-group">
			<input type="text" name="judul_buku" class="form-control" placeholder="Masukan bagian dari judul buku sebagai kata kunci" autofocus autocomplete="off">
			<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
			</span>
			</div>
		</div>
	</div>

</form>

<div class="table-responsive">
<table class="table table-bordered table-hover">	
	<thead>
		<tr>
			<th>No. </th>
			<th>Kode</th>
			<th>Judul</th>
			<th>Stok Buku</th>
			<th>Pilih</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(isset($_POST['judul_buku'])){
		include('koneksi.php');
		$judul_buku=$_POST['judul_buku'];
		
		$sql_buku=mysqli_query($konek,"SELECT * FROM tbl_buku where jumlah_buku>0 and judul_buku like '%$judul_buku%' ");
		$no_urut=null;
		while($data_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC)){
			$no_urut++;
			echo '<tr>
			<td>'.$no_urut.'</td>
			<td>'.$data_buku['kode_buku'].'</td>
			<td>'.$data_buku['judul_buku'].'</td>
			<td align="right">'.$data_buku['jumlah_buku'].' eks.</td>
			
			<td align="center" width="100px"><a href="javascript:KosongkanForm();InsertKodeBuku(\''.$data_buku['kode_buku'].'\');
			InsertJudulBuku(\''.$data_buku['judul_buku'].'\');">
			<span class="glyphicon glyphicon-ok"></span>
			</a></td>
			</tr>';
			}
		}
		?>
	</tbody>
</table>
</div>

<button class="btn btn-warning"  OnClick="javascript:window.close()"><span class="glyphicon glyphicon-remove-sign"></span> Tutup</button>


	<script type="text/javascript">
		function InsertKodeBuku(kode){
			opener.document.forms['form_pinjam'].kode_buku.value+=kode;
				window.close();
		}
		function InsertJudulBuku(nama){
			opener.document.forms['form_pinjam'].judul_buku.value+=nama;
				window.close();
		}
		function KosongkanForm(){
			opener.document.forms['form_pinjam'].kode_buku.value="";
			opener.document.forms['form_pinjam'].judul_buku.value="";
		}
	</script>
	
</body>
</html>