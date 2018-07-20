<!DOCTYPE html>
<html>
<head>
	<title>Health Monitor</title>
</head>
<body>

	<h1>PC Health Monitor</h1>
	<h2>
	<?php 
$rcount=1;

$server = "localhost";
$uname = "testuser";
$pword = "password";
$dbname = "practice";


$conx = mysqli_connect($server,$uname,$pword,$dbname);
		if (!$conx) {
    #die("Connection failed: " . mysqli_connect_error());
	echo " conn failed ";
}
?>
<?php
   for($i=$rcount; $i<$rcount+1 ; $i++): ?>
<?php $result=mysqli_query($conx,"SELECT * FROM sysparams where id='$i';");
	  $result2=mysqli_query($conx,"SELECT * FROM sysparams where id='$i'+1;");	
	  
	  $objj = mysqli_fetch_object($result2);
      if ($objj!=null) {
      	
      	$rcount++;

      }
	  $obj = mysqli_fetch_object($result);  ?>	
<h2>
<table style="width:105%">
  <tr>
    <th align="left"><u>Musage</u></th>
    <th align="left"><u>Cpusage</u></th> 
    <th align="left"><u>Dspace</u></th>
    <th align="left"><u>Utime</u></th>
    <th align="left"><u>Active NWcons</u></th>
    <th align="left"><u>Process Max</u></th>
    <th align="left"><u>Time Stamp</u></th>
  </tr>
  
  <tr>
    <td> <?php echo $obj->musage; ?>% </td>
    <td> <?php echo $obj->cpusage; ?>% </td>
    <td> <?php echo $obj->dusage; ?>B</td>
    <td> <?php echo $obj->utime; ?>(hh:mm) </td>
    <td> <?php echo $obj->acons; ?> </td>
    <td> <?php echo $obj->pmax; ?> </td>
    <td> <?php echo $obj->tstamp; ?> </td>
  </tr>
</table>
</h2>
<?php endfor ?>

</h2>
</body>
</html>
