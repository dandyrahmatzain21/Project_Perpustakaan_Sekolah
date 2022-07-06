<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];
$sql_hapus_pengarang=mysqli_query($konek,"DELETE FROM tbl_pengarang where kode_pengarang='$kode'");

echo '
<div style="text-align:center"><p>Sedang menghapus data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=pengarang_list">
</div>';

?>