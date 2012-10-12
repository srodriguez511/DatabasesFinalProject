<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	echo "<h2> My Friends </h2>";
	echo "<br>";

	$id = $_SESSION['id'];
		
	$query = "select StudentName, StudentId from Students where StudentId in (select StudentId2 from Friendship where StudentId1 = $id)";
	
	$result = mssql_query($query);
	
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
    {		
		$friendid = $row['StudentId'];
		echo $i . "&nbsp&nbsp";
		
		echo "Student Name:&nbsp";
		echo $row['StudentName'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='viewprofile.php?friendid=$friendid'>View Profile</a>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='unfriend.php?friendid=$friendid'>Unfriend</a>";
		
		echo "<br><br>";
		
		$i++;
	}
	
	mssql_free_result($result); 	
	include 'bottom.php';
?>