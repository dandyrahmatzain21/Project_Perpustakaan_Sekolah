<?php
include('koneksi.php');
include('konstanta.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo nama_aplikasi;?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table class="konten_utama">
	<tr>
		<td class="header"><?php echo nama_aplikasi;?></td>
	</tr>
	<tr>
		<td  class="menu"><?php echo menu_navigasi;?></td>
	</tr>
	<tr>
		<td class="konten">
		<?php
			if (isset($_GET['file'])){
				include($_GET['file'].'.php');
			}else{
				echo text_intro;
			}
		?>
		</td>
	</tr>
	<tr>
		<td class="catatan_kaki"><?php echo info_pembuat;?></td>
	</tr>
</table>
</body>
</html>