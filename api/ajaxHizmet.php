<?php
include '../header-top.php';
$json = array();
$filterQS = null;
if(isset($_GET['areaFilter'])){
   $filterQS = $_GET['areaFilter'];
}
   if(isset($_GET['q'])){
      $filters = $_GET['q'];
         $sql = "SELECT
         h.ID,
         h.HIZMET_ADI,
         h.HIZMET_FIYAT,
         h.CURRENCY,
         h.REGIONS,
         (SELECT ID FROM tbl_hizmet_sure where ADI = h.HIZMET_SURE) AS H_ID,
         h.HIZMET_SURE,
         (SELECT ID FROM tbl_hizmet_seans where ADI = h.HIZMET_SEANS) AS S_ID,
         h.HIZMET_SEANS,
         h.DURUM
         FROM
         tbl_hizmet h
         WHERE
         h.DURUM = 1 AND
         h.HIZMET_ADI LIKE '%".$filters."%' AND
         h.FIRMA_ID=$user_Firma ORDER BY h.HIZMET_ADI";
      $result = $mysqli->query($sql);
   }else{
      $sql = "SELECT
         h.ID,
         h.HIZMET_ADI,
         h.HIZMET_FIYAT,
         h.CURRENCY,
         h.REGIONS,
         (SELECT ID FROM tbl_hizmet_sure where ADI = h.HIZMET_SURE) AS H_ID,
         h.HIZMET_SURE,
         (SELECT ID FROM tbl_hizmet_seans where ADI = h.HIZMET_SEANS) AS S_ID,
         h.HIZMET_SEANS,
         h.DURUM
         FROM
         tbl_hizmet h
         WHERE
         h.DURUM = 1 AND
         h.FIRMA_ID=$user_Firma  ORDER BY h.HIZMET_ADI";
         $result = $mysqli->query($sql);
   }
   while($row = $result->fetch_assoc()){
      $regionArray = [];

      // $SelectedArr = explode(',', $row['REGIONS'] ?? '')
      $withoutCommas = array_map('intval', explode(',', $row['REGIONS'] ?? ''));
      // $resultx = array_diff($withoutCommas, [0]);   
      sort($withoutCommas);
      foreach ($withoutCommas as $id) {
         if(isset($filterQS)){
            $sqls = "SELECT a.*,
                     (SELECT ADI FROM tbl_hizmet_sure where ID = a.DURATION) AS SURE_ADI,
                     (SELECT SURE FROM tbl_hizmet_sure where ID = a.DURATION) AS TIME
                     FROM view_regions_id a WHERE ID =$id AND STATUS = 1 AND a.AREA LIKE '%".$filterQS."%' ORDER BY a.AREA";
         }else{
            $sqls = "SELECT a.*,
                     (SELECT ADI FROM tbl_hizmet_sure where ID = a.DURATION) AS SURE_ADI,
                     (SELECT SURE FROM tbl_hizmet_sure where ID = a.DURATION) AS TIME
                     FROM view_regions_id a WHERE ID =$id AND STATUS = 1  ORDER BY a.AREA";

         }
            $query = $db->query($sqls)->fetch(PDO::FETCH_ASSOC);
         if ( $query ){
            $regionArray[] =[
               'id' => intval($query['ID']),
               'text' => $query['AREA'],
               'sure' => [
                     'id' => intval($query['DURATION']),
                     'text' => $query['SURE_ADI'],
                     'time' => intval($query['TIME'])
                  ],
               'fiyat'     =>intval($query['PRICE'])
            ];
         }
      }
      array_multisort( array_column( $regionArray, 'text' ), SORT_ASC, $regionArray );


      $json['Services'][] =[
         'id'		=>intval($row['ID']),
         'text'		=>$row['HIZMET_ADI'],
         'fiyat'		=>intval($row['HIZMET_FIYAT']),
         'currency'  => $row['CURRENCY'],
         'seans' => [
            'id' => intval($row['S_ID']),
            'text' => $row['HIZMET_SEANS']
         ],
         'sure' => [
            'id' => intval($row['H_ID']),
            'text' => $row['HIZMET_SURE'],
         ],
         'regions'=> $regionArray,
      ];
   }
echo json_encode($json);
// print_r($json);
