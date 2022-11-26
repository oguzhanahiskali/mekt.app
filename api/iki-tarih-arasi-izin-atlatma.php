<?php
$tarih = $_GET['tarih'];
$offDuty = ['2020-08-12', '2020-08-21'];

echo "<br>";
function holidaysExcludeNextDT($date,$offDuty){
    $date = date('Y-m-d', strtotime($date . ' -1 day'));
    //$date = '2021-06-01';
    $days = 90;
    while ($days > 0) {
        $date = date('Y-m-d', strtotime($date . ' +1 day'));
        if (! in_array($date, $offDuty)){
            $days--;
            print $date."<br>";
        }
    }
}

holidaysExcludeNextDT($tarih,$offDuty);

/*
$vade = 90;
$bitis = date('Y-m-d',strtotime("+".$vade." days"));

$date = date ("Y-m-d", strtotime("+30 days", strtotime($start)));

//echo $bitis;
function Count_Days_Without_Weekends($start, $end){
    $days_diff = floor(((abs(strtotime($end) - strtotime($start))) / (60*60*24)));
    $run_days=0;
    for($i=0; $i<=$days_diff; $i++){
        $newdays = $i-$days_diff;
        $futuredate = strtotime("$newdays days");
        $mydate = date("F d, Y", $futuredate);
        $today = date("D", strtotime($mydate));             
        if(($today != "Sat") && ($today != "Sun")){
            $run_days++;
        }
    }
return $run_days;
}

print_r(Count_Days_Without_Weekends($start,$date));



function dateToDateName($start){
    if(date('D', strtotime($start))=='Mon'){echo "Pazartesi";}else
    if(date('D', strtotime($start))=='Tue'){echo "Salı";}else
    if(date('D', strtotime($start))=='Wed'){echo "Çarşamba";}else
    if(date('D', strtotime($start))=='Thu'){echo "Perşembe";}else
    if(date('D', strtotime($start))=='Fri'){echo "Cuma";}else
    if(date('D', strtotime($start))=='Sat'){echo "Cumartesi";}else
    if(date('D', strtotime($start))=='Sun'){echo "Pazar";}
}
//dateToDateName($end);
*/

