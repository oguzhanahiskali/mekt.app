<?php
include '../header-top.php';

if(!empty($_GET['q'])){
	$sql = "SELECT * FROM tbl_personel WHERE ADI LIKE '%".$_GET['q']."%' AND TUR IN (1,3) AND FIRMA_ID=$user_Firma AND DURUM = 1 ORDER BY ADI ASC";
}else{
	$sql = "SELECT * FROM tbl_personel WHERE TUR IN (1,3) AND FIRMA_ID=$user_Firma AND DURUM = 1 ORDER BY ADI ASC";
}
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
								            $json[] =	[
								             			'id'		=>$row['ID'],
								             			'value'		=>$row['ID'],
								             			'text'		=>$row['ADI'].' '.$row['SOYADI']
														]; 
        									}
echo json_encode($json);