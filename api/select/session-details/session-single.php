<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$json = [];
$jsonPhoto = [];

if(!empty($_POST['CID']) && !empty($_POST['CID'])){

  $cid = $_POST['CID'];
  $sid = $_POST['SID'];

  $sql = "SELECT ID, AREA FROM view_regions_id";
  $result = $mysqli->query($sql);

  $selectedRegions = $db->query("SELECT BOLGE_ID FROM tbl_seans_kart WHERE ID = '{$cid}' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
  if ( $selectedRegions ){
      // $selectedList = $selectedRegions['BOLGE_ID'];
      // $SelectedArr = explode(', ',$selectedList);
      $SelectedArr = explode(',', $selectedRegions['BOLGE_ID'] ?? '');
  }

  while($row = $result->fetch_assoc()){
      $json['allRegions'][]=[
          'id'        => $row['ID'],
          'text'    => $row['AREA']
      ]; 

      if ( $selectedRegions ){
 
          foreach ($SelectedArr as $key => $value) {
              if(intval($row['ID'])==$value){
                  $json['Selected'][]=[
                      'id'   => intval($row['ID']),
                      'text'    => $row['AREA']
                  ];
              }
          }
      }
  }

  

  $seansPhotoQ = "SELECT * FROM tbl_seans_dosya WHERE SEANS_ID = '$sid'";
  $seansPhotoR = $mysqli->query($seansPhotoQ);

  while($row = $seansPhotoR->fetch_assoc()){
    $jsonPhoto[]=[
        'photo'    => $row['PHOTO']
    ];
  }

  $sql = "SELECT * from view_seans_detay_kontrol  WHERE ID = '$sid' AND FIRMA_ID=$user_Firma";
  $result = $mysqli->query($sql);

  while($row = $result->fetch_assoc()){
    $json['Session'] = [
      'id'      =>  $row['ID'],
      'seans_id' => intval($row['SEANS_ID']),
      'seans_tarih' => date("Y-m-d", strtotime($row['SEANS_TARIH'])),
      'seans_saat' =>  date("H:i", strtotime($row['SEANS_SAAT'])),
      'seans_estID'=>  intval($row['EST_ID']),
      'seans_durum'=>  intval($row['SEANS_DURUM']),
      'seans_room'=>  $row['ID_ROOM_ID'],
      'seans_not' => $row['SEANS_NOT'],
      'hizmet_bolge'=>  $row['HIZMET_BOLGE'],
      'kontrol_tarih'=>  $row['KONTROL_TARIH'],
      'kontrol_saat'=>  $row['KONTROL_SAAT'],
      'kontrol_room'=>  $row['KONTROL_ROOM'],
      'kontrol_not' => $row['KONTROL_NOT'],
      'kontrol_durum'=>  intval($row['KONTROL_DURUM']),
      'photos' => $jsonPhoto
    ];
  }

                          
  echo json_encode($json);
}else{
  echo "bad request!";
}