<?php
include '../header-top.php';
include '../functions.php';

    $gorevi = $_GET['gorevi'];
    $un     = $_GET['username'];
    $tc     = $_GET['tckimlikno'];
    $adi    = $_GET['ad'];
    $soyadi = $_GET['soyad'];
    $dt     = $_GET['dogumtarihi'];
    $eposta = $_GET['eposta'];
    $adres  = $_GET['adres'];
    $sigsic = $_GET['sigortasicil'];
    $isgirdt= $_GET['isegirisdt'];
    $userstatus= $_GET['userstatus'];

    if (!empty($tc))
    {
        $pw     = PASSWORD_hash($_GET['xpassword'], PASSWORD_DEFAULT);

        $telefon = $_GET['telefon'];
        $bul = " ";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = "-";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = "(";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);
        $bul = ")";$degistir = "";$telefon = str_replace($bul, $degistir, $telefon);

        $durum = 1;

        $query = $db->prepare("
            INSERT INTO tbl_personel SET
            DURUM = :durum,
            FIRMA_ID = :firmaid,
            SUBE_ID = :subeid,
            TUR = :tur,
            USERSTATUS = :userstatus,
            USERNAME = :un,
            PASSWORD = :pw,
            TC = :tc,
            ADI = :adi,
            SOYADI = :soyadi,
            DOGUMT = :dogumdt,
            CEP = :cep,
            EPOSTA = :eposta,
            ADRES = :adres,
            SIGORTASICIL = :sigortasicil,
            ISEGIRISDT = :isegirisdt,
            UID = :uid
        ");

        $insert = $query->execute(array(
            "durum" => $durum,
            "firmaid" => $user_Firma,
            "subeid" => $user_Sube,
            "tur" => $gorevi,
            "userstatus" => $userstatus,
            "un" => $un,
            "pw" => $pw,
            "tc" => $tc,
            "adi" => $adi,
            "soyadi" => $soyadi,
            "dogumdt" => $dt,
            "cep" => $telefon,
            "eposta" => $eposta,
            "adres" => $adres,
            "sigortasicil" => $sigsic,
            "isegirisdt" => $isgirdt,
            "uid" => $user_ID
        ));

        $QfLog = $db->query("SELECT * FROM tbl_personel WHERE USERNAME = '{$un}'")->fetch(PDO::FETCH_ASSOC);

        $eski = '';
        $yeni = $QfLog;
        //logs saved!
        logSQL($user_ID, 'Peronel Ekleme', $eski, $yeni);


        $yetki = $_GET['yetkiler'];
        $count_yetkiler = count( $yetki );
    
        $mukerreryetki=array_unique($yetki);
        $yetkiler = implode(",", $mukerreryetki);

        $SqlYetki = "INSERT INTO tbl_yetkiler ( TC," .$yetkiler. ") VALUES (";
        $SqlYetki.= "'".$tc."',";
        for($sayi = 0; $sayi < $count_yetkiler-1; $sayi++)
        {
            $SqlYetki.= "'1',";
        }
            $SqlYetki.= "'1'";
            $SqlYetki.= ")";

        if ($link->query($SqlYetki) === TRUE) {
            //echo "New record created successfully";
        }

        if ($insert && $SqlYetki){
            $last_id = $db->lastInsertId();
            echo "basarili";
            //header("Location: /yeni-estetisyen-ekle.php?durum=OK");

        }else{
            echo "basarisiz";
            $error= $query->errorInfo();
            //header("Location: /yeni-estetisyen-ekle.php?durum=Basarisiz?hata=$error[2]");
        }

        $QfLog = $db->query("SELECT * FROM tbl_yetkiler WHERE TC = '{$tc}'")->fetch(PDO::FETCH_ASSOC);

        $eski = '';
        $yeni = $QfLog;
        //logs saved!
        logSQL($user_ID, 'Peronel Yetki Ekleme', $eski, $yeni);
    }
?>