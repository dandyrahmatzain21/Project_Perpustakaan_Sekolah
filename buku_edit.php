<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');

$kode=$_GET['kode'];
$sql_buku=mysqli_query($konek,"SELECT * FROM tbl_buku where kode_buku='$kode'");
$detail_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC);
?>
<h3>Form penambahan Data Buku</h3>
<p>Masukkan data buku pada form di bawah ini !</p>
<form method="POST" action="index.php?file=buku_update" enctype="multipart/form-data">
<div class="kotak_kiri">
<P class="label_input">
	<img src="<?php echo 'cover/'.$detail_buku['file_cover'];?>" width="150" height="210"/>
</P>
	<p class="label_input">Kode Buku<br/>
	<input type="text" name="kode_buku" placeholder="masukkan kode buku" value="<?php echo $detail_buku['kode_buku'];?>" readonly/></p>
	<p class="label_input">Judul Buku<br/>
	<textarea type="text" name="judul_buku" rows="3"><?php echo $detail_buku['judul_buku'];?></textarea>
</div>
<div class="kotak_kanan">
	<p class="label_input">Penerbit<br/>
	<select name="kode_penerbit">
	<?php
	$sql_penerbit=mysqli_query($konek,"SELECT * FROM tbl_penerbit");
		while($data_penerbit=mysqli_fetch_array($sql_penerbit,MYSQLI_ASSOC)){
			if($data_penerbit['kode_penerbit']==$detail_buku['kode_penerbit']){
			echo '<option value="'.$data_penerbit['kode_penerbit'].'" selected>'.$data_penerbit['nama_penerbit'].'</option>';
		} else {
			echo '<option value="'.$data_penerbit['kode_penerbit'].'">'.$data_penerbit['nama_penerbit'].'</option>';
		}
	}
	?></select></p>
	<p class="label_input">Pengarang<br/>
	<select name="kode_pengarang">
		<?php
		$sql_pengarang=mysqli_query($konek,"SELECT * FROM tbl_pengarang");
		while($data_pengarang=mysqli_fetch_array($sql_pengarang,MYSQLI_ASSOC)){
			if($data_pengarang['kode_pengarang']==$detail_buku['kode_pengarang']){
			echo '<option value="'.$data_pengarang['kode_pengarang'].'" selected>'.$data_pengarang['nama_pengarang'].'</option>';
		} else {
			echo '<option value="'.$data_pengarang['kode_pengarang'].'">'.$data_pengarang['nama_pengarang'].'</option>';
		}
	}
		?>
	</select></p>
	<p class="label_input"> Kategori<br/>
	<select name="kode_kategori">
	<?php
	$sql_kategori=mysqli_query($konek,"SELECT * FROM tbl_kategori");
		while($data_kategori=mysqli_fetch_array($sql_kategori,MYSQLI_ASSOC)){
			echo '<option value="'.$data_kategori['kode_kategori'].'">'.$data_kategori['nama_kategori'].'</option>';
		}
	?>
	</select></p>
		<p class="label_input"> Tahun terbit<br/>
		<input type="text" name="tahun_terbit" placeholder="YYYY" maxlength="4" value="<?php echo $detail_buku['tahun_terbit'];?>" />
		</p>
		<p class="label_input"> Jumlah Buku<br/>
		<input type="text" name="jumlah_buku" size="3" value="<?php echo $detail_buku['jumlah_buku'];?>" /></p>
		<p class="label_input"> Tanggal diterima<br/>
		<input type="text" name="tgl_diterima" placeholder="yyyy-mm-dd" value="<?php echo $detail_buku['tgl_diterima'];?>" /></p>
		<p><input type="submit" name="tombol_simpan" value="Simpan Data" class="tombol">
</p>
</div>
</form>