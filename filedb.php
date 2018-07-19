<?php 
   
   $row= 0;
   $asize=0;
   $colname=array();
   $servername = "localhost";
	$username = "testuser";
	$password = "password";
	$dbname = "practice";

$conn = mysqli_connect($servername, $username, $password, $dbname);	
mysqli_query($conn,"CREATE TABLE filedb (id INT PRIMARY KEY AUTO_INCREMENT);");

$fr = fopen('file.txt', 'r');
while ($line = fgets($fr)) {  
   
 if ($row==0) {

         $colname = explode(' ', $line);
         $size=sizeof($colname);
   	 
   	 for($i=0;$i<$size;$i++)
       {

   	 	mysqli_query($conn,"ALTER TABLE filedb ADD $colname[$i] VARCHAR(30);");
         echo " yes ";

   	 }  
      $row=1;
       continue;

      }


      $rows = explode(' ', $line);
      $asize=sizeof($rows);

      mysqli_query($conn,"INSERT INTO filedb ($colname[0]) VALUES ('$rows[0]');");     
      echo " yaas "; 
   	 
       for($i=1;$i<$asize;$i++)
       {

         mysqli_query($conn,"UPDATE filedb SET $colname[$i]='$rows[$i]' FROM filedb WHERE $colname[0]='$rows[0]';");
         echo " yay ";

       }

       $row++;

	
}
fclose($fr);
?>