<?php
include '../header-top.php';

  	 $id           = $_GET['id'];


$query = $db->prepare("DELETE FROM tbl_hatirlatma WHERE ID = :id");
$delete = $query->execute(array(
   'id' => $_GET['id']
));


$query = $db->prepare("DELETE FROM tbl_hatirlatma_taksit WHERE EVENT_ID = :id");
$delete = $query->execute(array(
   'id' => $_GET['id']
));

        if ( $delete ){
             print "basarili";
        };
  ?>