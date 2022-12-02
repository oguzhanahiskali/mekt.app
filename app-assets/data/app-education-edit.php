<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$myArray = array();
if ($result = $link->query("SELECT * from tbl_egitim WHERE STATUS = 1")) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

		$myArray[] = [
			'ID'	=>	$row['ID'],
			'Education'   =>  $row['EGITIM_ADI'],
			'Status'   =>  $row['STATUS'],
			'DT'   =>  $row['DT']		
		];

    }
    echo json_encode($myArray);
}

