<?php
include '../header-top.php';

if(!empty($_GET['q'])){
	$sql = "SELECT * FROM view_takvim_musteri WHERE (ADSOYAD LIKE '%".$_GET['q']."%' OR MID LIKE '%".$_GET['q']."%') AND FIRMA_ID=$user_Firma ORDER BY ADSOYAD ASC";
}else{
	$sql = "SELECT * FROM view_takvim_musteri WHERE FIRMA_ID=$user_Firma ORDER BY ADSOYAD ASC";
}
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
								            $json[] =	[
								             			'id'		=>$row['ID'],
								             			'text'	=> $row['ADSOYAD'],
														 'firma' =>$row['FIRMA_ID']
														]; 
        									}
echo json_encode($json);