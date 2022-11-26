<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$myArray = array();
if ($result = $link->query("SELECT * from view_customers WHERE DURUM = 1 AND FIRMA_ID=$user_Firma")) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

		$myArray[] = [
			'ID'	=>	$row['ID'],
			'Name'   =>  $row['ADI_SOYADI'],
			'Phone'   =>  $row['CEP'],
			'Age'   =>  $row['YAS']		
		];

    }
    echo json_encode($myArray);
}

