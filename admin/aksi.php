<?php
require 'vendor/autoload.php';
$host="localhost";
$user="root";
$pass="";
$db="repo";

$conn=mysqli_connect($host,$user,$pass,$db);
if (isset($_POST['submit'])) {
    $err = "";
    $ext = "";
    $success = "";

    $file_name = $_FILES['filexls']['name'];
    $file_data = $_FILES['filexls']['tmp_name'];

    if (empty($file_name)) {
        $err .= "<li>Masukkan File</li>";
    }else{
        $ext = pathinfo($file_name)['extension'];
    }

    $allowed_ext = array("xls","xlsx");
    if (!in_array($ext,$allowed_ext)) {
        $err .= "<li>Masukkan File Excel</li>";
    }
    if (empty($err)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        for($i=1;$i<count($sheetData);$i++){
            $kp=$sheetData[$i]['0'];
            $indeks=$sheetData[$i]['1'];
            $kk=$sheetData[$i]['2'];
            $uk=$sheetData[$i]['3'];
            $prh=$sheetData[$i]['4'];
            $thn=$sheetData[$i]['5'];
            $tp=$sheetData[$i]['6'];
            $m=$sheetData[$i]['7'];
            $k=$sheetData[$i]['8'];
            $j=$sheetData[$i]['9'];
            $loc=$sheetData[$i]['10'];
            $l=$sheetData[$i]['11'];
            $r=$sheetData[$i]['12'];
            $ar=$sheetData[$i]['13'];
            $td=$sheetData[$i]['14'];

            $date_explode=explode("/",$td);
            $td = $date_explode['2']."-".$date_explode['0']."-".$date_explode['1'];
            $sql1 = "insert into buku(KodePelaksana,Indeks,Klasifikasi,Unit,Perihal,Tahun,TingkatPerkembangan,Media,Kondisi,Jumlah,Lokasi,file_name,Retensi,ARetensi,TglDesk) 
            values('$kp','$indeks','$kk','$uk','$prh','$thn','$tp','$m','$k','$j','$loc','$l','$r','$ar','$td')";

            mysqli_query($conn,$sql1);
            set_time_limit(500);
            $jumlahData++;
        }
        if ($jumlahData>0) {
            $success = "$jumlahData data berhasil dimasukkan";
        }
    }
    if ($err) {
        ?>
        <div class="alert alert_danger">
            <ul><?php echo $err ?></ul>
        </div>
        <?php
    }
    if ($success) {
        ?>
        <div class="alert alert-primary">
            <?php echo $success ?>
        </div>
        <?php
    }
}