<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "laporan-stok-buku.xls"
header("Content-Disposition: attachment; filename=laporan-stok-buku.xls");
 
// memanggil file koneksi.php
include ('koneksi.php');

// memanggil file konstanta.php
include ('konstanta.php');

// memanggil file peminjaman_laporan.php
include ('buku_laporan_stok.php');

echo '
<p>Kuningan,'.date('d-M-Y').'<br/>Kepala Perpustakaan,
<br/>
<br/>
<br/>
<br/>Oyo Sunaryo, Drs.
</p>


';
?>
