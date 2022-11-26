<?php 

include $_SERVER['DOCUMENT_ROOT'].'/conf.php';
include $_SERVER['DOCUMENT_ROOT'].'/functions.php';

$json = [];
	if(!empty($_POST['phone'])){
		$bugun=date('Y-m-d H:i:s');
		$telefonPost = $_POST['phone'];
		$postFirstName = $_POST['fn'];
		$postLastName = $_POST['ln'];
	
		if (in_array(substr($telefonPost, 0, 3), $numbersArr)){ $verify = 1; }else{ $verify = 0; }

		$musteriIP = $_SERVER['REMOTE_ADDR'];

		if(!empty($postFirstName) && !empty($postLastName)){
			$ad = $postFirstName;
			$soyad = $postLastName;
			$str = rand(1000,9999);
			
			$smsUN = '8508404578';
			$smsPW = 'K9$X4fFt';
			$smsHeader = '08508404578';
	
			if($verify==1){
				$gsmNr='90'.$telefonPost;
				$msg='Merhaba, '.$ad.' '.$soyad;
				$msg.='\nEstetik.App başvurusu için doğrulama kodu: '.$str . '. Bu kodu kimseyle paylaşmayınız.\nB021';

				OneToOneMessageCompanyRegister($gsmNr,$msg,$str,$smsUN,$smsPW,$smsHeader, $ad, $soyad,$musteriIP);
				$json=['status'=> true, 'details'=>'sms sent successfully'];
			}else{
				$json=['status'=> false, 'details'=>'An error occurred while sending sms.'];
			}
		}else{
			if(empty($postFirstName)){
				$json=['status'=> false, 'details'=>'Empty:Firstname'];
			}else if(empty($postLastName)){
				$json=['status'=> false, 'details'=>'Empty:Lastname'];
			}else{
				$json=['status'=> false, 'details'=>'errör'];
			}
		}
						 
	}else{
		$json=['status'=> false, 'details'=>'Empty:Phone'];
	}

	echo json_encode($json);
?>
