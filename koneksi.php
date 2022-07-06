<?php
	$konek=mysqli_connect('localhost','root','')  ;   // mysql_connect(host, user, password);
	// 2. membuka salah satu  database untuk aplikasi kepegawaian
	$database=mysqli_select_db($konek,'db_perpustakaan') or die(mysqli_error($konek));
?>
