<?php
include '../header-top.php';

if(!empty($_GET['q'])){
$sql = "SELECT
		b.ID,
		b.AREA,
        b.DURATION,
        b.PRICE,
        (SELECT ADI FROM tbl_hizmet_sure where ID = b.DURATION) AS SURE_ADI,
		(SELECT SURE FROM tbl_hizmet_sure where ID = b.DURATION) AS TIME
		FROM
		view_regions_id b
		WHERE
		b.HIZMET LIKE '%".$_GET['q']."%' AND FIRMA_ID = $user_Firma
        ORDER BY b.HIZMET ASC";
        $result = $mysqli->query($sql);
}elseif(!empty($_GET['id'])){
	$sql = "SELECT
    b.ID,
    b.AREA,
    b.DURATION,
    (SELECT ADI FROM tbl_hizmet_sure where ID = b.DURATION) AS SURE_ADI,
    (SELECT SURE FROM tbl_hizmet_sure where ID = b.DURATION) AS TIME,
    b.PRICE
    FROM
    view_regions_id b
    WHERE
    b.ID LIKE '".$_GET['id']."' AND FIRMA_ID = $user_Firma
    ORDER BY b.AREA ASC";
    $result = $mysqli->query($sql);

}else{
	$sql = "SELECT
    b.ID,
    b.AREA,
    b.DURATION,
    (SELECT ADI FROM tbl_hizmet_sure where ID = b.DURATION) AS SURE_ADI,
		(SELECT SURE FROM tbl_hizmet_sure where ID = b.DURATION) AS TIME,
    b.PRICE
    FROM
    view_regions_id b
    WHERE FIRMA_ID = $user_Firma
	ORDER BY b.AREA ASC";
	$result = $mysqli->query($sql);

}

        $json = [];
        while($row = $result->fetch_assoc()){
								            $json[] =	[
								             			'id'		=>intval($row['ID']),
								             			'text'		=>$row['AREA'],
                                                        'sure' => [
                                                             'id' => intval($row['DURATION']),
                                                             'text' => $row['SURE_ADI'],
                                                             'time' => intval($row['TIME'])
                                                         ],
                                                        'fiyat'     =>intval($row['PRICE'])
														]; 
        									}
echo json_encode($json);
