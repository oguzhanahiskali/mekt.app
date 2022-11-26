<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$myArray = array();
if(isset($_GET['between'])){
   if($_GET['between']==true && isset($_GET['start']) && isset($_GET['end']) ){
      $startDT = $_GET['start'];
      $endDT = $_GET['end'];
      $result = $link->query("SELECT * FROM view_tahsilat_alinmayanlar WHERE FIRMA_ID = '{$user_Firma}' AND FIYAT >49 AND DATE(TAKSIT_TARIHI) between '$startDT' AND '$endDT' ORDER BY TAKSIT_TARIHI DESC");
      // $result = $link->query("SELECT * FROM view_tahsilat_alinmayanlar WHERE FIRMA_ID = '{$user_Firma}' AND FIYAT >49 AND DATE(TAKSIT_TARIHI) between '$startDT' AND '$endDT' ORDER BY TAKSIT_TARIHI DESC");
   }
}else{
   // $result = $link->query("SELECT * FROM view_tahsilat_alinanlar WHERE FIRMA_ID = $user_Firma ORDER BY ISLEM_TARIHI DESC");
      $result = $link->query("SELECT * FROM view_tahsilat_alinmayanlar WHERE FIRMA_ID = '{$user_Firma}' AND FIYAT >49 AND TAKSIT_TARIHI < NOW() ORDER BY TAKSIT_TARIHI DESC");
}
if ($result) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

       if(is_numeric($row['CEP'])==false OR str_starts_with($row['CEP'], 5)==false){
          $phone = false;
      }else{
         $phone = $row['CEP'];
         $phone = phone_number_format($phone);
      }

      $Customer = $row['ADISOYADI'];
      $InstallmentDT = date("d/m/Y", strtotime($row['TAKSIT_TARIHI']));
      $Price = $row['FIYAT'].' TL';
      $Service = $row['TITLEx'];
      $IfSendSMSQuery = $db->query("SELECT count(*) as Counts FROM tbl_sms_logs WHERE
                           Mesaj LIKE '%{$Customer}%' AND
                           Mesaj LIKE '%{$InstallmentDT}%' AND
                           Mesaj LIKE '%{$Price}%' AND
                           Mesaj LIKE '%{$Service}%'"
                           )->fetch(PDO::FETCH_ASSOC);
      $alreadySent = false;
      if ( $IfSendSMSQuery ){
         $alreadySent = $IfSendSMSQuery['Counts'];
         if($IfSendSMSQuery['Counts']>0){
            $alreadySent = $IfSendSMSQuery['Counts'];
         }
      }

			$myArray[] = [
				'ID'        =>	intval($row['ID']),
				'CID'        =>	intval($row['KART_ID']),
				'CUSTOMER'  => [
               'ID'   => $row['MID'],
               'NAME'   => $Customer,
               'PHONE'  => $phone
            ],
            'CARD_ID' => $row['KART_ID'],
            'SERVICE_NAME' => $Service,
            'INSTALLMENT'=> [
              'ID'=> $row['TAKSIT_ID'],
              'DT'=> $InstallmentDT,
              'PRICE'=> $Price
            ],
            'AlreadySend' => $alreadySent
			];
    }
    
    echo json_encode($myArray);
}

