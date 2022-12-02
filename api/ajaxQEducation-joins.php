<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$json = [];
$jsonComapnyJoin = [];
$jsonComapnyAll = [];

if(!empty($_POST['id'])){

   $id = $_POST['id'];

   //Customers
      $query = $db->query("SELECT ID, ADI, SOYADI, DT FROM tbl_musteri_kimlik WHERE ID IN ( SELECT JOIN_ID FROM tbl_egitim_grup_join WHERE JOIN_TYPE='vatandas' AND GRUP_ID = '$id')", PDO::FETCH_ASSOC);
      if ( $query->rowCount() ){
         foreach( $query as $row ){
            $json['Customers'][] = [
               'ID'                 =>  intval($row['ID']),
               'companyTitle'       =>  $row['ADI'].' '.$row['SOYADI'],
               'joinStatus'         =>  true,
               'DT'                 =>  $row['DT']
            ];
         }
      }

      $query = $db->query("SELECT ID, ADI, SOYADI, DT FROM tbl_musteri_kimlik WHERE ID NOT IN ( SELECT JOIN_ID FROM tbl_egitim_grup_join WHERE JOIN_TYPE='vatandas' AND GRUP_ID = '$id')", PDO::FETCH_ASSOC);
      if ( $query->rowCount() ){
         foreach( $query as $row ){
            $json['Customers'][] = [
               'ID'                 =>  intval($row['ID']),
               'companyTitle'       =>  $row['ADI'].' '.$row['SOYADI'],
               'joinStatus'         =>  false,
               'DT'                 =>  $row['DT']
            ];
         }
      }

   // // $sql = "SELECT * FROM tbl_company WHERE NOT IN ID = ( SELECT ID FROM tbl_egitim_grup_join WHERE JOIN_TYPE='sirket' AND GRUP_ID = '$id')";
   // // $result = $mysqli->query($sql);

   // // while($row = $result->fetch_assoc()){
   // //    $jsonComapnyJoin[] = [
   // //       'ID'      =>  $row['ID'],
   // //       'CompanyName' =>  $row['companyName'],
   // //       'JoinStatus' => false
   // //    ];
   // // }


   // $sql = "SELECT ID, CASE WHEN JOIN_TYPE='sirket'
   //           THEN (SELECT c.companyName FROM tbl_company c WHERE c.ID = j.JOIN_ID)
   //           ELSE (SELECT CONCAT(m.ADI,' ',m.SOYADI)
   //           FROM tbl_musteri_kimlik m
   //           WHERE m.ID = j.JOIN_ID) END AS JoinName
   //        FROM tbl_egitim_grup_join j WHERE GRUP_ID = '$id'";
   // // $sql = "SELECT ID FROM tbl_egitim_grup_join WHERE JOIN_TYPE='sirket' AND GRUP_ID = '$id'";
   // // $result = $mysqli->query($sql);

   // // while($row = $result->fetch_assoc()){
   // //    $jsonComapnyAll[] = [
   // //       'ID'      =>  $row['ID']
   // //    ];
   // // }

}else{
   $json[]=[
      'Results'   => 'Bad request!'
   ];
}

echo json_encode($json);

?>