<?php
include '../header-top.php';



 if (
     !empty($_GET['inp-add-hizmet-adi']) ||
     !empty($_GET['inp-add-hizmet-suresi']) ||
     !empty($_GET['inp-add-seans-sayisi']) ||
     !empty($_GET['inp-add-fiyat']) ||
     !empty($_GET['inp-add-currency'])
    ) {

        $durum = 1;
        $bugun          = date('Y-m-d H:i:s');
        $hizmetadi      = $_GET['inp-add-hizmet-adi'];
        $hizmetsuresi   = $_GET['inp-add-hizmet-suresi'];
        $seanssayisi    = $_GET['inp-add-seans-sayisi'];
        $fiyat          = $_GET['inp-add-fiyat'];
        $currency       = $_GET['inp-add-currency'];
        $regionSelecteds = null;
        if(!empty($_GET['AddhizmetBolgesi'])){
            $hizmetBolgesi = $_GET['AddhizmetBolgesi'];
            $regionSelecteds = implode(", ",$hizmetBolgesi);
        }

        $query = $db->query("SELECT * FROM tbl_hizmet_sure where ID = '{$hizmetsuresi}'")->fetch(PDO::FETCH_ASSOC);
        $hizmetsuresi = $query['ADI'];

        $query = $db->query("SELECT * FROM tbl_hizmet_seans where ID = '{$seanssayisi}'")->fetch(PDO::FETCH_ASSOC);
        $seanssayisi = $query['ADI'];

        if($regionSelecteds==null){
            $query = $db->prepare(
                "INSERT INTO tbl_hizmet SET
                FIRMA_ID = ?,
                SUBE_ID = ?,
                DURUM = ?,
                HIZMET_ADI = ?,
                HIZMET_SURE = ?,
                HIZMET_SEANS = ?,
                HIZMET_FIYAT = ?,
                CURRENCY = ?,
                UID	= ?,
                DT = ?");
    
            $update = $query->execute(array(
                $user_Firma,
                $user_Sube,
                $durum,
                $hizmetadi,
                $hizmetsuresi,
                $seanssayisi,
                $fiyat,
                $currency,
                $user_ID,
                $bugun
            ));
        }else{
            $query = $db->prepare(
                "INSERT INTO tbl_hizmet SET
                FIRMA_ID = ?,
                SUBE_ID = ?,
                DURUM = ?,
                HIZMET_ADI = ?,
                HIZMET_SURE = ?,
                HIZMET_SEANS = ?,
                HIZMET_FIYAT = ?,
                CURRENCY = ?,
                REGIONS = ?,
                UID	= ?,
                DT = ?");
    
            $update = $query->execute(array(
                $user_Firma,
                $user_Sube,
                $durum,
                $hizmetadi,
                $hizmetsuresi,
                $seanssayisi,
                $fiyat,
                $currency,
                $regionSelecteds,
                $user_ID,
                $bugun
            ));
        }

        if ( $update ){ print "basarili"; }

    }else{
      echo "Boş alanlar var.";
    }
  ?>