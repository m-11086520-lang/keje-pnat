<?php
session_start();    
include('header.php');
include('connection.php');
include('kawalan.php');
?>

<!-- CSS Khas untuk mencetak laporan -->
 <style>
    @media print {
        .no-print { display: none m !important;}
        body { background-color: white;}
    }
    .btn-cetak {
        padding: 8px 15px;
        background: #333;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
        border: none;
        font-size: 14px;
    }
    .btn-cari {
        padding: 8px 15px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
 </style>

 <div style="width: 80%; margin: 0 auto;">
    <h2>LAPORAN JANJI TEMU HARIAN</h2>
    <!-- 1. KOTAK PILIHAN TARIKH -->
     <div class="no-print" style="background: #e9ecef; padding: 20px; border-radius: 8px; broder: 1px solid #ccc; text-align: center; margin-bottom: 20px;">
        <form action=""  method="POST" style="margin: 0;">
            <label style="font-size: 16px; font-weight: bold">Pilih Tarikh Janji Temu</label>
            <?php
            # kekalkan tarikh yang dipilih di dalam kotak form
            $tarikh_pilihan = $_POST['tarikh_carian'] ?? date('Y-m-d');
            ?>

            <input type="date" name="tarikh_carian" value="<?php echo $tarikh_pilihan; ?>" required style="padding: 6px; font-size: 16px">
            <input type="submit" name="papar_laporan" value="Cari Rekod" class="btn-cari"> &nbsp;&nbsp;
            <button type="button" class="btn-cetak" onclick="window.print()">Cetak</button>

        </form>
    </div>
    <!-- 2. HASIL LAPORAN SELEPAS TARIKH DIPLIH -->
    <?php
        if (isset($_POST['papar_laporan'])) {
            $tarikh = mysqli_real_escape_string($conn, $_POST['tarikh_carian']);

            # tukar format tarikh
            $tarikh_cantik = date('d/m/Y', strtotime($tarikh));

            # header
            echo "<center>
                <p>Jadual Bertugas Bagi Tarikh: <b style='color:blue; font-size:18px;'> $tarikh_cantik </b></p></center>";
            
                $sql_detail = "SELECT k.masa, p.nama_pengguna, p.notel, s.nama_perkhidmatan
                               FROM janjitemu j
                               INNER JOIN pengguna p ON j.notel = p.notel
                               INNER JOIN perkhidmatan s ON j.kod_perkhidmatan = s.nama_perkhidmatan
                               WHERE j.tarikh = '$tarikh'
                               ORDER BY j.masa ASC";
                $query_detail = mysqli_query($conn, $sql_detail);
                $jumlah_rekod = mysqli_num_rows($query_detail);

                # paparan insight
                echo "<table width='100%' border='0' cellpadding='10' style='background-color:#fff3cd; color:#856404; border-radius:5px; margin-bottom:15px; border:1px solid #ffeeba;'>
                      <tr>
                      <td align='center'>
                      <b>RINGKASAN HARI INI:</b> Terdapat <b>$jumlah_rekod</b> pelanggan yang telah menempah janji temu pada tarikh ini.
                      </td>
                      </tr>
                      </table>";
                # jadual senarai
                echo "<table width='100%' border='1' cellpadding='8' style='border-collapse:collapse;'>
                      <tr bgcolor"      
        }
    ?>
 </div>