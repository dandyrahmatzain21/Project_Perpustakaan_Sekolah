<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pencarian Data Peminjaman Buku</title>

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
<h2>Pencarian Data Peminjaman Buku</h2>
<form class="form-horizontal" method="POST">
	<div class="form-group">
	<label class="col-sm-3">Kata Kunci</label>
		<div class="col-sm-9">
			<div class="input-group">
			<input type="text" name="kata_kunci" class="form-control" placeholder="Masukan bagian dari judul buku sebagai kata kunci" autofocus autocomplete="off">
			<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>			</span>
			</div>
		</div>
	</div>
</form>

<div class="table-responsive">
<table class="table table-bordered table-hover">	
	<thead>
		<tr>
			<th>No. </th>
			<th>Kode Anggota</th>
			<th>Nama Anggota</th>
			<th>Judul Buku</th>
			<th>Pilih</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(isset($_POST['kata_kunci'])){
		$kata_kunci=$_POST['kata_kunci'];
		
		include('koneksi.php');
		include('konstanta.php');
		
		$sql_data_pinjaman=mysqli_query($konek,"SELECT tbl_peminjaman.kode_pinjaman,tbl_peminjaman.kode_anggota,tbl_anggota.nama_anggota,
			tbl_peminjaman.kode_buku,tbl_buku.judul_buku,tbl_peminjaman.tgl_harus_kembali,
			if(datediff(now( ) , tbl_peminjaman.tgl_harus_kembali)<=0,0,datediff(now( ) , tbl_peminjaman.tgl_harus_kembali) ) telat_pengembalian FROM tbl_peminjaman 
			JOIN tbl_anggota ON tbl_anggota.kode_anggota=tbl_peminjaman.kode_anggota 
			JOIN tbl_buku ON tbl_buku.kode_buku=tbl_peminjaman.kode_buku where tbl_peminjaman.kembali='T'
			and tbl_anggota.nama_anggota like '%$kata_kunci%' or tbl_buku.judul_buku like '%$kata_kunci%'");
		$no_urut=null;
		while($data_pinjaman=mysqli_fetch_array($sql_data_pinjaman,MYSQLI_ASSOC)){
			$no_urut++;
			echo '<tr>
				<td align="right">'.$no_urut.'</td>
				<td align="center">'.$data_pinjaman['kode_anggota'].'</td>
				<td>'.$data_pinjaman['nama_anggota'].'</td>
				<td>'.$data_pinjaman['judul_buku'].'</td>
				<td align="center"><a href="javascript:KosongkanForm();InsertKodePinjaman(\''.$data_pinjaman['kode_pinjaman'].'\');;
				InsertKodeAnggota(\''.$data_pinjaman['kode_anggota'].'\');InsertNamaAnggota(\''.$data_pinjaman['nama_anggota'].'\');
				InsertKodeBuku(\''.$data_pinjaman['kode_buku'].'\');InsertJudulBuku(\''.$data_pinjaman['judul_buku'].'\');
				InsertTglKembali(\''.$data_pinjaman['tgl_harus_kembali'].'\');InsertTelatKembali(\''.$data_pinjaman['telat_pengembalian'].'\');
				InsertJmlDenda(\''.number_format($data_pinjaman['telat_pengembalian']*tarif_denda,0,',','.').'\');">
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
		function InsertKodePinjaman(kode){
			opener.document.forms['f_pengembalian'].kode_pinjaman.value+=kode;
				window.close();
		}
		function InsertKodeAnggota(kode){
			opener.document.forms['f_pengembalian'].kode_anggota.value+=kode;
				window.close();
		}
		function InsertNamaAnggota(nama){
			opener.document.forms['f_pengembalian'].nama_anggota.value+=nama;
			window.close();
		}
		function InsertKodeBuku(kode){
			opener.document.forms['f_pengembalian'].kode_buku.value+=kode;
				window.close();
		}
		function InsertTelatKembali(hari){
			opener.document.forms['f_pengembalian'].telat_kembali.value+=hari;
				window.close();
		}
		function InsertTglKembali(tgl){
			opener.document.forms['f_pengembalian'].tgl_harus_kembali.value+=tgl;
				window.close();
		}
		function InsertJudulBuku(judul){
			opener.document.forms['f_pengembalian'].judul_buku.value+=judul;
				window.close();
		}
		function InsertJmlDenda(denda){
			opener.document.forms['f_pengembalian'].besar_denda.value+=denda;
				window.close();
		}
		function KosongkanForm(){
			opener.document.forms['f_pengembalian'].kode_pinjaman.value="";
			opener.document.forms['f_pengembalian'].kode_anggota.value="";
			opener.document.forms['f_pengembalian'].nama_anggota.value="";
			opener.document.forms['f_pengembalian'].kode_buku.value="";
			opener.document.forms['f_pengembalian'].judul_buku.value="";
			opener.document.forms['f_pengembalian'].tgl_harus_kembali.value="";
			opener.document.forms['f_pengembalian'].telat_kembali.value="";
			opener.document.forms['f_pengembalian'].besar_denda.value="";
		}
	</script>


</body>
</html>