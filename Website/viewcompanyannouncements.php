<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	$companyid = $_GET['companyid'];
	$companyname = $_GET['companyname'];
	
	echo "<h2> $companyname Announcements </h2>";
	echo "<br>";
	
	$query = "select * from jobannouncements where companyid = $companyid";
	
	$result = mssql_query($query);
	
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{	
		$announcementid = $row['AnnouncementId'];
	
		echo $i . ":";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Job Title:&nbsp&nbsp";
		echo $row['JobTitle'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Job Location:&nbsp&nbsp";
		echo $row['JobLocation'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Salary:&nbsp&nbsp";
		echo $row['Salary'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Degree:&nbsp&nbsp";
		echo $row['Degree'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Requisition Number:&nbsp&nbsp";
		echo $row['RequisitionNumber'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Major:&nbsp&nbsp";
		echo $row['Major'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Date Posted:&nbsp&nbsp";
		echo $row['DatePosted'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<br>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Description:&nbsp&nbsp";
		echo $row['Description'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='applyforannouncement.php?announcementid=$announcementid'>Apply!</a>";
		echo "<br><br>";
		$i++;
	}
	
	mssql_free_result($result); 	
	include 'bottom.php';
?>