<?php
// #Jadual Senarai Terperinci
echo "<table width='100%' border='1' cellpadding='8' style='border-collapse:collapse;'>
        <tr bgcolor='#1F4E78' style='color: white;'>
            <th width='5%'>Bil</th>
            <th width='15%'>Waktu / Masa</th>
            <th width='35%'>Nama Pelanggan</th>
            <th width='20%'>No. Telefon</th>
            <th width='25%'>Urusan / Servis</th>
        </tr>";

$bil = 1;

if ($jumlah_rekod > 0) {
    while ($m = mysqli_fetch_array($query_detail)) {
        echo "<tr>
                <td align='center'>".$bil++."</td>
                <td align='center'><b>".$m['masa']."</b></td>
                <td>".$m['nama_pengguna']."</td>
                <td align='center'>".$m['notel']."</td>
                <td align='center'>".$m['nama_perkhidmatan']."</td>
              </tr>";
    }
} else {
    # Jika hari tersebut tiada orang tempah
    echo "<tr>
            <td colspan='5' align='center' style='padding:20px; color:gray;'>
                <i>Tiada sebarang janji temu ditempah pada tarikh ini.</i>
            </td>
          </tr>";
}
echo "</table>";

# Tandatangan bawah laporan
echo "<br><br>
<div style='float: right; text-align: center; width: 250px;'>
    <p>Disahkan Oleh:</p>
    <br><br><br>
    <hr>
    <b>Penyelia Bertugas</b>
</div>
<div style='clear: both;'></div>";

} else {
    # Mesej lalai (default) sebelum carian dibuat
    echo "<br><br>
          <h3 align='center' style='color:gray;'>
              Sila pilih tarikh pada kalendar di atas dan klik 'Cari Rekod'
          </h3>
          <br><br>";
}
?>
</div>

<div class="no-print"> 
    <?php include('footer.php'); ?> 
</div>
