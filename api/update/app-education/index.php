<?php
   include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

   $status = 1;
   
   if($_POST['inp-edit-grup-adi'] && $_POST['inp-edit-start'] && $_POST['inp-edit-finish'] && $_POST['editID']){
          $grupAdi = $_POST['inp-edit-grup-adi'];
          $grupStart = $_POST['inp-edit-start'];
          $grupFinish = $_POST['inp-edit-finish'];
          $whereID = $_POST['editID'];

          $query = $db->prepare("UPDATE tbl_egitim_grup SET
               GRUP_ADI = ?,
               START = ?,
               FINISH = ?,
               UID = $user_ID
               WHERE ID = $whereID");

          $update = $query->execute(array(
                    $grupAdi,
                    $grupStart,
                    $grupFinish
               ));

          if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
          else{           $json=['code'=> 1001, 'status' => false]; }
     }else{
          $json=['code'=> 1012, 'status' => false];
     }

   echo json_encode($json);

?>