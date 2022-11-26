<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

// Telefon Doğrulama Array -> functions.php include array ($numbersArr)

$json = [];
if(
    !empty($_POST['PatientID']) &&
    !empty($_POST['citizenNumb']) &&
    !empty($_POST['dateOfBirth']) &&
    !empty($_POST['firstName']) &&
    !empty($_POST['lastName']) &&
    in_array(substr($_POST['phone'], 0, 3), $numbersArr) &&
    strlen($_POST['phone']) == 10  &&
    !empty($_POST['email'])  &&
    !empty($_POST['address'])
  ){
      $id          = $_POST['PatientID'];
      $tckimlik    = $_POST['citizenNumb'];
      $dogumtarih  = $_POST['dateOfBirth'];
      $adi         = trim($_POST['firstName']);
      $soyadi      = trim($_POST['lastName']);
      $dataFirstName = mb_strtoupper($adi);
      $dataLastName = mb_strtoupper($soyadi);
      $cinsiyet    = $_POST['gender'];
      $telefon     = $_POST['phone'];
      $eposta      = $_POST['email'];
      $adres       = trim($_POST['address']);

      if(empty($_POST['contactCall'])){ $contactCall = 'false'; } else{ $contactCall = 'true'; }
      if(empty($_POST['contactSMS'])){ $contactSMS = 'false'; } else{ $contactSMS = 'true'; }

      //query with credentials
        $query = $db->query("SELECT ID, COUNT(*) c FROM tbl_musteri_kimlik WHERE ADI LIKE '{$dataFirstName}' AND SOYADI LIKE '{$dataLastName}' AND DOGUM_TARIHI LIKE '{$dogumtarih}%' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);
        $C = $query['c'];
        $AccountIDa = $query['ID'];

      //query with phone number
        $query = $db->query("SELECT ID, COUNT(*) t FROM tbl_musteri_kimlik WHERE CEP = '{$telefon}' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);
        $T = $query['t'];
        $AccountIDb = $query['ID'];
        if($AccountIDa==$id || $AccountIDb==$id){
          $T = 0;
          $C = 0;
        }

      //ID or phone check
        if ($C>0 || $T==1){
          if($C>0){ //ID Check
              $json['results'] = ['id'=> intval($AccountIDa), 'status'=>false, 'errorcode'=>931 , 'message'=>'This person is already registered'];
          }else if ($T==1){ // Phone Check
              $json['results'] = ['id'=> intval($AccountIDb), 'status'=>false, 'errorcode'=>932 , 'message'=>'This phone number has been already used for registration'];
          }
        }else{
          $query = $db->prepare(
            "UPDATE tbl_musteri_kimlik SET
              ADI = '{$dataFirstName}',
              SOYADI = '{$dataLastName}',
              ADRES = '{$adres}',
              TC = '{$tckimlik}',
              CEP = '{$telefon}',
              EPOSTA= '{$eposta}',
              CINSIYET='{$cinsiyet}',
              FEEDBACK_SMS= '{$contactSMS}',
              FEEDBACK_CALL= '{$contactCall}',
              DOGUM_TARIHI = '{$dogumtarih}',
              UID = '{$user_ID}'
              WHERE ID = $id"
          );
          $update = $query->execute();
          if ( $update ){ $json['results'] = ['status'=>true, 'message'=>'Customer successfully updated']; }
          else{ $json['results'] =           ['status'=>false, 'errorcode'=>933, 'message'=>'Customer update failed']; }
        }
    }else{
      $json['results'] = ['status'=>false];
      //detecting empty spaces
        if(empty($_POST['citizenNumb'])){   $json[] = ['CitizenID'=>false]; }
        if(empty($_POST['email'])){   $json[] = ['Email'=>false]; }
        if(empty($_POST['firstName'])){   $json[] = ['Firstname'=>false]; }
        if(empty($_POST['lastName'])){    $json[] = ['Lastname'=>false]; }
        if(empty($_POST['dateOfBirth'])){ $json[] = ['DayOfBirth'=>false]; }
        if(empty($_POST['address'])){     $json[] = ['Address'=>false]; }
        if(empty($_POST['phone'])){       $json[] = ['Phone'=>false]; }
        if(empty($_POST['gender'])){      $json[] = ['genders'=>false]; }
        if(empty($_POST['contactCall'])){ $json[] = ['CALL'=>false]; }
        if(empty($_POST['contactSMS'])){  $json[] = ['SMS'=>false]; }

        //Eğer telefon numarasının ilk üç hanesi Türkcell, Vofafone, Avea içeriyorsa Verify OK! değilse Non!
        if (!in_array(substr($_POST['phone'], 0, 3), $numbersArr) || strlen($_POST['phone']) < 10 ){ $json[] = ['phoneFormat'=>false]; }
    }
    echo json_encode($json);
      ?>