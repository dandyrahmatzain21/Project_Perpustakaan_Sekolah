<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_penerbit=$_POST['kode'];
$nm_penerbit=$_POST['nama'];
$alamat=$_POST['alamat'];
$telp=$_POST['tlp'];
$email=$_POST['email'];
$website=$_POST['website'];

$sql_simpan_penerbit=mysqli_query($konek,"INSERT INTO tbl_penerbit(kode_penerbit,nama_penerbit,alamat_penerbit,telp_fax,email,website) VALUES
	('$kd_penerbit','$nm_penerbit','$alamat','$telp','$email','$website')") or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=penerbit_list">
</div>';

?>
