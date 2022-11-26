<?php 
   include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

   $seanstarih   = date('Y-m-d', strtotime($_GET['inp-seans-tarih']));
   $seansstart   = date('H:i', strtotime($_GET['inp-seans-tarih']));
   $estID   = $_GET['select2estetisyen'];
   $seansdurum   = $_GET['inp-seans-durum'];
   $ids          = $_GET['inp-edit-seans-ids'];
   $seansNot    = $_GET['inp-seans-not'];
   $bugun = date('Y-m-d');
   $json = [];

   $regionSelected = '';
   $regionSelecteds = '';
   $seansOda     = '';
   $regionSelectContinue = null;
   
   if(!empty($_GET['regionSelected'])){
      $regionSelected = $_GET['regionSelected'];
      $regionSelecteds = implode(", ",$regionSelected);
   }

   if(!empty($_GET['inp-odaSecimiSeans'])){
      $seansOda = $_GET['inp-odaSecimiSeans'];
      $seansOdaID = $seansOda;
      // $QSessionID = $db->query("SELECT ID FROM tbl_firma_resources WHERE ROOM_ID = '{$seansOda}'")->fetch(PDO::FETCH_ASSOC);
      // if ( $QSessionID ){
      //    $seansOdaID = $QSessionID['ID'];
      // }
   }

   if ($seansdurum == 1 || $seansdurum == 0){
      $query  = $db->prepare(
         "UPDATE tbl_seans_detay SET
         SEANS_DURUM = '$seansdurum',
         EST_ID = '$estID',
         SEANS_NOT   = '$seansNot',
         RESOURCE_ID = '$seansOdaID'
         WHERE ID = $ids"
      );
      $update = $query->execute();
      if($update){
         $json[]=['code'=> 1000,'status'=>'success'];
      }
   }else if($seanstarih > $bugun && ($seansdurum == 1 || $seansdurum == 0)){
      $query  = $db->prepare(
         "UPDATE tbl_seans_detay SET
         EST_ID = '$estID',
         SEANS_TARIH = '$seanstarih',
         SEANS_SAAT  = '$seansstart',
         SEANS_DURUM = '$seansdurum',
         HIZMET_BOLGE = '$regionSelecteds',
         SEANS_NOT   = '$seansNot',
         RESOURCE_ID = '$seansOdaID'
         WHERE ID = $ids"
      );
      $update = $query->execute();
      if($update){
         $json[]=['code'=> 1000,'status'=>'success'];
      }
   }else if($seanstarih > $bugun && ($seansdurum !== 1 || $seansdurum !==0)){
      $json[]=['code' => 1010, 'because' => 'No action can be taken for the next date'];
   }

   if(empty($regionSelected)){
      $QSessionID = $db->query("SELECT KART_ID FROM tbl_seans_detay WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
      if ( $QSessionID ){
         $kartID = $QSessionID['KART_ID'];
         $QSessionRegion = $db->query("SELECT BOLGE_ID FROM tbl_seans_kart WHERE ID = '{$kartID}'")->fetch(PDO::FETCH_ASSOC);
         if ( $QSessionRegion ){
            if($QSessionRegion['BOLGE_ID']>0){
               $regionSelectContinue = false;
            }else{
               $regionSelectContinue = true;
            }

         }
      }
      if($regionSelectContinue==true && $seanstarih<=$bugun){
         $query  = $db->prepare(
            "UPDATE tbl_seans_detay SET
            SEANS_TARIH = '$seanstarih',
            EST_ID = '$estID',
            SEANS_SAAT  = '$seansstart',
            SEANS_DURUM = '$seansdurum',
            HIZMET_BOLGE = '',
            RESOURCE_ID = '$seansOdaID',
            SEANS_NOT = '$seansNot'
            WHERE ID = $ids"
         );
         $update = $query->execute();
         if($update){
            $json[]=['code'=>1000,'status'=>'success'];
         }
      }else{
         // $json[]=['code' => 1011, 'status'=> false, 'because' => 'No session selected 1'];
         $query  = $db->prepare(
            "UPDATE tbl_seans_detay SET
            SEANS_TARIH = '$seanstarih',
            EST_ID = '$estID',
            SEANS_SAAT  = '$seansstart',
            SEANS_DURUM = '$seansdurum',
            HIZMET_BOLGE = '',
            RESOURCE_ID = '$seansOdaID',
            SEANS_NOT = '$seansNot'
            WHERE ID = $ids"
         );
         $update = $query->execute();
         if($update){
            $json[]=['code'=>1000,'status'=>'success'];
         }

      }

      
   }else{
      if( empty($regionSelected) AND $seanstarih<=$bugun){
         $json[]=['code' => 1011, 'status'=> false, 'because' => 'No session selected 2'];
      }else if(!empty($regionSelected) AND $seanstarih<=$bugun){
            $query  = $db->prepare(
               "UPDATE tbl_seans_detay SET
               EST_ID = '$estID',
               SEANS_TARIH = '$seanstarih',
               SEANS_SAAT  = '$seansstart',
               SEANS_DURUM = '$seansdurum',
               HIZMET_BOLGE = '$regionSelecteds',
               RESOURCE_ID = '$seansOdaID'
               WHERE ID = $ids"
            );
            $update = $query->execute();
            if($update){
               $json[]=['code'=>1000,'status'=>'success'];
            }
      }
   }
   echo json_encode($json);

?>