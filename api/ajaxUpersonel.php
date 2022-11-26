<?php
include '../header-top.php';
include '../functions.php';

        $gorevi   = $_POST['gorevi'];
        $userStatus    = $_POST['userStatus'];

        $username    = $_POST['username'];
        $telefon   = $_POST['telefon'];
        $maas   = $_POST['maas'];
        $eposta   = $_POST['eposta'];
        $adres   = $_POST['adres'];
        $sigortasicil   = $_POST['sigortasicil'];
        $isegirisdt   = date('Y-m-d', strtotime($_POST['isegirisdt']));

        $bul = " ";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = "-";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = "(";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = ")";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);

        $ids             = $_POST['personelID'];

        if($_POST['xpassword']!==""){ // şifre alanı dolu ise
            $xpassword  = PASSWORD_hash($_POST['xpassword'], PASSWORD_DEFAULT);

            $QfLog = $db->query("SELECT * FROM tbl_personel WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
            $old = $QfLog;


            $query        = $db->prepare("UPDATE tbl_personel SET
            TUR         = ?,
            USERSTATUS  = ?,
            USERNAME    = ?,
            PASSWORD    = ?,
            MAAS        = ?,
            CEP         = ?,
            EPOSTA      = ?,
            ADRES       = ?,
            SIGORTASICIL= ?,
            ISEGIRISDT  = ?
    
            WHERE ID      = $ids");
            $update       = $query->execute(array(
                 $gorevi,
                 $userStatus,
                 $username,
                 $xpassword,
                 $maas,
                 $telefon,
                 $eposta,
                 $adres,
                 $sigortasicil,
                 $isegirisdt
            ));

            $QfLog = $db->query("SELECT * FROM tbl_personel WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
            $new = $QfLog;

            //$eski = array_diff_assoc($old, $new); //old and new value diffrents
            //$yeni = array_diff_assoc($new, $old); //new and old value diffrents

            //logs saved!
            //logSQL($user_ID, 'Personel Güncelleme', $eski, $yeni);

        }else{ // şifre alanı boş ise

            $QfLog = $db->query("SELECT * FROM tbl_personel WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
            $old = $QfLog;

            $query        = $db->prepare("UPDATE tbl_personel SET
            TUR         = ?,
            USERSTATUS  = ?,
            USERNAME    = ?,
            CEP         = ?,
            MAAS        = ?,
            EPOSTA      = ?,
            ADRES       = ?,
            SIGORTASICIL= ?,
            ISEGIRISDT  = ?
    
            WHERE ID      = $ids");
            $update       = $query->execute(array(
                 $gorevi,
                 $userStatus,
                 $username,
                 $telefon,
                 $maas,
                 $eposta,
                 $adres,
                 $sigortasicil,
                 $isegirisdt
            ));
            $QfLog = $db->query("SELECT * FROM tbl_personel WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
            $new = $QfLog;

            $eski = array_diff_assoc($old, $new); //old and new value diffrents
            $yeni = array_diff_assoc($new, $old); //new and old value diffrents

            //logs saved!
            logSQL($user_ID, 'Personel Güncelleme', $eski, $yeni);

        }

        if ( $update ){
             print "Güncelleme Başarılı";
        }else{
            print "hata";
        }


  ?>