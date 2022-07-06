<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=laporan-peminjaman.xls");
 
// memanggil file koneksi.php
include ('koneksi.php');

// memanggil file konstanta.php
include ('konstanta.php');

// memanggil file peminjaman_laporan.php
include ('peminjaman_laporan.php');

echo '
<p>Kuningan,'.date('d-M-Y').'<br/>Kepala Perpustakaan,
<br/>
<br/>
<br/>
<br/>Oya Suryana, M.Kom.
</p>


';
?>
