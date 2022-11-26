<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

  if(!empty($_GET['term'])){
    $query = $_GET['term'];
    $sql = "SELECT * FROM view_ProductStockUseds WHERE PRODUCT LIKE '%$query%' OR BARCODE LIKE '%$query%' AND FIRMA_ID=$user_Firma AND STATUS = 1 ORDER BY PRODUCT";
  }else{
    $sql = "SELECT * FROM view_ProductStockUseds WHERE FIRMA_ID=$user_Firma AND STATUS = 1 ORDER BY PRODUCT";
  }

  $result = $mysqli->query($sql);

  $json = [];
  while($row = $result->fetch_assoc()){
    //Product Type Short Process
      if($row['TYPE']=='MiliLitre'){ $type = 'ml'; }else
      if($row['TYPE']=='SantiLitre'){ $type = 'sl'; }else
      if($row['TYPE']=='Litre'){ $type = 'lt'; }else
      if($row['TYPE']=='KiloGram'){ $type = 'kg'; }else
      if($row['TYPE']=='MiliGram'){ $type = 'mg'; }else
      if($row['TYPE']=='Adet'){ $type = 'Adet'; }
    //json
      $json[] = [
        'id'      =>  intval($row['PID']),
        'text' =>  $row['PRODUCT'].' ~ ['.$row['SCALE'].' '.$type.'] ~ ['.$row['PRICE'].' '.$row['CURRENCY'].']'.' ['.$row['STOCK'].'/'.$row['USED'].']',
        'text2' =>  $row['PRODUCT'],
        'productStock' => intval($row['STOCK']),
        'productUsed' => intval($row['USED']),
        'scale' =>  intval($row['SCALE']),
        'type' =>  $row['TYPE'],
        'price' =>  intval($row['PRICE']),
        'currency' =>  $row['CURRENCY']
      ]; 
  }
  echo json_encode($json);