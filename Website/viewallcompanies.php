<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	$studentid = $_SESSION['id'];
	

	echo "<h2> Companies </h2>";
	echo "<br>";
				
	$query = "select * from Companies";
	
	$result = mssql_query($query);
	
	$i = 1;
	
	$query2 = "select CompanyId from StudentFollows where StudentId=$studentid";
	$result2 = mssql_query($query2);
	
	$arrayid = array();
	while ($row = mssql_fetch_array($result2)) {
		array_push($arrayid, $row['CompanyId']);
	}
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{	
		$companyid = $row['CompanyId'];
		$companyname = $row['CompanyName'];
		
		echo $i . ":";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Company Name:&nbsp&nbsp";
		echo "<a href='viewcompanyprofile.php?companyid=$companyid'>$companyname</a>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Company Location:&nbsp&nbsp";
		echo $row['Location'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Company Industry:&nbsp&nbsp";
		echo $row['Industry'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		if(!(in_array($companyid, $arrayid)))
		{
			echo "<a href='followcompany.php?studentid=$studentid&companyid=$companyid'>Follow</a>";
		}
		echo "<br>";
		$i++;
	}
	
	mssql_free_result($result); 	
	include 'bottom.php';
?>