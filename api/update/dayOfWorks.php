<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
// print_r($_POST);
$jsonResults = NULL;
if(empty($_POST)){
  echo "boş alanlar var!";
  exit();
}else{
  $counter = 0;
  while($counter<10) {
        if($counter==0){
          $Check      = $_POST['CheckSunday'];
          $Start      = $_POST['StartSunday'].':00';
          $Finish     = $_POST['FinishSunday'].':00';
        }elseif($counter==1){
          $Check      = $_POST['CheckMonday'];
          $Start      = $_POST['StartMonday'].':00';
          $Finish     = $_POST['FinishMonday'].':00';
        }elseif($counter==2){
          $Check      = $_POST['CheckTuesday'];
          $Start      = $_POST['StartTuesday'].':00';
          $Finish     = $_POST['FinishTuesday'].':00';
        }elseif($counter==3){
          $Check      = $_POST['CheckWednesday'];
          $Start      = $_POST['StartWednesday'].':00';
          $Finish     = $_POST['FinishWednesday'].':00';
        }elseif($counter==4){
          $Check      = $_POST['CheckThursday'];
          $Start      = $_POST['StartThursday'].':00';
          $Finish     = $_POST['FinishThursday'].':00';
        }elseif($counter==5){
          $Check      = $_POST['CheckFriday'];
          $Start      = $_POST['StartFriday'].':00';
          $Finish     = $_POST['FinishFriday'].':00';
        }elseif($counter==6){
          $Check      = $_POST['CheckSaturday'];
          $Start      = $_POST['StartSaturday'].':00';
          $Finish     = $_POST['FinishSaturday'].':00';
        }elseif($counter==9){
          $Check      = 'true';
          $Start      = $_POST['AllDayStart'].':00';
          $Finish     = $_POST['AllDayFinish'].':00';
        }
        $UdayOfWork = $db->prepare("UPDATE tbl_dayOfWork SET
        STATUS = '$Check',
        HOURS_START = '$Start',
        HOURS_FINISH = '$Finish'
        WHERE
        FIRMA_ID = $user_Firma AND
        DAY_OF_WORK = $counter");
        $update = $UdayOfWork->execute();
        $counter++;

  }
  if ($update ){ $jsonResults=['code'=> 1000,'status'=>'success']; }



}

echo json_encode($jsonResults);
