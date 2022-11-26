<?php
include '../header-top.php';

if(!empty($_POST['lang'])){
    $langs = $_POST['lang'];

    if($langs == 'tr' || $langs == 'en'){
        $query = $db->prepare("UPDATE tbl_personel SET
        DIL = '$langs'
        WHERE ID = $user_ID");
        $update = $query->execute();
        if ( $update ){ print "success"; }else{ echo "errörx";}
    }else{ echo "errör2"; }


}else{
    echo "errör";
}
