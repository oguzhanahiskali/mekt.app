<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$sessionID = $_GET['edu'];


$myArray = array();
if ($result = $link->query("SELECT * FROM view_egitim_grup WHERE EGITIM_ID = $sessionID AND STATUS = 1")) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

		$myArray[] = [
			'ID'	=> intval($row['ID']),
			'Education'=> $row['EGITIM_ADI'],
			'EducationID'=> $sessionID,
			'Group'	=> $row['GRUP_ADI'],
			'Start'	=> $row['START'],
			'Finish'=> $row['FINISH'],
			'Invitation'	=> $row['DAVETLI'],
			'Join'	=> $row['KATILIMCI'],
			'Status'=> $row['STATUS'],
			'DT'	=> $row['DT']		
		];

    }
    echo json_encode($myArray);
}