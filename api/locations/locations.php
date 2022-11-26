<?php
ini_set("display_errors", 1);
$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
// set IP address and API access key 
$access_key = 'fbc37afdbbe0e2ccce5161271c27e437';

// Initialize CURL:
$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$api_result = json_decode($json, true);

// Output the "capital" object inside "location"
echo $json;
