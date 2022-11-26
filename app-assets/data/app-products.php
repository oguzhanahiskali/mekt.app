<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(isset($_GET['ProductID'])){
	$productFilter = $_GET['ProductID'];
	$q = "AND ID = '$productFilter' ";
 }else{
	$q = '';
 }
$query = "SELECT * from view_allProducts WHERE STATUS = 1 AND FIRMA_ID=$user_Firma ";
$query .= $q;
$query .= " ORDER BY PRODUCT ASC";

$myArray = array();
if ($result = $link->query($query)) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$myArray[] = [
				'ID'=>intval($row['ID']),
				'PID'=>intval($row['PID']),
				'PRODUCT'=>$row['PRODUCT'],
				'BARCODE'=>$row['BARCODE'],
				'USED'=>intval($row['USEDS']),
				'CURRENCY'=>$row['CURRENCY'],
				'PRICE'=>$row['PRICE'],
				'SCALES'=>$row['SCALE'],
				'TYPE'=>$row['TYPE'],
				'IN_DT'=>$row['IN_DT'],
				'STOCK'=>intval($row['STOCK']),
				'STOCK_ALARM'=>intval($row['STOCK_ALARM']),
				'EXPIRY_DT'=>$row['EXPIRY_DT'],
				'DT'=>$row['DT']
			];
    }
    echo json_encode($myArray);
}