<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Laporan Stock Buku</h2>
<p>Berikut adalah laporan stok buku perpustakaan SMKN 2 Kuningan.</p>


<?php
if(isset($_GET['file'])){
?>
<p>
<a href="buku_laporan_stok_excel.php" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak</a>
<a href="buku_laporan_stok_excel.php" class="btn btn-warning"><span class="glyphicon glyphicon-cloud-download"></span> Download</a>
</p>
<?php
}
?>

<div class="table-responsive">
	<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No.</th>
			<th>Judul Buku</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Jml. Buku</th>
			<th>Jml. Tersedia</th>
			<th>Jml. Dipinjam</th>
		</tr>
	</thead>
	<tbody>
<?php
// mengambil data semua buku
$sql_buku=mysqli_query($konek,"SELECT tbl_buku.*,tbl_pengarang.nama_pengarang,tbl_penerbit.nama_penerbit,tbl_kategori.nama_kategori
FROM tbl_buku JOIN tbl_pengarang ON tbl_pengarang.kode_pengarang=tbl_buku.kode_pengarang JOIN tbl_penerbit ON tbl_penerbit.kode_penerbit=
tbl_buku.kode_penerbit JOIN tbl_kategori ON tbl_kategori.kode_kategori=tbl_buku.kode_kategori") or die (mysqli_error($konek));

	// menyiapan variabel
	$no_urut=null;
	$total_nya=null;
	$total_dipinjam=null;
	$total_tersedia=null;

while($data_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC)){
	$no_urut++;
	
	// pada saat loop
	
	// menghitung jumlah buku yang belum dikembalikan
	$kode_buku=$data_buku['kode_buku'];
	$buku_dipinjam=mysqli_fetch_array(mysqli_query($konek,"SELECT Count(kode_pinjaman) as jumlah FROM tbl_peminjaman WHERE kode_buku='$kode_buku' and kembali='T' "),MYSQLI_ASSOC);
	
	//hitung total buku
	
	$total_buku=$data_buku['jumlah_buku']+$buku_dipinjam['jumlah'];
	
	// tampilkan data
	echo '	<tr>
				<td align="right">'.$no_urut.'</td>
				<td>'.$data_buku['judul_buku'].'</td>
				<td>'.$data_buku['nama_pengarang'].'</td>
				<td>'.$data_buku['nama_penerbit'].'</td>
				<td style="text-align:right">'.$total_buku.' eks.</td>
				<td style="padding-right:30px;text-align:right">'.$data_buku['jumlah_buku'].' eks.</td>
				<td style="padding-right:30px;text-align:right">'.$buku_dipinjam['jumlah'].' eks.</td>
			</tr>';
			
			$total_nya=$total_buku+$total_nya;
			$total_tersedia=$total_tersedia+$data_buku['jumlah_buku'];
			$total_dipinjam=$total_dipinjam+$buku_dipinjam['jumlah'];
}
			?>		
		<!-- Menghitung Total -->
		<tr>
			<th colspan="4">Total</th>
			<th style="text-align:right"><?php echo $total_nya;?> eks.</th>
			<th style="padding-right:30px;text-align:right"><?php echo $total_tersedia;?> eks.</th>
			<th style="padding-right:30px;text-align:right"><?php echo $total_dipinjam;?> eks.</th>
	
		</tr>

		</tbody>
	</table>
	
</div>
