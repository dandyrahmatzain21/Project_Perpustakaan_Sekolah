<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_anggota=$_POST['kode'];
$nm_anggota=$_POST['nama'];
$tmpt_lhr=$_POST['tmpt_lhr'];
$tgl_lhr=$_POST['tgl_lhir'];
$jk=$_POST['jk'];
$tlp=$_POST['telp'];
$alamat=$_POST['alamat'];

$sql_simpan_anggota=mysqli_query($konek,"UPDATE tbl_anggota SET nama_anggota='$nm_anggota',
tempat_lahir='$tmpt_lhr',tanggal_lahir='$tgl_lhr',jk_anggota='$jk',tlp_anggota='$tlp',alamat_anggota='$alamat' where kode_anggota='$kd_anggota'")or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3	;url=index.php?file=anggota_list">
</div>';
?>