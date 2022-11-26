<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';


  $json = [];
  $sql = "SELECT * FROM view_sms_status WHERE FIRMA_ID=$user_Firma";
  $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
  if($result){
    $Totals = $result['TOTAL'];
    $Useds = $result['USED'];
    $Available = $Totals-$Useds;
      $json[] =	[
        'Total'		=> intval($result['TOTAL']),
        'Used'	=> intval($result['USED']),
        'Available' => intval($Available)
      ]; 
  }else{
    $json[] =	[
      'Total'		=> intval(null),
      'Used'	=> intval(null),
      'Available' => intval(null)
    ]; 
  }
  echo json_encode($json);
  $fp = fopen('available-sms.json', 'w');
  fwrite($fp, json_encode($json));
  fclose($fp);
