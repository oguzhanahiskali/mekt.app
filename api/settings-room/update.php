<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

  $durum = 1;
  $myArray = array();
  $AllreadyArr = [];

  if(isset($_POST['inp-edit-roomName']) && isset($_POST['inp-edit-roomID']) && isset($_POST['inp-edit-roomColor']) && isset($_POST['inp-edit-id'])){
      $roomName = $_POST['inp-edit-roomName'];
      $roomID = 'Oda'.$_POST['inp-edit-roomID'];
      $color = $_POST['inp-edit-roomColor'];
      $ids = $_POST['inp-edit-id'];

      $colorConvert = 'var(--'.$color.')';

      $query = $db->query("SELECT * FROM tbl_firma_resources WHERE FIRMA_ID = '{$user_Firma}' AND ROOM_ID = '{$roomID}'")->fetch(PDO::FETCH_ASSOC);
      if ( $query ){
        if($query['ID']==$ids){
          $query = $db->prepare("UPDATE tbl_firma_resources SET ROOM_NAME = ?, ROOM_ID = ?, COLOR = ? WHERE ID = ? AND FIRMA_ID = ?");
          $update = $query->execute(array($roomName,$roomID,$colorConvert,$ids,$user_Firma));
          if ( $update ){ $myArray=['status'=>true];}  
        }else{
          $myArray=['status'=> false, 'because'=> 'already in use'];
        }
      }else{
        $query = $db->prepare("UPDATE tbl_firma_resources SET ROOM_NAME = ?, ROOM_ID = ?, COLOR = ? WHERE ID = ? AND FIRMA_ID = ?");
        $update = $query->execute(array($roomName,$roomID,$colorConvert,$ids,$user_Firma));
        if ( $update ){ $myArray=['status'=>true];}
      }
      // $query = $db->query("SELECT * FROM tbl_firma_resources WHERE FIRMA_ID = '{$user_Firma}' AND ROOM_ID = '{$roomID}'", PDO::FETCH_ASSOC);
      // if ( $query->rowCount()>0 ){
      //   foreach( $query as $row ){
      //     $AllreadyArr[]= [
      //       'id'=> $row['ID']
      //     ];
      //   }
      //   print_r($AllreadyArr);
      //   $myArray=['status'=> false, 'because'=> 'already in use'];
      // }else{
      //   // $query = $db->prepare("UPDATE tbl_firma_resources SET ROOM_NAME = ?, ROOM_ID = ?, COLOR = ? WHERE ID = ? AND FIRMA_ID = ?");
      //   // $update = $query->execute(array($roomName,$roomID,$colorConvert,$ids,$user_Firma));
      //   // if ( $update ){ $myArray=['status'=>true];}
      // }

  }else{$myArray=['status'=> false];}

echo json_encode($myArray);
?>