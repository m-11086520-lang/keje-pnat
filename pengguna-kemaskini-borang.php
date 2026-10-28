<?php
session_start();
include('header.php');
include('kawalan.php');
include('connection.php');

# Semak data GET, jika tiada terus hantar ke fail pengguna-senarai
if (empty($_GET['notel'])) {
	die("<script>window.location.href='pengguna-senarai.php';</script>"); 
}

$notel = mysqli_real_escape_string($condb, $_GET['notel']);
$m = mysqli_fetch_array(mysqli_query($condb, "SELECT * FROM pengguna WHERE notel = '$notel'"));
?>

<div><h3>Kemaskini maklumat pengguna</h3></div>

<form action='penggunqa-kemaskini-proses.php?notel_lama=<?= $notel ?>' method='POST'>

<label>Nama Pengguna:</label>
<input type='text' name='nama_pengguna' value='<?= $m['nama_pengguna'] ?>' required><br>

<label>No. Telefon:</label>
<input type='text' name='notel' value='<?= $m['notel'] ?>' required><br>

<label>Nama Pengguna:</label>
<input type='text' name='katalaluan' value='<?= $m['katalaluan'] ?>' required><br>

<label>Jenis Pengguna:</label>
<select name='jenis_pengguna' required>
<option value='<?= $m['jenis_pengguna'] ?>'><?= $m['jenis_pengguna'] ?> </option>

<?php

# dapatkan senerai jenis pengguna
$laksana_arahan = mysqli_query($condb, "SELECT jenis_pengguna FROM pengguna GROUP BY jenis_pengguna");

while ($n = mysqli_fetch_array($laksana_arahan)) {
	if ($n['jenis_pengguna'] != $m['jenis_pengguna']) {
		echo "<option value='{$n['jenis_pengguna']}</option>";
	}
}

?>
</select><br>

<input type='sumbit' value='Kemaskini Data'>
</form>
</div>

<?php include('footer.php'); ?>