<?php
$DateTimeNows = [];
$DateTimeNows = [
    'LastUpdate'=> date('d.m.Y H:i:s')
];
$fp = fopen('/var/www/vhosts/estetik.app/httpdocs/api/exchange/doViz.json', 'w');
fwrite($fp, '['.json_encode($DateTimeNows).',');
fwrite($fp, file_get_contents('https://api.genelpara.com/embed/doviz.json').']');
fclose($fp);
?>