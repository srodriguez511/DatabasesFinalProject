<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
		
		
	$studentid = $_GET['studentid'];
	$companyid = $_GET['companyid'];
	
	$query = "insert into StudentFollows values ($studentid, $companyid)";
	
	$result = mssql_query($query);
		
		
	echo "Complete! Click <a href='viewallcompanies.php'>here</a> to proceed  ";
	include 'bottom.php';
?>