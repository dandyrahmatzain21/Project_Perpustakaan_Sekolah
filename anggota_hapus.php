<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
$kode=$_GET['kode'];
$sql_hapus_anggota=mysqli_query($konek,"DELETE FROM tbl_anggota where kode_anggota='$kode'");

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=anggota_list">
</div>';
?>