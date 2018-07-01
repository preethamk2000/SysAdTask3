<?php include('server.php'); 

if (empty($_SESSION['username'])) 
	header('location: login.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	  <div class="header">
	  	<h1>Homepage</h1>
	  </div>

	    <div class="wpage">
	    <?php if(isset($_SESSION['username'])): ?>
	  		<p> Welcome <b><?php echo $_SESSION['username']; ?></b>. You have logged in successfully <?php
	  		$name = $_SESSION['username']; 
	  		$db = mysqli_connect('localhost','root','','task3s');		
	  		$nos = mysqli_query($db,"SELECT * FROM users WHERE username='$name' ");
	  		$obj = mysqli_fetch_object($nos);
	  		echo $obj->ntlin;
 ?> time(s)! </p>
	  	<?php endif	?>
	  	</div>	
	  	

	  	<p align="center">
	  	    <a href="lsuc.php?logout='1'"> <b>Logout</b> </a>
	  	</p>


</body>
</html>