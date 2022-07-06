<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];
$sql_hapus_kategori=mysqli_query($konek,"DELETE FROM tbl_kategori where kode_kategori='$kode'");

echo '
<div style="text-align:center"><p>Sedang menghapus data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=kategori_list">
</div>';

?>