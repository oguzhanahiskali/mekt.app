<?php
    include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

	$json = [];

    if(
      empty($_POST['patientID']) ||
      empty($_POST['estheticianID']) ||
      empty($_POST['serviceID']) ||
		 empty($_POST['start'])){
        echo "boş alanlar var!";
        exit();
      }
	
	if(!empty($_POST['serviceRegions'])){		
		$arrays = $_POST['serviceRegions'];
		$appArea = implode(", ",array_values($arrays));
	}
    

		$patientID        = $_POST['patientID'];
		$estheticianID    = $_POST['estheticianID'];
		$serviceID        = $_POST['serviceID'];
		$sessionStartTime = $_POST['start'];
		$note 			  = $_POST['note'];
		$meetingID = null;
		$insertStatus = null;
		

		$query = $db->query("SELECT REGIONS FROM tbl_hizmet WHERE ID = '{$serviceID}' AND FIRMA_ID='{$user_Firma}'")->fetch(PDO::FETCH_ASSOC);
		if ( $query['REGIONS'] != null ){
			if(isset($_POST['serviceRegions'])){
				$appAreaArr = $_POST['serviceRegions'];
			}else{
				$jsonSessionCard=['code'=> 1014,'status'=>false, 'because'=> 'Service area cannot be missing'];
				echo json_encode($jsonSessionCard);
				exit();
			}
		}else{
			$appArea = null;
		}

		$durum = 1;
		$MeetingStatus = 0;
		$querySessionCard = $db->prepare(
			"INSERT INTO tbl_meeting_appointment SET
			FIRMA_ID = ?,
			SUBE_ID = ?,
			DURUM = ?,
			MID = ?,
			EST_ID = ?,
			HIZMET_ID = ?,
			BOLGE_ID = ?,
			MEETING_DT = ?,
			MEETING_STATUS = ?,
			NOTE = ?,
			UID = ?"
		);

		$insertSessionCard = $querySessionCard->execute(
			array(
				$user_Firma,
				$user_Sube,
				$durum,
				$patientID,
				$estheticianID,
				$serviceID,
				$appArea,
				$sessionStartTime,
				$MeetingStatus,
				$note,
				$user_ID
			)
		);
    if ( $insertSessionCard ){
        $last_id = $db->lastInsertId();
        $meetingID = intval($last_id);
		$json=['code'=> 1000,'status'=>true, 'SID'=>$meetingID];
		$insertStatus = true;
    }else{
		$json=['code'=> 1012,'status'=>false, 'SID'=>$meetingID];
		$insertStatus = false;
    }
    //MÜŞTERİ DETAY EKLEME


	echo json_encode($json);
?>