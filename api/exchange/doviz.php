<?php

if(!isset($_SESSION)) {
  session_set_cookie_params(5400);
  session_start();
} 
if(!isset($_SESSION['USERNAME']) || empty($_SESSION['USERNAME'])){
  echo "login require!";
  header("location: /auth-login.php?returnURL=".$_SERVER['REQUEST_URI']);
    exit;
}

include 'doViz.json';
?>