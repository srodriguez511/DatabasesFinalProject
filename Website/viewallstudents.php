<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	
	
	$studentid = $_SESSION['id'];
	
	echo "<h2> Students </h2>";
	echo "<br>";

	$id = $_SESSION['id'];
		
	$query = "select * from Students";
	$query2 = "select StudentId2 from Friendship where StudentId1=$id";
	$query3 = "select StudentIntendedId from FriendRequests where StudentRequestingId=$id";
	
	$result = mssql_query($query);
	$result2 = mssql_query($query2);
	$result3 = mssql_query($query3);
	
	$arrayid = array();
	while ($row = mssql_fetch_array($result2)) {
		array_push($arrayid, $row['StudentId2']);
	}
	
	$arrayid2 = array();
	while ($row = mssql_fetch_array($result3)) {
		array_push($arrayid2, $row['StudentIntendedId']);
	}
	
	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{	
		//id of the student in the list if we want to friend them
		$friendid = $row['StudentID'];
		
		echo $i . ":";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Student Name:&nbsp&nbsp";
		echo $row['StudentName'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "University:&nbsp&nbsp";
		echo $row['University'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				
		if(!(in_array($friendid, $arrayid)))
		{
			if(in_array($friendid, $arrayid2))
			{
				echo "Request Pending";
			}
			else
			{
				echo "<a href='friendstudent.php?studentid=$studentid&friendid=$friendid'>Friend</a>";
			}
		}
		echo "<br>";
		$i++;
	}
	
	mssql_free_result($result); 
	include 'bottom.php';
?>