<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode_nya=$_GET['kode'];
$kode_buku=$_GET['buku'];
$kode_pinjaman=$_GET['pinjaman'];

$sql_hapus_pengembalian=mysqli_query($konek,"DELETE FROM tbl_pengembalian where kode_pengembalian='$kode_nya'");
$sql_update_jml_buku=mysqli_query($konek,"UPDATE tbl_buku SET jumlah_buku=jumlah_buku-1 where kode_buku='$kode_buku'");
$sql_update_kembali=mysqli_query($konek,"UPDATE tbl_peminjaman SET kembali='T' WHERE kode_pinjaman='$kode_pinjaman'");

echo '
<div style="text-align:center"><p>Sedang menghapus data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=pengembalian_list">
</div>';

?>