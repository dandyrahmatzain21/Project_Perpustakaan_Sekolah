<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h3>Form Penambahan Data Buku</h3>
<p>Masukkan data buku pada form di bawah ini !</p>

<form method="POST" action="index.php?file=buku_simpan" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
	<label class="control-label col-sm-2">Kode Buku</label>
	<div class="col-sm-4">
		<input type="text" name="kode_buku" placeholder="masukkan kode buku" class="form-control" required autofocus autocomplete="off">
	</div>
	<label class="control-label col-sm-2">Judul Buku</label>
	<div class="col-sm-4">
	<textarea type="text" name="judul_buku" rows="3" class="form-control" placeholder="Masukan judul buku"></textarea>
	</div>	
</div>	
	
	
<div class="form-group">
	<label class="control-label col-sm-2">Penerbit</label>
	<div class="col-sm-4">
	<select name="kode_penerbit" class="form-control">
	<?php
	$sql_penerbit=mysqli_query($konek,"SELECT * FROM tbl_penerbit");
		while($data_penerbit=mysqli_fetch_array($sql_penerbit,MYSQLI_ASSOC)){
			echo '<option value="'.$data_penerbit['kode_penerbit'].'">'.$data_penerbit['nama_penerbit'].'</option>';
		}
	?></select>
	</div>
	
	<label class="control-label col-sm-2">Pengarang</label>
	<div class="col-sm-4">
	<select name="kode_pengarang" class="form-control">
		<?php
		$sql_pengarang=mysqli_query($konek,"SELECT * FROM tbl_pengarang");
		while($data_pengarang=mysqli_fetch_array($sql_pengarang,MYSQLI_ASSOC)){
			echo '<option value="'.$data_pengarang['kode_pengarang'].'">'.$data_pengarang['nama_pengarang'].'</option>';
		}
		?>
	</select>
	</div>
</div>
	
	
<div class="form-group">
	<label class="control-label col-sm-2"> Kategori</label>
	<div class="col-sm-4">
	<select name="kode_kategori" class="form-control">
	<?php
	$sql_kategori=mysqli_query($konek,"SELECT * FROM tbl_kategori");
		while($data_kategori=mysqli_fetch_array($sql_kategori,MYSQLI_ASSOC)){
			echo '<option value="'.$data_kategori['kode_kategori'].'">'.$data_kategori['nama_kategori'].'</option>';
		}
	?>
	</select></div>
	
	<label class="control-label col-sm-2"> Tahun terbit</label>
	<div class="col-sm-4">
	<input type="text" name="tahun_terbit" class="form-control" placeholder="YYYY" maxlength="4">
	</div>
</div>


<div class="form-group">
		<label class="control-label col-sm-2"> Jumlah Buku</label>
		<div class="col-sm-4">
			<input type="text" name="jumlah_buku" class="form-control">
		</div>
		<label class="control-label col-sm-2"> Tanggal diterima</label>
		<div class="col-sm-4">
			<input type="text" name="tgl_diterima" class="form-control" placeholder="yyyy-mm-dd"/></p>
		</div>
</div>

<div class="form-group">
		<label class="control-label col-sm-2"> Cover Buku</label>
		<div class="col-sm-4">
			<input type="file" name="cover_buku" placeholder="masukkan banyaknya buku" class="btn btn-info">
		</div>
</div>

<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		</div>
</div>

</form>

