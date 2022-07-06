<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];

$sql_buku=mysqli_query($konek,"SELECT * FROM tbl_buku where kode_buku='$kode'");
$detail_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC);

$file_cover=$detail_buku['file_cover'];

if(isset($file_cover)){
	unlink('cover/'.$file_cover);
}

$sql_hapus_buku=mysqli_query($konek,"DELETE FROM tbl_buku where kode_buku='$kode'");
echo '<meta http-equiv="refresh" content="1;url=index.php?file=buku_list">';
?>