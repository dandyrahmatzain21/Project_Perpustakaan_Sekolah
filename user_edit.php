<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
$user=$_GET['user'];
$sql_user=mysqli_query($konek,"SELECT * FROM tbl_user where username='$user'");
$detail_user=mysqli_fetch_array($sql_user,MYSQLI_ASSOC);

$detail_user['jenis_user']=='admin' ? $admin='checked' : $admin=null; 
$detail_user['jenis_user']=='operator' ? $operator='checked' :  $operator=null;

?>
<h2>Form Penambahan User</h2>
<p>Masukkan data user baru pada form di bawah ini !</p>

<form method="POST" action="index.php?file=user_update" class="form-horizontal">

	<div class="form-group">
	<label class="control-label col-sm-3">Username</label>
		<div class="col-sm-9">
		<input type="text" name="username" placeholder="masukkan username" class="form-control" required autocomplete="off" value="<?php echo $detail_user['username'];?>" readonly>
		</div>
	</div>


	
	<div class="form-group">
	<label class="control-label col-sm-3">Password</label>
		<div class="col-sm-9">
			<input type="password" name="password" placeholder="masukkan password baru jika akan diganti atau kosongkan jika password lama tidak akan diganti" class="form-control" autocomplete="off">
		</div>
	</div>	

	<div class="form-group">
	<label class="control-label col-sm-3">Nama Lengkap</label>
		<div class="col-sm-9">
		<input type="text" name="namauser" placeholder="masukkan nama lengkap user" class="form-control" value="<?php echo $detail_user['namauser'];?>"  required  autocomplete="off">
		</div>
	</div>
	
	<div class="form-group">
	<label class="control-label col-sm-3">Jenis User</label>
		<div class="col-sm-9">
			<input type="radio" name="jenis_user" <?php echo $admin;?> value="admin"> Administrator
			<input type="radio" name="jenis_user" <?php echo $operator;?> value="operator"> Operator
		</div>
	</div>	
	
	<div class="form-group">
	<label class="control-label col-sm-3">Email</label>
		<div class="col-sm-9">
		<input type="text" name="email" placeholder="masukkan alamat email" class="form-control" value="<?php echo $detail_user['email'];?>"  autocomplete="off"> 
		</div>
	</div>	
	
	<div class="col-sm-12">
	
	<button type="submit" name="tombol_simpan" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
	</div>
</form>