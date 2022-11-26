<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$myArray = array();
if ($result = $link->query("SELECT ID, HIZMET_ADI, DURUM, HIZMET_SURE, HIZMET_SEANS, HIZMET_FIYAT, CURRENCY, REGIONS, UID, DT, UPD_DT from tbl_hizmet WHERE FIRMA_ID=$user_Firma ORDER BY DURUM DESC, HIZMET_ADI ASC")) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

			// $selectedList = $row['REGIONS'];
			// $SelectedArr = explode(', ',$selectedList);
			$SelectedArr = explode(',', $row['REGIONS'] ?? '');


			if(count($SelectedArr)>1){
				$regionsCount = count($SelectedArr);
			}else{
				$regionsCount = '-';
			}
			$myArray[] = [
				'ID'        =>	intval($row['ID']),
				'STATUS'  =>  $row['DURUM'],
				'SERVICES'  =>  $row['HIZMET_ADI'],
				'TIME'      =>  $row['HIZMET_SURE'],
				'SESSION'   =>  $row['HIZMET_SEANS'],
				'PRICE'     =>  $row['HIZMET_FIYAT'],
				'CURRENCY'     =>  $row['CURRENCY'],
				'COUNTS'		=> $regionsCount,
				'DT'        =>  $row['DT'],
				'UPD_DT'    =>  $row['UPD_DT']
			];

    }
    echo json_encode($myArray);
}

