<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
$user=$_GET['user'];
$sql_hapus_user=mysqli_query($konek,"DELETE FROM tbl_user where username='$user'");

echo '
<div style="text-align:center"><p>Sedang menghapus data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=user_list">
</div>';
?>