<?php
$istek = $_GET['q'];

/*
function hoursandmins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

echo hoursandmins($istek, '%02d Hours, %02d Minutes')."<br>";
echo hoursandmins($istek, '%02d:%02d');
*/
$t = $istek;
$h = floor($t/60) ? floor($t/60) .' Saat' : '';
$m = $t%60 ? $t%60 .' Dakika' : '';
echo $h && $m ? $h.', '.$m : $h.$m;
