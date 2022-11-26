<?php
include '../header-top.php';

$id = $_GET['id'];

ini_set("display_errors", 1);

$sql = "SELECT
ID,
(SELECT
`t`.`FIRMA_ADI` 
FROM
`tbl_firma` `t` 
WHERE
`t`.`FIRMA_ID` = tbl_personel.FIRMA_ID
) AS `FIRMA_ADI`,
DURUM,
TUR,
USERSTATUS,
USERNAME,
ADI,
SOYADI,
DOGUMT,
MAAS,
CEP,
EPOSTA,
ADRES,
SIGORTASICIL,
ISEGIRISDT

FROM tbl_personel WHERE ID = $id AND FIRMA_ID = $user_Firma";

        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc())
        {
            $json[] = [
                'id'            =>  $row['ID'],
                'durum'         =>  $row['DURUM'],
                'tur'           =>  $row['TUR'],
                'userstatus'    =>  $row['USERSTATUS'],
                'tc'            =>  $row['USERNAME'],
                'firma_adi'     =>  $row['FIRMA_ADI'],
                'adi'           =>  $row['ADI'],
                'soyadi'        =>  $row['SOYADI'],
                'dogumT'        =>  $row['DOGUMT'],
                'maas'          =>  $row['MAAS'],
                'cep'           =>  $row['CEP'],
                'eposta'        =>  $row['EPOSTA'],
                'adres'         =>  $row['ADRES'],
                'sigortasicil'  =>  $row['SIGORTASICIL'],
                'isegirisdt'    =>  $row['ISEGIRISDT']
            ]; 
        }
echo json_encode($json);