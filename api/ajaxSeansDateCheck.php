<?php
include '../header-top.php';

$datetime   = date('Y-m-d', strtotime($_GET['datetime']));
$seansstart   = date('H:i', strtotime($_GET['datetime']));

/* Database linkection end */

// storing  request (ie, get/post) global array to a variable  
$request=$_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'ID',
	1 => 'ADI_SOYADI',
	2 => 'ESTETISYEN_ADI',
	3 => 'SEANS_TARIH',
	4 => 'SEANS_SAAT',
	5 => 'SEANS_SURE',
	6 => 'ODA',
	7 => 'SEANS_DURUM'
);

// getting total number records without any search
$sql = "SELECT * FROM view_sessionDateCheck WHERE FIRMA_ID = '$user_Firma' AND DATE(SEANS_TARIH) = '$datetime' ORDER BY SEANS_SAAT";
$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFilter=$totalData;

$query=mysqli_query($link, $sql) or die("employee-grid-data.php: get employees");
$data = array();


while( $row=mysqli_fetch_array($query) ) {

	$subdata=array();
	if($row["SEANS_DURUM"] == 0){
		$durum = "Bekliyor";
	}else if($row['SEANS_DURUM'] == 1){
		$durum = "İptal";
	}else if($row['SEANS_DURUM'] == 2){
		$durum = "Geldi";
	}

	$subdata[] = $row["ID"];
	$subdata[] = $row['ADI_SOYADI'];
	$subdata[] = $row["ESTETISYEN_ADI"];
	$subdata[] = $row["SEANS_TARIH"];
	$subdata[] = $row["SEANS_SAAT"];
	$subdata[] = $row["SEANS_SURE"];
	$subdata[] = $row["ODA"];
	$subdata[] = $durum;

	
	$data[] = $subdata;
}


$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>