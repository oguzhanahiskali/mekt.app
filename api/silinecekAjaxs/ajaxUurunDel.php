<?php
include '../header-top.php';

$id = $_GET['id'];
$gizle = 0;

        $QfLog = $db->query("SELECT * FROM tbl_products WHERE ID = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        $old = $QfLog;

        $query = $db->prepare("UPDATE tbl_products SET DURUM = ? WHERE ID = {$id} AND FIRMA_ID = $user_Firma");
        $update = $query->execute(array( $gizle ));

        $QfLog = $db->query("SELECT * FROM tbl_products WHERE ID = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        $new = $QfLog;

            $eski = array_diff_assoc($old, $new); //old and new value diffrents
            $yeni = array_diff_assoc($new, $old); //new and old value diffrents

        //logs saved!
        logSQL($user_ID, 'Hizmet Silme', $eski, $yeni); 

        if ( $update ){
             print "basarili";
        }
  ?>