<?php 
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($user->loggedIn()) {	
	header("Location: index.php");	
}
$loginMessage = '';
if(!empty($_POST["login"]) && !empty($_POST["loginId"]) && !empty($_POST["loginPass"])) {	
	$user->email = $_POST["loginId"];
	$user->password = $_POST["loginPass"];		
	if($user->login()) {		
		header("Location: index.php");				
	} else {
		$loginMessage = 'Invalid login! Please try again.';
	}
} else if (empty($_POST["login"]) || empty($_POST["loginId"]) || empty($_POST["loginPass"])){
	$loginMessage = 'Enter email, pasword to login.';
}

include('inc/header.php');
?>
<title>coderszine.com : Demo Follow and Unfollow system with PHP & MySQL</title>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php');?>
<div class="container-fluid gedf-wrapper">
	<div class="row">
		<div class="col-md-6">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Log In</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="loginId" name="loginId" placeholder="email">                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="password">
					</div> 				
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="login" value="Login" class="btn btn-info">						  
						</div>						
					</div>					    	
				</form> 
				<p>Email: adam@coderszine.com<br>Passowrd: 123</p>
				<p>Email: george@coderszine.com<br>Passowrd: 123</p>
				<p>Email: angela@coderszine.com<br>Passowrd: 123</p>
				<p>Email: jimmy@coderszine.com<br>Passowrd: 123</p>
				<p>Email: rose@coderszine.com<br>Passowrd: 123</p>
			</div>                     
		</div>  
	</div> 
	</div>
</div>
	
		
<?php include('inc/footer.php');?>
