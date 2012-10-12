<?php
	include 'top.php';
	include 'dbconnect.php';  // Works.
		// Select the database 'php'
	
	session_start();	

	echo "<h2> My Friend Requests </h2>";
	echo "<br>";
	
	$id = $_SESSION['id'];
		
	$query = "select StudentName, DateRequested, StudentRequestingId from FriendRequests inner join students on studentrequestingid = students.studentid where studentintendedid = $id";
	
	$result = mssql_query($query);

	$i = 1;
	
	while (($row = mssql_fetch_array($result, MSSQL_BOTH))) 
	{		
		$friendid = $row['StudentRequestingId'];	
	
		echo $i . ":";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
		echo "Student Name:&nbsp&nbsp";
		echo $row['StudentName'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "Date:&nbsp&nbsp";
		echo $row['DateRequested'];
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='acceptdeny.php?studentid=$id&friendid=$friendid&choice=1'>Accept</a>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='acceptdeny.php?studentid=$id&friendid=$friendid&choice=2'>Deny</a>";
		echo "<br>";
		$i++;
	}
	
	mssql_free_result($result); 	
	include 'bottom.php';
?>