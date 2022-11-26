<?php
  //Session Check
  include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

  // Telefon Doğrulama Array -> functions.php include array ($numbersArr)

  if(
      !empty($_POST['data-firstname']) &&
      !empty($_POST['data-lastname']) &&
      !empty($_POST['data-dayOfbirth']) &&
      !empty($_POST['data-genders']) &&
      !empty($_POST['data-mobilPhone']) &&
      in_array(substr($_POST['data-mobilPhone'], 0, 3), $numbersArr) &&
      strlen($_POST['data-mobilPhone']) == 10  &&
      !empty($_POST['data-Address'])
    ){
      //variables
        $dataFirstName  = trim($_POST['data-firstname']);
        $dataLastName   = trim($_POST['data-lastname']);
        $dataFirstName = mb_strtoupper($dataFirstName);
        $dataLastName = mb_strtoupper($dataLastName);
  
        $dataGenders    = $_POST['data-genders'];
        $dataAddress    = trim($_POST['data-Address']);
        $dataDayOfbirth = $_POST['data-dayOfbirth'];
        $dataPhone      = $_POST['data-mobilPhone'];
        if(empty($_POST['contactCall'])){ $contactCall = 'false'; } else{ $contactCall = 'true'; }
        if(empty($_POST['contactSMS'])){ $contactSMS = 'false'; } else{ $contactSMS = 'true'; }
    
      //query with credentials
        $query = $db->query("SELECT ID, COUNT(*) c FROM tbl_musteri_kimlik WHERE ADI LIKE '{$dataFirstName}' AND SOYADI LIKE '{$dataLastName}' AND DOGUM_TARIHI LIKE '{$dataDayOfbirth}%' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);
        $C = $query['c'];
        $AccountIDa = $query['ID'];

      //query with phone number
        $query = $db->query("SELECT ID, COUNT(*) t FROM tbl_musteri_kimlik WHERE CEP = '{$dataPhone}' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);
        $T = $query['t'];
        $AccountIDb = $query['ID'];

      //ID or phone check
      if ($C>0 || $T==1){
        if($C>0){ //ID Check
          $json['results'] = ['id'=> intval($AccountIDa), 'status'=>false, 'errorcode'=>931 , 'message'=>'This person is already registered'];
        }else if ($T==1){ // Phone Check
          $json['results'] = ['id'=> intval($AccountIDb), 'status'=>false, 'errorcode'=>932 , 'message'=>'This phone number has been already used for registration'];
        }
      }else{
        $query = $db->prepare("INSERT INTO tbl_musteri_kimlik SET
          DURUM = 1,
          FIRMA_ID = '{$user_Firma}',
          SUBE_ID = '{$user_Sube}',
          ADI = '{$dataFirstName}',
          SOYADI = '{$dataLastName}',
          DOGUM_TARIHI = '{$dataDayOfbirth}',
          CINSIYET = '{$dataGenders}',
          ADRES = '{$dataAddress}',
          FEEDBACK_SMS= '{$contactSMS}',
          FEEDBACK_CALL= '{$contactCall}',
          CEP = '{$dataPhone}',
          UID = '{$user_ID}',
          DT = NOW()
        ");
        $insert = $query->execute();
        if ( $insert ){ $json['results'] = ['status'=>true, 'message'=>'Customer registration completed successfully']; }
        else{ $json['results'] =           ['status'=>false, 'errorcode'=>933, 'message'=>'Customer registration failed.']; }
      }
    }else{

      //detecting empty spaces
        if(empty($_POST['data-firstname'])){  $json[] = ['firstname'=>false]; }
        if(empty($_POST['data-lastname'])){   $json[] = ['lastname'=>false]; }
        if(empty($_POST['data-dayOfbirth'])){ $json[] = ['dayOfbirth'=>false]; }
        if(empty($_POST['data-Address'])){    $json[] = ['address'=>false]; }
        if(empty($_POST['data-mobilPhone'])){ $json[] = ['phone'=>false]; }
        if(empty($_POST['data-genders'])){    $json[] = ['gender'=>false]; }
        if(empty($_POST['contactCall'])){     $json[] = ['contactCall'=>false]; }
        if(empty($_POST['contactSMS'])){      $json[] = ['contactSMS'=>false]; }

        //Eğer telefon numarasının ilk üç hanesi Türkcell, Vofafone, Avea içeriyorsa Verify OK! değilse Non!
        if (!in_array(substr($_POST['data-mobilPhone'], 0, 3), $numbersArr) || strlen($_POST['data-mobilPhone']) < 10 ){ $json[] = ['phoneFormat'=>false]; }
    
    }
    echo json_encode($json);
  ?>