<?php
include '../header-top.php';

$id = $_GET['id'];

ini_set("display_errors", 1);


$sql = "SELECT * FROM view_yeni_firma_bildirimi";
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
                            $json[] = [
                              'id'      =>  $row['ID'],
                              'tarih' =>  $row['Tarih'],
                              'telefon' =>  $row['Telefon'],
                              'mesaj'=>  $row['Mesaj']
                            ]; 
                          }
echo json_encode($json);