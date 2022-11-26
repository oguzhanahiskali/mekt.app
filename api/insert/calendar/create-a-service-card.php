<?php
    include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

	$json = [];
	$jsonNextInstallments = [];
	$onGorulebilirSeans = 0;
    //print_r(json_encode($arrays));
    //$json = json_encode($arrays);

    //asort($arrays);
	//  $arrays = $_GET['hizmetBolgesi'];
	//  $columns = implode(", ",array_values($arrays));

    
	if(!empty($_GET['hizmetBolgesi'])){		
		$arrays = $_GET['hizmetBolgesi'];
		$appArea = implode(", ",array_values($arrays));
	}
	if($_GET['OngorulebilirSeans']){		
		$onGorulebilirSeans = $_GET['OngorulebilirSeans'];
	}
    // 2021-12-09 $get fiyat şart kaldırıldı 
    if(
      empty($_GET['odaSecimi']) ||
      empty($_GET['select2adisoyadi']) ||
      empty($_GET['select2estetisyen']) ||
      empty($_GET['select2hizmet']) ||
      empty($_GET['select2seans']) ||
      empty($_GET['select2sure']) ||
      empty($_GET['gunfarki']) ||
      empty($_GET['taksitsayisi']) ||
      empty($_GET['odemeturu']) || $_GET['odeme'] == "" || empty($_GET['start'])){
        echo "boş alanlar var!";
        exit();
      }

		$roomSel          = $_GET['odaSecimi'];
		$QroomToID = $db->query("SELECT * FROM tbl_firma_resources WHERE ROOM_ID= '$roomSel' AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
		$roomSelID = $roomSel;
		$patientID        = $_GET['select2adisoyadi'];
		$estheticianID    = $_GET['select2estetisyen'];
		$serviceID        = $_GET['select2hizmet'];
		$numbOfSession    = $_GET['select2seans'];
		$sessionDuration  = $_GET['select2sure'];
		$dayDiff          = $_GET['gunfarki'];
		$price            = $_GET['fiyat'];
		$maturityNumb     = $_GET['taksitsayisi'];
		$paymentType      = $_GET['odemeturu'];
		$paymentReceived  = $_GET['odeme'];
		$sessionStartTime = $_GET['start'];
		$kartid = null;
		$insertStatus = null;

		$query = $db->query("SELECT REGIONS FROM tbl_hizmet WHERE ID = '{$serviceID}' AND FIRMA_ID='{$user_Firma}'")->fetch(PDO::FETCH_ASSOC);
		if ( $query['REGIONS'] != null ){
			if(isset($_GET['hizmetBolgesi'])){
				$appAreaArr = $_GET['hizmetBolgesi'];
			}else{
				$jsonSessionCard=['code'=> 1014,'status'=>false, 'because'=> 'Service area cannot be missing'];
				echo json_encode($jsonSessionCard);
				exit();
			}
		}else{
			$appArea = null;
		}



    	$today = date('Y-m-d H:i:s');

		//MÜŞTERİ KİMLİK EKLEME
		$durum = 1;
		$querySessionCard = $db->prepare(
			"INSERT INTO tbl_seans_kart SET
			FIRMA_ID = ?,
			SUBE_ID = ?,
			DURUM = ?,
			MID = ?,
			EST_ID = ?,
			ESTETISYEN_ID = ?,
			HIZMET_ID = ?,
			ONGORULEBILIR_SEANS_ID = ?,
			SEANS_ID = ?,
			SURE_ID = ?,
			FIYAT = ?,
			CURRENCY = ?,
			BOLGE_ID = ?,
			ODEME = ?,
			TAHSILAT_TIPI = ?,
			UID = ?,
			DT = ?"
		);

		$insertSessionCard = $querySessionCard->execute(
			array(
				$user_Firma,
				$user_Sube,
				$durum,
				$patientID,
				$estheticianID,
				$estheticianID,
				$serviceID,
				$onGorulebilirSeans,
				$numbOfSession,
				$sessionDuration,
				$price,
				$currency,
				$appArea,
				$paymentReceived,
				$paymentType,
				$user_ID,
				$today
			)
		);

    if ( $insertSessionCard ){
        $last_id = $db->lastInsertId();
        $kartid = $last_id;
		$jsonSessionCard=['code'=> 1000,'status'=>true, 'SID'=>$kartid];
		$insertStatus = true;
    }else{
		$jsonSessionCard=['code'=> 1012,'status'=>false, 'SID'=>$kartid];
		$insertStatus = false;
    }
    //MÜŞTERİ DETAY EKLEME

    //seanslar

    // $seanssayisi = $numbOfSession;
    //    echo "Toplam Seans: ".$seanssayisi;
    // $seanscut = kelimeden_kes($seanssayisi,1);
    //  echo "<br>";

    //  echo "Seans İntiger: ".$seanscut;
    $kalanodeme = $price - $paymentReceived;
    //  echo "<br>";

    //  echo "Kalan Ödeme: ".$kalanodeme;

	if($kalanodeme!=0 && $maturityNumb>1){
		$pricetaksit = intval($kalanodeme) / intval($maturityNumb-1);
		$roundPriceTaksit = round($pricetaksit);
		$roundResultPriceTaksit = intval($roundPriceTaksit) * intval($maturityNumb-1);

	}else{
		$pricetaksit = 0;
		$roundPriceTaksit = 0;
		$roundResultPriceTaksit = 0;
	}
    //echo "<br>";
    //echo "Yuvarlanan taksit * Kalan Taksit :".$roundResultPriceTaksit; 
    //echo "<br>";
    $offf = $roundResultPriceTaksit-$kalanodeme;

    //echo "Fiyatta Taksit: ".$pricetaksit.' = '.$kalanodeme.' / '.$maturityNumb;
    // echo "<br>";


    // $date = date("Y-m-d");

    $fark = intval($dayDiff);
    $seans = intval($numbOfSession)-1;
    $hesapla = intval($fark) * intval($seans);

	$date = date('Y-m-d', strtotime($sessionStartTime));
    // $bitis = date('Y-m-d',strtotime("+".$hesapla." days"));
	$bitis = date('Y-m-d',strtotime($sessionStartTime."+".$hesapla." days"));

    $seansdurumSifir = 0;

    $durumbir = 1;
    for($sayi = 1; $sayi <= $numbOfSession; $sayi++)
    {
		while (strtotime($date) <= strtotime($bitis)){
			// echo $sayi."<br>";
			// echo $seanscut."<br>";
			$queryCreatingSessions = $db->prepare(
				"INSERT INTO tbl_seans_detay SET
				FIRMA_ID = ?,
				SUBE_ID = ?,
				DURUM = ?,
				MID = ?,
				EST_ID = ?,
				KART_ID = ?,
				SEANS_ID = ?,
				RESOURCE_ID = ?,
				SEANS_TARIH = ?,
				SEANS_SAAT = ?,
				SEANS_SURE = ?,
				SEANS_DURUM = ?,
				UID = ?"
			);
			$insertCreatingSessions = $queryCreatingSessions->execute(
				array(
					$user_Firma,
					$user_Sube,
					$durumbir,
					$patientID,
					$estheticianID,
					$kartid,
					$sayi,
					$roomSelID,
					$date,
					$sessionStartTime,
					$sessionDuration,
					$seansdurumSifir,
					$user_ID
				)
			);

			$date = date ("Y-m-d", strtotime("+".$fark." days", strtotime($date)));
			$sayi++;

			if ($insertCreatingSessions ){
				$last_id = $db->lastInsertId();
				$jsonCreatingSessions[]=['code'=> 1000,'status'=>true, 'SessionsID'=>$last_id];
				$insertStatus = true;
			}else{
				$last_id = $db->lastInsertId();
				$jsonCreatingSessions[]=['code'=> 1012,'status'=>false, 'SessionsID'=>$last_id];
				$insertStatus = false;
			}
		}
    }
    $taksitID = 1;
    $tahsilatDurum = 1;
    $taksitidbir = 1;
    $tahsilatdurumiki = 2;
    $date = date("Y-m-d");

    //ilk taksit ekle //
    $queryFirstInstallment = $db->prepare("INSERT INTO tbl_seans_taksit SET
                        FIRMA_ID = ?,
                        SUBE_ID = ?,
                        DURUM = ?,
                        MID = ?,
                        KART_ID = ?,
                        TAKSIT_ID = ?,
                        TAKSIT_TARIHI = ?,
                        TAHSILAT_DURUM = ?,
                        TAHSILAT_TIPI = ?,
                        FIYAT = ?,
                        CURRENCY = ?,
                        UID = ?
    ");

	if($maturityNumb==1){
		$insertFirstInstallment = $queryFirstInstallment->execute(array(
			$user_Firma,
			$user_Sube,
			$tahsilatDurum,
			$patientID,
			$kartid,
			$taksitidbir,
			$date,
			$tahsilatdurumiki,
			$paymentType,
			$price,
			$currency,
			$user_ID
	  ));
	}else if($maturityNumb>1){
		$insertFirstInstallment = $queryFirstInstallment->execute(array(
				$user_Firma,
				$user_Sube,
				$tahsilatDurum,
				$patientID,
				$kartid,
				$taksitidbir,
				$date,
				$tahsilatdurumiki,
				$paymentType,
				$paymentReceived,
				$currency,
				$user_ID
		));
	}

    if ($insertFirstInstallment ){
		$last_id = $db->lastInsertId();
		$jsonFirstInstallment=['code'=> 1000,'status'=>true, 'FirstInstallmentID'=>$last_id];
		$insertStatus = true;
	}else{
		$last_id = $db->lastInsertId();
		$jsonFirstInstallment=['code'=> 1012,'status'=>false, 'FirstInstallmentID'=>$last_id];
		$insertStatus = false;
	}
    //ilk taksit ekle end
    
    $durumsifir = 0;

    $vade = 30*($maturityNumb-2);
    $bitis = date('Y-m-d',strtotime("+".$vade." days"));
    $totalTaksit = $maturityNumb+1;
    for($sayiT = 2; $sayiT < $totalTaksit; $sayiT++){
		while (strtotime($date) <= strtotime($bitis)){
			$date = date ("Y-m-d", strtotime("+30 days", strtotime($date)));
			$queryForNextInstallments = $db->prepare("INSERT INTO tbl_seans_taksit SET
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
			if($sayiT==$maturityNumb){
				$insertNextInstallments = $queryForNextInstallments->execute(array(
					$user_Firma,
					$user_Sube,
					$tahsilatDurum,
					$kartid,
					$sayiT,
					$patientID,
					$date,
					$durumsifir,
					$paymentType,
					$roundPriceTaksit-$offf,
					$currency,
					$user_ID
					));
			}else{
				$insertNextInstallments = $queryForNextInstallments->execute(array(
					$user_Firma,
					$user_Sube,
					$tahsilatDurum,
					$kartid,
					$sayiT,
					$patientID,
					$date,
					$durumsifir,
					$paymentType,
					$roundPriceTaksit,
					$currency,
					$user_ID
				));
			}
			if ($insertNextInstallments ){
				$jsonNextInstallments[]=['code'=> 1000,'status'=>true, 'installmentID'=>$sayiT];
				$insertStatus = true;
			}else{
				$jsonNextInstallments[]=['code'=> 1012, 'status'=>false, 'installmentID'=>$sayiT, 'because' => 'An error occurred while adding subsequent installments. Please contact the system administrator.'];
				$insertStatus = false;
			}
			$sayiT++;

		}
  	}

	  if($jsonNextInstallments!=null){
		  $json =	[
			  'SessionCard'		=>	$jsonSessionCard,
			  'SessionsDetails'	=>	$jsonCreatingSessions,
			  'Installments'		=> [
									  'First'=>	$jsonFirstInstallment,
									  'Next'=>$jsonNextInstallments
			  ],
			  'status'			=> $insertStatus
		  ];
	  }else{
		$json =	[
			'SessionCard'		=>	$jsonSessionCard,
			'SessionsDetails'	=>	$jsonCreatingSessions,
			'Installments'		=> [
									'First'=>	$jsonFirstInstallment
			],
			'status'			=> $insertStatus
		];
	  }
	echo json_encode($json);
?>