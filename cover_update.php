<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
$kode_buku=$_POST['kode_buku'];

$sql_buku=mysqli_query($konek,"SELECT * FROM tbl_buku where kode_buku='$kode_buku'");
$detail_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC);

$file_cover=$detail_buku['file_cover'];

if(isset($file_cover)){
//	IF file_exists('cover/'.$file_cover){	
	unlink('cover/'.$file_cover);
//	}
}

$target_folder="cover/";
$target_file=$target_folder. basename($_FILES["cover_buku"]["name"]);
basename($_FILES['cover_buku']['name']);
move_uploaded_file($_FILES['cover_buku']['tmp_name'],$target_file);
$file_cover=basename($_FILES['cover_buku']['name']);

mysqli_query($konek,"UPDATE tbl_buku SET file_cover='$file_cover' where kode_buku='$kode_buku'") or die (mysqli_error($konek));
echo '<meta http-equiv="refresh" content="1;url=index.php?file=buku_list">';
?>