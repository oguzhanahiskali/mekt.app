<?php
include '../header-top.php';
include '../functions.php';

     $adi         = $_GET['datagideradi'];
     $aciklama    = $_GET['dataaciklama'];
     $tutar       = $_GET['datafiyat'];
     $odemeturu   = $_GET['dataodemeturu'];
     $periyodik   = $_GET['dataperiyodik'];
     $periyodikdt = $_GET['dataperiyodikdt'];
     $bugun       = date('Y-m-d H:i:s');

 if (!empty($adi) AND !empty($aciklama) AND !empty($tutar) AND !empty($odemeturu) AND !empty($periyodik)) {
        //include 'conf.php';

        $query        = $db->prepare("INSERT INTO tbl_gider SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        ADI = ?,
        ACIKLAMA = ?,
        TUTAR = ?,
        ODEMETURU = ?,
        PERIYODIK = ?,
        PERIYODIK_DT = ?,
        UID = ?
        ");

        $update       = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $adi,
            $aciklama,
            $tutar,
            $odemeturu,
            $periyodik,
            $periyodikdt,
            $user_ID
        ));
        if ( $update ){
             print "basarili";
        }

        $last_id = $db->lastInsertId();
        $QfLog = $db->query("SELECT * FROM tbl_gider WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
        $eski = '';
        $new = $QfLog;
        //logs saved!
        logSQL($user_ID, 'Gider Ekleme', $eski, $new);


    }else{
      echo "Boş alanlar var.";
    }
?>