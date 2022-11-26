<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

  $durum = 1;
  $myArray = array();
  $merge =[];
  if(isset($_POST['ids'])){
    $ids = $_POST['ids'];
    
    $Qsessions = $db->query("SELECT * FROM tbl_seans_detay WHERE RESOURCE_ID = '{$ids}' AND FIRMA_ID = '{$user_Firma}'", PDO::FETCH_ASSOC);
    $QcontrolSessions = $db->query("SELECT * FROM tbl_seans_kontrol WHERE RESOURCE_ID = '{$ids}' AND FIRMA_ID = '{$user_Firma}'", PDO::FETCH_ASSOC);
    
    if($Qsessions->rowCount()>0 || $QcontrolSessions->rowCount()){
          $array_name0 = array( 'status'=> false, 'because'=>'cannot be deleted!' );
          if($Qsessions->rowCount()){ $array_name1 = array( 'SessionsCount'=> $Qsessions->rowCount() ); }else{ $array_name1 = []; }
          if($QcontrolSessions->rowCount()){ $array_name2 = array( 'ControlSessionsCount'=>$QcontrolSessions->rowCount() ); }else{ $array_name2 = []; }
          $merge = array_merge($array_name0,$array_name1,$array_name2);
      }else{
        $QroomCheck = $db->query("SELECT * FROM tbl_firma_resources WHERE ID = '{$ids}' AND FIRMA_ID = '{$user_Firma}'", PDO::FETCH_ASSOC);
        if($QroomCheck->rowCount()>0){

          $query = $db->prepare("UPDATE tbl_firma_resources SET STATUS = 0 WHERE ID = ? AND FIRMA_ID = ?");
          $update = $query->execute(array($ids,$user_Firma));
          if ( $update ){ $myArray=['status'=>true];}
       
        }else{ $myArray=['id'=>false]; }
      }
  }else{$myArray=['status'=> false];}

  if(count($merge)>0){
    echo json_encode($merge);
  }else{
    echo json_encode($myArray);
  }
?>