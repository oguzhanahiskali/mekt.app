<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
if( isset($_POST['eventID']) && isset($_POST['newDT']) && isset($_POST['newRoom']) ){
    $eventID    = $_POST['eventID'];
    $newDT      = $_POST['newDT'];
    $newRoom    = $_POST['newRoom'];
    $sessionType = $_POST['sessionType'];
    

    $QroomDetection = $db->query("SELECT * FROM tbl_firma_resources WHERE FIRMA_ID = '{$user_Firma}' and ROOM_ID = '{$newRoom}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){ $newRoomID = $QroomDetection['ID']; }

    $PostNewDate = date("Y-m-d", strtotime($newDT));
    $PostNewTime = date("H:i:s", strtotime($newDT));


    // select * from tbl_seans_detay where ID = 9929

    if($sessionType=='seans'){
        $Q = "UPDATE tbl_seans_detay SET SEANS_TARIH = '$PostNewDate', SEANS_SAAT = '$PostNewTime', RESOURCE_ID = $newRoomID WHERE FIRMA_ID = $user_Firma AND ID = $eventID";
        $UdayOfWork = $db->prepare($Q);
        $update = $UdayOfWork->execute();
        if ($update ){ $jsonResults=['code'=> 1000,'status'=>true, 'focusDate'=> $PostNewDate ]; }
        else{ $jsonResults=['code'=> 1001,'status'=>false ]; }
    }else if($sessionType=='kontrol'){
        //TBL_SEANS_KONTROL >>> FIRMA ID LERİ UPDATE EDİLDİKTEN SONRA ALTTAKİ COMMENT SATIRI ÇALIŞACAK
        // $Q = "UPDATE tbl_seans_kontrol SET KONTROL_TARIH = '$PostNewDate', KONTROL_SAAT = '$PostNewTime', RESOURCE_ID = $newRoomID WHERE FIRMA_ID = $user_Firma AND SEANS_ID = $eventID";
        $Q = "UPDATE tbl_seans_kontrol SET KONTROL_TARIH = '$PostNewDate', KONTROL_SAAT = '$PostNewTime', RESOURCE_ID = $newRoomID WHERE SEANS_ID = $eventID";
        $UdayOfWork = $db->prepare($Q);
        $update = $UdayOfWork->execute();
        if ($update ){ $jsonResults=['code'=> 1000,'status'=>true, 'focusDate'=> $PostNewDate ]; }
        else{ $jsonResults=['code'=> 1001,'status'=>false ]; }
    }

}else{ $jsonResults=['code'=> 2000,'status'=>false ]; }

echo json_encode($jsonResults);
