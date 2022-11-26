<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';


$cid                = $_POST['cid'];
$mid                = $_POST['mid'];
$price              = number_format($_POST['serialize']['fiyat'], 2, ',', '.');
$priceRaw           = $_POST['serialize']['fiyat'];
$serviceCurrency    = $_POST['serialize']['inp-hizmet-currency'];
$InstallmentDate    = $_POST['serialize']['taksitDT'];
$numbOfInstallment  = $_POST['serialize']['taksitsayisi'];
$paymentType        = $_POST['serialize']['odemeturu'];
$paymentReceived    = number_format($_POST['serialize']['odeme'], 2, ',', '.');
$paymentReceivedRaw = $_POST['serialize']['odeme'];
$paymentReceivedCurrencyRaw = $_POST['serialize']['inp-odeme-currency'];
$kalanTaksitlenecekOdeme = $_POST['serialize']['fiyat'] - $_POST['serialize']['odeme'];
$taksitID = 1;
$tahsilatDurum = 1;
$taksitidbir = 1;
$tahsilatdurumiki = 2;
$date = date("Y-m-d", strtotime($InstallmentDate));
$jsonResults = [];
$continue = true;

if(empty($_POST)){
    echo "boş alanlar var!";
    exit();
}else{
  if($kalanTaksitlenecekOdeme>0 AND $numbOfInstallment==1){
    $jsonResults[] = [ 'Result' => false, 'code'=>100140];
  }else{
    $q = "SELECT * FROM tbl_seans_kart WHERE ID = '$cid' AND FIRMA_ID=$user_Firma";
    $query = $db->query($q, PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
        foreach( $query as $row ){ $oldPrice = $row['FIYAT']; }
    }
    $qq = "SELECT * FROM tbl_seans_taksit WHERE KART_ID='$cid' AND FIRMA_ID=$user_Firma";
    $qquery = $db->query($qq, PDO::FETCH_ASSOC);
    if ( $qquery->rowCount() ){
      $jsonResults[] = [ 'Result' => 'Duplicate insert blocked!'];
      $continue = false;
    }
  
    if($continue != false){
      if($oldPrice!=$priceRaw){
        $QUseansKartFiyat = $db->prepare("UPDATE tbl_seans_kart SET FIYAT = $priceRaw, CURRENCY = '$serviceCurrency', UID = $user_ID WHERE ID = $cid");
        $update = $QUseansKartFiyat->execute();
        if(!$update){ $jsonResults[] = [ 'Result'=> 'Hizmet fiyatı güncelleme başarısız!' ]; exit(); }
      }
        //ilk taksit ekle //
        $query = $db->prepare("INSERT INTO tbl_seans_taksit SET
                              FIRMA_ID = $user_Firma,
                              SUBE_ID = $user_Sube,
                              DURUM = $tahsilatDurum,
                              MID = $mid,
                              KART_ID = $cid,
                              TAKSIT_ID = $taksitidbir,
                              TAKSIT_TARIHI = '$date',
                              TAHSILAT_DURUM = $tahsilatdurumiki,
                              TAHSILAT_TIPI = $paymentType,
                              FIYAT = $paymentReceivedRaw,
                              CURRENCY = '$paymentReceivedCurrencyRaw',
                              UID = $user_ID");
        $insert = $query->execute();
      if ($insert ){ $jsonResults[] = [ 'Result'=> 'Successfull' ]; }
      if($kalanTaksitlenecekOdeme!=0){
        $kalanTaksitlenenTutar = $kalanTaksitlenecekOdeme / intval($numbOfInstallment-1);
        $roundPriceTaksit = round($kalanTaksitlenenTutar);
        $roundResultPriceTaksit = number_format($kalanTaksitlenenTutar) * intval($numbOfInstallment-1);
        $offf = $roundResultPriceTaksit-$kalanTaksitlenecekOdeme;
        
        //Sonraki taksitleri ekle
        $durumsifir = 0;
    
        $vade = 30*($numbOfInstallment-2);
        $bitis = date('Y-m-d',strtotime("+".$vade." days"));
        $totalTaksit = $numbOfInstallment;
        for($sayiT = 2; $sayiT < $totalTaksit; $sayiT++)
        {
          while(strtotime($date) <= strtotime($bitis))
          {
              $date = date ("Y-m-d", strtotime("+30 days", strtotime($date)));
              $query1 = $db->prepare("INSERT INTO tbl_seans_taksit SET
                                      FIRMA_ID = ?,
                                      SUBE_ID = ?,
                                      DURUM = ?,
                                      KART_ID = ?,
                                      TAKSIT_ID = ?,
                                      MID = ?,
                                      TAKSIT_TARIHI = ?,
                                      TAHSILAT_DURUM = ?,
                                      TAHSILAT_TIPI = ?,
                                      FIYAT = ?,
                                      CURRENCY = ?,
                                      UID = ?
                                    ");
              if($sayiT==$numbOfInstallment){
                  $insert1 = $query1->execute(array(
                      $user_Firma,
                      $user_Sube,
                      $tahsilatDurum,
                      $cid,
                      $sayiT,
                      $mid,
                      $date,
                      $durumsifir,
                      $paymentType,
                      $roundPriceTaksit-$offf,
                      $paymentReceivedCurrencyRaw,
                      $user_ID
                    ));
              }else{
                $insert1 = $query1->execute(array(
                      $user_Firma,
                      $user_Sube,
                      $tahsilatDurum,
                      $cid,
                      $sayiT,
                      $mid,
                      $date,
                      $durumsifir,
                      $paymentType,
                      $roundPriceTaksit,
                      $paymentReceivedCurrencyRaw,
                      $user_ID
                    ));
              }
            $sayiT++;
          }
          //if ($insert1 ){ $last_id = $db->lastInsertId();}else{ echo "basarisiz"; }
        }
      }
    }

  }
}

echo json_encode($jsonResults);

?>