<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(!empty($_GET['q'])){
	$sql = "SELECT * FROM tbl_firma_resources WHERE (ROOM_NAME LIKE '%".$_GET['q']."%') AND STATUS = 1 AND FIRMA_ID=$user_Firma ORDER BY ROOM_NAME ASC";
}else{
	$sql = "SELECT * FROM tbl_firma_resources WHERE STATUS = 1 AND FIRMA_ID=$user_Firma ORDER BY ID ASC";
}
$result = $mysqli->query($sql);

$json = [];
while($row = $result->fetch_assoc())
{
	$json[] = [ 'value' =>$row['ID'], 'id' =>$row['ROOM_ID'], 'text'=>$row['ROOM_NAME'] ]; 
}
echo json_encode($json);