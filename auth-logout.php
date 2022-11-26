<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
$receiveURL = $_GET['returnURL'];
if(!empty($receiveURL)){
    header("location: auth-login.php?returnURL=".$receiveURL);
}else{
    header("location: auth-login.php?returnURL=/");
}
exit;
?>