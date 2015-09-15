<?php

// database variables
$hostname = "localhost";
$user = "root";
$password = "bunGHatta28";
$database = "bidan_prepopulated";
// Database connecten 
$connection= mysql_connect($hostname, $user, $password);    
$motherid=$_POST["motherid"];
$value=$_POST["value"];
$value3=$_POST["value3"];




mysql_select_db ($database, $connection);
$insert = "update kunjungan_anc_3rd set ".$value." = '".$value3."' where motherid = ".$motherid;
$query_insert = mysql_query($insert);

	
?>
		
<form action="compare.php" method="post" style="color:red;"><center><strong>
<br><br><br><br><br><br><br><br><br><br>
<input type="hidden" name="motherid" value="<?php echo htmlspecialchars($motherid);?>" />
<?php echo"masukkan nilai ".$value3." sebagai nilai yang benar?";?>
<input type="submit" value="Yes" onclick="test()" />
</strong></center></form>				
				