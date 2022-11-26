<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$getStart = $_GET['start'];
$Startfixed = date('Y-m-d', strtotime($getStart));

$getEnd = $_GET['end'];
$Endfixed = date('Y-m-d', strtotime($getEnd));


$jsonMeeting = array();

$Qseans = "SELECT * FROM view_meetingAppointment WHERE FIRMA_ID=$user_Firma AND ( DATE(START) >= '$Startfixed' AND  DATE(START) <= '$Endfixed' )";

$events = $db->query($Qseans, PDO::FETCH_ASSOC);

foreach($events as $event){
    $jsonMeeting[] = array(
        "id" =>  $event['ID'],
        "title" => $event['CUSTOMER'].' ['.$event['SERVICE'].']',
        "description" => '<i>Hizmet:</i><b> ['.$event['SERVICE'].'] </b><br><i>Estetisyen:</i> <b>['.
        mb_strtoupper($event['STAFF']). ']</b><br><i>Görüşme Notu:</i> <b>['. $event['NOTE']. ']</b><br><br><i>Telefon:</i> <b>['. PhoneConvert($event['CUSTOMER_PHONE']). ']</b>
        ',
        "start" => $event['START'],
        "end" => $event['START'],
        "allDay" => 'false',
    );
}
echo json_encode($jsonMeeting);