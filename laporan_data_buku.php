<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h3 align="center">Laporan Data Buku
					<br/>Bulan <?php echo date('M Y');?></h3>
<p>
<a href="" class="tombol" OnClick="javascript:window.open('cetak_laporan_data_buku.php','_blank','width=800,height=800,scrollbars=no,status=no,resizable=yes,screenx=100,screeny=100')" style="text-decoration:none;"> Cetak</a></p>

<table class="data">
<tr>
	<th>No</th>
	<th>Kode Buku</th>
	<th>Judul Buku</th>
	<th>Pengarang</th>
	<th>Penerbit</th>
	<th>Kategori</th>
	<th>Jml. Eks.</th>
	<th>Tgl. Terima</th>
</tr>
<?php
	$sql_buku=mysqli_query($koneksi,"SELECT 
	tbl_buku.*,
	tbl_pengarang.nama_pengarang,
	tbl_penerbit.nama_penerbit,
	tbl_kategori.nama_kategori
	FROM tbl_buku
	JOIN tbl_pengarang ON tbl_pengarang.kode_pengarang=tbl_buku.kode_pengarang
	 JOIN tbl_penerbit ON tbl_penerbit.kode_penerbit=tbl_buku.kode_penerbit 
	JOIN tbl_kategori ON tbl_kategori.kode_kategori=tbl_buku.kode_kategori
	") or die (mysqli_error($koneksi));
	$no_urut=null;
	while($data_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC)){												
	$no_urut++;
	
	echo '
					<tr>
					<td>'.$no_urut.'</td>
					<td align="center">'.$data_buku['kode_buku'].'</td>
					<td>'.$data_buku['judul_buku'].'</td>
					<td>'.$data_buku['nama_pengarang'].'</td>
					<td>'.$data_buku['nama_penerbit'].'</td>
					<td>'.$data_buku['kode_kategori'].' - '.$data_buku['nama_kategori'].'</td>
					<td align="center">'.$data_buku['jumlah_buku'].'</td>
					<td>'.$data_buku['tgl_diterima'].'</td>
					</tr>
	';
	}
?>	
</table>
