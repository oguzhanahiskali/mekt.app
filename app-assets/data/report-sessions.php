<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$myArray = array();
if(isset($_GET['between'])){
   if($_GET['between']==true && isset($_GET['start']) && isset($_GET['end']) ){
      $startDT = $_GET['start'];
      $endDT = $_GET['end'];
      $result = $link->query("SELECT * FROM view_report_sessions WHERE FIRMA_ID = $user_Firma AND DATE(RANDEVU_TARIHI) between '$startDT' AND '$endDT' ORDER BY RANDEVU_TARIHI ASC");
      // $result = $link->query("SELECT * FROM view_tahsilat_alinanlar WHERE FIRMA_ID = $user_Firma AND DATE(ISLEM_TARIHI) between '$startDT' AND '$endDT' ORDER BY ISLEM_TARIHI DESC");
   }
}else{
   // $result = $link->query("SELECT * FROM view_tahsilat_alinanlar WHERE FIRMA_ID = $user_Firma ORDER BY ISLEM_TARIHI DESC");
      $result = $link->query("SELECT * FROM view_report_sessions WHERE FIRMA_ID = $user_Firma AND (DATE(RANDEVU_TARIHI) = CURDATE() OR DATE(KONTROL_TARIHI) = CURDATE()) ORDER BY `RANDEVU_TARIHI` ASC");
}
if ($result) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

       if(is_numeric($row['TELEFON'])==false OR str_starts_with($row['TELEFON'], 5)==false){
          $phone = false;
      }else{
         $phone = $row['TELEFON'];
         $phone = phone_number_format($phone);
      }
			$myArray[] = [
				'ID'        =>	intval($row['ID']),
				'CID'        =>	intval($row['KART_ID']),
				'CUSTOMER'  => [
               'ID'   => $row['MID'],
               'NAME'   => $row['MUSTERI'],
               'PHONE'  => $phone
            ],
            'ESTHETICIAN' => $row['ESTETISYEN'],
            'ROOM' => $row['ODA'],
				'SESSIONS'=> [
               'SESSION'  => [
                  'ID'  => $row['SEANS_ID'],
                  'DATE'=> $row['RANDEVU_TARIHI'],
                  'TIME'=> $row['SEANS_SURE'],
                  'STATUS'=> $row['SEANS_DURUM']
               ],
               'CONTROL'  => [
                  'DATE'=> $row['KONTROL_TARIHI'],
                  'STATUS'=> $row['KONTROL_DURUM']
               ],
               'PROCCESS'=> [
                  'TOTAL'=> $row['TOPLAM_SEANS'],
                  'COMPLETED'=> $row['TAMAMLANAN']
               ]
            ]
			];
    }
    
    echo json_encode($myArray);
}

