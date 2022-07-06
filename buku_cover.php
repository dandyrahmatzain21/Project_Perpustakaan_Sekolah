<?php
// cek apakah user mengakses secara langsung
defined('proteksi') or die ('ek nanaonan ???');
?>
<h3>Form Penambahan Data Buku</h3>
<p>Masukan data  buku pada form dibawah ini !</p>

<form method="POST" action="index.php?file=buku_simpan" enctype="multipart/form-data">

<div class="kotak_kiri">
<p class="label_input">	Kode Buku<br/>
	<input type="text" name="kode_buku" placeholder="masukan kode buku"  required autofocus autocomplete="off"/></p>

<p class="label_input">	Judul Buku<br/>
	<textarea name="judul_buku"  rows="3"></textarea></p>

<p class="label_input">	Penerbit<br/>
	<select name="kode_penerbit">
	<?php
	$sql_penerbit=mysqli_query($koneksi,"SELECT * FROM tbl_penerbit");
	while($data_penerbit=mysqli_fetch_array($sql_penerbit,MYSQLI_ASSOC)){												
	echo '<option value="'.$data_penerbit['kode_penerbit'].'">'.$data_penerbit['nama_penerbit'].'</option>';
	}
	?>
	</select></p>

<p class="label_input">	Pengarang<br/>
	<select name="kode_pengarang">
	<?php
	$sql_pengarang=mysqli_query($koneksi,"SELECT * FROM tbl_pengarang");
	while($data_pengarang=mysqli_fetch_array($sql_pengarang,MYSQLI_ASSOC)){												
	echo '<option value="'.$data_pengarang['kode_pengarang'].'">'.$data_pengarang['nama_pengarang'].'</option>';

	}
	?>	
	</select></p>

<p class="label_input">	Kategori<br/>
	<select name="kode_kategori">
	<?php
	$sql_kategori=mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
	$no_urut=null;
	while($data_kategori=mysqli_fetch_array($sql_kategori,MYSQLI_ASSOC)){												
	echo '<option value="'.$data_kategori['kode_kategori'].'">'.$data_kategori['nama_kategori'].'</option>';
	}
	?>
	</select></p>

</div>


<div class="kotak_kanan">

	<p class="label_input">	Tahun Terbit<br/>
		<input type="text" name="tahun_terbit" placeholder="YYYY" maxlength="4"/></p>

	<p class="label_input">	Cover Buku<br/>
		<input type="file" name="cover_buku" placeholder="masukan banyaknya buku"/></p>

	<p class="label_input">	Jumlah Buku<br/>
		<input type="text" name="jumlah_buku" size="3"/> </p>

	<p class="label_input">	Tanggal diterima<br/>
		<input type="text" name="tgl_diterima" placeholder="yyyy-mm-dd"/></p>

	<p><input type="submit" name="tombol_simpan" value="Simpan Data" class="tombol"></p>

</div>

</form>
