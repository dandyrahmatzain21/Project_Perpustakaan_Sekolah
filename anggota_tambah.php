<h2>Form Penambahan Data Anggota</h2>
<p>Masukkan data anggota baru pada form di bawah ini !</p>

<form method="POST" action="index.php?file=anggota_simpan" class="form-horizontal">
	<div class="form-group">
	<label class="control-label col-sm-3">Kode Anggota</label>
		<div class="col-sm-3">
		<input type="text" name="kode" placeholder="masukkan kode anggota" class="form-control" required autofocus autocomplete="off"/>
		</div>
		<div class="col-sm-6">
		<input type="text" name="nama" placeholder="masukkan nama lengkap" class="form-control" required/>
		</div>
	</div>	
	<div class="form-group">
	<label class="control-label col-sm-3">Tempat, Tanggal Lahir</label>
		<div class="col-sm-5">
			<input type="text" name="tmpt_lhr" placeholder="masukkan tempat lahir" class="form-control">
		</div>
		<div class="col-sm-4">
			<input type="text" name="tgl_lhir" placeholder="format: Y-m-d" class="form-control">
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Jenis Kelamin</label>
		<div class="col-sm-2">
			<input type="radio" name="jk" value="L"> Laki-laki
		</div>
		<div class="col-sm-2">
			<input type="radio" name="jk" value="P"> Perempuan
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">No. Telepon</label>
		<div class="col-sm-9">
		<input type="text" name="telp" placeholder="masukkan no. telp" class="form-control">
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Alamat Anggota</label>
		<div class="col-sm-9">
		<textarea name="alamat" placeholder="masukkan alamat lengkap" class="form-control"></textarea>
		</div>
	</div>
	<div class="col-sm-12">
	
	<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Tambah</button>
	</div>
</form>