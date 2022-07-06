<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kd_anggota=$_POST['kode'];
$nm_anggota=$_POST['nama'];
$tmpt_lhr=$_POST['tmpt_lhr'];
$tgl_lhr=$_POST['tgl_lhir'];
$jk=$_POST['jk'];
$tlp=$_POST['telp'];
$alamat=$_POST['alamat'];

$sql_simpan_anggota=mysqli_query($konek,"INSERT INTO tbl_anggota (kode_anggota,nama_anggota,tempat_lahir,
tanggal_lahir,jk_anggota,tlp_anggota,alamat_anggota,tanggal_daftar ) values ('$kd_anggota','$nm_anggota','$tmpt_lhr','$tgl_lhr',
'$jk','$tlp','$alamat',now())") or die (mysqli_error($konek));

echo '
<div style="text-align:center"><p>Sedang menyimpan data ...</p>
<h2 class="glyphicon glyphicon-repeat gly-spin"></h1> 
<meta http-equiv="refresh" content="3;url=index.php?file=anggota_list">
</div>';

?>
