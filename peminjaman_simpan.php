<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
$kode_anggota=$_POST['kode_anggota'];
$kode_buku=$_POST['kode_buku'];

$sql_simpan_peminjaman=mysqli_query($konek,"INSERT INTO tbl_peminjaman (kode_anggota,kode_buku,tgl_pinjaman,tgl_harus_kembali)
	VALUES ('$kode_anggota','$kode_buku',now(),date_add(now(),INTERVAL 3 DAY))") or die (mysqli_error($konek));

$sql_update_jml_buku=mysqli_query($konek,"UPDATE tbl_buku SET jumlah_buku=jumlah_buku-1 WHERE kode_buku='$kode_buku'");

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=peminjaman_list">
</div>';
?>