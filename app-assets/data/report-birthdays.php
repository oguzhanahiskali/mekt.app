<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$myArray = array();
if(isset($_GET['between'])){
   if($_GET['between']==true && isset($_GET['start']) && isset($_GET['end']) ){
      $startDT = $_GET['start'];
      $endDT = $_GET['end'];
      $result = $link->query("SELECT * FROM view_today_birthday WHERE FIRMA_ID = $user_Firma AND DATE(DOGUM_TARIHI) between '$startDT' AND '$endDT' ORDER BY DOGUM_TARIHI DESC");
   }
}else{
   $result = $link->query("SELECT * FROM view_today_birthday WHERE FIRMA_ID = $user_Firma AND date_format( `DOGUM_TARIHI`, '%m-%d' ) = date_format( CURRENT_TIMESTAMP (), '%m-%d')");
   // echo "SELECT * FROM view_today_birthday WHERE FIRMA_ID = $user_Firma AND (DATE(DOGUM_TARIHI) = CURDATE() OR DATE(DOGUM_TARIHI) = CURDATE()) ORDER BY `DOGUM_TARIHI` DESC";
}
if ($result) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

			$myArray[] = [
				'ID'        =>	intval($row['ID']),
            'NAME'      => $row['ADI'].' '.$row['SOYADI'],
				'CUSTOMER'  => [
               'FIRSTNAME' => $row['ADI'],
               'LASTNAME'  => $row['SOYADI'],
               'BIRTHDAY'  => $row['DOGUM_TARIHI'],
               'PHONE'     => intval($row['CEP'])
            ]
			];
    }
    
    echo json_encode($myArray);
}

