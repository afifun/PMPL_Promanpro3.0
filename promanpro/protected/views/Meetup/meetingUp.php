<?php

$tanggalAwal = strtotime(Meetup::model()->findByAttributes(array('IdMeetup'=>$IdMeetup))->StartDay);
$tanggalAkhir = strtoTime(Meetup::model()->findByAttributes(array('IdMeetup'=>$IdMeetup))->EndDay);
$detik = $tanggalAkhir - $tanggalAwal;
$hari = ($detik/86400)+1;

$jamAwal = strtotime(Meetup::model()->findByAttributes(array('IdMeetup'=>$IdMeetup))->StartTime);
$jamAkhir = strtotime(Meetup::model()->findByAttributes(array('IdMeetup'=>$IdMeetup))->EndTime);
$detik2 = ($jamAkhir - $jamAwal)/3600;
$jumlahJam = $detik2;
echo '<h1>Select your meeting time</h1>';
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
$jamTemp = strtotime(Meetup::model()->findByAttributes(array('IdMeetup'=>$IdMeetup))->StartTime);
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
        $jumlah = count(Blockmeetup::model()->findAllByAttributes(array('KoorX'=>$j,'KoorY'=>$i,'IdMeetUp'=>$IdMeetup)));
        $checking = '';
        $recorder = Blockmeetup::model()->findByAttributes(array('Pemesan'=> Yii::app()->user->name,'KoorX'=>$j,'KoorY'=>$i,'IdMeetUp'=>$IdMeetup));
        if($recorder!=null){
            $checking = 'checked';
        }
        echo '<td><input type="checkbox" name="koordinat['.$i.']['.$j.']" value="1" '.$checking.'> '.$jumlah.'</td>';
    }
    $jamTemp = $jamKedua;
    $hariTemp = $hariKedua;
    echo '</tr>';
}
echo '</table>';
echo '<div class="row button">';
echo '<input type="submit" value="Submit" name="meetingUp">';
echo CHtml::Button('Back', array('submit' => array('project/'.$id)));
echo '</div>';
echo '</form>';
?>


