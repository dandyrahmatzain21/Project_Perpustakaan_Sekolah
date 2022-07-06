<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];
$sql_kategori=mysqli_query($konek,"SELECT * FROM tbl_kategori where kode_kategori='$kode'");
$data_kategori=mysqli_fetch_array($sql_kategori,MYSQLI_ASSOC);
?>
<h2>Form Perubahan Data Kategori Buku</h2>
<p>Masukkan data kategori buku baru pada form di bawah ini</p>

<form method="POST" action="index.php?file=kategori_update" class="form-horizontal">
	
	<div class="form-group">
	<label class="control-label col-sm-3">Kode kategori</label>
		<div class="col-sm-9">
		<input type="text" name="kode" placeholder="masukkan kode kategori" class="form-control" maxlength="4" value="<?php echo $data_kategori['kode_kategori'];?>" 
	readonly/>
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Nama kategori</label>
		<div class="col-sm-9">	
		<input type="text" name="kategori" placeholder="masukkan nama kategori" class="form-control " value="<?php echo $data_kategori['nama_kategori'];?>" required autofocus autocomplete="off"/>
		</div>
	</div>
	
	<div class="form-group">
	<label class="control-label col-sm-3">Deskripsi Kategori</label>
		<div class="col-sm-9">
			<textarea name="deskripsi" class="form-control"><?php echo $data_kategori['deskripsi_kategori'];?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>  
		</div>
	</div>	
</form>