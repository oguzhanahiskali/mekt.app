<?php
include '../header.php';
include '../header-top.php';

	$numbers 	= $_POST['numbers'];
	$msg 	 	= $_POST['msg'];

	//print_r($numbers);

	if(isset($numbers) and !empty($numbers) and isset($msg) and !empty($msg)){
		foreach ($numbers as $number) {
			/* SMS HAKKI VARMI? START */
			$query = $db->query("SELECT * FROM view_firma_id WHERE FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
			$FirmaAdi = $query['FIRMA_ADI'];

			$query = $db->query("SELECT TOPLAM FROM tbl_sms_firma WHERE FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
			$SMStoplam = $query['TOPLAM'];

			$query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum LIKE '%İletil%' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
			$SMSkullanilan = $query['SAYAC'];

			$query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum NOT LIKE '%İletil%' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
			$SMShatali = $query['SAYAC'];

			$SMSkalan = $SMStoplam-$SMSkullanilan;

			$query = $db->query("SELECT FIRMA_ID, SMS_UN, SMS_PW, HEADER FROM tbl_sms_firma WHERE FIRMA_ID = '$user_Firma'", PDO::FETCH_ASSOC);
			if ( $query->rowCount()>0 ){
			     foreach( $query as $row ){
		  			$smsUN 		= $row['SMS_UN'];
					$smsPW 		= $row['SMS_PW'];
					$smsHeader	= $row['HEADER'];
			     }
			}
			/* SMS HAKKI VARMI? END */
			// Telefon Doğrulama Array -> functions.php include array ($numbersArr)
			
			//Eğer telefon numarasının ilk üç hanesi Türkcell, Vofafone, Avea içeriyorsa Verify OK! değilse Non!
			if (in_array(substr($number, 0, 3), $numbersArr)){ $verify = 1; }else{ $verify = 0; }
			//Eğer telefon doğru ise SMS Gönder
			if($verify==1){
				if($SMSkalan>0){
						$gsmNr='90'.$number;
						OneToOneMessage($gsmNr,$msg,$user_Firma,$smsUN,$smsPW,$smsHeader);
				}else{
						echo "SMS kredisi bulunmamaktadır.";
				}
			}else{
				echo $number.' hatalı';
			}
		}
	}else{
		echo "null";
	}

	
?>