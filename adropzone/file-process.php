<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if($_POST['type']){
    $requestType = $_POST['type'];
    $baseFromJavascriptImgName = $_POST['imageName'];
    $filepath = "upload/".$baseFromJavascriptImgName;

    if($requestType=='upload'){
        $sessionID = $_POST['sessionID'];
        $baseFromJavascript = $_POST['base64'];
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript));
        file_put_contents($filepath,$data);
        $todayNow = date("Y-m-d H:i:s");
        
        $query = $db->prepare("INSERT INTO tbl_seans_dosya SET
        SEANS_ID = ?,
        PHOTO = ?,
        UID = ?,
        DT = ?
        ");

      $insert = $query->execute(array(
        $sessionID,
        $baseFromJavascriptImgName,
        $user_ID,
        $todayNow
      ));

      $date = date ("Y-m-d", strtotime("+".$fark." days", strtotime($date)));
      $sayi++;
        if ($insert ){
            $last_id = $db->lastInsertId();
        }else{ echo "basarisiz"; }
    }else if($requestType=='delete'){
        unlink($filepath);
        $odenmeyenID = $ArrExPay['ID'];
        $qq = "DELETE FROM tbl_seans_dosya WHERE PHOTO LIKE '$baseFromJavascriptImgName'";
        $query= $db->prepare($qq);
        $update = $query->execute();

    }
}







