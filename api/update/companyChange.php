<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if($_POST['CIM'] && $user_ID==33){
   $CompanyID = $_POST['CIM'];

   $UcompanyChange = $db->prepare("UPDATE tbl_personel SET FIRMA_ID = '$CompanyID' WHERE ID = 33");
   $update = $UcompanyChange->execute();
   if ($update ){ $jsonResults=['code'=> 1000,'status'=>true]; }

}else{
    $jsonResults=['code'=> 2000,'status'=>false];
}

echo json_encode($jsonResults);
