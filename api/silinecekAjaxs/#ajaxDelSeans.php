<?php
include '../header-top.php';
   $json = [];
   
   $id           = $_GET['id'];
   $queryS = $db->prepare("DELETE FROM tbl_seans_detay WHERE ID = :id AND FIRMA_ID = :firmaID");
   $queryK = $db->prepare("DELETE FROM tbl_seans_kontrol WHERE SEANS_ID = :id AND FIRMA_ID = :firmaID");
   $deleteS = $queryS->execute(array(
      'id' => $id,
      'firmaID' => $user_Firma
   ));
   $deleteK = $queryK->execute(array(
      'id' => $id,
      'firmaID' => $user_Firma
   ));

   if ( $deleteS && $deleteK){
      $json[]=['code'=>1000,'status'=>'success'];
   }else{
      $json[]=['code'=>1001,'status'=>'Unsuccessful'];
   }

   echo json_encode($json);
?>
