<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
	session_start();
		
		
	$studentid = $_GET['studentid'];
	$announcementid = $_GET['announcementid'];
	
	$query = "insert into AnnouncementsForStudents values ($studentid,$announcementid)";
	
	$result = mssql_query($query);
		
	echo "Announcement Sent! Click <a href='viewallstudentsCompany.php'>here</a> to proceed  ";
	include 'bottom.php';
?>