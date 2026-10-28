<?php
session_start();
include('kawalan.php');
include('connection.php');

# semak kewujudan data POST
if (!empty($_POST)) {
	
	# mengambil dan menapis data POST
	$nama_pengguna = mysqli_real_escape_string($condb, $_POST['nama_pengguna']);
	$notel = mysqli_real_escape_string($condb, $_POST['notel']);
	$katalaluan = mysqli_real_escape_string($condb, $_POST['katalaluan']);
	$notel_lama = mysqli_real_escape_string($condb, $_POST['notel_lama']);
	
	# had atas had bawah nombor telefon: mestilah antara 10 hingga 12 digit
	if (strlen($katalaluan) < 10 || strlen($katalaluan) > 13) {
		die("<script>alert('Ralat: Bil Digit notel antara 10-12 digit sahaja');</script>");
	}
	
	# arahan SQL untuk kemaskini pengguna
	$arahan = "UPDATE pengguna SET
	nama_pengguna = '$nama_pengguna',
	notel = '$notel',
	katalaluan = '$katalaluan',
	jenis_pengguna = '$jenis_pengguna'
	WHERE notel = '$notel_lama'";
	
	if (mysqli_query($condb, $arahan)) {
		echo "<script>alert('kemaskini Berjaya'); window.location.href='pengguna-senarai.php';</script>";
	} else {
		echo "<script>alert('Kemaskini Gagal'); window.history.back();</script>";
	}

} else {
	die("<script>alert('Akses secara terus.')");
}

