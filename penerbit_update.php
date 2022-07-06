<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_penerbit=$_POST['kode'];
$nm_penerbit=$_POST['nama'];
$alamat=$_POST['alamat'];
$tlp_fax=$_POST['tlp'];
$email=$_POST['email'];
$website=$_POST['website'];

$sql_simpan_penerbit=mysqli_query($konek,"UPDATE tbl_penerbit SET nama_penerbit='$nm_penerbit',
alamat_penerbit='$alamat',telp_fax='$tlp_fax',email='$email',website='$website' where kode_penerbit='$kd_penerbit'") or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang merubah data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=penerbit_list">
</div>';

?>
