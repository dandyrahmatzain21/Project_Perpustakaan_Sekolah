<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>

<h2>Form Perubahan User</h2>
<p>Masukkan data user baru pada form di bawah ini !</p>

<form method="POST" action="index.php?file=user_simpan" class="form-horizontal">

	<div class="form-group">
	<label class="control-label col-sm-3">Username</label>
		<div class="col-sm-9">
		<input type="text" name="username" placeholder="masukkan username" class="form-control" required autofocus  autocomplete="off">
		</div>
	</div>

	
	<div class="form-group">
	<label class="control-label col-sm-3">Password</label>
		<div class="col-sm-9">
			<input type="password" name="password" placeholder="masukkan password" class="form-control">
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Nama Lengkap</label>
		<div class="col-sm-9">
		<input type="text" name="namauser" placeholder="masukkan nama lengkap user" class="form-control" required autocomplete="off">
		</div>
	</div>

	<div class="form-group">
	<label class="control-label col-sm-3">Jenis User</label>
		<div class="col-sm-9">
			<input type="radio" name="jenis_user" value="admin"> Administrator
			<input type="radio" name="jenis_user" value="operator"> Operator
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Email</label>
		<div class="col-sm-9">
		<input type="text" name="email" placeholder="masukkan alamat email" class="form-control" autocomplete="off">
		</div>
	</div>	
	
	<div class="col-sm-12">
	
	<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
	</div>
</form>