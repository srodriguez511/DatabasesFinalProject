<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
		
		
	$studentid = $_GET['studentid'];
	$companyid = $_GET['companyid'];
	
	$query = "delete from StudentFollows where studentid=$studentid and companyid = $companyid";
	
	$result = mssql_query($query);
		
		
	echo "Complete! Click <a href='studentcompanies.php'>here</a> to proceed  ";
	include 'bottom.php';
?>