<?php $jenis = $_SESSION['jenis_pengguna'] ?? ''; ?>

<!--Tajuk sistem-->
<h1 align='center'>EasyMeet - Sistem e-janjitemu SelKom</h1>
<hr>

<div style="text-align: center;">
	<!-- Menu ini dipapar kepada Semua orang -->
		<a href='index.php'>Laman Utama</a>
	
	<!-- Menu khas ikut jenis pengguna yang berjaya login -->
	<?php if ($jenis == "admin") { ?>
	|	<a href='pengguna-senarai.php'>Senerai Pengguna</a>
	|	<a href='janjitemu-senarai.php'>Senarai Janji Temu</a>
	|	<a href='laporan.php'>Laporan Janji temu<a/>
	
	<?php } elseif ($jenis == "pengguna biasa") { ?>
	|	<a href='logout.php'>Janji Temu</a>
	
	<?php } ?>
	
	<!-- Butang Login/Logout -->
	<?php if (!empty($jenis)) { ?>
	|	<a href='logout.php'>Logout</a> |
		
	<?php } else { ?>
	|	<a href='login.php'>Log masuk</a>
	|	<a href='signup.php'>Daftar Sini</a> |
		
	<?php } ?>
<hr>
	