<?php
include $_SERVER['DOCUMENT_ROOT'].'/conf.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions.php';


$PostVerificationCode   = $_POST['VerificationCode'];
$PostPhone              = $_POST['Phone'];


$query = $db->query("SELECT * FROM tbl_sms_company WHERE Telefon LIKE '%$PostPhone' ORDER BY ID DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

$QueryVerifyCode = $query['VerificationCode'];

if($PostVerificationCode==$QueryVerifyCode){
    $json=['status'=> true];
}else{
    $json=['status'=> false];
}

echo json_encode($json);
