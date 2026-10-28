<?php

include('header.php');
include('connection.php');

if (isset($_POST['notel'])) {
	
	# mengambil data POST dari Borang (form)
	$nama_pengguna = mysqli_real_escape_string($condb, $_POST['nama_pengguna']);
	$notel = mysqli_real_escape_string($condb, $_POST['notel']);
	$katalaluan = mysqli_real_escape_string($condb, $_POST['katalaluan']);
	
	# data validation : had atas dan bawah
	if (strlen($katalaluan) > 9 ) {
		die("<script>alert('Ralat: Kata laluan Kurang 8 digit' window.location.href='signup.php';</script>");
	}
	
	# semak notel dah wujud atau belum
	$sql_semak = "SELECT notel FROM pengguna WHERE notel = '$notel'";
	$laksana_semak = mysqli_query($condb, $sql_semak);
	
	if (mysqli_num_rows($laksana_semak) == 1) {
		die("<script>alert('No Telefon telah digunakan' window.location.href='signup.php';</script>");
	}
	
	# simpan data pengguna baru
	$query = "INSERT INTO pengguna (notel,b nama_pengguna, katalaluan, jenis_pengguna) VALUES ('$notel', '$nama_pengguna', '$katalaluan', 'pengguna biasa')";
	
	if (mysqli_query($condb, $query)) {
		echo "<script>alert('Tahniah! Pendaftaran Berjaya.'); window.location.href='login.php';</script>";
	} else {
		echo "<script>alert('Pendaftaran gagal.');</script>";
	}
} ?>
<div style="text-align: center;">
	<h3>Daftar Pengguna Baru (SIGN UP)</h3>
	<p>Sila Lengkapkan Maklumat di bawah</p>
	
	<!-- borang ringkas tanpa table -->
	<form method='POST' action=''>
		<b>No. Telefon:</b><br>
		<input type='text' name='notel' placeholder='Contoh: 0123456789' required>
		<br><br>
		<b>Nama Pnegguna:</b><br>
		<input type='text' name='nama_pengguna' placeholder='Nama penuh' required>
		<br><br>
		<b>Katalaluan:</b>(antara 5-8 aksara sahaja)<br>
		<input type='password' name='katalaluan' required>
		<br><br>
			<input type='sumbit' value="Daftar Sekarang'>
		</form>
</div>
<?php include('footer.php'); ?>