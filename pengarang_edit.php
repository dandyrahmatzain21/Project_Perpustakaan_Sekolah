<?php
defined ('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];
$sql_pengarang=mysqli_query($konek,"SELECT * FROM tbl_pengarang where kode_pengarang='$kode'");
$data_pengarang=mysqli_fetch_array($sql_pengarang,MYSQLI_ASSOC);
?>

<h3>Form Perubahan Data Pengarang</h3>
<p>Masukkan data pengarang baru pada form di bawah ini</p>

<form method="POST" action="index.php?file=pengarang_update" class="form-horizontal">
	
	<div class="form-group">
		<label class="control-label col-sm-3">Kode Pengearang</label>
		<div class="col-sm-3">
			<input type="text" name="kode" placeholder="masukkan kode pengarang" maxlength="4" value="<?php echo $data_pengarang['kode_pengarang'];?>" class="form-control" readonly/>	
		</div>
	
		<div class="col-sm-6">			
		<input type="text" name="nama" placeholder="masukkan nama pengarang" class="form-control" value="<?php echo $data_pengarang['nama_pengarang'];?>" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Email</label>
		<div class="col-sm-9">
		<input type="text" name="email" placeholder="masukkan email" class="form-control" value="<?php echo $data_pengarang['email_pengarang'];?>"  required/>			
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Website</label>
		<div class="col-sm-9">
		<input type="text" name="website" placeholder="masukkan alamat internet" class="form-control" value="<?php echo $data_pengarang['website_pengarang'];?>" />
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		</div>
	</div>
</form>