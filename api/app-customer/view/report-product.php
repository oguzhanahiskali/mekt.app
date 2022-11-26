<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$myArray = array();

if(!empty($_GET['MID'])){
	$ids = $_GET['MID'];

    if(isset($_GET['between'])){
    if($_GET['between']==true && isset($_GET['start']) && isset($_GET['end']) ){
        $startDT = $_GET['start'];
        $endDT = $_GET['end'];
        $result = $link->query("SELECT * FROM view_tahsilat_product_alinanlar WHERE FIRMA_ID = $user_Firma AND MID = '{$ids}' AND DATE(DT) between '$startDT' AND '$endDT' ORDER BY DT DESC");
    }
    }else{
    $result = $link->query("SELECT * FROM view_tahsilat_product_alinanlar WHERE FIRMA_ID = $user_Firma AND MID = '{$ids}' ORDER BY DT DESC");
    }
    if ($result) {

        while($row = $result->fetch_array(MYSQLI_ASSOC)) {

        if(is_numeric($row['PHONE'])==false OR str_starts_with($row['PHONE'], 5)==false){
            $phone = false;
        }else{
            $phone = $row['PHONE'];
            $phone = phone_number_format($phone);
        }
                $myArray[] = [
                'ID'        =>	intval($row['ID']),
                'CID'        =>	intval($row['KART_ID']),
                'CUSTOMER'  => [
                    'ID'   => $row['MID'],
                    'NAME'   => $row['CUSTOMER'],
                    'PHONE'  => $phone
                ],
                'SID'   =>  $row['KART_ID'],
                'PRODUCT'   =>  $row['PRODUCT_NAME'],
                'PAYMENT'=> [
                    'PRICE'=> intval($row['PRICE']),
                    'CURRENCY'=> $row['CURRENCY'],
                    'BUY_STATUS'=> $row['BUY_STATUS'],
                    'TYPE'=> intval($row['PAYMENT_TYPE'])
                ],
                'PROCESS'=> [
                    'DT'=> $row['DT'],
                    'USER'=> $row['PERSONEL']
                ]
                ];

        }
        echo json_encode($myArray);
    }
}else{
	exit();
}

