<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_pengarang=$_POST['kode'];
$nm_pengarang=$_POST['nama'];
$email=$_POST['email'];
$website=$_POST['website'];

mysqli_query($konek,"UPDATE tbl_pengarang SET nama_pengarang='$nm_pengarang',email_pengarang='$email',
website_pengarang='$website' where kode_pengarang='$kd_pengarang'") or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=pengarang_list">
</div>';

?>