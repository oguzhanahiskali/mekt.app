<?php
include '../header-top.php';


        $telefon   = $_POST['telefon'];
        $eposta   = $_POST['eposta'];
        $adres   = $_POST['adres'];

        $bul = " ";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = "-";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = "(";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = ")";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);

        $ids             = $_POST['personelID'];

        if($_POST['xpassword']!==""){ // şifre alanı dolu ise
            $xpassword  = PASSWORD_hash($_POST['xpassword'], PASSWORD_DEFAULT);

            $query        = $db->prepare("UPDATE tbl_personel SET
            PASSWORD    = ?,
            CEP         = ?,
            EPOSTA      = ?,
            ADRES       = ?

            WHERE ID      = $ids");
            $update       = $query->execute(array(
                 $xpassword,
                 $telefon,
                 $eposta,
                 $adres
            ));

        }else{ // şifre alanı boş ise

            $query        = $db->prepare("UPDATE tbl_personel SET
            CEP         = ?,
            EPOSTA      = ?,
            ADRES       = ?
    
            WHERE ID      = $ids");
            $update       = $query->execute(array(
                 $telefon,
                 $eposta,
                 $adres
            ));
        }
        if ( $update ){
             print "Güncelleme Başarılı";
        }else{
            print "hata";
        }
  ?>