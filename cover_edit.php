<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];

$sql_detail_buku=mysqli_query($konek,"SELECT tbl_buku.*,tbl_pengarang.nama_pengarang,tbl_penerbit.nama_penerbit,
	tbl_kategori.nama_kategori FROM tbl_buku JOIN tbl_pengarang ON tbl_pengarang.kode_pengarang=tbl_buku.kode_pengarang
	Join tbl_penerbit ON tbl_penerbit.kode_penerbit=tbl_buku.kode_penerbit JOIN tbl_kategori ON tbl_kategori.kode_kategori=tbl_buku.kode_kategori
	where tbl_buku.kode_buku='$kode'") or die (mysqli_error($konek));

$data_detail_buku=mysqli_fetch_array($sql_detail_buku,MYSQLI_ASSOC);
?>
<h3>Form Penambahan Data Buku</h3>
<p>Masukkan data buku pada form dibawah ini !</p>
<form method="POST" action="index.php?file=cover_update" enctype="multipart/form-data">
<div class="kotak_kiri">
	<p class="label_input">Kode Buku<br/>
	<input type="text" name="kode_buku" placeholder="masukkan kode buku" value="<?php echo $data_detail_buku['kode_buku'];?>"
	readonly /></p>
	<p class="label_input">Judul Buku<br/>
	<textarea type="text" name="judul_buku" rows="3"><?php echo $data_detail_buku['judul_buku'];?></textarea>
	<p class="label_input">Penerbit<br/>
	<input type="text" name="nama_penerbit" value="<?php echo $data_detail_buku['nama_penerbit'];?>" size="50px" readonly/></p>
	<p class="label_input">Pengarang<br/>
	<input type="text" name="nama_pengarang" value="<?php echo $data_detail_buku['nama_pengarang'];?>" size="50px" readonly/></p>
	<p class="label_input">Kategori<br/>
	<input type="text" name="nama_kategori" value="<?php echo $data_detail_buku['nama_kategori'];?>" size="50px" readonly/></p>
</div>
<div class="kotak_kanan">
	<p class="label_input"> <img src="<?php echo 'cover/'.$data_detail_buku['file_cover'];?>" height="150px" width="100px"/></p>
	<p class="label_input"> Ganti Cover Buku<br/>
	<input type="file" name="cover_buku" placeholder="masukkan banyaknya buku"/></p>
	<p><input type="submit" name="tombol_simpan" value="Simpan Data" class="tombol"></p>
</div>
</form>