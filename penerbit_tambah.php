<h2>Form Penambahan Data Penerbit</h2>
<p>Masukkan data penerbit baru pada form di bawah ini</p>

<form method="POST" action="index.php?file=penerbit_simpan" class="form-horizontal">
	
	<div class="form-group">
		<label class="control-label col-sm-3">Kode - Nama Penerbit</label>
		<div class="col-sm-3">
			<input type="text" name="kode" placeholder="masukkan kode penerbit" class="form-control" required autofocus autocomplete/>
		</div>
		<div class="col-sm-6">
			<input type="text" name="nama" placeholder="masukkan nama penerbit" class="form-control" required autocomplete/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Alamat</label>
		<div class="col-sm-9">
			<textarea name="alamat" class="form-control" placeholder="masukkan alamat lengkap"></textarea>
		</div>
	</div>
	
	
	<div class="form-group">
		<label class="control-label col-sm-3">Telp/Fax</label>
		<div class="col-sm-3">
			<input type="text" name="tlp" placeholder="masukkan no. telp/fax" class="form-control">
		</div>

		<label class="control-label col-sm-3">Email</label>
		<div class="col-sm-3">
			<input type="text" name="email" placeholder="masukkan email" class="form-control">		
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Website</label>
		<div class="col-sm-9">
			<input type="text" name="website" placeholder="masukkan alamat URL website" class="form-control">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		</div>
	</div>

</form>
