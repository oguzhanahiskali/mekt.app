<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
  $sql = "SELECT * FROM view_tahsilat_alinmayanlar WHERE FIRMA_ID = '{$user_Firma}' AND FIYAT >49 AND TAKSIT_TARIHI < NOW() ORDER BY TAKSIT_TARIHI DESC ";
  //altun talan 0 tl çıkıyor!!!
  $result = $mysqli->query($sql);  
  $json = [];

  while($row = $result->fetch_assoc()){
    if(!is_null($row['CEP']) || !is_null($row['ADISOYADI']) && $row['FIYAT']>5){
      $randomNumber = randomNumber(6);
      $now = new DateTime();
      
      $time1 = $now->format('Y-m-d H:i:s');    // MySQL datetime format
      $phone = $row['CEP'];
      $Name = $row['ADISOYADI'];
      $InstallmentID=$row['TAKSIT_ID'];
      $InstallmentDT=date('d/m/Y', strtotime($row['TAKSIT_TARIHI']));
      $InstallmentPrice=$row['FIYAT'].' '.$row['CURRENCY'];
      $ServiceName=$row['TITLEx'];
  
      $encrypted = cryptoJsAesEncrypt($randomNumber, $randomNumber.'-'.$phone);
      //$decrypted = cryptoJsAesDecrypt("password1", $encrypted);
  
      /*
  
      //For JavaScript
      var encrypted = CryptoJS.AES.encrypt(JSON.stringify("1654889147|5389654345"), "password1", {format: CryptoJSAesJson}).toString();
      var decrypted = JSON.parse(CryptoJS.AES.decrypt(encrypted, "password1", {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));
      console.log('encrypted: '+encrypted);
      console.log('decrypted: '+decrypted);
      */
  
      $json['Success'][] =	[
        'Customer'	=>$Name,
        'Phone'		=> $phone,
        'Installment'=> [
          'ID'=> $InstallmentID,
          'DT'=> $InstallmentDT,
          'PRICE'=> $InstallmentPrice,
          'SERVICE'=>$ServiceName
        ],
        'Key'=> $encrypted,
        'TimeStamp'=> $randomNumber
      ]; 
    }else{

      $randomNumber = randomNumber(6);
      $now = new DateTime();
      
      $time1 = $now->format('Y-m-d H:i:s');    // MySQL datetime format
      $phone = $row['CEP'];
      $Name = $row['ADISOYADI'];
      $InstallmentID=$row['TAKSIT_ID'];
      $InstallmentDT=date('d/m/Y', strtotime($row['TAKSIT_TARIHI']));
      $InstallmentPrice=$row['FIYAT'].' '.$row['CURRENCY'];
      $ServiceName=$row['TITLEx'];
  
      $encrypted = cryptoJsAesEncrypt($randomNumber, $randomNumber.'-'.$phone);
      //$decrypted = cryptoJsAesDecrypt("password1", $encrypted);
  
      /*
  
      //For JavaScript
      var encrypted = CryptoJS.AES.encrypt(JSON.stringify("1654889147|5389654345"), "password1", {format: CryptoJSAesJson}).toString();
      var decrypted = JSON.parse(CryptoJS.AES.decrypt(encrypted, "password1", {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));
      console.log('encrypted: '+encrypted);
      console.log('decrypted: '+decrypted);
      */
  
      $json['Unsuccess'][] =	[
        'CustomerID'	=>$row['KART_ID'],
        'Customer'	=>$Name,
        'Phone'		=> $phone,
        'Installment'=> [
          'ID'=> $InstallmentID,
          'DT'=> $InstallmentDT,
          'PRICE'=> $InstallmentPrice,
          'SERVICE'=>$ServiceName
        ],
        'Key'=> $encrypted,
        'TimeStamp'=> $randomNumber
      ]; 

    }
  }
  echo json_encode($json);