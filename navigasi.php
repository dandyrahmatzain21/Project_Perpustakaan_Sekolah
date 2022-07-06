    <!-- Fixed navbar -->
    <nav class="navbar  navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="index.phpnavbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">ScadaLIB</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-dashboard" style="margin-right:10px;"></span> Dashboard</a></li>
            
            <li class="dropdown">
              <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" style="margin-right:10px;"></span> Master Data <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?file=penerbit_list"><span class="glyphicon glyphicon-home" style="margin-right:10px;"></span>Penerbit</a></li>
                <li><a href="index.php?file=pengarang_list"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>Pengarang</a></li>
                <li><a href="index.php?file=kategori_list"><span class="glyphicon glyphicon-th" style="margin-right:10px;"></span>Kategori</a></li>
                <li><a href="index.php?file=buku_list"><span class="glyphicon glyphicon-book" style="margin-right:10px;"></span>Buku</a></li>
                <li><a href="index.php?file=anggota_list"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>Anggota</a></li>
                <li><a href="index.php?file=user_list"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>User</a></li>
              </ul>
            </li>
            
			<li class="dropdown">
              <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil" style="margin-right:10px;"></span> Transaksi<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?file=peminjaman_list"><span class="glyphicon glyphicon-open" style="margin-right:10px;"></span>Peminjaman</a></li>
                <li><a href="index.php?file=pengembalian_list"><span class="glyphicon glyphicon-save" style="margin-right:10px;"></span>Pengembalian</a></li>
              </ul>
            </li>
            
			<li class="dropdown">
              <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" style="margin-right:10px;"></span>Laporan<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?file=peminjaman_laporan"><span class="glyphicon glyphicon-upload" style="margin-right:10px;"></span>Peminjaman</a></li>
                <li><a href="index.php"><span class="glyphicon glyphicon-download" style="margin-right:10px;"></span>Pengembalian</a></li>
                <li><a href="index.php?file=denda_laporan"><span class="glyphicon glyphicon-usd" style="margin-right:10px;"></span>Pendapatan Denda</a></li>
				<li><a href="index.php?file=buku_laporan_stok"><span class="glyphicon glyphicon-book" style="margin-right:10px;"></span>Stok Buku</a></li>
              </ul>
            </li>            
		   <li><a href="index.php?file=info"><span class="glyphicon glyphicon-info-sign" style="margin-right:10px;"></span> Info</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
