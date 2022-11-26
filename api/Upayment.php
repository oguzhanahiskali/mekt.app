<?php

$documentBase = $_SERVER['DOCUMENT_ROOT'];

include $documentBase.'/header-top.php';
    
    // echo "<pre>";
    // print_r($_GET);

    //Array's
        $ArrResults = [];
        $AllPaymentIDs = [];
        $ExludePaymentIDs = [];
        
    //Get's
        //$Gtahsilattarih = date("Y-m-d");
        $Gtahsilattarih = $_GET['inp-tahsilat-tarih'];
        $Gtahsilatfiyat   = $_GET['inp-tahsilat-fiyat'];
        $GgerekliTaksitMiktari   = $_GET['inp-gtm'];
        $Gtahsilattipi    = $_GET['inp-tahsilat-form-tipi'];
        $Gtahsilatdurum   = $_GET['inp-tahsilat-form-durum'];
        $Gids             = $_GET['taksitid'];
        $GkartID          = $_GET['kartid'];
        $GmID             = $_GET['mid'];


    //Array's Push for database results
        $query = $db->query("select * from view_tahsilat_Upd_test WHERE KART_ID = '$GkartID'", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
            foreach( $query as $row ){
                $QToplamHizmetBedeli =          $row['HIZMET_BEDELI'];
                $QToplamHizmetBedelitblTaksit = $row['tblTaksitToplam'];
                $QTahsilatDurumu =              $row['TAHSILAT_DURUM'];
                $QToplamOdenen =                $row['ODENEN'];
                $QToplamOdenmeyen =             $row['ODENMEYEN'];
                $QLastInsertID =                $row['LAST_ID'];
                $QLastTaksitID =                $row['LAST_TAKSIT_ID'];
                if($row['TAHSILAT_DURUM'] != 4) $ArrAllPaymentIDs[] = [
                                                                    'TAKSIT_ID'=>   $row['TAKSIT_ID'],
                                                                    'ID'=>          $row['ID'],
                                                                    'FIYAT'=>       $row['FIYAT'],
                                                                    'TAHSILAT_DURUM'=>$row['TAHSILAT_DURUM'],
                                                                    'TARIH'=>       $row['TAKSIT_TARIHI']
                                                ];

                if($row['TAHSILAT_DURUM'] != 2) $ArrExludePaymentIDs[] = [
                                                                    'TAKSIT_ID'=>   $row['TAKSIT_ID'],
                                                                    'ID'=>          $row['ID'],
                                                                    'FIYAT'=>       $row['FIYAT'],
                                                                    'TAHSILAT_DURUM'=>$row['TAHSILAT_DURUM'],
                                                                    'TARIH'=>       $row['TAKSIT_TARIHI']
                                                ];
            }
        }
    //Foreach's
        foreach($ArrAllPaymentIDs as $ArrAsAllPayments){
            if($ArrAsAllPayments['ID']==$Gids){
                $ArrAllPaymentsThisPrice = $ArrAsAllPayments['FIYAT'];
                $ArrAllPaymentsThisStatus = $ArrAsAllPayments['TAHSILAT_DURUM'];
            }
        }
    
    //Prints
        // echo "Tüm Ödemeler";
        // print_r($ArrAllPaymentIDs);
        // echo "Tüm Ödenmeyenler";
        // print_r($ArrExludePaymentIDs);
        
        // echo "Toplam Hizmet Bedeli: ".$QToplamHizmetBedeli;
        // echo "<br>";
        // echo "Taksitlendirme Toplam Hizmet Bedeli: ".$QToplamHizmetBedelitblTaksit;
        // echo "<br>";
        // echo "Toplam Ödenen: ".$QToplamOdenen;
        // echo "<br>";
        // echo "Toplam Ödenmeyen: ".$QToplamOdenmeyen;
        // echo "<br>";
        // echo "Son Eklenen ID: ".$QLastInsertID;
        // echo "<br>";
        // echo "Son Taksit ID: ".$QLastTaksitID;
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";

    
    
    if($QToplamHizmetBedeli==$Gtahsilatfiyat && $Gtahsilatdurum==1){//Ödenen miktar toplam borç'a eşit mi? (TEK TAKSİT İSE)
        $qq = "UPDATE
                tbl_seans_taksit SET
                TAKSIT_TARIHI= '$Gtahsilattarih',
                TAHSILAT_DURUM= 2,
                TAHSILAT_TIPI = $Gtahsilattipi,
                FIYAT = $Gtahsilatfiyat,
                UID = $user_ID
                WHERE ID      = $Gids
                AND KART_ID   = $GkartID
                AND FIRMA_ID  = $user_Firma";
        $query= $db->prepare($qq);
        $update = $query->execute();
        if($update){
            $ArrResults[] = [
                'debitStatus'=>'All debts were paid'
            ];
        }else{
            $ArrResults[] = [
                'debitStatus'=>'Error occurred while paying all debts'
            ];
            
        } 
    }else if($Gtahsilatdurum==1){ // tahsilat iptal
        $query = $db->prepare("UPDATE tbl_seans_taksit SET
                                TAHSILAT_DURUM= ?,
                                TAHSILAT_TIPI = ?,
                                UID = $user_ID
                                WHERE ID      = $Gids
                                AND KART_ID   = $GkartID
                                AND FIRMA_ID  = $user_Firma");
        $update = $query->execute(array(1,1));
        if($update){
            $ArrResults[] = [
                'code'=>100031,
                'debitType'=>'installment canceled successfully'
            ];
        }else{
            $ArrResults[] = [
                'code'=>100139,
                'debitType'=>'installment cancellation failed'
            ];
        }
    }else if($Gtahsilatdurum==0){ // tahilsat ödenmedi
        $ArrResults[] = [
            'debitType'=>'debt not paid'
        ];
        $query = $db->prepare("UPDATE tbl_seans_taksit SET
                                TAHSILAT_DURUM= ?,
                                TAHSILAT_TIPI = ?,
                                UID = $user_ID
                                WHERE ID      = $Gids
                                AND KART_ID   = $GkartID
                                AND FIRMA_ID  = $user_Firma");
        $update = $query->execute(array(0,1));
        
        if($update){
            $ArrResults[] = [
                'code'=> 100027,
                'debitStatus'=>'payment transaction updated to not paid successfully'
            ];
        }else{
            $ArrResults[] = [
                'code'=> 100135,
                'debitStatus'=>'update process failed as payment transaction not paid'
            ];
        }
    }else if($ArrAllPaymentsThisStatus!=$Gtahsilatdurum){//Tüm borç kapatılmayacak (Multiple Installments)

        $InsSonTaksitDT = end($ArrAllPaymentIDs)['TARIH'];
        $InsOdenmeyenSonTaksitTID = end($ArrAllPaymentIDs)['TAKSIT_ID'];

    
        if($Gtahsilatdurum==2){ // Bir Ödeme Geldi
            if($Gtahsilatfiyat>$ArrAllPaymentsThisPrice){ // Fazla Ödeme Yapıldı ->
                
                if($Gtahsilatfiyat==$QToplamOdenmeyen){ // Fazla yapılan ödeme, kalan tüm borç a eşit ise ->
                    
                    $ArrResults[] = [
                        'debitType'=>'overpay'
                    ];
                    //Update This Installment
                        $query= $db->prepare("UPDATE
                                                tbl_seans_taksit SET
                                                TAHSILAT_DURUM= 2,
                                                TAHSILAT_TIPI = $Gtahsilattipi,
                                                FIYAT = $Gtahsilatfiyat,
                                                UID = $user_ID
                                                WHERE ID  = $Gids AND
                                                KART_ID   = $GkartID AND
                                                FIRMA_ID  = $user_Firma
                                                ");
                        $update   = $query->execute();
                        if($update){
                            $ArrResults[] = [
                                'code'=> 100028,
                                'debitStatus'=>'all debt has been successfully settled'
                            ];
                        }else{
                            $ArrResults[] = [
                                'code'=> 100136,
                                'debitStatus'=>'all debt settlement failed'
                            ];
                        }
    
                    //other Installment delete
                        $key = array_search($Gids, $ArrExludePaymentIDs);
                        unset($ArrExludePaymentIDs[$key]);
                        foreach ($ArrExludePaymentIDs as $ArrExPay) {
                            $odenmeyenID = $ArrExPay['ID'];
                                $qq = "DELETE FROM tbl_seans_taksit
                                WHERE ID      = $odenmeyenID
                                AND KART_ID   = $GkartID
                                AND FIRMA_ID  = $user_Firma";
                            $query= $db->prepare($qq);
                            $update = $query->execute();
                            if($update){
                                $ArrResults[] = [
                                    'process'=>'Remaining installments deletion successful'
                                ];
                            }else{
                                $ArrResults[] = [
                                    'process'=>'deletion of remaining installments failed'
                                ];}
                            }
                }else{ // Fazla yapılan ödeme tüm borç'a eşit değil ise ->
                    $ArrResults[] = [
                        'debitType'=>'overpayment'
                    ];
                    //Update This Installment
                        $qq = "UPDATE
                                tbl_seans_taksit SET
                                TAHSILAT_DURUM= 2,
                                TAKSIT_TARIHI = '$Gtahsilattarih',
                                TAHSILAT_TIPI = $Gtahsilattipi,
                                FIYAT = $Gtahsilatfiyat,
                                UID = $user_ID
                                WHERE ID  = $Gids AND
                                KART_ID   = $GkartID AND
                                FIRMA_ID  = $user_Firma";
                                $query    = $db->prepare($qq);
                        $update   = $query->execute();
                        if($update){
                            $ArrResults[] = [
                                'code'=>100029,
                                'debitStatus'=>'Overpayment successful'
                            ];
                        }else{
                            $ArrResults[] = [
                                'code'=>100137,
                                'debitStatus'=>'Overpayment failed'
                            ];
                        }

                    // Reschedule remaining installments
                        //Ödenen taksiti Array'den çıkar ->
                            $key = array_search($Gids, $ArrExludePaymentIDs);
                            unset($ArrExludePaymentIDs[$key]);

                        //Kalan taksit sayısı ->
                            $kalanTaksit = count($ArrExludePaymentIDs);

                            //Toplam borç'tan ödenen tutar çıkarılıp kalan taksit sayısına böl ->
                            $kalans = $QToplamOdenmeyen-$Gtahsilatfiyat;
                            $kalanz = $QToplamHizmetBedeli-$Gtahsilatfiyat;
                            if($kalanTaksit==0 && $kalanz>0){
                                $newLastTaksitDT = date('Y-m-d', strtotime($Gtahsilattarih. ' +30 days'));
                                $newNextTID = $InsOdenmeyenSonTaksitTID + 1;
                                $qq = "INSERT INTO tbl_seans_taksit SET
                                        FIRMA_ID = $user_Firma,
                                        SUBE_ID = $user_Sube,
                                        DURUM = '1',
                                        MID = $GmID,
                                        KART_ID = $GkartID,
                                        TAKSIT_ID = $newNextTID,
                                        TAKSIT_TARIHI = '$newLastTaksitDT',
                                        TAHSILAT_DURUM = '0',
                                        TAHSILAT_TIPI = $Gtahsilattipi,
                                        FIYAT = $kalanz,
                                        UID = $user_ID";
                                $query = $db->prepare($qq);
                                $insert = $query->execute();
                                
                                if ($insert ){
                                    $ArrResults[] = [
                                        'code'=>1000220,
                                        'debitStatus'=>'Added new installment due to remaining payment'
                                    ];
                                }else{
                                    $ArrResults[] = [
                                        'code'=>100131,
                                        'debitStatus'=>'Could not add new installment'
                                    ];
                                }
                            }else{
                                $InsLoopTaksitFiyat = number_format(($QToplamOdenmeyen - $Gtahsilatfiyat) / $kalanTaksit);
                                $taksittenKalans = $InsLoopTaksitFiyat*$kalanTaksit;
                                $offf = $kalans-$taksittenKalans;
                                
                                //Kalan takistleri döngü içerisinde tekrar fiyatlandır
                                $numItems = count($ArrExludePaymentIDs);
                                $i = 0;
                                foreach ($ArrExludePaymentIDs as $ArrExPay) {
                                    if(++$i === $numItems) {
                                        $odenmeyenID = $ArrExPay['ID'];
                                        $qq = "UPDATE
                                                tbl_seans_taksit SET
                                                TAHSILAT_DURUM= 0,
                                                TAHSILAT_TIPI = $Gtahsilattipi,
                                                FIYAT         = $InsLoopTaksitFiyat+$offf,
                                                UID = $user_ID
                                                WHERE ID      = $odenmeyenID
                                                AND KART_ID   = $GkartID
                                                AND FIRMA_ID  = $user_Firma";
                                        $query= $db->prepare($qq);
                                        $update = $query->execute();
                                        if($update){
                                            $ArrResults[] = [
                                                'code'=>1000300,
                                                'debitStatus'=>'Remaining installments restructured successfully'
                                            ];
                                        }else{
                                            $ArrResults[] = [
                                                'code'=>100138,
                                                'debitStatus'=>'Restructuring the remaining installments failed'
                                            ];
                                        }
                                    }else{
                                        $odenmeyenID = $ArrExPay['ID'];
                                        $qq = "UPDATE
                                                tbl_seans_taksit SET
                                                TAHSILAT_DURUM= 0,
                                                TAHSILAT_TIPI = $Gtahsilattipi,
                                                FIYAT         = $InsLoopTaksitFiyat,
                                                UID = $user_ID
                                                WHERE ID      = $odenmeyenID
                                                AND KART_ID   = $GkartID
                                                AND FIRMA_ID  = $user_Firma";
                                        $query= $db->prepare($qq);
                                        $update = $query->execute();
                                        if($update){
                                            $ArrResults[] = [
                                                'code'=>1000301,
                                                'debitStatus'=>'Remaining installments restructured successfully'
                                            ];
                                        }else{
                                            $ArrResults[] = [
                                                'code'=>100138,
                                                'debitStatus'=>'Restructuring the remaining installments failed'
                                            ];
                                        }
                                    }
                                }
                            }
                }
            }else if($Gtahsilatfiyat<$ArrAllPaymentsThisPrice){ // Az Ödeme Yapıldı.
                $ArrResults[] = [
                    'debitType'=>'undepay'
                ];
                $key = array_search($Gids, $ArrExludePaymentIDs);
                unset($ArrExludePaymentIDs[$key]);

                $ThisPriceKalan = $QToplamOdenmeyen-$Gtahsilatfiyat;

                $qq = "UPDATE
                    tbl_seans_taksit SET
                    TAHSILAT_DURUM= 2,
                    TAHSILAT_TIPI = $Gtahsilattipi,
                    FIYAT = $Gtahsilatfiyat,
                    UID = $user_ID
                    WHERE ID  = $Gids AND
                    KART_ID   = $GkartID AND
                    FIRMA_ID  = $user_Firma";
                $query    = $db->prepare($qq);
                $update   = $query->execute();
                if($update){
                    $ArrResults[] = [
                        'code'=> 100026,
                        'debitStatus'=>'Successfully paid less than required payment'
                    ];
                }else{
                    $ArrResults[] = [
                        'code'=> 100134,
                        'debitStatus'=>'failed to make less than required payment'
                    ];
                }

                //Kalan taksit sayısı ->
                    $kalanTaksit = count($ArrExludePaymentIDs);
                    if($kalanTaksit!=0){
                        $InsOdenmeyenSonTaksitID = end($ArrExludePaymentIDs)['ID'];

                        //Kalan taksit sayısı ->
                        $kalanTaksit = count($ArrExludePaymentIDs);

                        //Toplam borç'tan ödenen tutar çıkarılıp kalan taksit sayısına böl ->
                        
                        $InsLoopTaksitFiyat = number_format(($QToplamOdenmeyen - $Gtahsilatfiyat) / $kalanTaksit);
                        $taksittenKalans = $InsLoopTaksitFiyat*$kalanTaksit;
                        $offf = $ThisPriceKalan-$taksittenKalans;

                        //Kalan takistleri döngü içerisinde tekrar fiyatlandır
                        $i = 0;
                        foreach ($ArrExludePaymentIDs as $ArrExPay) {
                            if(++$i === $kalanTaksit) {
                                $odenmeyenID = $ArrExPay['ID'];
                                $qq = "UPDATE
                                        tbl_seans_taksit SET
                                        TAHSILAT_DURUM= 0,
                                        TAHSILAT_TIPI = $Gtahsilattipi,
                                        FIYAT         = $InsLoopTaksitFiyat+$offf,
                                        UID = $user_ID
                                        WHERE ID      = $odenmeyenID
                                        AND KART_ID   = $GkartID
                                        AND FIRMA_ID  = $user_Firma";
                                $query= $db->prepare($qq);
                                $update = $query->execute();
                                if($update){
                                    $ArrResults[] = [
                                        'code'=>1000221,
                                        'debitStatus'=>'Remaining installments restructured successfully'
                                    ];
                                }else{
                                    $ArrResults[] = [
                                        'code'=>100132,
                                        'debitStatus'=>'Restructuring the remaining installments failed'
                                    ];
                                }
                            }else{
                                $odenmeyenID = $ArrExPay['ID'];
                                $qq = "UPDATE
                                        tbl_seans_taksit SET
                                        TAHSILAT_DURUM= 0,
                                        TAHSILAT_TIPI = $Gtahsilattipi,
                                        FIYAT         = $InsLoopTaksitFiyat,
                                        UID = $user_ID
                                        WHERE ID      = $odenmeyenID
                                        AND KART_ID   = $GkartID
                                        AND FIRMA_ID  = $user_Firma";
                                $query= $db->prepare($qq);
                                $update = $query->execute();
                                if($update){
                                    $ArrResults[] = [
                                        'code'=>1000221,
                                        'debitStatus'=>'Remaining installments restructured successfully'
                                    ];
                                }else{
                                    $ArrResults[] = [
                                        'code'=>100132,
                                        'debitStatus'=>'Restructuring the remaining installments failed'
                                    ];
                                }
                            }
                        }
                    }else if($kalanTaksit==0){ // "kalan taksit yok";
                        $newLastTaksitDT = date('Y-m-d', strtotime($InsSonTaksitDT. ' +30 days'));
                        $newNextTID = $InsOdenmeyenSonTaksitTID + 1;
                        $qq = "INSERT INTO tbl_seans_taksit SET
                                FIRMA_ID = $user_Firma,
                                SUBE_ID = $user_Sube,
                                DURUM = '1',
                                MID = $GmID,
                                KART_ID = $GkartID,
                                TAKSIT_ID = $newNextTID,
                                TAKSIT_TARIHI = '$newLastTaksitDT',
                                TAHSILAT_DURUM = '0',
                                TAHSILAT_TIPI = $Gtahsilattipi,
                                FIYAT = $ThisPriceKalan,
                                UID = $user_ID";
                        $query = $db->prepare($qq);
                        $insert = $query->execute();
                        
                        if ($insert ){
                            $ArrResults[] = [
                                'code'=>1000222,
                                'debitStatus'=>'Added new installment due to remaining payment'
                            ];
                        }else{
                            $ArrResults[] = [
                                'code'=>100131,
                                'debitStatus'=>'Could not add new installment'
                            ];
                        }
                    }
            }else{ // Gerekli ödeme yapıldı.
                $qq = "UPDATE
                tbl_seans_taksit SET
                TAKSIT_TARIHI= '$Gtahsilattarih',
                TAHSILAT_DURUM= 2,
                TAHSILAT_TIPI = $Gtahsilattipi,
                UID = $user_ID
                WHERE ID      = $Gids
                AND KART_ID   = $GkartID
                AND FIRMA_ID  = $user_Firma";
                $query= $db->prepare($qq);
                $update = $query->execute();
                
                if($update){ 
                    $ArrResults[] = [
                        'code'=>100020,
                        'debitStatus'=>'required payment made'
                    ];
                    }else{ 
                    $ArrResults[] = [
                        'code'=>100130,
                        'debitStatus'=>'required payment failed'
                    ];
                }
            }
            
        }
    }else{
        $ArrResults[] = [
            'code'=> 1033,
            'debitStatus'=>'already done'
        ];
    }
    echo json_encode($ArrResults);
?>
