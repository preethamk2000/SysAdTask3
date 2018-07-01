<?php include('server.php'); 

if (isset($_COOKIE['session_key'])) {
	$_SESSION['username']=$_COOKIE['session_key'];
	header("location: lsuc.php");
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	  <div class="header">
	  	<h1>Login Here</h1>
	  </div>

	  <form method="POST" >
	  <?php include('errors.php') ?>
	  
	  	<div class="input-group">
	  		<label>Username</label>
	  		<input type="text" name="username">
	  	</div>
	  	<div class="input-group">
	  		<label>Password</label>
	  		<input type="password" name="password">
	  	</div>
	  	<div>
	  		<input type="checkbox" name="rme" > Remember me</input>
	  	</div>
	  	<div class="input-group">
	  		<button type="submit" name="login" class="btn">Login</button>
	  	</div>	

	  	<p>
	  	    Not yet registered? <a href="register.php"> <b>Register here!</b> </a>
	  	</p>
	  </form>


</body>
</html>
