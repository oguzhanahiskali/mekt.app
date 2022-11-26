<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$myArray = array();
if($_POST){
    $PostID = $_POST['imageId'];
    $path = 'upload/'.$PostID;
    if (is_file($path)) {
        unlink($path);
        $myArray = [ 'status'=>true];

        if(isset($_POST['postID'])){
            $ids = $_POST['postID'];
            $query = $db->prepare(
                "UPDATE tbl_gider SET
                FILE = '',
                UID	= ?,
                UDT = NOW()
                WHERE ID = $ids AND
                FIRMA_ID = $user_Firma AND
                SUBE_ID = $user_Sube
                ");
    
            $update = $query->execute(array(
                $user_ID
            ));
        }
    } else {
        $myArray = [ 'status'=>false];
    }
}else{
    $myArray = [ 'status'=>false];
}

echo json_encode($myArray);

?>