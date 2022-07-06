<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode_buku=$_POST['kode_buku'];
$kode_kategori=$_POST['kode_kategori'];
$kode_pengarang=$_POST['kode_pengarang'];
$kode_penerbit=$_POST['kode_penerbit'];
$judul_buku=$_POST['judul_buku'];
$tahun_terbit=$_POST['tahun_terbit'];
$jumlah_buku=$_POST['jumlah_buku'];
$tgl_diterima=$_POST['tgl_diterima'];

mysqli_query($konek,"UPDATE tbl_buku SET kode_kategori='$kode_kategori',
kode_pengarang='$kode_pengarang',kode_penerbit='$kode_penerbit',judul_buku='$judul_buku',
tahun_terbit='$tahun_terbit',jumlah_buku='$jumlah_buku',tgl_diterima='$tgl_diterima' where kode_buku='$kode_buku'") or die
(mysqli_error($konek));

echo '<meta http-equiv="refresh" content="5;url=index.php?file=buku_list">';
?>