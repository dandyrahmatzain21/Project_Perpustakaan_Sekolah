<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_pinjaman=$_POST['kode_pinjaman'];
$kd_anggota=$_POST['kode_anggota'];
$kd_buku=$_POST['kode_buku'];
$tanggal_kembali=$_POST['tgl_kembali'];
$tanggal_harus_kembali=$_POST['tgl_harus_kembali'];
$telat=$_POST['telat_kembali'];
$denda=str_replace('.', '', $_POST['besar_denda']);

//cek apakah form nya kosong ?? jika tidak
if($kd_anggota!=null){
//simpan pengembalian

$sql_simpan_pengembalian=mysqli_query($konek,"INSERT INTO tbl_pengembalian (kode_pinjaman,tgl_kembali,kode_anggota,kode_buku,jml_hari_telat,denda)
	VALUES ('$kd_pinjaman','$tanggal_kembali','$kd_anggota','$kd_buku','$telat','$denda')") or die (mysqli_error($konek));

	//ubah nilai jumlah buku ditabel buku ditambah 1, karena buku sudah dikembalikan
$sql_update_pengembalian=mysqli_query($konek,"UPDATE tbl_buku SET jumlah_buku=jumlah_buku+1 WHERE kode_buku='$kd_buku'");

//ubah status kembali menjadi T untuk buku yang dikembalikan
$sql_ubah_kembali=mysqli_query($konek,"UPDATE tbl_peminjaman SET kembali='Y' WHERE kode_pinjaman='$kd_pinjaman'") or die (mysqli_error($konek));


echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=pengembalian_list">
</div>';

} else {
	
echo '
<div class="alert alert-warning" style="text-align:center"><p>Form kosong, tidak ada data yang disimpan ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=pengembalian_list">
</div>';
	
	
}
?>