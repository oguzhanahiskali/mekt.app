<?php
include '../header-top.php';
include '../functions.php';

$id     = $_GET['ids'];
$gizle  = 0;

    //Query for Log
    $QfLog = $db->query("SELECT * FROM view_musteriler WHERE ID = '{$id}' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);
    //$old = $QfLog;

   // echo "SELECT * FROM view_musteriler WHERE ID = '{$id}' AND FIRMA_ID = $user_Firma";
ECHO "ASD";
    if ( $QfLog->rowCount() ){
        foreach( $QfLog as $row ){
             print $row['HIZSAY']."<br>";
        }
   }
    
    /*
        $query = $db->prepare("UPDATE tbl_muteri_kimlik SET
        DURUM = ?
        WHERE ID = $id AND FIRMA_ID = $user_Firma");

        $update = $query->execute(array(
            $gizle
        ));
        if ( $update ){
             print "basarili";
        }
        */

    //$QfLog = $db->query("SELECT * FROM tbl_muteri_kimlik WHERE ID = '{$id}' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);
/*
    //new value arrays in push
    $new = $QfLog;

    $eski = array_diff_assoc($old, $new); //old and new value diffrents
    $yeni = array_diff_assoc($new, $old); //new and old value diffrents

    //logs saved!
    logSQL($user_ID, 'Müşteri Silme', $eski, $yeni);
*/
  ?>