<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$json = [];

if(!empty($_GET['id'])){

   $id = $_GET['id'];

   $sql = "SELECT * FROM tbl_egitim_grup WHERE ID = '$id'";
   $result = $mysqli->query($sql);

   while($row = $result->fetch_assoc()){
      $json = [
         'ID'      =>  $row['ID'],
         'GRUP' =>  $row['GRUP_ADI'],
         'START'=>  $row['START'],
         'FINISH' =>  $row['FINISH'],
         'STATUS' =>  $row['STATUS'],
         'DT'     =>  $row['DT']
      ];
   }

}else{
   $json[]=[
      'Results'   => 'Bad request!'
   ];
}
      
      echo json_encode($json);
?>