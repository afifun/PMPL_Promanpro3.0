<style type="text/css">
.button input{
    margin-right: 5px;
}
</style>

<?php

$tanggalAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->StartDate);
$tanggalAkhir = strtoTime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->EndDate);
$detik = $tanggalAkhir - $tanggalAwal;
$hari = ($detik / 86400) + 1;

$jamAwal = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->StartTime);
$jamAkhir = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->EndTime);
$detik2 = ($jamAkhir - $jamAwal) / 3600;
$jumlahJam = $detik2;
echo '<h1>Book up your time</h1>';
echo '<form method="post">';
echo '<table class="table">';
echo '<tr>';
$hariTemp = $tanggalAwal;
echo '<td> Hour\Date </td>';
for ($j = 0; $j < $hari; $j++) {
    $tanggalan = date('j-F-Y', $hariTemp);
    $hariKedua = $hariTemp + 60 * 60 * 24;
    echo '<td>' . $tanggalan . '</td>';
    $hariTemp = $hariKedua;
}
echo '</tr>';
$jamTemp = strtotime(Bookme::model()->findByAttributes(array('IdBookMe' => $idBookMe))->StartTime);
$hariTemp = $tanggalAwal;
for ($i = 0; $i < $jumlahJam; $i++) {
    $tanggalan = date('l j-F-Y', $hariTemp);
    $waktu = date('H:i', $jamTemp);
    $jamKedua = $jamTemp + 60 * 60;
    $hariKedua = $hariTemp + 60 * 60 * 24;
    $waktu2 = date('H:i', $jamKedua);
    $tanggalan2 = date('H:i', $jamTemp);
    echo '<tr>';
    echo '<td>' . $waktu . '-' . $waktu2 . '</td>';
    for ($j = 0; $j < $hari; $j++) {
        $record = Blockjam::model()->findByAttributes(array('idBookMe' => $idBookMe, 'KoorX' => $j, 'KoorY' => $i));
        if ($record != null) {
            $status = $record->Status;
            $pemesan = $record->Pemesan;
            echo "<td><button type='button' disabled>Taken by: " . $pemesan . "<br>Status: " . $status . "</button></td>";
            //echo '<td><button type="button" disabled>Admin is BUSY here.</button></td>';
        } else {
            echo '<td><button type="submit" name="posisi[' . $i . '][' . $j . ']">Empty</button></td>';
        }
    }
    $jamTemp = $jamKedua;
    $hariTemp = $hariKedua;
    echo '</tr>';
}
echo '</table>';
//echo '<div class="row">';
echo '<div class="button">';
echo CHtml::Button('Save', array('submit' => array('project/'.$id)));
echo CHtml::Button('Cancel', array('submit' => array('project/'.$id)));
echo '</div>';
//echo '</div>';
echo '</form>';

?>
