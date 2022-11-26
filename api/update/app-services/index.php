<?php
   include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

   $durum = 1;

   if($_GET['inp-edit-hizmet-adi']){ $hizmetadi  = $_GET['inp-edit-hizmet-adi']; }
   if($_GET['inp-edit-fiyat']){           $fiyat  = $_GET['inp-edit-fiyat']; }
   if($_GET['hizmetid']){                 $ids  = $_GET['hizmetid']; }
   if(!empty($_GET['hizmetBolgesi'])){
      $hizmetBolgesi = $_GET['hizmetBolgesi'];
      $regionSelecteds = implode(", ",$hizmetBolgesi);
      $GetWithoutCommas = array_map('intval', explode(', ', $regionSelecteds));
   }
   if(!empty($_GET['inp-edit-hizmet-suresi'])){
      $hizmetsuresi  = $_GET['inp-edit-hizmet-suresi'];
      $query = $db->query("SELECT * FROM tbl_hizmet_sure where ID = '{$hizmetsuresi}'")->fetch(PDO::FETCH_ASSOC);
      $hizmetsuresi = $query['ADI'];
   }
   if(!empty($_GET['inp-edit-seans-sayisi'])){
      $seanssayisi  = $_GET['inp-edit-seans-sayisi'];
      $query = $db->query("SELECT * FROM tbl_hizmet_seans where ID = '{$seanssayisi}'")->fetch(PDO::FETCH_ASSOC);
      $seanssayisi = $query['ADI'];
   }

   if(!empty($seanssayisi) && !empty($hizmetsuresi) && !empty($hizmetBolgesi)){
      $query = $db->prepare("UPDATE tbl_hizmet SET
                              FIRMA_ID = ?,
                              SUBE_ID = ?,
                              DURUM = ?,
                              HIZMET_ADI = ?,
                              HIZMET_SURE = ?,
                              HIZMET_SEANS = ?,
                              HIZMET_FIYAT = ?,
                              REGIONS = ?,
                              UPD_UID = ?
                              WHERE ID = $ids");
      $update = $query->execute(array(
                                 $user_Firma,
                                 $user_Sube,
                                 $durum,
                                 $hizmetadi,
                                 $hizmetsuresi,
                                 $seanssayisi,
                                 $fiyat,
                                 $regionSelecteds,
                                 $user_ID
                              ));
                              
        if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
        else{           $json=['code'=> 1001, 'status' => false]; }
   }else if(!empty($hizmetsuresi)){
        $query        = $db->prepare("UPDATE tbl_hizmet SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        DURUM = ?,
        HIZMET_ADI = ?,
        HIZMET_SURE = ?,
        HIZMET_FIYAT = ?,
        UPD_UID = ?
        WHERE ID      = $ids");
        $update       = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $durum,
            $hizmetadi,
            $hizmetsuresi,
            $fiyat,
            $user_ID
        ));
        if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
        else{           $json=['code'=> 1001, 'status' => false]; }
   }else if(!empty($seanssayisi)){
        $query        = $db->prepare("UPDATE tbl_hizmet SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        DURUM = ?,
        HIZMET_ADI = ?,
        HIZMET_SEANS = ?,
        HIZMET_FIYAT = ?,
        UPD_UID = ?
        WHERE ID      = $ids");
        $update       = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $durum,
            $hizmetadi,
            $seanssayisi,
            $fiyat,
            $user_ID
        ));
        if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
        else{           $json=['code'=> 1001, 'status' => false]; }
   }else if(!empty($hizmetBolgesi)){


          $arr = [];
          $arr2 = [];
          $arr3 = [];
          $query = $db->query("SELECT BOLGE_ID FROM tbl_seans_kart WHERE HIZMET_ID = $ids AND FIRMA_ID = $user_Firma", PDO::FETCH_ASSOC);
          if ( $query->rowCount() ){
               foreach( $query as $row ){
                    $withoutCommas = array_map('intval', explode(', ', $row['BOLGE_ID']));

                    $arr[]=[
                         'id'   => $withoutCommas
                    ];

               }
          }

          $last_names = array_column($arr, 'id');

          foreach ($last_names as $key => $value) {
               foreach ($value as $keys => $values) {
                    array_push($arr2, $values);
               }
          }
          $a1 = array_unique($arr2);
          $a2 = array_filter($a1);
          foreach ($a2 as $key => $value) {
               array_push($arr3, $value);
          }
          $ArrDiffs = (array_diff($arr3, $GetWithoutCommas));
          
          if(count($ArrDiffs)>0){
               $requireValues = [];
               foreach($ArrDiffs as $key => $value){
                    array_push($requireValues, $value);
               }
               $json=[
                    'status'=> false,
                    'message' => 'not deleted!',
                    'requireID'=> $requireValues
                    ];
   
          }else{ 
               
               $query        = $db->prepare("UPDATE tbl_hizmet SET
               FIRMA_ID = ?,
               SUBE_ID = ?,
               DURUM = ?,
               HIZMET_ADI = ?,
               REGIONS = ?,
               HIZMET_FIYAT = ?,
               UPD_UID = ?
               WHERE ID      = $ids");
               $update       = $query->execute(array(
               $user_Firma,
               $user_Sube,
               $durum,
               $hizmetadi,
               $regionSelecteds,
               $fiyat,
               $user_ID
               ));
               if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
               else{           $json=['code'=> 1001, 'status' => false]; }
          }

   }else if(empty($seanssayisi) && empty($hizmetsuresi) && empty($hizmetBolgesi)){
        $query        = $db->prepare("UPDATE tbl_hizmet SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        DURUM = ?,
        HIZMET_ADI = ?,
        HIZMET_FIYAT = ?,
        UPD_UID = ?
        WHERE ID      = $ids");
        $update       = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $durum,
            $hizmetadi,
            $fiyat,
            $user_ID
        ));
        if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
        else{           $json=['code'=> 1001, 'status' => false]; }

   }else{
        $json=['code'=> 1012, 'status' => false];
   }

   echo json_encode($json);

?>