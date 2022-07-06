

<h3>Grafik Jumlah Buku Per Kategori</h3>

<?php

$sql_grafik=mysqli_query($koneksi,"SELECT tbl_kategori.nama_kategori,count(tbl_buku.kode_buku) as jml FROM tbl_buku 
JOIN tbl_kategori ON tbl_kategori.kode_kategori=tbl_buku.kode_kategori 
GROUP BY tbl_buku.kode_kategori");

?>

<canvas id="myCanvas" width="530" height="340" style="background-color:yellow"></canvas>

<script>
var canvas=document.getElementById('myCanvas');
var context=canvas.getContext('2d');

context.font='10pt Arial';
context.fillStyle='white';
	// sumbu Y	
	  context.beginPath();
	  context.moveTo(29,10);
	  context.lineTo(29,310);
	  context.lineWidth = 2;	  
      context.strokeStyle = 'black';
      context.stroke();

	// sumbu X	
	  context.beginPath();
	  context.moveTo(30,310);
	  context.lineTo(500,310);
	  context.lineWidth = 2;	  
      context.strokeStyle = 'black';
      context.stroke();
<?php
$jml_data=3;
$y=30;
while($data_grafik=mysqli_fetch_array($sql_grafik,MYSQLI_ASSOC)){
$x=number_format(($data_grafik['jml']/$jml_data)*100,0,',','.');
?>
	 
	  context.beginPath();
	  context.moveTo(30,<?php echo $y;?>);
	  context.lineTo(<?php echo ($x*2);?>,<?php echo $y;?>);
	  context.lineWidth = 40;
      context.strokeStyle = '#800080';
      context.stroke();
	  context.fillText(<?php echo '\''.$data_grafik['jml'].' bh\'';?>,35,<?php echo $y;?>);

<?php
$y=$y+45;
}
?>

</script>
