<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

// print_r($_POST['serialize']);

$serialzeArr = $_POST['serialize'];

// $numbers 	= $_POST['numbers'];
// $msg 	 	= $_POST['msg'];

//print_r($numbers);
$SMScreaditCount = null;
if(isset($serialzeArr)){

  foreach ($serialzeArr as $serial) {
    
    // Telefon Doğrulama Array -> functions.php include array ($numbersArr)
    //Eğer telefon numarasının ilk üç hanesi Türkcell, Vofafone, Avea içeriyorsa Verify OK! değilse Non!
    if (in_array(substr($serial['Phone'], 0, 3), $numbersArr)){ $verify = 1; }else{ $verify = 0; }

    $Msg = "Merhaba ".$serial['Name'].", ";
    $Msg.= $serial['InstallmentID'].".. Taksit olan ".$serial['Service']." hizmetinizin ".$serial['InstallmentDT']." Son ödeme tarihli, ";
    $Msg.= $serial['Price']." TL tutarında borcunuz gecikmeye girmiştir. ";
    $Msg.= "Ödeme yapmanız için en kısa sürede salonumuz da beklenmektesiniz. Sağlıklı Günler Dileriz. ";
    $Msg.= "Bilgi İçin: +905306808134 Epimia Güzellik Salonu B021";
    $MsgList[] =	[
      'number'=> $serial['Phone'],
      'message'=> $Msg,
    ];
  }
  /* SMS HAKKI VARMI? START */
  $query = $db->query("SELECT * FROM view_firma_id WHERE FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
  $FirmaAdi = $query['FIRMA_ADI'];

  $query = $db->query("SELECT TOPLAM FROM tbl_sms_firma WHERE FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
  if($query){ $SMStoplam = $query['TOPLAM']; }else{ $SMStoplam = 0; }

  $query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum LIKE '%İletil%' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
  $SMSkullanilan = $query['SAYAC'];

  $query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum NOT LIKE '%İletil%' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
  $SMShatali = $query['SAYAC'];

  $SMSkalan = $SMStoplam-$SMSkullanilan;

  $query = $db->query("SELECT FIRMA_ID, SMS_UN, SMS_PW, HEADER FROM tbl_sms_firma WHERE FIRMA_ID = '$user_Firma'", PDO::FETCH_ASSOC);
  if ( $query->rowCount()>0 ){
        foreach( $query as $row ){
          $smsUN= $row['SMS_UN'];
          $smsPW= $row['SMS_PW'];
          $smsHeader= $row['HEADER'];
        }
  }
  /* SMS HAKKI VARMI? END */

  //Eğer telefon doğru ise SMS Gönder
  if($verify==1){
    if($SMSkalan>0){
      foreach($MsgList as $msg){
        $gsmNr='90'.$msg['number'];
        $mssg = $msg['message'];
        $SMSPush = OneToOneMessage($gsmNr,$mssg,$user_Firma,$smsUN,$smsPW,$smsHeader);
        if($SMSPush=='İletildi' || $SMSPush=='İletilmeyi bekliyor'){
          $json[] =	[ 'code'=> 1000, 'number'=> $gsmNr, 'status'=> 'iletildi'];
        }else if($SMSPush=='Mükerrer İleti'){
          $json[] =	[ 'code'=> 1001, 'number'=> $gsmNr, 'status'=> 'Mükerrer İleti'];
        }else if($SMSPush=='Operatöre gönderilemedi'){
          $json[] =	[ 'code'=> 1001, 'number'=> $gsmNr, 'status'=> 'Operatöre gönderilemedi'];
        }else if($SMSPush=='Hatalı veya kısıtlı numara'){
          $json[] =	[ 'code'=> 1001, 'number'=> $gsmNr, 'status'=> 'Hatalı veya kısıtlı numara'];
        }else if($SMSPush=='Gönderim hatası'){
          $json[] =	[ 'code'=> 1001, 'number'=> $gsmNr, 'status'=> 'Gönderim hatası'];
        }else{
          $json[] =	[ 'code'=>1001, 'number'=> $gsmNr, 'status'=> 'Başarısız'];
        }
      }
        $SMScreaditCount = true;
        // $json[] =	[ 'status'=> true ];
    }else{
        $SMScreaditCount = false;
        $json[] =	[ 'status'=> false, 'because'=> 'No SMS credits'];
    }
  }else{
    $json[] =	[ 'status'=> false, 'wrongNumber'=> $serialzeArr['number']];
  }
  if($SMScreaditCount==false){
    $json[] =	[ 'status'=> false, 'because'=> 'No SMS credits'];
  }
}else{
  $json[] =	[ 'status'=> null]; 
}

echo json_encode($json);
?>