<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(isset($_POST['ids'])){
    $id           = $_POST['ids'];
    $gizle = 0;
    $Q = "UPDATE tbl_product_party SET STATUS = '{$gizle}' WHERE ID = $id AND FIRMA_ID = $user_Firma";
    $query = $db->prepare($Q);
    $update = $query->execute();

    if ( $update ){
        $arrResult['result']=true;
    }else{
        $arrResult=false;
    }
    echo json_encode($arrResult);
}
// $arr = [];
// $arr2 = [];
// $arr3 = [];
// $arr4 = [];
// $arrResult = [];
//         $query = $db->query("SELECT ID, BOLGE_ID FROM tbl_seans_kart WHERE FIRMA_ID = $user_Firma", PDO::FETCH_ASSOC);
//         if ( $query->rowCount() ){
//             foreach( $query as $row ){
//                 $withoutCommas = array_map('intval', explode(', ', $row['BOLGE_ID']));


//                 if(!in_array(0, $withoutCommas)){
//                   $arr[]=[
//                     'id'   => $withoutCommas,
//                     'IDD' => $row['ID']
//                   ];
//                 }
//             }
//         }

//         $last_names = array_column($arr, 'id');

//         foreach ($last_names as $key => $value) {
//            foreach ($value as $keys => $values) {
             
//              array_push($arr2, $values);
//                 if (in_array($id, $value)) {
//                   array_push($arr4, $arr[$key]['IDD']);
//                 }
//            }
//         }
//         $a1 = array_unique($arr2);
//         $a2 = array_filter($a1);
//         foreach ($a2 as $key => $value) {
//             array_push($arr3, $value);
//          }
//         $a3 = array_values(array_unique($arr4));

        
        
//         if(count($a3)>0){
//           $arrResult=[
//             'result'   => false
//           ];
//         }else{
//           $arrResult=[
//             'result'   => true
//           ];
          
//           $query = $db->prepare("DELETE FROM tbl_firma_application_area WHERE ID = :id AND FIRMA_ID = $user_Firma");
//           $delete = $query->execute(array(
//             'id' => $id
//           ));


//           // $Q = "UPDATE tbl_firma_application_area SET STATUS = '{$gizle}' WHERE ID = $id AND FIRMA_ID = $user_Firma";
//           // $query = $db->prepare($Q);
//           // $update = $query->execute();

//           if ( $delete ){
//               $arrResult['Message']=[
//                 'msg'   => 'success'
//               ];
//           }
//         }

//         foreach($a3 as $key => $value){
//           $arrResult['This'][$key]=[
//             'id'   => $value
//           ];
//         }
//         echo json_encode($arrResult);
  ?>