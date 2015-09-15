<head><center>
	<a href="/compare/index.php"style="color:blue; font-size: 30px; ">Home</a>
	<a href="/compare/kunjungan-anc/insert.php"style="color:blue; font-size: 30px; ">Back</a><br><br>
	<h1>Reconciliation Screen For Bidan Prepopulated Data</h1>
    <h3>Kunjungan ANC form</h3>
		<br><br><br><br><br>
</center></head>
<form>
<input type="hidden" name="motherid" value="<?php echo htmlspecialchars($_POST["motherid"]);?>" />
</form>


<?php
error_reporting(E_ERROR);
// database variables
$hostname = "localhost";
$user = "root";
$password = "bunGHatta28";
$database = "bidan_prepopulated";
// Database connecten 
$connection= mysql_connect($hostname, $user, $password);    
$motherid=$_POST["motherid"];




mysql_select_db ($database, $connection);
		//select colom name
				$query = "SHOW COLUMNS FROM kunjungan_anc_1st";
				//echo $query;
					$result2 = mysql_query($query);
					$ii = 0;
					while ($row2 = mysql_fetch_array($result2)) 
					{
						$colom[$ii] = $row2[0];
						$col =  $colom[$ii];
						//echo ",";
						$ii++;
					}
					$n = 0;
					foreach($colom as $key=>$value)
					    {
					        $table1 = "select ".$value." from kunjungan_anc_1st where motherid = ".$motherid;
							//	$select = "select" for($a=0;$a<=$ii;$a++){ echo $colom[$a].","} "from table1";
							$table2 = "select ".$value." from kunjungan_anc_2nd where motherid = ".$motherid;
										
							$query_table1 = mysql_query($table1);
							$rowstb1 = mysql_fetch_array($query_table1);
							
							$query_table2 = mysql_query($table2);
							$rowstb2 = mysql_fetch_array($query_table2);
										
							foreach($rowstb1 as $key=>$value1)
							foreach($rowstb2 as $key=>$value2)
										
							if ($rowstb1!=null && $rowstb2!=null)
							{
								$table3 = "select ".$value." from kunjungan_anc_3rd where motherid = ".$motherid;
								$query_table3 = mysql_query($table3);
								$rowstb3 = mysql_fetch_array($query_table3);
							}
							foreach($rowstb3 as $key=>$value3)
							//echo $value3."<br>";
							{
							}//echo $rowstb1."<br>";
							//echo $rowstb2."<br>";
							//test cocokkan data
							//print_r ($rowstb1);
							if ($rowstb1==null && $rowstb2==null)
							{
								echo "<center> error: ibu dengan motherid ".$motherid." tidak di temukan atau motherid yang anda masukkan salah </center><br>";
								exit();
							}
							else if ($rowstb1==null)
							{
								echo "<center> error: ibu dengan motherid ".$motherid." tidak di temukan di first entry </center><br>";
								exit();
							}
							else if ($rowstb2==null)
							{
								echo "<center> error: ibu dengan motherid ".$motherid." tidak di temukan di second entry </center><br>";
								exit();
							}
							else if ($rowstb1 == $rowstb2 || $n<5 || $n>39)
							{ 
								$insert2 = "insert into kunjungan_anc_3rd (motherid) values (".$motherid.")";
								$insert = "update kunjungan_anc_3rd set ".$value." = '".$value2."' where motherid = ".$motherid;
								$query_insert2 = mysql_query($insert2);
								$query_insert = mysql_query($insert); 
								//echo $col."<br>";
								// pake table /form html untuk masukkan field
							}
							else if($rowstb1 != $rowstb2 && empty($value3))
							{  
								echo "<center> nilai yang dimasukkan tidak sama: ".$value."</center>";
								echo "<center> pada 1st entry: ".$value1."<br>"."pada 2nd entry: ".$value2."</center>";
								require('save.php');
								// pake table /form html untuk masukkan field
							}
							//echo $table1."<br>";
							//echo $n."<br>";
							//echo $table2."<br>";
							$n++;
					    }
						echo "<br>";		
?>


				
				
				