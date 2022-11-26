<?php
session_start();
class Database{
	
	private $host  = 'localhost';
    private $user  = 'v2ep_usr';
    private $password   = "Mzw?s151F4#3daw1";
    private $database  = "v2ep_db"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>