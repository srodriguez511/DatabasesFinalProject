<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	$companyid = $_SESSION['id'];

	echo "<h2> Viewing Resume </h2>";
	echo "<br>";
	
	$resumeid = $_GET['resumeid'];
		
	$query =  "select resume from resumes where resumeid = $resumeid";

	$result = mssql_query($query);
	
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{	
		$resume = $row['resume'];
		echo "<textarea name='resume' rows='7' cols='40'>$resume</textarea>";
		echo "<br>";
	}
	
	mssql_free_result($result); 	
	include 'bottom.php';
?>