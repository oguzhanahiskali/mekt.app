<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$json = [];

if(!empty($_GET['id'])){

   $id = $_GET['id'];

   $QallRegions = "SELECT ID, AREA FROM view_regions_id";
   $resultAllRegions = $mysqli->query($QallRegions);

   $sql = "SELECT * FROM tbl_hizmet WHERE ID = '$id' AND FIRMA_ID=$user_Firma";
         $result = $mysqli->query($sql);

         while($row = $result->fetch_assoc()){
            // $selectedList = $row['REGIONS'];
            // $SelectedArr = explode(', ',$selectedList);
            $SelectedArr = explode(',', $row['REGIONS'] ?? '');

            $json['Service'][] = [
               'ID'      =>  $row['ID'],
               'Name' =>  $row['HIZMET_ADI'],
               'Duration' =>  $row['HIZMET_SURE'],
               'NumbOfSession'=>  $row['HIZMET_SEANS'],
               'Price' =>  $row['HIZMET_FIYAT'],
               'Currency' =>  $row['CURRENCY']
            ];
         }

         while($row = $resultAllRegions->fetch_assoc()){
            foreach ($SelectedArr as $key => $value) {
               if(intval($row['ID'])==$value){
                   $json['Regions'][]=[
                       'id'   => intval($row['ID']),
                       'text'    => $row['AREA']
                   ];
               }
            }
         }


      }else{
         $json[]=[
            'Results'   => 'Bad request!'
        ];
      }
      
      echo json_encode($json);
?>