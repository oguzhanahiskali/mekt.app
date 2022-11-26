<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
   $myArray = array();
   if(isset($_POST['inp-add-roomName']) && isset($_POST['inp-add-roomID']) && isset($_POST['inp-add-roomColor'])){
      $roomName = $_POST['inp-add-roomName'];
      $roomID = 'Oda'.$_POST['inp-add-roomID'];
      $color = $_POST['inp-add-roomColor'];
      $colorConvert = 'var(--'.$color.')';

      $query = $db->query("SELECT * FROM tbl_firma_resources WHERE ROOM_ID = '{$roomID}' AND FIRMA_ID = '{$user_Firma}'")->fetch(PDO::FETCH_ASSOC);
      if ( $query ){
        $myArray=['status'=>false, 'because'=>'already in use'];
      }else{
        $query = $db->prepare("INSERT INTO tbl_firma_resources SET ROOM_NAME = ?, ROOM_ID = ?, COLOR = ?, FIRMA_ID = ?, SUBE_ID = ?, STATUS = 1");
        $update = $query->execute(array($roomName,$roomID,$colorConvert,$user_Firma, $user_Sube));
        if($update) $myArray=['status'=>true];
      }


}else{ $myArray=['status'=>false]; }

echo json_encode($myArray);

?>