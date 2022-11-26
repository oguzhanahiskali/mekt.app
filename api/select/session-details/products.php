<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';


ini_set("display_errors", 1);


if(!empty($_POST['id'])){
  $id = $_POST['id'];

  $sql = "SELECT
	u.ID,
	( SELECT PRODUCT_NAME FROM tbl_product_cart WHERE ID = u.PRODUCT ) AS PRODUCT,
  u.PRODUCT AS PRODUCTID,
	u.SCALE,
	u.TYPE, u.PRICE, u.CURRENCY, u.PAYMENT_TYPE, u.BUY_STATUS, u.UID, u.DT FROM tbl_seans_kart_urun u WHERE u.ID = '$id' AND FIRMA_ID=$user_Firma AND DURUM = 1";
}else{
  $sql = "SELECT
	u.ID,
	( SELECT PRODUCT_NAME FROM tbl_product_cart WHERE ID = u.PRODUCT ) AS PRODUCT,
  u.PRODUCT AS PRODUCTID,
	u.SCALE,
	u.TYPE,
  u.PRICE, u.CURRENCY, u.PAYMENT_TYPE, u.BUY_STATUS, u.UID, u.DT FROM tbl_seans_kart_urun u WHERE FIRMA_ID=$user_Firma AND DURUM = 1";
}
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
                            $json[] = [
                              'id'      =>  intval($row['ID']),
                              'product' =>  $row['PRODUCT'],
                              'productID' =>  $row['PRODUCTID'],
                              'scale' =>  $row['SCALE'],
                              'paymentType'=>  $row['PAYMENT_TYPE'],
                              'type'=>  $row['TYPE'],
                              'price' =>  $row['PRICE'],
                              'currency' =>  $row['CURRENCY'],
                              'buy_status' =>  $row['BUY_STATUS']
                            ]; 
                          }
echo json_encode($json);