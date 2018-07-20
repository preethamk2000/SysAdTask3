
<?php 
	#$data=json_decode(file_get_contents("php://input"),true);

	$mfree=$_POST['mfree'];
	$utime=$_POST['utime'];
	$tstamp=$_POST['tstamp'];
	$cusage=$_POST['cusage'];
	$nwcons=$_POST['nwcons'];
	$pmax=$_POST['pmax'];
	$dspace=$_POST['dspace'];

	echo $tstamp." ";
	echo $mfree." ";
	echo $utime." ";
	echo $cusage." ";
	echo $nwcons." ";
	echo $pmax." ";
	echo $dspace." ";



	$servername = "localhost";
	$username = "testuser";
	$password = "password";
	$dbname = "practice";

$conn = mysqli_connect($servername, $username, $password, $dbname);	

if (!$conn) {
    #die("Connection failed: " . mysqli_connect_error());
	echo " conn failed ";
}
else{

$result=mysqli_query($conn,"INSERT INTO sysparams (musage,cpusage,dusage,utime,acons,pmax,tstamp) VALUES ('$mfree','$cusage','$dspace','$utime','$nwcons','$pmax','$tstamp');");
if ($result) {
	echo " Success!!! ";
}else{
	echo mysqli_error($conn);
}
}
mysqli_close($conn);

?>
