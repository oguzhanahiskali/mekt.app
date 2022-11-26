<?php
include '../header-top.php';

  	 $id           = $_GET['id'];
$gizle = 0;
        $query = $db->prepare("UPDATE tbl_seans_kart SET
        DURUM = ?
        WHERE ID = $id");
        $update = $query->execute(array(
            $gizle
        ));
        if ( $update ){
             print "basarili";
        }

        $query = $db->prepare("UPDATE tbl_seans_detay SET
        DURUM = ?
        WHERE KART_ID = $id");
        $update = $query->execute(array(
            $gizle
        ));
        if ( $update ){
             //print "basarili";
        }

        $query = $db->prepare("UPDATE tbl_seans_taksit SET
        DURUM = ?
        WHERE KART_ID = $id");
        $update = $query->execute(array(
            $gizle
        ));
        if ( $update ){
             //print "basarili";
        }

        $query = $db->prepare("UPDATE tbl_musteri_sempton SET
        DURUM = ?
        WHERE KART_ID = $id");
        $update = $query->execute(array(
            $gizle
        ));
        if ( $update ){
             //print "basarili";
        }
  ?>