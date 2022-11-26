<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$id = $_GET['id'];

ini_set("display_errors", 1);

$sql = "SELECT ID, TAKSIT_ID, TAKSIT_TARIHI, TAHSILAT_DURUM, TAHSILAT_TIPI, FIYAT, CURRENCY
FROM tbl_seans_taksit
WHERE ID = $id";

        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
                            $json[] = [
                              'id'      =>  intval($row['ID']),
                              'taksit_id' =>  intval($row['TAKSIT_ID']),
                              'taksit_tarihi' =>  $row['TAKSIT_TARIHI'],
                              'tahsilat_durum'=>  intval($row['TAHSILAT_DURUM']),
                              'tahsilat_tipi' =>  intval($row['TAHSILAT_TIPI']),
                              'fiyat'     =>  intval($row['FIYAT']),
                              'currency'     =>  $row['CURRENCY']
                            ]; 
                          }
echo json_encode($json);