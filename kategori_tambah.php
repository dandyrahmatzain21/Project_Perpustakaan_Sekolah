<h2>Form Penambahan Data Kategori Buku</h2>
<p>Masukkan data kategori buku baru pada form di bawah ini</p>

<form method="POST" action="index.php?file=kategori_simpan" class="form-horizontal">
	
	<div class="form-group">
	<label class="control-label col-sm-3">Kode kategori</label>
		<div class="col-sm-9">
		<input type="text" name="kode" placeholder="masukkan kode kategori" class="form-control" maxlength="4" required autofocus autocomplete/>
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Nama kategori</label>
		<div class="col-sm-9">	
		<input type="text" name="kategori" placeholder="masukkan nama kategori" class="form-control " required/>
		</div>
	</div>
	
	<div class="form-group">
	<label class="control-label col-sm-3">Deskripsi Kategori</label>
		<div class="col-sm-9">
			<textarea name="deskripsi" class="form-control"></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>  
		</div>
	</div>	
</form>