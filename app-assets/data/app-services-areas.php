<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(isset($_GET['AREA'])){
  $areaFilter = $_GET['AREA'];
  $q = "AND a.ID = '$areaFilter' ";
}else{
  $q = '';
}
$myArray = array();
$query = "SELECT 
a.ID,
a.FIRMA_ID,
a.SUBE_ID,
a.STATUS,
a.AREA,
(SELECT ADI FROM tbl_hizmet_sure s where s.ID = a.DURATION ) AS DURATION,
a.PRICE,
a.CURRENCY,
a.DT,
a.UID,
a.UPD_DT,
a.UPD_UID
FROM view_regions_id a WHERE STATUS = 1  AND FIRMA_ID=$user_Firma ";
$query .= $q;
$query .= " ORDER BY AREA ASC";

// echo $query;
if ($result = $link->query($query)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

			$myArray[] = [
				'ID'        =>	intval($row['ID']),
				'AREA'      =>  $row['AREA'],
				'DURATION'      =>  $row['DURATION'],
				'PRICE'     =>  intval($row['PRICE']),
        'CURRENCY'  =>  $row['CURRENCY'],
				'UPD_DT'    =>  $row['UPD_DT'],
			];

    }
    echo json_encode($myArray);
}

