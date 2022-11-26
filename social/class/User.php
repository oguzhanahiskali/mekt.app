<?php
class User {	
   
	private $userTable = 'social_user';	
	private $followTable = 'social_follow';	
	private $postTable = 'social_post';	
	private $likeTable = 'social_like';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function login(){
		if($this->email && $this->password) {			
			$sqlQuery = "
				SELECT * FROM ".$this->userTable." 
				WHERE email = ? AND password = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$password = md5($this->password);			
			$stmt->bind_param("ss", $this->email, $password);	
			$stmt->execute();
			$result = $stmt->get_result();			
			if($result->num_rows > 0){
				$user = $result->fetch_assoc();
				$_SESSION["user_id"] = $user['user_id'];	
				$_SESSION["username"] = $user['username'];					
				$_SESSION["name"] = $user['name'];		
				$_SESSION["name"] = $user['name'];					
				return 1;		
			} else {
				return 0;		
			}			
		} else {
			return 0;
		}
	}
	
	public function loggedIn (){
		if(!empty($_SESSION["user_id"])) {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function getUser(){	
		if(!empty($_SESSION["user_id"])) {
			$sqlQuery = "
				SELECT *
				FROM ".$this->userTable." 
				WHERE user_id = '".$_SESSION["user_id"]."'";	
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();			
			$result = $stmt->get_result();		
			$userDetails = array();		
			while ($user = $result->fetch_assoc()) { 				
				$userDetails['user_id'] = $user['user_id'];				
				$userDetails['username'] = $user['username'];
				$userDetails['name'] = $user['name'];							
				$userDetails['email'] = $user['email'];
				$userDetails['picture'] = $user['profile_image'];
				$userDetails['bio'] = $user['bio'];
				
			}	
			return $userDetails;	
		}
	}
	
	
	public function getUnfollowedUsers(){	
		if(!empty($_SESSION["user_id"])) {
			$sqlQuery = "
				SELECT user.user_id, user.username, user.profile_image
				FROM ".$this->userTable." AS user
				WHERE user.user_id != '".$_SESSION["user_id"]."' AND user.user_id NOT IN (SELECT follow.followed_user_id FROM ".$this->followTable." AS follow WHERE follow.follower_id = '".$_SESSION["user_id"]."')";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}
	
	public function getFollowedUsers(){	
		if(!empty($_SESSION["user_id"])) {
			$sqlQuery = "
				SELECT user.user_id, user.username, user.profile_image
				FROM ".$this->userTable." AS user
				WHERE user.user_id != '".$_SESSION["user_id"]."' AND user.user_id IN (SELECT follow.followed_user_id FROM ".$this->followTable." AS follow WHERE follow.follower_id = '".$_SESSION["user_id"]."')";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}
	
	public function getFollower(){	
		if(!empty($_SESSION["user_id"])) {
			$sqlQuery = "
				SELECT user.user_id, user.username, user.profile_image
				FROM ".$this->userTable." AS user
				LEFT JOIN ".$this->followTable." follow ON user.user_id = follower_id 
				WHERE follow.followed_user_id = '".$_SESSION["user_id"]."' ";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}
	
	public function getFollwing(){
		if(!empty($_SESSION["user_id"])) {
			$sqlQuery = "
				SELECT *
				FROM ".$this->followTable." 
				WHERE follower_id = '".$_SESSION["user_id"]."'";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();			
			$result = $stmt->get_result();	
			$allRecords = $result->num_rows;			
			return $allRecords;	
		}
	}
	public function getFollowers(){
		if(!empty($_SESSION["user_id"])) {
			$sqlQuery = "
				SELECT *
				FROM ".$this->followTable." 
				WHERE followed_user_id = '".$_SESSION["user_id"]."'";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();			
			$result = $stmt->get_result();	
			$allRecords = $result->num_rows;			
			return $allRecords;	
		}
	}
	
	public function followUser() {
		if($_SESSION["user_id"] && $this->followUserId) {			
			$sqlQuery = "INSERT INTO ".$this->followTable."(`follower_id`, `followed_user_id`)
				VALUES(?, ?)";					
			$stmt = $this->conn->prepare($sqlQuery);						
			$stmt->bind_param("ii", $_SESSION["user_id"], $this->followUserId);	
			if($stmt->execute()){				
				$output = array(			
					"success"	=> 	1
				);
				echo json_encode($output);
			}
		}		
	}
	
	public function unfollowUser() {
		if($_SESSION["user_id"] && $this->followUserId) {			
			$sqlQuery = "DELETE FROM ".$this->followTable." 
			WHERE follower_id = ? AND followed_user_id = ?";					
			$stmt = $this->conn->prepare($sqlQuery);						
			$stmt->bind_param("ii", $_SESSION["user_id"], $this->followUserId);	
			if($stmt->execute()){				
				$output = array(			
					"success"	=> 	1
				);
				echo json_encode($output);
			}
		}		
	}

	public function getUserPostLike ($postId){
		if(!empty($_SESSION["user_id"]) && $postId) {
			$sqlQuery = "
				SELECT *
				FROM ".$this->likeTable." 
				WHERE user_id = ? AND post_id = ?";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("ii", $_SESSION["user_id"], $postId);	
			$stmt->execute();			
			$result = $stmt->get_result();	
			$allRecords = $result->num_rows;			
			return $allRecords;	
		}
	}
	
}
?>