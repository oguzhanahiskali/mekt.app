<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$myArray = array();
if ($result = $link->query("SELECT * FROM tbl_personel WHERE FIRMA_ID='{$user_Firma}' AND DURUM=1 AND ID <> 33 ORDER BY ADI ASC")) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

		$myArray[] = [
			'ID'	=>	intval($row['ID']),
			'UserName'   =>  $row['USERNAME'],
			'Phone'   =>  $row['CEP'],
			'Access'   =>  intval($row['USERSTATUS']),
			'Mission'   =>  intval($row['TUR']),
			'Name'   =>  $row['ADI'].' '.$row['SOYADI']
		];

    }
    echo json_encode($myArray);
}

