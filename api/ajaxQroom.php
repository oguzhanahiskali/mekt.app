<?php
include '../header-top.php';

$sql = "SELECT * FROM tbl_firma_oda
		WHERE
		STATUS = 1 AND
		FIRMA_ID=$user_Firma
		ORDER BY ROOM_ID ASC";
		$result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
        $json[] =	[
                    'id'		=>$row['ID'],
                    'room_id'		=>$row['ROOM_ID'],
                    'room_name'		=>$row['ROOM_NAME'],
                    ]; 
        }
echo json_encode($json);