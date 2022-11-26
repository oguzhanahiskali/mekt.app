<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(!empty($_GET['q'])){
	$sql = "SELECT * FROM tbl_product_cart WHERE (PRODUCT_NAME LIKE '%".$_GET['q']."%') ORDER BY PRODUCT_NAME ASC";
}else{
	$sql = "SELECT * FROM tbl_product_cart  ORDER BY ID ASC";
}
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
								            $json[] =	[
															'id'		=>$row['ID'],
															'value'		=>$row['ID'],
															'text'	=>$row['PRODUCT_NAME']
														]; 
        									}
echo json_encode($json);