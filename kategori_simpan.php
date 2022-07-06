<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_kategori=$_POST['kode'];
$nm_kategori=$_POST['kategori'];
$deskripsi=$_POST['deskripsi'];

$sql_simpan_kategori=mysqli_query($konek,"INSERT INTO tbl_kategori (kode_kategori,nama_kategori,deskripsi_kategori)
VALUES ('$kd_kategori','$nm_kategori','$deskripsi')") or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=kategori_list">
</div>';

?>