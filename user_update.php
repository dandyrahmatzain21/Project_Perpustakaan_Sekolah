<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$username=$_POST['username'];
$password=$_POST['password'];
$namauser=$_POST['namauser'];
$jenis_user=$_POST['jenis_user'];
$email=$_POST['email'];

if(isset($password)){ // jika password diisi maka password di ubah
$sql_update_user=mysqli_query($konek,"UPDATE tbl_user SET password=md5('$password'),namauser='$namauser',jenis_user='$jenis_user', email='$email' WHERE username='$username'") or die (mysqli_error($konek));	
} else { //jika password tidak diisi maka password tidak diubah
$sql_update_user=mysqli_query($konek,"UPDATE tbl_user SET namauser='$namauser',jenis_user='$jenis_user', email='$email' WHERE username='$username'") or die (mysqli_error($konek));
}
echo '
<div style="text-align:center"><p>Sedang merubah data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3;url=index.php?file=user_list">
</div>';

?>
