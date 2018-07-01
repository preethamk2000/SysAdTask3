<?php include('server.php'); 

if (isset($_COOKIE['session_key'])) {
	$_SESSION['username']=$_COOKIE['session_key'];
	header("location: lsuc.php");
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	  <div class="header">
	  	<h1>Register Here</h1>
	  </div>

	  <form method="post" action="register.php">

	  <?php include('errors.php') ?>
	  	<div class="input-group">
	  		<label>Username</label>
	  		<input type="text" name="username">
	  	</div>
	  	<div class="input-group">
	  		<label>Fullname</label>
	  		<input type="text" name="fullname">
	  	</div>
	  	<div class="input-group">
	  		<label>Email</label>
	  		<input type="text" name="email">
	  	</div>
	  	<div class="input-group">
	  		<label>Password</label>
	  		<input type="password" name="password1">
	  	</div>
	  	<div class="input-group">
	  		<label>Retype Password</label>
	  		<input type="password" name="password2">
	  	</div>
	  	<div class="input-group">
	  		<button type="submit" name="register" class="btn">Register</button>
	  	</div>	

	  	<a href="login.php"> <b>Login here!</b> </a>
	  
	  </form>


</body>
</html>