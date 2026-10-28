<?php

session_start();
include('header.php');
include('connection.php');
include('kawalan.php');
?>

<h2 align='center'>SENARAU PENGGUNA</h2>
<table align='center' width='80%' border='1' id='saiz'>
	<tr bgcolor='lightblue'>
		<td colspan='2' style='padding: 10px;' >
			<!-- Borang carian pengguna -->
			<form action='' method='POST' style='margin:0;'>
				<input type='text' name='nama_pengguna' placeholder='Carian'>
				<input type='sumbit' value='Cari'>
			</form>
		</td>
		
		<td colspan='4' align='right'>
			<button onclick="window.location.href='pengguna-upload.php'">
			[ + ] Muat Naik Data PENGGUNA
			</button>
			<?php include('butang-saiz.php')?>
		</td>
	</tr>
	
	<tr bgcolor='lightgray'>
		<th width='35%' style='padding: 8px;'>nama_pengguna</th>
		<th width='15%'>Nombor Telefon</th>
		<th width='10%'>Katalaluan</th>
		<th width='10%'>Jenis Pengguna</th>
		<th width='20%'>Tindakan</th>
	</tr>
<?php
// tambah syarat dalam carian pengguna melalui nama_pengguna
$tambahan = !empty($_POST['nama_pengguna']) ? " WHERE pengguna.nama_pengguna LIKE '%".$_POST['nama_pengguna']."%'" : "";

# arahan SQL untuk carian data pengguna
$arahan_papar = "SELECT * FROM pengguna $tambahan ORDER BY jenis_pengguna";
$laksana = mysqli_query($condb, $arahan_papar);
# paparkan setiap rekod pengguna
while ($m = mysqli_fetch_array($laksana)) {
	echo "<tr>
		<td>".$m['nama_pengguna']."</td>
		<td>".$m['notel']."</td>
		<td>".$m['katalaluan']."</td>
		<td>".$m['jenis_pengguna']."</td>
		<td>
| <a href='pengguna-kemaskini-borang.php?notel=".$m['notel']."'> KemasKini </a>
| <a href='pengguna-padam.php?notel=".$m['notel']."' onClick=\"return confirm('Anda ingin memadam data ini.')\">Hapus</a> | </td>
</tr>";
} ?>

</table>
<?php include('footer.php'); ?>
