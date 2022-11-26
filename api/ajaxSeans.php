<?php
include '../header-top.php';


if(empty($_GET['q'])){ 
	$fetchData = mysqli_query($mysqli,"SELECT ID, ADI FROM tbl_hizmet_seans");
}else{ 
	$search = $_GET['q'];   
	$fetchData = mysqli_query($mysqli,"SELECT ID, ADI FROM tbl_hizmet_seans WHERE ADI LIKE '%".$_GET['q']."%' ORDER BY ID ASC");
} 
  
$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
$data[] = array("id"=>$row['ID'], "text"=>$row['ADI']);
}
echo json_encode($data);
