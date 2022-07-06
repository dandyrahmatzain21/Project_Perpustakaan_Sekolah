<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Laporan Penerimaan Denda</h2>
<p>Untuk menampilkan laporan denda, tentukan terlebih dahulu tahun pelaporan yang akan ditampilkan</p>

<form class="form-horizontal" method="POST">
	<div class="form-group">
	<label class="control-label col-sm-2">Tahun Laporan</label>
	<div class="col-sm-10">
		<div class="input-group">
		<input type="text" name="tahun" class="form-control" placeholder="misal : 2017" maxlength="4" autofocus autocomplete="off">
		<span class="input-group-btn">
		<button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Tampilkan</button>
		</span>
		</div>
	</div>
	</div>
</form>


<?php
if(isset($_POST['tahun'])){
?>	

<p>
<a href="index.php?file=peminjaman_tambah" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Cetak</a>

<a href="index.php?file=peminjaman_tambah" class="btn btn-success"><span class="glyphicon glyphicon-cloud-download"></span> Download</a>
</p>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No. </th>
			<th>Bulan Peneriman</th>
			<th>Jumlah Penerimaan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=null;
		$total_denda=null;
		$tahun=$_POST['tahun'];
		
		for($bln=1;$bln<=12;$bln++){
		$no++;
		
		// hitung dende per bulan
		$denda=mysqli_fetch_array(mysqli_query($konek,"select year(tgl_kembali) as tahun, month(tgl_kembali) as bulan,sum(denda) as total 
		FROM tbl_pengembalian
		WHERE year(tgl_kembali)=$tahun and month(tgl_kembali)=$no",MYSQLI_ASSOC));
		
		echo '	<tr>
				<td align="center">'.$no.'</td>
				<td>'.$array_bulan[$no].' '.$tahun.'</td>
				<td style="text-align:right;padding-right:30px">'.number_format($denda['total'],2,',','.').'</td>
				</tr>';
		//hitung total denda
			$total_denda=$total_denda+$denda['total'];
		}
		?>
		<tr>
		<th colspan="2" style="text-align:right">Total Penerimaan Denda Tahun <?php echo $tahun;?></th>
		<th style="text-align:right;padding-right:30px">Rp. <?php echo number_format($total_denda,0,',','.');?></th>
		</tr>
	</tbody>
</table>
</div>
<?php
}
?>