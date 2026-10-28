<?php
session_start();
include('kawalan.php');
include('connection.php');

# semak jika notel wujud dalam url
if (isset($_GET['notel'])) {
	$notel = mysqli_real_escape_string($condb, $_GET['notel']);
	# laksana arahan dan tentukan mesej
	$mesej = mysqli_query($condb, "DELETE FROM pengguna WHERE notel='$notel'") ? "Padam data berjaya" : "Padam data gagal";
}  else {
	$mesej = "Ralat! Akses secara terus.";
}

# paparkan alert dan redirect ( 1 kali sahaja di bawah )
echo "<script>alert('$mesej'); window.location.href='pengguna-senarai.php';</script>";
?>