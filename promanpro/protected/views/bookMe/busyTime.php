<?php
$tanggalAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe'=>$idBookMe))->StartDate);
$tanggalAkhir = strtoTime(Bookme::model()->findByAttributes(array('IdBookMe'=>$idBookMe))->EndDate);
$detik = $tanggalAkhir - $tanggalAwal;
$hari = ($detik/86400)+1;

$jamAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe'=>$idBookMe))->StartTime);
$jamAkhir = strtotime(Bookme::model()->findByAttributes(array('IdBookMe'=>$idBookMe))->EndTime);
$detik2 = ($jamAkhir - $jamAwal)/3600;
$jumlahJam = $detik2;
echo '<h1>Select your busy time</h1>';
echo '<form method="post">';
echo '<table class="table">';
echo '<tr>';
$hariTemp = $tanggalAwal;
echo '<td> Hour\Date </td>';
for($j=0; $j<$hari; $j++){
        $tanggalan = date('j-F-Y',$hariTemp);
        $hariKedua = $hariTemp + 60*60*24;
        echo '<td>'.$tanggalan.'</td>';
        $hariTemp = $hariKedua;
}
echo '</tr>';
$jamTemp = strtotime(Bookme::model()->findByAttributes(array('IdBookMe'=>$idBookMe))->StartTime);
$hariTemp = $tanggalAwal;
for($i = 0; $i<$jumlahJam; $i++){
    $tanggalan = date('l j-F-Y',$hariTemp);
    $waktu = date('H:i', $jamTemp);
    $jamKedua = $jamTemp + 60*60;
    $hariKedua = $hariTemp + 60*60*24;
    $waktu2 = date('H:i', $jamKedua);
    $tanggalan2 = date('H:i', $jamTemp);
    echo '<tr>';
    echo '<td>'.$waktu.'-'.$waktu2.'</td>';
    for($j=0; $j<$hari; $j++){
        echo '<td><input type="checkbox" name="koordinat['.$i.']['.$j.']" value="1"></td>';
    }
    $jamTemp = $jamKedua;
    $hariTemp = $hariKedua;
    echo '</tr>';
}
echo '</table>';
echo '<div class="button">';
echo '<input type="submit" value="submit" name="busyTime">';
echo CHtml::Button('Cancel', array('submit' => array('project/'.$idp)));
echo '</div>';
echo '</form>';
?>
