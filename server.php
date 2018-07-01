<?php 

$errors = array();

session_start();

$db = mysqli_connect('localhost','root','','task3s');

if(isset($_POST['register'])) {

  $username = mysqli_real_escape_string($db,$_POST['username']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $password1 = mysqli_real_escape_string($db,$_POST['password1']);
  $password2 = mysqli_real_escape_string($db,$_POST['password2']);
  $fname = mysqli_real_escape_string($db,$_POST['fullname']);

  if(empty($username))
  	 array_push($errors, "Please enter your username.");
  elseif (strlen($username)<5 OR strlen($username)>10) {
  	 array_push($errors, "Username must be 5-10 characters long.");
  	}	

  if (empty($fname)) 
     array_push($errors, "Enter your full name.");
  
   if(empty($email))
  	 array_push($errors, "Please enter your email.");
  	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
  		array_push($errors, "Enter a valid email address.");			
  	

  if(empty($password1))
  	 array_push($errors, "Please enter a password.");
  elseif ( !preg_match('/^(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[`~!@#$%^&*()-_=+|\\{}\[\]\'";:,<>.?\/]).{5,}$/', $password1 ) )
      array_push($errors, "Password must be more than 5 chars long and must have atleast 1 alphabet,digit and special character.");	

  if($password1 != $password2)
  	 array_push($errors, "Entered passwords dont match.");


  if (sizeof($errors) == 0) {
  		$passwd=sha1($password1);
  		$sql = "INSERT INTO users (username,fullname,email,password) VALUES ('$username','$fname','$email','$passwd')";
  		$result = mysqli_query($db,$sql);

  		if ($result) 
  			echo "Success";
  		else
  			die(mysqli_error($db));

  		

  	}	
  	
  }

  if (isset($_POST['login'])) {

  	$username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

  	if (empty($username)) 
     array_push($errors, "Enter your username.");
  	if (empty($password)) 
     array_push($errors, "Enter your password.");

 	
 	if( count($errors) == 0) {
 	
 	$pword = sha1($password);
	$result = mysqli_query($db,"SELECT * FROM users WHERE username='$username' AND password='$pword' ");

	if (mysqli_num_rows($result) == 1) {
		
		$_SESSION['username'] = $username;
		mysqli_query($db, "UPDATE users SET ntlin=ntlin+1,isloggedin=1 WHERE username='$username'");
		
		if (isset($_POST['rme']))
		  setcookie("session_key","$username", time()+60*60);
		
		  header("location: lsuc.php");
	
	}
	else
		array_push($errors, "Incorrect username/password!");

  	}


  }
  	

  

  if (isset($_GET['logout'])) {

  	$username = $_SESSION['username'];
  	mysqli_query($db, "UPDATE users SET isloggedin=0 WHERE username='$username'");
  	session_unset($_SESSION['username']);
  	session_destroy();
    unset($_POST['rme']);
    setcookie("session_key","",time()-60);
  	header("location: login.php");

  }

  
  
   ?> 