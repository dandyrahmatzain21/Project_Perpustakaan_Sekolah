<?php
defined('proteksi') or die ('tidak boleh mengakses langsung');
?>
<h2>Daftar Buku</h2>
<p>Berikut adalah daftar buku yang sudah terdaftar di database perpustakaan SMKN 2 Kuningan</p>
<p><a href="index.php?file=buku_tambah" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</a></p>

<?php
$sql_buku=mysqli_query($konek,"SELECT tbl_buku.*,tbl_pengarang.nama_pengarang,tbl_penerbit.nama_penerbit,tbl_kategori.nama_kategori
FROM tbl_buku JOIN tbl_pengarang ON tbl_pengarang.kode_pengarang=tbl_buku.kode_pengarang JOIN tbl_penerbit ON tbl_penerbit.kode_penerbit=
tbl_buku.kode_penerbit JOIN tbl_kategori ON tbl_kategori.kode_kategori=tbl_buku.kode_kategori") or die (mysqli_error($konek));
$no_urut=null;
while($data_buku=mysqli_fetch_array($sql_buku,MYSQLI_ASSOC)){
	$no_urut++;

	echo '
<div class="media-list">
	<div class="media">
		<div class="media-left">
			<img src="cover/'.$data_buku['file_cover'].'" class="thumbnail">
			
			
		</div>
	
		<div class="media-body">
			<h4 class="media-heading">'.$data_buku['judul_buku'].'</h4>
			<div class="row">
				<label class="col-sm-3">Kode Buku</label>
				<label class="col-sm-9">: '.$data_buku['kode_buku'].'</label>
			</div>
	 
			<div class="row">
				<label class="col-sm-3">Pengarang</label>
				<label class="col-sm-9">: '.$data_buku['nama_pengarang'].'</label>
			</div>

			<div class="row">
				<label class="col-sm-3">Penerbit</label>
				<label class="col-sm-9">: '.$data_buku['nama_penerbit'].'</label>
			</div>
	
			<div class="row">
				<label class="col-sm-3">Kategori</label>
				<label class="col-sm-9">: '.$data_buku['kode_kategori'].' - '.$data_buku['nama_kategori'].'</label>
			</div>

			<div class="row">
				<label class="col-sm-3">Jumlah</label>
				<label class="col-sm-9">: '.$data_buku['jumlah_buku'].' eksemplar</label>
			</div>

			<div class="row">
				<label class="col-sm-3">Tahun Terbit</label>
				<label class="col-sm-9">: '.$data_buku['tahun_terbit'].'</label>
			</div>

			<div class="row">
				<label class="col-sm-3">Tanggal Diterima</label>
				<label class="col-sm-9">: '.$data_buku['tgl_diterima'].'</label>
			</div>
			
			<div class="row col-sm-12">
				
			<a href="index.php?file=cover_edit&kode='.$data_buku['kode_buku'].'" >
			<button class="btn btn-success"><span class="glyphicon glyphicon-info-sign"></span> Edit</button>
			</a>
			
			<a onclick="return window.confirm(\'yakin data ini di hapus?\')" href="index.php?file=buku_hapus&kode='.$data_buku['kode_buku'].'">
			<button class="btn btn-warning"><span class="glyphicon glyphicon-remove-sign"></span> Hapus</button>
			</a>
			
			</div>
			
		
		</div>
	</div>
</div>	';
}
?>
