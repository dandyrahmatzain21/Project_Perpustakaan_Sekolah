<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Form Peminjaman Buku</h2>
<p>Untuk mendata peminjaman buku, silakan isi form di bawah ini !</p>

<form method="POST" action="index.php?file=peminjaman_simpan" name="form_pinjam" class="form-horizontal">
	<div class="form-group"> 
		<label class="control-label col-sm-2">No. Anggota</label>
		<div class="col-sm-2">
			<input type="text" name="kode_anggota" class="form-control" readonly>
		</div>
		
		<label class="control-label col-sm-2">Nama Anggota</label>
		<div class="col-sm-6">
			<div class="input-group">
				<input type="text" name="nama_anggota" class="form-control" readonly>
				<span class="input-group-btn">
				<a href="javascript:void(0);" onclick="javascript:window.open('popup_anggota.php','_blank','width=600,height=400,scrollbars=yes,status=no,resizable=no,screenx=200,screeny=100')" style="text-decoration: none;" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></a>
				</span>
			</div>
			
		</div>
	</div>

	
	<div class="form-group">
	<label class="control-label col-sm-2">Kode Buku</label>
	<div class="col-sm-2">
		<input type="text" name="kode_buku" class="form-control"  readonly>
	</div>

	<label class="control-label col-sm-2">Judul Buku</label>
	<div class="col-sm-6">
		<div class="input-group">
			<input type="text" name="judul_buku" class="form-control" readonly>
			<span class="input-group-btn">
				<a href="javascript:void(0);" class="btn btn-success" onclick="javascript:window.open('popup_buku.php','_blank',	'width=600,height=400,scrollbars=yes,status=no,resizable=no,screenx=200,screeny=100')" style="text-decoration: none;"><span class="glyphicon glyphicon-search"></span></a>			
			</span>
		</div>
	</div>
	</div>
	
	<div class="form-group">
	<label class="control-label col-sm-2">Tgl. Peminjaman</label>
		<div class="col-sm-3">
			<input type="text" name="tgl_pinjam" class="form-control" value="<?php echo date('d M Y H:i:s'). ' WIB';?>" readonly>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-12">
			<a href="javascript:history.back()" class="btn btn-info"><span class="glyphicon glyphicon-backward"></span> Kembali</a>
			<button type="submit" name="tombol_simpan" value="Simpan Data" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		</div>
	</div>
</form>
