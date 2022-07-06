<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

// ini untuk menyimpan gambar
$target_folder="cover/";
$target_file=$target_folder . basename($_FILES["cover_buku"]["name"]);

move_uploaded_file($_FILES["cover_buku"]["tmp_name"],$target_file);


// ini untuk menampung data
$kode_buku=$_POST['kode_buku'];
$kode_kategori=$_POST['kode_kategori'];
$kode_pengarang=$_POST['kode_pengarang'];
$kode_penerbit=$_POST['kode_penerbit'];
$judul_buku=$_POST['judul_buku'];
$tahun_terbit=$_POST['tahun_terbit'];
$jumlah_buku=$_POST['jumlah_buku'];
$tgl_diterima=$_POST['tgl_diterima'];
$file_cover=basename($_FILES["cover_buku"]["name"]);

// ini untuk menyimpan ke database
mysqli_query($konek,"INSERT INTO tbl_buku (kode_buku,kode_kategori,kode_pengarang,kode_penerbit,judul_buku,tahun_terbit,jumlah_buku,
tgl_diterima,file_cover) Values ('$kode_buku','$kode_kategori','$kode_pengarang','$kode_penerbit','$judul_buku','$tahun_terbit',
'$jumlah_buku','$tgl_diterima','$file_cover')") or die (mysqli_error($konek));

// untuk balik ke tampilan awal

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=buku_list">
</div>';

?>
