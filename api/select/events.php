<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$getStart = $_GET['start'];
$Startfixed = date('Y-m-d', strtotime($getStart));

$getEnd = $_GET['end'];
$Endfixed = date('Y-m-d', strtotime($getEnd));
$suan = date('Y-m-d H:i:s');


$seans = array();
$kontrol = array();

//estetisyen tüm hastaları görebilir.
// onlyCompleted
// onlyCame
// onlyWait
// onlyCancel
if(isset($_GET['onlyCompleted'])){
    $Qseans = "SELECT * FROM view_takvim_kart_seans WHERE FIRMA_ID=$user_Firma AND ( DATE(START) >= '$Startfixed' AND  DATE(START) <= '$Endfixed' ) AND Completion_Status = 0";
}else if(isset($_GET['onlyCame'])){
    $Qseans = "SELECT * FROM view_takvim_kart_seans WHERE FIRMA_ID=$user_Firma AND ( DATE(START) >= '$Startfixed' AND  DATE(START) <= '$Endfixed' ) AND SEANS_DURUM = 2";
}else if(isset($_GET['onlyWait'])){
    $Qseans = "SELECT * FROM view_takvim_kart_seans WHERE FIRMA_ID=$user_Firma AND ( DATE(START) >= '$Startfixed' AND  DATE(START) <= '$Endfixed' ) AND SEANS_DURUM = 0";
}else if(isset($_GET['onlyCancel'])){
    $Qseans = "SELECT * FROM view_takvim_kart_seans WHERE FIRMA_ID=$user_Firma AND ( DATE(START) >= '$Startfixed' AND  DATE(START) <= '$Endfixed' ) AND SEANS_DURUM = 1";
}else{
    $Qseans = "SELECT * FROM view_takvim_kart_seans WHERE FIRMA_ID=$user_Firma AND ( DATE(START) >= '$Startfixed' AND  DATE(START) <= '$Endfixed' )";
}
$events = $db->query($Qseans, PDO::FETCH_ASSOC);

$Qkontrol = "SELECT * from view_kontrols WHERE FIRMA_ID=$user_Firma AND  DATE(START) >= '$Startfixed' AND  DATE(START) <= '$Endfixed'";
$kontroller = $db->query($Qkontrol, PDO::FETCH_ASSOC);

foreach($events as $event){
    if($event['SEANS_DURUM'] == 0){ $colors = "#B8C2CC";}else //bekleyen
    if($event['SEANS_DURUM'] == 1){ $colors = "#E83E8C";}else //iptal
    if($event['SEANS_DURUM'] == 2){ $colors = "#28C76F";} // gelen

    if($event['Completion_Status'] == 0){ $colors = "#7367f0"; }
    
    $seans[] = array(
        "id" =>  $event['ID'],
        "resourceId" => $event['ROOM_ID'],
        "title" => $event['ADI_SOYADI'].' (SEANS)',
        "description" => '<i>Hizmet:</i><b> ['.$event['TITLE'].'] </b><br><i>Estetisyen:</i> <b>['.
        $event['ESTETISYENADI']. ']</b><br><i>Seans Süresi:</i><b> ['. $event['SEANS_SURECI']. ']</b><br><i>Kaçıncı Seans:</i> <b>['. $event['SEANS_ID']. '. SEANS]</b><br><i>Oda Bilgisi:</i> <b>['. $event['ROOM_ID']. ']</b><br><i>Seans Notu:</i> <b>['. $event['SEANS_NOT']. ']</b><br><br><i>Telefon:</i> <b>['. PhoneConvert($event['TELEFON']). ']</b>',
        "start" => $event['START'],
        "end" => $event['END'],
        "allDay" => 'false',
        "color" => $colors
        // "color" => $event['ROOM_COLOR']
    );
}

if(isset($_GET['onlyCompleted']) || isset($_GET['onlyCame']) || isset($_GET['onlyWait']) || isset($_GET['onlyCancel'])){
}else{
    foreach( $kontroller as $row ){
        if($row['KONTROL_DURUM'] == 0){ $colors = "#B8C2CC";}else
        if($row['KONTROL_DURUM'] == 1){ $colors = "#E83E8C";}else
        if($row['KONTROL_DURUM'] == 2){ $colors = "#28C76F";}
    
        $kontrol[] = array(
            "id" => $row['ID'],
            "resourceId" => $row['ROOM_ID'],
            "title" => $row['TITLE'].' (KNTRL)',
            // "title"=> '(KNTRL) '.$row['TITLE'].' Est.:'.$row['ESTETISYENADI'],
            "description" => '<i>Hizmet:</i><b> ['.$event['TITLE'].'] </b><br><i>Estetisyen:</i> <b>['.
            $event['ESTETISYENADI']. ']</b><br><i>Seans Süresi:</i><b> ['. $event['SEANS_SURECI']. ']</b><br><i>Kaçıncı Seans:</i> <b>['. $event['SEANS_ID']. '. SEANS]</b><br><i>Oda Bilgisi:</i> <b>['. $event['ROOM_ID']. ']</b><br><br><i>Telefon:</i> <b>['. PhoneConvert($row['CEP']). ']</b>',
    
            // "description" => mb_strtoupper($row['ESTETISYENADI']),
            "start" => $row['START'],
            "end" => "",
            "allDay" =>"false",
            "color" => $colors
        );
    }

}

$result = array_merge($seans, $kontrol);
echo json_encode($result);