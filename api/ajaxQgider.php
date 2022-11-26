<?php 
include '../header-top.php';

$id = $_GET['id'];

ini_set("display_errors", 1);


$sql = "SELECT * FROM tbl_gider WHERE ID = '$id' AND FIRMA_ID=$user_Firma";
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
                            $json[] = [
                              'id'      =>  $row['ID'],
                              'ADI' =>  $row['ADI'],
                              'ACIKLAMA' =>  $row['ACIKLAMA'],
                              'TUTAR'=>  $row['TUTAR'],
                              'ODEMETURU' =>  $row['ODEMETURU'],
                              'PERIYODIK' =>  $row['PERIYODIK'],
                              'PERIYODIKDT' =>  $row['PERIYODIK_DT'],
                              'DT' =>  $row['DT']
                            ]; 
                          }
echo json_encode($json);