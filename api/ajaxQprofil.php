<?php
include '../header-top.php';

$id = $_GET['id'];

ini_set("display_errors", 1);



$sql = "SELECT ID, TC, ADI, SOYADI, DATE_FORMAT(DOGUM_TARIHI,'%Y-%m-%d') AS DOGUM_TARIHI, ADRES, CEP, EPOSTA, CINSIYET, FEEDBACK_SMS, FEEDBACK_CALL FROM tbl_musteri_kimlik WHERE ID = '$id' AND FIRMA_ID=$user_Firma";
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
                            $json[] = [
                              'id'      =>  $row['ID'],
                              'tc' =>  $row['TC'],
                              'adi' =>  $row['ADI'],
                              'soyadi'=>  $row['SOYADI'],
                              'dogum_tarihi'=>  $row['DOGUM_TARIHI'],
                              'adres'=>  $row['ADRES'],
                              'cep'=>  $row['CEP'],
                              'eposta'=>  $row['EPOSTA'],
                              'cinsiyet'=>  $row['CINSIYET'],
                              'feedback_sms'=>  $row['FEEDBACK_SMS'],
                              'feedback_call'=>  $row['FEEDBACK_CALL'],
                            ]; 
                          }
echo json_encode($json);