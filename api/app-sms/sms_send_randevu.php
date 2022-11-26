<title>SMS Processing</title>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/conf.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions.php';

	$suan 		= date('Y-m-d H:i:s');
	$baslangic	= strtotime($suan);

	$query = $db->query("SELECT *,  DATE_FORMAT(START,'%H:%i') AS STARTS FROM view_upcoming_tomorrow WHERE SEANS_DURUM=0 AND MesajCount = 0 AND START NOT LIKE '%00:00:00%' AND FIRMA_DURUM = 1 ORDER BY 'START' ASC", PDO::FETCH_ASSOC);
	if ( $query->rowCount() )
	{
		foreach( $query as $row )
		{
			$smsFirmaID 	= $row['FIRMA_ID'];
			$smsFirmaADI 	= $row['FIRMA_ADI'];
			$firmaTelefon 	= $row['FIRMA_TELEFON'];
			$smsTel 		= $row['CEP'];
			$smsAdSoyad 	= $row['ADI_SOYADI'];
			$bitisdt 		= $row['START'];
			$saat 			= $row['STARTS'];
			$seansid 		= $row['SEANS_ID'];
			$bitis			= strtotime($bitisdt);
			$fark        	= abs($bitis-$baslangic);
			$toplantiSure	= $fark/60;
			/* SMS HAKKI VARMI? START */
			$query = $db->query("SELECT * FROM view_firma_id WHERE FIRMA_ID = '$smsFirmaID'")->fetch(PDO::FETCH_ASSOC);
			$FirmaAdi = $query['FIRMA_ADI'];

			$query = $db->query("SELECT TOPLAM FROM tbl_sms_firma WHERE FIRMA_ID = '$smsFirmaID'")->fetch(PDO::FETCH_ASSOC);
			$SMStoplam = $query['TOPLAM'];

			$query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum LIKE '%İletil%' AND FIRMA_ID = '$smsFirmaID'")->fetch(PDO::FETCH_ASSOC);
			$SMSkullanilan = $query['SAYAC'];

			$query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum NOT LIKE '%İletil%' AND FIRMA_ID = '$smsFirmaID'")->fetch(PDO::FETCH_ASSOC);
			$SMShatali = $query['SAYAC'];

			$SMSkalan = $SMStoplam-$SMSkullanilan;

			$query = $db->query("SELECT SMS_OPERATOR, FIRMA_ID, SMS_UN, SMS_PW, HEADER FROM tbl_sms_firma WHERE FIRMA_ID = '$smsFirmaID'", PDO::FETCH_ASSOC);
			if ( $query->rowCount()>0 ){
			     foreach( $query as $row ){
					$smsOp 		= $row['SMS_OPERATOR'];
          			$smsUN 		= $row['SMS_UN'];
					$smsPW 		= $row['SMS_PW'];
					$smsHeader	= $row['HEADER'];
			     }
			}
			/* SMS HAKKI VARMI? END */

			// Telefon Doğrulama Array -> functions.php include array ($numbersArr)

			//Eğer telefon numarasının ilk üç hanesi Türkcell, Vofafone, Avea içeriyorsa Verify OK! değilse Non!
			if (in_array(substr($smsTel, 0, 3), $numbersArr)){ $verify = 1;}else{ $verify = 0; }

			//Eğer telefon doğru ise SMS Gönder
			if($verify==1){
				if($SMSkalan>0){
					// if($toplantiSure<1440 AND $toplantiSure>1425)
					// { // 24 saat ve 23 saat 45 dakika arası toplamda 15 dakikalık zaman dilimi
						echo "<hr>";
						echo $smsFirmaADI;
						echo "<hr>";
						$gsmNr='90'.$smsTel;
						echo $gsmNr;
						$msg='Merhaba, '.$smsAdSoyad.' ';
						$msg.= $seansid.'. Seansınız olan Randevunuzun Yarın Saat '.$saat.' olduğunu hatırlatır, ';
						$msg.= 'Sağlıklı günler dileriz. '.$smsFirmaADI.' Bilgi için: '.$firmaTelefon;
						if($smsOp=='NETGSM'){
							OneToOneMessage($gsmNr,$msg,$smsFirmaID,$smsUN,$smsPW,$smsHeader);
						}else if($smsOp=='JETSMS'){
							$gsmNr='964'.$number;
							//jetSMSOneToOneMSG($gsmNr,$msg,$user_Firma,$smsUN,$smsPW,$smsHeader);
							jetSMSOneToOneMSG($smsUN, $smsPW, $smsHeader, $msg, $gsmNr);
						}
						echo "<hr>";

					// }
				}else{
					echo "</br>";
					echo $smsFirmaADI;
					echo "SMS kredisi bulunmamaktadır.</br>";
				}
			}else{
						echo $smsTel.' hatalı';
			}
		}
	}else{
		echo "b";
	}







?>
