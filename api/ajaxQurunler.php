<?php
include '../header-top.php';

$id = $_GET['id'];

ini_set("display_errors", 1);



$sql = "SELECT * FROM tbl_products WHERE ID = '$id' AND FIRMA_ID=$user_Firma";
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
                            $json[] = [
                              'id'      =>  $row['ID'],
                              'product' =>  $row['PRODUCT'],
                              'scale' =>  $row['SCALE'],
                              'type'=>  $row['TYPE'],
                              'price' =>  $row['PRICE']
                            ]; 
                          }
echo json_encode($json);