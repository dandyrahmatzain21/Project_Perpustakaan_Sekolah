<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Laporan Peminjaman Buku</h2>
<p>Berikut adalah daftar buku yang sedang dipinjam oleh anggota perpustakaan SMKN 2 Kuningan sampai dengan tanggal <b><?php echo date('d-M-Y');?></b></p>


<?php
if(isset($_GET['file'])){
?>
<p>
<a href="peminjaman_excel.php" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak</a>
<a href="peminjaman_excel.php" class="btn btn-warning"><span class="glyphicon glyphicon-cloud-download"></span> Download</a>
</p>
<?php
}
?>
<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No. </th>
			<th>Anggota</th>
			<th>Buku</th>
			<th>Tgl. Pinjam</th>
			<th>Tgl. Kembali</th>
			<th>Keterlambatan</th>
			<th>Denda</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql_data_pinjaman=mysqli_query($konek,"SELECT tbl_peminjaman.kode_pinjaman,
		tbl_peminjaman.tgl_pinjaman,
		tbl_peminjaman.kode_anggota,
		tbl_anggota.nama_anggota,
		tbl_peminjaman.kode_buku,
		tbl_buku.judul_buku,tbl_peminjaman.tgl_harus_kembali,
			if(datediff(now( ) , tbl_peminjaman.tgl_harus_kembali)<=0,0,datediff(now( ) , tbl_peminjaman.tgl_harus_kembali) ) telat_pengembalian FROM tbl_peminjaman 
			JOIN tbl_anggota ON tbl_anggota.kode_anggota=tbl_peminjaman.kode_anggota 
			JOIN tbl_buku ON tbl_buku.kode_buku=tbl_peminjaman.kode_buku where tbl_peminjaman.kembali='T'
			Order By kode_anggota");
		$no_urut=null;
		$total_denda=null;
		while($data_pinjaman=mysqli_fetch_array($sql_data_pinjaman,MYSQLI_ASSOC)){
			$no_urut++;
			$total_denda=$total_denda+($data_pinjaman['telat_pengembalian']*tarif_denda);
			echo '<tr>
				<td align="right">'.$no_urut.'</td>
				<td>'.$data_pinjaman['kode_anggota'].' - '.$data_pinjaman['nama_anggota'].'</td>
				<td>'.$data_pinjaman['kode_buku'].' - '.$data_pinjaman['judul_buku'].'</td>
				<td align="center">'.$data_pinjaman['tgl_pinjaman'].'</td>
				<td align="center">'.$data_pinjaman['tgl_harus_kembali'].'</td>
				<td align="right">'.$data_pinjaman['telat_pengembalian'].' hari</td>
				<td align="right">Rp. '.number_format($data_pinjaman['telat_pengembalian']*tarif_denda,0,',','.').'</td>
				</tr>';
		}
		?>
		<tr>
		<th colspan="6" style="text-align:right">Total Denda</th>
		<th style="text-align:right">Rp. <?php echo number_format($total_denda,0,',','.');?></th>
		</tr>
	</tbody>
</table>
</div>
