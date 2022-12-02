<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$sessionID = $_GET['edu'];


$myArray = array();
if ($result = $link->query("SELECT * FROM tbl_egitim_grup_join WHERE GRUP_ID = '{$sessionID}'")) {

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$joinInfo = null;
			$color = null;
			$grup = $db->query("SELECT * FROM tbl_company WHERE ID = {$row['JOIN_ID']}")->fetch(PDO::FETCH_ASSOC);

			if(      isset($grup['companyName'])){ $joinInfo = $grup['companyName'];
			}else if(isset($grup['companyTableName'])){ $joinInfo = $grup['companyTableName'];
			}else if(isset($grup['competentFirstname'])){   $joinInfo = $grup['competentFirstname'].' '.$grup['competentLastname'];
			}else{ $joinInfo = 'null';
			}
				
			if($row['INVITATION_STATUS']==1){ $invitationStatus = true; $colorA = 'chip-success'; }else{ $invitationStatus = false; $colorA = 'chip-danger'; }
			if($row['JOIN_STATUS']==1){ $JoinStatus = true; $colorB = 'chip-success'; }else{ $JoinStatus = false; $colorB = 'chip-danger'; }
			if($row['STATUS']==1){ $Status = 'Aktif'; $colorC = 'chip-success'; }else{ $Status = false; $colorC = 'chip-danger'; }
	
		$myArray[] = [
			'ID'	=> intval($row['ID']),
			'EducationID'=> $joinInfo,
			'Group'	=> $joinInfo,
			'GroupID'	=> $sessionID,
			'JoinStatus'	=> $JoinStatus,
			// 'Finish'=> '<div class="chip '.$colorC.'"><div class="chip-body"><div class="chip-text">'.$Status.'</div></div></div>',
			// 'Join'	=> '<button type="button" class="btn btn-icon btn-icon rounded-circle btn-success mb-1 waves-effect waves-light" onclick="window.location.href=`app-education-edit.php?id='.$row['ID'].'`"><i class="feather icon-inbox"></i></button>
			// <button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mb-1 waves-effect waves-light hizmet-sil" ids="'.$row['ID'].'"><i class="feather icon-trash"></i></button>',
			'Status'=> $joinInfo,
			'DT'	=> $row['DT']
		];

    }
    echo json_encode($myArray);
}