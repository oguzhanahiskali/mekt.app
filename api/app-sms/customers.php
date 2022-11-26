<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

  $sql = "SELECT * FROM view_tum_musteriler WHERE FIRMA_ID=$user_Firma ORDER BY ID DESC";
  $result = $mysqli->query($sql);  
  $json = [];
  while($row = $result->fetch_assoc()){
    $json[] =	[
      'Phone'		=>$row['CEP'],
      'Customer'	=>$row['ADISOYADI']
    ]; 
  }
  echo json_encode($json);