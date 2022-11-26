<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Post.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$post = new Post($db);


if(!empty($_POST['action']) && $_POST['action'] == 'followUser') {
	$user->followUserId = $_POST["userId"];	
	$user->followUser();
}

if(!empty($_POST['action']) && $_POST['action'] == 'unfollowUser') {
	$user->followUserId = $_POST["userId"];	
	$user->unfollowUser();
}

if(!empty($_POST['action']) && $_POST['action'] == 'addPost') {
	$post->message = $_POST["message"];	
	$post->insert();
}

if(!empty($_POST['action']) && $_POST['action'] == 'likePost') {
	$post->postId = $_POST["postId"];	
	$post->likePost();
}
if(!empty($_POST['action']) && $_POST['action'] == 'dislikePost') {
	$post->postId = $_POST["postId"];	
	$post->dislikePost();
}
?>