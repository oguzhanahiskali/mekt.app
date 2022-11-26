<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$myArray = array();
if($_POST){
  $id = $_POST['ID'];
  $query = "SELECT * FROM tbl_firma_resources a WHERE ID = $id AND STATUS = 1 AND FIRMA_ID=$user_Firma ";
}else{
  $query = "SELECT * FROM tbl_firma_resources a WHERE STATUS = 1 AND FIRMA_ID=$user_Firma ";
}

if ($result = $link->query($query)) {
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$myArray[] = [
				'ID'        =>	intval($row['ID']),
				'RID'      =>  $row['ROOM_ID'],
				'NAME'  =>  $row['ROOM_NAME'],
				'COLOR'     =>  $row['COLOR']
			];
    }
    echo json_encode($myArray);
}

