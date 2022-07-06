<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_kategori=$_POST['kode'];
$nm_kategori=$_POST['kategori'];
$deskripsi=$_POST['deskripsi'];

$sql_simpan_kategori=mysqli_query($konek,"UPDATE tbl_kategori SET nama_kategori='$nm_kategori',deskripsi_kategori='$deskripsi' WHERE kode_kategori='$kd_kategori'") or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=kategori_list">
</div>';

?>