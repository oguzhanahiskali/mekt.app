<?php

include '../header-top.php';

  $QappArea = "SELECT AREA FROM view_regions_id WHERE STATUS = 1 AND FIRMA_ID = $user_Firma";
  $ResAppArea = $mysqli->query($QappArea);

  $QhizBolge = "SELECT AREA FROM tbl_hizmet_bolge";
  $ResHizBolge = $mysqli->query($QhizBolge);

  $ArrAppArea = [];
  $ArrHizBolge = [];

  while($row = $ResAppArea->fetch_assoc()){ array_push($ArrAppArea, $row['AREA']); }
  while($row = $ResHizBolge->fetch_assoc()){ array_push($ArrHizBolge, $row['AREA']); }

  $ArrDiff = array_values(array_diff($ArrHizBolge, $ArrAppArea));
  echo json_encode($ArrDiff);