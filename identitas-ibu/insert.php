<head><center>
	<a href="/compare/index.php"style="color:blue; font-size: 30px; ">Home</a><br><br>
	<h1>Reconciliation Screen For Bidan Prepopulated Data</h1>
    <h3>Identitas Ibu form</h3>
	<br><br><br><br><br><br><br><br>
</center></head>
<?php
error_reporting(E_ERROR);
// database variables
$hostname = "localhost";
$user = "root";
$password = "bunGHatta28";
$database = "bidan_prepopulated";
// Database connecten 
$connection= mysql_connect($hostname, $user, $password);    





mysql_select_db ($database, $connection);
		$query_first = "SELECT identitas_ibu_1st.motherid FROM bidan_prepopulated.identitas_ibu_1st WHERE motherid IN (SELECT motherid FROM bidan_prepopulated.identitas_ibu_2nd) and motherid not in (SELECT motherid FROM bidan_prepopulated.identitas_ibu_3rd)";
		$resultfirst = mysql_query($query_first);
					$ij = 0;
					while ($row1 = mysql_fetch_array($resultfirst)) 
					{
						$colom1[$ij] = $row1[0];
						$col1 =  $colom1[$ij];
						//echo $col1;
						$ij++;
					}
					echo "<center>motherid</center><br><br><br>";
					$n = 0;
					foreach($colom1 as $key=>$motherid)
					    {
							echo "<center>".$motherid."</center>";
							require('goto.php');
						}
?>

