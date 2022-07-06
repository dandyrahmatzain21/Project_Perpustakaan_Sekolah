<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
$kode=$_GET['kode'];
$sql_anggota=mysqli_query($konek,"SELECT * FROM tbl_anggota where kode_anggota='$kode'");
$detail_anggota=mysqli_fetch_array($sql_anggota,MYSQLI_ASSOC);

$detail_anggota['jk_anggota']=='L' ? $laki='checked' : $laki=null;
$detail_anggota['jk_anggota']=='P' ? $perempuan='checked' : $perempuan=null;
?>

<h2>Form Penambahan Data Anggota</h2>
<p>Masukkan data anggota baru pada form di bawah ini !</p>

<form method="POST" action="index.php?file=anggota_update" class="form-horizontal">
	<div class="form-group">
	<label class="control-label col-sm-3">Kode Anggota</label>
		<div class="col-sm-3">
		<input type="text" name="kode" placeholder="masukkan kode anggota" class="form-control" value="<?php echo $detail_anggota['kode_anggota'];?>" readonly>
		</div>
		<div class="col-sm-6">
		<input type="text" name="nama" placeholder="masukkan nama lengkap" class="form-control" value="<?php echo $detail_anggota['nama_anggota'];?>" required autofocus autocomplete="off">
		</div>
	</div>	
	<div class="form-group">
	<label class="control-label col-sm-3">Tempat, Tanggal Lahir</label>
		<div class="col-sm-5">
			<input type="text" name="tmpt_lhr" placeholder="masukkan tempat lahir" class="form-control" value="<?php echo $detail_anggota['tempat_lahir'];?>" autocomplete="off" required>
		</div>
		<div class="col-sm-4">
			<input type="text" name="tgl_lhir" placeholder="format: Y-m-d" class="form-control" value="<?php echo $detail_anggota['tanggal_lahir'];?>" autocomplete="off" required>
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Jenis Kelamin</label>
		<div class="col-sm-2">
			<input type="radio" name="jk" <?php echo $laki;?> value="L" > Laki-laki
		</div>
		<div class="col-sm-2">
			<input type="radio" name="jk" <?php echo $perempuan;?> value="P"> Perempuan
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">No. Telepon</label>
		<div class="col-sm-9">
		<input type="text" name="telp" placeholder="masukkan no. telp" class="form-control" value="<?php echo $detail_anggota['tlp_anggota'];?>" autocomplete="off" required>
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Alamat Anggota</label>
		<div class="col-sm-9">
		<textarea name="alamat" placeholder="masukkan alamat lengkap" class="form-control"><?php echo $detail_anggota['alamat_anggota'];?></textarea>
		</div>
	</div>
	<div class="col-sm-12">
	
	<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Tambah</button>
	</div>
</form>