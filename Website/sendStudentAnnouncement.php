<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		
	session_start();	
	
	$friendids = explode(",",$_POST['single_value']);
	$annid = $_POST['announcementId']; 
	$to = $_POST["to"]; 
	
	$query = "insert into Announcementsforstudents values ($friendids[$to], $annid)";
	$result = mssql_query($query);
	
	if($result)
	{
		echo "Announcement Forwarded! Click <a href='studentannouncements.php'>here</a> to proceed.";	
	}
	else
	{
		echo "Student already has this announcement! Click <a href='studentannouncements.php'>here</a> to proceed.";	
	}
	
	include 'bottom.php';
?>
