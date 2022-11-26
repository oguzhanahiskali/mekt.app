<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

   $durum = 1;
   $myArray = array();

   if($_POST['inp-edit-fiyat']){     $fiyat  = $_POST['inp-edit-fiyat']; }
   if($_POST['inp-edit-currency']){  $currency  = $_POST['inp-edit-currency']; }
   if($_POST['hizmetid']){           $ids  = $_POST['hizmetid']; }

   if(!empty($_POST['inp-edit-bolge-suresi'])){
      $GEThizmetsuresi  = $_POST['inp-edit-bolge-suresi'];
      $query = $db->query("SELECT * FROM tbl_hizmet_sure where ID = '{$GEThizmetsuresi}'")->fetch(PDO::FETCH_ASSOC);
      $hizmetsuresi = $query['ADI'];
   }
   $islemtarih = date('Y-m-d H:i:s');


  if(!empty($hizmetsuresi) && !empty($fiyat)){
      $query = $db->prepare("UPDATE tbl_firma_application_area SET
                              DURATION = ?,
                              PRICE = ?,
                              CURRENCY = ?,
                              UPD_UID = ?,
                              UPD_DT = ?
                              WHERE
                              ID = $ids AND
                              FIRMA_ID = $user_Firma");
      $update = $query->execute(array(
                                 $GEThizmetsuresi,
                                 $fiyat,
                                 $currency,
                                 $user_ID,
                                 $islemtarih
                              ));
      if ( $update ){
        $myArray=[
          'status'   => true
        ];
      }
  }else if(!empty($fiyat)){
    $query = $db->prepare("UPDATE tbl_firma_application_area SET
                          PRICE = ?,
                          CURRENCY = ?,
                          UPD_UID = ?,
                          UPD_DT = ?
                          WHERE
                          ID = $ids AND
                          FIRMA_ID = $user_Firma");
    $update = $query->execute(array(
                              $fiyat,
                              $currency,
                              $user_ID,
                              $islemtarih
                            ));
    if ( $update ){
      $myArray=[
        'status'   => true
      ];
    }
 }else{
  $myArray=[
    'status'   => false
  ];
   }

   echo json_encode($myArray);

?>