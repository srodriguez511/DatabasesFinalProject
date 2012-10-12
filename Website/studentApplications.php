<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	echo "<h2> My Applications </h2>";
	echo "<br>";

	$id = $_SESSION['id'];
		
	$query = "select DateApplied, CompanyName, JobTitle, RequisitionNumber from application inner join students on application.studentid = students.studentID 
				inner join jobannouncements on application.announcementid = jobannouncements.announcementid
				inner join companies on jobannouncements.companyid = companies.companyid
				where application.studentid=$id";
	
	$result = mssql_query($query);
	
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
    {	
		echo $i . "&nbsp&nbsp";
		
		echo "Date Added:&nbsp";
		echo $row['DateApplied'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		echo "Company Name:&nbsp";
		echo $row['CompanyName'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		echo "Job Title:&nbsp";
		echo $row['JobTitle'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		echo "Req Number:&nbsp";
		echo $row['RequisitionNumber'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		echo "<br><br>";
		
		$i++;
	}
		
	mssql_free_result($result); 
	include 'bottom.php';
?>