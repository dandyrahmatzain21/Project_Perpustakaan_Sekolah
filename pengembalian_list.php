<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Daftar Pengembalian Buku</h2>
<p>Berikut adalah daftar buku yang sudah dikembalikan oleh anggota perpustakaan SMKN 2 Kuningan tanggal <b><?php echo date('d-M-Y');?></b>.</p>
<form method="POST" action="index.php?file=pengembalian_simpan" name="f_pengembalian" class="form-horizontal">

<div class="form-group">
	<label class="control-label col-sm-3">No. Anggota</label>
	<div class="col-sm-2">	
		<input type="hidden" name="kode_pinjaman"  readonly>
		<input type="text" name="kode_anggota" class="form-control" readonly required>
	</div>
	<label class="control-label col-sm-2">Nama Anggota</label>
	<div class="col-sm-5">
		<div class="input-group">
			<input type="text" name="nama_anggota" class="form-control" readonly required>
			<span class="input-group-btn">
				<button type="button" class="btn btn-success" onclick="javascript:window.open('popup_peminjaman.php','_blank','width=600,height=400,scrollbar=yes,status=no,resizable=no,screenx=200,screeny=100')" style="text-decoration: none;"><span class="glyphicon glyphicon-search"></span>
				</button>			
			</span>
		</div>
	</div>
</div>

<div class="form-group">	
	<label class="control-label col-sm-3">Kode Buku</label>
	<div class="col-sm-2">
		<input type="text" name="kode_buku" class="form-control" readonly required>
	</div>
	<label class="control-label col-sm-2">Judul Buku</label>
	<div class="col-sm-5">
	<input type="text" name="judul_buku" class="form-control" readonly>
	</div>
</div>
	
<div class="form-group">
	<label class="control-label col-sm-3">Tanggal Harus Kembali</label>
	<div class="col-sm-3">
		<input type="text" name="tgl_harus_kembali" class="form-control" readonly>
	</div>
	
	<label class="control-label col-sm-3">Tanggal Pengembalian</label>
	<div class="col-sm-3">
	<input type="text" name="tgl_kembali" class="form-control" value="<?php echo date('Y-m-d');?>" readonly>
	</div>
</div>

<div class="form-group">	
	<label class="control-label col-sm-3">Terlambat Pengembalian</label>
	<div class="col-sm-3">
		<input type="text" name="telat_kembali" class="form-control" readonly>
	</div>
	<label class="control-label col-sm-1">Tarif</label>
	<div class="col-sm-2">
		<input type="text" name="tarif_denda" class="form-control" value="<?php echo tarif_denda;?>" readonly>
	</div>
	<label class="control-label col-sm-1">Denda</label>
	<div class="col-sm-2">
		<input type="text" name="besar_denda" class="form-control" value="<?php echo tarif_denda;?>" readonly>
	</div>
</div>	
	
<div class="form-group">
	<div class="col-sm-12">
		<button type="submit" name="simpan" class="btn btn-primary"/>
		<span class="glyphicon glyphicon-save"></span> Simpan
		</button>
	</div>
</div>
	
</form>

<div class="table-responsive">
<table class="table table-bordered table-hover">
	<tr>
		<th width="5%">No.</th>
		<th width="10%">Kode Anggota</th>
		<th>Nama Anggota</th>
		<th width="10%">Kode Buku</th>
		<th>Judul Buku</th>
		<th width="10%">Tgl. Harus Kembali</th>
		<th width="10%">Tgl. Pengembalian</th>
		<th width="10%">Telat</th>
		<th width="10%">Denda</th>
		<th>Aksi</th>
	</tr>
	<?php
		$tgl_sekarang=date('Y-m-d');
		$sql_peminjaman=mysqli_query($konek,"SELECT tbl_pengembalian.kode_pengembalian,
			tbl_pengembalian.kode_anggota,
			tbl_pengembalian.kode_buku,
			tbl_peminjaman.tgl_pinjaman,
			tbl_peminjaman.tgl_harus_kembali,
			tbl_pengembalian.tgl_kembali,
			tbl_pengembalian.kode_pinjaman,
			tbl_buku.judul_buku,
			tbl_anggota.nama_anggota,
			tbl_pengembalian.jml_hari_telat,
			tbl_pengembalian.denda 
			FROM tbl_pengembalian JOIN tbl_anggota ON tbl_anggota.kode_anggota=tbl_pengembalian.kode_anggota
			JOIN tbl_buku ON tbl_buku.kode_buku=tbl_pengembalian.kode_buku JOIN tbl_peminjaman ON tbl_peminjaman.kode_pinjaman=
			tbl_pengembalian.kode_pinjaman WHERE tbl_pengembalian.tgl_kembali='$tgl_sekarang' AND tbl_peminjaman.kembali='Y'
			ORDER BY tbl_pengembalian.kode_pengembalian DESC") or die (mysqli_error($konek));
		$no_urut=null;
		$total_denda=null;
		while($data_peminjaman=mysqli_fetch_array($sql_peminjaman,MYSQLI_ASSOC)){
		$no_urut++;
		$total_denda=$total_denda+$data_peminjaman['denda'];
		echo '<tr>
			<td align="center">'.$no_urut.'</td>
			<td align="center">'.$data_peminjaman['kode_anggota'].'</td>
			<td>'.$data_peminjaman['nama_anggota'].'</td>
			<td align="center">'.$data_peminjaman['kode_buku'].'</td>
			<td>'.$data_peminjaman['judul_buku'].'</td>
			<td align="center">'.$data_peminjaman['tgl_harus_kembali'].'</td>
			<td align="center">'.$data_peminjaman['tgl_kembali'].'</td>
			<td align="right">'.$data_peminjaman['jml_hari_telat'].'</td>
			<td align="right">Rp '.number_format($data_peminjaman['denda'],0,',','.').'</td>
			<td align="center"><a onclick="return window.confirm(\'yakin data ini dihapus?\')" href="index.php?file=pengembalian_hapus&kode=
			'.$data_peminjaman['kode_pengembalian'].'&buku='.$data_peminjaman['kode_buku'].'&pinjaman='.$data_peminjaman['kode_pinjaman'].'"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
			</tr>';
		}
	?>
	<tr><th colspan="8">Jumlah Penerimaan denda hari ini</th>
	<th>Rp. <?php echo number_format($total_denda,0,',','.');?></th>
	<th></th></tr>
</table>
</div>