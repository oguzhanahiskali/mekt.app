<?php
include '../header-top.php';

$id = $_GET['id'];

ini_set("display_errors", 1);


$sql = "SELECT ID, TAKSIT_ID, TAKSIT_TARIHI, TAHSILAT_DURUM, ODEMETURU, FIYAT
FROM tbl_hatirlatma_taksit
WHERE ID = $id AND FIRMA_ID = $user_Firma";

        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
            $tahsilat_tipi = $row['ODEMETURU'];
            if($tahsilat_tipi=='Nakit'){
                $tahsilat_tipi = 1;
            }else if($tahsilat_tipi=='Havale / EFT'){
                $tahsilat_tipi = 2;
            }else if($tahsilat_tipi=='Kredi Kartı'){
                $tahsilat_tipi = 3;
            }
                            $json[] = [
                              'id'      =>  $row['ID'],
                              'taksit_id' =>  $row['TAKSIT_ID'],
                              'taksit_tarihi' =>  $row['TAKSIT_TARIHI'],
                              'tahsilat_durum'=>  $row['TAHSILAT_DURUM'],
                              'tahsilat_tipi' =>  $tahsilat_tipi,
                              'fiyat'     =>  $row['FIYAT']
                            ]; 
                          }
echo json_encode($json);