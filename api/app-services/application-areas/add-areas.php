<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';


if($_POST['regionName']){
  $regions = $_POST['regionName'];

  foreach ($regions as $region) {
    $regionSlug = textToURL($region);
    $regionDuration = "inp-add-".$regionSlug."-hizmet-suresi";
    $regionPrice = "inp-add-".$regionSlug."-fiyat";
    $regionCurrency = "inp-add-".$regionSlug."-currency";
    $getRegionDuration = $_POST[$regionDuration];
    $getRegionPrice = $_POST[$regionPrice];
    $getRegionCurrency = $_POST[$regionCurrency];
    $islemtarih = date('Y-m-d H:i:s');

    $doYouAlreadyHave = $db->query("SELECT * FROM view_regions_id WHERE AREA LIKE '{$region}' AND FIRMA_ID = {$user_Firma} ")->fetch(PDO::FETCH_ASSOC);
    
    if ( $doYouAlreadyHave ){
        $json[]=['code'=> 1033, 'status' => false, 'because' => 'Already done', 'related' => $region];
    }else{
      $regionNameToID = $db->query("SELECT ID FROM tbl_hizmet_bolge WHERE AREA LIKE '{$region}'")->fetch(PDO::FETCH_ASSOC);
      if($regionNameToID){
        $regionToID = $regionNameToID['ID'];
        $query = $db->prepare("INSERT INTO tbl_firma_application_area SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        STATUS = ?,
        AREA_ID = ?,
        DURATION = ?,
        PRICE = ?,
        CURRENCY = ?,
        DT = ?,
        UID = ?");
        $insert = $query->execute(
          array(
            $user_Firma, $user_Sube, 1, $regionToID, $getRegionDuration, $getRegionPrice, $getRegionCurrency, $islemtarih, $user_ID
          )
        );
        if ( $insert ){ $json[]=['code'=> 1000, 'status' => true, 'related' => $region]; }
      }
    }    


  }
}


echo json_encode($json);

