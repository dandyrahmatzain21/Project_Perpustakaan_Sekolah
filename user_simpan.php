<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$username=$_POST['username'];
$password=$_POST['password'];
$namauser=$_POST['namauser'];
$jenis_user=$_POST['jenis_user'];
$email=$_POST['email'];

$sql_simpan_user=mysqli_query($konek,"INSERT INTO tbl_user (username,password,namauser,
jenis_user,email) values ('$username',md5('$password'),'$namauser','$jenis_user',
'$email')") or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3;url=index.php?file=user_list">
</div>';

?>
