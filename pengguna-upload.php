<?php
session_start();
include('header.php');
include('kawalan.php');
?>

<!-- Borang muat naik fail pengguna -->
<h3 align="center">Muat naik data pengguna (*.txt)</h3>
<form action='' method='POST' enctype='multipart/form-data' style='text-align:center'>
<p><b>Sila pilih fail TXT yang ingin dimuat baik</b></p>
<input type='file' name='data_pengguna' accept='.txt' required><br><br>
<button type='submit' name='upload'>Muat Naik</button>

</form>
<?php include('footer.php'); ?>

<?php
# menyemak kewujudan data POST
if (isset($_POST['upload'])) {
	include('connection.php');
	
	$fail_sementara = $_FILES["data_pengguna"]["tmp_name"];
	$jenis_fail = pathinfo($_FILES["data_pengguna"]["name"], PATHINFO_EXTENSION);
	
	# semak saiz fail dan jenis fail
	if ($_FILES['data_pengguna']['size'] > 0 && $jenis_fail == "txt") {
		# baca keseluruhan fail TXT
		$senarau_data = file($fail_sementara, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$bil = 0;
		
		# loop setiam baris
		foreach ($senarat_data as $baris) {
			$pecahan = explode("|", $baris);
		}
	}
	
	#
	if (count($pecahan) < 3) continue;
	list($notel, $nama_pengguna, $katalaluan) = array_map('trim', $pecahan);
	
	#
	$semak = mysqli_query($condb, "SELECT notel FROM pengguna WHERE notel='$notel'");
	
	if (mysqli_num_rows($semak) > 0) {
		echo "<script>alert('Notel $notel telah digunakan.');</script>";
	} else {
		#
		
		$sql = "INSERT INTRO pnegguna (notel, nama_pengguna, katalaluan, jenis_pengguna) VALUES ('$notel', '$nama_pengguna', '$katalaluan', 'pengguna biasa')";
		mysqli_query($condb, $sql);
		$bil++;
	}
	
	echo "<script>alert('Import data selesai. Sebanyak $bil rekod berjaya disimpan.'); window.location.href='pengguna-senarai.php';</script>";
} else {
	echo "<script>alert('Hanya fail.txt yang boleh dimuat naik.');</script>";
}

?>