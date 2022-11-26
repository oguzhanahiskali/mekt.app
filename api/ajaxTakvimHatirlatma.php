<?php
include '../header-top.php';

$id = $_GET['varSeansID'];

ini_set("display_errors", 1);


$sql = "SELECT * from tbl_hatirlatma WHERE ID = '$id' AND FIRMA_ID=$user_Firma";
        $result = $mysqli->query($sql);

        $json = [];
        while($row = $result->fetch_assoc()){
                            $json[] = [
                              'id'      =>  $row['ID']
                            ]; 
                          }
echo json_encode($json);