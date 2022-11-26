<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$id = $_GET['id'];
$queryS = $db->prepare("DELETE FROM tbl_seans_kart_urun WHERE ID = {$id} AND FIRMA_ID = $user_Firma");
$update = $queryS->execute();

if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
else{           $json=['code'=> 1001, 'status' => false]; }
echo json_encode($json);

  ?>