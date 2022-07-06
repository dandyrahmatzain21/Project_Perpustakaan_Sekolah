<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];
$sql_penerbit=mysqli_query($konek,"SELECT * FROM tbl_penerbit where kode_penerbit='$kode'");
$data_penerbit=mysqli_fetch_array($sql_penerbit,MYSQLI_ASSOC);
?>

<h2>Form Perubahan Data Penerbit</h2>
<p>Masukkan data penerbir baru pada form di bawah ini</p>

<form method="POST" action="index.php?file=penerbit_update" class="form-horizontal">
	
	<div class="form-group">
		<label class="control-label col-sm-3">Kode - Nama Penerbit</label>
		<div class="col-sm-3">
			<input type="text" name="kode" placeholder="masukkan kode penerbit" class="form-control" value="<?php echo $data_penerbit['kode_penerbit'];?>" readonly/>
		</div>
		<div class="col-sm-6">
			<input type="text" name="nama" placeholder="masukkan nama penerbit" class="form-control"  value="<?php echo $data_penerbit['nama_penerbit'];?>"  required autofocus autocomplete/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Alamat</label>
		<div class="col-sm-9">
			<textarea name="alamat" class="form-control" placeholder="masukkan alamat lengkap"><?php echo $data_penerbit['alamat_penerbit'];?></textarea>
		</div>
	</div>
	
	
	<div class="form-group">
		<label class="control-label col-sm-3">Telp/Fax</label>
		<div class="col-sm-3">
			<input type="text" name="tlp" placeholder="masukkan no. telp/fax" class="form-control" value="<?php echo $data_penerbit['telp_fax'];?>">
		</div>

		<label class="control-label col-sm-3">Email</label>
		<div class="col-sm-3">
			<input type="text" name="email" placeholder="masukkan email" class="form-control" value="<?php echo $data_penerbit['email'];?>">		
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Website</label>
		<div class="col-sm-9">
			<input type="text" name="website" placeholder="masukkan alamat URL website" class="form-control" value="<?php echo $data_penerbit['website'];?>">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		</div>
	</div>

</form>
