<?php
include '../header-top.php';
include '../functions.php';
//echo "<pre>";
//print_r($_POST);

$getKonu            = $_POST['dataKonu'];
$getAciklama        = $_POST['dataAciklama'];
$getHatirlatmaDT    = $_POST['dataHatirlatmaDT'];
$getOdemeTur        = $_POST['dataOdemeTur'];
$getilkOdeme        = $_POST['dataIlkOdeme'];
$getTaksitTur       = $_POST['dataTaksitTur'];
$getTaksitSayisi    = $_POST['dataTaksitSayisi'];
$getFiyat           = $_POST['dataFiyat'];
$getOdemeTarihi     = $_POST['dataOdemeTarihi'];
$getOdemeTuru       = $_POST['dataOdemeTuru'];

    if($getOdemeTur=='2'){ // Bu bir ödeme değil

        $durum = 1;
        $getOdemeTuru = 0;
        $getFiyat = 0;
        $getTaksitTur = 0;
        $getTaksitSayisi = 0;
        $Qhatirlatma = $db->prepare(
            "INSERT INTO tbl_hatirlatma SET
            FIRMA_ID = ?,
            SUBE_ID = ?,
            DURUM = ?,
            KONU = ?,
            ACIKLAMA = ?,
            ODEMETURU = ?,
            TUTAR = ?,
            TAKSIT = ?,
            STARTS = ?,
            ENDS = ?,
            USERID = ?
        ");
        $INShatirlatma = $Qhatirlatma->execute(array(
            $user_Firma,
            $user_Sube,
            $durum,
            $getKonu,
            $getAciklama,
            $getOdemeTuru,
            $getFiyat,
            $getTaksitTur,
            $getHatirlatmaDT,
            $getHatirlatmaDT,
            $kullaniciadi
        ));

        if ($INShatirlatma ) { $last_id = $db->lastInsertId(); }

        $QhatirlatmaFirstTaksit = $db->prepare(
            "INSERT INTO tbl_hatirlatma_taksit SET
            FIRMA_ID = ?,
            SUBE_ID = ?,
            DURUM = ?,
            EVENT_ID = ?,
            TAKSIT_ID = ?,
            TAKSIT_TARIHI = ?,
            ODEMETURU = ?,
            TAHSILAT_DURUM = ?,
            FIYAT = ?,
            USERID = ?
        ");
        $INShatirlatmaFirstTaksit = $QhatirlatmaFirstTaksit->execute(array(
            $user_Firma,
            $user_Sube,
            $durum,
            $last_id,
            $durum,
            $getHatirlatmaDT,
            $getOdemeTuru,
            $durum,
            $getFiyat,
            $kullaniciadi
        ));

        if ($INShatirlatmaFirstTaksit ) { echo 'basarili'; }

    }else if($getOdemeTur=='Evet'){ //Bu bir ödeme
    
        if( !empty($getTaksitTur=='Evet') &&
            !empty($getTaksitSayisi>1) &&
            !empty($getFiyat)
            ){
            // ilk ödeme hariç taksit sayısı
            if($getTaksitSayisi>=3){
                $taksitsayisi = $getTaksitSayisi-1;
            }else{
                $taksitsayisi = 2;
            }

            $kalanodeme = $getFiyat - $getilkOdeme;
            
            if($getTaksitSayisi>2){
                $fiyattaksit = intval($kalanodeme) / intval($taksitsayisi);
            }else{
                $fiyattaksit = intval($kalanodeme);
            }
            /*
            echo "</br>";
            echo "Toplam Ödeme:".$getFiyat;
            echo "</br>";
            echo "Toplam Taksit Sayısı:".$getTaksitSayisi;
            echo "</br>";
            echo "İlk Ödeme:".$getilkOdeme;
            echo "</br>";
            echo "Sonraki Taksit Sayısı:".$taksitsayisi;
            echo "</br>";
            echo "Kalan Ödeme:".$kalanodeme;
            echo "</br>";
            echo "Taksit Dağılımı:".$fiyattaksit;
            echo "</br>";
            */
            if($getTaksitSayisi>2){
                $vade = 30*$taksitsayisi;
            }else{
                $vade = 30*($taksitsayisi-1);
            }
            //echo $vade;
            
            
            $bitis = strtotime("+".$vade." days",strtotime($getOdemeTarihi));
            $bitis = date('Y-m-d',$bitis);
            $durum = 1;
            $odenmedi = 0;
            /*
            echo "</br>";
            echo $getOdemeTarihi;
            echo "</br>";
            */
            $Qhatirlatma = $db->prepare("INSERT INTO tbl_hatirlatma SET
                FIRMA_ID = ?,
                SUBE_ID = ?,
                DURUM = ?,
                KONU = ?,
                ACIKLAMA = ?,
                ODEMETURU = ?,
                TUTAR = ?,
                TAKSIT = ?,
                STARTS = ?,
                ENDS = ?,
                USERID = ?
            ");
            $INShatirlatma = $Qhatirlatma->execute(array(
                $user_Firma,
                $user_Sube,
                $durum,
                $getKonu,
                $getAciklama,
                $getOdemeTuru,
                $getFiyat,
                $getTaksitTur,
                $getOdemeTarihi,
                $getOdemeTarihi,
                $kullaniciadi
            ));

                //echo "</br>";
                if ($INShatirlatma ) { $last_id = $db->lastInsertId(); }

                $QhatirlatmaFirstTaksit = $db->prepare("INSERT INTO tbl_hatirlatma_taksit SET
                    DURUM = ?,
                    EVENT_ID = ?,
                    TAKSIT_ID = ?,
                    TAKSIT_TARIHI = ?,
                    ODEMETURU = ?,
                    TAHSILAT_DURUM = ?,
                    FIYAT = ?,
                    USERID = ?
                ");
                $INShatirlatmaFirstTaksit = $QhatirlatmaFirstTaksit->execute(array(
                    $durum,
                    $last_id,
                    $durum,
                    $getOdemeTarihi,
                    $getOdemeTuru,
                    $durum,
                    $getilkOdeme,
                    $kullaniciadi
                ));

            $date = date ("Y-m-d H:i:s", strtotime($getOdemeTarihi));
            for($sayiT = 2; $sayiT <= $taksitsayisi; $sayiT++)
            {
            while (strtotime($date) < strtotime($bitis))
            {
                $date = date ("Y-m-d H:i:s", strtotime("+30 days", strtotime($date)));
                $QhatirlatmaTaksit = $db->prepare("INSERT INTO tbl_hatirlatma_taksit SET
                    DURUM = ?,
                    EVENT_ID = ?,
                    TAKSIT_ID = ?,
                    TAKSIT_TARIHI = ?,
                    ODEMETURU = ?,
                    TAHSILAT_DURUM = ?,
                    FIYAT = ?,
                    USERID = ?
                ");
                $INShatirlatmaTaksit = $QhatirlatmaTaksit->execute(array(
                    $durum,
                    $last_id,
                    $sayiT,
                    $date,
                    $getOdemeTuru,
                    $odenmedi,
                    $fiyattaksit,
                    $kullaniciadi
                ));
                $sayiT++;

            }
            }

            if ($INShatirlatmaFirstTaksit ) { echo 'basarili'; }

        }
    
    }

?>