<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$json = [];

$kontrolNot = null;

   if($_POST['inp-kontrol-seans-ids'] &&
      $_POST['inp-kontrol-seans-tarih'] &&
      $_POST['inp-kontrol-seans-start'] &&
      !empty($_POST['inp-odaSecimiKontrol']) &&
      $_POST['inp-kontrol-seans-durum']==0 || $_POST['inp-kontrol-seans-durum']==1 || $_POST['inp-kontrol-seans-durum']==2
      )
   {
      $seansID            = $_POST['inp-kontrol-seans-ids'];
      $dataKontrolTarih   = $_POST['inp-kontrol-seans-tarih'];
      $dataKontrolSaat    = $_POST['inp-kontrol-seans-start'];
      $dataKontrolDurum   = $_POST['inp-kontrol-seans-durum'];
      if($_POST['inp-kontrol-not']){
         $kontrolNot         = $_POST['inp-kontrol-not'];
      }
      $dataEkleUserID     = $user_ID;
      $bugun = date('Y-m-d');
      $dataKontrolOdaSec = $_POST['inp-odaSecimiKontrol'];

      $result = $db->query("SELECT * FROM tbl_seans_kontrol WHERE SEANS_ID = '$seansID'")->fetch(PDO::FETCH_ASSOC);

      if($dataKontrolTarih>$bugun AND $dataKontrolDurum == 1 OR $dataKontrolDurum == 0){

         if(empty($result)){
            $query = $db->prepare("INSERT INTO tbl_seans_kontrol SET
               FIRMA_ID = '$user_Firma',
               SUBE_ID = '$user_Sube',
               SEANS_ID = '$seansID',
               KONTROL_TARIH = '$dataKontrolTarih',
               KONTROL_SAAT = '$dataKontrolSaat',
               KONTROL_DURUM = '$dataKontrolDurum',
               RESOURCE_ID = '$dataKontrolOdaSec',
               KONTROL_NOT = '$kontrolNot',
               UID = $dataEkleUserID
            ")->execute();      
         }else{
            $query = $db->prepare("UPDATE tbl_seans_kontrol SET
               FIRMA_ID = '$user_Firma',
               SUBE_ID = '$user_Sube',
               KONTROL_TARIH = '$dataKontrolTarih',
               KONTROL_SAAT = '$dataKontrolSaat',
               KONTROL_DURUM = '$dataKontrolDurum',
               RESOURCE_ID = '$dataKontrolOdaSec',
               KONTROL_NOT = '$kontrolNot',
               UID = $dataEkleUserID
               WHERE SEANS_ID = '$seansID'
            ")->execute();      
         }
         if($query){$json[]=['code'=> 1000,'status'=>'success'];
         }
      }else if($dataKontrolTarih>$bugun AND $dataKontrolDurum !== 1){
         $json[]=['code' => 1010, 'because' => 'No action can be taken for the next date'];
      }

      if($dataKontrolTarih<=$bugun){
         if(empty($result)){
            $query = $db->prepare("INSERT INTO tbl_seans_kontrol SET
               FIRMA_ID = '$user_Firma',
               SUBE_ID = '$user_Sube',
               SEANS_ID = '$seansID',
               KONTROL_TARIH = '$dataKontrolTarih',
               KONTROL_SAAT = '$dataKontrolSaat',
               KONTROL_DURUM = '$dataKontrolDurum',
               RESOURCE_ID = '$dataKontrolOdaSec',
               KONTROL_NOT = '$kontrolNot',
               UID = $dataEkleUserID
            ")->execute();
         }else{
            $query = $db->prepare("UPDATE tbl_seans_kontrol SET
               FIRMA_ID = '$user_Firma',
               SUBE_ID = '$user_Sube',
               KONTROL_TARIH = '$dataKontrolTarih',
               KONTROL_SAAT = '$dataKontrolSaat',
               KONTROL_DURUM = '$dataKontrolDurum',
               RESOURCE_ID = '$dataKontrolOdaSec',
               KONTROL_NOT = '$kontrolNot',
               UID = $dataEkleUserID
               WHERE SEANS_ID = '$seansID'
            ")->execute();
         }
         if($query){$json[]=['code'=> 1000,'status'=>'success'];
         }
      }
   }else{
      $json[]=['code'=> 1012, 'status' => false, 'because' => 'There are empty fields'];
   }
   echo json_encode($json);
?>