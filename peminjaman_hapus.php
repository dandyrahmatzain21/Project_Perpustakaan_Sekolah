<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode_nya=$_GET['kode'];
$kode_buku=$_GET['buku'];

$sql_hapus_peminjaman=mysqli_query($konek,"DELETE FROM tbl_peminjaman WHERE kode_pinjaman='$kode_nya'");

$sql_update_jml_buku=mysqli_query($konek,"UPDATE tbl_buku SET jumlah_buku=jumlah_buku+1 WHERE kode_buku='$kode_buku'");

echo '
<div style="text-align:center"><p>Sedang menghapus data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=peminjaman_list">
</div>';

?>