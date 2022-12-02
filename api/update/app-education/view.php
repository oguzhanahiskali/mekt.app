<?php
   include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
   
   $json = [];
   $joinAll = [];
   $joinPost = [];

   if($_POST['Where']['Grp'] && $_POST['Where']['Edu'] && $_POST['Joins']){
          $GroupID = $_POST['Where']['Grp'];
          $EduID = $_POST['Where']['Edu'];
          $IDjoin = $_POST['Joins'];
          
         $query = $db->query("SELECT * FROM tbl_egitim_grup_join WHERE GRUP_ID = '{$GroupID}'", PDO::FETCH_ASSOC);
         if ( $query->rowCount() ){
            foreach( $query as $row ){ $joinAll['a'][] = $row['ID']; }
         }
         $joinPost['ekle'][] = $IDjoin;
         $fark = array_diff($joinAll['a'],$joinPost['ekle'][0]);

         foreach ($IDjoin as $v) {
            $query = $db->prepare("UPDATE tbl_egitim_grup_join SET JOIN_STATUS = 1 WHERE ID = ? AND GRUP_ID = ?");
            $update = $query->execute(array( $v, $GroupID));
         }
         foreach ($fark as $v) {
            $query = $db->prepare("UPDATE tbl_egitim_grup_join SET JOIN_STATUS = 0 WHERE ID = ? AND GRUP_ID = ?");
            $update = $query->execute(array( $v, $GroupID));
         }
         if ( $update ){ $json=['code'=> 1000, 'status' => true]; }else{$json=['code'=> 1001, 'status' => false]; }
     }else{
          $json=['code'=> 1012, 'status' => false];
     }

   echo json_encode($json);

?>