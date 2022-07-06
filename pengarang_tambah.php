<h3>Form Penambahan Data Pengarang</h3>
<p>Masukkan data pengarang baru pada form di bawah ini</p>

<form method="POST" action="index.php?file=pengarang_simpan" class="form-horizontal">
	
	<div class="form-group">
	<label class="control-label col-sm-3">Kode Pengarang</label>
		<div class="col-sm-3">
		<input type="text" name="kode" placeholder="masukkan kode pengarang" maxlength="4" required autofocus autocomplete class="form-control"/>	
		</div>
	
		<div class="col-sm-6">			
		<input type="text" name="nama" placeholder="masukkan nama pengarang" class="form-control" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Email</label>
		<div class="col-sm-9">
			<input type="text" name="email" placeholder="masukkan email" class="form-control"/>			
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Website</label>
		<div class="col-sm-9">
		<input type="text" name="website" placeholder="masukkan alamat internet" class="form-control"/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		</div>
	</div>
</form>