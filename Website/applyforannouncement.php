<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	$announcementid = $_GET['announcementid'];
	$studentid = $_SESSION['id'];

	echo "<h2> Apply for Announcement </h2>";
	
	echo "<br><br>";
	
	echo "Select a resume to use for your application";
	echo "<br><br>";
	
	$query = "select * from resumes where studentid=$studentid";
	$result = mssql_query($query);
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{
		$resumeid = $row['ResumeId'];
	
		echo $i . ":";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Date Added:&nbsp&nbsp";
		echo $row['DateAdded'];
		
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Resume:&nbsp&nbsp";
		echo $row['Resume'];
		
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='processapplication.php?announcementid=$announcementid&resumeid=$resumeid'>Apply!</a>";
		
		echo "<br><br>";
		
		$i++;
	}
	include 'bottom.php';

?>