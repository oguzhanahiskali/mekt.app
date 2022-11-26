<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$myArray = array();
$totalPrice = null;
if(isset($_GET['between'])){
   if($_GET['between']==true && isset($_GET['start']) && isset($_GET['end']) ){
      $startDT = $_GET['start'];
      $endDT = $_GET['end'];
      $result = $link->query("SELECT * FROM view_tahsilat_alinanlar WHERE FIRMA_ID = $user_Firma AND DATE(ISLEM_TARIHI) between '$startDT' AND '$endDT' ORDER BY ISLEM_TARIHI DESC");
   }
}else{
   $result = $link->query("SELECT * FROM view_tahsilat_alinanlar WHERE FIRMA_ID = $user_Firma ORDER BY ISLEM_TARIHI DESC");
}
if ($result) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

       if(is_numeric($row['CEP'])==false OR str_starts_with($row['CEP'], 5)==false){
          $phone = false;
      }else{
         $phone = $row['CEP'];
         $phone = phone_number_format($phone);
      }
			$myArray[] = [
				'ID'        =>	intval($row['ID']),
				'CID'        =>	intval($row['KART_ID']),
				'CUSTOMER'  => [
               'ID'   => $row['MID'],
               'NAME'   => $row['ADISOYADI'],
               'PHONE'  => $phone
            ],
				'SID'   =>  $row['KART_ID'],
            'PAYMENT'=> [
               'PRICE'=> intval($row['FIYAT']),
               'CURRENCY'=> $row['CURRENCY']
            ],
				'INSTALLMENT'=> [
               'ID'  => intval($row['TAKSIT_ID']),
               'DT'  => $row['TAKSIT_TARIHI'],
               'TYPE'=> intval($row['TAHSILAT_TIPI']),
               'YEAR'=> intval($row['YEAR']),
               'MONTH'=> intval($row['MONTH'])
            ],
				'PROCESS'=> [
               'DT'=> $row['ISLEM_TARIHI'],
               'USER'=> $row['PERSONEL']
            ]
			];

         $totalPrice += $row['FIYAT'];
    }
    
    $myArray['0']['TotalPrice'] = $totalPrice;
    echo json_encode($myArray);
}

