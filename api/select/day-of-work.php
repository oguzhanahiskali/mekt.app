<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$refferURL = $_SERVER['HTTP_REFERER'];
$sql = "SELECT * FROM tbl_dayOfWork WHERE FIRMA_ID = $user_Firma";
        $result = $mysqli->query($sql);

        $json = [];


        if(str_contains($refferURL, 'app-events.php')){
          while($row = $result->fetch_assoc()){
            if($row['STATUS']=='false'){
            }else{
              $json[] = [
                'dow'      =>  [intval($row['DAY_OF_WORK'])],
                'status'      =>  $row['STATUS'],
                'start' =>  date( 'h:i', strtotime($row['HOURS_START']) ),
                'end' =>  date( 'H:i', strtotime($row['HOURS_FINISH']) )
              ]; 
            }
          }  
        }else{
          while($row = $result->fetch_assoc()){
            $json[] = [
              'dow'      =>  [intval($row['DAY_OF_WORK'])],
              'status'      =>  $row['STATUS'],
              'start' =>  date( 'h:i', strtotime($row['HOURS_START']) ),
              'end' =>  date( 'H:i', strtotime($row['HOURS_FINISH']) )
            ]; 
          }  
        }
echo json_encode($json);