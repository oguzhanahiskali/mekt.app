<?php
include '../header-top.php';
include '../functions.php';

  if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["editval"]) && !empty($_GET["editval"])){

    $id       = $_GET["id"];
    $editval  = $_GET["editval"];

    //Query for Log
    $QfLog = $db->query("SELECT k.NOT FROM tbl_seans_kart as k WHERE ID = '{$id}'")->fetch(PDO::FETCH_ASSOC);
    if ( $QfLog ){
        $old = $QfLog['NOT'];
    }

    $query = $db->prepare("UPDATE tbl_seans_kart as k SET k.NOT = ? WHERE ID = $id");
    $update = $query->execute(array($editval));
    if ( $update ){
         print "basarili";
    }

    // Log Saved!
    logSQL($user_ID, 'Seans Kart Not', $old, $editval);
  }
  ?>